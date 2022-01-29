@extends('layouts.template')

@section('container')
    <div class="row">
        <div class="col-md-6 offset-md-3" style="margin-top: 50px">
            <h4>User Dashboard</h4><hr>
            <table class="table table-striped table-inverse table-dark table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ Auth::guard('web')->user()->name }}</td>
                        <td>{{ Auth::guard('web')->user()->email }}</td>
                        <td>
                            <a href="{{ route('user.logout') }}" onclick="
                            event.preventDefault();
                            document.getElementById('logout-form').submit();">log out</a>
                            <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
