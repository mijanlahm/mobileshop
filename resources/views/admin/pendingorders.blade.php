@extends('admin.layouts.newtemplateadmin')
@section('page_title')
    Pending Orders - Mobileshop
@endsection
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Pending Orders</h1>
    <table class="table table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Customer Name</th>
                <th>Product ID</th>
                <th>Shipping Address</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example of a pending order row -->
            @foreach ($pending_orders as $pending_order)
                
            
            <tr>
                <td>{{ $pending_order->full_name }}</td>
                <td>{{ $pending_order->product_id }}</td>
                <td>Address: {{ $pending_order->address }}, {{ $pending_order->city }}, {{ $pending_order->state }}, {{ $pending_order->postal_code }}, {{ $pending_order->country }}.</td>
                <td>${{ $pending_order->total_price }}</td>
                <td><span class="badge bg-warning">{{ $pending_order->status }}</span></td>
                <td style="width: 20%;">
                    <form action="{{ route('approveorder') }}" method="POST">
                        @csrf
                        <input type="hidden" name="approve_order_id" value="{{ $pending_order->id }}">
                        <input type="hidden" name="approve_order_status" value="Approved">
                        <input class="btn btn-success btn-sm me-2" type="submit" value="Approve">
                        <button class="btn btn-danger btn-sm">Reject</button>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection 