@extends('layouts.template')

@section('container')
    <div class="row">
        <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
            <h4 class="fw-bold">User Login</h4>
            <form action="{{ route('user.create') }}" method="post" autocomplete="off">
                @if ( Session::get('success') )
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if ( Session::get('fail') )
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
                @endif

                @csrf
                <div class="form-group my-4">
                    <label for="name">Your Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter full name" value="{{ old('name') }}">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group my-4">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter email address" value="{{ old('email') }}">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group my-4">
                    <label for="password">Enter password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                    @enderror
                    </span>
                </div>
                <div class="form-group my-3">
                    <label for="cpassword">Enter confirm password</label>
                    <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Enter confirm password">
                    <span class="text-danger">
                        @error('cpassword')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>

                <br>
                <a href="{{ route('user.login') }}" class="text-decoration-none">I already have an account</a>
            </form>
        </div>
    </div>
@endsection
