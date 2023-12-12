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
                    <a href="{{ route('home') }}" type="submit" class="btn btn-secondary">Home</a>
                    <a href="{{ route('companies.index') }}" type="submit" class="btn btn-success">Companies List</a>
                    <div class="card mt-3">
                        <div class="card-header">Create Company</div>
                        <div class="card-body">
                            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-6 mt-3">
                                    <label for="name">Company Name</label>
                                    <input type="text" name="name" id="name" placeholder="ABC (Pvt) Ltd"  class="form-control mt-2"/>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="website">Company Website</label>
                                    <input type="text" name="website" id="website" placeholder="www.abc.com"  class="form-control mt-2"/>
                                    @error('website')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="email">Company Email</label>
                                    <input type="email" name="email" id="email" placeholder="abc@gmail.com"  class="form-control mt-2"/>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="logo">Company Logo</label>
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
