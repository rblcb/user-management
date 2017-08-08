@extends('admin.inc.layout')

@section('content')
<div class="starter-template">

    <div class="page-header">
        <h1>New user</h1>
    </div>
    @if(Session::get("messages") != null)
    <div class="alert alert-danger" role="alert">
        @foreach(Session::get("messages")->all() as $message)
        <p>{{ $message }}</p>
        @endforeach
    </div>
    @endif

    {{ Form::open(array('url' => 'admin/users', 'class' => 'form-horizontal')) }}
    <div class="form-group">
        {{ Form::label('fullname', 'Fullname', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-8">
        {{ Form::text('fullname', Input::old('fullname'), array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email address', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-8">
        {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
        </div>
    </div>
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
        {{ Form::label('password_confirmation', 'Password conformation', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-8">
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
        </div>
    </div>
    @if(count($groups) > 0)
    <div class="form-group">
        {{ Form::label('groups', 'Groups', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-8">
        {{ Form::select('groups', array('default' => 'Select group') + $groups, 'default', array('class' => 'form-control')) }}
        </div>
    </div>
    @endif
    <div class="form-group">
        {{ Form::submit('Submit', array('class' => 'btn btn-default')) }}
    </div>
    {{ Form::close() }}
    <hr>

</div>
@stop