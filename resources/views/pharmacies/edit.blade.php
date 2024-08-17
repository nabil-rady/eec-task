@extends('layouts.app')

@section('content')
    <form class="pb-3" action="{{ route('pharmacies.update', $pharmacy->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="mb-2" for="name">Pharmacy Name</label>
            <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" type="text" value="{{ old('name') ?? $pharmacy->name }}" required autofocus />
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
        </div>
        <div class="mb-3">
            <label for="address">Address</label>
            <input id="address" name="address" class="form-control @error('address') is-invalid @enderror" type="text" value="{{ old('address') ?? $pharmacy->address }}" required /> 
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
        </div>
        <button type="submit" class="d-block btn btn-warning mx-auto">Edit</button>
    </form>
@endsection