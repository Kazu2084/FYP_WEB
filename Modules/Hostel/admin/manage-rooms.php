<?php
    session_start();
    include('../includes/dbconn.php');
    include('../includes/check-login.php');
    check_login();

    if(isset($_GET['del']))
    {
        $id=intval($_GET['del']);
        $adn="DELETE from rooms where id=?";
            $stmt= $mysqli->prepare($adn);
            $stmt->bind_param('i',$id);
            $stmt->execute();
            $stmt->close();	   
            echo "<script>alert('Record has been deleted');</script>" ;
    }
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
   
    <link href="../dist/css/style.min.css" rel="stylesheet">

</head>

<body>
<?php include('../Common/admin-sidenav-header.php') ?>
    <!-- 
    
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        
        <header class="topbar" data-navbarbg="skin6">
            <?php //include 'includes/navigation.php'?>
        </header>
        
        <aside class="left-sidebar" data-sidebarbg="skin6">
            
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <?php //include 'includes/sidebar.php'?>
            </div>
            
        </aside>
        
        <div class="page-wrapper">
            
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Rooms Management</h4>
                        <div class="d-flex align-items-center">
                             <nav aria-label="breadcrumb">
                                
                            </nav>
                            
                        </div>
                    </div>
                    
                </div>

            </div>
            
            <div class="container-fluid"> -->

                <!-- Table Starts -->
                <div class="app-content">
        <div class="app-content-header">
            <h1 class="app-content-headerText">Manage Rooms</h1>
            <a href="add-rooms.php" style="background-color:#61DFFA;color:#FFFFFF" class="btn btn-sm">Add New Room</a>

        </div>

        <div class="app-content-actions">

            <div class="products-area-wrapper tableView">
                <!-- <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <a href="add-rooms.php"><button type="button" class="btn btn-block btn-md " style="background-color:#61DFFA;color:#FFFFFF">Add New Room Details</button></a>
                            <hr>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-hover table-bordered no-wrap">
                                    <thead class="thead-dark"> -->
                                    <div class="products-header">
                                               <div class="product-cell">#</div>
                                               <div class="product-cell">Room No.</div>
                                               <div class="product-cell">Seater</div>
                                               <div class="product-cell">Fees Per Month</div>
                                               <!-- <div class="product-cell">Published On</div> -->
                                               <div class="product-cell">Actions</div>
</div>
                                        
                                        <?php	
                                            $aid=$_SESSION['id'];
                                            $ret="SELECT * from rooms";
                                            $stmt= $mysqli->prepare($ret) ;
                                            //$stmt->bind_param('i',$aid);
                                            $stmt->execute() ;//ok
                                            $res=$stmt->get_result();   
                                            $cnt=1;
                                            while($row=$res->fetch_object())
                                                {
                                                    ?>
                                        <div class="products-row"><div class="product-cell"><?php echo $cnt;;?></div>
                                        <div class="product-cell"><span><?php echo $row->room_no;?></span></div>
                                        <div class="product-cell"><span><?php echo $row->seater;?></span></div>
                                        <div class="product-cell"><span>&#8377;<?php echo $row->fees;?></span></div>
                                        <!-- <div class="product-cell"><span><?php //echo $row->posting_date;?></span></div> -->
                                        <div class="product-cell"><span><a class="btn" style="background-color:#61DFFA;color:#FFFFFF" href="edit-room.php?id=<?php echo $row->id;?>" title="Edit">Edit</a></span>&thinsp;<span>
                                        <a class="btn" style="background-color:#D66B6B;color:#FFFFFF;" href="manage-rooms.php?del=<?php echo $row->id;?>" title="Delete" onclick="return confirm("Do you want to delete");">Delete</a></span></div>
                                                </div>
                                            <?php
                                                $cnt=$cnt+1;
                                            } ?>
									    </div>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Table Ends -->

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
    <script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../dist/js/pages/datatable/datatable-basic.init.js"></script>

</body>

</html>