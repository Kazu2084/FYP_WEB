<?php
session_start();
include('../includes/dbconn.php');
if (isset($_POST['submit'])) {
    $regno = $_POST['regno'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $contactno = $_POST['contact'];
    $emailid = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
    $query = "INSERT into roomRegistration(regNo,firstName,middleName,lastName,gender,contactNo,email,password) values(?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('sssssiss', $regno, $fname, $mname, $lname, $gender, $contactno, $emailid, $password);
    $stmt->execute();
    echo "<script>alert('Student has been Registered!');</script>";
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <link href="../dist/css/style.min.css" rel="stylesheet">

    <script type="text/javascript">
        function valid() {
            if (document.registration.password.value != document.registration.cpassword.value) {
                alert("Password and Confirm Password does not match");
                document.registration.cpassword.focus();
                return false;
            }
            return true;
        }
    </script>

</head>

<body>
    <?php include('../Common/admin-sidenav-header.php') ?>

    <div class="app-content">
        <div class="app-content-header">
            <h1 class="app-content-headerText">Register Student</h1>
        </div>

        <div class="app-content-actions">



            <form method="POST" class="row g-3" name="registration" onSubmit="return valid();">






                <h6>Registration Number</h6>
                <div class="form-group col-md-lg-5">
                    <input type="text" name="regno" placeholder="Enter Registration Number" id="regno"
                        class="form-control" required>
                </div>






                
                <div class="form-group col-md-4">
                <h6>First Name</h6>
                    <input type="text" name="fname" id="fname" placeholder="Enter First Name" required
                        class="form-control">
                </div>




               
                <div class="form-group col-md-4">
                <h6>Middle Name</h6>
                    <input type="text" name="mname" id="mname" placeholder="Enter Middle Name" required
                        class="form-control">
                </div>




                
                <div class="form-group col-md-4">
                <h6>Last Name</h6>
                    <input type="text" name="lname" id="lname" placeholder="Enter Middle Name" required
                        class="form-control">
                </div>




                
                <div class="form-group mb-3 col-md-3">
                <h6>Gender</h6>
                    <select class="custom-select mr-sm-2" id="gender" name="gender" required="required">
                        <option selected>Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>
                    </select>
                </div>




                
                <div class="form-group col-md-4">
                <h6>Contact Number</h6>
                    <input type="number" name="contact" id="contact" placeholder="Your Contact" required="required"
                        class="form-control">
                </div>





               
                <div class="form-group col-md-5">
                <h6>Email ID</h6>
                    <input type="email" name="email" id="email" placeholder="Your Email" onBlur="checkAvailability()"
                        required="required" class="form-control">
                    <span id="user-availability-status" style="font-size:12px;"></span>
                </div>




                
                <div class="form-group col-md-6">
                <h6>Password</h6>
                    <input type="password" name="password" id="password" placeholder="Enter Password"
                        required="required" class="form-control">
                </div>




                
                <div class="form-group col-md-6">
                <h6>Confirm Password</h6>
                    <input type="password" name="cpassword" id="cpassword" placeholder="Enter Confirmation Password"
                        required="required" class="form-control">
                </div>




        </div>


        <div class="form-actions">
            <div class="text-center">
                <button type="submit" name="submit" class="btn " style="background-color:#61DFFA;color:#FFFFFF">Register</button>
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
        function checkAvailability() {

            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check-availability.php",
                data: 'emailid=' + $("#email").val(),
                type: "POST",
                success: function (data) {
                    $("#user-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function () {
                    event.preventDefault();
                    alert('error');
                }
            });
        }
    </script>
</body>

</html>