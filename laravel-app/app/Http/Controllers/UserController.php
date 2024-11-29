<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kelompok;

class UserController extends Controller
{
    public function showJoinKelompokForm()
    {
        return view('join-kelompok');
    }

    public function joinKelompok(Request $request)
    {
        $user = Auth::user();

        // Cek apakah user sudah memiliki kelompok
        if ($user->kelompok_id !== null) {
            return redirect()->route('join.kelompok.form')->with('error', 'Anda sudah bergabung dengan kelompok.');
        }

        // Validasi input
        $request->validate([
            'kelompok_id' => 'required|exists:kelompok,kelompok_id',
        ]);

        // Update kelompok_id user
        $user->kelompok_id = $request->kelompok_id;
        $user->save();

        return redirect()->route('join.kelompok.form')->with('success', 'Anda berhasil bergabung dengan kelompok.');
    }
    // app/Http/Controllers/UserController.php

public function keluarKelompok()
{
    $user = Auth::user();

    //Check user punya kelompok atau tidak
    if ($user->kelompok_id === null) {
        return redirect()->route('join.kelompok.form')->with('error', 'Anda tidak tergabung dalam kelompok manapun.');
    }

    //Set kelompok_id menjadi null
    $user->kelompok_id = null;
    $user->save();

    return redirect()->route('join.kelompok.form')->with('success', 'Anda berhasil keluar dari kelompok.');
}

}
