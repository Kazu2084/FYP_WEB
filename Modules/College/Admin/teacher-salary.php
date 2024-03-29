
<?php
session_start();
if (!$_SESSION["LoginAdmin"]) {
	header('location:../../../Login/index.html');
}
require_once "../../../Connection/connection.php";
?>


<!--*********************** PHP code starts from here for data insertion into database ******************************* -->
<?php

if (isset($_POST['btn_save'])) {

	$teacher_id = $_POST["teacher_id"];

	$basic_salary = $_POST["basic_salary"];

	$medical_allowance = $_POST["medical_allowance"];

	$hr_allowance = $_POST["hr_allowance"];

	$scale = $_POST["scale"];

	$query = "insert into teacher_salary_allowances(teacher_id,basic_salary,medical_allowance,hr_allowance,scale)values('$teacher_id','$basic_salary','$medical_allowance','$hr_allowance','$scale')";
	$run = mysqli_query($con, $query);
	if ($run) {
		echo "Your Data has been submitted";
	} else {
		echo "Your Data has not been submitted";
	}
}



if (isset($_POST['btn_sub'])) {

	$teacher_id = $_POST["teacher_id"];

	$query = "select * from teacher_salary_allowances where teacher_id='$teacher_id'";
	$run = mysqli_query($con, $query);
	while ($row = mysqli_fetch_array($run)) {
		$total_amount = $row['basic_salary'] + ($row['basic_salary'] * $row['medical_allowance'] / 100) + ($row['basic_salary'] * $row['hr_allowance'] / 100);
		$query1 = "INSERT INTO teacher_salary_report(teacher_id, total_amount, status) VALUES ('$teacher_id','$total_amount','Paid')";
		$run1 = mysqli_query($con, $query1);

		if ($run1) { ?>
			<script type="text/javascript">
				alert("Salary has been paid to ID is : " + <?php echo $row['teacher_id'] ?>);
			</script>
		<?php } else { ?>
			<script type="text/javascript">
				alert("Salary has not been paid due to some errors");
			</script>
		<?php }
	}
}
?>
<!--*********************** PHP code end from here for data insertion into database ******************************* -->


<!doctype html>
<html lang="en">

<?php include('../Common/admin-sidenav-header.php') ?>


<div class="app-content">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Teacher Salary</h1>
		<button type="button" class="btn btn-primary ml-5 mr-5" data-toggle="modal"
			data-target=".bd-example-modal-lg">Add Salary Scale</button>
		<button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".add_salary">Add
			Salary</button>
	</div>

	<div class="app-content-actions">


		<!-- Large modal -->
		<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
			aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title text-center">Add Salary</h4>
					</div>
					<div class="modal-body">
						<form action="teacher-salary.php" method="post">
							<div class="row mt-3">
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">Teacher ID: </label>
										<input type="text" name="teacher_id" class="form-control"
											placeholder="Enter Teacher Id">
									</div>
								</div>
								<div class="col-md-6 pr-5">
									<div class="form-group">
										<label for="exampleInputEmail1">Basic Salary:</label>
										<input type="text" name="basic_salary" class="form-control"
											placeholder="Enter Basic Salary">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Medical Allowance:
										</label>
										<input type="text" name="medical_allowance" class="form-control"
											placeholder="Enter Medical Allowance">
									</div>
								</div>
								<div class="col-md-6">
									<div class="formp">
										<label for="exampleInputEmail1">House Rent Allowance:
										</label>
										<input type="text" name="hr_allowance" class="form-control"
											placeholder="Enter HR Allowance">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="formp">
										<label for="exampleInputEmail1">Paid Scale: </label>
										<input type="text" name="scale" class="form-control"
											placeholder="Enter Paid Scale">
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


		
					<!-- Large modal -->
					<div class="modal fade add_salary" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
						aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header bg-info text-white">
									<h4 class="modal-title text-center">Add Salary</h4>
								</div>
								<div class="modal-body">
									<form action="teacher-salary.php" method="post">
										<div class="row mt-3">
											<div class="col-md-12 pr-5">
												<div class="form-group">
													<label for="exampleInputEmail1">Teacher ID: </label>
													<input type="text" name="teacher_id" class="form-control"
														placeholder="Enter Teacher Id">
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<input type="submit" class="btn btn-primary" name="btn_sub"
												value="Save Data">
											<button type="button" class="btn btn-secondary"
												data-dismiss="modal">Close</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				
	
			
				<div class="products-area-wrapper tableView">
					<div class="products-header">
						<div class="product-cell">Salary Voucher</div>
						<div class="product-cell">ID</div>
						<div class="product-cell">Name</div>
						<div class="product-cell">Basic Salary</div>
						<div class="product-cell">Medical Allowance</div>
						<div class="product-cell">HR Allowance</div>
						<div class="product-cell">Pay Scale</div>
						<div class="product-cell">Paid Date</div>
						<div class="product-cell">Total Amount</div>
					</div>
					<?php
					$query = "select tsr.teacher_id,ti.first_name,middle_name,last_name,salary_id,basic_salary,medical_allowance,hr_allowance,scale,Date(paid_date) as paid_date,total_amount from teacher_salary_allowances tsa inner join teacher_salary_report tsr on tsa.teacher_id=tsr.teacher_id inner join teacher_info ti on ti.teacher_id=tsr.teacher_id";
					$run = mysqli_query($con, $query);
					while ($row = mysqli_fetch_array($run)) { ?>
						<div class="products-row">
							<div class="product-cell"><span>
									<?php echo $row['salary_id'] ?>
								</span></div>
							<div class="product-cell"><span>
									<?php echo $row['teacher_id'] ?>
								</span></div>
							<div class="product-cell"><span>
									<?php echo $row["first_name"] . " " . $row["middle_name"] . " " . $row["last_name"] ?>
								</span></div>
							<div class="product-cell"><span>
									<?php echo $row['basic_salary'] ?>
								</span></div>
							<div class="product-cell"><span>
									<?php echo ($row['basic_salary'] * $row['medical_allowance'] / 100) ?>
								</span></div>
							<div class="product-cell"><span>
									<?php echo ($row['basic_salary'] * $row['hr_allowance'] / 100) ?>
								</span></div>
							<div class="product-cell"><span>
									<?php echo $row['scale'] ?>
								</span></div>
							<div class="product-cell"><span>
									<?php echo $row['paid_date'] ?>
								</span></div>
							<div class="product-cell"><span>
									<?php echo $row['total_amount'] ?>
								</span></div>
						</div>
						<?php
					}
					?>

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