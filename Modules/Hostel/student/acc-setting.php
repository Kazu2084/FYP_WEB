<?php
    session_start();
    include('../includes/dbconn.php');
    date_default_timezone_set('America/Chicago');
    include('../includes/check-login.php');
    check_login();
    $ai=$_SESSION['id'];
    // code for change password
    if(isset($_POST['changepwd'])){
    $op=$_POST['oldpassword'];
    $op=md5($op);
    $np=$_POST['newpassword'];
    $np=md5($np);
    $udate=date('d-m-Y h:i:s', time());;
        $sql="SELECT password FROM roomregistration where password=?";
        $chngpwd = $mysqli->prepare($sql);
        $chngpwd->bind_param('s',$op);
        $chngpwd->execute();
        $chngpwd->store_result(); 
        $row_cnt=$chngpwd->num_rows;;
        if($row_cnt>0){
            $con="update roomregistration set password=?,passUdateDate=?  where id=?";
            $chngpwd1 = $mysqli->prepare($con);
            $chngpwd1->bind_param('ssi',$np,$udate,$ai);
            $chngpwd1->execute();
            $_SESSION['msg']="Password has been updated !!";
        } else {
            $_SESSION['msg']="Old Password does not match !!";
        }	

    }
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>

    
    <link href="../dist/css/style.min.css" rel="stylesheet">

    <script type="text/javascript">
    function valid(){
    if(document.changepwd.newpassword.value!= document.changepwd.cpassword.value){
        alert("New Password and Confirmation Password does not match");
        document.changepwd.cpassword.focus();
        return false;
     }
        return true;
    }
    </script>
    
</head>

<body>
    
    
    
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        
        <header class="topbar" data-navbarbg="skin6">
            <?php include '../includes/student-navigation.php'?>
        </header>
        
        
        <aside class="left-sidebar" data-sidebarbg="skin6">
            
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <?php include '../includes/student-sidebar.php'?>
            </div>
            
        </aside>
        
        <div class="page-wrapper">
            
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Account Settings - Change Password</h4>
                </div>

                <div class="row">

                <?php $result ="SELECT passUdateDate FROM roomregistration WHERE id=?";
                $stmt = $mysqli->prepare($result);
                $stmt->bind_param('i',$ai);
                $stmt->execute();
                $stmt -> bind_result($result);
                $stmt -> fetch(); ?>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-subtitle">Last Updated On: <code><?php echo $result; ?></code> </h6>
                                </div>
                            </div>
                        </div>
                </div>


                <?php if(isset($_POST['changepwd'])){ ?>
                        <div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show"
                                    role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Info: </strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg']=""); ?>
                        </div> <?php } ?>

                <form method="POST" name="changepwd" id="change-pwd" onSubmit="return valid();">
                    <div class="row">

                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Current Password</h4>
                                            <div class="form-group">
                                                <input type="password" name="oldpassword" id="oldpassword" value="" class="form-control" onBlur="checkpass()" required="required">
                                                <span id="password-availability-status" class="help-block m-b-none" style="font-size:12px;"></span>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">New Password</h4>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="newpassword" id="newpassword" value="" required="required">
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Confirm Password<h4>
                                            <div class="form-group">
                                                <input type="password" class="form-control" value="" required="required" id="cpassword" name="cpassword">
                                            </div>
                                    </div>
                                </div>
                            </div>
                    
                    
                    </div>

                    
                    <div class="form-actions">
                                <div class="text-center">
                                    <button type="submit" name="changepwd" class="btn " style="background-color:#61DFFA;color:#FFFFFF">Submit</button>
                                    <button type="reset" class="btn " style="background-color:#61DFFA;color:#FFFFFF">Reset</button>
                                    </div>
                            </div>

                </form>

            </div>
            
      
           
        </div>
        
    </div>
    
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.min.js"></script>

    <!-- customs -->
    <script>
    function checkpass() {
        $("#loaderIcon").show();
        jQuery.ajax({
        url: "check-availability.php",
        data:'oldpassword='+$("#oldpassword").val(),
        type: "POST",
        success:function(data){
            $("#password-availability-status").html(data);
            $("#loaderIcon").hide();
            },
            error:function (){}
        });
    }
    </script>
</body>

</html>