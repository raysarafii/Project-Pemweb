<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kelompok;
class TaskController extends Controller
{
    public function index()
    {
       
        $user = Auth::user();

       
        $tasks = Task::where('assigned_to', $user->id)->get();

      
        return view('home', compact('tasks'));
    }

  public function create()
{
    $user = Auth::user();

    //Check user punya kelompok atau tidak
    if (is_null($user->kelompok_id)) {
        return redirect()->back()->with('error', 'You doesnt have a team');
    }

    //Fetch user semua user yg punya kelompok id sama
    $usersInKelompok = \App\Models\User::where('kelompok_id', $user->kelompok_id)->get(['id', 'name']);
    $kelompokId = $user->kelompok_id;
    $kelompok = $user && $user->kelompok_id ? Kelompok::find($user->kelompok_id) : null;

    $projects = \App\Models\Project::where('kelompok_id', $user->kelompok_id)->get();

    return view('tasks.create', compact('usersInKelompok', 'kelompokId', 'projects', 'kelompok'));
}


    public function store(Request $request)
    {
        //Validasi data request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|in:Tinggi,Sedang,Rendah',
            'status' => 'required|in:Belum Selesai,Dalam Proses,Selesai',
            'assigned_to' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,project_id',
            'kelompok_id' => 'required|exists:kelompok,kelompok_id',
        ]);

        //Buat task baru
        Task::create($validatedData);

        return redirect()->route('home')->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        //Show task 
        return view('tasks.show', compact('task'));
    }

    public function edit($task_id)
{
    $task = Task::findOrFail($task_id);
    $projects = Project::all(); // Jika ingin memilih proyek yang terkait
    return view('tasks.edit', compact('task', 'projects'));
}

public function update(Request $request, $task_id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'priority' => 'required|in:Tinggi,Sedang,Rendah',
        'status' => 'required|in:Belum Selesai,Dalam Proses,Selesai',
        'project_id' => 'nullable|exists:projects,project_id',
    ]);

    $task = Task::findOrFail($task_id);
    $task->update($request->all());

    return redirect()->route('home')->with('success', 'Task edit successfully.');
}
}