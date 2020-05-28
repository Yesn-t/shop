@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    {!! Form::open() !!}

    <br>
    <h4>
        Filter
    </h4>
    {!! Form::select('user', $users, null, ['placeholder' => 'Pick One','class' => 'form-control col-10']) !!}

    <br>
    <p>
        <h5>Order List</h5>
    </p>
    <p class="col-10">
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th> 
                <th scope="col">Order Date</th>
                <th scope="col">State</th>
                <th scope="col">Priority</th>
                <th scope="col">Products</th>
                <th scope="col">Amount</th>
              </tr>
            </thead>
            <tbody id="orders">
                @foreach ($orders as $order)
                <tr> 
                    <th scope="row"> {{ $order->id }}</th>
                    <td>{{ $order->date }}</td> 
                    <td>
                        @if ($order->state == 1)
                            To send
                        @else
                            @if ($order->state == 2)
                                Sent
                            @else
                                Delivered
                            @endif    
                        @endif
                    </td> 
                    <td>
                        @if ($order->priority == 1)
                            Normal
                        @else
                            High   
                        @endif
                    </td> 
                    <td>{{ $order->total_products }}</td>
                    <td> ${{ $order->amount }}</td> 
                </tr>
                @endforeach
            </tbody>
        </table>
          {{-- <p id='links'>
            {{ $orders->links() }}
          </p> --}}
    </p>

    {!! Form::close() !!}
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  

<script>
    $(function () {
        $('select[name=user]').change(function () {
            var url = '{{ url('api/user') }}' + '/' + $(this).val() + '/orders/';
            $.get(url, function (data) {
                var table = $('tbody[id=orders]');
                table.empty();
                $.each(data, function(key, value){
                    table.append('<tr>' + 
                                    '<th scope="row">'+ value.id +'</th>' +
                                    '<td>' + value.date + '</td>' + 
                                    '<td>' + (value.state == 1 ? (value.state == 2 ? 'Delivered' : 'Sent') : 'To send') + '</td>' + 
                                    '<td>' + (value.priority == 2 ? 'Normal' : 'High') + '</td>' +
                                    '<td>' + value.total_products + '</td>' +
                                    '<td> $' + value.amount + '</td>' + 
                                '</tr>');
                });
            });
        });
    });
</script>



@endsection
