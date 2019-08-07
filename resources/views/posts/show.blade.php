@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$post->title}}</h1>
        <div>
            {{$post->body}}
        </div>
        <hr>
        <small>Written On {{$post->created_at}} by {{$post->user->username}}</small>
        <br/>
        <br/>

        <a href ="{{ route('posts.index') }}" class="btn btn-primary">View all Posts</a>

        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
                <a href="{{route('posts.edit', ['post' =>$post->id])}}" class="btn btn-primary" >Edit</a>
                {!! Form::open(['action'=>['PostController@destroy', $post->id],'method' =>'POST','class'=> 'pull-right'])!!}
                    {!! Form::hidden('_method','DELETE') !!}
                    {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                {!! Form::close() !!}
            @endif
        @endif
        <br/>
        <br/>
        <br/>
        <table class="table table-striped">
            <tr>
                <th>Comments</th>
                <th></th>
                <th></th>
            </tr>
            @foreach($post->comments as $comment)
                <tr>
                    <td>{{$comment->firstname}}</td>
                    <td>{{$comment->comment}}</td>
                </tr>
            @endforeach

        </table>


        <div class="row">
            <div id="comment-form" class="col-md-15 col-md-offset-0" style="margin-top: 40px;">
                {{Form::open(['route' => ['comments.store', $post->id],'method'=> 'POST'])}}
                <div class="row">
                    <div class="col-md-3">
                        {{Form::label('firstname', "Name:")}}
                        {{Form::text('firstname', null, ['class'=> 'form-control'])}}
                    </div>

                    <div class="col-md-9">
                        {{Form::label('comment', "Comment:")}}
                        {{Form::text('comment', null, ['class'=> 'form-control', 'rows' => '10'])}}
                    </div>
                    <div class="col-md-2">
                        {{Form::submit('Add Comment', ['class'=>'btn btn-success btn-block', 'style' => 'margin-top:10px;'])}}
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection