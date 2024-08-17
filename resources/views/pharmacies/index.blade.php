@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center">
        <h1>Pharmacies</h1>
        <a href="{{ route('pharmacies.create') }}" class="ms-auto btn btn-primary">Create New Pharmacy</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pharmacies as $pharmacy)
                <tr>
                    <td>{{ $pharmacy->id }}</td>
                    <td>{{ $pharmacy->name }}</td>
                    <td>{{ $pharmacy->address }}</td>
                    <td>
                        <a href="{{ route('pharmacies.show', $pharmacy) }}" class="btn btn-info">View</a>
                        <a href="{{ route('pharmacies.edit', $pharmacy) }}" class="btn btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal{{$pharmacy->id}}">
                            Delete
                        </button>
                    </td>
                </tr>
                <x-delete-confirmation-modal resourceName="pharmacy" :resource="$pharmacy" />
                @endforeach
            </tbody>
        </table>
    {{ $pharmacies->links() }}
@endsection