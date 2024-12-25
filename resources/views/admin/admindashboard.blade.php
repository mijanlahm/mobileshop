@extends('admin.layouts.newtemplateadmin')
@section('page_title')
    Dashboard - Mobileshop
@endsection
@section('content')
<div class="container">
    <h1>Welcome to the Admin Panel</h1>
    <p>Use the sidebar to navigate through different sections.</p>
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="card text-white bg-primary mb-3">
          <div class="card-header">Products</div>
          <div class="card-body">
            <h5 class="card-title">150</h5>
            <p class="card-text">Manage your products</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card text-white bg-success mb-3">
          <div class="card-header">Orders</div>
          <div class="card-body">
            <h5 class="card-title">320</h5>
            <p class="card-text">View and process orders</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card text-white bg-warning mb-3">
          <div class="card-header">Customers</div>
          <div class="card-body">
            <h5 class="card-title">89</h5>
            <p class="card-text">Manage customer details</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card text-white bg-danger mb-3">
          <div class="card-header">Revenue</div>
          <div class="card-body">
            <h5 class="card-title">$25,000</h5>
            <p class="card-text">Track your earnings</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection 