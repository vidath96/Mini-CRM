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
                    <a href="{{ route('home') }}" type="submit" class="btn btn-secondary">Home</a>
                    <a href="{{ route('employees.index') }}" type="submit" class="btn btn-success">Employees List</a>
                    <div class="card mt-3">
                        <div class="card-header">Edit Employee</div>
                        <div class="card-body">
                            <form action="{{ route('employees.update',$employee->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="col-6 mt-3">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" id="first_name" value="{{ $employee->first_name }}"  class="form-control mt-2"/>
                                    @error('first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" value="{{ $employee->last_name }}"  class="form-control mt-2"/>
                                    @error('last_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                 <div class="col-6 mt-3">
                                    <label for="company_id">Company</label>
                                    <select name="company_id" id="company_id"  class="form-control mt-2">
                                        @foreach ($companies as $company)
                                            @if ($company->id == $employee->company_id)
                                                <option value="{{$company->id}}" selected>{{ $company->name }}</option>
                                            @else
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('company_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" value="{{ $employee->email }}"  class="form-control mt-2"/>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="phone">Phone</label>
                                    <input type="tel" name="phone" id="phone" value="{{ $employee->phone }}"  class="form-control mt-2"/>
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-warning mt-3">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
