<?php
session_start();
include('../includes/dbconn.php');
include('../includes/check-login.php');
check_login();

if (isset($_GET['del'])) {
    $id = intval($_GET['del']);
    $adn = "DELETE from roomregistration where id=?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
    echo "<script>alert('Record has been deleted');</script>";
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <link href="../dist/css/style.min.css" rel="stylesheet">

    <script language="javascript" type="text/javascript">
        var popUpWin = 0;
        function popUpWindow(URLStr, left, top, width, height) {
            if (popUpWin) {
                if (!popUpWin.closed) popUpWin.close();
            }
            popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 510 + ',height=' + 430 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
        }
    </script>

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
                    <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Hostel Student Management</h4>
                        <div class="d-flex align-items-center">
                            
                        </div>
                    </div>
                    
                </div>
            </div> -->

    <!-- <div class="container-fluid"> -->
    <div class="app-content">
        <div class="app-content-header">
            <h1 class="app-content-headerText">Manage Student Account</h1>
        </div>

        <div class="app-content-actions">

            <div class="products-area-wrapper tableView">
                <!-- <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-subtitle">Displaying all the registered students list.</h6>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-hover table-bordered no-wrap">
                                    <thead class="thead-dark"> -->
                <div class="products-header">

                    <div class="product-cell">#</div>
                    <div class="product-cell">Reg. No.</div>
                    <div class="product-cell">Student's Name</div>
                    <div class="product-cell">Room No.</div>
                    <div class="product-cell">Seater</div>
                    <div class="product-cell">Staying From</div>
                    <div class="product-cell">Contact</div>
                    <div class="product-cell">Actions</div>
                </div>

                <?php
                $aid = $_SESSION['id'];
                $ret = "SELECT * from roomregistration";
                $stmt = $mysqli->prepare($ret);
                $stmt->execute(); //ok
                $res = $stmt->get_result();
                $cnt = 1;
                while ($row = $res->fetch_object()) {
                    ?>
                    <div class="products-row">
                        <div class="product-cell"><span>
                                <?php echo $cnt;
                                ; ?>
                            </span></div>
                        <div class="product-cell"><span>
                                <?php echo $row->regno; ?>
                            </span></div>
                        <div class="product-cell"><span>
                                <?php echo $row->firstName; ?>
                                <?php echo $row->middleName; ?>
                                <?php echo $row->lastName; ?>
                            </span></div>
                        <div class="product-cell"><span>
                                <?php echo $row->roomno; ?>
                            </span></div>
                        <div class="product-cell"><span>
                                <?php echo $row->seater; ?>
                            </span></div>
                        <div class="product-cell"><span>
                                <?php echo $row->stayfrom; ?>
                            </span></div>
                        <div class="product-cell"><span>
                                <?php echo $row->contactno; ?>
                            </span></div>
                        <div class="product-cell"><span>
                                <a class="btn " style="background-color:#61DFFA;color:#FFFFFF" href="students-profile.php?id=<?php echo $row->id; ?>" title="View Full Details">View</a>
                               </span>&thinsp;
                               <span>
        <a class="btn" style="background-color:#D66B6B;color:#FFFFFF;" href="manage-students.php?del=<?php echo $row->id; ?>" title="Delete Record"
            onclick="return confirm('Do you want to delete?');">Delete</a>
    </span></div>
                    </div>
                    <?php
                    $cnt = $cnt + 1;
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