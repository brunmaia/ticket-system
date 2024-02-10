{{-- mostra o tickets e os updates --}}
@extends('layouts.frontOffice')

@section('content')
<div class="container">
    <form action="{{ route('updateStatus', $ticket->id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="mb-3 row">
            <div class="">
                <label for="status">Status:</label>
            </div>
            <div class="col-md-3">
                <select name="status" id="status" class="form-select">
                    <option value="open" {{ $ticket->status==='open' ? 'selected' : ''}}>Open</option>
                    <option value="closed" {{ $ticket->status==='closed' ? 'selected' : ''}}>Closed</option>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-bottom">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>
<div class="container">
    <div>
        <table class="table">
            <tr>
                <th scope="col">Ticket id: {{ $ticket->id }}</th>
                <th scope="col">Created at: {{ $ticket->created_at }}</th>
                <th scope="col">Creator: {{ $ticket->creator }}</th>
                <th scope="col">Status: {{ $ticket->status }}</th>
            </tr>
        </table>
        <b>Subject:</b>{{ $ticket->subject }} <br>
        <b>Description:</b> <br> {{ $ticket->description }} <br>

    </div>
    <p></p>
    @if($ticketUpdate->isNotEmpty())
    @foreach ($ticketUpdate as $update)
    <p>
        <b>Time of update:</b>{{ $update->updated_at }} <br>
        <b>Technitian:</b>{{ $update->technitian }} <br>
        <b>Description:</b> <br> {{ $update->description }} <br>
    </p>
    @endforeach
    @endif

</div>
@if($ticket->status==='open')

<div class="container">
    <form action="{{route('updateTicket')}}" method="post">
        @csrf
        <div hidden class="mb-3">
            <label for="exampleInputName1" class="form-label">Id</label>
            <input name="ticket_id" type="number" value='{{$ticket->id}}' class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInput1" class="form-label">Update:</label>
            <input name="description" type="text" value="" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInput1" class="form-label">Technitian:</label>
            <input name="technitian" type="number" value="" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endif



@endsection

{{-- se for o tecnico insere update --}}
