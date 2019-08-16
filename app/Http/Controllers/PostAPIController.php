<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class PostAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')->with('kategori')->withCount('comments')->get();
        return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $gambar = time() . '-' . $request->img->getClientOriginalName();
//        $request->file('img')->storeAs('public', $gambar);
        $latestPost = Post::withTrashed()->orderBy('created_at', 'DESC')->first();
        if ($latestPost) {
            $latestId = $latestPost->id;
            $removed1char = substr($latestId, 4);
            $id = $stpad = 'POST' . str_pad($removed1char + 1, 8, "0", STR_PAD_LEFT);
        } else {
            $id = 'POST' . str_pad(1, 8, "0", STR_PAD_LEFT);
        }
        $post = Post::createPost(
            $id,
            $request->id_user,
            $request->id_kategori,
            $request->judul,
            $request->artikel,
            date('Y-m-d'),
            $request->tag1,
            $request->tag2,
            $request->tag3,
            $request->img
        );
        $data = array();
        $data['error'] = false;
        $data['message'] = "Success";
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $post = Post::with('user:id,name')->with('kategori:id,kategori')->findOrFail($request->id);
        $comment = Comment::with('user:id,name')
            ->with('post:id')
            ->where('comments.id_post', $request->id)
            ->get();
        $data = array();
        $data['error'] = false;
        $data['message'] = "Success";
        $data['post'] = $post;
        $data['comment'] = $comment;
        return response()->json($data);
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
