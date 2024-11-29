<?php

// app/Http/Controllers/KelompokController.php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelompokController extends Controller
{
    // Tampilkan form untuk membuat kelompok
    public function create()
    {
        
        $user = Auth::user();

        //Cek apakah user sudah punya kelompok
        if ($user && $user->kelompok_id) {
            return redirect()->route('home')->with('error', 'Anda sudah mempunyai kelompok.');
        }

        // Show the form to create a new kelompok
        return view('kelompok.create');
    }

    // Simpan kelompok baru ke database dan bergabung dengan kelompok tersebut
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Buat kelompok baru
        $kelompok = Kelompok::create([
            'name' => $request->name,
        ]);

        // Ambil user yang sedang login
        $user = Auth::user();

        // Perbarui kelompok_id user dengan kelompok yang baru dibuat
        $user->kelompok_id = $kelompok->kelompok_id;
        $user->save();

        return redirect()->route('home')->with('success', 'Kelompok berhasil dibuat dan Anda bergabung dengan kelompok tersebut.');
    }
}
