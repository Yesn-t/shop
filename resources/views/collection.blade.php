@extends('layouts.app')

@section('content')
<div class="row justify-content-center col-12">
    <div class="card col-10">
        <div class="card-header">Collections</div>
        <div class="card-body">
            {{-- Begin Container --}}

           
            
            <div class="row">
                @foreach ($products as $product)
            <div class="col-2">
                <div class="product-item">
                    <div class="pi-pic">
                        @foreach ($product->files as $file)
                            <img src="/storage/{{$file->hash}}" width="50" height="200" alt="">
                            @break
                        @endforeach
                        <ul>
                            <li class="w-icon active"><a href="#"><i class="fa fa-shopping-bag"></i></a></li>
                        </ul>
                    </div>
                    <div class="pi-text">
                        <div class="catagory-name"> {{ $product->category->name }} </div>
                        <a href="#">
                            <h5>{{ $product->name }}</h5>
                        </a>
                        <div class="product-price">
                            ${{ $product->amount }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>            @endforeach
        </div>
           

            {{-- End Container --}}
        </div>
    </div>
</div>
@endsection
