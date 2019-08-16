<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Kategori;
use App\Post;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $kategori = Kategori::all();
            return route('create_post', compact('kategori'));
        } else {

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::createPost(
            getAutoNumber(8),
            $request->id_user,
            $request->id_kategori,
            $request->judul,
            $request->artikel,
            $request->tanggal,
            $request->tag1,
            $request->tag2,
            $request->tag3,
            $request->img
        );
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with('user')->with('kategori')->findOrFail($id);
        $comment = Comment::with('user')->with('post')->findMany($id);
        return view('detail_post', compact('post', 'comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
