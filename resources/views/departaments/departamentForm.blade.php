@extends('layouts.app')

@section('content')
@if (\Gate::allows('Administrador'))
<div class="card">
    <div class="row justify-content-center">
        <br>
        @isset($departament)
        {!! Form::model($departament, ['route'=>['departament.update', $departament->id], 'method'=>'PATCH']) !!}
        <div class="card-header">
            {!! Form::label('title', 'Update Departament', ['class'=>"h3"]) !!}
        </div>

        @else
        {!! Form::open(['route' => 'departament.store']) !!}
        <div class="card-header">
            {!! Form::label('title', 'Create Departament', ['class'=>"h3"]) !!}
        </div>


        @endisset

        {{-- Nombre --}}
        <div class="form-group">
            {!! Form::label('name', 'Departament Name', ['class'=>"h4"]) !!}
            <div class="col-12">
                {!! Form::text('name', null, ['class'=>"form-control input-md", 'placeholder'=>'Woman']) !!}
            </div>
        </div>

        {{-- Envio --}}
        <div class="form-group">
            <div class="col-md-8">
                <button
                    class="btn {{ isset($departament) && $departament != null ? 'btn-primary' : 'btn-success'}}">Save</button>
            </div>
        </div>
        {{-- </form> --}}
        {!! Form::close() !!}
    </div>
</div>
@endif
@endsection
