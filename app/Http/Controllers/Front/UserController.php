<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
