<?php 
session_start();

if(!isset($_SESSION['examineeSession']['examineenakalogin']) == false) header("location:index.php");


 ?>
<?php include("conn.php"); ?>

<?php //include("includes/header.php"); ?>      


<?php //include("includes/ui-theme.php"); ?>

<!-- <div class="app-main"> -->
<?php //include("includes/sidebar.php"); ?>
<?php include("student-sidenav-header.php");?>



<?php 
   @$page = $_GET['page'];


   if($page != '')
   {
     if($page == "exam")
     {
       include("pages/exam.php");
     }
     else if($page == "result")
     {
       include("pages/result.php");
     }
    //  else if($page == "myscores")
    //  {
    //    include("pages/myscores.php");
    //  }
     
   }
   else
   {
     include("pages/home.php"); 
     ?><div class="app-content">
     <div class="app-content-header">
         <h1 class="app-content-headerText">Dashboard</h1>
     </div>


     <div class="app-content-actions"><?php
   }


 ?> 

            
       

<?php include("includes/footer.php"); ?>

<?php include("includes/modals.php"); ?>


