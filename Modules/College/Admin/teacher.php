<?php
session_start();
if (!$_SESSION["LoginAdmin"]) {
	header('location:../../../Login/index.html');
}
require_once "../../../Connection/connection.php";


$_SESSION['LoginTeacher'] = "";
?>


<!--*********************** PHP code starts from here for data insertion into database ******************************* -->
<?php
if (isset($_POST['btn_save'])) {

	$first_name = $_POST["first_name"];

	$middle_name = $_POST["middle_name"];

	$last_name = $_POST["last_name"];

	$email = $_POST["email"];

	$phone_no = $_POST["phone_no"];

	$teacher_status = $_POST["teacher_status"];

	$application_status = $_POST["application_status"];

	$dob = $_POST["dob"];

	$other_phone = $_POST["other_phone"];

	$gender = $_POST["gender"];

	$permanent_address = $_POST["permanent_address"];

	$current_address = $_POST["current_address"];

	$place_of_birth = $_POST["place_of_birth"];

	$date = date("d-m-y");

	$password = $_POST['password'];

	$role = "teacher";




	$query = "Insert into teacher_info(first_name,middle_name,last_name,email,phone_no,teacher_status,application_status,dob,other_phone,gender,permanent_address,current_address,place_of_birth,hire_date)values('$first_name','$middle_name','$last_name','$email','$phone_no','$teacher_status','$application_status','$dob','$other_phone','$gender','$permanent_address','$current_address','$place_of_birth','$date')";
	$run = mysqli_query($con, $query);
	if ($run) {
		?><script>alert("Your Data has been submitted");</script><?php
	} else {
		?><script>alert("Your Data has not been submitted");</script><?php
	}
	$query2 = "insert into login(username,Password,Role)values('$email','$password','$role')";
	$run2 = mysqli_query($con, $query2);
	if ($run2) {
		?><script>alert("Your Data has been submitted into login");</script><?php
	} else {
		?><script>alert("Your Data has not been submitted into login");</script><?php
	}
}
?>


<?php
if (isset($_POST['btn_save2'])) {
	$course_code = $_POST['course_code'];

	$semester = $_POST['semester'];

	$teacher_id = $_POST['teacher_id'];

	$subject_code = $_POST['subject_code'];

	$total_classes = $_POST['total_classes'];

	$date = date("d-m-y");

	$query3 = "insert into teacher_courses(course_code,semester,teacher_id,subject_code,assign_date,total_classes)values('$course_code','$semester','$teacher_id','$subject_code','$date','$total_classes')";
	$run3 = mysqli_query($con, $query3);
	if ($run3) {
		?><script>alert("Your Data has been submitted");</script><?php
	} else {
		?><script>alert("Your Data has not been submitted");</script><?php
	}


}
?>


<?php include ('../Common/admin-sidenav-header.php') ?>

<div class="app-content">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Teacher</h1>
		<button style="float:right" type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".bd-example-modal-lg">Add Teacher</button>
		<button type="button" class="btn btn-primary" data-toggle="modal"
								data-target=".bd-example-modal-lg1">Assign Subjects</button>
	</div>

	<div class="app-content-actions">

	
				<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
					aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header ">
								<h4 class="modal-title text-center">Add New Teacher</h4>
							</div>
							<div class="modal-body">
								<form action="teacher.php" method="post" enctype="multipart/form-data">
									<div class="row mt-3">
										<div class="col-md-4">
											<div class="form-group">
												<label for="exampleInputEmail1">First Name: </label>
												<input type="text" name="first_name" class="form-control" required=""
													placeholder="First Name">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="exampleInputEmail1">Middle Name: </label>
												<input type="text" name="middle_name" class="form-control" required=""
													placeholder="Middle Name">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="exampleInputEmail1">Last Name: </label>
												<input type="text" name="last_name" class="form-control" required=""
													placeholder="Last Name">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="formp">
												<label for="exampleInputPassword1">Teacher Email:</label>
												<input type="text" name="email" class="form-control" required=""
													placeholder="Enter Email">
											</div>
										</div>
										<div class="col-md-4">
											<div class="formp">
												<label for="exampleInputPassword1">Mobile No</label>
												<input type="number" name="phone_no" class="form-control"
													placeholder="Enter Mobile Number">
											</div>
										</div>
										
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label for="exampleInputEmail1">Teacher Status: </label>
												<select class="browser-default custom-select" name="teacher_status">
													<option selected>Select Status</option>
													<option value="Permanent">Permanent</option>
													<option value="Contract">Contract</option>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="formp">
												<label for="exampleInputPassword1">Application Status:</label>
												<select class="browser-default custom-select" name="application_status">
													<option>Select Status</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
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
											<div class="formp">
												<label for="exampleInputPassword1">Other Phone:</label>
												<input type="number" name="other_phone" class="form-control"
													placeholder="Other Phone No">
											</div>
										</div>
										<div class="col-md-4">
											<div class="formp">
												<label for="exampleInputPassword1">Gender:</label>
												<select class="browser-default custom-select" name="gender">
													<option selected>Select Gender</option>
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
												<input type="text" name="permanent_address" class="form-control"
													placeholder="Enter Permanent Address">
											</div>
										</div>
										<div class="col-md-4">
											<div class="formp">
												<label for="exampleInputPassword1">Current Address:</label>
												<input type="text" name="current_address" class="form-control"
													placeholder="Enter Current Address">
											</div>
										</div>
										<div class="col-md-4">
											<div class="formp">
												<label for="exampleInputPassword1">Place of Birth:</label>
												<input type="text" name="place_of_birth" class="form-control"
													placeholder="Enter Place of Birth">
											</div>
										</div>
									</div>
									
									<div>
										<input type="hidden" name="password" value="pass">
										<input type="hidden" name="role" value="Teacher">
									</div>
								
									<div class="modal-footer">
										<input type="submit" class="btn btn-primary" name="btn_save" value="Save Data">
										<button type="button" class="btn btn-secondary"
											data-dismiss="modal">Close</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			
		<div class="row w-100">
			<div class="col-md-12 ml-2">
				<section class="mt-3">
					<div class="row">
						<div class="col-md-3 offset-9 pt-5 mb-2">
							<!-- Large modal -->
							<!-- <button type="button" class="btn btn-primary" data-toggle="modal"
								data-target=".bd-example-modal-lg1">Assign Subjects</button> -->
							<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog"
								aria-labelledby="myLargeModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header ">
											<h4 class="modal-title text-center">Assign Subjects To Teachers</h4>
										</div>
										<div class="modal-body">
											<form action="teacher.php" method="POST" enctype="multipart/form-data">
												<div class="row mt-3">
													<div class="col-md-6">
														<div class="form-group">
															<label for="exampleInputEmail1">Select Course:*</label>
															<select class="browser-default custom-select"
																name="course_code" required="">
																<option>Select Course</option>
																<?php
																$query = "select distinct(course_code) from time_table";
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
															<label for="exampleInputPassword1">Enter Teacher
																Id:*</label>
															<input type="text" name="teacher_id" class="form-control"
																required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="exampleInputPassword1">Please Select
																Subject:*</label>
															<select class="browser-default custom-select"
																name="subject_code" required="">
																<option>Select Subject</option>
																<?php
																$query = "select subject_code from time_table";
																$run = mysqli_query($con, $query);
																while ($row = mysqli_fetch_array($run)) {
																	echo "<option value=" . $row['subject_code'] . ">" . $row['subject_code'] . "</option>";
																}
																?>
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="exampleInputPassword1">Enter Total
																Classes:*</label>
															<input type="text" name="total_classes" class="form-control"
																required>
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
							<div class="product-cell">Teacher ID</div>
							<div class="product-cell">Teacher Name</div>
							<div class="product-cell">Current Address</div>
							<div class="product-cell">Hire Date</div>
							<div class="product-cell">Email</div>
							<div class="product-cell">Operations</div>
						</div>
						<?php
						$query = "select teacher_id,first_name,middle_name,last_name,current_address,hire_date,email from teacher_info";
						$run = mysqli_query($con, $query);
						while ($row = mysqli_fetch_array($run)) {
							echo "<div class='products-row'>";
							echo "<div class='product-cell'><span>" . $row["teacher_id"] . "</span></div>";
							echo "<div class='product-cell'><span>" . $row["first_name"] . " " . $row["middle_name"] . " " . $row["last_name"] . "</span></div>";
							echo "<div class='product-cell'><span>" . $row["current_address"] . "</span></div>";
							echo "<div class='product-cell'><span>" . $row["hire_date"] . "</span></div>";
							echo "<div class='product-cell'><span>" . $row["email"] . "</span></div>";
							echo "<div class='product-cell'><span><a class='btn btn-primary' href=display-teacher.php?teacher_id=" . $row['teacher_id'] . ">Profile</a> <a class='btn btn-danger' href=delete-function.php?teacher_id=" . $row['teacher_id'] . ">Delete</a></span></div>";
							echo "</div>";
						}
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