@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
        <div class="card col-md-6">
            <div class="card-body">
                <h5 class="card-title">Company name</h5>
                <p class="card-text">{{ $show->name }}</p>
            </div>
        </div>
        <div class="card col-md-6">
            <div class="card-body">
                <h5 class="card-title">Company logo</h5>
                <img src="{{ Storage::url($show->logo) }}" alt="" width="100" height="auto">
            </div>
        </div>
    </div>
</div>
@endsection