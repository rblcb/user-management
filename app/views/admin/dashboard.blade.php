@extends('admin.inc.layout')

@section('content')
<div class="starter-template">
    <h1>Admin dashboard</h1>
    @if(Session::get('success') != null)
    <div class="alert alert-success" role="alert">{{ Session::get('success')}}</div>
    @endif
    <p class="lead">
        <ul>
        <li>- As an admin I can add users. A user has a name</li>

        <li>- As an admin I can delete users</li>

        <li>- As an admin I can assign users to a group they aren’t already part of</li>

        <li>- As an admin I can remove users from a group</li>

        <li>- As an admin I can create groups</li>

        <li>- As an admin I can delete groups when they no longer have members</li>
        </ul>
    </p>
</div>
@stop