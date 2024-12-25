@extends('Home.homelayouts.hometemplate')
@section('main_content')

 <h1 class="py-5">Checkout page</h1>
 
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="container my-5">
        <div class="row">
          <!-- Shipping Address -->
          <div class="col-md-6">
            <h3>Shipping Address</h3>
            <ul class="list-group">
                @foreach ($shipping_informations as $shipping_information)
                    
                
              <li class="list-group-item"><strong>Full Name:</strong> {{ $shipping_information->full_name }}</li>
              <li class="list-group-item"><strong>Address:</strong> {{ $shipping_information->address }}</li>
              <li class="list-group-item"><strong>City:</strong> {{ $shipping_information->city }}</li>
              <li class="list-group-item"><strong>State/Provience:</strong> {{ $shipping_information->state }}</li>
              <li class="list-group-item"><strong>Postal Code:</strong> {{ $shipping_information->postal_code }}</li>
              <li class="list-group-item"><strong>Country:</strong> {{ $shipping_information->country }}</li>
              <li class="list-group-item"><strong>Phone:</strong> {{ $shipping_information->phone }}</li>
                @endforeach
            </ul>
          </div>
          <!-- Product Details -->
          <div class="col-md-6">

            <h3>Product Details</h3>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                  <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                  </tr>
                </thead>
                <tbody>
                  
                    @php
                        $total = 0;
                    @endphp

                    @foreach ($cart_items as $item)
                        <tr>
                            @php 
                                $product_name = App\Models\product::where('id', $item->product_id)->value('product_name');
                            @endphp
                            <th>{{ $product_name }}</th>
                            <th>{{ $item->quantity }}</th>
                            <th>{{ $item->price }}</th>
                        </tr>

                        @php
                        $total = $total + $item->price;
                        @endphp

                    @endforeach

                </tbody>
                <tfoot>
                  <tr class="table-light">
                    <td colspan="2" class="text-end"><strong>Grand Total:</strong></td>
                    <td><strong>${{ $total  }}</strong></td>
                  </tr>
                </tfoot>
              </table>
              <!-- Place Your Order Button -->
            

          </div>
          
        </div>

        <div class="row mt-4">
            <div style="margin-left: 60%;" class="col text-end">
              <!-- Place Order Form -->
              <form action="{{ route('placeorder') }}" method="post" style="display: inline-block;">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg">Place Order</button>
              </form>
              <!-- Cancel Order Form -->
              <form action="" method="post" style="display: inline-block;">
                @csrf
                <button type="submit" class="btn btn-danger btn-lg">Cancel Order</button>
              </form>
            </div>
          </div>

      </div>
@endsection