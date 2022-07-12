@extends('layouts.master')

@section('title')
    Products
@endsection

@section('content')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <div class="card-title col-10">
                                Edit Product
                        </div>
                        <div class="col-1">
                            <a href="{{ route("products.index") }}" class="btn btn-sm btn-success">Back</a>
                        </div>
                    </div>

                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    {{ @method_field("PATCH") }}
                    {{ @csrf_field() }}
                        <div class="card-body row justify-content-between">
                            <div class="form-group col-5">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $product->title }}">
                            </div>
                            <div class="form-group col-5">
                                <label for="stock">stock</label>
                                <input type="number" name="stock" value="{{ $product->stock }}" class="form-control">
                            </div>
                            <div class="form-group col-5">
                                <label for="category_id">Category</label>
                                <select class="form-control" name="category_id">
                                    <option selected disabled>Choose Category</option>
                                    @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-5">
                                <label for="price">Price</label>
                                <input type="number" name="price" value="{{ $product->price }}" class="form-control">
                            </div>
                            <div class="form-group col-5">
                                <label for="description">Description</label>
                                <textarea class="form-control" rows="3" col-30 name="description">
                                    {{ $product->description }}
                                </textarea>
                            </div>
                            <div class="form-group col-5">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" onchange="previewFile(this)" value="{{ asset('storage/products') }}/{{ $product->image }}">
                                <img src="{{ asset('storage/products') }}/{{ $product->image }}" id="preview" alt="Product Image" width="130px" style="margin-top: 30px">
                            </div>
                        </div> 
                        <div class="card-footer">
                            <button class="btn btn-primary col-12">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if(file) 
            {
                var reader = new FileReader();
                reader.onload = function() {
                    $("#preview").attr("src",reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection