@extends('layouts.app')

@section('content')
<style>
    .btn {
        /* padding: 10px 20px; */
        font-size: 15px;
        border-radius: 10px;
        width: 15%;
        margin-bottom: 5px;
        margin-top:10px;
    }
</style>

<!-- 
@if (auth::check()) -->
<a href="/posts/create" class="btn btn-primary">Create Post</a>
<h1 class="text-center">All Articles</h1>
@if(!empty($posts))
<p>The Articles are as follows:</p>
@foreach($posts as $post)
<div class="card bg-light p-3">
    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
    <h5><i>Edited on {{$post->created_at}}</i></h5>
    <a href="/posts/{{urlencode(encrypt($post->id))}}/edit" class="btn btn-sm btn-success">EDIT</a><br>
    <!-- <a href="/posts/{{$post->id}}/delete" class="btn btn-sm btn-primary">Delete</a> -->
    {!!Form::open(['action' => ['PostsController@destroy', $post->id],'method' => 'POST']) !!}

    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('DELETE',['class'=>'btn btn-danger'])}}
    {!! Form::close() !!}
</div>

@endforeach

@else
<br>
<h3 class="text-center">No Articles Found</h3>
@endif

@else
<h3>Please login</h3>

<!-- @endif -->
<!-- <a href="/posts/create" class="btn btn-primary">Create Post</a> -->

@endsection