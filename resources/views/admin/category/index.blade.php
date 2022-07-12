@extends('layouts.master')

@section('title')
    Categories
@endsection 

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Categories</h1>
                    </div>
                    @if (session("message"))
                    <div class="alert alert-success" role="alert">
                        {{ session("message") }}
                    </div>
                    @endif
                    @if (session("updated"))
                    <div class="alert alert-primary" role="alert">
                        {{ session("updated") }}
                    </div>
                    @endif
                    @if (session("deleted"))
                    <div class="alert alert-danger" role="alert">
                        {{ session("deleted") }}
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <table class="table table-bordered ">
                                    <tr>
                                        <th class="col-4">ID</th>
                                        <th class="col-4">Name</th>
                                        <th class="col-">
                                            <a href="{{ route('categories.create') }}" class="btn btn-primary">
                                                <i class="fas fa-plus p-2"></i>Add a New Category
                                            </a>
                                        </th>
                                    </tr>
                                    @foreach ($category as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <form action="{{ route('categories.destroy', $item->id) }}" method="POST">
                                            {{ @method_field("DELETE") }}
                                            {{ @csrf_field() }}
                                                <a href="{{ route('categories.show', $item->id) }}" class="btn btn-success">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-warning">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <button class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pagination">
                    {{ $category->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection