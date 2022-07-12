@extends('layouts.app')

@section('content')
    <a href="{{ route('home') }}" class="btn btn-info m-2">
        <i class="fas fa-list p-2"></i>Categories 
    </a>
    <div class="container mt-3">
        <div class="row justify-content-around">
            @foreach ($product as $item)
                @if ($item->category->id == $category->id)
                    <div class="card col-5 mt-5">
                        <img src="{{ asset('storage/products') }}/{{ $item->image }}" alt="{{ $item->title }}" width="200px" height="200px" class="mt-3 mb-3">
                        <div class="card-header">
                            <div class="card-title">{{ $item->title }}</div>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Price : {{ $item->price }} $</li>
                                <li class="list-group-item">Stock : {{ $item->stock }}</li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('product.detail', $item->id) }}" class="btn btn-dark">
                                <i class="fa-solid fa-circle-info p-2"></i>Show Detail
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection