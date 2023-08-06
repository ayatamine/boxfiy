<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\ServiceCollection;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(Request $request): Response
    {
        $services = Service::paginate();

        return new ServiceCollection($services);

        return view('service.index', compact('services'));
    }
}
