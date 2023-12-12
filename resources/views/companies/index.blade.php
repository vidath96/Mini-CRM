@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Companies</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('companies.create') }}" type="submit" class="btn btn-success">Create new company</a>
                    <div class="card mt-3">
                        <div class="card-header">Companies List</div>
                        <div class="card-body">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                    <th>Name</th>
                                    <th>Website</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $company)
                                    <tr>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->website }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td>
                                            <a href="{{ route('companies.show',$company->id) }}" class="btn btn-info">View</a>
                                            <a href="{{ route('companies.edit',$company->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('companies.destroy',$company->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $companies->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
