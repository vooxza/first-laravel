<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{

    public function index()
    {
        $data = [
            'nama' => 'Fabian Amadeus S.N',
            'kelas' => 'XI PPLG 1',
            'sekolah' => 'SMK Bisa Hebat'
        ];

        return view('profil', $data, [
            'title' => 'Profil'
        ]);
    }


    
}
