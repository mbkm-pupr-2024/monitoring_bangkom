<?php

namespace App\Http\Controllers;

use App\Models\PelatihanModel;

class DashboardController extends Controller
{
    public function index()
    {
        // $jml_pelatihanBerlangsung = PelatihanModel::with('status')->whereHas('status', function ($query) {
        //     $query->where('status', '=', 'Sedang berlangsung');
        // })->count();
        // $jml_pelatihanSelesai = PelatihanModel::with('status')->whereHas('status', function ($query) {
        //     $query->where('status', '=', 'Selesai');
        // })->count();
        // return view('dashboard', ['jml_berlangsung' => $jml_pelatihanBerlangsung, 'jml_selesai' => $jml_pelatihanSelesai]);
        return view('dashboard');
    }
}