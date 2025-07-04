<!DOCTYPE html>
<!-- This is the document type declaration for HTML5 -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gizmo Mobile </title>
    <link rel="stylesheet" href="navbar.css">
    
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-white bg-white fixed-top" style="min-height: 100px;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="GIZMO (2).png" alt="Gizmo Logo" width="70" height="70" class="d-inline-block align-text-top me-2">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link animated-button" href="home.php"><b>Home</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link animated-button" href="product.php"><b>Product</b></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle animated-button" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <b>Categories</b>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="phone.php">Smart Phones</a></li>
              <li><a class="dropdown-item" href="EarBuds.php">Earphones and Headphones</a></li>
              <li><a class="dropdown-item" href="Chargers.php">Chargers and Cables</a></li>
              <li><a class="dropdown-item" href="Speakers.php">speakers</a></li>
              <li><a class="dropdown-item" href="Protectors.php">Protectors</a></li>
              <li><a class="dropdown-item" href="PowerBank.php">Power Bank</a></li>
              <li><a class="dropdown-item" href="SmartWatchs.php">SmartWatchs</a></li>
              <li><a class="dropdown-item" href="#"></a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link animated-button" href="contact.php"><b>Contact</b></a>
          </li>
        </ul>

        <!--Search bar-->
        <form class="d-flex me-3" role="search" onsubmit="event.preventDefault(); filterPhonesFromNavbar();">
  <input type="text" id="navbarSearchInput" class="form-control me-2" placeholder="Search" aria-label="Search" onkeyup="filterPhonesFromNavbar()">
  <div class="d-flex align-items-center">
    <button class="btn btn-outline-primary animated-button me-4" type="submit"
      style="--bs-btn-border-color: #a829c8; --bs-btn-color: #a829c8;">
      <b>Search</b>
    </button>
  </div>
</form>

        <style>
          .navbar {
            min-height: 100px !important;
          }
          .btn-outline-primary.animated-button {
            border-color: #a829c8 !important;
            color: #a829c8 !important;
            transition: background 0.3s, color 0.3s, border-color 0.3s;
          }
          .btn-outline-primary.animated-button:hover, 
          .btn-outline-primary.animated-button:focus {
            background: #a829c8 !important;
            color: #fff !important;
            border-color: #a829c8 !important;
          }
        </style>

        <!--cart-->
        <div class="d-flex align-items-center position-relative">
          <span class="position-absolute top-0 start-50 translate-left badge rounded-pill bg-danger" style="z-index:1; font-size:0.8rem;" id="cart-count">0</span>
          <a href="cart.php" class="me-3">
            <img src="cart1.png" alt="Cart logo" width="40" height="40" class="d-inline-block align-text-top">
          </a>
        </div>
        

        <script>
         document.addEventListener('DOMContentLoaded', function () {
          const cart = JSON.parse(localStorage.getItem('cart')) || [];
          const cartCount = document.getElementById('cart-count');
             if (cartCount) {
                cartCount.textContent = cart.length;
                cartCount.style.display = cart.length > 0 ? 'inline-block' : 'none';
             }
         });
       </script>

        <!--My account-->
        <a href="login.php" class="me-3">
          <img src="profile1.png" alt="Profile" width="40" height="40" class="d-inline-block align-text-top">
        </a>
       
          
        
        
        
      </div>
    </div>
  </nav>  
  </div>

      
    </nav>
</body>
</html>