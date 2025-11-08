<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', ['title' => 'Home']);
    }
    public function adminDashboard()
    {
        // Misal dashboard admin belum ada data khusus
        return view('components.admin.dashboard', [
            'title' => 'Dashboard Admin'
        ]);
    }
}