@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('file.upload') }}" enctype="multipart/form-data">
    @csrf
    <label for="file">Carga de Archivo</label>
    <input name="my_file" type="file">
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>

@endsection
