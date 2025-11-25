<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $ads = Advertisement::where('is_active', true)->orderBy('created_at', 'desc')->get();
        return Inertia::render('dashboard', compact('ads'));
    }
}
