@extends('Home.homelayouts.hometemplate')
@section('main_content')

 <h1 class="py-5">addtocart page</h1>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    
  <div class="container mt-5">
    <h2 class="text-center">Products List</h2>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Product Image</th>
          <th>Quantity</th>
          <th>Price ($)</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="productTable">

        @php
            $total = 0;
        @endphp

        @foreach ($cart_items as $item)
            <tr>
                @php 
                    $product_name = App\Models\product::where('id', $item->product_id)->value('product_name');
                    $product_image = App\Models\product::where('id', $item->product_id)->value('product_img');
                @endphp
                <th>{{ $product_name }}</th>
                <th><img style="height: 50px;" src="{{ asset($product_image) }}"></th>
                <th>{{ $item->quantity }}</th>
                <th>{{ $item->price }}</th>
                <th><a href="{{ route('removecartitem', $item->id) }}" class="btn btn-danger" style="color: white;">Remove</a></th>
            </tr>

            @php
            $total = $total + $item->price;
            @endphp

        @endforeach

      </tbody>
    </table>

    @if($total>0)

        <h2 class="text-center mt-5">Cart Summary</h2>
        <table>
            <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th class="text-right">Total: ${{ $total }} </th>
                    <th class="text-center"><a href="{{ route('shippingaddress') }}" class="btn btn-primary">Proceed to Checkout</a></th>
                </tr>
                </thead>
        </table>

    @endif
    
    
  </div>



@endsection