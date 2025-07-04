<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us - Gizmo Mobile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="contact.css">
</head>
<body>
  <?php include 'navbar.php'; ?>
  <div class="contact-section">
    <div class="container py-5">

      <!-- Contact Info Boxes -->
 <!-- Unified Info Box with 4 Columns -->
<div class="info-box-container text-white mb-5 py-4 px-3">
  <div class="row text-center">
    <div class="col-md-3 mb-4 mb-md-0">
      <i class="fas fa-map-marker-alt fa-2x icon mb-2"></i>
      <h6>OUR MAIN OFFICE</h6>
      <p>Galle road<br>Colombo 02</p>
    </div>
    <div class="col-md-3 mb-4 mb-md-0">
      <i class="fas fa-phone fa-2x icon mb-2"></i>
      <h6>PHONE NUMBER</h6>
      <p>011-1234-5400</p>
    </div>
    <div class="col-md-3 mb-4 mb-md-0">
      <i class="fas fa-envelope fa-2x icon mb-2"></i>
      <h6>EMAIL</h6>
      <p><a href="mailto:support@gizmo.com" class="text-white">support@gizmo.com</a></p>
    </div>
    <div class="col-md-3">
      <i class="fas fa-clock fa-2x icon mb-2"></i>
      <h6>OPENING HOURS</h6>
      <p>Mon-Fri: 9am-6pm<br>Sat: 10am-4pm</p>
    </div>
  </div>
</div>


      <!-- Google Map -->
<div class="row mt-5">
  <div class="col-12">
    <h4 class="mb-3">Find Us Here</h4>
    <div class="map-responsive">
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126743.7583586379!2d79.786164!3d6.9270791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2596dfc0e6e47%3A0xf60e79e3f08361f9!2sColombo%2002%2C%20Sri%20Lanka!5e0!3m2!1sen!2slk!4v1688589256077!5m2!1sen!2slk" 
        width="100%" 
        height="400" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
  </div>
</div>

      <!-- Contact Form & Message -->
      <div class="row align-items-center">
        <div class="col-md-6">
          <form class="contact-form">
            <div class="mb-4">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control border-0 border-bottom" id="email" placeholder="Enter a valid email address" required>
            </div>
            <div class="mb-4">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control border-0 border-bottom" id="name" placeholder="Enter your name" required>
            </div>
            <div class="mb-4">
              <label for="message" class="form-label">Message</label>
              <textarea class="form-control border-0 border-bottom" id="message" rows="3" placeholder="Enter your message" required></textarea>
            </div>
            <button type="submit" class="submit-btn">SUBMIT</button>
          </form>
        </div>
        <div class="col-md-6 text-white ps-md-5 mt-4 mt-md-0">
          <h3>Get in touch</h3>
          <p><em>We can ensure reliability, low cost fares and most important, with safety and comfort in mind.</em></p>
          
          <div class="social-icons mt-3">
            <a href="#"><i class="fab fa-facebook-f me-3"></i></a>
            <a href="#"><i class="fab fa-twitter me-3"></i></a>
            <a href="#"><i class="fab fa-instagram me-3"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<!-- Footer -->
     <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 Mobile Shop. All rights reserved.</p>
    </footer>
  
  </body>

</html>
