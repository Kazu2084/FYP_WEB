<?php
session_start();
if (!$_SESSION["LoginAdmin"]) {
    header('location:../../../Login/index.html');
}
require_once "../../../Connection/connection.php";
$_SESSION["LoginStudent"] = "";
?>


<?php
if (isset($_POST['btn_save'])) {

    $roll_no = $_POST["roll_no"];

    $first_name = $_POST["first_name"];

    $middle_name = $_POST["middle_name"];

    $last_name = $_POST["last_name"];

    $father_name = $_POST["father_name"];

    $email = $_POST["email"];

    $mobile_no = $_POST["mobile_no"];

    $course_code = $_POST['course_code'];

    $prospectus_issued = $_POST["prospectus_issued"];

    $applicant_status = $_POST["applicant_status"];

    $application_status = $_POST["application_status"];

    $dob = $_POST["dob"];

    $gender = $_POST["gender"];

    $permanent_address = $_POST["permanent_address"];

    $current_address = $_POST["current_address"];

    $place_of_birth = $_POST["place_of_birth"];

    $password = $_POST['password'];

    $role = "student";


    $query = "Insert into student_info(roll_no,first_name,middle_name,last_name,father_name,email,mobile_no,course_code,prospectus_issued,applicant_status,application_status,dob,gender,permanent_address,current_address,place_of_birth)values('$roll_no','$first_name','$middle_name','$last_name','$father_name','$email','$mobile_no','$course_code','$prospectus_issued','$applicant_status','$application_status','$dob','$gender','$permanent_address','$current_address','$place_of_birth')";

    $run = mysqli_query($con, $query);
    if ($run) {
        ?>
        <script>alert("Your Data has been submitted");</script>
        <?php
    } else {
        ?>
        <script>alert("Your Data has not been submitted");</script>
        <?php
    }
    $query2 = "insert into login(username, password, role)values('$email','$password','$role')";
    $run2 = mysqli_query($con, $query2);
    if ($run2) {
        ?>
        <script>alert("Your Data has been submitted into login");</script>
        <?php
    } else {
        ?>
        <script>alert("Your Data has not been submitted into login");</script>
        <?php
    }
}
?>


<?php
if (isset($_POST['btn_save2'])) {
    $course_code = $_POST['course_code'];

    $semester = $_POST['semester'];

    $roll_no = $_POST['roll_no'];

    $subject_code = $_POST['subject_code'];

    $date = date("d-m-y");

    $query3 = "insert into student_courses(course_code,semester,roll_no,subject_code,assign_date)values('$course_code','$semester','$roll_no','$subject_code','$date')";
    $run3 = mysqli_query($con, $query3);
    if ($run3) {
        ?>
        <script>alert("Your Data has been submitted");</script>
        <?php
    } else {
        ?>
        <script>alert("Your Data has not been submitted");</script>
        <?php
    }


}
?>


<?php include ('../Common/admin-sidenav-header.php') ?>

<div class="app-content">
    <div class="app-content-header">
        <h1 class="app-content-headerText">Student</h1>
    </div>

    <div class="app-content-actions">

        <div class="modal fade bd-example-modal-lg" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header ">
                        <h4 class="modal-title text-center">Add New Student</h4>
                    </div>
                    <div class="modal-body">
                        <form action="student.php" method="POST" enctype="multipart/form-data">
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Applicant First Name:*</label>
                                        <input type="text" name="first_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Applicant Middle Name:</label>
                                        <input type="text" name="middle_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" required>Applicant Last
                                            Name:*</label>
                                        <input type="text" name="last_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Father Name:*</label>
                                        <input type="text" name="father_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Student Roll No:</label>
                                        <input type="text" name="roll_no" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Applicant Email:*</label>
                                        <input type="email" name="email" class="form-control"
                                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Course which you want?: </label>
                                        <select class="browser-default custom-select" name="course_code">
                                            <option>Select Course</option>
                                            <?php

                                            $query = "select course_code from courses";
                                            $run = mysqli_query($con, $query);
                                            while ($row = mysqli_fetch_array($run)) {
                                                echo "<option value=" . $row['course_code'] . ">" . $row['course_code'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Prospectus Issude: </label>
                                        <select class="browser-default custom-select" name="prospectus_issued">
                                            <option>Select Option</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Prospectus Amount Recvd:</label>
                                        <select class="browser-default custom-select" name="prospectus_amount">
                                            <option>Select Option</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Applicant Status: </label>
                                        <select class="browser-default custom-select" name="applicant_status">
                                            <option>Select Option</option>
                                            <option value="Admitted">Admitted</option>
                                            <option value="Not Admitted">Not Admitted</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Application Status:</label>
                                        <select class="browser-default custom-select" name="application_status">
                                            <option>Select Option</option>
                                            <option value="Approved">Approved</option>
                                            <option value="Not Approved">Not Approved</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Date of Birth: </label>
                                        <input type="date" name="dob" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mobile No:*</label>
                                        <input type="number" name="mobile_no" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Gender:</label>
                                        <select class="browser-default custom-select" name="gender">
                                            <option>Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Permanent Address: </label>
                                        <input type="text" name="permanent_address" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Current Address:</label>
                                        <input type="text" name="current_address" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Place of Birth:</label>
                                        <input type="text" name="place_of_birth" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div>
                                <input type="hidden" name="password" value="pass">
                                <input type="hidden" name="role" value="Student">
                            </div>

                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" name="btn_save">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row w-100">
        <div class="col-md-12 ml-2">
            <section>
                <div class="row">
                   
                    <div class="col-md-12 pt-2 mb-2">

                        <button type="button" class="btn btn-primary " data-toggle="modal"
                            data-target=".bd-example-modal-lg">Add Student</button>
                        <button type="button" class="btn btn-primary ml-auto" data-toggle="modal"
                            data-target=".bd-example-modal-lg1">Assign Subjects</button>
                        <a class="btn btn-primary" href="assign-single-student-subjects.php"> Assign Single
                            Student Subject</a>
                        <div class="modal fade bd-example-modal-lg1" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header ">
                                        <h4 class="modal-title text-center">Assign Subjects To Student</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="student.php" method="POST" enctype="multipart/form-data">
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Select Course:*</label>
                                                        <select class="browser-default custom-select" name="course_code"
                                                            required="">
                                                            <option>Select Course</option>
                                                            <?php
                                                            $query = "select course_code from courses";
                                                            $run = mysqli_query($con, $query);
                                                            while ($row = mysqli_fetch_array($run)) {
                                                                echo "<option value=" . $row['course_code'] . ">" . $row['course_code'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1" required>Enter
                                                            Semester:*</label>
                                                        <input type="text" name="semester" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Enter Roll
                                                            No:*</label>
                                                        <input type="text" name="roll_no" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Select
                                                            Subject:*</label>
                                                        <select class="browser-default custom-select"
                                                            name="subject_code" required="">
                                                            <option>Select Subject</option>
                                                            <?php
                                                            $query = "select subject_code from course_subjects";
                                                            $run = mysqli_query($con, $query);
                                                            while ($row = mysqli_fetch_array($run)) {
                                                                echo "<option value=" . $row['subject_code'] . ">" . $row['subject_code'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" class="btn btn-primary" name="btn_save2">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="products-area-wrapper tableView">


                    <div class="products-header">
                        <div class="product-cell">Roll.No</div>
                        <div class="product-cell">Student Name</div>
                        <div class="product-cell">Current Address</div>

                        <div class="product-cell">Course ID</div>
                        <div class="product-cell">Admission</div>

                        <div class="product-cell">Operations</div>
                        </div>
                        <?php
                        $query = "select first_name,middle_name,admission_date,last_name,current_address,roll_no,course_code from student_info";
                        $run = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($run)) { ?>
                           <div class="products-row">
                               <div class="product-cell"><span>
                                    <?php echo $row["roll_no"] ?>
                               </span></div>
                               <div class="product-cell"><span>
                                    <?php echo $row["first_name"] . " " . $row["middle_name"] . " " . $row["last_name"] ?>
                               </span></div>
                               <div class="product-cell"><span>
                                    <?php echo $row["current_address"] ?>
                               </span></div>

                               <div class="product-cell"><span>
                                    <?php echo $row["course_code"] ?>
                               </span></div>

                               <div class="product-cell"><span>
                                    <?php echo date("Y-M-d", strtotime($row["admission_date"])); ?>
                               </span></div>

                                <div class="product-cell"><span>
                                    <?php
                                    echo " 
												<a class='btn btn-danger' href=delete-function.php?roll_no=" . $row['roll_no'] . ">Delete</a> "
                                        ?>
                               </span></div>
                            </div>
                        <?php }
                        ?>
                      </div>
            </section>
        </div>
    </div>
</div>
</main>
<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>