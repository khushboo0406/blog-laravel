@extends('pages.layouts.app')

@section('content')

<h1>Edit Article</h1>

{!! Form::open(['action' => ['PostsController@update', $post->id],'method' => 'POST']) !!}

<div class="form-group">
{{ Form::label('title', 'Title') }}
{{Form::Text('title',$post->title,['class'=>'form-control','placeholder'=>'Enter Title'])}}

</div>
<div class="form-group">
{{ Form::label('Description', 'Description') }}
{{ Form::Textarea('description',$post->Description,['class'=>'form-control','placeholder'=>'Enter Description'])}}

</div>
{{ Form::submit('Submit',['class'=>'btn btn-success'])}}
{{Form::hidden('_method','PUT')}}
{!! Form::close() !!}

@endsection



