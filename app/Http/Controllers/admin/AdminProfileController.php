<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guardian;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
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