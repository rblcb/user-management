@extends('admin.inc.layout')

@section('content')
<div class="starter-template">
    @if(isset($user))
    <div class="page-header">
        <h1>{{ $user->fullname }}</h1>
        @if(Auth::user()->isAdmin())
        <a href="{{ URL::to('/admin/users/'.$user->id.'/edit') }}" class="btn btn-primary">Edit</a>
        {{Form::delete('admin/users/'. $user->id, 'Delete', array('style'=>'display:inline','class' => 'delete-form'), array('class' => 'btn btn-danger') )}}
        @endif
    </div>
    <div class="row">
        <div class="col-md-3 text-muted"><h5>Name:</h5></div>
        <div class="col-md-9"><h5>{{ $user->fullname }}</h5></div>
    </div>
    <div class="row">
        <div class="col-md-3 text-muted"><h5>Username:</h5></div>
        <div class="col-md-9"><h5>{{ $user->username }}</h5></div>
    </div>
    <div class="row">
        <div class="col-md-3 text-muted"><h5>Email:</h5></div>
        <div class="col-md-9"><h5>{{ $user->email }}</h5></div>
    </div>
    @if(count($groups) > 0)
    <div class="row">
        <div class="col-md-3 text-muted"><h5>Groups:</h5></div>
        <div class="col-md-9">
            <ul class="list-group">
                @foreach($groups as $group)
                <li class="list-group-item">{{ $group->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
    <hr>

    @endif
</div>
@stop