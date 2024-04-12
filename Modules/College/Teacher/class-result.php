
<?php
// session_start();
// if (!$_SESSION["LoginTeacher"]) {
// 	header('location:../login/login.php');
// }
 require_once "../../../Connection/connection.php";
?>


<?php
if (isset($_POST['sub'])) {
	$count = $_POST['count'];
	for ($i = 0; $i < $count; $i++) {
		$date = date("d-m-y");
		$que = "insert into class_result(roll_no,course_code,subject_code,semester,total_marks,obtain_marks,result_date)values('" . $_POST['roll_no'][$i] . "','" . $_POST['course_code'][$i] . "','" . $_POST['subject_code'][$i] . "','" . $_POST['semester'][$i] . "','" . $_POST['total_marks'][$i] . "','" . $_POST['obtain_marks'][$i] . "','$date')";
		$run = mysqli_query($con, $que);
		if ($run) {
			//echo "Insert Successfully";
		} else {
			//echo " Insert Not Successfully";
		}
	}
}
?>

<!doctype html>
<html lang="en">
<?php include('../Common/teacher-sidenav-header.php') ?>

<div class="app-content">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Class Result</h1>
	</div>

	<div class="app-content-actions">

		<form action="class-result.php" method="post">
			<div class="row mt-3">
				<div class="col-md-4">
					<div class="form-group" style="z-index: 10;">
						<label>Enter Class Id:</label>
						<select class="browser-default custom-select" name="course_code">
							<option>Select Course</option>
							<?php
							$teacher_id = $_SESSION['teacher_id'];
							$query = "select distinct(course_code) from teacher_courses where teacher_id='$teacher_id'";
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
						<label>Enter Semester:</label>
						<input type="text" class="form-control" name="semester" placeholder="Enter Semester">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label>Enter Subject:</label>
						<select class="browser-default custom-select" name="subject_code" required="">
							<option>Select Subject</option>
							<?php
							$teacher_id = $_SESSION['teacher_id'];
							$query = "select distinct(subject_code) from teacher_courses where teacher_id='$teacher_id'";
							$run = mysqli_query($con, $query);
							while ($row = mysqli_fetch_array($run)) {
								echo "<option value=" . $row['subject_code'] . ">" . $row['subject_code'] . "</option>";
							}
							?>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<input type="submit" name="submit" class="btn btn-primary" value="Submit">
				</div>

		</form>
		<br><br>
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
								<?php echo "100" ?></span>
						</div>
						<input type="hidden" name="total_marks[]" value="100">
						<div class="product-cell"><span><input type="text" name="obtain_marks[]"
									placeholder="Plz Enter Obtain Marks" class="form-control"></span></div>
						<input type="hidden" name="count" value="<?php echo $count ?>">

				</div>

			<?php
				}
			}
			?>
		<input type="submit" class="btn btn-primary px-5" name="sub">

		</form>

		</div>
</div>
	</div>
</div>
</div>

<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>