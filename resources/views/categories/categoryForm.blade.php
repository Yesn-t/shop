@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <br>
    @isset($category)
    {!! Form::model($category, ['route'=>['category.update', $category->id], 'method'=>'PATCH']) !!}
    <div class="form-group">
        {!! Form::label('title', 'Update category', ['class'=>"h3"]) !!}
    </div>
    
    @else
    {!! Form::open(['route' => 'category.store']) !!} 
    <div class="form-group">
        {!! Form::label('title', 'Create category', ['class'=>"h3"]) !!}
    </div>
   

    @endisset

    {{-- Nombre --}}
    <div class="form-group">
        {!! Form::label('name', 'Category Name', ['class'=>"h4"]) !!}
        <div class="col-12">
            {!! Form::text('name', null, ['class'=>"form-control input-md", 'placeholder'=>'Woman']) !!}
        </div>
    </div>

    {{-- Envio --}}
    <div class="form-group">
        <div class="col-md-8">
            <button class="btn {{ isset($category) && $category != null ? 'btn-primary' : 'btn-success'}}">Save</button>
        </div>
    </div>
    {{-- </form> --}}
    {!! Form::close() !!}

</div>

@endsection
