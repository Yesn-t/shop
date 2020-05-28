@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    @if (\Gate::allows('Administrador'))
    <br>
    <a href="{{ route('departament.create') }}">
        <button type="button" class="btn btn-primary"> Add New Departament</button>
    </a>
    <div class="w-100"><br></div>
    
    <table class="table table-hover col-10">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Departament</th>
                <th scope="col">Up date</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departaments as $departament)
            <tr>
                <th scope="row"> {{ $departament->id }}</th>
                <td>{{ $departament->name }}</td>
                <td>{{ $departament->updated_at }}</td>
                <td>
                    <a href="{{ route('departament.edit', $departament->id) }}">
                        <button type="button" class="btn btn-primary"></button>
                    </a>
                </td>
                <td>
                    <form action="{{ route('departament.destroy', $departament->id) }}" method="POST">
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
