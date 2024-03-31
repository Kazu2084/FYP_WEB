<?php
session_start();
if (!$_SESSION["LoginAdmin"]) {
	header('location:../../../Login/index.html');
}
require_once "../../../Connection/connection.php";
?>


<?php
if (isset($_POST['sub'])) {
	$course_code = $_POST['course_code'];
	$course_name = $_POST['course_name'];
	$semester_or_year = $_POST['semester_or_year'];
	$no_of_year = $_POST['no_of_year'];

	$query = "insert into courses(course_code,course_name,semester_or_year,no_of_year)values('$course_code','$course_name','$semester_or_year','$no_of_year')";
	$run = mysqli_query($con, $query);
	if ($run) {
		?><script>alert( "successfull");</script><?php
	} else {
		?><script>alert( "unsuccessfull");</script><?php
	}
}
?>



<?php include ('../Common/admin-sidenav-header.php') ?>

<div class="app-content">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Courses</h1>
	</div>

	<div class="app-content-actions">
		<form action="courses.php" method="post">
			<div class="row mt-3">
				<div class="col-md-6">
					<div class="form-group">
						<label for="exampleInputEmail1">Course Code: </label>
						<input type="text" name="course_code" class="form-control" required
							placeholder="Enter Course Code">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="exampleInputPassword1">Course Name:</label>
						<input type="text" name="course_name" class="form-control" required
							placeholder="Enter Course Name">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="exampleInputEmail1">Semester Or Years:</label>
						<input type="text" name="semester_or_year" class="form-control" required
							placeholder="Enter Semester Or Years">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="exampleInputPassword1">No of Years:</label>
						<input type="text" name="no_of_year" class="form-control" required
							placeholder="Enter No of Years">
					</div>
				</div>
			</div>
			<div class="row w-100">
				<div class="col-md-12">
				<input type="submit" name="sub" value="Add Course" class=" btn btn-primary ml-auto">
				</div>
			</div>
		</form>
</div>
<div class="row">
	<div class="col-md-12 ml-2">
		<section class="mt-3">
		<div class="products-area-wrapper tableView">
		

		<div class="products-header">
					<div class="product-cell">Sr.No</div>
					<div class="product-cell">Course Code</div>
					<div class="product-cell">Cource Name</div>
					<div class="product-cell">Semester/Years</div>
					<div class="product-cell">Action</div>
</div>
				<?php
				$sr = 1;
				$query = "select course_code,course_name,no_of_year from courses";
				$run = mysqli_query($con, $query);
				while ($row = mysqli_fetch_array($run)) {
					echo "<div class='products-row'>";
					echo "<div class='product-cell'><span>" . $sr++ . "</span></div>";
					echo "<div class='product-cell'><span>" . $row['course_code'] . "</span></div>";
					echo "<div class='product-cell'><span>" . $row['course_name'] . "</span></div>";
					echo "<div class='product-cell'><span>" . $row['no_of_year'] . "</span></div>";
					echo "<div class='product-cell'><span><a class='btn btn-danger' href=delete-function.php?course_code=" . $row['course_code'] . ">Delete</a></span></div>";
					echo "</div>";

				}
				?>
		</section>
</div>
</div>
</main>
<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>