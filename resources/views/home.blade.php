@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">

                        <h3>Your Blog Posts</h3>

                        <table class="table table-striped">

                            @foreach($posts as $post)
                                <tr>
                                    <td><a href="{{route('posts.show', ['post' =>$post->id])}}">{{$post->title}}</a></td>

                                    <td><a href ="{{route('posts.edit', ['post' =>$post->id])}}" class="btn btn-default">Edit</a></td>
                                    <td>
                                        {!! Form::open(['action'=>['PostController@destroy', $post->id],'method' =>'POST','class'=> 'pull-right'])!!}
                                        {!! Form::hidden('_method','DELETE') !!}
                                        {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach

                        </table>

                        {{--<a href ="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>--}}

                        {{--a href ="{{ route('posts.index') }}" class="btn btn-primary">View all Posts</a>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection