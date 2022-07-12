@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="container row justify-content-center">
                        <div class="col-5">
                            <img src="{{ asset('storage/products') }}/{{ $product->image }}" alt="{{ $product->title }}" width="200px" height="200px" class="m-5" >
                        </div>
                    </div>
                    <div class="card-header mt-5">
                        <div class="card-title">
                            <h1>{{ $product->title }}</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="card-text">
                                    <h5>Description</h5>
                                    {{ $product->description }}
                                </div>
                            </li>
                            <li class="list-group-item">Price - {{ $product->price }} $</li>
                            <li class="list-group-item">Stock - {{ $product->stock }}</li>
                            <li class="list-group-item">Category - {{ $product->category->title }}</li>
                        </ul>
                    </div>

                    <div class="card-body row justify-content-between">
                        <div class="col-10">
                            <a href="" class="btn btn-primary">
                                <i class="fa-solid fa-cart-plus p-2"></i>Buy Now
                            </a>
                        </div>
                        <div class="col-2">
                            <a href="{{ route('category.product', $product->category->id) }}" class="btn btn-secondary">
                                <i class="fa-solid fa-circle-left p-2"></i>Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection