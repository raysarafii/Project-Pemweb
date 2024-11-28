<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kelompok;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user(); 
        $kelompok = null;
        $jumlahAnggota = 0;
        $projects = collect(); 
        $tasks = collect();
        $totalProjects = 0;
        $assignedTasks = 0; 

        // Check apakah user sudah punya kelompok
        if ($user->kelompok_id) {
            $kelompok = Kelompok::find($user->kelompok_id);

            //Hitung total jumlah user di kelompok
            $jumlahAnggota = User::where('kelompok_id', $user->kelompok_id)->count();

            //Fetch semua project yang dimiliki kelompok user
            $projects = Project::where('kelompok_id', $user->kelompok_id)->get();
            $totalProjects = $projects->count(); // Count total projects

            //Fetch semua project yang dimiliki user
            $tasks = Task::where('assigned_to', $user->id)
                         ->where('kelompok_id', $user->kelompok_id)
                         ->with('project')
                         ->get();

            $assignedTasks = $tasks->count(); 
        }

   
        return view('home', compact(
            'user', 
            'kelompok', 
            'jumlahAnggota', 
            'projects', 
            'tasks', 
            'totalProjects', 
            'assignedTasks'
        ));
    }
}
