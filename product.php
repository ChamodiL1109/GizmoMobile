<!DOCTYPE html>
<html lang="en" data-bs-theme="dark"></html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Cards</title>
    <link rel="stylesheet" href="product.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       
    </style>
   
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
    <div id="product-container">
        
    </div>
    <script>
        const products = [
           
          
            { name: "Samsung Galaxy A06 Smartphone ", description: " Rs 36,499.00", image: "product 1.webp" },
            { name: "Samsung Galaxy A04s Smartphone", description: "Rs 32,499.00", image: "product 6.webp" },
            { name: "Samsung Galaxy A04 Smartphone", description: "Rs 30,999.00", image: "product 7.webp" },
            { name: "Samsung Galaxy F04 (4GB RAM 64GB ROM)", description: "Rs 30,499.00", image: "product 8.webp" },
            { name: "Samsung Galaxy A54 5G Smartphone", description: "Rs 90,499.00", image: "product 11.webp" },
            { name: "Samsung Galaxy A14 4G Smartphone", description: "Rs 49,999.00", image: "product 12.webp" },
            { name: "Samsung Galaxy A04E Smartphone", description: "Rs 34,999.00", image: "product 13.webp" },
            { name: "Samsung Galaxy A15 4G Smartphone", description: "Rs 42,999.00", image: "product 14.webp" },
            { name: "Samsung Galaxy A14 5G Smartphone", description: "Rs 66,999.00", image: "product 15.webp" },
            { name: "Samsung Galaxy A24 4G Smartphone", description: "Rs 65,999.00", image: "product 18.webp" },
            { name: "Samsung Galaxy F05 Smartphone", description: "Rs 29,999.00", image: "product 19.webp" },
            { name: "Samsung Galaxy A34 5G Smartphone", description: "Rs 81,999.00", image: "product 22.webp" },
            { name: "Samsung Galaxy M14 Smartphone", description: "Rs 51,999.00", image: "product 27.webp" },
            { name: "Google Pixel 7 Smartphone", description: "Rs 124,999.00", image: "product 10.webp" },
            { name: "Redmi 12C Smartphone", description: "Rs 35,999.00", image: "product 4.webp" },
            { name: "Redmi Note 12 4G Smartphone", description: "Rs 58,499.00", image: "product 9.webp" },
            { name: "Redmi 10C smartphone", description: "Rs 44,999.00", image: "product 16.webp" },
            { name: "Redmi Note 13 4G Smartphone", description: "Rs 71,999.00", image: "product 17.webp" },
            { name: "Redmi 12 Smartphone", description: "Rs 54,999.00", image: "product 20.webp" },
            { name: "Redmi 10A Smartphone", description: "Rs 38,499.00", image: "product 21.webp" },
            { name: "Redmi Note 12 Pro 5G Smartphone", description: "Rs 94,999.00", image: "product 25.webp" },
            { name: "Redmi Note 13 5G Smartphone", description: "Rs 76,499.00", image: "product 26.webp" },
            { name: "Redmi Note 12S Smartphone", description: "Rs 66,999.00", image: "product 28.webp" },
            { name: "Xiaomi Redmi 13C Smartphone", description: "Rs 41,999.00", image: "product 5.webp" },
            { name: "Xiaomi Redmi 14C Smartphone", description: "Rs 45,999.00", image: "product 2.webp" },
            { name: "Xiaomi Redmi Note 14 4G Smartphone", description: "Rs 64,999.00", image: "product 3.webp" },
            { name: "Xiaomi Redmi Note 11 Pro 5G", description: "Rs 84,999.00", image: "product 35.webp" },
            { name: "Google Pixel 7 Pro Smartphone", description: "Rs 249,999.00", image: "product 24.webp" },        
            { name: "Apple iPhone 14 Pro", description: "Rs 342,999.00", image: "product 23.webp" },
            { name: "Apple iPhone 15 Pro", description: "Rs 395,000.00", image: "product 30.webp" },
            { name: "Apple iPhone 15", description: "Rs 413,000.00", image: "product 32.webp" },
            { name: "Apple iPhone 15 Plus", description: "Rs 565,000.00", image: "product 33.webp" },
            { name: "Apple iPhone 15 Pro Max", description: "Rs 389,999.00", image: "product 34.webp" },
            { name: "Google Pixel 8 Pro Smartphone", description: "Rs 254,999.00", image: "product 31.webp" },
            { name: "OnePlus Nord CE 2 Lite 5G - Black", description: "Rs 73,999.00", image: "product 29.webp" },
           
         
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
            { name: "Anker MagGo Slim 10000mAh 15W Power Bank", description: "Rs 16,999.00", image: "product 48.webp" },
            { name: "Anker 622 5000mAh Magnetic Powerbank", description: "Rs 9,999.00", image: "product 49.webp" },
            { name: "Anker Powercore 10000mAh 22.5W Power Bank", description: "Rs 6,999.00", image: "product 47.webp" },
            { name: "Anker MagGo Power Bank 15w Portable Charger", description: "Rs 19,999.00", image: "product 50.webp" },
            { name: "Anker Zolo 10000mAh 30W Magnetic Power Bank with USB C Cable ", description: "Rs 8,999.00", image: "product 51.webp" },

            { name: "Xiaomi Mi Band 7 Pro Fitness Tracker Smartwatch", description: "Rs 21,999.00", image: "product 55.webp" },
            { name: "Xiaomi MI Band 9 Fitness Band", description: "Rs 10,499.00", image: "product 52.webp" },
            { name: "Xiaomi MI Band 8 Fitness Band", description: "Rs 8,949.00", image: "product 53.webp" },
            { name: "Samsung Galaxy Fit 3 Smartwatch", description: "Rs 13,499.00", image: "product 54.webp" },
            { name: "Samsung Galaxy Watch 5", description: "Rs 50,999.00", image: "product 58.webp" },
            { name: "Google Pixel Watch 2", description: "Rs 79,999.00", image: "product 69.webp" },
            { name: "Redmi Watch 5 Active Calling Smartwatch", description: "Rs 9,999.00", image: "product 56.webp" },
            { name: "Samsung Galaxy Watch 6 (R940 / R930)", description: "Rs 47,499.00", image: "product 59.webp" },
            { name: "Apple Watch Series 8 41mm | 45mm", description: "Rs 112,999.00", image: "product 60.webp" },
            { name: "Apple Watch Series 7 (GPS Model)", description: "Rs 134,799.00", image: "product 61.webp" },
            { name: "Apple Watch Series 9 (45mm/41mm)", description: "Rs 101,999.00", image: "product 62.webp" },
            { name: "Huawei Watch GT 5 Smartwatch (GT5)", description: "Rs 55,999.00", image: "product 67.webp" },
            { name: "Google Pixel Watch 3 Smartwatch (45mm)", description: "Rs 102,999.00", image: "product 68.webp" },
            { name: "Huawei HONOR Band 9 Black", description: "Rs 7,999.00", image: "product 63.webp" },
            { name: "Huawei Watch Fit 4", description: "Rs 39,999.00", image: "product 64.webp" },
            { name: "Huawei Watch Fit Mini", description: "Rs 33,999.00", image: "product 65.webp" },
            { name: "HUAWEI Watch FIT 2 Smartwatch", description: "Rs 44,999.00", image: "product 66.webp" },
            { name: "Xiaomi Redmi Watch 5 Lite Calling Smartwatch", description: "Rs 13,999.00", image: "product 57.webp" },
            

            { name: "JBL Charge 5 Portable Bluetooth Speaker", description: "Rs 38,999.00", image: "product 70.webp" },
            { name: "JBL Go 4 Ultra Portable Bluetooth Speaker", description: "Rs 12,499.00", image: "product 71.webp" },
            { name: "JBL Flip 6 Portable Waterproof Speaker (Martin Garrix Edition)", description: "Rs 31,499.00", image: "product 72.webp" },
            { name: "JBL PartyBox Club 120 Outdoor Speaker", description: "Rs 109,999.00", image: "product 73.webp" },
            { name: "JBL PartyBox Stage 320 Outdoor Portable Speaker", description: "Rs 149,999.00", image: "product 74.webp" },
            { name: "JBL Charge 6 Portable Speaker", description: "Rs 49,999.00", image: "product 75.webp" },
            { name: "Anker Soundcore Flare 2 Portable Bluetooth Speaker", description: "Rs 17,999.00", image: "product 76.webp" },
            { name: "Xiaomi Mi Sound Outdoor 30W Bluetooth Speaker", description: "Rs 14,999.00", image: "product 77.webp" },
            { name: "Xiaomi Redmi Soundbar 30W Surround Sound TV Speaker", description: "Rs 14,999.00", image: "product 78.webp" },
            { name: "Anker Soundcore Motion X600 High-Fidelity Speaker", description: "Rs 49,999.00", image: "product 79.webp" },
            { name: "Anker Soundcore Rave Party 2 (120W) Portable Speaker", description: "Rs 59,999.00", image: "product 80.webp" },
            { name: "Xiaomi Mi Bluetooth Speaker (40W)", description: "Rs 20,999.00", image: "product 81.webp" },

            
            { name: "JBL Tune 110 Wired In-Earphone", description: "Rs 2,199.00", image: "product 82.webp" },
            { name: "Anker Soundcore A20i TWS Earbuds", description: "Rs 4,999.00", image: "product 86.webp" },
            { name: "JBL Tune 520BT Wireless On Ear Headphones", description: "Rs 13,999.00", image: "product 87.webp" },
            { name: "Apple Wired Earphone with Lightning Connector (EarPods)", description: "Rs 6,999.00", image: "product 85.webp" },
            { name: "Anker Soundcore R50i True Wireless Earbuds", description: "RS 4,499.00", image: "product 83.webp" },
            { name: "Anker Soundcore R50i NC True Wireless Bluetooth Earbuds", description: "Rs 6,999.00", image: "product 84.webp" },
            { name: "Samsung Galaxy Buds FE TWS ANC Earbuds", description: "Rs 14,999.00", image: "product 88.webp" },
            { name: "Anker Soundcore Space One Over Ear Headphones", description: "Rs 19,999.00", image: "product 89.webp" },
            { name: "Apple AirPods Pro (2nd Generation)", description: "Rs 69,999.00", image: "product 90.webp" },
            { name: "JBL Tune 720BT Wireless Headphones", description: "Rs 15,999.00", image: "product 91.webp" },
            { name: "Samsung USB Type-C AKG Wired In-Ear Headphones", description: "Rs 4,999.00", image: "product 92.webp" },
            { name: "Xiaomi Redmi Buds 6 Active", description: "Rs 5,499.00", image: "product 93.webp" },
            { name: "OnePlus Buds 3 Wireless Earbuds", description: "Rs 19,999.00", image: "product 96.webp" },
            { name: "JBL Wave Buds TWS Earbuds", description: "Rs 14,999.00", image: "product 97.webp" },
            { name: "Apple Airpods 4 (2024)", description: "Rs 47,999.00", image: "product 98.webp" },
            { name: "Xiaomi Redmi Buds 6 Play Wireless Earbuds", description: "Rs 4,499.00", image: "product 94.webp" },
            { name: "OnePlus Bullets Wireless Z2 ANC Neckband Earbuds", description: "Rs 9,999.00", image: "product 95.webp" },
            

            { name: "Apple 20W USB-C Power Adapter, Charger", description: "Rs 7,499.00", image: "product 99.webp" },
            { name: "Samsung 25W Travel charger Adapter (Super Fast Charger) - UK", description: "Rs 3,499.00", image: "product 100.webp" },
            { name: "MI 33W Wall Charger with Cable", description: "Rs 4,499.00", image: "product 101.webp" },
            { name: "Anker 322 USB-C to Lightning Cable (Series 3) Braided", description: "Rs 4,999.00", image: "product 102.webp" },
            { name: "Samsung 45W Type-C Travel Charger Adapter with Cable", description: "Rs 7,999.00", image: "product 103.webp" },
            { name: "Anker 322 USB-C to USB-C Cable (Series 3)", description: "Rs 1,499.00", image: "product 104.webp" },
            { name: "Xiaomi Mi 55W GaN Travel Charger (Adapter)", description: "Rs 5,999.00", image: "product 106.webp" },
            { name: "Anker Zolo 20W PD 3.0 Fast Adapter - A2699 (Charger)", description: "Rs 3,499.00", image: "product 107.webp" },
            { name: "Anker Zolo 30W Compact USB C GaN Charger Adapter (A2698)", description: "Rs 4,999.00", image: "product 108.webp" },
            { name: "Anker Charger PowerExtend Travel Adapter 30W With USB C Charger 312 ", description: "Rs 8,999.00", image: "product 109.webp" },
            { name: "Google 30W USB-C Power Charger - 3 Pin UK Adapter", description: "Rs 7,299.00", image: "product 105.webp" },
            { name: "Google 45W USB-C Power Charger (Adapter)", description: "Rs 9,999.00", image: "product 110.webp" },
            { name: "Anker Nano 100W Charger with 6ft 5A USB-C Cable", description: "Rs 14,999.00", image: "product 111.webp" },

            { name: "LITO Amazfit GTS 4 Mini/GTS 4/ Pop 2 Screen Protector", description: "Rs 699.00", image: "product 115.webp" },
            { name: "LITO Camera Lens Protector for iPhone 13 Pro / 13 Pro Max", description: "Rs 499.00", image: "product 113.webp" },
            { name: "Lito Magic D+ Tool Series (iPhone 13/13 Pro|12/12 Pro/Max|14 Plus/Pro)", description: "Rs 1,199.00", image: "product 119.webp" },
            { name: "LITO Redmi Smart Band 2/Watch 2 Lite Screen Protector", description: "Rs 599.00", image: "product 116.webp" },
            { name: "LITO Tempered Glass for Google Pixel 6 Pro/7 Pro/6/7/6A", description: "Rs 1,499.00", image: "product 121.webp" },
            { name: "LITO Tempered Glass for OnePlus 11/9/10 Pro", description: "Rs 1,299.00", image: "product 118.webp" },
            { name: "Amazfit GTR Mini Screen Protector", description: "Rs 499.00", image: "product 114.webp" },
            { name: "LITO Tempered Glass for Nothing Phone 1", description: "Rs 1,499.00", image: "product 120.webp" },
            { name: "LITO Camera Lens Protector for iPhone 14 / 14 Pro", description: "Rs 499.00", image: "product 112.webp" }, 
            { name: "LITO Apple iPhone Tempered Glass (iPhone 11/iPhone 12/iPhone 13/iPhone 14/iPhone 15)", description: "Rs 999.00", image: "product 117.webp" },
            
    

        ];

        const container = document.getElementById('product-container');

        
        
        products.forEach(product => {
            const card = document.createElement('div');
            card.className = 'card';
            card.innerHTML = `
                <img src="${product.image}" alt="${product.name}">
                <h3>${product.name}</h3>
                <h5>${product.description}</h5>
                <button onclick='addToCart(${JSON.stringify(product)})'>Add to Cart</button>
            `;
            container.appendChild(card);
        });
    </script>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>