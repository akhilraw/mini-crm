@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card col-md-6">
            <div class="card-body">
                <h5 class="card-title">Employee name</h5>
                <p class="card-text">{{ $show->firstname. ' '.$show->lastname }}</p>
            </div>
        </div>
        <div class="card col-md-6">
            <div class="card-body">
                <h5 class="card-title">Company name</h5>
                <p class="card-text">{{ $show->company->name }}</p>
            </div>
        </div>
    </div>
</div>
@endsection