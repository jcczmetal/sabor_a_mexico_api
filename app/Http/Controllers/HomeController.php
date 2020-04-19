<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::guest()) {
            return view('welcome');
        }

        if(auth()->user()->hasRole('keymaker')) {
            return redirect('keymakers/dashboard');
        }

        if(auth()->user()->hasRole('admin')) {
            return redirect('associate/index');
        }

        if(auth()->user()->hasRole('associate')) {
            return redirect('restaurant/index');
        }
    }
}
