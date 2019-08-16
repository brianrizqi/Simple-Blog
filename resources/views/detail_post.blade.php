@extends('layouts.base')
@section('section')
    <section class="page-cover">
        <div class="container">
            <div class="row">
                <div class="col-xs-5">
                    <div class="cover-content">
                        <h1 class="blog-font">{{$post->judul}}</h1>
                        <div class="author-detail1">
                            <div class="author-content">
                                <span><a href="#"><i class="icon-profile-male"></i>{{$post->user->name}}</a></span>
                                <span><i class="icon-clock"></i> {{$post->tanggal}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-7">
                    <img src="{{url('storage/'.$post->img)}}" alt="Image">
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Ends -->

    <!-- Detail -->
    <section class="item-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                    <div class="item-wrapper detail-wrapper">
                        <div class="item-detail blog-item-detail">
                            <p class="articlepara">
                                {{$post->artikel}}
                            </p>
                        </div>
                        <div class="author-profile">
                            <div class="profile-content">
                                <p class="highlight">Written By</p>
                                <h3><a href="#">{{$post->user->name}}</a></h3>
                            </div>
                        </div>
                        <div class="item-tags">
                            <a href="#" class="tag-blue tag">#{{$post->tag1}}</a>
                            @if($post->tag2 != null)
                                <a href="#" class="tag tag-blue">#{{$post->tag2}}</a>
                            @endif
                            @if($post->tag3 != null)
                                <a href="#" class="tag tag-blue">#{{$post->tag3}}</a>
                            @endif
                        </div>
                        <div class="comment-box">
                            <h3>Comments</h3>
                            <ul class="comment-list">
                                @foreach($comment as $item)
                                    <li>
                                        <div class="comment-item">
                                            <div class="comment-content">
                                                <h4>
                                                    {{$item->user->name}}
                                                    @if($post->id_user == Auth::user()->id || $item->id_user == Auth::user()->id)
                                                        <form method="POST"
                                                              action="{{route('komen.delete',['id'=>$item->id,'id_post'=>$post->id])}}"
                                                              style="display: inline">
                                                            <button class="btn btn-danger" type="submit">
                                                                Delete
                                                            </button>
                                                            @method('DELETE')
                                                            @csrf
                                                        </form>
                                                    @endif
                                                </h4>
                                                <p>
                                                    {{$item->komen}}
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="comment-form">
                            <form action="{{route('komen.store',['id'=>$post->id])}}" method="POST">
                                <h3>Add a comment</h3>
                                <div class="row">
                                    <div class="textarea col-sm-12">
                                        <label for="Name">Your Comment:</label>
                                        <textarea name="komen">

                                        </textarea>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="comment-btn">
                                            <button type="submit" class="btn-white btn-red">
                                                Submit Comment
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="detail-sidebar">
                <div class="detail-sidebar-item">
                    <h5><a href="detail1.html">Some native species quickly disappeared from Biotest Lake</a><span><a
                                href="#">John Doe</a></span></h5>
                </div>
                <div class="detail-sidebar-item">
                    <h5><a href="detail1.html">Some native species quickly disappeared from Biotest Lake</a><span><a
                                href="#">John Doe</a></span></h5>
                </div>
                <div class="detail-sidebar-item">
                    <h5><a href="detail1.html">Some native species quickly disappeared from Biotest Lake</a><span><a
                                href="#">John Doe</a></span></h5>
                </div>
            </div>
        </div>
    </section>
    <!-- Detail Ends -->
@endsection

