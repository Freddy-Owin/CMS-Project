@extends('layouts.master')

@section('title')
    Products
@endsection

@section('content')
    
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">PRODUCTS</h1>
                    </div>
                    <div class="card-body justify-content-center">
                        <div class="col-12">
                            @if (session("created"))
                            <div class="alert alert-success" role="alert">
                                {{ session("created") }}
                            </div>
                            @endif
                            @if (session("Deleted"))
                            <div class="alert alert-danger" role="alert">
                                {{ session("Deleted") }}
                            </div>
                            @endif
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
                                @foreach ($product as $value)
                                <tr>
                                    <td>
                                        <img src="{{ asset("storage/products") }}/{{ $value->image }}" alt="{{ $value->title }}" width = 50px height= 50px>
                                    </td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ $value->price }} $</td>
                                    <td>
                                        <form action="{{ route('products.destroy', $value->id) }}" method="POST">
                                            {{ @method_field("DELETE") }}
                                            {{ @csrf_field() }}
                                            <a href="{{ route('products.show', $value->id) }}" class="btn btn-success">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <button class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <div class="justify-content-center d-flex">
                                {{ $product->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection