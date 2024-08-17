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
            @if(!$product->pharmacies->isEmpty())
                <table class="table mt-3">
                    <thead>
                    <tr>
                        <th scope="col">Pharmacy</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($product->pharmacies as $pharmacy)
                            <tr>
                                <td><a href="/pharmacies/{{$pharmacy->id}}">{{ $pharmacy->name }}</a></td>
                                <td>{{ $pharmacy->pivot->quantity }}</td>
                                <td>{{ $pharmacy->pivot->price }} LE</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                No products found.
            @endif
        </div>
        <x-delete-confirmation-modal resourceName="product" :resource="$product" />
    </div>
@endsection
