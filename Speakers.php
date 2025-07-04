<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>EarBuds</title>
  
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
    const speakers = [

    { name: "JBL Charge 5 Portable Bluetooth Speaker", price: "Rs 38,999.00", image: "product 70.webp" },
            { name: "JBL Go 4 Ultra Portable Bluetooth Speaker", price: "Rs 12,499.00", image: "product 71.webp" },
            { name: "JBL Flip 6 Portable Waterproof Speaker (Martin Garrix Edition)", price: "Rs 31,499.00", image: "product 72.webp" },
            { name: "JBL PartyBox Club 120 Outdoor Speaker", price: "Rs 109,999.00", image: "product 73.webp" },
            { name: "JBL PartyBox Stage 320 Outdoor Portable Speaker", price: "Rs 149,999.00", image: "product 74.webp" },
            { name: "JBL Charge 6 Portable Speaker", price: "Rs 49,999.00", image: "product 75.webp" },
            { name: "Anker Soundcore Flare 2 Portable Bluetooth Speaker", price: "Rs 17,999.00", image: "product 76.webp" },
            { name: "Xiaomi Mi Sound Outdoor 30W Bluetooth Speaker", price: "Rs 14,999.00", image: "product 77.webp" },
            { name: "Xiaomi Redmi Soundbar 30W Surround Sound TV Speaker", price: "Rs 14,999.00", image: "product 78.webp" },
            { name: "Anker Soundcore Motion X600 High-Fidelity Speaker", price: "Rs 49,999.00", image: "product 79.webp" },
            { name: "Anker Soundcore Rave Party 2 (120W) Portable Speaker", price: "Rs 59,999.00", image: "product 80.webp" },
            { name: "Xiaomi Mi Bluetooth Speaker (40W)", price: "Rs 20,999.00", image: "product 81.webp" },
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
        speakers.forEach(product => {
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

</body>
</html>