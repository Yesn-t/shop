@extends('layouts.app')

@section('content')

@if (\Gate::allows('Administrador'))

<div class="row justify-content-center">
    <div class="card col-10">
        <br>
        <a href="{{ route('category.create') }}">
            <button type="button" class="btn btn-primary"> Add New Category</button>
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
                    <th scope="col">#</th>
                    <th scope="col">category</th>
                    <th scope="col">Up date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th scope="row"> {{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td>
                        <a href="{{ route('category.edit', $category->id) }}">
                            <button type="button" class="btn btn-primary">Edit</button>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
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
