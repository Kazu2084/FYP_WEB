<?php
// session_start();

// if (!isset($_SESSION['admin']['adminnakalogin']) == true)
//   header("manage-exam.php");
//   else{
//     header("manage-exam.php");} 

?>

<?php //include("includes/header.php");  ?>

<?php //include("includes/ui-theme.php");  ?>

<!-- <div class="app-main"> -->

<?php //include("includes/sidebar.php");  ?>
<? include ('../../Common/admin-sidenav-header.php'); ?>


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
          
          //   $result1=mysqli_query($conn,$query_fn);
          //   $result2=mysqli_query($conn,$query_ln);
          
          // //   $sql_total_marks = "SELECT percentage, marks_obtained, total_marks FROM dbms1.exam_result t1 JOIN dbms.student t2 
          // // WHERE t2.stud_id = '$stud_id'";
          
          //   if (mysqli_num_rows($result1)>0) {
          //       while ($row=mysqli_fetch_array($result1)) { ?>
          <span>
            <?php //echo $row['first_name'];  ?>
          </span>
          <?php
          //       }
          //   }
          
          //   if (mysqli_num_rows($result2)>0) {
          //       while ($row=mysqli_fetch_array($result2)) {
          //          $last_name = $row['last_name'];
          //       }
          //   } ?>

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
            <?php
            require_once "../../conn.php";
            $exId = $_GET['id'];

            $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$exId' ");
            $selExamRow = $selExam->fetch(PDO::FETCH_ASSOC);
            
            $courseId = $selExamRow['cou_id'];
            $selCourse = $conn->query("SELECT cou_name FROM course_tbl WHERE cou_id='$courseId'")->fetch(PDO::FETCH_ASSOC); // Using fetch_assoc() here too
            ?>

            <!-- 

<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                     <div class="page-title-heading">
                        <div> MANAGE EXAM -->
            <div class="app-content">
              <div class="app-content-header">
                <h1 class="app-content-headerText">Manage Exam</h1>

              </div>


              <div class="app-content-actions">
                <div class="col-md-12">
                  <div id="refreshData">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="main-card mb-3 card">
                          <div class="card-header">
                            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Exam Information
                          </div>
                          <div class="card-body">
                            <form method="post" id="updateExamFrm">
                              <div class="form-group">
                                <label>Course</label>
                                <select class="form-control" name="courseId" required="">
                                  <option value="<?php echo $selExamRow['cou_id']; ?>">
                                    <?php echo $selCourse['cou_name']; ?>
                                  </option>
                                  <?php
                                  $selAllCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id DESC");
                                  while ($selAllCourseRow = $selAllCourse->fetch_assoc()) { ?>
                                    <option value="<?php echo $selAllCourseRow['cou_id']; ?>">
                                      <?php echo $selAllCourseRow['cou_name']; ?>
                                    </option>
                                  <?php }
                                  ?>
                                </select>

                              <div class="form-group">
                                <label>Exam Title</label>
                                <input type="hidden" name="examId" value="<?php echo $selExamRow['ex_id']; ?>">
                                <input type="" name="examTitle" class="form-control" required=""
                                  value="<?php echo $selExamRow['ex_title']; ?>">
                              </div>

                              <div class="form-group">
                                <label>Exam Description</label>
                                <input type="" name="examDesc" class="form-control" required=""
                                  value="<?php echo $selExamRow['ex_description']; ?>">
                              </div>

                              <div class="form-group">
                                <label>Exam Time limit</label>
                                <select class="form-control" name="examLimit" required="">
                                  <option value="<?php echo $selExamRow['ex_time_limit']; ?>">
                                    <?php echo $selExamRow['ex_time_limit']; ?> Minutes
                                  </option>
                                  <option value="10">10 Minutes</option>
                                  <option value="20">20 Minutes</option>
                                  <option value="30">30 Minutes</option>
                                  <option value="40">40 Minutes</option>
                                  <option value="50">50 Minutes</option>
                                  <option value="60">60 Minutes</option>
                                </select>
                              </div>

                              <div class="form-group">
                                <label>Display limit</label>
                                <input type="number" name="examQuestDipLimit" class="form-control"
                                  value="<?php echo $selExamRow['ex_questlimit_display']; ?>">
                              </div>

                              <div class="form-group" align="right">
                                <button type="submit" class="btn btn-primary btn-lg">Update</button>
                              </div>
                            </form>
                          </div>
                        </div>

                      </div>
                      <div class="col-md-6">
                        <?php
                        $selQuest = $conn->query("SELECT * FROM exam_question_tbl WHERE exam_id='$exId' ORDER BY eqt_id desc");
                        ?>
                        <div class="main-card mb-3 card">
                          <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate">
                            </i>Exam Question's
                            <span class="badge badge-pill badge-primary ml-2">
                              <?php echo $selQuest->num_rows; ?>
                            </span>
                            <div class="btn-actions-pane-right">
                              <button class="btn btn-sm btn-primary " data-toggle="modal" data-target="#modalForAddQuestion">Add Question</button>
                            </div>
                          </div>
                          <div class="card-body">
                            <div class="scroll-area-sm" style="min-height: 400px;">
                              <div class="scrollbar-container">

                                <?php

                                if ($selQuest->num_rows > 0) { ?>
                                  <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover"
                                      id="tableList">
                                      <thead>
                                        <tr>
                                          <th class="text-left pl-1">Course Name</th>
                                          <th class="text-center" width="20%">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php

                                        if ($selQuest->num_rows > 0) {
                                          $i = 1;
                                          while ($selQuestionRow = $selQuest->fetch_assoc()) { ?>
                                            <tr>
                                              <td>
                                                <b>
                                                  <?php echo $i++;
                                                  echo $selQuestionRow['exam_question']; ?>
                                                </b><br>
                                                <?php
                                                // Choice A
                                                if ($selQuestionRow['exam_ch1'] == $selQuestionRow['exam_answer']) { ?>
                                                  <span class="pl-4 text-success">A -
                                                    <?php echo $selQuestionRow['exam_ch1']; ?>
                                                  </span><br>
                                                <?php } else { ?>
                                                  <span class="pl-4">A -
                                                    <?php echo $selQuestionRow['exam_ch1']; ?>
                                                  </span><br>
                                                <?php }

                                                // Choice B
                                                if ($selQuestionRow['exam_ch2'] == $selQuestionRow['exam_answer']) { ?>
                                                  <span class="pl-4 text-success">B -
                                                    <?php echo $selQuestionRow['exam_ch2']; ?>
                                                  </span><br>
                                                <?php } else { ?>
                                                  <span class="pl-4">B -
                                                    <?php echo $selQuestionRow['exam_ch2']; ?>
                                                  </span><br>
                                                <?php }

                                                // Choice C
                                                if ($selQuestionRow['exam_ch3'] == $selQuestionRow['exam_answer']) { ?>
                                                  <span class="pl-4 text-success">C -
                                                    <?php echo $selQuestionRow['exam_ch3']; ?>
                                                  </span><br>
                                                <?php } else { ?>
                                                  <span class="pl-4">C -
                                                    <?php echo $selQuestionRow['exam_ch3']; ?>
                                                  </span><br>
                                                <?php }

                                                // Choice D
                                                if ($selQuestionRow['exam_ch4'] == $selQuestionRow['exam_answer']) { ?>
                                                  <span class="pl-4 text-success">D -
                                                    <?php echo $selQuestionRow['exam_ch4']; ?>
                                                  </span><br>
                                                <?php } else { ?>
                                                  <span class="pl-4">D -
                                                    <?php echo $selQuestionRow['exam_ch4']; ?>
                                                  </span><br>
                                                <?php }

                                                ?>

                                              </td>
                                              <td class="text-center">
                                                <!-- <a rel="facebox"
                                                  href="facebox_modal/updateQuestion.php?id=<?php //echo $selQuestionRow['eqt_id']; ?>"
                                                  class="btn btn-sm btn-primary">Update</a> -->
                                                <button type="button" id="deleteQuestion"
                                                  data-id='<?php echo $selQuestionRow['eqt_id']; ?>'
                                                  class="btn btn-danger btn-sm">Delete</button>
                                              </td>
                                            </tr>
                                          <?php }
                                        } else { ?>
                                          <tr>
                                            <td colspan="2">
                                              <h3 class="p-3">No Course Found</h3>
                                            </td>
                                          </tr>
                                        <?php }
                                        ?>
                                      </tbody>
                                    </table>
                                  </div>
                                <?php } else { ?>
                                  <h4 class="text-primary">No question found...</h4>
                                  <?php
                                }
                                ?>
                              </div>
                            </div>


                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>




              <?php include ("includes/footer.php"); ?>

              <?php include ("includes/modals.php"); ?>