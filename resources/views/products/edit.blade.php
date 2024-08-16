@extends('layouts.app')

@section('content')
    <form action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="mb-2" for="title">Product title</label>
            <input id="title" name="title" class="form-control @error('title') is-invalid @enderror" type="text" value="{{ old('title') ?? $product->title }}" required autofocus />
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
        </div>
        <div class="mb-3">
            <label class="mb-2" for="price">Price</label>
            <input id="price" name="price" class="form-control @error('price') is-invalid @enderror" type="number" value="{{ old('price') ?? $product->price }}" required /> 
            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
        </div>
        <div class="mb-3">
            <label for="quantity">Quantity</label>
            <input id="quantity" name="quantity" class="form-control @error('quantity') is-invalid @enderror" type="number" value="{{ old('quantity') ?? $product->quantity }}" required /> 
            @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
        </div>
        <div class="mb-3">
            <label class="mb-2" for="description">Description</label>
            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" type="text">{{ old('description') ?? $product->description }}</textarea> 
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
        </div>
        <div class="mb-3">
            <label for="image" class="mb-2">Image</label>
            <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror" >
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="d-block btn btn-warning mx-auto">Edit</button>
    </form>
@endsection