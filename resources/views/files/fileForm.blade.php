@extends('layouts.app')

@section('content')
@if (\Gate::allows('Administrador'))
<div class="card">
    <div class="row justify-content-center">
        <br>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card-header">
            {!! Form::label('title', 'Uploat File', ['class'=>"h4"]) !!}
        </div>
        <form method="POST" action="{{ route('file.upload') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="col-12">
                  {!! Form::label('product_id', 'Product', []) !!}
                  {!! Form::select('product_id', $products, null, ['class'=>"form-control", 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-12">
                    <br>
                    <input name="my_file" type="file">
                </div>
            </div>
            <div class="form-group">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endif
@endsection
