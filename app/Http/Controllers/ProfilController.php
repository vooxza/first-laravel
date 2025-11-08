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
    public function adminIndex()
    {
        return view('components.admin.profil', [
            'title' => 'Profil Admin',
            'nama' => 'Fabian Amadeus Singgih Nirwasita',
            'kelas' => 'XI PPLG 1',
            'sekolah' => 'SMK Raden Umar Said'
        ]);
    }
}