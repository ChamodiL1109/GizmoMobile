<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
    <link rel="stylesheet" href="cart.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>

<!-- Main Content -->
<div class="container mt-5 pt-5">
    <div class="row">
        <!-- Cart Items -->
        <div class="col-md-8">
            <h3 class="mb-4">Shopping Cart</h3>
            <div id="cart-items" class="d-flex flex-column gap-3"></div>
        </div>

        <!-- Summary -->
        <div class="col-md-4">
            <div class="card bg-light p-3 shadow-sm">
                <h5>Total Amount</h5>
                <p class="text-success">✔ Your order is eligible for FREE Delivery.</p>
                <div class="d-flex justify-content-between">
                    <span>Item Total:</span><span id="itemTotal">Rs 0</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between fw-bold">
                    <span>To Pay:</span><span id="toPay">Rs 0</span>
                </div>
                <button id="totalPayBtn" class="btn btn-success mt-3 w-100">Buy Now</button>
            </div>
        </div>
    </div>
</div>

<!-- Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content text-dark">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Payment for <span id="paymentProductName"></span></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="paymentForm">
                    <div class="mb-3">
                        <label for="cardNumber" class="form-label">Card Number</label>
                        <input type="text" class="form-control" id="cardNumber" required>
                    </div>
                    <div class="mb-3">
                        <label for="expiry" class="form-label">Expiry Date</label>
                        <input type="text" class="form-control" id="expiry" placeholder="MM/YY" required>
                    </div>
                    <div class="mb-3">
                        <label for="cvv" class="form-label">CVV</label>
                        <input type="password" class="form-control" id="cvv" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Pay Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    const container = document.getElementById('cart-items');
    const itemTotalElem = document.getElementById('itemTotal');
    const toPayElem = document.getElementById('toPay');

     document.getElementById('totalPayBtn').addEventListener('click', function () {
    const totalAmountText = toPayElem.textContent;
    document.getElementById('paymentProductName').textContent = `Total Payment (${totalAmountText})`;
    const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
    paymentModal.show();

    });

    function updateTotal() {
        let newTotal = 0;
        document.querySelectorAll('.qty-select').forEach((select, idx) => {
            const quantity = parseInt(select.value);
            const desc = cartItems[idx].price;
            const priceStr = desc.replace(/[^0-9]/g, ''); // "Rs 36,499.00" → "3649900"
            const price = parseInt(priceStr); // in paisa
            newTotal += price * quantity;
        });

        const rupeeAmount = (newTotal / 100).toFixed(2);
        itemTotalElem.textContent = `Rs ${Number(rupeeAmount).toLocaleString('en-IN', { minimumFractionDigits: 2 })}`;
        toPayElem.textContent = `Rs ${Number(rupeeAmount).toLocaleString('en-IN', { minimumFractionDigits: 2 })}`;
    }

    if (cartItems.length === 0) {
        container.innerHTML = '<p class="text-white text-center">Your cart is empty.</p>';
    } else {
        container.innerHTML = '';
        cartItems.forEach((item, idx) => {
            const div = document.createElement('div');
            div.className = 'card p-2 bg-white text-dark';
            div.innerHTML = `
                <div class="row g-0 align-items-center">
                    <div class="col-md-4">
                        <img src="${item.image}" class="img-fluid rounded-start" alt="${item.name}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">${item.name}</h5>
                            <p class="card-text mb-1">${item.price}</p>
                            <div class="mb-2">
                                <label for="qty-${idx}" class="form-label"><strong>Qty:</strong></label>
                                <select class="form-select form-select-sm w-auto qty-select" id="qty-${idx}" data-idx="${idx}">
                                    ${[...Array(10)].map((_, i) => `<option value="${i+1}">${i+1}</option>`).join('')}
                                </select>
                            </div>
                            <div class="d-flex gap-2">
                                <button class="btn btn-success btn-sm pay-btn" data-idx="${idx}" data-name="${item.name}">Pay</button>
                                <button class="btn btn-danger btn-sm remove-btn" data-idx="${idx}">Remove</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            container.appendChild(div);

            // Attach event listeners for Pay and Remove buttons here
            div.querySelector('.pay-btn').addEventListener('click', function () {
                document.getElementById('paymentProductName').textContent = item.name;
                const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
                paymentModal.show();
            });

            div.querySelector('.remove-btn').addEventListener('click', function () {
                cartItems.splice(idx, 1);
                localStorage.setItem('cart', JSON.stringify(cartItems));
                location.reload();
            });

            // Quantity change event
            div.querySelector(`#qty-${idx}`).addEventListener('change', updateTotal);
        });

        updateTotal(); // First time calculation
    }

    // Payment form submission
    document.getElementById('paymentForm').addEventListener('submit', function (e) {
        e.preventDefault();
        alert('Payment successful!');
        const modal = bootstrap.Modal.getInstance(document.getElementById('paymentModal'));
        modal.hide();
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
