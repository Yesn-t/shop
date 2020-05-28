@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    @if (\Gate::allows('Administrador'))
    <br>
    <a href="{{ route('category.create') }}">
        <button type="button" class="btn btn-primary"> Add New Category</button>
    </a>
    <div class="w-100"><br></div>
    
    <table class="table table-hover col-10">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">category</th>
                <th scope="col">Up date</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
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
                        <button type="button" class="btn btn-primary"></button>
                    </a>
                </td>
                <td>
                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
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
