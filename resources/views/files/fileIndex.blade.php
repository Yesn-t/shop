@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Files Charge</div>
    <div class="card-body">
        <table class="table">
            <tr>
                <th>File</th>
                <th>Size</th>
                <th colspan="2">Actions</th>
            </tr>

            @foreach($files as $file)
            <tr>
                <td>{{ $file->name }}</td>
                <td>{{ $file->size }}</td>
                <td>
                    <a href="{{ route('file.download', $file->id) }}" class="btn btn-sm btn-success">Descargar</a>
                </td>
                <td>
                    <!-- Formulario para eliminar file -->
                    {!! Form::open(['route' => ['file.delete', $file->id]]) !!}
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach

        </table>
    </div>
</div>

@endsection
