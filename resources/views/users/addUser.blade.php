@extends('layouts.frontOffice')
@section('content')
<div class="container">
    <div>

        <form method="POST" action="{{route('createUser')}}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">Name</label>
                <input name="name" type="text" required class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
                @error('name')
                <div class="--bs-danger-text-emphasis">
                    Name error!
                </div>
                @enderror
                <div id="nameHelp" class="form-text">Insert your name here.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" type="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('email:unique:users')
                <div class="--bs-danger-text-emphasis">
                    Email error!
                </div>
                @enderror
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPhone1" class="form-label">Phone Number</label>
                <input name="phone" type="tel" required class="form-control" id="exampleInputPhone1" aria-describedby="phoneHelp">
                @error('phone')
                <div class="--bs-danger-text-emphasis">
                    Phone error!
                </div>
                @enderror
                <div id="phoneHelp" class="form-text">We'll never share your phone number with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" required class="form-control" id="exampleInputPassword1">
                @error('password')
                <div class="--bs-danger-text-emphasis">
                    Password error!
                </div>

                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
<p></p>
<div class="container"><a href="{{route('home')}}">Back</a></div>
@endsection
