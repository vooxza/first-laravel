<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{

    public function index(){
return view('kontak', ['title' => 'Kontak']);
    }
    public function adminIndex()
    {
        return view('components.admin.kontak', [
            'title' => 'Kontak Admin',
            'email' => 'fasn004@gmail.com',
            'whatsapp' => '+62 895-4211-53020'
        ]);
    }
}
