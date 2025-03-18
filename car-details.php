
<?php
  require_once 'includes/config.php';
  require_once 'includes/db.php';
  require_once 'includes/functions.php';
  
  // Get car ID from URL
  $id = isset($_GET['id']) ? $_GET['id'] : null;
  
  // If no ID provided, redirect to inventory
  if (!$id) {
    header('Location: inventory.php');
    exit;
  }
  
  // Get car details
  $car = getCarById($id);
  
  // If car not found, redirect to inventory
  if (!$car) {
    header('Location: inventory.php');
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($car['make'] . ' ' . $car['model']); ?> | Carlot</title>
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
          <li><a href="inventory.php" class="nav-link active">Inventory</a></li>
          <li><a href="about.html" class="nav-link">About</a></li>
          <li><a href="contact.php" class="nav-link">Contact</a></li>
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
    <!-- Breadcrumbs -->
    <div class="breadcrumbs container">
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="inventory.php">Inventory</a></li>
        <li><?php echo htmlspecialchars($car['make'] . ' ' . $car['model']); ?></li>
      </ul>
    </div>

    <section class="car-detail container">
      <div class="car-detail-grid">
        <!-- Car Images Gallery -->
        <div class="car-gallery">
          <div class="main-image">
            <img id="main-car-image" src="<?php echo htmlspecialchars($car['gallery'][0]); ?>" alt="<?php echo htmlspecialchars($car['make'] . ' ' . $car['model']); ?>">
          </div>
          <div class="thumbnail-grid">
            <?php foreach($car['gallery'] as $index => $image): ?>
              <div class="thumbnail <?php echo $index === 0 ? 'active' : ''; ?>" data-image="<?php echo htmlspecialchars($image); ?>">
                <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($car['make'] . ' ' . $car['model'] . ' view ' . ($index + 1)); ?>">
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        
        <!-- Car Details -->
        <div class="car-info">
          <div class="car-badge">
            <?php echo htmlspecialchars($car['year'] . ' ' . $car['make']); ?>
          </div>
          <h1 class="car-name"><?php echo htmlspecialchars($car['model']); ?></h1>
          <p class="car-price"><?php echo formatPrice($car['price']); ?></p>
          
          <p class="car-description">
            <?php echo htmlspecialchars($car['description']); ?>
          </p>
          
          <div class="car-specs-grid">
            <div class="spec-item">
              <p class="spec-label">Year</p>
              <p class="spec-value"><?php echo htmlspecialchars($car['year']); ?></p>
            </div>
            <div class="spec-item">
              <p class="spec-label">Mileage</p>
              <p class="spec-value"><?php echo number_format($car['mileage']); ?> mi</p>
            </div>
            <div class="spec-item">
              <p class="spec-label">Fuel Type</p>
              <p class="spec-value"><?php echo htmlspecialchars($car['fuelType']); ?></p>
            </div>
            <div class="spec-item">
              <p class="spec-label">Transmission</p>
              <p class="spec-value"><?php echo htmlspecialchars($car['transmission']); ?></p>
            </div>
          </div>
          
          <div class="car-cta">
            <button class="btn-primary btn-full">Schedule Test Drive</button>
            <button class="btn-outline btn-full">Request More Info</button>
          </div>
        </div>
      </div>
      
      <!-- Features Section -->
      <div class="car-features">
        <h2>Features & Specifications</h2>
        <div class="features-grid">
          <?php foreach($car['features'] as $feature): ?>
            <div class="feature-item">
              <svg class="feature-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 12L11 14L15 10M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <span><?php echo htmlspecialchars($feature); ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      
      <!-- Contact Section -->
      <div class="contact-info">
        <div class="contact-header">
          <h2>Interested in this vehicle?</h2>
          <p>Contact our team for more information or to schedule a viewing.</p>
        </div>
        <div class="contact-actions">
          <a href="tel:+11234567890" class="btn-primary">
            <svg class="btn-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M16.5562 12.9062L16.1007 13.359C16.1007 13.359 15.0181 14.4355 12.0631 11.4972C9.10812 8.55901 10.1907 7.48257 10.1907 7.48257L10.4775 7.19738C11.1841 6.49484 11.2507 5.36691 10.6342 4.54348L9.37326 2.85908C8.61028 1.83992 7.13596 1.70529 6.26145 2.57483L4.69185 4.13552C4.25823 4.56668 3.96765 5.12559 4.00289 5.74561C4.09304 7.33182 4.81071 10.7447 8.80227 14.7187C13.0599 18.9547 17.0202 19.117 18.6957 18.9551C19.2853 18.9111 19.8175 18.6206 20.2371 18.1999L21.75 16.689C22.6257 15.8147 22.4845 14.3278 21.4644 13.5719L19.6904 12.2295C18.8669 11.6122 17.738 11.6729 16.9799 12.3995L16.5562 12.9062Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Call Us
          </a>
          <a href="contact.php" class="btn-outline">
            <svg class="btn-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M21 5.5L12 13.5L3 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M3 5.5H21V18C21 18.1326 20.9473 18.2598 20.8536 18.3536C20.7598 18.4473 20.6326 18.5 20.5 18.5H3.5C3.36739 18.5 3.24021 18.4473 3.14645 18.3536C3.05268 18.2598 3 18.1326 3 18V5.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M10.3636 12L3.2652 18.4732" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M20.7349 18.4732L13.6364 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Email Us
          </a>
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
  <script src="js/car-detail.js"></script>
</body>
</html>
