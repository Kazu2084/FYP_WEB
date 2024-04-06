<?php 

// require_once "../Connection/connection.php";
	//session_start();
	// if (!$_SESSION["LoginAdmin"])
	// {
	// 	header('location:../../Login/index.html');
	// }


// session_start();
if (isset($_SESSION["LoginAdmin"])) {
  $current_session = $_SESSION['LoginAdmin'];
} elseif (isset($_SESSION["LoginPlacement"])) {
  $current_session = $_SESSION['LoginPlacement'];
}

?>

<!DOCTYPE html>
<html lang="en">


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
          <?php echo $current_session;?>
          <button class="mode-switch" title="Switch Theme" id="color-scheme-selector">
            <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
              stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
              <defs></defs>
              <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
            </svg>
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

      <section id="wrapper" class="d-flex w-100">
        <aside class="border-right shadow-sm background text" id="aside-nav">
          <div id="side-nav">
            <ul class="nav flex-column" id="aside-nav-ul">
              <li class="nav-item">
                <a class="nav-link" href="../admin/book.php">
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
              </li>
              <li class="nav-item">
                <a class="nav-link" href="company/">
                <i class="far fa-building" style="font-size: 18px;"></i>
                  <span style="font-size: 18px;" class="ms-2">Company</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../vacancy/">
                <i class="far fa-address-card" style="font-size: 18px;"></i>
                  <span style="font-size: 18px;" class="ms-2">Vacancy</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../applicants/list.php">
                <!-- <i class="far fa-users" style="font-size: 18px;"></i> -->
                <i class="fas fa-user"></i>
                <span style="font-size: 18px;" class="ms-2">Applicants</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../category/">
                <i class="fas fa-tags"></i>
                  <span style="font-size: 18px;" class="ms-2">Category</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../../../Login/logout.php">
                  <i class="fas fa-sign-out-alt" style="font-size: 18px;"></i>
                  <span style="font-size: 18px;" class="ms-2">Logout</span>
                </a>
              </li>
            </ul>
          </div>
        </aside>
        <main class="w-100 d-flex flex-column" id="main">
          <section class="container-fluid">

