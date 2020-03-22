<?php

namespace App\Http\Controllers\Keymakers;

use App\User;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeymakersDashboardController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::count();

        $admins = User::role('admin')->count();
        $associates = User::role('associate')->count();

        return view('keymakers.dashboard.index', compact('restaurants','admins','associates'));
    }
}
