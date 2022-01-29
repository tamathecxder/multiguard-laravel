@extends('layouts.template')

@section('container')
<div class="row">
    <div class="col-md-6 offset-md-3" style="margin-top: 50px">
        <h4>Admin Dashboard</h4>
        <table class="table table-striped table-inverse table-dark table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ Auth::guard('admin')->user()->name }}</td>
                    <td>{{ Auth::guard('admin')->user()->email }}</td>
                    <td>{{ Auth::guard('admin')->user()->phone }}</td>
                    <td>
                        <a href="{{ route('admin.logout') }}" class="text-decoration-none" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form action="{{ route('admin.logout') }}" method="post" id="logout-form">@csrf</form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
