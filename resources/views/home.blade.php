@extends('layouts.frontOffice')

@section('content')

<div class="container">
    <ul>
        <a href="{{ route('allUsers') }}">
            <li>All Users</li>
        </a>
    </ul>
    <ul>
        <a href="{{ route('addUser') }}">
            <li>Add User</li>
        </a>
    </ul>
    <ul>
        <li>View profile</li>
    </ul>
    <ul>
        <a href="{{ route('allTickets') }}">
            <li>All tickets</li>
        </a>
    </ul>
    <ul>
        <a href="{{ route('addTicket') }}">
            <li>Create ticket</li>
        </a>
    </ul>
</div>

@endsection
