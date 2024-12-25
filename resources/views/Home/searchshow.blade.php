@extends('Home.homelayouts.hometemplate')
@section('main_content')

 <div class="container">
    
    <h1>{{ $post->product_name }}</h1>
    <p>{{ $post->product_short_des }}</p>


 </div>

 @endsection