@extends('layouts.template')

@section('container')
    <div class="row">
        <div class="col-md-6 offset-md-3" style="margin-top: 50px">
            <h4>Employee Dashboard</h4><hr>
            <table class="table table-striped table-inverse table-dark table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Jobdesc</th>
                        <th>Address</th>
                        <th>Age</th>
                        <th>Salary</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ Auth::guard('employee')->user()->name }}</td>
                        <td>{{ Auth::guard('employee')->user()->email }}</td>
                        <td>{{ Auth::guard('employee')->user()->jobdesc }}</td>
                        <td>{{ Auth::guard('employee')->user()->address }}</td>
                        <td>{{ Auth::guard('employee')->user()->age }}</td>
                        <td>Rp. {{ Auth::guard('employee')->user()->salary }}-,</td>
                        <td>
                            <a href="{{ route('employee.logout') }}" onclick="
                            event.preventDefault();
                            document.getElementById('logout-form').submit();">Log out</a>
                            <form action="{{ route('employee.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
