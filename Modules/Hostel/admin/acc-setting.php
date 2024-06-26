<?php
    session_start();
    include('../includes/dbconn.php');
    include('../includes/check-login.php');
    check_login();

    if(isset($_POST['changepwd'])){
    $op=$_POST['oldpassword'];
    $np=$_POST['newpassword'];
    $ai=$_SESSION['id'];
    $udate=date('Y-m-d');
        $sql="SELECT password FROM admin where password=?";
        $chngpwd = $mysqli->prepare($sql);
        $chngpwd->bind_param('s',$op);
        $chngpwd->execute();
        $chngpwd->store_result(); 
        $row_cnt=$chngpwd->num_rows;;
        if($row_cnt>0)
        {
            $con="update admin set password=?,updation_date=?  where id=?";
    $chngpwd1 = $mysqli->prepare($con);
    $chngpwd1->bind_param('ssi',$np,$udate,$ai);
    $chngpwd1->execute();
            $_SESSION['msg']="Password has been changed";
        } else {
            $_SESSION['msg']="Current Password does not match";
        }	
        

    }

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
     
     <link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    
    <link href="../dist/css/style.min.css" rel="stylesheet">

</head>

<body>
    
    
    
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        
        <header class="topbar" data-navbarbg="skin6">
            <?php include 'includes/navigation.php'?>
        </header>
        
        <aside class="left-sidebar" data-sidebarbg="skin6">
            
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <?php include 'includes/sidebar.php'?>
            </div>
            
        </aside>
        
        <div class="page-wrapper">
            
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Change Password</h4>
                        
                        
                        <?php if(isset($_POST['changepwd']))
                            { ?>
                                <div class="alert alert-secondary alert-dismissible bg-secondary text-white border-0 fade show"
                                    role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Info - </strong> <?php echo htmlentities($_SESSION['msg']); ?> <?php echo htmlentities($_SESSION['msg']=""); ?>
                                </div>
						<?php } ?>

                            
                        
                        
                    </div>
                    
                </div>

            </div>
            
            <div class="container-fluid">

                <form method="POST">

                    <div class="row">


                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Current Password</h4>
                                        <div class="form-group">
                                        <input type="password" value="" name="oldpassword" id="oldpassword" class="form-control" onBlur="checkpass()" required="required">
                                        <span id="password-availability-status" style="font-size:12px;"></span>
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
                                    <h4 class="card-title">Confirm Password</h4>
                                        <div class="form-group">
                                        <input type="password" class="form-control" value="" required="required" id="cpassword" name="cpassword" >
                                        </div>
                                </div>
                            </div>
                        </div>

                        <?php	
                        $aid=$_SESSION['id'];
                        $ret="SELECT * from admin where id=?";
                            $stmt= $mysqli->prepare($ret) ;
                        $stmt->bind_param('i',$aid);
                        $stmt->execute() ;//ok
                        $res=$stmt->get_result();
                        //$cnt=1;
                        while($row=$res->fetch_object())
                        {
                            ?>

                        <h6 class="card-subtitle"><code>Last Updated On: </code> <?php echo $row->updation_date; }?> </h6>



                    </div>


                        <div class="form-actions">
                            <div class="text-center">
                                <button type="submit" name="changepwd" class="btn " style="background-color:#61DFFA;color:#FFFFFF">Make Changes</button>
                                <button type="reset" class="btn " style="background-color:#61DFFA;color:#FFFFFF">Reset</button>
                            </div>
                        </div>

                 
                 </form>
                 
            </div>
            
            <?php include '../includes/footer.php' ?>
           
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
    <script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../dist/js/pages/datatable/datatable-basic.init.js"></script>

    <script>
    function checkAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check-availability-admin.php",
            data:'emailid='+$("#emailid").val(),
            type: "POST",
        success:function(data){
            $("#user-availability-status").html(data);
            $("#loaderIcon").hide();
        },
        error:function (){}
        });
    }
    </script>

    <script>
    function checkpass() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check-availability-admin.php",
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