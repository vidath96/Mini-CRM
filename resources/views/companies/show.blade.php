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
                    <a href="{{ route('companies.index') }}" type="submit" class="btn btn-success">Companies List</a>
                    <div class="card mt-3">
                        <div class="card-header">View Company</div>
                        <div class="card-body">
                            <form>
                                <div class="col-6 mt-3">
                                    <label for="name">Company Name</label>
                                    <input type="text" name="name" id="name" value="{{ $company->name }}"  class="form-control mt-2"/>
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="website">Company Website</label>
                                    <input type="text" name="website" id="website" value="{{ $company->website }}"  class="form-control mt-2"/>
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="email">Company Email</label>
                                    <input type="email" name="email" id="email" value="{{ $company->email }}"  class="form-control mt-2"/>
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="logo">Company Logo</label>
                                    <img src="{{ url($company->logo) }}" alt="{{ 'image_'.$company->name }}"/>
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
