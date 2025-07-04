<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Power Bank</title>
  
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
            'description' => $_POST['description'] ?? '',
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
    const powerBank = [

   { name: "Xiaomi Mi 20000mAh 50w PowerBank", description: "Rs 12,999.00", image: "product 36.webp" },
            { name: "Xiaomi Mi 33w Power Bank 20000mah ", description: "Rs 9,999.00", image: "product 37.webp" },
            { name: "Xiaomi Mi Power Bank 10000mAh", description: "Rs 7,999.00", image: "product 38.webp" },
            { name: "Xiaomi Mi 33W Power Bank 10000mAh ", description: "Rs 7,999.00", image: "product 39.webp" },
            { name: "Xiaomi Mi PowerBank 10000mAh 22.5W", description: "Rs 4,499.00", image: "product 40.webp" },
            { name: "Samsung 25W Battery Pack 20000mAh", description: "Rs 13,999.00", image: "product 41.webp" },
            { name: "Samsung 20000 mAh Battery Pack 45W", description: "Rs 14,999.00", image: "product 42.webp" },
            { name: "Aspor A323  10000mAh Power Bank ", description: "Rs 1,499.00", image: "product 43.jpg" },
            { name: "ASPOR A301 20000mAh Power Bank<br>", description: "Rs 3,099.00", image: "product 44.jpg" },
            { name: "Aspor A316 20000mAh 22.5W Portable Power Bank", description: "Rs 3,599.00", image: "product 45.webp" },
            { name: "Aspor A337 30000 mAh 22.5W Power Bank", description: "Rs 4,999.00", image: "product 46.webp" },
            { name: "Anker Powercore 10000mAh 22.5W Power Bank", description: "Rs 6,999.00", image: "product 47.webp" },
            { name: "Anker MagGo Slim 10000mAh 15W Power Bank", description: "Rs 16,999.00", image: "product 48.webp" },
            { name: "Anker 622 5000mAh Magnetic Powerbank", description: "Rs 9,999.00", image: "product 49.webp" },
            { name: "Anker MagGo Power Bank 15w Portable Charger", description: "Rs 19,999.00", image: "product 50.webp" },
            { name: "Anker Zolo 10000mAh 30W Magnetic Power Bank with USB C Cable ", description: "Rs 8,999.00", image: "product 51.webp" },
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
        powerBank.forEach(product => {
            const card = document.createElement('div');
            card.className = 'card';
            card.innerHTML = `
                <img src="${product.image}" alt="${product.name}">
                <h3>${product.name}</h3>
                <p>${product.description}</p>
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

