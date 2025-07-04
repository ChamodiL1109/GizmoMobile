<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Smart Watch</title>
  
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <?php include 'navbar.php'; ?>

   <?php
    session_start();

    // Initialize cart if not set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Handle Add to Cart (AJAX)
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_to_cart') {
        $product = [
            'name' => $_POST['name'] ?? '',
            'price' => $_POST['price'] ?? '',
            'image' => $_POST['image'] ?? ''
        ];
        $_SESSION['cart'][] = $product;
        echo json_encode(['success' => true, 'cart_count' => count($_SESSION['cart'])]);
        exit;
    }
    ?>


    <script>
    function addToCart(product) {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart.push(product);
  localStorage.setItem('cart', JSON.stringify(cart));

  // Update cart count in navbar
  const cartCountElem = document.getElementById('cart-count');
  if (cartCountElem) {
    cartCountElem.textContent = cart.length;
    cartCountElem.style.display = 'inline-block';
  }
}
</script>

  
<div class="container">
    

    <main class="product-area" id="productArea">
      <!-- EarBuds cards will be loaded here -->
    </main>
  </div>

  <div id="product-container">
        
    </div>

  <script>
    const smartWatch = [

    { name: "Xiaomi MI Band 9 Fitness Band", price: "Rs 10,499.00", image: "product 52.webp" },
            { name: "Xiaomi MI Band 8 Fitness Band", price: "Rs 8,949.00", image: "product 53.webp" },
            { name: "Xiaomi Mi Band 7 Pro Fitness Tracker Smartwatch", price: "Rs 21,999.00", image: "product 55.webp" },
            { name: "Xiaomi Redmi Watch 5 Lite Calling Smartwatch", price: "Rs 13,999.00", image: "product 57.webp" },
            { name: "Redmi Watch 5 Active Calling Smartwatch", price: "Rs 9,999.00", image: "product 56.webp" },
            { name: "Samsung Galaxy Fit 3 Smartwatch", price: "Rs 13,499.00", image: "product 54.webp" },
            { name: "Samsung Galaxy Watch 5", price: "Rs 50,999.00", image: "product 58.webp" },
            { name: "Samsung Galaxy Watch 6 (R940 / R930)", price: "Rs 47,499.00", image: "product 59.webp" },
            { name: "Apple Watch Series 8 41mm | 45mm", price: "Rs 112,999.00", image: "product 60.webp" },
            { name: "Apple Watch Series 7 (GPS Model)", price: "Rs 134,799.00", image: "product 61.webp" },
            { name: "Apple Watch Series 9 (45mm/41mm)", price: "Rs 101,999.00", image: "product 62.webp" },
            { name: "Huawei HONOR Band 9 Black", price: "Rs 7,999.00", image: "product 63.webp" },
            { name: "Huawei Watch Fit 4", price: "Rs 39,999.00", image: "product 64.webp" },
            { name: "Huawei Watch Fit Mini", price: "Rs 33,999.00", image: "product 65.webp" },
            { name: "HUAWEI Watch FIT 2 Smartwatch", price: "Rs 44,999.00", image: "product 66.webp" },
            { name: "Huawei Watch GT 5 Smartwatch (GT5)", price: "Rs 55,999.00", image: "product 67.webp" },
            { name: "Google Pixel Watch 3 Smartwatch (45mm)", price: "Rs 102,999.00", image: "product 68.webp" },
            { name: "Google Pixel Watch 2", price: "Rs 79,999.00", image: "product 69.webp" },
            ];


             const container = document.getElementById('product-container');

        const style = document.createElement('style');
        style.textContent = `
        #product-container {
            margin-top: 90px !important;
            padding: 20px;
            display: grid;
            background-image: url('back4 (1).jfif');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 24px;
            justify-items: center;
            margin: 30px auto;
            max-width: 1400px;
        }
        .card {
            background:#fff!important;
            color:#000!important;
            border:1px solid #ddd;
            margin:10px;
            padding:15px;
            border-radius:8px;
            box-shadow:0 0px 0px #0001;
            display:inline-block;
            width:240px;
            vertical-align:top;
            text-align:center;
            position: relative;
            padding-bottom: 56px; /* space for button */
            }

        .card img {
            width:160px;
            height:160px;
            object-fit:contain;
            margin-bottom:10px;
            background:#f8f8f8;
            border-radius:4px;
            align-self :center;
            }
        .card button {
            background: #800080;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            margin-top: 10px;
            cursor: pointer;
            transition: background .2s;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: 16px;
            width: 80%;
        }
       
        .card button:hover {background:#333;}
        `;
        document.head.appendChild(style);
        smartWatch.forEach(product => {
            const card = document.createElement('div');
            card.className = 'card';
            card.innerHTML = `
                <img src="${product.image}" alt="${product.name}">
                <h3>${product.name}</h3>
                <p>${product.price}</p>
                <button onclick='addToCart(${JSON.stringify(product)})'>Add to Cart</button>
            `;
            container.appendChild(card);
        });
    </script>


<!-- Bootstrap JS (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Footer -->
    <footer class="bg-light text-dark text-center py-3">
       <!-- Product logo Section -->
        <div class="logo-container mt-5">
          <div class="row justify-content-center">
            <div class="col-auto">
              <img src="Apple-Logo.png" alt="Apple Logo" width="90" height="90" class="d-inline-block align-text-top me-2">
          </div>
          <div class="col-auto">
              <img src="Nokia-Logo.png" alt="Nokia Logo" width="150" height="90" class="d-inline-block align-text-top me-2">
          </div>
          <div class="col-auto">
              <img src="OnePlus-Logo.png" alt="OnePlus Logo" width="150" height="90" class="d-inline-block align-text-top me-2">
          </div>
          <div class="col-auto">
              <img src="Oppo-Logo.png" alt="Oppo Logo" width="180" height="60" class="d-inline-block align-text-top me-2">
          </div>
          <div class="col-auto">
              <img src="Vivo-Logo.png" alt="Vivo Logo" width="150" height="90" class="d-inline-block align-text-top me-2">
          </div>
            </div>
            <div class="row justify-content-center mt-3">
          <div class="col-auto">
              <img src="Xiaomi-Logo.png" alt="Xiaomi Logo" width="150" height="70" class="d-inline-block align-text-top me-2">
          </div>
          <div class="col-auto">
              <img src="Sony-Logo.png" alt="Sony-Logo " width="120" height="50" class="d-inline-block align-text-top me-2">
          </div>
          <div class="col-auto">
              <img src="Huawei-Logo.png" alt="Huawei Logo" width="90" height="90" class="d-inline-block align-text-top me-2">
          </div>
          <div class="col-auto">
              <img src="Samsung-Logo.png" alt="Samsung Logo" width="180" height="70" class="d-inline-block align-text-top me-2">
          </div>
            </div>
        </div>
<br><br>
        <p>&copy; 2025 Mobile Shop. All rights reserved.</p>
    </footer>
</body>
</html>

</body>
</html>