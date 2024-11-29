<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Kelompok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    // Method create project
    public function create()
    {
        $user = Auth::user();
        if (is_null($user->kelompok_id)) {
        return redirect()->back()->with('error', 'Silahkan bergabung dengan kelompok');
    }
        $kelompok = $user && $user->kelompok_id ? Kelompok::find($user->kelompok_id) : null;
        return view('projects.create', compact('kelompok'));
    }

    //Method store create project
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'required|date|after:today',
            'kelompok_id' => 'required|exists:kelompok,kelompok_id',
        ]);

        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->deadline = $request->deadline;
        $project->kelompok_id = $request->kelompok_id;
        $project->user_id = Auth::id();
        $project->save();

        return redirect()->route('home')->with('success', 'Project berhasil dibuat');
    }

    // Meythod show project
    public function show($id)
    {
        $project = Project::with(['comments', 'tasks'])->findOrFail($id);
        return view('projects.show', compact('project'));
    }

    // Method edit project
   public function edit($id) {
    $project = Project::findOrFail($id);
    $kelompoks = Kelompok::all();
    return view('projects.edit', compact('project', 'kelompoks'));
}




//Method update project
public function update(Request $request, Project $project)
{
    // Validate input
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'deadline' => 'required|date|after:today',
        'kelompok_id' => 'required|exists:kelompok,kelompok_id',
    ]);

    $project->update($request->all());

    
    return redirect()->route('home')->with('success', "Project berhasil di update");
}




}