<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $plans = Plan::where('is_active', true)
            ->orderBy('price')
            ->get();

        return view('pages.home', compact('plans'));
    }
}
