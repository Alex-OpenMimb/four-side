@extends('layouts.app')

@section('slot')
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle text-center rounded">
                <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>User</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Sample Title</td>
                    <td>Sample description goes here</td>
                    <td>John Doe</td>
                    <td>Active</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm">
                            Actualizar foto
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


@endsection
