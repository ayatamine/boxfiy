<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\OrderCollection;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(Request $request): Response
    {
        $orders = Order::paginate();

        return new OrderCollection($orders);

        return view('order.index', compact('orders'));
    }
}
