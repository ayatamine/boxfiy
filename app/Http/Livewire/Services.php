<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Cache;

class Services extends Component
{
    use WithPagination;

    protected $services;
    public $search = '';
    public $sort = 'newest';
    public $categories =null;
    public function updatingSearch()
    {
        $this->resetPage();
    }
    // public function updatejobscategories()
    // {
    //     if(!is_array($this->jobs_categories)) return;
    //     $this->jobs_categories = array_filter($this->jobs_categories,function($job){
    //         return $job !=false;
    //     });
    // }
    public function loadCategories(){
        $this->categories = Cache::remember('jobs', 540, function () {
            return Category::latest()->get();
        });
    }
    public function render()
    {
   
        $services = Service::when($this->search, function ($query) {
            $query->whereLike('name',$this->search)
                ->orWhere('description', 'like', '%' . $this->search . '%');
        })
        ->when($this->sort,function($query,$sort){
            return $sort=='newest' ? $query->latest() : $query->oldest();
        })
        ->paginate(6);


            
        
        return view('livewire.services',[
            'services'=>$services,
        ]);
    }
}
