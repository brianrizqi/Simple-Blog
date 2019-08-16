@extends('layouts.base')
@section('section')
    <div class="breadcrumb_wrapper">
        <div class="container">
            <div class="breadcrumb-content">
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        {{--                    <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                        {{--                    <li class="breadcrumb-item"><a href="#">Layouts</a></li>--}}
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <section class="blog-list">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="list-item">
                        @foreach($posts as $item)
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="list-image">
                                        <img src="{{url('storage/image/'.$item->img)}}" alt="Image">
                                        <div class="image-overlay"></div>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <div class="list-content">
                                        <h3><a href="{{route('post.show',['id'=>$item->id])}}">{{$item->judul}}</a></h3>
                                        <a href="#" class="tag tag-blue">#{{$item->tag1}}</a>
                                        @if($item->tag2 != null)
                                            <a href="#" class="tag tag-green">#{{$item->tag2}}</a>
                                        @endif
                                        @if($item->tag3 != null)
                                            <a href="#" class="tag tag-green">#{{$item->tag3}}</a>
                                        @endif
                                        <p>{{$item->artikel}}</p>
                                        <div class="author-detail">
                                            <p><a href="#"><i class="icon-profile-male"></i> {{$item->user->name}}</a>
                                            </p>
                                            <p><i class="icon-clock"></i> {{$item->tanggal}}</p>
                                            <p><a href="#"><i class="icon-chat"></i> 5 comments</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="pagination">
                        <ul class="pagination">
                            <li><a href="#" class="active">1</a></li>
                            <li><a href="#">2</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
