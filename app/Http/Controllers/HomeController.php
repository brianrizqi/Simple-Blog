<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        if (Auth::check()) {
//            return "brian";
//        } else {
        $posts = Post::with('user')->with('kategori')->withCount('comments')->paginate(10);
        return view('welcome', compact('posts'));
//        }
    }
}
