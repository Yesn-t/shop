@extends('layouts.app')

@section('content')
@if (\Gate::allows('Administrador'))
<div class="card">
    <div class="row justify-content-center">
        <br>
        @isset($product)
        {!! Form::model($product, ['route'=>['product.update', $product->id], 'method'=>'PATCH']) !!}
        <div class="card-header">
            {!! Form::label('title', 'Update Product', ['class'=>"h4"]) !!}
        </div>

        @else
        {!! Form::open(['route' => 'product.store']) !!}
        <div class="card-header">
            {!! Form::label('title', 'Create Product', ['class'=>"h4"]) !!}
        </div>
        @endisset

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Nombre --}}
        <div class="form-group">
            {!! Form::label('name', 'Product Name', []) !!}
            <div class="col-12">
                {!! Form::text('name', null, ['class'=>"form-control input-md", 'placeholder'=>'Air Max 720', 'required']) !!}
            </div>
        </div>

        {{-- Departament --}}
        <div class="form-group">
            {!! Form::label('name', 'Depatrtament', []) !!}
            <div class="col-12">
                {!! Form::select('departament_id', $departaments, null, ['class'=>"form-control", 'required']) !!}
            </div>
        </div>

        {{-- Category --}}
        <div class="form-group">
            {!! Form::label('name', 'Category', []) !!}
            <div class="col-12">
                {!! Form::select('category_id', $categories, null, ['class'=>"form-control", 'required']) !!}
            </div>
        </div>

        {{-- Size --}}
        <div class="form-group">
            {!! Form::label('name', 'Size', []) !!}
            <div class="col-12">
                {!! Form::select('size', [
                'S'=>'Small',
                'M'=>'Medium',
                'L'=>'Large'
                ], null, ['class'=>"form-control", 'required']) !!}
            </div>
        </div>

        {{-- Description --}}
        <div class="form-group">
            {!! Form::label('name', 'Product Description', []) !!}
            <div class="col-12">
                {!! Form::textarea('description', null, ["class" => "form-control", 'required']) !!}
            </div>
        </div>

        {{-- Amount --}}
        <div class="form-group">
            {!! Form::label('name', 'Product Description', []) !!}
            <div class="col-12">
                {!! Form::number('amount', null, ['class'=>"form-control input-md", 'required']) !!}
            </div>
        </div>

        {{-- Envio --}}
        <div class="form-group">
            <div class="col-md-8">
                <button
                    class="btn {{ isset($product) && $product != null ? 'btn-primary' : 'btn-success'}}">Save</button>
            </div>
        </div>
        {!! Form::close() !!}

    </div>
</div>
@endif
@endsection
