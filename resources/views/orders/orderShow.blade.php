@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Order {{ $order->id }}</div>

                <table class='form-control'>
                    <th>
                        User: {{ $order->user->name}} ({{ $order->user->email }}) - 
                    </th>
                    <td> 
                        Products: {{ $order->total_products}}
                    </td>
                </table>
                    <table class="table table-hover col-12">
                        <tr>
                            <th>Date</th>
                            <th>Priority</th>
                            <th>State</th>
                            <th>Amount</th>
                        </tr>
                        <tr>
                            <th scope="row">{{  $order->date }}</th>
                            <td>{{ $order->priority }}</td>
                            <td>{{ $order->status  }}</td>
                            <td>{{ $order->date }}</td>
                        </tr>
        
                    </table>
                    <br>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Departament</th>
                                <th scope="col">Category</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Size</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->products as $product)
                            <tr>
                                <th scope="row">{{ $product->name }}</th>
                                <td>{{ $product->departament->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->amount }}</td>
                                <td>{{ $product->size }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
        
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
