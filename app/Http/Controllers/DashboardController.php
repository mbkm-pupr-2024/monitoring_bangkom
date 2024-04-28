<?php

namespace App\Http\Controllers;

use App\Models\PelatihanModel;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
}