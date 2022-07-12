@extends('layouts.master')

@section('title')
    Products
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card row justify-content-center">
                    <div class="card-header row justify-content-between">
                        <div class="card-title col-10">
                                {{ $category->title }}
                        </div>
                        <div class="col-1">
                            <a href="{{ route("categories.index") }}" class="btn btn-sm btn-success">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>IMAGE</th>
                                <th>NAME</th>
                                <th>PRICE</th>
                                <th>
                                    <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-plus p-2"></i>Add a New Product
                                    </a>
                                 </th>
                            </tr>
                            @foreach ($product as $item)
                                @if ($category->id==$item->category->id)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('storage/products') }}/{{ $item->image }}" alt="{{ $item->title }}" width="50px" height="50px">
                                        </td>
                                        <td>
                                            {{ $item->title }}
                                        </td>
                                        <td>
                                            {{ $item->price }} $
                                        </td>
                                        <td>
                                            <form action="{{ route('products.destroy', $item->id) }}" method="POST">
                                                {{ @method_field("DELETE") }}
                                                {{ @csrf_field() }}
                                                <a href="{{ route('products.show', $item->id) }}" class="btn btn-success">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <button class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection