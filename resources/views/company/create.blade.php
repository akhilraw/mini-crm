@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Company Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter company name" required="required">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required="required">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label for="logo">Company Logo</label>
                <input type="file" class="form-control-file" id="logo" name="logo" aria-describedby="logoHelp" required="required">
                <small id="logoHelp" class="form-text text-muted">logo dimension should be atleast 100x100.</small>
            </div>
            <div class="form-group">
                <label for="website">Company website</label>
                <input type="website" class="form-control" id="website" name="website" placeholder="Enter company website" required="required">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection