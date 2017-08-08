@extends('inc.layout')

@section('content')
<div class="starter-template">
    <h1>Login</h1>
    @if(Session::get('error') != null)
    <div class="alert alert-warning" role="alert">{{ Session::get('error') }}</div>
    @endif
    {{ Form::open(array('url' => 'login', 'class' => 'form-horizontal')) }}
    <div class="form-group">
        {{ Form::label('username', 'Username', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-8">
        {{ Form::text('username', Input::old('username'), array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('password', 'Password', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-8">
        {{ Form::password('password', array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::submit('Login', array('class' => 'btn btn-default col-sm-offset-2')) }}
    </div>
    {{ Form::close() }}
</div>
@stop