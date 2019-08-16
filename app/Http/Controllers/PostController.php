<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Kategori;
use App\Post;
use Auth;
use Illuminate\Support\Facades\Storage;
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
        $kategori = Kategori::all();
        return view('create_post', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gambar = time() . '-' . $request->img->getClientOriginalName();
        $request->file('img')->storeAs('public', $gambar);
        $latestPost = Post::orderBy('created_at', 'DESC')->first();
        if ($latestPost) {
            $latestId = $latestPost->id;
            $removed1char = substr($latestId, 4);
            $id = $stpad = 'POST' . str_pad($removed1char + 1, 8, "0", STR_PAD_LEFT);
        } else {
            $id = 'POST' . str_pad(1, 8, "0", STR_PAD_LEFT);
        }
        $post = Post::createPost(
            $id,
            Auth::user()->id,
            $request->id_kategori,
            $request->judul,
            $request->artikel,
            date('Y-m-d'),
            $request->tag1,
            $request->tag2,
            $request->tag3,
            $gambar
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
        $comment = Comment::with('user')->with('post')->where('comments.id_post', $id)->get();
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
