@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <form action="{{ route('employees.update', $employee->id) }}" method="post" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PUT">
            @csrf
            <div class="form-group">
                <label for="firstname"> firstname</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $employee->firstname }}" placeholder="Enter firstname" required="required">
                @if($errors->has('firstname'))
                <div class="text-danger">{{ $errors->first('firstname') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="lastname"> lastname</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $employee->lastname }}" placeholder="Enter lastname" required="required">
                @if($errors->has('lastname'))
                <div class="text-danger">{{ $errors->first('lastname') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}" aria-describedby="emailHelp" placeholder="Enter email" required="required">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                @if($errors->has('email'))
                <div class="text-danger">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="company_id">Company </label>
                <select class="custom-select" name="company_id">
                    <option>Open this select menu</option>
                    @foreach ($companies as $company)
                    <option value="{{ $company->id }}" @if($company->id == $employee->company_id) selected @endif>{{ $company->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('company_id'))
                <div class="text-danger">{{ $errors->first('company_id') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="phone"> phone</label>
                <input type="number" class="form-control" id="phone" name="phone" value="{{ $employee->phone }}" placeholder="Enter phone" required="required">
                @if($errors->has('phone'))
                <div class="text-danger">{{ $errors->first('phone') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection