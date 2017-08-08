@extends('admin.inc.layout')

@section('content')
<div class="starter-template">
    <div class="page-header">
        <h1>Users</h1>
        @if(Auth::user()->isAdmin())
        <a href="{{ URL::to('admin/users/create') }}">
            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> New user</button>
        </a>
        @endif
    </div>
    <div class="table-responsive">
        @if(isset($users))
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fullname</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $index = 1; ?>
                @foreach($users as $user)
                <tr>
                    <td>{{ $index }}</td>
                    <td>{{ $user->fullname }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ URL::to('/admin/users/'.$user->id) }}" class="btn btn-info">View</a>
                        </a>
                        @if(Auth::user()->isAdmin())
                            <a href="{{ URL::to('/admin/users/'.$user->id.'/edit' ) }}" class="btn btn-primary">Edit</a>
                            {{Form::delete('admin/users/'. $user->id, 'Delete', array('style'=>'display:inline','class' => 'delete-form'), array('class' => 'btn btn-danger') )}}
                        @endif
                    </td>
                </tr>
                <?php $index++; ?>
                @endforeach
            </tbody>
        </table>
        @else
        <p>
            No users in database, create new?
        </p>
        @endif
    </div>
    @if(Auth::user()->isAdmin())
    <a href="{{ URL::to('admin/users/create') }}">
        <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> New user</button>
    </a>
    @endif
</div>
@stop