<?php
include("conn.php");
include("query/selectData.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="Style/script.js"></script>
  <script src="Style/body.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="Style/style1.css">
  <link rel="stylesheet" href="Style/style.css">
</head>

<body>
  <div style="width: 100%;overflow:auto;">
    <div class="app-container" style="float:left; position:sticky; top:0; z-index:1">
      <div class="app-header">
        <div class="app-header-left">
          <div class="p app-icon" id="aside-toggle-btn">
          </div>
          <p class="app-name">Student Dashboard</p>
         
        </div>
        <div class="app-header-right">
          <div>  <?php echo $selExmneeData['exmne_email'];?></div>
          <button class="mode-switch" title="Switch Theme">
            <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
              stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
              <defs></defs>
              <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
            </svg>
          </button>
         

        </div>
        
        <!-- <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <?php
                                           // echo strtoupper($selExmneeData['exmne_fullname']);
                                            ?>
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <button type="button" tabindex="0" class="dropdown-item">My Account</button>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <a href="query/logoutExe.php" class="dropdown-item">LOG OUT</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>        </div> -->
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
                <a class="nav-link" href="home.php">
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
              <li class="nav-item aside-dropdown">
                <a class="nav-link position-relative" data-bs-toggle="collapse" href="#collapsePricing" role="button"
                  aria-expanded="false" aria-controls="collapseExample">
                  <i class="fas fa-clipboard-check" style="font-size: 16px;"></i>
                  <span style="font-size: 18px;" class="ms-2">Exam</span>
                  <span class="dropdown-caret-svg">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" fit="" height="100%"
                      width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                      <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                    </svg>

                  </span>
                </a>
                <ul class="collapse list-unstyled aside-dropdown-menu" id="collapsePricing">
                  <li><a style="font-size: 16px;" class="nav-link" href="attemptedExams.php">Attempted</a></li>
                  <li><a style="font-size: 16px;" class="nav-link" href="notAttemptedExams.php">All Exams</a></li>
                </ul>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#feedbacksModal">
                
                <i class="fas fa-comments" style="font-size: 16px;"></i>
                <span style="font-size: 18px;" class="ms-2">Feedback</span> 
                </a>
                </a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="../../Login/logout.php">
                  <i class="fas fa-sign-out-alt" style="font-size: 16px;"></i>
                  <span style="font-size: 18px;" class="ms-2">Logout</span>
                </a>
              </li>
            </ul>

          </div>
        </aside>
        <main class="w-100 d-flex flex-column" id="main">
          <section class="container-fluid">