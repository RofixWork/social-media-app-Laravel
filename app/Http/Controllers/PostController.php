<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    //index
    public function index() : View {
        //get all posts
        $posts = Post::latest()->get();
        return view("posts.index", [
            "posts" => $posts
        ]);
    }

    //create
    public function create() : View {
        return view("posts.create");
    }

    //edit post view
    public function edit(Post $post) : View {
        //if you have authorize update or not?
        if($post->user_id !== auth()->id()) {
            abort(401, "Unauthorized");
        }
        //return edit view
        return view("posts.edit", [
            "post" => $post
        ]);
    }

    //update post
    public function update(Post $post) : RedirectResponse {
        //if you have authorize update or not?
        if($post->user_id !== auth()->id()) {
            abort(401, "Unauthorized");
        }
        //check fields
        $formFields = request()->validate([
            "title" => ["required", "min:6"],
            "description" => ["required", "min:10"],
            "tags" => ["required", "regex:/^[A-z0-9, ]+$/"],
            "url" => "url"
        ]);
        //update post
        $post->update($formFields);
        //redirect
        return to_route("posts.show", $post->id)->with("message", "Post has been already Updated...");
    }

    //store user in DB
    public function store() : RedirectResponse
    {
        //check fields
        $formFields = request()->validate([
           "title" => ["required", "min:6"],
           "description" => ["required", "min:10"],
            "image" => ["required", "mimes:jpeg,png,webp", "max:2048"],
            "tags" => ["required", "regex:/^[A-z0-9, ]+$/"],
            "url" => "url"
        ]);
        //check file (exist or not)
        if(request()->hasFile("image")) {
           $formFields['image'] = \request()->file("image")->store("images/posts", "public");
        }
        if(auth()->check()) {
            $formFields["user_id"] = auth()->id();
        }
        //create a new post
        Post::create($formFields);
        return to_route("posts.index");
    }

    //show user
    public function show(Post $post) : View
    {
        return view("posts.show", [
           "post" => $post
        ]);
    }

    //delete post
    public function destroy(Post $post) : RedirectResponse {
        //if you have authorize update or not?
        if($post->user_id !== auth()->id()) {
            abort(401, "Unauthorized");
        }

        $post->delete();
        return to_route("posts.index")->with("message", "Post has been removed...");
    }
}
