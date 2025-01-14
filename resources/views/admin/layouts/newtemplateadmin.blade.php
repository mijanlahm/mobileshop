<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>eCommerce Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- FontAwesome icons -->
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }

    /* Sidebar styling */
    .sidebar {
      position: fixed;
      top: 56px; /* Matches the height of the top navbar */
      left: 0;
      width: 250px;
      height: 100vh;
      background-color: #343a40;
      color: #fff;
      padding-top: 20px;
      overflow-y: auto; /* Enables vertical scrolling */
      z-index: 1000;
    }

    /* Sidebar logo */
    .sidebar .logo {
      text-align: center;
      margin-bottom: 30px;
    }

    .sidebar .logo img {
      width: 100px; /* Adjust the logo size */
      height: auto;
    }

    /* Sidebar links */
    .sidebar a {
      color: #ddd;
      text-decoration: none;
      padding: 12px 20px;
      display: block;
      border-left: 4px solid transparent;
    }

    /* Active state */

    .sidebar a.active {
  background-color: #6c757d; /* Darker gray for active subcategories */
  border-left: 4px solid #ffc107;
  color: #fff;
}

    /* Hover state */
    .sidebar a:hover {
      background-color: #495057;
      border-left: 4px solid #17a2b8;
    }

    /* Categories section styling */
    .sidebar .collapse a {
      padding-left: 40px; /* Indent sub-items */
    }

    .sidebar .collapse a:hover {
      background-color: #6c757d;
    }

    .sidebar .category-link {
      background-color: #343a40;
      border-left: 4px solid transparent;
    }

    .sidebar .category-link:hover {
      background-color: #495057;
      border-left: 4px solid #ffc107;
    }

    .sidebar .category-link.active {
      background-color: #495057;
      border-left: 4px solid #ffc107;
      color: #fff;
    }

    .sidebar .dropdown-toggle::after {
      content: "\f0d7"; /* FontAwesome down arrow */
      font-family: "Font Awesome 5 Free";
      font-weight: 900;
      padding-left: 10px;
    }

    /* Content section */
    .content {
      margin-left: 250px;
      margin-top: 56px; /* Matches the height of the top navbar */
      padding: 20px;
      min-height: 100vh;
    }

    /* Top navbar */
    .navbar {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
    }
  </style>
</head>
<body>

<!-- Top Header -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        
        <li>
          <form action="{{ route('logout') }}" method="POST">
             @csrf
             <button class="btn btn-danger" type="submit">Logout</button>
          </form>
       </li>

      </ul>
    </div>
  </div>
</nav>

<!-- Sidebar -->
<div class="sidebar">
  <!-- Logo Section -->
  <div class="logo">
    <img src="{{ asset('images/logodashboard.png') }}" alt="Uploaded Image">
    <h3 style=" margin: 5px 35px; width: 70%; border-radius: 3px;" class="text-white">MobileMela</h3> <!-- Optional: Add brand name -->
  </div>

  <a href="{{ route('admindashboard') }}" id="dashboard" class="active">
    <i class="fa fa-th-large"></i> Dashboard
  </a>

  <!-- Categories Section with Dropdown and Subcategories -->
  <a class="category-link" data-bs-toggle="collapse" href="#electronicsMenu" role="button" aria-expanded="false" aria-controls="electronicsMenu">
    <i class="fa fa-shopping-bag"></i> Products
  </a>
  <div class="collapse" id="electronicsMenu">
    <a href="{{ route('addproducts') }}" class="category-link">
      <i class="fa fa-plus-circle"></i> Add Product
    </a>
    <a href="{{ route('allproducts') }}" class="category-link">
      <i class="fa fa-list"></i> All Products
    </a>
  </div>

  <a  class="category-link" data-bs-toggle="collapse" href="#fashionMenu" role="button" aria-expanded="false" aria-controls="fashionMenu">
    <i class="fa fa-bars"></i> Category
  </a>
  <div class="collapse" id="fashionMenu">
    <a href="{{ route('addcategory') }}" class="category-link">
      <i class="fa fa-plus-circle"></i> Add Category
    </a>
    <a href="{{ route('allcategory') }}" class="category-link">
      <i class="fa fa-list"></i> All Categories
    </a>
  </div>

  <a class="category-link" data-bs-toggle="collapse" href="#homeMenu" role="button" aria-expanded="false" aria-controls="homeMenu">
    <i class="fa fa-sliders"></i> Sub Category
  </a>
  <div class="collapse" id="homeMenu">
    <a href="{{ route('addsubcategory') }}" class="category-link">
      <i class="fa fa-plus-circle"></i> Add Sub Category
    </a>
    <a href="{{ route('allsubcategory') }}" class="category-link">
      <i class="fa fa-list"></i> All Sub Category
    </a>
  </div>

  <a class="category-link" data-bs-toggle="collapse" href="#booksMenu" role="button" aria-expanded="false" aria-controls="booksMenu">
    <i class="fas fa-book"></i> Orders
  </a>
  <div class="collapse" id="booksMenu">
    <a href="{{ route('pendingorders') }}" class="category-link">
      <i class="fa fa-pause"></i> Pending Products
    </a>
    <a href="{{ route('completedorders') }}" class="category-link">
      <i class="fa fa-check-square"></i> Completed Products
    </a>
    <a href="{{ route('canceledorders') }}" class="category-link">
      <i class="fa fa-scissors"></i> Rejected Products
    </a>
  </div>

  <a href="#" id="settings">
    <i class="fas fa-cogs"></i> Settings
  </a>
</div>

<!-- Content -->
<div class="content">
   @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // JavaScript to handle active link on the sidebar
  document.querySelectorAll('.sidebar a').forEach(link => {
    link.addEventListener('click', function (event) {
      // Remove 'active' class from all links
      document.querySelectorAll('.sidebar a').forEach(item => item.classList.remove('active'));

      // Add 'active' class to the clicked link
      this.classList.add('active');

      // Prevent parent categories from getting the active state
      event.stopPropagation();
    });
  });
</script>
</body>
</html>
