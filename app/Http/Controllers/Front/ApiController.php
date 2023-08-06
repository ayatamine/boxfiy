<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Front\ApiCollection;
use App\Models\Api;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ApiController extends Controller
{
    public function index(Request $request): Response
    {
        $apis = Api::paginate();

        return new ApiCollection($apis);

        return view('api.index', compact('apis'));
    }
}
