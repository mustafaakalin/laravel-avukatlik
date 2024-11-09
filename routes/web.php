<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/anasayfa', function () {
    return view('app');
});


Route::get('/blogs', function () {
        $blogs = Blog::all();
        // Optional: Implement pagination if necessary
        $blogs = Blog::paginate(10); // Paginate 10 blogs per page

        return view('blogs', compact('blogs'));
});