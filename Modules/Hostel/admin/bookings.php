<?php
session_start();
include('../includes/dbconn.php');
include('../includes/check-login.php');
check_login();
//code for registration
if (isset($_POST['submit'])) {
    $roomno = $_POST['room'];
    $seater = $_POST['seater'];
    $feespm = $_POST['fpm'];
    $foodstatus = $_POST['foodstatus'];
    $stayfrom = $_POST['stayf'];
    $duration = $_POST['duration'];
    $course = $_POST['course'];
    $regno = $_POST['regno'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $contactno = $_POST['contact'];
    $emailid = $_POST['email'];
    $emcntno = $_POST['econtact'];
    $gurname = $_POST['gname'];
    $gurrelation = $_POST['grelation'];
    $gurcntno = $_POST['gcontact'];
    $caddress = $_POST['address'];
    $ccity = $_POST['city'];
    $cpincode = $_POST['pincode'];
    $paddress = $_POST['paddress'];
    $pcity = $_POST['pcity'];
    $ppincode = $_POST['ppincode'];
    $query = "INSERT into  roomregistration(roomno,seater,feespm,foodstatus,stayfrom,duration,course,regno,firstName,middleName,lastName,gender,contactno,emailid,egycontactno,guardianName,guardianRelation,guardianContactno,corresAddress,corresCIty,corresPincode,pmntAddress,pmntCity,pmntPincode) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($query);
    $rc = $stmt->bind_param('iiiisissssssisissississi', $roomno, $seater, $feespm, $foodstatus, $stayfrom, $duration, $course, $regno, $fname, $mname, $lname, $gender, $contactno, $emailid, $emcntno, $gurname, $gurrelation, $gurcntno, $caddress, $ccity, $cpincode, $paddress, $pcity, $ppincode);
    $stmt->execute();
    echo "<script>alert('Success: Booked!');</script>";
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>

    <link href="../dist/css/style.min.css" rel="stylesheet">

    <script>
        function getSeater(val) {
            $.ajax({
                type: "POST",
                url: "get-seater.php",
                data: 'roomid=' + val,
                success: function (data) {
                    //alert(data);
                    $('#seater').val(data);
                }
            });

            $.ajax({
                type: "POST",
                url: "get-seater.php",
                data: 'rid=' + val,
                success: function (data) {
                    //alert(data);
                    $('#fpm').val(data);
                }
            });
        }
    </script>

</head>

<body>



    <?php include('../Common/admin-sidenav-header.php') ?>


    <div class="app-content">
        <div class="app-content-header">
            <h1 class="app-content-headerText">Book Room</h1>
        </div>

        <div class="app-content-actions">

            <form method="POST" class="row g-3">

                <?php
                $stmt = $mysqli->prepare("SELECT emailid FROM roomregistration WHERE emailid=? ");
                $stmt->bind_param('s', $uid);
                $stmt->execute();
                $stmt->bind_result($email);
                $rs = $stmt->fetch();
                $stmt->close();

                if ($rs) { ?>
                    <div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show"
                        role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Info: </strong> You have already booked a hostel!
                    </div>
                <?php } else {
                    echo "";
                }
                ?>

                <div class="form-group mb-4 col-md-3">
                <h6>Room</h6>
                    <select class="custom-select mr-sm-2" name="room" id="room" onChange="getSeater(this.value);"
                        onBlur="checkAvailability()" required id="inlineFormCustomSelect">
                        <option selected>Select...</option>
                        <?php $query = "SELECT * FROM rooms";
                        $stmt2 = $mysqli->prepare($query);
                        $stmt2->execute();
                        $res = $stmt2->get_result();
                        while ($row = $res->fetch_object()) {
                            ?>
                            <option value="<?php echo $row->room_no; ?>">
                                <?php echo $row->room_no; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <span id="room-availability-status" style="font-size:12px;"></span>
                </div>





                
                <div class="form-group col-md-3">
                <h6>Start Date</h6>
                    <input type="date" name="stayf" id="stayf" class="form-control" required>
                </div>






                
                <div class="form-group col-md-3">
                <h6>Seater</h6>
                    <input type="text" id="seater" name="seater" placeholder="Enter Seater No." required
                        class="form-control">
                </div>




               
                <div class="form-group mb-4 col-md-3">
                <h6>Total Duration</h6>
                    <select class="custom-select mr-sm-2" id="duration" name="duration">
                        <option selected>Choose...</option>
                        <option value="1">One Month</option>
                        <option value="2">Two Month</option>
                        <option value="3">Three Month</option>
                        <option value="4">Four Month</option>
                        <option value="5">Five Month</option>
                        <option value="6">Six Month</option>
                        <option value="7">Seven Month</option>
                        <option value="8">Eight Month</option>
                        <option value="9">Nine Month</option>
                        <option value="10">Ten Month</option>
                        <option value="11">Eleven Month</option>
                        <option value="12">Twelve Month</option>
                    </select>
                </div>





               
                <div class="custom-control custom-radio mx-4">
                <h6>Food</h6>
                    <input type="radio" id="customRadio1" value="1" name="foodstatus" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio1">Required
                        <code>Extra &#8377;200 Per Month</code></label>
                </div>
                <div class="custom-control custom-radio mx-4">
                    <input type="radio" id="customRadio2" value="0" name="foodstatus" class="custom-control-input"
                        checked>
                    <label class="custom-control-label" for="customRadio2">Not Required</label>
                </div>
<br>




                
                <div class="form-group col-md-6">
                <h6>Total Fees Per Month</h6>
                    <input type="text" name="fpm" id="fpm" placeholder="Your total fees" class="form-control">
                </div>




               
                <div class="form-group col-md-6">
                <h6>Total Amount</h6>
                    <input type="text" name="ta" id="ta" placeholder="Total Amount here.." required
                        class="form-control">
                </div>




                <h4 class="mt-5">Student's Personal Information</h4>




               
                <div class="form-group col-md-lg-4">
                <h6>Registration Number</h6>
                    <input type="text" name="regno" id="regno" placeholder="Enter registration number"
                        class="form-control" required>
                </div>




               
                <div class="form-group col-md-4">
                <h6>First Name</h6>
                    <input type="text" name="fname" id="fname" placeholder="Enter first name" class="form-control"
                        required>
                </div>




               
                <div class="form-group col-md-4">
                <h6>Middle Name</h6>
                    <input type="text" name="mname" id="mname" placeholder="Enter middle name" class="form-control"
                        required>
                </div>




                <div class="form-group col-md-4">
                <h6>Last Name</h6>

                    <input type="text" name="lname" id="lname" placeholder="Enter last name" class="form-control"
                        required>
                </div>




                <div class="form-group col-md-4">
                <h6>Email</h6>

                    <input type="email" name="email" id="email" placeholder="Enter email address" class="form-control"
                        required>
                </div>




                <div class="form-group col-md-4">
                <h6>Gender</h6>

                    <select name="gender" class="form-control" required="required">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                </div>




                <div class="form-group col-md-4">
                <h6>Contact Number</h6>

                    <input type="number" name="contact" id="contact" placeholder="Enter contact number"
                        class="form-control" required>
                </div>





                <div class="form-group col-md-6">
                <h6>Emergency Contact Number</h6>
                    <input type="number" name="econtact" id="econtact" placeholder="Enter emergency contact number"
                        class="form-control" required>
                </div>




                <div class="form-group mb-4 col-md-6">
                <h6>Course</h6>
                    <select class="custom-select mr-sm-2" id="course" name="course">
                        <option selected>Please Select...</option>
                        <?php $query = "SELECT * FROM courses";
                        $stmt2 = $mysqli->prepare($query);
                        $stmt2->execute();
                        $res = $stmt2->get_result();
                        while ($row = $res->fetch_object()) {
                            ?>
                            <option value="<?php echo $row->course_fn; ?>">
                                <?php echo $row->course_fn; ?>&nbsp;&nbsp;(
                                <?php echo $row->course_sn; ?>)
                            </option>
                        <?php } ?>
                    </select>
                </div>




        <h4 class="mt-5">Guardian's Information</h4>



        <div class="form-group col-md-4">
        <h6>Guardian Name</h6>
            <input type="text" name="gname" id="gname" class="form-control" placeholder="Enter Guardian's Name"
                required>
        </div>




        <div class="form-group col-md-4">
        <h6>Relation</h6>
            <input type="text" name="grelation" id="grelation" required class="form-control"
                placeholder="Student's Relation with Guardian">
        </div>




        <div class="form-group col-md-4">
        <h6>Contact Number</h6>
            <input type="text" name="gcontact" id="gcontact" required class="form-control"
                placeholder="Enter Guardian's Contact No.">
        </div>



        <h4 class="mt-5">Current Address Information</h4>




        <div class="form-group">
        <h6>Address</h6>
            <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" required>
        </div>




        <div class="form-group col-md-4">
        <h6>City</h6>

            <input type="text" name="city" id="city" class="form-control" placeholder="Enter City Name" required>
        </div>




        <div class="form-group col-md-3">
        <h6>Postal Code</h6>
            <input type="text" name="pincode" id="pincode" class="form-control" placeholder="Enter Postal Code"
                required>
        </div>






        <h4 class="mt-5">Permanent Address Information</h4>





        <h6 class="card-subtitle"><code>Ignore this CHECK BOX if you have different permanent address</code> </h6>
        <fieldset class="checkbox">
            <label>
                <input type="checkbox" value="1" name="adcheck"> My permanent address is same as above!
            </label>
        </fieldset>







        <h5 class="mt-5">Please fill up the form "ONLY IF" you've different permanent address!</h5>






       
        <div class="form-group">
        <h6>Address</h6>
            <input type="text" name="paddress" id="paddress" class="form-control" placeholder="Enter Address" required>
        </div>




        
        <div class="form-group col-md-4">
        <h6>City</h6>
            <input type="text" name="pcity" id="pcity" class="form-control" placeholder="Enter City Name" required>
        </div>




      
        <div class="form-group col-md-3">
        <h6>Postal Code</h6>
            <input type="text" name="ppincode" id="ppincode" class="form-control" placeholder="Enter Postal Code"
                required>
        </div>



    </div>


    <div class="form-actions">
        <div class="text-center">
            <button type="submit" name="submit" class="btn " style="background-color:#61DFFA;color:#FFFFFF">Submit</button>
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

    <!-- Custom Ft. Script Lines -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('input[type="checkbox"]').click(function () {
                if ($(this).prop("checked") == true) {
                    $('#paddress').val($('#address').val());
                    $('#pcity').val($('#city').val());
                    $('#ppincode').val($('#pincode').val());
                }

            });
        });
    </script>

    <script>
        function checkAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check-availability.php",
                data: 'roomno=' + $("#room").val(),
                type: "POST",
                success: function (data) {
                    $("#room-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function () { }
            });
        }
    </script>


    <script type="text/javascript">

        $(document).ready(function () {
            $('#duration').keyup(function () {
                var fetch_dbid = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: "ins-amt.php?action=userid",
                    data: { userinfo: fetch_dbid },
                    success: function (data) {
                        $('.result').val(data);
                    }
                });


            })
        });
    </script>

</body>

</html>