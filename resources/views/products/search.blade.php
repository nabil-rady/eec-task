@extends('layouts.app')

@section('content')
    <div>
        <h1>Search Results</h1>
    </div>
    @if($products->isEmpty())
        <p>No products found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Total Quantity</th>
                    <th>Best Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->total_quantity }}</td>
                        <td>{{ $product->best_price }} LE</td>
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
    @endif
    {{ $products->links() }}
@endsection