<?php
session_start();
include('../includes/dbconn.php');
include('../includes/check-login.php');
check_login();
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
            <h1 class="app-content-headerText">Student Information</h1>
        </div>




        <div class="row">





            <?php

            $id = $_GET['id'];
            $ret = "SELECT * from roomregistration where id=?";
            $stmt = $mysqli->prepare($ret);
            $stmt->bind_param('i', $id);
            $stmt->execute(); //ok
            $res = $stmt->get_result();
            //$cnt=1;
            while ($row = $res->fetch_object()) {
                ?>


                <div>
                    <div class="col-md-5">
                        <h6>Date & Time of Registration:
                            <?php echo $row->postingDate; ?>
                        </h6>
                    </div>


                    <div class="col-md-5">
                        <h6>Registration Number :</h6>
                        <?php echo $row->regno; ?>
                    </div>


                    <div class="col-md-4">
                        <h6>Full Name :</h6>
                        <?php echo $row->firstName; ?>
                        <?php echo $row->middleName; ?>
                        <?php echo $row->lastName; ?>
                    </div>



                    <div class="col-md-4">
                        <h6>Email Address:</h6>
                        <?php echo $row->emailid; ?>
                    </div>


                    <div class="col-sm-4">
                        <h6>Contact Number :</h6>
                        <?php echo $row->contactno; ?>
                    </div>



                    <div class="col-sm-4">
                        <h6>Gender :</h6>
                        <?php echo $row->gender; ?>
                    </div>



                    <div class="col-sm-4">
                        <h6>Selected Course :</h6>
                        <?php echo $row->course; ?>
                    </div>


                    <div>
                        <h6>Emergency Contact No. :</h6>
                        <?php echo $row->egycontactno; ?>
                    </div>



                    <div>
                        <h6>Guardian Name :</h6>
                        <?php echo $row->guardianName; ?>
                    </div>



                    <div>
                        <h6>Guardian Relation :</h6>
                        <?php echo $row->guardianRelation; ?>
                    </div>


                    <div>
                        <h6>Guardian Contact No. :</h6>
                    </div>
                    <div colspan="6">
                        <?php echo $row->guardianContactno; ?>
                    </div>

                    <div>
                        <h6>Current Address:</h6>
                    </div>
                    <div colspan="2">
                        <?php echo $row->corresAddress; ?><br />
                        <?php echo $row->corresCIty; ?>,
                        <?php echo $row->corresPincode; ?><br />
                        <?php echo $row->corresState; ?>


                    </div>



                    <div>
                        <h6>Permanent Address:</h6>
                    </div>
                    <div colspan="2">
                        <?php echo $row->pmntAddress; ?><br />
                        <?php echo $row->pmntCity; ?>,
                        <?php echo $row->pmntPincode; ?><br />

                    </div>


                    <div>
                        <h6>Room no :</h6>
                        <?php echo $row->roomno; ?>
                    </div>



                    <div>
                        <h6>Starting Date :</h6>
                        <?php echo $row->stayfrom; ?>
                    </div>



                    <div>
                        <h6>Seater :</h6>
                        <?php echo $row->seater; ?>
                    </div>



                    <div>
                        <h6>Duration:</h6>
                        <?php echo $dr = $row->duration; ?> Months
                    </div>



                    <div>
                        <h6>Food Status:</h6>
                        <?php if ($row->foodstatus == 0) {
                            echo "Not Required";
                        } else {
                            echo "Required";
                        }
                        ; ?>
                    </div>



                    <div>
                        <h6>Fees Per Month :</h6>$
                        <?php echo $fpm = $row->feespm; ?>
                    </div>




                    <div>
                        <div colspan="6">
                            <h6>Total Fees (
                                <?php echo ($dr) . ' months' ?>) :
                                <?php if ($row->foodstatus == 1) {
                                    $fd = 211;
                                    echo '&#8377;' . (($fd + $fpm) * $dr);
                                } else {
                                    echo '&#8377;' . $dr * $fpm;
                                }
                                ?>
                            </h6>
                        </div>
                    </div>





                <?php } ?>


            </div>


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

</body>

</html>