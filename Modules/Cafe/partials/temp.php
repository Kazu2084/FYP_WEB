<section class="section shop" id="shop" aria-label="shop" data-section>
        <div class="container">
          <div class="title-wrapper">
            <h2 class="h2 section-title"><span id="catTitle">Items</span></h2>
          </div>

          <?php
          $con = mysqli_connect("localhost", "root", "", "fyp");

          // Check connection
          if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
          }


          $id = $_GET['catid'];
          $sql = "SELECT * FROM `cafe_product` WHERE productCategorieId = $id";
          $result = mysqli_query($conn, $sql);
          $noResult = true;
          while($row = mysqli_fetch_assoc($result)){
              $noResult = false;
              $pizzaId = $row['productId'];
              $pizzaName = $row['productName'];
              $pizzaPrice = $row['productPrice'];
              $pizzaDesc = $row['productDesc'];

          $counter = 0; // Initialize counter
          
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              if ($counter % 5 == 0) {
                // Start a new section after every 5 iterations
                echo '<section class="section shop" id="shop' . ($counter / 5) . '" aria-label="shop" data-section>';
                echo '<div class="container">';
                echo '<ul class="has-scrollbar">';
              }

              $pizzaName = $row['productName'];
              $pizzaPrice = $row['productPrice'];
              //$pizzaImage = $row['productCategorieId'];
              ?>
              <li class="scrollbar-item">
                <div class="shop-card">
                  <div class="card-banner img-holder">
                   <img src="img/pizza-<?php echo $pizzaId?>.jpg" width="249px" height="262px">
                    <div class="card-actions">
                    <form action="partials/_manageCart.php" method="POST">
                    <input type="hidden" name="itemId" value="'<?php $pizzaId?>'">
                      <button class="action-btn" name="addToCart" aria-label="add to cart" type="submit">
                        <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
                      </button>
                      <!-- Other action buttons -->
                    </div>
                  </div>
                  <div class="card-content">
                    <div class="price">
                      <span class="span">$
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
          mysqli_close($con);}
          ?>
        </div>
      </section>

      <script> 
        document.getElementById("title").innerHTML = "<?php echo $catname; ?>"; 
        document.getElementById("catTitle").innerHTML = "<?php echo $catname; ?>"; 
    </script> 
     
 
    <script src="./assets1/js/script.js" defer></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>