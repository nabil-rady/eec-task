@extends('layouts.app')

@section('content')
    <div class="px-3">
        <h2 class="fw-bold display-4">{{ $pharmacy->name }}</h2>
        <h3 class="fw-bold">Address</h3>
        <p>
            {{ $pharmacy->address }}
        </p>
        <div class="d-flex gap-2">
            <a href="{{ route('pharmacies.edit', $pharmacy) }}" class="btn btn-warning">Edit</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal{{$pharmacy->id}}">
                Delete
            </button>
        </div>
        <div class="mt-5">
            <h2 class="fw-bold">Products</h2>
            @if(!$products->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->price }} LE</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal{{$product->id}}">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            <x-delete-confirmation-modal resourceName="product" :resource="$product" />
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No Products found.</p>
            @endif
            <x-delete-confirmation-modal resourceName="pharmacy" :resource="$pharmacy" />
            {{ $products->links() }}
        </div>
    </div>
@endsection
