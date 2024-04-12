<?php 
    // session_start();
    // if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin']==true){
    //     $adminloggedin= true;
    //     $userId = $_SESSION['adminuserId'];
    // }
    // else{
    //     $adminloggedin = true; //false
    //     $userId = 1; //0
    // }

    // if($adminloggedin) {
        
?>
<!doctype html>
<html lang="en">

<body>
     
    <?php
   
        require 'partials/_dbconnect.php';
        //require 'partials/_nav.php';

        // if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
        //     //echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="width:100%">
                   
        // }
    ?>

    <?php $page = isset($_GET['page']) ? $_GET['page'] :'home'; ?>
    <?php include $page.'.php' ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script src="assetsForSideBar/js/main.js"></script>

</body>
</html>

<?php
    // }
    // else{
    //     header("location: /Merch/admin/login.php");
    // }
?>