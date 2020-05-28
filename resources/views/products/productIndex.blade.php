@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    @if (\Gate::allows('Administrador'))
    <br>
    <a href="{{ route('product.create') }}">
        <button type="button" class="btn btn-primary"> Add New Product</button>
    </a>
    <div class="w-100"><br></div>
    
    <table class="table table-hover col-10">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Amount</th>
                <th scope="col">Up date</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <th scope="row"> {{ $product->id }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->updated_at }}</td>
                <td>
                    <a href="{{ route('product.edit', $product->id) }}">
                        <button type="button" class="btn btn-primary"></button>
                    </a>
                </td>
                <td>
                    <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button name="delete" class="btn btn-danger"></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
