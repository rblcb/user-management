@extends('admin.inc.layout')

@section('content')
<div class="starter-template">

    <div class="page-header">
        <h1>New group</h1>
    </div>
    @if(Session::get("messages") != null)
    <div class="alert alert-danger" role="alert">
        @foreach(Session::get("messages")->all() as $message)
        <p>{{ $message }}</p>
        @endforeach
    </div>
    @endif

    {{ Form::open(array('url' => 'admin/groups', 'class' => 'form-horizontal')) }}
    <div class="form-group">
        {{ Form::label('name', 'Name', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-8">
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::submit('New group', array('class' => 'btn btn-default col-sm-offset-2')) }}
    </div>
    {{ Form::close() }}
    <hr>

</div>
@stop