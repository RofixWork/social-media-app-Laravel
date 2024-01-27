<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{
    //register page
    public function register() : View
    {
        return view("auth.register");
    }

    //store user
    public function store() : RedirectResponse
    {
        //check inputs
        $formFields = request()->validate([
            "name" => "required|between:7,29|regex:/^[A-Za-z][A-Za-z0-9_]{7,29}$/",
            "email" => ["required", "email", Rule::unique("users", "email")],
            "image" => "required|mimes:jpeg,png,webp|max:2048",
            "password" => "required|confirmed|min:6"
        ]);

        //check file
        if(request()->hasFile("image")) {
            $formFields["image"] = request()->file("image")->store("images/users", "public");
        }

        //create a new user
        $user = User::create($formFields);

        //handle login
        auth()->login($user);

        //redirect
        return to_route("posts.index");
    }

    //login page
    public function login() : View {
        return view("auth.login");
    }

    //login authenticate
    public function authenticate() : RedirectResponse
    {
        //check input email and password
        request()->validate([
           "email" => "required|email",
           "password" => "required|min:6"
        ]);

        //get user info
        $credentials = request()->only("email", "password");
        $remember = request()->has("remember");

        //check user
        if(auth()->attempt($credentials, $remember)) {
            //Generate a new session identifier.
            session()->regenerate();
            //redirect
            return to_route("posts.index");
        }

        //return to page login if user information is nt correct
        return back()->withErrors([
            "email" => "The provided credentials do not match our records."
        ])->onlyInput("email");
    }

    //user logout
    public function logout() : RedirectResponse {
        //handle logout
        auth()->logout();
        //Flush the session data and regenerate the ID.
        session()->invalidate();
        //Regenerate the CSRF token value.
        session()->regenerateToken();

        return to_route("auth.login");
    }

    //user profile
    public function profile(User $user) : View {
        $userPosts = $user->posts;
        return view("users.profile", [
            "posts" => $userPosts,
            'user' => $user
        ]);
    }

    //settings page
    public function settings() : View {
        return view("users.settings");
    }

    //dashboard view
    public function dashboard() : View {
        $posts =  auth()->user()->posts;
        return view("users.dashboard", [
            "posts" => $posts
        ]);
    }
}
