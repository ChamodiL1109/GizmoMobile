<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Phones</title>
  <link rel="stylesheet" href="phone.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include 'navbar.php'; ?>

<div id="phone-container">
  <aside class="sidebar">
    <div class="sidebar-content">
      <h2>Brands</h2>
      <ul id="brandList">
        <li onclick="filterByBrand('all')">All</li>
        <li onclick="filterByBrand('Apple')">Apple</li>
        <li onclick="filterByBrand('Samsung')">Samsung</li>
        <li onclick="filterByBrand('Xiaomi')">Xiaomi</li>
        <li onclick="filterByBrand('OnePlus')">OnePlus</li>
        <li onclick="filterByBrand('Google')">Google</li>
      </ul>
    </div>
  </aside>

  <main class="product-area" id="productArea"></main>
</div>

<script>
const phones = [
  { name: "Samsung Galaxy A06 Smartphone", brand: "Samsung", image: "product 1.webp", price: "Rs 36,499.00" },
  { name: "Samsung Galaxy A04s Smartphone", brand: "Samsung", image: "product 6.webp", price: "Rs 32,499.00" },
  { name: "Samsung Galaxy A04 Smartphone", brand: "Samsung", image: "product 7.webp", price: "Rs 30,999.00" },
  { name: "Samsung Galaxy F04", brand: "Samsung", image: "product 8.webp", price: "Rs 30,499.00" },
  { name: "Samsung Galaxy A54 5G Smartphone", brand: "Samsung", image: "product 11.webp", price: "Rs 90,499.00" },
  { name: "Samsung Galaxy A14 4G Smartphone", brand: "Samsung", image: "product 12.webp", price: "Rs 49,999.00" },
  { name: "Samsung Galaxy A04E Smartphone", brand: "Samsung", image: "product 13.webp", price: "Rs 34,999.00" },
  { name: "Samsung Galaxy A15 4G Smartphone", brand: "Samsung", image: "product 14.webp", price: "Rs 42,999.00" },
  { name: "Samsung Galaxy A14 5G Smartphone", brand: "Samsung", image: "product 15.webp", price: "Rs 66,999.00" },
  { name: "Samsung Galaxy A24 4G Smartphone", brand: "Samsung", image: "product 18.webp", price: "Rs 65,999.00" },
  { name: "Samsung Galaxy F05 Smartphone", brand: "Samsung", image: "product 19.webp", price: "Rs 29,999.00" },
  { name: "Samsung Galaxy A34 5G Smartphone", brand: "Samsung", image: "product 22.webp", price: "Rs 81,999.00" },
  { name: "Samsung Galaxy M14 Smartphone", brand: "Samsung", image: "product 27.webp", price: "Rs 51,999.00" },

  { name: "Google Pixel 7 Smartphone", brand: "Google", image: "product 10.webp", price: "Rs 124,999.00" },
  { name: "Google Pixel 7 Pro Smartphone", brand: "Google", image: "product 24.webp", price: "Rs 249,999.00" },
  { name: "Google Pixel 8 Pro Smartphone", brand: "Google", image: "product 31.webp", price: "Rs 254,999.00" },

  { name: "Redmi 12C Smartphone", brand: "Xiaomi", image: "product 4.webp", price: "Rs 35,999.00" },
  { name: "Redmi Note 12 4G Smartphone", brand: "Xiaomi", image: "product 9.webp", price: "Rs 58,499.00" },
  { name: "Redmi 10C smartphone", brand: "Xiaomi", image: "product 16.webp", price: "Rs 44,999.00" },
  { name: "Redmi Note 13 4G Smartphone", brand: "Xiaomi", image: "product 17.webp", price: "Rs 71,999.00" },
  { name: "Redmi 12 Smartphone", brand: "Xiaomi", image: "product 20.webp", price: "Rs 54,999.00" },
  { name: "Redmi 10A Smartphone", brand: "Xiaomi", image: "product 21.webp", price: "Rs 38,499.00" },
  { name: "Redmi Note 12 Pro 5G Smartphone", brand: "Xiaomi", image: "product 25.webp", price: "Rs 94,999.00" },
  { name: "Redmi Note 13 5G Smartphone", brand: "Xiaomi", image: "product 26.webp", price: "Rs 76,499.00" },
  { name: "Redmi Note 12S Smartphone", brand: "Xiaomi", image: "product 28.webp", price: "Rs 66,999.00" },
  { name: "Xiaomi Redmi 13C Smartphone", brand: "Xiaomi", image: "product 5.webp", price: "Rs 41,999.00" },
  { name: "Xiaomi Redmi 14C Smartphone", brand: "Xiaomi", image: "product 2.webp", price: "Rs 45,999.00" },
  { name: "Xiaomi Redmi Note 14 4G Smartphone", brand: "Xiaomi", image: "product 3.webp", price: "Rs 64,999.00" },
  { name: "Xiaomi Redmi Note 11 Pro 5G", brand: "Xiaomi", image: "product 35.webp", price: "Rs 84,999.00" },

  { name: "OnePlus Nord CE 2 Lite 5G - Black", brand: "OnePlus", image: "product 29.webp", price: "Rs 73,999.00" },

  { name: "Apple iPhone 14 Pro", brand: "Apple", image: "product 23.webp", price: "Rs 342,999.00" },
  { name: "Apple iPhone 15 Pro", brand: "Apple", image: "product 30.webp", price: "Rs 395,000.00" },
  { name: "Apple iPhone 15", brand: "Apple", image: "product 32.webp", price: "Rs 413,000.00" },
  { name: "Apple iPhone 15 Plus", brand: "Apple", image: "product 33.webp", price: "Rs 565,000.00" },
  { name: "Apple iPhone 15 Pro Max", brand: "Apple", image: "product 34.webp", price: "Rs 389,999.00" }
];

let currentBrand = 'all';

function displayPhones(filteredPhones) {
  const productArea = document.getElementById('productArea');
  productArea.innerHTML = '';
  filteredPhones.forEach((phone) => {
    const card = document.createElement('div');
    card.className = 'phone-card';
    card.innerHTML = `
      <img src="${phone.image}" alt="${phone.name}">
      <div class="phone-info">
        <div style="text-align:center; width: 100%;">
          <h3>${phone.name}</h3>
          <p>${phone.brand}</p>
          <span>${phone.price}</span>
          <div class="button-container">
            <button class="btn btn-primary mt-2" onclick='addToCart(${JSON.stringify(phone)})'>Add to Cart</button>
          </div>
        </div>
      </div>
    `;
    productArea.appendChild(card);
  });
}


function filterByBrand(brand) {
  currentBrand = brand;
  if (brand === 'all') {
    displayPhones(phones);
  } else {
    const filtered = phones.filter(phone => phone.brand === brand);
    displayPhones(filtered);
  }
}

function addToCart(phone) {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart.push(phone);
  localStorage.setItem('cart', JSON.stringify(cart));

  const cartCountElem = document.getElementById('cart-count');
  if (cartCountElem) {
    cartCountElem.textContent = cart.length;
    cartCountElem.style.display = 'inline-block';
  }

  const toastElem = document.getElementById('cartToast');
  if (toastElem) {
    const toast = new bootstrap.Toast(toastElem);
    toast.show();
  }
}


window.onload = () => {
  displayPhones(phones);
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
  const cartCountElem = document.getElementById('cart-count');
  if (cartCountElem && cart.length > 0) {
    cartCountElem.textContent = cart.length;
    cartCountElem.style.display = 'inline-block';
  }
};

function filterPhonesFromNavbar() {
  const input = document.getElementById('navbarSearchInput').value.toLowerCase();
  let filtered = phones;

  if (currentBrand !== 'all') {
    filtered = filtered.filter(phone => phone.brand.toLowerCase() === currentBrand.toLowerCase());
  }

  if (input) {
    filtered = filtered.filter(phone =>
      phone.name.toLowerCase().includes(input) ||
      phone.brand.toLowerCase().includes(input)
    );
  }

  displayPhones(filtered);
}

</script>

<!-- Toast -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
  <div id="cartToast" class="toast bg-primary text-white" role="alert" data-bs-delay="2000">
    <div class="toast-body">Item added to cart!</div>
  </div>
</div>

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
