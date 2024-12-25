@extends('Home.homelayouts.hometemplate')
@section('main_content')

<div class="container py-5">
    <div class="row">
        @foreach ($products as $product)
        <!-- Product Image -->
        <div class="col-md-6">
            <img width="70%" src="{{ asset($product->product_img) }}" alt="Product" class="img-fluid rounded shadow">
        </div>

        
        <!-- Product Details -->
        <div class="col-md-6">
            <h1 class="display-5">{{ $product->product_name }}</h1>
            <h3 class="text-primary">Price: ${{ $product->price }}</h3>

            <!-- Category and Subcategory -->
            <p><strong>Category:</strong> {{ $product->product_category_name }}</p>
            <p><strong>Subcategory:</strong> {{ $product->product_subcategory_name }}</p>

            <!-- Short Description -->
            <p class="mt-4"><strong>About Product:</strong> 
                {{ $product->product_short_des }}
            </p>

            

          
           

            <!-- Available Quantity -->
            <p><strong>Available Quantity:</strong>{{ $product->Quantitiy }}</p>

            <!-- Buttons -->
            <form action="{{ route('addproducttocart') }}" method="POST">
                @csrf
                <label for="quantity" class="form-label">Quantity:</label>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <input type="number" id="quantity" class="form-control w-25" name="product_quantity" min="1">
                <br>
                <input type="hidden" value="{{ $product->id }}" name="product_id">
                <input type="hidden" value="{{ $product->price }}" name="product_price">
                <input class="btn btn-warning btn-lg me-3" type="submit" value="Add to Cart">
                <input class="btn btn-outline-success btn-lg me-3" type="submit" value="Buy Now">
            </form>
        </div>
    </div>

    <!-- Long Description Section -->
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="mb-4">Product Details</h3>
            <textarea class="form-control" rows="10" readonly>
                {{ $product->product_long_des }}
            </textarea>
        </div>
    </div>

    @endforeach


    <h1 class="fashion_taital">Related Products</h1>
    <div class="fashion_section_2">
       <div class="row">

            @foreach ($related_products as $related_product)
                
                <div class="col-lg-4 col-sm-4">
                    <div class="box_main">
                        <h4 class="shirt_text">{{ $related_product->product_name }}</h4>
                        <p class="price_text">Price  <span style="color: #262626;">$ {{ $related_product->price }}</span></p>
                        <div class="tshirt_img"><img src="{{ asset($related_product->product_img) }}"></div>
                        <div class="btn_main">
                        
                            <div class="buy_bt" >
                                <form action="{{ route('addproducttocart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                                    <input type="hidden" value="{{ $product->price }}" name="product_price">
                                    <input type="hidden" value="1" name="product_quantity">
                                    <input style="margin-bottom:10px" class="btn btn-warning btn-lg me-3 buy_bt" type="submit" value="Buy Now">
                                </form>
                            </div>

                            <div class="seemore_bt"><a href="{{ route('singleproduct', [$related_product->id, $related_product->slug]) }}">See More</a></div>
                        </div>
                    </div>
                </div>

            @endforeach

       </div>
    </div>


    <!-- Related Products Section -->
    
</div>

@endsection