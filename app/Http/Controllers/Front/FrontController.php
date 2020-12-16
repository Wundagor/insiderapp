<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class FrontController extends Controller
{
    /**
     * Get main page
     *
     * @return Application|Factory|View
     */
    public function index(): View
    {
        return view('index');
    }
}
