<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index() {
           return view('profil' , [
        'title' => 'Profil', 'nama' => 'nama', 'kelas' => 'kelas', 'sekolah' => 'sekolah'
    ]);
    }
    
}