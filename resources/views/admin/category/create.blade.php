@extends('layouts.master')

@section('title')
    Categories
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
            <div class="col-8">
                <div class="card">
                    <div class="card-header row justify-content-between">
                        <div class="col-10">
                            <h1 class="card-title">
                                Create a New Category
                            </h1>
                        </div>
                        <div class="col-1">
                            <a href="{{ route('categories.index') }}" class="btn btn-success btn-sm">Back</a>
                        </div>
                    </div>
                    <form action="{{ route('categories.store') }}" method="POST">
                        {{ @csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Category Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection