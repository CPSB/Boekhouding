<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['role:boekhouding'])->only('indexBackend');
    }

    /**
     * Get the login form for the application.
     * @return View
     */
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('home');
        }

        return view('auth.login');
    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function indexBackend(): View
    {
        return view('home');
    }
}
