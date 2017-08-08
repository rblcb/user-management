@extends('admin.inc.layout')

@section('content')
<div class="starter-template">
    <div class="page-header">
        @if(Session::get("message") != null)
        <div class="alert alert-danger" role="alert">
            <p>{{ Session::get("message") }}</p>
        </div>
        @endif
        <h1>Groups</h1>
        @if(Auth::user()->isAdmin())
        <a href="{{ URL::to('admin/groups/create') }}">
            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> New group</button>
        </a>
        @endif
    </div>
    <div class="table-responsive">
        @if(isset($groups))
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Group name</th>
            </tr>
            </thead>
            <tbody>
            <?php $index = 1; ?>
            @foreach($groups as $group)
            <tr>
                <td>{{ $index }}</td>
                <td>{{ $group->name }}</td>
                <td>
                    <a href="{{ URL::to('/admin/groups/'.$group->id) }}" class="btn btn-info">View</a>
                    </a>
                    @if(Auth::user()->isAdmin())
                    <a href="{{ URL::to('/admin/groups/'.$group->id.'/edit' ) }}" class="btn btn-primary">Edit</a>
                    {{Form::delete('admin/groups/'. $group->id, 'Delete', array('style'=>'display:inline','class' => 'delete-form'), array('class' => 'btn btn-danger') )}}
                    @endif
                </td>
            </tr>
            <?php $index++; ?>
            @endforeach
            </tbody>
        </table>
        @else
        <p>
            No groups in database, create new?
            <a href="{{ URL::to('admin/groups/create') }}">New group</a>
        </p>
        @endif
    </div>
    @if(Auth::user()->isAdmin())
    <a href="{{ URL::to('admin/groups/create') }}">
        <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> New group</button>
    </a>
    @endif
</div>
@stop