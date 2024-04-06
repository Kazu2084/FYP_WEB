
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cafe</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets1/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- 
    - preload images
  -->
  <link rel="preload" as="image" href="./assets1/images/logo.png">
  <link rel="preload" as="image" href="./assets1/images/hero-banner-1.jpg">
  <link rel="preload" as="image" href="./assets1/images/hero-banner-2.jpg">
  <link rel="preload" as="image" href="./assets1/images/hero-banner-3.jpg">

</head>

<body id="top">
  <header class="header">



    <div class="header-top" data-header>
      <div class="container">

        <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
          <span class="line line-1"></span>
          <span class="line line-2"></span>
          <span class="line line-3"></span>
        </button>

        <div class="input-wrapper">
          <form method="get" action="/Cafe/search.php" class="form-inline my-2 my-lg-0 mx-3">
            <input type="search" name="search" id="search" placeholder="Search" class="search-field" aria-label="Search"
              required>

            <button class="search-submit" type="submit" aria-label="search">
              <ion-icon name="search-outline" aria-hidden="true"></ion-icon>
            </button>
          </form>
        </div>

        <div class="alert">
          <div class="container">
            <p class="alert-text">Placement</p>
          </div>
        </div>

        <div class="header-actions">
          <a href="viewOrder.php"><button title="My Orders" class="header-action-btn">
              <ion-icon name="bag-check-outline" aria-hidden="true"></ion-icon>
            </button></a>


          <?php
          $countsql = "SELECT SUM(`itemQuantity`) FROM `viewcart` WHERE `userId`=$userId";
          $countresult = mysqli_query($con, $countsql);
          $countrow = mysqli_fetch_assoc($countresult);
          $count = $countrow['SUM(`itemQuantity`)'];
          if (!$count) {
            $count = 0;
          }
          ?>
          <a href="viewCart.php"><button title="My Cart" class="header-action-btn" aria-label="cart item">
              <ion-icon name="bag-handle-outline" aria-hidden="true" aria-hidden="true"></ion-icon>

              <span class="btn-badge">
                <?php echo $count ?>
              </span>
            </button></a>

            <a href="../../Login/logout.php"><button title="Logout" class="header-action-btn" aria-label="logout">
            <ion-icon name="log-out-outline" aria-hidden="true"></ion-icon>

            
            </button></a>

        </div>

        <nav class="navbar">
          <ul class="navbar-list">

            <li>
              <a href="#home" class="navbar-link has-after"></a>
            </li>

            <li>
              <a href="#home" class="navbar-link has-after">Home</a>
            </li>

          

            <?php
            $sql = "SELECT categorieName, categorieId FROM `cafe_categories`";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<li>';
              echo '<a class="navbar-link has-after" href="viewPizzaList.php?catid=' . $row['categorieId'] . '">' . $row['categorieName'] . '</a>';
              echo '</li>';
            }
            ?>




          </ul>
        </nav>

      </div>
    </div>

  </header>





  <!-- 
    - #MOBILE NAVBAR
  -->

  <div class="sidebar">
    <div class="mobile-navbar" data-navbar>

      <div class="wrapper">
        <a href="#" class="logo">
          <img src="./assets1/images/logo.png" width="179" height="26" alt="Glowing">
        </a>

        <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
          <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
        </button>
      </div>

      <ul class="navbar-list">


        <li>
          <a href="#collection" class="navbar-link" data-nav-link>Collection</a>
        </li>

        <li>
          <a href="#shop" class="navbar-link" data-nav-link>Shop</a>
        </li>

        <li>
          <a href="#offer" class="navbar-link" data-nav-link>Offer</a>
        </li>

        <li>
          <a href="#blog" class="navbar-link" data-nav-link>Blog</a>
        </li>

      </ul>

    </div>

    <div class="overlay" data-nav-toggler data-overlay></div>
  </div>





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="section hero" id="home" aria-label="hero" data-section>
        <div class="container">

          <ul class="has-scrollbar">

            <li class="scrollbar-item">
              <div class="hero-card has-bg-image" style="background-image: url('./assets1/images/hero-banner-1.jpg')">

                <div class="card-content">

                  <h1 class="h1 hero-title">
                    Reveal The <br>
                    Beauty of Skin
                  </h1>

                  <p class="hero-text">
                    Made using clean, non-toxic ingredients, our products are designed for everyone.
                  </p>

                  <p class="price">Starting at $7.99</p>

                  <a href="#" class="btn btn-primary">Shop Now</a>

                </div>

              </div>
            </li>

            <li class="scrollbar-item">
              <div class="hero-card has-bg-image" style="background-image: url('./assets1/images/hero-banner-2.jpg')">

                <div class="card-content">

                  <h1 class="h1 hero-title">
                    Reveal The <br>
                    Beauty of Skin
                  </h1>

                  <p class="hero-text">
                    Made using clean, non-toxic ingredients, our products are designed for everyone.
                  </p>

                  <p class="price">Starting at $7.99</p>

                  <a href="#" class="btn btn-primary">Shop Now</a>

                </div>

              </div>
            </li>

            <li class="scrollbar-item">
              <div class="hero-card has-bg-image" style="background-image: url('./assets1/images/hero-banner-3.jpg')">

                <div class="card-content">

                  <h1 class="h1 hero-title">
                    Reveal The <br>
                    Beauty of Skin
                  </h1>

                  <p class="hero-text">
                    Made using clean, non-toxic ingredients, our products are designed for everyone.
                  </p>

                  <p class="price">Starting at $7.99</p>

                  <a href="#" class="btn btn-primary">Shop Now</a>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #COLLECTION
      -->

      <section class="section collection" id="collection" aria-label="collection" data-section>
        <div class="container">

          <ul class="collection-list">

            <li>
              <div class="collection-card has-before hover:shine">

                <h2 class="h2 card-title">Summer Collection</h2>

                <p class="card-text">Starting at $17.99</p>

                <a href="#" class="btn-link">
                  <span class="span">Shop Now</span>

                  <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                </a>

                <div class="has-bg-image" style="background-image: url('./assets1/images/collection-1.jpg')"></div>

              </div>
            </li>

            <li>
              <div class="collection-card has-before hover:shine">

                <h2 class="h2 card-title">What’s New?</h2>

                <p class="card-text">Get the glow</p>

                <a href="#" class="btn-link">
                  <span class="span">Discover Now</span>

                  <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                </a>

                <div class="has-bg-image" style="background-image: url('./assets1/images/collection-2.jpg')"></div>

              </div>
            </li>

            <li>
              <div class="collection-card has-before hover:shine">

                <h2 class="h2 card-title">Buy 1 Get 1</h2>

                <p class="card-text">Starting at $7.99</p>

                <a href="#" class="btn-link">
                  <span class="span">Discover Now</span>

                  <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                </a>

                <div class="has-bg-image" style="background-image: url('./assets1/images/collection-3.jpg')"></div>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #SHOP
      -->

      <section class="section shop" id="shop" aria-label="shop" data-section>
        <div class="container">
          <div class="title-wrapper">
            <h2 class="h2 section-title">All Our Products</h2>
          </div>

          <?php
          $con = mysqli_connect("localhost", "root", "", "fyp");

          // Check connection
          if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
          }

          $sql = "SELECT * FROM cafe_product";
          $result = mysqli_query($con, $sql);

          $counter = 0; // Initialize counter
          
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              if ($counter % 5 == 0) {
                // Start a new section after every 5 iterations
                echo '<section class="section shop" id="shop' . ($counter / 5) . '" aria-label="shop" data-section>';
                echo '<div class="container">';
                echo '<ul class="has-scrollbar">';
              }

              $productName = $row['productName'];
              $productPrice = $row['productPrice'];
              $productImage = $row['productCategorieId'];
              ?>
              <li class="scrollbar-item">
                <div class="shop-card">
                  <div class="card-banner img-holder">
<img src="assets1/card-<?php echo $productImage; ?>.jpg" width="249px" height="262px">
                    <div class="card-actions">
                      <button class="action-btn" aria-label="add to cart">
                        <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
                      </button>
                      <!-- Other action buttons -->
                    </div>
                  </div>
                  <div class="card-content">
                    <div class="price">	<b>&#8377</b>
                      <span class="span">
                        <?php echo $productPrice; ?>
                      </span>
                    </div>
                    <h3>
                      <a href="#" class="card-title">
                        <?php echo $productName; ?>
                      </a>
                    </h3>
                    <!-- Other card content -->
                  </div>
                </div>
              </li>
              <?php
              $counter++;

              if ($counter % 5 == 0) {
                // Close the ul and div tags for the section after every 5 iterations
                echo '</ul>';
                echo '</div>';
                echo '</section>';
              }
            }

            // Close the ul and div tags for the last section if there are remaining items
            if ($counter % 5 != 0) {
              echo '</ul>';
              echo '</div>';
              echo '</section>';
            }
          } else {
            echo "0 results";
          }
          mysqli_close($con);
          ?>
        </div>
      </section>
    </article>
    
    <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
      <ion-icon name="arrow-up" aria-hidden="true"></ion-icon>
    </a>

    <script src="./assets1/js/script.js" defer></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>