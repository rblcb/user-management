@extends('admin.inc.layout')

@section('content')
<div class="starter-template">
    @if(isset($group))
    <div class="page-header">
        <h1>{{ $group->name }}</h1>
        @if(Auth::user()->isAdmin())
        <a href="{{ URL::to('/admin/groups/'.$group->id) }}" class="btn btn-primary">Edit</a>
        {{Form::delete('admin/groups/'. $group->id, 'Delete', array('style'=>'display:inline','class' => 'delete-form'), array('class' => 'btn btn-danger') )}}
        @endif
    </div>
    <div class="row">
        <div class="col-md-3 text-muted"><h5>Name:</h5></div>
        <div class="col-md-9"><h5>{{ $group->name }}</h5></div>
    </div>
    <hr>

    @endif
</div>
@stop