@extends('layouts.app')

@section('content')
@if (\Gate::allows('Administrador'))

<div class="row justify-content-center">
    <div class="card col-10">
        <br>
        <a href="{{ route('product.create') }}">
            <button type="button" class="btn btn-primary"> Add New Product</button>
        </a>
        <div class="w-100"><br></div>

        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Departament</th>
                    <th scope="col">Category</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Size</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->name }}</th>
                    <td>{{ $product->departament->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->amount }}</td>
                    <td>{{ $product->size }}</td>
                    <td>
                        <a href="{{ route('product.edit', $product->id) }}">
                            <button type="button" class="btn btn-primary">Edit</button>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button name="delete" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection
