@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card col-md-6">
            <div class="card-body">
                <h5 class="card-title">Companies</h5>
                <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum deleniti voluptates, explicabo molestiae eligendi in eaque necessitatibus cumque ratione. Ipsam!</p>
                <a href="{{ route('companies.index') }}" class="card-link">Manage Companies</a>
                <a href="{{ route('companies.create') }}" class="card-link">Add Company</a>
            </div>
        </div>
        <div class="card col-md-6">
            <div class="card-body">
                <h5 class="card-title">Employees</h5>
                <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit optio error eius ducimus soluta, iusto culpa sit, eos officiis dignissimos esse hic enim modi repudiandae.</p>
                <a href="{{ route('employees.index') }}" class="card-link">Manage Employees</a>
                <a href="{{ route('employees.create') }}" class="card-link">Add Employee</a>
            </div>
        </div>
    </div>
</div>
@endsection