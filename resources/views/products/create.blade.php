@extends('layouts.app')

@section('content')
    <form class="pb-3" action="{{ route('products.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mb-3">
            <label class="mb-2" for="title">Product title</label>
            <input id="title" name="title" class="form-control @error('title') is-invalid @enderror" type="text" value="{{ old('title') }}" required autofocus />
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
        </div>
        <div class="mb-3">
            <label class="mb-2" for="description">Description</label>
            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" type="text">{{ old('description') }}</textarea> 
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
        </div>
        <div class="mb-3">
            <h2>Pharmacies</h2>
            <div class="mb-3">
                <label class="mb-2" for="pharmacies0">Pharmacy Name</label>
                <select id="pharmacies0" name="pharmacies[]" class="form-select s2 w-100 p-2 @error('pharmacies') is-invalid @enderror" required>
                </select> 
                @error('pharmacies')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="mb-2" for="price0">Price</label>
                <input id="price0" name="prices[]" class="form-control @error('prices') is-invalid @enderror" type="number" required /> 
                @error('prices')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
            </div>
            <div class="mb-3">
                <label for="quantity0">Quantity</label>
                <input id="quantity0" name="quantities[]" class="form-control @error('quantities') is-invalid @enderror" type="number" required /> 
                @error('quantities')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
            </div>
            <button id="add-pharmacy" class="btn btn-primary">Add Pharmacy</button>
        </div>
        <div class="mb-3">
            <label for="image" class="mb-2">Image</label>
            <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror" required >
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="d-block btn btn-primary mx-auto">Submit</button>
    </form>
    <script defer>
        let counter = 0;
        $('.s2').select2({
            ajax: {
                url: '/api/pharmacies/search',
                dataType: 'json'
            }
        });
        $('#add-pharmacy').on('click', function() {
            counter++;
            const html = `<div class="mb-3">
                <label class="mb-2" for="pharmacies${counter}">Pharmacy Name</label>
                <select id="pharmacies${counter}" name="pharmacies[]" class="form-select s2 w-100 p-2" required>
                </select> 
            </div>
            <div class="mb-3">
                <label class="mb-2" for="price${counter}">Price</label>
                <input id="price${counter}" name="prices[]" class="form-control" type="number" required /> 
            </div>
            <div class="mb-3">
                <label for="quantity${counter}">Quantity</label>
                <input id="quantity${counter}" name="quantities[]" class="form-control" type="number" required /> 
            </div>`;
            $('#add-pharmacy').before(html);
            $('.s2').select2({
                ajax: {
                    url: '/api/pharmacies/search',
                    dataType: 'json'
                }
            });
        });
    </script>
@endsection