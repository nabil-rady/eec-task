@extends('layouts.app')

@section('content')
    <div class="d-flex">
        <div style="flex-basis: 0">
            <div>
                <img src="{{ $product->image }}" alt="Product Image">
            </div>
        </div>
        <div class="px-3">
            <h2>{{ $product->title }}</h2>
            <ul class="list-unstyled">
                <li>Price: {{ $product->price }}</li>
                <li>Quantity: {{ $product->quantity }}</li>
            </ul>
            <h3>Description</h3>
            <p>
                {{ $product->description }}  
            </p>
            <h3>Action</h3>
            <div class="d-flex gap-2">
                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal{{$product->id}}">
                    Delete
                </button>
            </div>
        </div>
        <x-delete-confirmation-modal resourceName="product" :resource="$product" />
    </div>
@endsection
