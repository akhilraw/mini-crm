@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">website</th>
                <th scope="col">email</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($companies as $company)
            <tr>
                <th scope="row">{{ $company->id }}</th>
                <td>{{ $company->name }}</td>
                <td>{{ $company->website }}</td>
                <td>{{ $company->email }}</td>
                <td>
                    <a class="btn btn-warning waves-effect waves-light" href="{{ route('companies.show',$company->id) }}"><i class="ti-eye"></i>show</a>
                    <a class="btn btn-success waves-effect waves-light" href="{{ route('companies.edit',$company->id) }}"><i class="ti-pencil"></i>edit</a>
                    <button class="btn btn-danger waves-effect waves-light" onclick="showDeleteModal('{{ route('companies.destroy',[$company->id]) }}')">delete
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
                        <form action="{{ route('companies.destroy', $company->id) }}" id="delete-from" method="post">
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