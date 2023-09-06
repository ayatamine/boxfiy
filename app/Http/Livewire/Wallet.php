<?php

namespace App\Http\Livewire;

use App\Models\BallanceHistory;
use App\Models\User;
use App\Models\Order;
use App\Models\Service;
use Livewire\Component;
use App\Models\Category;
use App\Notifications\NewOrderNotification;
use App\Notifications\User\NewOrderNotification as UserNewOrderNotification;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class Wallet extends Component
{
    use WithPagination;

    protected $services;
    public $search = '';
    public $sort = 'newest';
    public $category_id = null;
    public $categories = null;
    public $category = null;
    public $selected_service_quantity = [];
    public $selected_service_link = [];

    // public function updatejobscategories()
    // {
    //     if(!is_array($this->jobs_categories)) return;
    //     $this->jobs_categories = array_filter($this->jobs_categories,function($job){
    //         return $job !=false;
    //     });
    // }
    protected $queryString = [
        'category' => ['except' => '', 'as' => 'c'],
    ];
    // public function updatedSelectedServiceQuantity($value){
    //     dd($value);
    // }
    // public function updatedSelectedServiceLink($value){
    //     dd($value);
    // }
    public function submitOrder()
    {
        if (!count($this->selected_service_quantity) || !count($this->selected_service_link)) {
            $this->dispatchBrowserEvent('no-form-data');
            return;
        }
        $service_id = array_key_last($this->selected_service_quantity);
        $quantity = array_pop($this->selected_service_quantity);
        $link = array_pop($this->selected_service_link);
        $service = Service::findOrFail($service_id);
        // 'name',
        // 'category_id',
        // 'min_qte',
        // 'max_qte',
        // 'price',
        // 'status',
        // 'type',
        // 'quality',
        // 'partial_process',
        // 'data_source',
        // 'api_id',
        // 'api_service_id',
        // 'description',
        // 'image',
        // 'avg_time',
        // 'rate'
        DB::transaction(function () use ($service, $link, $quantity) {
            try {
                $order = null;
                if ($service->data_source !== 'api') {
                    $order = Order::create([
                        'service_id' => $service->id,
                        'user_id' => auth()->id(),
                        'link' => $link,
                        'amount' => $quantity,
                        'price' => floatval($quantity * $service->price) ?? 0,
                        'status' => 'pending'
                    ]);
                } else {
                    $api = $service->api;
                    $response = Http::acceptJson()
                        ->post($api->url, [
                            'key' => $api->key,
                            'action' => 'add',
                            'service' => $service->api_service_id,
                            'link' => $link,
                            'quantity' => $quantity,
                        ]);

                    if ($response->successful()) {
                        $order = Order::create([
                            'service_id' => $service->id,
                            'order_number' => $response->json()['order'],
                            'user_id' => auth()->id(),
                            'link' => $link,
                            'amount' => $quantity,
                            'price' => floatval($quantity * $service->price) ?? 0,
                            'status' => 'pending'
                        ]);
                    } elseif ($response->clientError()) {
                        session()->flash('error', 'There is an error from client side, please contact admins');
                        return back();
                    } elseif ($response->serverError()) {
                        session()->flash('error', 'There is an error occured from api service');
                        return back();
                    }
                }
                if ($order) {
                    auth()->user()->decrement('wallet_balance', $order->price);
                    $BallanceHistory = BallanceHistory::create([
                        'user_id' => auth()->id(),
                        'transaction_type' => BallanceHistory::$PURSHASE,
                        'amount' => $order->price,
                    ]);
                    auth()->user()->notify(new UserNewOrderNotification($service->name, $order));
                    //notify admin
                    $adminUser = User::where('is_admin', true)->first();
                    if ($adminUser) {
                        $adminUser->notify(new NewOrderNotification($order));
                    }
                    session()->flash('success', 'your order has been submitted , we will inform you soon');
                    return redirect()->route('orders.index');
                }
            } catch (\Exception $ex) {
                session()->flash('error', 'There is an error from client side, please contact admins WITH THIS/' . $ex->getMessage());
            }
        });
        // $this->dispatchBrowserEvent('order-submit');
    }

    public function paginationView()
    {
        return 'livewire.custom-pagination2';
    }
    public function loadCategories()
    {
        $this->categories = Cache::remember('categories', 540, function () {
            return Category::latest()->get();
        });
    }
    public function updatingCategoryId($value)
    {
        $this->category = Category::find($value)?->name;
    }
    public function render()
    {
        $this->loadCategories();
        $services = Service::latest()
            ->when($this->search, function ($query) {
                $query->whereLike('name', $this->search)
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->when($this->category_id, function ($query) {
                $query->where('category_id', $this->category_id);
            })
            // ->when($this->sort,function($query,$sort){
            //     return $sort=='newest' ? $query->latest() : $query->oldest();
            // })
            ->paginate(6);
        return view(
            'livewire.wallet',
            ['services' => $services,]
        );
    }
}
