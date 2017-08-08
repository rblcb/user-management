@extends('admin.inc.layout')

@section('content')
<div class="starter-template">
    @if(isset($user))
    <div class="page-header">
        <h1>Edit user</h1>
    </div>
    @if(Session::get("messages") != null)
    <div class="alert alert-danger" role="alert">
        @foreach(Session::get("messages")->all() as $message)
        <p>{{ $message }}</p>
        @endforeach
    </div>
    @endif

    {{ Form::open(array('method' => 'put', 'url' => 'admin/users/'.$user->id, 'class' => 'form-horizontal')) }}
    <div class="form-group">
        {{ Form::label('fullname', 'Fullname', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-8">
        {{ Form::text('fullname', $user->fullname, array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email address', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-8">
        {{ Form::text('email', $user->email, array('class' => 'form-control')) }}
        </div>
    </div>
    @if(!$user->isAdmin())
    <div class="form-group">
        {{ Form::label('username', 'Username', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-8">
        {{ Form::text('username', $user->username, array('class' => 'form-control')) }}
        </div>
    </div>
    @endif
    <div class="form-group">
        {{ Form::label('password', 'Password', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-8">
        {{ Form::password('password', array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('password_confirmation', 'Password confirmation', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-8">
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
        </div>
    </div>
    @if($user->isAdmin())
    @if(count($groups) > 0)
    <div class="form-group">
        {{ Form::label('groups', 'Groups', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-8">
        {{ Form::select('groups', array('default' => 'Select group') + $groups, 'default', array('class' => 'form-control')) }}
        </div>
    </div>
    @endif
    @endif

    @if(count($user->groups))
    <div class="form-group ">
        {{ Form::label('', 'Selected groups', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-8">
            <ul class="list-group">
                @foreach($user->groups as $group)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-9">
                            {{ $group->name }}
                        </div>
                        <div class="col-md-3">
                            <a href="{{ URL::to('admin/users/group/detach/'.$group->id.'/'.$user->id) }}" class="btn btn btn-danger btn-xs">Delete</a>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
    <div class="form-group">
        {{ Form::submit('Update', array('class' => 'btn btn-default col-sm-offset-2')) }}
    </div>
    {{ Form::close() }}
    <hr>
    @endif
</div>
@stop