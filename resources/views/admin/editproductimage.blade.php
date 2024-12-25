@extends('admin.layouts.newtemplateadmin')
@section('page_title')
    Edit Products Image - Mobileshop
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> Edit products image</h4>
        <div class="col-xxl">
            <div class="card mb-4">

                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit products image</h5>
                    <small class="text-muted float-end">Input informations</small>
                </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                

                    <form action="{{ route('updateproductimage') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Previous Image</label>
                            <div class="col-sm-10">
                                <img height="200px" src="{{ asset($product_info->product_img) }}" alt="img">
                            </div>
                        </div>

                        <input  type="hidden"  name="product_img_id" value="{{ $product_info->id }}">

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Upload Product new Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="product_img" name="product_img"/>
                            </div>
                        </div>
                        
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Product Image</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection 