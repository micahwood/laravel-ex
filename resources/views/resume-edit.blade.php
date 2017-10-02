@extends('layout')

@section('content')
    <h2>Update your resume</h2>
    {!! Form::open(['route' => ['resume.update', $resume], 'class' => 'form']) !!}
        <input type="hidden" name="_method" value="PUT">
        <textarea name="body" id="body">{{ $resume->body }}</textarea>

        {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}

    <script>
        $('#body').jqte();
    </script>
@stop

@section('scripts')
    <link rel="stylesheet" href="/libs/jquery-te-1.4.0.css">
    <script src="/libs/jquery-te-1.4.0.min.js"></script>
@stop