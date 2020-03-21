<?php

namespace App\Http\Controllers\Keymakers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeymakersDashboardController extends Controller
{
    public function index()
    {
        return view('keymakers.dashboard.index');
    }
}
