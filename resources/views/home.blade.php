@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Categories</h1>
                </div>
                <div class="card-body">
                    <table class="table-bordered col-10">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $value)
                                <tr>
                                    <td>{{ $value->title }}</td>
                                    <td>
                                        <a href="{{ route('category.product', $value->id) }}" class="btn btn-success">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
