@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="card">
        <div class="card-header">Files Charge</div>
        <div class="card-body">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
            <a href="{{ url('/file/form') }}">
                <button type="button" class="btn btn-primary"> Add New File</button>
            </a>
            <table class="table table-hover col-12">
                <tr>
                    <th>Product Name</th>
                    <th>File Name</th>
                    <th>Size</th>
                    <th>File</th>
                    <th colspan="2">Actions</th>
                </tr>

                @foreach($files as $file)
                <tr>
                    <th scope="row">{{ $file->product->name }}</th>
                    <td>{{ $file->name }}</td>
                    <td>{{ $file->size }}</td>
                    <td><img src="/storage/{{$file->hash}}" width="50"></td>
                    <td>
                        <a href="{{ route('file.download', $file->id) }}" class="btn btn-sm btn-success">Download</a>
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
</div>
@endsection
