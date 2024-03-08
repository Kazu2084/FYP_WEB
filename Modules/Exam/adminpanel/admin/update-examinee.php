<?php include("../../conn.php"); ?>

<?php

$id = $_GET['id'];

$selExmne = $conn->query("SELECT * FROM examinee_tbl WHERE exmne_id='$id' ")->fetch(PDO::FETCH_ASSOC);

?>
<? include('../../Common/teacher-sidenav-header.php'); ?>


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
  <script src="../../Style/script.js"></script>
  <script src="../../Style/body.js"></script>


  <!-- CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../Style/style1.css">
  <link rel="stylesheet" href="../../Style/style.css">
</head>

<body>
  <div style="width: 100%;overflow:auto;">
    <div class="app-container" style="float:left; position:sticky; top:0; z-index:1">
      <div class="app-header">
        <div class="app-header-left">
          <div class="p app-icon" id="aside-toggle-btn">
          </div>
          <p class="app-name">Teacher Dashboard</p>
          <div class="search-wrapper">
            <input class="search-input" type="text" placeholder="Search">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-search"
              viewBox="0 0 24 24">
              <defs></defs>
              <circle cx="11" cy="11" r="8"></circle>
              <path d="M21 21l-4.35-4.35"></path>
            </svg>
          </div>
        </div>
        <div class="app-header-right">
          <button class="mode-switch" title="Switch Theme" id="color-scheme-selector">
            <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
              stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
              <defs></defs>
              <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
            </svg>
          </button>
          <button class="add-btn" title="Add New Project">
            <svg class="btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
              fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-plus">
              <line x1="12" y1="5" x2="12" y2="19" />
              <line x1="5" y1="12" x2="19" y2="12" />
            </svg>
          </button>
          <button class="notification-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-bell">
              <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
              <path d="M13.73 21a2 2 0 0 1-3.46 0" />
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
        <button class="messages-btn">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-message-circle">
            <path
              d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
          </svg>
        </button>
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
                <a class="nav-link" href="../Teacher/Dashboard.php">
                  <!-- svg -->
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
                  <!-- /svg -->
                  <span style="font-size: 18px;" class="ms-2">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="home.php?page=manage-exam">
                  <i class="far fa-calendar-check" style="font-size: 20px;"></i>
                  <span style="font-size: 18px;" class="ms-2">Exam</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="home.php?page=manage-examinee">
                  <i class="far fa-calendar-minus" style="font-size: 20px;"></i>
                  <span style="font-size: 18px;" class="ms-2">Examinee</span>
                </a>
              </li>
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
              <li class="nav-item">
                <a class="nav-link" href="home.php?page=feedbacks">
                  <i class="far fa-comment-alt" style="font-size: 19px;"></i>
                  <span style="font-size: 18px;" class="ms-2">Feedback</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../Logout/logout.php">
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
<div class="app-content">
      <div class="app-content-header">
         <h1 class="app-content-headerText">Update Examinee</h1>
      </div>


      <div class="app-content-actions">
         <div>

            <form method="post" id="updateExamineeFrm">
               <div class="form-group">
                  <legend>Fullname</legend>
                  <input type="hidden" name="exmne_id" value="<?php echo $id; ?>">
                  <input type="" name="exFullname" class="form-control" required=""
                     value="<?php echo $selExmne['exmne_fullname']; ?>">
               </div>

               <div class="form-group">
                  <legend>Gender</legend>
                  <select class="form-control" name="exGender">
                     <option value="<?php echo $selExmne['exmne_gender']; ?>">
                        <?php echo $selExmne['exmne_gender']; ?>
                     </option>
                     <option value="male">Male</option>
                     <option value="female">Female</option>
                  </select>
               </div>

               <div class="form-group">
                  <legend>Birthdate</legend>
                  <input type="date" name="exBdate" class="form-control" required=""
                     value="<?php echo date('Y-m-d', strtotime($selExmne["exmne_birthdate"])) ?>" />
               </div>

               <div class="form-group">
                  <legend>Course</legend>
                  <?php
                  $exmneCourse = $selExmne['exmne_course'];
                  $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$exmneCourse' ")->fetch(PDO::FETCH_ASSOC);
                  ?>
                  <select class="form-control" name="exCourse">
                     <option value="<?php echo $exmneCourse; ?>">
                        <?php echo $selCourse['cou_name']; ?>
                     </option>
                     <?php
                     $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id!='$exmneCourse' ");
                     while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $selCourseRow['cou_id']; ?>">
                           <?php echo $selCourseRow['cou_name']; ?>
                        </option>
                     <?php }
                     ?>
                  </select>
               </div>

               <div class="form-group">
                  <legend>Year level</legend>
                  <input type="" name="exYrlvl" class="form-control" required=""
                     value="<?php echo $selExmne['exmne_year_level']; ?>">
               </div>

               <div class="form-group">
                  <legend>Email</legend>
                  <input type="" name="exEmail" class="form-control" required=""
                     value="<?php echo $selExmne['exmne_email']; ?>">
               </div>

               <div class="form-group">
                  <legend>Password</legend>
                  <input type="" name="exPass" class="form-control" required=""
                     value="<?php echo $selExmne['exmne_password']; ?>">
               </div>

               <div class="form-group">
                  <legend>Status</legend>
                  <input type="hidden" name="course_id" value="<?php echo $id; ?>">
                  <input type="" name="newCourseName" class="form-control" required=""
                     value="<?php echo $selExmne['exmne_status']; ?>">
               </div>
               <div class="form-group" align="right">
                  <button type="submit" class="btn btn-sm btn-primary">Update Now</button>
               </div>
            </form>
         </div>
      </div>