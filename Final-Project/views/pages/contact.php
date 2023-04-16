<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Contact Us - Your Company Name</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

</head>

<body>
  <!-- Header Section -->
  
  <!-- Contact Us Section -->
  <section class="container my-5">
    <div class="row">
      <div class="col">
        <h2 class="text-center">Contact Us</h2>
        <p class="text-center">We would love to hear from you! Please fill out the form below or contact us using the information provided.</p>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-6">
        <h3>Contact Form</h3>
        <form>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your name">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email">
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" rows="4" placeholder="Enter your message"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
      </div>
      <div class="col-md-6">
        <h3>Contact Information</h3>
        <ul class="list-unstyled">
          <li><strong>Phone:</strong> +1-123-456-7890</li>
          <li><strong>Email:</strong> info@barrieelectronics.com</li>
          <li><strong>Address:</strong> 1234 Main St, Suite 567, Barko, Ontario LV4 6M3</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- Footer Section -->
  <footer class="bg-dark text-white py-3">
    <div class="container text-center">
      <p>&copy; 2023 Your Company Name. All rights reserved. |<a class="navbar-brand" href="<?= ROOT_PATH ?>">Home</a> | <a href="<?= ROOT_PATH ?>/pages/about">About Us</a></p>
    </div>
  </footer>
</body>

</html>
