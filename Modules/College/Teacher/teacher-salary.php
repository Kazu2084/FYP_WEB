<?php
require_once ("../../../Connection/connection.php");
?>


<?php
$_SESSION["LoginAdmin"] = "";
// $teacher_email=$_SESSION['LoginTeacher'];
// $query1="select * from teacher_info where email='$teacher_email'";
// $run1=$run=mysqli_query($con,$query1);
// while($row=mysqli_fetch_array($run1)) {
// 	$teacher_id=$row["teacher_id"];
// }
//$_SESSION['teacher_id']=$teacher_id;
?>


<html lang="en">

<head>
	<title>Teacher</title>
</head>

<body>
	<?php include ('../Common/teacher-sidenav-header.php') ?>
	<div class="app-content">
		<div class="app-content-header">
			<h1 class="app-content-headerText">Dashboard</h1>
		</div>

		<div class="app-content-actions">

			<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 main-background mb-2 w-100">
				<div class="sub-main">
					

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
							$teacher_id = $_SESSION['teacher_id'];

							$query = "select salary_id,basic_salary,medical_allowance,hr_allowance,scale,Date(paid_date) as paid_date,total_amount from teacher_salary_allowances inner join teacher_salary_report on teacher_salary_allowances.teacher_id=teacher_salary_report.teacher_id where teacher_salary_allowances.teacher_id='$teacher_id'";
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