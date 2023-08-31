<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function addFunds()
    {
        return view('add_funds');
    }
    public function wallet()
    {
        if(request()->has('notification_id')) markSingleNotificationsAsRead(request()->get('notification_id'),$with_notify=false);
        return view('wallet');
    }
    public function notifications()
    {

        return view('notifications');
    }
    public function markNotificationsAsRead()
    {
        
        markNotificationsAsRead();
        return back();
    }
    public function orderHistory()
    {
        if(request()->has('notification_id')) markSingleNotificationsAsRead(request()->get('notification_id'),$with_notify=false);

        $orders = Order::with('service:id,name')->whereUserId(auth()->id())->latest()->paginate(10);
        return view('order_history',compact('orders'));
    }
}
