
<?php
  require_once 'includes/config.php';
  require_once 'includes/db.php';
  require_once 'includes/functions.php';
  
  // Get filter parameters
  $type = isset($_GET['type']) ? $_GET['type'] : null;
  $filter = isset($_GET['filter']) ? $_GET['filter'] : null;
  
  // Get cars from database
  $cars = getCars($type, $filter);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory | Carlot - Premium Car Marketplace</title>
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
    <section class="inventory-header">
      <div class="container">
        <h1>Our Inventory</h1>
        <p>Explore our collection of premium vehicles</p>
      </div>
    </section>

    <section class="inventory-filters container">
      <div class="filter-options">
        <div class="filter-group">
          <label for="make">Make</label>
          <select id="make" name="make">
            <option value="">All Makes</option>
            <option value="porsche">Porsche</option>
            <option value="tesla">Tesla</option>
            <option value="mercedes">Mercedes-Benz</option>
            <option value="audi">Audi</option>
            <option value="bmw">BMW</option>
            <option value="lamborghini">Lamborghini</option>
          </select>
        </div>
        <div class="filter-group">
          <label for="price">Price Range</label>
          <select id="price" name="price">
            <option value="">Any Price</option>
            <option value="100000">Under $100,000</option>
            <option value="150000">Under $150,000</option>
            <option value="200000">Under $200,000</option>
            <option value="250000">Under $250,000</option>
          </select>
        </div>
        <div class="filter-group">
          <label for="fuel">Fuel Type</label>
          <select id="fuel" name="fuel">
            <option value="">All Types</option>
            <option value="gasoline">Gasoline</option>
            <option value="electric">Electric</option>
            <option value="hybrid">Hybrid</option>
          </select>
        </div>
        <button id="apply-filters" class="btn-primary">Apply Filters</button>
      </div>
    </section>

    <section class="inventory-results container">
      <div class="results-header">
        <p class="results-count"><?php echo count($cars); ?> vehicles found</p>
        <div class="sort-options">
          <label for="sort">Sort by:</label>
          <select id="sort" name="sort">
            <option value="price-asc">Price: Low to High</option>
            <option value="price-desc">Price: High to Low</option>
            <option value="year-desc">Year: Newest First</option>
            <option value="year-asc">Year: Oldest First</option>
          </select>
        </div>
      </div>

      <div class="car-grid" id="inventory-results">
        <?php foreach ($cars as $car): ?>
          <div class="car-card">
            <div class="car-image">
              <img src="<?php echo htmlspecialchars($car['imageUrl']); ?>" alt="<?php echo htmlspecialchars($car['make'] . ' ' . $car['model']); ?>">
              <div class="image-overlay"></div>
            </div>
            <div class="car-details">
              <div class="car-header">
                <div>
                  <h3 class="car-title">
                    <?php echo htmlspecialchars($car['make'] . ' ' . $car['model']); ?>
                  </h3>
                  <p class="car-year"><?php echo htmlspecialchars($car['year']); ?></p>
                </div>
                <span class="car-price"><?php echo formatPrice($car['price']); ?></span>
              </div>
              <div class="car-specs">
                <div class="spec">
                  <svg class="spec-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 8V12L14.5 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5.63604 18.364C4.00736 16.7353 3 14.4853 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 14.4853 19.9926 16.7353 18.364 18.364" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 21V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8 21H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                  <?php echo number_format($car['mileage']); ?> mi
                </div>
                <div class="spec">
                  <svg class="spec-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.1414 5C17.3265 3.14864 14.7974 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M22 12C22 17.5228 17.5228 22 12 22C9.20261 22 6.67349 20.8514 4.85858 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8 15C8 13.3431 9.34315 12 11 12H12C13.6569 12 15 13.3431 15 15V22H8V15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M19 12H22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 12H5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                  <?php echo htmlspecialchars($car['fuelType']); ?>
                </div>
                <div class="spec">
                  <svg class="spec-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 9H4V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M15 9H20V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9 15H4V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M15 15H20V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                  <?php echo htmlspecialchars($car['transmission']); ?>
                </div>
                <div class="spec">
                  <svg class="spec-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 19.5V18H20V19.5C20 20.3284 19.3284 21 18.5 21H5.5C4.67157 21 4 20.3284 4 19.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 14V7M12 7L16 11M12 7L8 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 3V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                  Features: <?php echo count($car['features']); ?>
                </div>
              </div>
              <a href="car-details.php?id=<?php echo $car['id']; ?>" class="btn-view-details">View Details</a>
            </div>
          </div>
        <?php endforeach; ?>
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
