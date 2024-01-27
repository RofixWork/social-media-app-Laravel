<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CommentController extends Controller
{
    //store comment
    public function store() {
        $formFields = \request()->validate([
            "comment" => "required",
            "post_id" => ["required", Rule::exists("posts", "id")]
        ]);
        if(auth()->check()) {
            $formFields["user_id"] = auth()->id();
        }
        //create a new comment
        Comment::create($formFields);
        return to_route("posts.index");
    }

    //update comment
    public function update(Comment $comment) : RedirectResponse
    {
        //if you have authorize update this comment or not
        if($comment->user_id !== auth()->id()) {
            abort(404, "Unauthorized");
        }
        //check field
        $formfields = request()->validate([
           "comment" => "required"
        ]);
        //update comment
        $comment->update($formfields);
        return back();
    }

    //delete comment
    public function destroy(Comment $comment) : RedirectResponse
    {
        //if you have authorize update this comment or not
        if($comment->user_id !== auth()->id()) {
            abort(404, "Unauthorized");
        }

        $comment->delete();
        return back();
    }
}
