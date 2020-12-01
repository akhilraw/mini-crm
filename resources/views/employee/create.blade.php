@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="firstname"> firstname</label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter firstname" required="required">
            </div>
            <div class="form-group">
                <label for="lastname"> lastname</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter lastname" required="required">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required="required">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="company_id">Company </label>
                <select class="custom-select" name="company_id">
                    <option selected>Open this select menu</option>
                    @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="phone"> phone</label>
                <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter phone" required="required">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
