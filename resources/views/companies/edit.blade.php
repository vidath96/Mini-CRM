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
                        <div class="card-header">Edit Company</div>
                        <div class="card-body">
                            <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-6 mt-3">
                                    <label for="name">Company Name</label>
                                    <input type="text" name="name" id="name" value="{{ $company->name }}"  class="form-control mt-2"/>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="website">Company Website</label>
                                    <input type="text" name="website" id="website" value="{{ $company->website }}"  class="form-control mt-2"/>
                                    @error('website')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="email">Company Email</label>
                                    <input type="email" name="email" id="email"  value="{{ $company->email }}"  class="form-control mt-2"/>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="logo">Company Logo</label>
                                    <img src="{{ url($company->logo) }}" alt="{{ 'image_'.$company->name }}"/>
                                    <input type="file" name="logo" id="logo" class="form-control mt-2"/>
                                    @error('file')
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
