<?php
require_once ("../../Connection/connection.php");
?>


<?php
$_SESSION["LoginAdmin"] = "";

?>


<html lang="en">

<head>
	<title>Staff</title>
</head>

<body>
	<?php include ('Common/staff-sidenav-header.php') ?>
	<div class="app-content">
		<div class="app-content-header">
			<h1 class="app-content-headerText">Dashboard</h1>
		</div>

		<div class="app-content-actions">

			<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 main-background mb-2 w-100">
				<div class="sub-main">
					<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 admin-dashboard pl-3">
						<h4 class="">Welcome
							<?php $roll_no = $_SESSION['LoginStaff'];
							$query = "select * from staff_info where email='$roll_no'";
							$run = mysqli_query($con, $query);
							while ($row = mysqli_fetch_array($run)) {
								echo $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'];
							}
							?>
						</h4>
					</div>

					<div class="btn btn-block table-three d-flex">
						<span class="font-weight-bold">Salary Report</span>
						<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsetwo"><i
								class="fa fa-plus text-light" aria-hidden="true"></i></a>

					</div>
					<div class="collapse show mt-2" id="collapsetwo">
						<div class="products-area-wrapper tableView">
							<div class="products-header">
								<div class="product-cell">Salary Voucher</div>
								<div class="product-cell">Basic Salary</div>
								<div class="product-cell">Medical Allowance</div>
								<div class="product-cell">HR Allowance</div>
								<div class="product-cell">Pay Scale</div>
								<div class="product-cell">Paid Date</div>
								<div class="product-cell">Total Amount</div>
							</div>
							<?php
							$staff_id = $_SESSION['staff_id'];

							$query = "select salary_id,basic_salary,medical_allowance,hr_allowance,scale,Date(paid_date) as paid_date,total_amount from staff_salary_allowances inner join staff_salary_report on staff_salary_allowances.staff_id=staff_salary_report.staff_id where staff_salary_allowances.staff_id='$staff_id'";
							$run = mysqli_query($con, $query);
							while ($row = mysqli_fetch_array($run)) { ?>
								<div class="products-row">
									<div class="product-cell"><span>
											<?php echo $row['salary_id'] ?>
										</span></div>
									<div class="product-cell"><span>
											<?php echo $row['basic_salary'] ?>
										</span></div>
									<div class="product-cell"><span>
											<?php echo ($row['basic_salary'] + $row['medical_allowance'] / 1000) ?>
										</span></div>
									<div class="product-cell"><span>
											<?php echo ($row['basic_salary'] + $row['hr_allowance'] / 1000) ?>
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

				</div>
				<br><br>&nbsp;
					<div>
						<h4>Personal Information</h4>
					<?php 
											$staff_id=$_SESSION['LoginStaff'];
											$query="select * from staff_info where email='$staff_id'";
											$run=mysqli_query($con,$query);
											while ($row=mysqli_fetch_array($run)) {?>

											 <div><b>ID - </b><?php echo $row['staff_id'];?></div>
							                <div><b>Name - </b><?php echo $row['first_name'] . " " .$row['middle_name'] . " ". $row['last_name'];?></div>
											
							                <div><b>Father name - </b><?php echo $row['father_name'];?></div>
							                <div><b>Email - </b><?php echo $row['email'];?></div>
							                <div><b>Mobile No - </b><?php echo $row['phone_no'];?></div>
							                <div><b>Date of Birth - </b><?php echo $row['dob'];?></div>
							                <div><b>Current Address - </b><?php echo $row['current_address'];?></div>
							                <div><b>Place of Birth - </b><?php echo $row['place_of_birth'];?></div>


											<?php
											}
										?>
					</div>

		</div>

	</div>
	</main>
	<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>