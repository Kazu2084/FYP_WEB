<!---------------- Session starts form here ----------------------->
<?php
session_start();
if (!$_SESSION["LoginAdmin"]) {
	header('location:../login/login.php');
}
require_once "../connection/connection.php";
?>
<!---------------- Session Ends form here ------------------------>

<?php
$message = "";
$success_message = "";
$error_message = "";
if (isset($_POST['sub'])) {
	$count = $_POST['count'];
	for ($i = 0; $i < $count; $i++) {
		$date = date("d-m-y");
		$que = "insert into class_result(roll_no,course_code,subject_code,semester,total_marks,obtain_marks,result_date) values('" . $_POST['roll_no'][$i] . "','" . $_POST['course_code'][$i] . "','" . $_POST['subject_code'][$i] . "','" . $_POST['semester'][$i] . "','" . $_POST['total_marks'][$i] . "','" . $_POST['obtain_marks'][$i] . "','$date')";
		$run = mysqli_query($con, $que);
		if ($run) {
			$success_message = "All Results Has Been Submitted Successfully";
		} else {
			$error_message = "All Results Has Not Been Submitted Successfully";
		}
	}
}

?>


<?php include('../Common/admin-sidenav-header.php') ?>

<!-- <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>Result Management System </h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-12">
							<?php
							// if($success_message==true){
							// 	$bg_color = "alert-success";
							// 	$message = $success_message;
							// }
							// else if($error_message==true){
							// 	$bg_color = "alert-danger";	
							// 	$message = $error_message;
							// }
							?>
							
								
								<?php //echo $message   ?>
							</h5>
						</div> -->

<div class="app-content">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Result</h1>
		<a class="btn btn-primary" href="add-single-student-results.php">Single Student
			Result</a>
	</div>

	<div class="app-content-actions">
		<form action="class-result.php" method="post">
			<div class="row mt-2">
				<div class="col-md-4">
					<div class="form-group" style="z-index: 10;">
						<label>Select Course:</label>
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
				<div class="col-md-1">
					<div class="form-group">
						<label>Select Subject:</label>
						<div>
							<select class="browser-default custom-select" name="subject_code" required="">
								<option>Select Subject</option>
								<?php
								$query = "select subject_code,subject_name from course_subjects";
								$run = mysqli_query($con, $query);
								while ($row = mysqli_fetch_array($run)) {
									echo "<option value=" . $row['subject_code'] . ">" . $row['subject_name'] . "</option>";
								}
								?>
							</select>
						</div>
					</div>
				</div>
				<br>
				<br><br>
				<div class="col-md-4">
					<input type="submit" name="submit" class="btn btn-primary px-5" value="Submit">
				</div>
		</form>
		<br><br>
<div></div>


		<div class="products-area-wrapper tableView">
		

			<div class="products-header">

				<div class="product-cell">Sr.No</div>
				<div class="product-cell">Roll No</div>
				<div class="product-cell">Cource Name</div>
				<div class="product-cell">Subject Name</div>
				<div class="product-cell">Semester</div>
				<div class="product-cell">Student Name</div>
				<div class="product-cell">Total Marks</div>
				<div class="product-cell">Obtain Marks</div>
			</div>

			<?php
			$i = 1;
			$count = 0;
			if (isset($_POST['submit'])) {
				$course_code = $_POST['course_code'];
				$semester = $_POST['semester'];
				$subject_code = $_POST['subject_code'];


				$que = "select student_info.roll_no,first_name,middle_name,last_name,student_courses.semester,student_courses.course_code,subject_code from student_courses inner join student_info on student_info.roll_no=student_courses.roll_no where student_courses.course_code='$course_code' and student_courses.semester='$semester' and student_courses.subject_code='$subject_code'";
				$run = mysqli_query($con, $que);
				while ($row = mysqli_fetch_array($run)) {
					$count++;
					?>
					<form action="class-result.php" method="post">
						<div class="products-row">
							<div class="product-cell"><span>
									<?php echo $i++ ?>
								</span></div>
							<div class="product-cell"><span>
									<?php echo $row['roll_no'] ?>
								</span></div>
							<input type="hidden" name="roll_no[]" value=<?php echo $row['roll_no'] ?>>
							<div class="product-cell"><span>
									<?php echo $row['course_code'] ?>
								</span></div>
							<input type="hidden" name="course_code[]" value=<?php echo $row['course_code'] ?>>
							<div class="product-cell"><span>
									<?php echo $row['subject_code'] ?>
								</span></div>
							<input type="hidden" name="subject_code[]" value=<?php echo $row['subject_code'] ?>>
							<div class="product-cell"><span>
									<?php echo $row['semester'] ?>
								</span></div>
							<input type="hidden" name="semester[]" value=<?php echo $row['semester'] ?>>
							<div class="product-cell"><span>
									<?php echo $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'] ?>
								</span></div>
							<div class="product-cell"><span>
									<?php echo "100" ?>
								</span></div>
							<input type="hidden" name="total_marks[]" value="100">
							<div class="product-cell"><span><input type="text" name="obtain_marks[]"
										placeholder="Plz Enter Obtain Marks" class="form-control"></span></div>
							<input type="hidden" name="count" value="<?php echo $count ?>">
						</div>
						<?php
				}
			}
			?>
			<br>
				<input type="submit" name="sub" class="btn btn-success">

			</form>
		</div>
	</div>
	</section>
</div>
</div>
</div>
</main>
</body>

</html>