@extends('layouts.app')

@section('content')
    <form action="{{ route('pharmacies.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mb-3">
            <label class="mb-2" for="name">Pharmacy name</label>
            <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" type="text" value="{{ old('name') }}" required autofocus />
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
        </div>
        <div class="mb-3">
            <label class="mb-2" for="address">Address</label>
            <input id="address" name="address" class="form-control @error('address') is-invalid @enderror" type="text" value="{{ old('address') }}" required /> 
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
        </div>
        <button type="submit" class="d-block btn btn-primary mx-auto">Submit</button>
    </form>
@endsection