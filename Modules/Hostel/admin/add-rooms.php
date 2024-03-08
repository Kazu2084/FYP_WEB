<?php
session_start();
include('../includes/dbconn.php');
include('../includes/check-login.php');
check_login();

if (isset($_POST['submit'])) {
    $seater = $_POST['seater'];
    $roomno = $_POST['rmno'];
    $fees = $_POST['fee'];
    $sql = "SELECT room_no FROM rooms where room_no=?";
    $stmt1 = $mysqli->prepare($sql);
    $stmt1->bind_param('i', $roomno);
    $stmt1->execute();
    $stmt1->store_result();
    $row_cnt = $stmt1->num_rows;
    ;
    if ($row_cnt > 0) {
        echo "<script>alert('Room already exist!');</script>";
    } else {
        $query = "INSERT into  rooms (seater,room_no,fees) values(?,?,?)";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('iii', $seater, $roomno, $fees);
        $stmt->execute();
        echo "<script>alert('Room has been added');</script>";
    }
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>

    <link href="../dist/css/style.min.css" rel="stylesheet">

</head>

<body>
    <?php include('../Common/admin-sidenav-header.php') ?>
    <div class="app-content">
        <div class="app-content-header">
            <h1 class="app-content-headerText">Add Room</h1>
        </div>

        <div class="app-content-actions">


            <?php if (isset($_POST['submit'])) { ?>
                <!-- <p style="color: red"><?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?></p> -->
            <?php } ?>

            <div class="container-fluid">

                <form method="POST">

                    <div class="row">



                        <div class="col-md-4">

                            <h6>Room Number</h6>
                            <div class="form-group">
                                <input type="text" name="rmno" placeholder="Enter Room Number" id="rmno"
                                    class="form-control" required>
                            </div>

                        </div>
                   



                
                <div class="form-group mb-4 col-md-4">
                <h6>Seater</h6>
                    <select class="custom-select mr-sm-2" id="seater" name="seater" required="required">
                        <option value="">Select Seater...</option>
                        <option value="1">Single Seater</option>
                        <option value="2">Two Seater</option>
                        <option value="3">Three Seater</option>
                        <option value="4">Four Seater</option>
                        <option value="5">Five Seater</option>
                    </select>
                </div>


                <div class="col-md-4">
                <h6>Total Fees</h6>
                    <div class="form-group">
                        <input type="number" name="fee" id="fee" placeholder="Enter Total Fees" required="required"
                            class="form-control">
                    </div>
                </div>







                <div class="form-actions">
                    <div class="">
                        <button type="submit" name="submit" class="btn " style="background-color:#61DFFA;color:#FFFFFF">Insert</button>
                        <button type="reset" class="btn " style="background-color:#61DFFA;color:#FFFFFF">Reset</button>
                    </div>
                </div>

                </form>


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

</body>

</html>