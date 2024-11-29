<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelompokController extends Controller
{
    // Tampilkan form untuk membuat kelompok
    public function create()
    {
        // Get the logged-in user
        $user = Auth::user();

        //Check apakah user sudah punya kelompok
        if ($user && $user->kelompok_id) {
           return redirect()->back()->with('error', 'You already have a Team');
        }

        //Jika belum maka view ini muncul
        return view('kelompok.create');
    }

    // Simpan kelompok baru ke database dan bergabung dengan kelompok tersebut
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Buat kelompok baru
        $kelompok = Kelompok::create([
            'name' => $request->name,
        ]);

        // 
        $user = Auth::user();

        // Perbarui kelompok_id user dengan kelompok yang baru dibuat
        if ($user) {
            $user->kelompok_id = $kelompok->kelompok_id; // Ubah kelompok_id pengguna yang sedang login
            $user->save(); 
        }

        return redirect()->route('home')->with('success', 'Kelompok berhasil dibuat dan Anda bergabung dengan kelompok tersebut.');
    }
}
