<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
# 1. Import model User agar dapat digunakan di dalam controller.
use app\Models\User;

class DashboardController extends Controller
{

    public function index()
    {
        $mahasiswa = User::first();
        $hours = date('H');
        $salam = match (true) {
            $hours >=5 && $hours < 12 => "Good Morning",
            $hours >=12 && $hours < 5 => "Good Afternoon",
            $hours >=5 && $hours < 18 => "Good Evening",
            default => "Good Night",
        };

        $accessTime = date("H:i:s");
        $tanggal = $this->getTanggal();
        return view('dashboard', compact('mahasiswa','tanggal', 'salam', 'accessTime'));
    }

    # 7. Buat method private getTanggal() untuk menghasilkan tanggal saat ini dalam format d-m-Y.
    private function getTanggal(){
        return date ('d-m-Y');
    }
}
