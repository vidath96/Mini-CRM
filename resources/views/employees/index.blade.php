@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Employees</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('employees.create') }}" type="submit" class="btn btn-success">Create new employee</a>
                    <div class="card mt-3">
                        <div class="card-header">Employees List</div>
                        <div class="card-body">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Company Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->first_name }}</td>
                                        <td>{{ $employee->last_name }}</td>
                                        <td>{{ $employee->Company->name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>
                                            <button class="btn btn-info">View</button>
                                            <button class="btn btn-primary">Edit</button>
                                            <button class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $employees->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
