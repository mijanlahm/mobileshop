@extends('Home.homelayouts.hometemplate')
@section('main_content')

 <div class="container mt-5">
    <h2 class="text-center">Provide Your Shipping Information</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('addshippingaddress') }}" method="POST">
        @csrf
        <div class="container">
            <div class="row">
                <!-- Full Name -->
                <div class="col-md-6 mb-3">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="full_name" id="fullName" placeholder="Enter your full name">
                </div>
    
                <!-- Email Address -->
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="Email" id="email" placeholder="Enter your email">
                </div>
            </div>
    
            <div class="row">
                <!-- Phone Number -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone Number</label>
                    <input class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                </div>
    
                <!-- Address -->
                <div class="col-md-6 mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Street address, P.O. Box">
                </div>
            </div>
    
            <div class="row">
                <!-- City -->
                <div class="col-md-6 mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter your city">
                </div>
    
                <!-- State/Province -->
                <div class="col-md-6 mb-3">
                    <label for="state" class="form-label">State/Province</label>
                    <input type="text" class="form-control" id="state" name="state" placeholder="Enter your state/province">
                </div>
            </div>
    
            <div class="row">
                <!-- ZIP/Postal Code -->
                <div class="col-md-6 mb-3">
                    <label for="zip" class="form-label">ZIP/Postal Code</label>
                    <input type="text" class="form-control" id="zip" name="postal_code" placeholder="Enter your ZIP/postal code" >
                </div>
    
                <!-- Country -->
                <div class="col-md-6 mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="Enter your country">
                </div>
            </div>
    
            <!-- Submit Button -->
            <div class="row">
                <div style="margin-left: 80%;margin-top:3%;" class="col-3">
                    <button type="submit" class="btn btn-primary w-100">Proceed to Checkout</button> 
                   <!--  <button id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata=""
                        order="If you already have the transaction generated for current order"
                        endpoint="/pay-via-ajax"> Pay Now
                    </button> -->
                </div>
            </div>
        </div>
    </form>
</div>
@endsection