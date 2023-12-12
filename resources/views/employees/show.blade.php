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
                        <div class="card-header">View Employee</div>
                        <div class="card-body">
                            <form>
                                @csrf
                                <div class="col-6 mt-3">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" id="first_name" value="{{ $employee->first_name }}"  class="form-control mt-2" readonly/>
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" value="{{ $employee->last_name }}"  class="form-control mt-2" readonly/>
                                </div>
                                 <div class="col-6 mt-3">
                                    <label for="company_id">Company</label>
                                    <input type="text" name="company_id" id="company_id" value="{{ $employee->company->name }}" class="form-control mt-2" readonly/>
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" value="{{ $employee->email }}"  class="form-control mt-2" readonly/>
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="phone">Phone</label>
                                    <input type="tel" name="phone" id="phone" value="{{ $employee->phone }}"  class="form-control mt-2" readonly/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
