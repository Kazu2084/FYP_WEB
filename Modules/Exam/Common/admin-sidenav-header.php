<?php
require_once('../../conn.php');
session_start();
if (isset($_SESSION["LoginAdmin"])) {
  $current_session = $_SESSION['LoginAdmin'];
} elseif (isset($_SESSION["LoginExaminer"])) {
  $current_session = $_SESSION['LoginExaminer'];
}   
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- SCRIPTS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../../../Styles/script.js"></script>
  <script src="../../../../Styles/body.js"></script>


  <!-- CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../../../Styles/style1.css">
  <link rel="stylesheet" href="../../../../Styles/style.css">
</head>

<body>
  <div style="width: 100%;overflow:auto;">
    <div class="app-container" style="float:left; position:sticky; top:0; z-index:1">
      <div class="app-header">
        <div class="app-header-left">
          <div class="p app-icon" id="aside-toggle-btn">
          </div>
          <p class="app-name">Admin Dashboard</p>
          
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
          


          <?php
          //   $username = $_SESSION["email"];
          //   $query_fn="select first_name from college.teacher_info where teacher_info.email='$username'";
          //   $query_ln="select last_name from college.teacher_info where email='$username'";
          
          //   $result1=mysqli_query($con,$query_fn);
          //   $result2=mysqli_query($con,$query_ln);
          
          // //   $sql_total_marks = "SELECT percentage, marks_obtained, total_marks FROM dbms1.exam_result t1 JOIN dbms.student t2 
          // // WHERE t2.stud_id = '$stud_id'";
          
          //   if (mysqli_num_rows($result1)>0) {
          //       while ($row=mysqli_fetch_array($result1)) {?>
          <span>
            <?php //echo $row['first_name']; ?>
          </span>
          <?php
          //       }
          //   }
          
          //   if (mysqli_num_rows($result2)>0) {
          //       while ($row=mysqli_fetch_array($result2)) {
          //          $last_name = $row['last_name'];
          //       }
          //   }?>

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
              <!-- <li class="nav-item">
                <a class="nav-link" href="../Teacher/Dashboard.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-sliders align-middle">
                    <line x1="4" y1="21" x2="4" y2="14"></line>
                    <line x1="4" y1="10" x2="4" y2="3"></line>
                    <line x1="12" y1="21" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12" y2="3"></line>
                    <line x1="20" y1="21" x2="20" y2="16"></line>
                    <line x1="20" y1="12" x2="20" y2="3"></line>
                    <line x1="1" y1="14" x2="7" y2="14"></line>
                    <line x1="9" y1="8" x2="15" y2="8"></line>
                    <line x1="17" y1="16" x2="23" y2="16"></line>
                  </svg>
                  <span style="font-size: 18px;" class="ms-2">Dashboard</span>
                </a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="home.php?page=manage-exam">
                  <i class="far fa-calendar-check" style="font-size: 20px;"></i>
                  <span style="font-size: 18px;" class="ms-2">Exam</span>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="home.php?page=manage-examinee">
                  <i class="far fa-calendar-minus" style="font-size: 20px;"></i>
                  <span style="font-size: 18px;" class="ms-2">Examinee</span>
                </a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="home.php?page=ranking-exam">
                  <i class="far fa-file-alt" style="font-size: 20px;"></i>
                  <span style="font-size: 18px;" class="ms-2">Ranking</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="home.php?page=examinee-result">
                  <i class="far fa-comment-alt" style="font-size: 19px;"></i>
                  <span style="font-size: 18px;" class="ms-2">Report</span>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="home.php?page=feedbacks">
                  <i class="far fa-comment-alt" style="font-size: 19px;"></i>
                  <span style="font-size: 18px;" class="ms-2">Feedback</span>
                </a>
              </li> -->

              <li class="nav-item">
                <a class="nav-link" href="../../../../Login/logout.php">
                  <i class="fas fa-sign-out-alt" style="font-size: 16px;"></i>
                  <span style="font-size: 18px;" class="ms-2">Logout</span>
                </a>
              </li>
            </ul>
            <!-- /aside nav ul list -->
          </div>
        </aside>
        <main class="w-100 d-flex flex-column" id="main">
          <section class="container-fluid">