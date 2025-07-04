<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Protectors</title>
  
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
    const protectors = [

    
             { name: "LITO Camera Lens Protector for iPhone 14 / 14 Pro", price: "Rs 499.00", image: "product 112.webp" },
            { name: "LITO Camera Lens Protector for iPhone 13 Pro / 13 Pro Max", price: "Rs 499.00", image: "product 113.webp" },
            { name: "Amazfit GTR Mini Screen Protector", price: "Rs 499.00", image: "product 114.webp" },
            { name: "LITO Amazfit GTS 4 Mini/GTS 4/ Pop 2 Screen Protector", price: "Rs 699.00", image: "product 115.webp" },
            { name: "LITO Redmi Smart Band 2/Watch 2 Lite Screen Protector", price: "Rs 599.00", image: "product 116.webp" },
            { name: "LITO Apple iPhone Tempered Glass (iPhone 11/iPhone 12/iPhone 13/iPhone 14/iPhone 15)", price: "Rs 999.00", image: "product 117.webp" },
            { name: "LITO Tempered Glass for OnePlus 11/9/10 Pro", price: "Rs 1,299.00", image: "product 118.webp" },
            { name: "Lito Magic D+ Tool Series (iPhone 13/13 Pro|12/12 Pro/Max|14 Plus/Pro)", price: "Rs 1,199.00", image: "product 119.webp" },
            { name: "LITO Tempered Glass for Nothing Phone 1", price: "Rs 1,499.00", image: "product 120.webp" },
            { name: "LITO Tempered Glass for Google Pixel 6 Pro/7 Pro/6/7/6A", price: "Rs 1,499.00", image: "product 121.webp" },
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
        protectors.forEach(product => {
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

