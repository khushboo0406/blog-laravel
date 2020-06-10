@extends('pages.layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1>Create Article</h1>
{!! Form::open(['action' =>'PostsController@store','method' => 'POST']) !!}

<div class="form-group">
{{ Form::label('title', 'Title') }}
{{Form::Text('title','',['class'=>'form-control','placeholder'=>'Enter Title'])}}

</div>
<div class="form-group">
{{ Form::label('Description', 'Description') }}
{{ Form::Textarea('description','',['class'=>'form-control','placeholder'=>'Enter Description'])}}

</div>
{{ Form::submit('Submit',['class'=>'btn btn-success'])}}
{!! Form::close() !!}

@endsection

