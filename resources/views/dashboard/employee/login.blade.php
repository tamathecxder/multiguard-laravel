@extends('layouts.template')

@section('container')
    <div class="row">
        <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4 col-sm-8 offset-sm-2 col" style="margin-top: 10%;">
            <form class="form-signin" method="post" action="{{ route('employee.check') }}" autocomplete="off">
                @if ( Session::get('fail') )
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif

                @csrf
                <div class="text-center">
                    <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal">Employee sign in</h1>
                    <div class="mb-3">
                        <label for="email" class="sr-only mb-1">Email address</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email address" value="{{ old('email') }}">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="sr-only mb-1">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button class="btn btn-lg btn-primary" type="submit">Sign in</button>
                </div>

                <br>
                <a href="{{ route('employee.register') }}" class="text-decoration-none text-right">Don't have an account? register Here</a>
            </form>
        </div>
    </div>
@endsection
