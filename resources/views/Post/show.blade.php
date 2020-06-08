@extends('layouts.app')

@section('content')

<h1>{{$post->title}}</h1>
<hr>
<div>
{{$post->Description}}
</div>
<hr>
@endsection

<!-- {!!Form::open(['action' => ['PostsController@destroy', $post->id],'method' => 'POST']) !!}

{{Form::hidden('_method','DELETE')}}
{{Form::submit('DELETE',['class'=>'btn btn-success'])}}
{!! Form::close() !!} -->