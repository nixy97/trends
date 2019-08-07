
@extends('layouts.app')

    @section('content')
        <div class="container">
            <h1>Posts</h1>
            @if(count($post) > 0)
                @foreach($post as $post)
                    <div class="well">
                        <h3><a href="{{route('posts.show', ['post' =>$post->id])}}">{{$post->title}}</a></h3>
                        <small>Written on {{$post->created_at}} by {{$post->user->username}}</small>
                    </div>
                @endforeach

            @else
                <h3>No posts found</h3>
                <br/>
            @endif
            <a href ="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
        </div>
    @endsection


