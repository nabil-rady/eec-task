@extends('layouts.app')

@section('content')
    <form class="pb-3" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" method="POST">
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
            <label class="mb-2" for="description">Description</label>
            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" type="text">{{ old('description') ?? $product->description }}</textarea> 
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
        </div>
        <div class="mb-3">
            @foreach ($product->pharmacies as $pharmacy)                    
            <div>
                <div class="mb-3">
                    @if($loop->index == 0)
                        <label class="mb-2" for="pharmacies{{$loop->index}}">Pharmacy Name</label>
                    @else
                        <div class="d-flex">
                            <label class="mb-2" for="pharmacies${counter}">Pharmacy Name</label>
                            <button type="button" style="appearance: none; background: none; border: none;" class="remove-pharmacy ms-auto text-danger">X</button>
                        </div>
                    @endif
                    <select id="pharmacies{{$loop->index}}" name="pharmacies[]" class="form-select s2 w-100 p-2 @error('pharmacies') is-invalid @enderror" required>
                        <option value="{{$pharmacy->id}}">{{$pharmacy->name}}</option>
                    </select> 
                    @error('pharmacies')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="mb-2" for="price{{$loop->index}}">Price</label>
                    <input id="price{{$loop->index}}" name="prices[]" class="form-control @error('price') is-invalid @enderror" type="number" value="{{ $pharmacy->pivot->price }}" required /> 
                    @error('prices')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                </div>
                <div class="mb-3">
                    <label for="quantity{{$loop->index}}">Quantity</label>
                    <input id="quantity{{$loop->index}}" name="quantities[]" class="form-control @error('quantity') is-invalid @enderror" type="number" value="{{ $pharmacy->pivot->quantity }}" required /> 
                    @error('quantities')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                </div>
            </div>
            @endforeach
            <button id="add-pharmacy" class="btn btn-primary">Add Pharmacy</button>
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
    <script>
        let counter = {{count($product->pharmacies) - 1}};
        $('.s2').select2({
            ajax: {
                url: '/api/pharmacies/search',
                dataType: 'json'
            }
        });
        $('.remove-pharmacy').on('click', function() {
            $(this).parent().parent().parent().remove();
        })
        $('#add-pharmacy').on('click', function() {
            counter++;
            const html = `
            <div>
                <div class="mb-3">
                    <div class="d-flex">
                        <label class="mb-2" for="pharmacies${counter}">Pharmacy Name</label>
                        <button type="button" style="appearance: none; background: none; border: none;" class="remove-pharmacy ms-auto text-danger">X</button>
                    </div>                    
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
                </div>
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