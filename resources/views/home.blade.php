@extends('layouts.front')

@section('content')
    <div class="col-lg-8 col-md-10 mx-auto">
        @if($posts->count())
            @foreach($posts as $post)
                <div class="post-preview">
                    <a href="{{route('home.post',$post->id)}}">
                        <h2 class="post-title">
                            {{$post->title}}
                        </h2>
                        <h3 class="post-subtitle">
                            {{Str::words($post->title, 2,'...')}}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="#">{{$post->user->name}}</a>
                        on {{$post->created_at->format('m-Y')}}</p>
                </div>
                <hr>
            @endforeach
        @endif


        <!-- Pager -->
        <div class="clearfix">
        @if($posts->currentPage()===1)
            <a class="btn btn-primary float-right" href="{{$posts->nextPageurl()}}">Older Posts &rarr;</a>
            @elseif(!$posts->hasMorePages())
                <a class="btn btn-primary float-left" href="{{$posts->PreviousPageurl()}}">&larr;Previous Posts</a>
            @else
                <a class="btn btn-primary float-left" href="{{$posts->PreviousPageurl()}}">&larr;Previous Posts</a>
                <a class="btn btn-primary float-right" href="{{$posts->nextPageurl()}}">Older Posts &rarr;</a>
        @endif
        </div>
    </div>
@endsection
