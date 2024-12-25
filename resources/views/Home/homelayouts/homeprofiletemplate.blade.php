
@extends('Home.homelayouts.hometemplate')

@section('main_content')

<h1 class="py-5">Welcome {{ Auth::user()->name }}</h1>

 <div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 d-md-block bg-light side-nav px-3 py-4">
            <h5 class="text-center mb-4">Your Profile</h5>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('userprofile') }}" id="dashboard-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('userpendingorders') }}" id="pending-orders-link">Pending Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('orderhistory') }}" id="order-history-link">Order History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profileinfo') }}" id="order-history-link">Profile </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="{{ route('logout') }}" id="logout-link">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 col-lg-10 ms-sm-auto px-md-4 py-4" id="main-content">
            <div class="container">
                
                @yield('profilecontent')
                
            </div>
        </main>
    </div>
</div>
@endsection

