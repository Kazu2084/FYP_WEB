<?php
session_start();
if (!$_SESSION["LoginAdmin"]) {
	header('location:../../../Login/index.html');
}
require_once "../../../Connection/connection.php";
?>


<?php

if (isset($_POST['btn_save'])) {

	$course_code = $_POST["course_code"];

	$semester = $_POST["semester"];

	$timing_from = $_POST["timing_from"];

	$timing_to = $_POST["timing_to"];

	$day = $_POST["day"];

	$subject_code = $_POST["subject_code"];

	$room_no = $_POST["room_no"];

	$query = "insert into time_table(course_code,semester,timing_from,timing_to,day,subject_code,room_no)values('$course_code','$semester','$timing_from','$timing_to','$day','$subject_code','$room_no')";
	$run = mysqli_query($con, $query);
	if ($run) {
		//echo "Your Data has been submitted";
	} else {
		//echo "Your Data has not been submitted";
	}
}
?>

<!-- ---------------------------------------update time table------------------------------------------------ -->
<?php

if (isset($_POST['btn_update'])) {

	echo $course_code = $_POST["course_code"];

	echo $semester = $_POST["semester"];

	echo $timing_from = $_POST["timing_from"];

	echo $timing_to = $_POST["timing_to"];

	echo $day = $_POST["day"];

	echo $subject_code = $_POST["subject_code"];

	echo $room_no = $_POST["room_no"];

	$query1 = "update time_table set course_code='$course_code',semester='$semester',timing_from='$timing_from',timing_to='$timing_to',day='$day',subject_code='$subject_code',room_no='$room_no' where subject_code='$subject_code'";
	$run1 = mysqli_query($con, $query1);
	if ($run1) {
		//echo "Your Data has been updated";
	} else {
		//echo "Your Data has not been updated";
	}
}
?>
<!doctype html>
<html lang="en">

<head>
	<title>Admin - Time Table</title>
</head>

<body>
	<?php include ('../Common/admin-sidenav-header.php') ?>



	<div class="app-content">
		<div class="app-content-header">
			<h1 class="app-content-headerText">Result</h1>
			<button style="text-align: right; float:right" type="button" class="btn btn-primary ml-5" data-toggle="modal"
				data-target=".bd-example-modal-lg">Add Time Table</button>

			<button type="button" style="text-align: left; float:left" class="btn btn-primary" data-toggle="modal"
				data-target=".bd-example-modal-lg1">Update</button>



		</div>

		<div class="app-content-actions">

			<!-- Large modal -->
			<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
				aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header ">
							<h4 class="modal-title text-center">Update Time Table</h4>
						</div>
						<div class="modal-body">
							<form action="time-table.php" method="post">
								<div class="row mt-3">
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Course Code: </label>
											<select class="browser-default custom-select" name="course_code">
												<option>Select Course</option>
												<?php
												$query = "select distinct(course_code) as course_code from time_table";
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
											<label for="exampleInputEmail1">Semester Or
												Years:</label>
											<select class="browser-default custom-select" name="semester">
												<option>Select Class Semester</option>
												<?php
												$query = "select distinct(semester) as semester from time_table";
												$run = mysqli_query($con, $query);
												while ($row = mysqli_fetch_array($run)) {
													echo "<option value=" . $row['semester'] . ">" . $row['semester'] . "</option>";
												}
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Timing From: </label>
											<input type="time" name="timing_from" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="formp">
											<label for="exampleInputPassword1">Timing To:</label>
											<input type="time" name="timing_to" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Lecture Day: </label>
											<select class="browser-default custom-select" name="day">
												<option>Select Week Day</option>
												<?php
												$teacher_id = $_SESSION['teacher_id'];
												$query = "select * from weekdays";
												$run = mysqli_query($con, $query);
												while ($row = mysqli_fetch_array($run)) {
													echo "<option value=" . $row['day_id'] . ">" . $row['day_name'] . "</option>";
												}
												?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="formp">
											<label for="exampleInputPassword1">Please Select
												Subject:*</label>
											<select class="browser-default custom-select" name="subject_code"
												required="">
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
										<div class="formp">
											<label for="exampleInputPassword1">Enter Room
												No:</label>
											<input type="text" name="room_no" class="form-control"
												placeholder="Room No">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<input type="submit" class="btn btn-primary" name="btn_update" value="Update Data">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<!-- Large modal -->
			<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
				aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header ">
							<h4 class="modal-title text-center">Add Time Table</h4>
						</div>
						<div class="modal-body">
							<form action="time-table.php" method="post">
								<div class="row mt-3">
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Course Code: </label>
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
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Select Semester:</label>
											<select class="browser-default custom-select" name="semester">
												<option>Select Semester</option>
												<?php
												$teacher_id = $_SESSION['teacher_id'];
												$query = "select distinct(semester) as semester from course_subjects";
												$run = mysqli_query($con, $query);
												while ($row = mysqli_fetch_array($run)) {
													echo "<option value=" . $row['semester'] . ">" . $row['semester'] . "</option>";
												}
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Timing From: </label>
											<input type="time" name="timing_from" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="formp">
											<label for="exampleInputPassword1">Timing To:</label>
											<input type="time" name="timing_to" class="form-control">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Lecture Day: </label>
											<select class="browser-default custom-select" name="day">
												<option>Select Week Day</option>
												<?php
												$teacher_id = $_SESSION['teacher_id'];
												$query = "select * from weekdays";
												$run = mysqli_query($con, $query);
												while ($row = mysqli_fetch_array($run)) {
													echo "<option value=" . $row['day_id'] . ">" . $row['day_name'] . "</option>";
												}
												?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="formp">
											<label for="exampleInputPassword1">Please Select Subject:*</label>
											<select class="browser-default custom-select" name="subject_code"
												required="">
												<option>Select Subject</option>
												<?php
												$query = "select * from course_subjects";
												$run = mysqli_query($con, $query);
												while ($row = mysqli_fetch_array($run)) {
													echo "<option value=" . $row['subject_code'] . ">" . $row['subject_name'] . "</option>";
												}
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="formp">
											<label for="exampleInputPassword1">Enter Room No:</label>
											<input type="text" name="room_no" class="form-control"
												placeholder="Room No">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<input type="submit" class="btn btn-primary" name="btn_save" value="Save Data">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="products-area-wrapper tableView">


			<div class="products-header">
				<div class="product-cell">ID</div>
				<div class="product-cell">Class Name</div>
				<div class="product-cell">Timming</div>
				<div class="product-cell">Day</div>
				<div class="product-cell">Subject</div>
				<div class="product-cell">Room No</div>
			</div>
			<?php
			$query = "select id,course_code,TIME_FORMAT(timing_from,'%h:%i %p') as timing_from,TIME_FORMAT(timing_to,'%h:%i %p') as timing_to,semester,day_name,day_id,day,subject_code,room_no from time_table tt inner join weekdays wd on tt.day=wd.day_id";
			$run = mysqli_query($con, $query);
			while ($row = mysqli_fetch_array($run)) {
				echo "	<div class='products-row'>";
				echo "<div class='product-cell'><span>" . $row["id"] . "</span></div>";
				echo "<div class='product-cell'><span>" . $row["course_code"] . " " . $row["semester"] . "</span></div>";
				echo "<div class='product-cell'><span>" . $row["timing_from"] . "<br>" . $row["timing_to"] . "</span></div>";
				echo "<div class='product-cell'><span>" . $row["day_name"] . "</span></div>";
				echo "<div class='product-cell'><span>" . $row["subject_code"] . "</span></div>";
				echo "<div class='product-cell'><span>" . $row["room_no"] . "</span></div>";
				echo "</div>";
			}
			?>
		</div>
	</div>
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