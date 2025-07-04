<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gizmo Mobile - Your Phone Experts</title>
    <link rel="stylesheet" href="login.css">
    <style>
     
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="brand-section">
            <div class="brand-logo" style="display: flex; flex-direction: column; align-items: center;">
                <img src="GIZMO (2).png" alt="Gizmo Mobile Logo" style="width: 100px; height: 100px;border-radius:50px; margin-bottom: 10px;">
                <span style="color: #fff;">Gizmo Mobile</span>
            </div>
            <p class="brand-slogan">Your premium destination for the latest smartphones and accessories</p>
            
            <div class="brand-features">
                <div class="feature">
                    <i class="fas fa-check-circle" style="color: var(--secondary);"></i>
                    <span>Latest smartphone models</span>
                </div>
                <div class="feature">
                    <i class="fas fa-check-circle" style="color: var(--secondary);"></i>
                    <span>Exclusive member discounts</span>
                </div>
                <div class="feature">
                    <i class="fas fa-check-circle" style="color: var(--secondary);"></i>
                    <span>Free shipping on orders over $99</span>
                </div>
                <div class="feature">
                    <i class="fas fa-check-circle" style="color: var(--secondary);"></i>
                    <span>24/7 customer support</span>
                </div>
            </div>
            
           
        </div>
        
        <div class="form-section">
            <div class="form-container">
                <div class="form-toggle">
                    <button class="active" onclick="toggleForm('login')">Login</button>
                    <button onclick="toggleForm('register')">Register</button>
                </div>
                
                <form id="login-form" class="form active" action="auth_handler.php" method="POST">
                    <input type="hidden" name="login" value="1">
                    <!-- rest of your form elements -->

                    <h2 class="form-title">Welcome Back</h2>
                    <p class="form-subtitle">Sign in to access your account and exclusive deals</p>
                    
                    <div class="form-group">
                        <label for="login-email">Email</label>
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="login-email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="login-password">Password</label>
                        <i class="fas fa-lock"></i>
                        <input type="password" id="login-password" name="password" placeholder="Enter your password" required>
                    </div>
                    <a href="#" class="forgot-password">Forgot password?</a>
                    <button type="submit" class="submit-btn">Login</button>
                    
                    <div class="social-login">
                        <p>Or login with</p>
                        <div class="social-icons">
                            <div class="social-icon google">
                                <i class="fab fa-google"></i>
                            </div>
                            <div class="social-icon facebook">
                                <i class="fab fa-facebook-f"></i>
                            </div>
                            <div class="social-icon apple">
                                <i class="fab fa-apple"></i>
                            </div>
                        </div>
                    </div>
                </form>
                
                <form id="register-form" class="form" action="auth_handler.php" method="POST">
                    <input type="hidden" name="register" value="1">
                    <!-- rest of your form elements -->

                    <h2 class="form-title">Join Gizmo Mobile</h2>
                    <p class="form-subtitle">Create an account to enjoy member benefits</p>
                    
                    <div class="form-group">
                        <label for="register-name">Full Name</label>
                        <i class="fas fa-user"></i>
                        <input type="text" id="register-name" name="name" placeholder="Enter your full name" required>
                    </div>
                    <div class="form-group">
                        <label for="register-email">Email</label>
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="register-email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="register-phone">Phone Number</label>
                        <i class="fas fa-phone"></i>
                        <input type="tel" id="register-phone" name="phone" placeholder="Enter your phone number" required>
                    </div>
                    <div class="form-group">
                        <label for="register-password">Password</label>
                        <i class="fas fa-lock"></i>
                        <input type="password" id="register-password" name="password" placeholder="Create a password (min 8 characters)" required minlength="8">
                    </div>
                    <div class="form-group">
                        <label for="register-confirm">Confirm Password</label>
                        <i class="fas fa-lock"></i>
                        <input type="password" id="register-confirm" name="confirm_password" placeholder="Confirm your password" required minlength="8">
                    </div>
                    <button type="submit" class="submit-btn">Create Account</button>
                    
                    <p class="terms">By creating an account, you agree to our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></p>
                    
                    <div class="social-login">
                        <p>Or register with</p>
                        <div class="social-icons">
                            <div class="social-icon google">
                                <i class="fab fa-google"></i>
                            </div>
                            <div class="social-icon facebook">
                                <i class="fab fa-facebook-f"></i>
                            </div>
                            <div class="social-icon apple">
                                <i class="fab fa-apple"></i>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        function toggleForm(formType) {
            // Update active button
            document.querySelectorAll('.form-toggle button').forEach(btn => {
                btn.classList.remove('active');
            });
            event.currentTarget.classList.add('active');
            
            // Show the selected form
            document.getElementById('login-form').classList.remove('active');
            document.getElementById('register-form').classList.remove('active');
            document.getElementById(formType + '-form').classList.add('active');
        }

        // Update form submission handlers to use AJAX
        document.getElementById('login-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('auth_handler.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if(data.status === 'success') {
                    alert('Login successful! Redirecting...');
                    window.location.href = 'home.php'; // Redirect to dashboard
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred during login');
            });
        });

        document.getElementById('register-form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Check if passwords match
            const password = document.getElementById('register-password').value;
            const confirmPassword = document.getElementById('register-confirm').value;

            if(password !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }

            const formData = new FormData(this);

            fetch('auth_handler.php', {
                method: 'POST',
                body: formData
            })
            
            .then(response => response.json())
            .then(data => {
                if(data.status === 'success') {
                    alert('Registration successful! Please login.');
                    
                    window.location.href = 'home.php';
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred during registration');
            });
        });

       
       

        // Add keyframe animation dynamically
        const style = document.createElement('style');
        style.innerHTML = `
            @keyframes float {
                0% { transform: translateY(0); }
                100% { transform: translateY(-20px); }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>

