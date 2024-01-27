<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//post routes
Route::get('/', [PostController::class, "index"])->name("posts.index");
Route::get("/posts/create", [PostController::class, "create"])->name("posts.create")->middleware("auth");
Route::post("/posts", [PostController::class, "store"])->name("posts.store")->middleware("auth");
Route::get("/posts/{post}", [PostController::class, "show"])->name("posts.show");
Route::get("/posts/{post}/edit", [PostController::class, "edit"])->name("posts.edit")->middleware("auth");
Route::patch("/posts/{post}", [PostController::class, "update"])->name("posts.update")->middleware("auth");
Route::delete("/posts/{post}", [PostController::class, "destroy"])->name("posts.destroy")->middleware("auth");
//post routes


//auth routes
Route::get("/register", [UserController::class, "register"])->name("auth.register")->middleware("guest");
Route::post("/register", [UserController::class, "store"])->name("auth.store")->middleware("guest");
Route::get("/login", [UserController::class, "login"])->name("auth.login")->middleware("guest");
Route::post("/login", [UserController::class, "authenticate"])->name("auth.authenticate")->middleware("guest");
Route::get("/logout", [UserController::class, "logout"])->name("auth.logout")->middleware("auth");

//users
Route::get("/profile/{user}", [UserController::class, "profile"])->name("users.profile");
Route::get("/settings", [UserController::class, "settings"])->name("users.settings")->middleware("auth");
Route::get("/dashboard", [UserController::class, "dashboard"])->name("users.dashboard")->middleware("auth");

//comments
Route::post("/comments", [CommentController::class, "store"])->name("comments.store")->middleware("auth");
Route::patch("/comment/{comment}", [CommentController::class, "update"])->name('comments.update')->middleware("auth");
Route::delete("/comments/{comment}", [CommentController::class, "destroy"])->name('comments.destroy')->middleware("auth");
