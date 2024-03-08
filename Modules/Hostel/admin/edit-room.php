<?php
session_start();
include('../includes/dbconn.php');
include('../includes/check-login.php');
check_login();

if (isset($_POST['submit'])) {
    $seater = $_POST['seater'];
    $fees = $_POST['fees'];
    $id = $_GET['id'];
    $query = "UPDATE rooms set seater=?,fees=? where id=?";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('iii', $seater, $fees, $id);
    $stmt->execute();
    echo "<script>alert('Room details has been updated');
        window.location.href='manage-rooms.php';
        </script>";
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
            <h1 class="app-content-headerText">Edit Room Information</h1>
        </div>

        <div class="app-content-actions">
            <div class="container-fluid">
                <form method="POST">
                    <div class="row">


                        <?php
                        $id = $_GET['id'];
                        $ret = "SELECT * from rooms where id=?";
                        $stmt = $mysqli->prepare($ret);
                        $stmt->bind_param('i', $id);
                        $stmt->execute(); //ok
                        $res = $stmt->get_result();
                        //$cnt=1;
                        while ($row = $res->fetch_object()) {
                            ?>


                            <div class="col-md-4">

                                <h6>Room Number</h6>
                                <div class="form-group">
                                    <input type="text" name="rmno" value="<?php echo $row->room_no; ?>" id="rmno"
                                        class="form-control" disabled>
                                </div>

                            </div>
                       



                <div class="col-md-4">

                    <h6>Seater</h6>
                    <div class="form-group mb-4">
                        <select class="custom-select mr-sm-2" id="seater" name="seater" required="required">
                            <option value="<?php echo $row->seater; ?>">
                                <?php echo $row->seater; ?>
                            </option>
                            <option value="1">Single Seater</option>
                            <option value="2">Two Seater</option>
                            <option value="3">Three Seater</option>
                            <option value="4">Four Seater</option>
                            <option value="5">Five Seater</option>
                        </select>
                    </div>
                </div>
        



            <div class="col-md-4">

                <h6>Total Fees</h6>
                <div class="form-group">
                    <input type="number" name="fees" id="fees" value="<?php echo $row->fees; ?>" class="form-control">
                </div>
            </div>

            <div class="form-actions">
                <div class="text-center">
                    <button type="submit" name="submit" class="btn "
                        style="background-color:#61DFFA;color:#FFFFFF">Update</button>
                    <button type="reset" class="btn " style="background-color:#61DFFA;color:#FFFFFF">Reset</button>
                </div>
            </div>

        <?php } ?>






        </form>


    </div>

    <?php //include '../includes/footer.php' ?>

    </div>

    </div>

    <!-- <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
   
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    
    <script src="../dist/js/custom.min.js"></script>
    
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.min.js"></script> -->

</body>

</html>