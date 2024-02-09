{{-- todos os tickets --}}

@extends('layouts.frontOffice')

@section('content')

@if (session('message'))
<div class="alert alert-success">
    {{session('message')}}
</div>
@endif
@if(session('alert'))
<div class="alert alert-danger">
    {{session('alert')}}
</div>
@endif

<div class="container">

    <table class="table table-striped" style="text-align: center">

        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Subject</th>
                <th scope="col">Description</th>
                <th scope="col">Creator</th>
                <th scope="col">Created at</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->subject}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->creator}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->status}}</td>

                {{-- <td>@if($item->user_type == \App\Models\User::ADMIN)
                    Admin
                    @elseif($item->user_type == \App\Models\User::TECHNITIAN)
                    Technitian
                    @else
                    Costumer
                    @endif
                </td> --}}
                <td>
                    <a href="{{ route('viewTicket',$item ->id) }}">
                        <button class="btn btn-warning">
                            View
                        </button>
                    </a>
                </td>
                {{-- <td>
                    <a href="{{ route('deleteUser',$item ->id) }}">
                <button class="btn btn-danger">Delete</button>
                </a>
                </td> --}}


            </tr>
            @endforeach
        </tbody>
    </table>
    <div class=""><a href="{{route('home')}}">Voltar</a></div>

</div>


@endsection


{{-- tickets do utilizador que fez login --}}
