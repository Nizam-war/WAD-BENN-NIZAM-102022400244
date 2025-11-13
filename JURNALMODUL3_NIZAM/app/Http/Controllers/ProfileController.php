<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
class ProfileController extends Controller
{

    public function index()
    {
        $mahasiswa = User::first();
        return view('profil', compact('mahasiswa'));
    }

}
