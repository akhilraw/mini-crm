@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Company Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter company name" required="required">
                @if($errors->has('name'))
                <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Enter email" required="required">
                @if($errors->has('email'))
                <div class="text-danger">{{ $errors->first('email') }}</div>
                @endif
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label for="logo">Company Logo</label>
                <input type="file" class="form-control-file" id="logo" name="logo" aria-describedby="logoHelp" required="required">
                <small id="logoHelp" class="form-text text-muted">logo dimension should be atleast 100x100.</small>
                @if($errors->has('logo'))
                <div class="text-danger">{{ $errors->first('logo') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="website">Company website</label>
                <input type="website" class="form-control" id="website" name="website" value="{{ old('website') }}" placeholder="Enter company website" required="required">
                @if($errors->has('website'))
                <div class="text-danger">{{ $errors->first('website') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
