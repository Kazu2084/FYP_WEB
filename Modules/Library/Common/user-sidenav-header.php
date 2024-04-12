
<?php
require_once "../../../Connection/connection.php";

session_start();
if (isset($_SESSION["LoginStudent"])) {
  $current_session = $_SESSION['LoginStudent'];
  $student_id =  $_SESSION['student_id'];
} elseif (isset($_SESSION["LoginTeacher"])) {
  $current_session = $_SESSION['LoginTeacher'];
} elseif (isset($_SESSION["LoginStaff"])) {
  $current_session = $_SESSION['LoginStaff'];
}
  
	?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library</title>

  <!-- SCRIPTS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../Style/script.js"></script>
  <script src="../Style/Styles/body.js"></script>
  <script src="../Style/Styles/table1.js"></script>


  <!-- CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Style/style1.css">
  <link rel="stylesheet" href="../Style/style.css">
  <link rel="stylesheet" href="../Style/style2.css">

</head>

<body>
  <div style="width: 100%;overflow:auto;">
    <div class="app-container" style="float:left; position:sticky; top:0; z-index:1">
      <div class="app-header">
        <div class="app-header-left">
          <div class="p app-icon" id="aside-toggle-btn">
          </div>
          <p class="app-name">User Dashboard</p>
          
        </div>
        <div class="app-header-right">
        <div><?php echo $current_session; ?></div>


          <button class="mode-switch" title="Switch Theme" id="color-scheme-selector">
            <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
              stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
              <defs></defs>
              <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
            </svg>
          </button>
          
          
          
        </div>
      </div>
    </div>
    <div style="padding-top: 1rem;width: 100%;float:right">

      <!-- === wrapper section === -->
      <section id="wrapper" class="d-flex w-100">
        <!-- aside nav-->
        <aside class="border-right shadow-sm background text" id="aside-nav">
          <div id="side-nav">
            <!-- aside nav ul list -->
            <ul class="nav flex-column" id="aside-nav-ul">
              <li class="nav-item">
                <a class="nav-link" href="../Users/book.php">
                  <i class="fas fa-book" style="font-size: 18px;"></i>
                  <span style="font-size: 18px;" class="ms-2">All Books</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../Users/my_books.php">
                <i class="fas fa-bookmark" style="font-size: 18px;"></i>
                  <span style="font-size: 18px;" class="ms-2">My Books</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../Users/borrow.php">
                <i class="fas fa-exchange-alt" style="font-size: 18px;"></i>
                  <span style="font-size: 18px;" class="ms-2">Borrow</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../../../Login/logout.php">
                  <i class="fas fa-sign-out-alt" style="font-size: 18px;"></i>
                  <span style="font-size: 18px;" class="ms-2">Logout</span>
                </a>
              </li>
            </ul>
            <!-- /aside nav ul list -->
          </div>
        </aside>
        <main class="w-100 d-flex flex-column" id="main">
          <section class="container-fluid">