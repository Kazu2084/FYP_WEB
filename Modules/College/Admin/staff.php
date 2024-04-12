<?php
session_start();
if (!$_SESSION["LoginAdmin"]) {
	header('location:../../../Login/index.html');
}
require_once "../../../Connection/connection.php";


$_SESSION['LoginStaff'] = "";
?>


<!--*********************** PHP code starts from here for data insertion into database ******************************* -->
<?php
if (isset($_POST['btn_save'])) {

	$first_name = $_POST["first_name"];

	$middle_name = $_POST["middle_name"];

	$last_name = $_POST["last_name"];

	$email = $_POST["email"];

	$phone_no = $_POST["phone_no"];

	$staff_status = $_POST["staff_status"];

	$application_status = $_POST["application_status"];

	$dob = $_POST["dob"];

	$other_phone = $_POST["other_phone"];

	$gender = $_POST["gender"];

	$permanent_address = $_POST["permanent_address"];

	$current_address = $_POST["current_address"];

	$place_of_birth = $_POST["place_of_birth"];

	$date = date("d-m-y");

	$password = $_POST['password'];

	$role = "staff";




	$query = "Insert into staff_info(first_name,middle_name,last_name,email,phone_no,staff_status,application_status,dob,other_phone,gender,permanent_address,current_address,place_of_birth,hire_date)values('$first_name','$middle_name','$last_name','$email','$phone_no','$staff_status','$application_status','$dob','$other_phone','$gender','$permanent_address','$current_address','$place_of_birth','$date')";
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





<?php include ('../Common/admin-sidenav-header.php') ?>

<div class="app-content">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Staff</h1>
		<button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".bd-example-modal-lg">Add Staff</button>
	</div>

	<div class="app-content-actions">

	
				<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
					aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header ">
								<h4 class="modal-title text-center">Add New Staff</h4>
							</div>
							<div class="modal-body">
								<form action="staff.php" method="post" enctype="multipart/form-data">
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
												<label for="exampleInputPassword1">Staff Email:</label>
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
												<label for="exampleInputEmail1">Staff Status: </label>
												<select class="browser-default custom-select" name="staff_status">
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
										<input type="hidden" name="role" value="staff">
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
					
					<div class="products-area-wrapper tableView">
						<div class="products-header">
							<div class="product-cell">Staff ID</div>
							<div class="product-cell">Staff Name</div>
							<div class="product-cell">Current Address</div>
							<div class="product-cell">Hire Date</div>
							<div class="product-cell">Email</div>
							<div class="product-cell">Operations</div>
						</div>
						<?php
						$query = "select staff_id,first_name,middle_name,last_name,current_address,hire_date,email from staff_info";
						$run = mysqli_query($con, $query);
						while ($row = mysqli_fetch_array($run)) {
							echo "<div class='products-row'>";
							echo "<div class='product-cell'><span>" . $row["staff_id"] . "</span></div>";
							echo "<div class='product-cell'><span>" . $row["first_name"] . " " . $row["middle_name"] . " " . $row["last_name"] . "</span></div>";
							echo "<div class='product-cell'><span>" . $row["current_address"] . "</span></div>";
							echo "<div class='product-cell'><span>" . $row["hire_date"] . "</span></div>";
							echo "<div class='product-cell'><span>" . $row["email"] . "</span></div>";
							echo "<div class='product-cell'><span><a class='btn btn-primary' href=display-staff.php?staff_id=" . $row['staff_id'] . ">Profile</a> <a class='btn btn-danger' href=delete-function.php?staff_id=" . $row['staff_id'] . ">Delete</a></span></div>";
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