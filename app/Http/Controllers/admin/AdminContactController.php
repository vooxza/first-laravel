<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guardian;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function adminIndex()
    {
        return view('components.admin.kontak', [
            'title' => 'Kontak Admin',
            'email' => 'fasn004@gmail.com',
            'whatsapp' => '+62 895-4211-53020',
            'instagram' => '@fasn.jpeg'
        ]);
    }
}