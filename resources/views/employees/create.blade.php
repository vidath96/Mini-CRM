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
                    <a href="{{ route('employees.index') }}" type="submit" class="btn btn-success">Employees List</a>
                    <div class="card mt-3">
                        <div class="card-header">Create Employee</div>
                        <div class="card-body">
                            <form action="{{ route('employees.store') }}" method="POST">
                                @csrf
                                <div class="col-6 mt-3">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" id="first_name" placeholder="Jhon"  class="form-control mt-2"/>
                                    @error('first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" placeholder="Doe"  class="form-control mt-2"/>
                                    @error('last_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                 <div class="col-6 mt-3">
                                    <label for="company_id">Company</label>
                                    <select name="company_id" id="company_id"  class="form-control mt-2">
                                        <option value="">Choose Company</option>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('company_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" placeholder="abc@gmail.com"  class="form-control mt-2"/>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="phone">Phone</label>
                                    <input type="tel" name="phone" id="phone" placeholder="0711234567"  class="form-control mt-2"/>
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
