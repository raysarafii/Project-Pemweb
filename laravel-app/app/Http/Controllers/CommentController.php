<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Project;

class CommentController extends Controller
{
    /**
     * Store a new comment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $projectId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $projectId)
    {
        //Validasi input
        $request->validate([
            'comment' => 'required|string|max:1000', 
        ]);

        // Buat comment baru
        $comment = new Comment();
        $comment->comment = $request->input('comment'); 
        $comment->user_id = Auth::id(); 
        $comment->projects_id = $projectId; 

        $comment->save(); // Save the comment to the database

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    }
}
