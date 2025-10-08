<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $dataKontak = [
            'email' => 'fasn004@gmail.com',
            'nomor' => '0895421153020',
        ];
        return view('kontak', $dataKontak, [
            'title' => 'Kontak'
        ]);
    }
}
