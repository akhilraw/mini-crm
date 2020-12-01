@extends('layouts.app')

@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage employees</li>
        </ol>
    </nav>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">company</th>
                <th scope="col">email</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employees as $employee)
            <tr>
                <th scope="row">{{ $employee->id }}</th>
                <td>{{ $employee->firstname. ' '. $employee->lastname }}</td>
                <td>{{ $employee->company_id }}</td>
                <td>{{ $employee->email }}</td>
                <td>
                    <a class="btn btn-warning waves-effect waves-light" href="{{ route('employees.show',$employee->id) }}"><i class="ti-eye"></i>show</a>
                    <a class="btn btn-success waves-effect waves-light" href="{{ route('employees.edit',$employee->id) }}"><i class="ti-pencil"></i>edit</a>
                    <button class="btn btn-danger waves-effect waves-light" onclick="showDeleteModal('{{ route('employees.destroy',[$employee->id]) }}')">delete
                        <i class="mdi mdi-close"></i>
                    </button>

                </td>
            </tr>
            @empty
            <p>no data found</p>
            @endforelse
        </tbody>
    </table>
    <!-- Danger Alert Modal -->
    <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content modal-filled bg-danger">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-wrong h1 text-white"></i>
                        <h4 class="mt-2 text-white">Confirm Delete!</h4>
                        <form action="{{ route('employees.destroy', $employee->id) }}" id="delete-from" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="btn btn-light my-2">Yes, Delete</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('.table').DataTable();
    });
</script>
<script>
    function showDeleteModal(route) {
        $('#delete-modal').modal('show', {
            backdrop: 'true'
        });
        $('#delete-form').attr('action', route);
    }
</script>
@endpush