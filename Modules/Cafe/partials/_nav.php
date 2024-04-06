<?php 


require_once "../../Connection/connection.php";

session_start();
if (isset($_SESSION["LoginStudent"])) {
  $username = $_SESSION['LoginStudent'];
  $userId =  $_SESSION['student_id'];
  $loggedin= true;
} elseif (isset($_SESSION["LoginTeacher"])) {
  $username = $_SESSION['LoginTeacher'];
  $userId =  $_SESSION['teacher_id'];
  $loggedin= true;
} elseif (isset($_SESSION["LoginStaff"])) {
  $username = $_SESSION['LoginStaff'];
  $userId =  $_SESSION['staff_id'];
  $loggedin= true;
}


?>
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
        <p class="alert-text">Cafeteria</p>
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
