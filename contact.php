
<?php
  require_once 'includes/config.php';
  
  $success = false;
  $error = false;
  
  // Handle form submission
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Simple validation
    if (
      !empty($_POST['name']) && 
      !empty($_POST['email']) && 
      !empty($_POST['message']) &&
      filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
    ) {
      // In a real app, you would send an email or save to database
      // For now, just show success message
      $success = true;
    } else {
      $error = true;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us | Carlot - Premium Car Marketplace</title>
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
  <header class="site-header">
    <div class="container">
      <div class="logo">
        <a href="index.html">
          <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M14 7H16.5C17.8807 7 19 8.11929 19 9.5V9.5C19 10.8807 17.8807 12 16.5 12H14V7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M14 12H16.5C17.8807 12 19 13.1193 19 14.5V14.5C19 15.8807 17.8807 17 16.5 17H14V12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M4 17V7H8.5C9.88071 7 11 8.11929 11 9.5V9.5C11 10.8807 9.88071 12 8.5 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          <span>Carlot</span>
        </a>
      </div>
      <nav class="main-nav">
        <ul>
          <li><a href="index.html" class="nav-link">Home</a></li>
          <li><a href="inventory.php" class="nav-link">Inventory</a></li>
          <li><a href="about.html" class="nav-link">About</a></li>
          <li><a href="contact.php" class="nav-link active">Contact</a></li>
        </ul>
      </nav>
      <div class="header-actions">
        <button class="search-btn">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21 21L15.5 15.5M15.5 15.5C17.0913 13.9087 18 11.7956 18 9.5C18 5.35786 14.6421 2 10.5 2C6.35786 2 3 5.35786 3 9.5C3 13.6421 6.35786 17 10.5 17C12.7956 17 14.9087 16.0913 16.5 14.5L15.5 15.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
        <a href="inventory.php" class="btn-primary">View Cars</a>
        <button class="menu-toggle">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 6H20M4 12H20M4 18H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
    </div>
  </header>

  <main>
    <section class="contact-header">
      <div class="container">
        <h1>Contact Us</h1>
        <p>Have questions about our services? We're here to help.</p>
      </div>
    </section>

    <section class="contact-content container">
      <div class="contact-grid">
        <div class="contact-form-wrapper">
          <h2>Send Us a Message</h2>
          
          <?php if ($success): ?>
            <div class="alert alert-success">
              <p>Your message has been sent successfully! We will get back to you as soon as possible.</p>
            </div>
          <?php endif; ?>
          
          <?php if ($error): ?>
            <div class="alert alert-error">
              <p>There was an error sending your message. Please check all fields and try again.</p>
            </div>
          <?php endif; ?>
          
          <form action="contact.php" method="POST" class="contact-form">
            <div class="form-group">
              <label for="name">Full Name</label>
              <input type="text" id="name" name="name" required>
            </div>
            
            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
              <label for="phone">Phone Number (Optional)</label>
              <input type="tel" id="phone" name="phone">
            </div>
            
            <div class="form-group">
              <label for="subject">Subject</label>
              <select id="subject" name="subject">
                <option value="general">General Inquiry</option>
                <option value="sales">Sales Question</option>
                <option value="service">Service Request</option>
                <option value="support">Customer Support</option>
              </select>
            </div>
            
            <div class="form-group">
              <label for="message">Message</label>
              <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            
            <button type="submit" class="btn-primary btn-full">Send Message</button>
          </form>
        </div>
        
        <div class="contact-info-wrapper">
          <div class="contact-details">
            <h2>Get in Touch</h2>
            <p>Our team is available to assist you with any questions or concerns you may have about our vehicles or services.</p>
            
            <div class="contact-detail-item">
              <div class="detail-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <div class="detail-content">
                <h3>Visit Our Showroom</h3>
                <p>123 Luxury Lane<br>Beverly Hills, CA 90210</p>
              </div>
            </div>
            
            <div class="contact-detail-item">
              <div class="detail-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M16.5562 12.9062L16.1007 13.359C16.1007 13.359 15.0181 14.4355 12.0631 11.4972C9.10812 8.55901 10.1907 7.48257 10.1907 7.48257L10.4775 7.19738C11.1841 6.49484 11.2507 5.36691 10.6342 4.54348L9.37326 2.85908C8.61028 1.83992 7.13596 1.70529 6.26145 2.57483L4.69185 4.13552C4.25823 4.56668 3.96765 5.12559 4.00289 5.74561C4.09304 7.33182 4.81071 10.7447 8.80227 14.7187C13.0599 18.9547 17.0202 19.117 18.6957 18.9551C19.2853 18.9111 19.8175 18.6206 20.2371 18.1999L21.75 16.689C22.6257 15.8147 22.4845 14.3278 21.4644 13.5719L19.6904 12.2295C18.8669 11.6122 17.738 11.6729 16.9799 12.3995L16.5562 12.9062Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <div class="detail-content">
                <h3>Call Us</h3>
                <p>+1 (555) 123-4567</p>
                <p>Monday - Saturday: 9am - 7pm</p>
              </div>
            </div>
            
            <div class="contact-detail-item">
              <div class="detail-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M21 5.5L12 13.5L3 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M3 5.5H21V18C21 18.1326 20.9473 18.2598 20.8536 18.3536C20.7598 18.4473 20.6326 18.5 20.5 18.5H3.5C3.36739 18.5 3.24021 18.4473 3.14645 18.3536C3.05268 18.2598 3 18.1326 3 18V5.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M10.3636 12L3.2652 18.4732" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M20.7349 18.4732L13.6364 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <div class="detail-content">
                <h3>Email Us</h3>
                <p>info@carlot.com</p>
                <p>sales@carlot.com</p>
              </div>
            </div>
          </div>
          
          <div class="business-hours">
            <h3>Business Hours</h3>
            <ul>
              <li>
                <span>Monday - Friday</span>
                <span>9:00 AM - 7:00 PM</span>
              </li>
              <li>
                <span>Saturday</span>
                <span>10:00 AM - 6:00 PM</span>
              </li>
              <li>
                <span>Sunday</span>
                <span>Closed</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-about">
          <div class="logo">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M14 7H16.5C17.8807 7 19 8.11929 19 9.5V9.5C19 10.8807 17.8807 12 16.5 12H14V7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M14 12H16.5C17.8807 12 19 13.1193 19 14.5V14.5C19 15.8807 17.8807 17 16.5 17H14V12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M4 17V7H8.5C9.88071 7 11 8.11929 11 9.5V9.5C11 10.8807 9.88071 12 8.5 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Carlot</span>
          </div>
          <p>Discover premium vehicles curated for those who appreciate quality, performance, and elegance.</p>
          <div class="social-links">
            <a href="#" class="social-link">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-link">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-link">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="social-link">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </div>
        <div class="footer-links">
          <h3>Explore</h3>
          <ul>
            <li><a href="inventory.php">All Cars</a></li>
            <li><a href="inventory.php?type=new">New Cars</a></li>
            <li><a href="inventory.php?type=used">Pre-owned Cars</a></li>
            <li><a href="inventory.php?filter=electric">Electric Vehicles</a></li>
          </ul>
        </div>
        <div class="footer-links">
          <h3>Company</h3>
          <ul>
            <li><a href="about.html">About Us</a></li>
            <li><a href="careers.html">Careers</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="contact.php">Contact Us</a></li>
          </ul>
        </div>
        <div class="footer-links">
          <h3>Legal</h3>
          <ul>
            <li><a href="terms.html">Terms of Service</a></li>
            <li><a href="privacy.html">Privacy Policy</a></li>
            <li><a href="cookies.html">Cookie Policy</a></li>
            <li><a href="sitemap.html">Sitemap</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <p>© <span id="current-year"></span> Carlot. All rights reserved.</p>
        <p>Made with precision</p>
      </div>
    </div>
  </footer>

  <script src="js/main.js"></script>
</body>
</html>
