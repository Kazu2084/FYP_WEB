<?php
error_reporting(0);

session_start();
include ('../includes/connection.php');
if (isset($_SESSION["LoginTeacher"])) {
    $current_session = $_SESSION['LoginTeacher'];
    $eid = $_SESSION['teacher_id'];
} elseif (isset($_SESSION["LoginStaff"])) {
    $current_session = $_SESSION['LoginStaff'];
    $eid = $_SESSION['staff_id'];
}


?>
<!-- 
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head> -->

<!-- <body> -->


<html lang="en">

<head>
    <title>Teacher</title>
</head>

<body>
    <?php include ('../Common/user-sidenav-header.php') ?>
    <div class="app-content">
        <div class="app-content-header">
            <h1 class="app-content-headerText">Leave History</h1>
        </div>

        <div class="app-content-actions">




            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Leave History Table</h4>

                    <div class="data-tables">
                        <div class="products-area-wrapper tableView">
                            <div class="products-header">
                                <div class="product-cell">#</div>
                                <div class="product-cell">Type</div>
                                <div class="product-cell">Conditions</div>
                                <div class="product-cell">From</div>
                                <div class="product-cell">To</div>
                                <div class="product-cell">Applied</div>
                                <div class="product-cell">Admin's Remark</div>
                                <div class="product-cell">Status</div>
                            </div>


                            <?php

                            $sql = "SELECT LeaveType,ToDate,FromDate,Description,PostingDate,AdminRemarkDate,AdminRemark,Status from tblleaves where empid=:eid";
                            $query = $dbh->prepare($sql);
                            $query->bindParam(':eid', $eid, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) { ?>

                                    <div class="products-row">
                                        <div class="product-cell"><span>
                                                <?php echo htmlentities($cnt); ?>
                                            </span></div>
                                        <div class="product-cell"><span>
                                                <?php echo htmlentities($result->LeaveType); ?>
                                            </span></div>
                                        <div class="product-cell"><span>
                                                <?php echo htmlentities($result->Description); ?>
                                            </span></div>
                                        <div class="product-cell"><span>
                                                <?php echo htmlentities($result->FromDate); ?>
                                            </span></div>
                                        <div class="product-cell"><span>
                                                <?php echo htmlentities($result->ToDate); ?>
                                            </span></div>
                                        <div class="product-cell"><span>
                                                <?php echo htmlentities($result->PostingDate); ?>
                                            </span></div>
                                        <div class="product-cell"><span>
                                                <?php if ($result->AdminRemark == "") {
                                                    echo htmlentities('Pending');
                                                } else {

                                                    echo htmlentities(($result->AdminRemark) . " " . "at" . " " . $result->AdminRemarkDate);
                                                }

                                                ?>
                                            </span></div>

                                        <div class="product-cell"><span>
                                                <?php $stats = $result->Status;
                                                if ($stats == 1) {
                                                    ?>
                                                    <span>Approved</span>
                                                <?php }
                                                if ($stats == 2) { ?>

                                                    <span>Not Approved</span>
                                                <?php }
                                                if ($stats == 0) { ?>

                                                    <span>Pending</span>
                                                <?php } ?>

                                            </span></div>
                                    </div>

                                    <?php $cnt++;
                                }
                            } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
    </div>
    </div>
    </div>

    <!-- footer area start-->


    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>


    </div>
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
</body>

</html>