@extends('Home.homelayouts.homeprofiletemplate')
@section('profilecontent')
dashboard

<div class="col-md-8">
    <h2>Approved Orders</h2>

    <h3>You will receive your delivery within 5 working days. Thanks </h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($Approved_orders as $Approved_order)

            @php
                $product_name = App\Models\product::where('id', $Approved_order->product_id)->value('product_name');
            @endphp

                <tr>
                    <td>{{ $product_name }}</td>
                    <td>{{ $Approved_order->total_price }}</td>
                </tr>

            @endforeach

        </tbody>
    </table>
    
</div>

@endsection