@extends('layouts.frontOffice')

@section('content')
<div class="container">

    <form method="POST" action="{{route('createTicket')}}">
        @csrf
        <div class="mb-3">
            <label for="subject" class="form-label">Subject:</label>
            <input type="text" class="form-control" id="subject" name="subject">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <input type="text" class="form-control" id="description" name="description">
            <div id="descriptionHelp" class="form-text">Steps to reproduce the problem. <br>
                Any error messages received. <br>
                Screenshots or error logs, if applicable. <br>
                The impact of the issue on your work or system.</div>
        </div>
        <div class="mb-3">
            <label for="creator" class="form-label">Creator:</label>
            <input type="number" class="form-control" id="creator" name="creator">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
