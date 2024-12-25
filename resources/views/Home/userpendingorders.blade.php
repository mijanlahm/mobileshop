@extends('Home.homelayouts.homeprofiletemplate')
@section('profilecontent')
@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<div class="col-md-8">
    <h2>Pending Orders</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($pending_orders as $pending_order)

            @php
                $product_name = App\Models\product::where('id', $pending_order->product_id)->value('product_name');
            @endphp

                <tr>
                    <td>{{ $product_name }}</td>
                    <td>{{ $pending_order->total_price }}</td>
                </tr>

            @endforeach

        </tbody>
    </table>
    <div class="alert alert-info" role="alert">
        No more pending orders.
    </div>
</div>

@endsection