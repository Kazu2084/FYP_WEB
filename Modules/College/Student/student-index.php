<!-- <?php
// session_start();
// if (!$_SESSION["LoginStudent"]) {
// 	header('location:../../../Login/index.html');
// }
// require_once "../../../Connection/connection.php";
?> -->
<?php
// session_start();
// if (!$_SESSION["LoginStudent"])
// {
// 	header('location:../login/login.php');
// }
// if($_SESSION['LoginStudent']){
// 	$_SESSION['LoginAdmin'] = "";
// }
// 	require_once "../connection/connection.php";

?>


<!doctype html>
<html lang="en">

<?php include ('../Common/student-sidenav-header-fee.php') ?>

<div class="app-content">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Dashboard</h1>

	</div>

	<div class="app-content-actions">

		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 admin-dashboard pl-3">
					<h4 class="">Welcome
						<?php $current = $_SESSION['LoginStudent'];
						$id_query = "select roll_no from student_info WHERE email = '$current' ";
						$id_run = mysqli_query($con, $id_query);
						$id_row = mysqli_fetch_array($id_run);
						$roll_no = $id_row['roll_no'];
						// $roll_no=$_SESSION['LoginStudent'];
						$query = "select * from student_info where roll_no='$roll_no'";
						$run = mysqli_query($con, $query);
						while ($row = mysqli_fetch_array($run)) {
							echo $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'];
						}
						?>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-12 col-sm-12">
						<div>
							<section class="mt-3">
								<div class="btn btn-block table-two d-flex">
									<span class="font-weight-bold">Subjects Detail</span>
									<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapseOne"></a>

								</div>
								<div class="collapse show mt-2" id="collapseOne">
									<div class="products-area-wrapper tableView">
										<div class="products-header">
											<div class="product-cell">Subject Code</div>
											<div class="product-cell">Subject Name</div>
											<div class="product-cell">Semester</div>
											<div class="product-cell">Credit Hours</div>
										</div>
										<?php $current = $_SESSION['LoginStudent'];
										$id_query = "select roll_no from student_info WHERE email = '$current' ";
										$id_run = mysqli_query($con, $id_query);
										$id_row = mysqli_fetch_array($id_run);
										$roll_no = $id_row['roll_no'];
										$max_semester = "select max(semester) as semester from student_courses where roll_no = '$roll_no'";
										$max_run = mysqli_query($con, $max_semester);
										$row = mysqli_fetch_array($max_run);
										$semester = $row['semester'];
										$query = "select sc.subject_code,cs.subject_name,sc.semester,cs.credit_hours, sc.roll_no, sc.semester from student_courses sc inner join course_subjects cs on sc.subject_code=cs.subject_code where sc.roll_no='$roll_no' and sc.semester = '$semester'";
										$run = mysqli_query($con, $query);
										while ($row = mysqli_fetch_array($run)) { ?>
											<div class="products-row">
												<div class="product-cell"><span>
														<?php echo $row['subject_code'] ?>
													</span></div>
												<div class="product-cell"><span>
														<?php echo $row['subject_name'] ?>
													</span></div>
												<div class="product-cell"><span>
														<?php echo $row['semester'] ?>
													</span></div>
												<div class="product-cell"><span>
														<?php echo $row['credit_hours'] ?>
													</span></div>
											</div>
										<?php } ?>
									</div>
								</div>
							</section>
						</div>
					</div>
					<div class="col-lg-6 col-md-12 col-md-6 col-sm-12">
						<div>
							<section class="mt-3">
								<div class="btn btn-block table-three d-flex">
									<span class="font-weight-bold">Fee Detail</span>
									<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsetwo"></a>

								</div>
								<div class="collapse show mt-2" id="collapsetwo">
									<div class="products-area-wrapper tableView">
										<div class="products-header">
											<div class="product-cell">Voucher No.</div>
											<div class="product-cell">Roll No.</div>
											<div class="product-cell">Amt (Rs.)</div>
											<div class="product-cell">Posting Date</div>
											<div class="product-cell">Status</div>
										</div>
										<?php
										$current = $_SESSION['LoginStudent'];
										$id_query = "select roll_no from student_info WHERE email = '$current' ";
										$id_run = mysqli_query($con, $id_query);
										$id_row = mysqli_fetch_array($id_run);
										$roll_no = $id_row['roll_no'];
										$query = "select * from student_fee inner join student_info on student_fee.roll_no=student_info.roll_no where student_fee.roll_no='$roll_no'";
										$run = mysqli_query($con, $query);
										while ($row = mysqli_fetch_array($run)) { ?>
											<div class="products-row">
												<div class="product-cell"><span>
														<?php echo $row['fee_voucher'] ?>
													</span></div>
												<div class="product-cell"><span>
														<?php echo $row['roll_no'] ?>
													</span></div>
												<div class="product-cell"><span>
														<?php echo $row['amount'] ?>
													</span></div>
												<div class="product-cell"><span>
														<?php echo $row['posting_date'] ?>
													</span></div>
												<div class="product-cell"><span>
														<?php echo $row['status'] ?>
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
				<div class="row">
					<div class="col-lg-6 col-md-12 col-sm-12">
						<div>
							<section class="mt-4">
								<div class="btn btn-block table-five d-flex">
									<span class="font-weight-bold"> Current Semester Detail</span>
									<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsethree"></a>

								</div>
								<div class="collapse show mt-2" id="collapsethree">
									<div class="products-area-wrapper tableView">
										<div class="products-header">
											<div class="product-cell">Subject code</div>
											<div class="product-cell">Subject Name</div>
											<div class="product-cell">Semester</div>
											<div class="product-cell">Total Marks</div>
										</div>
										<?php
										$current = $_SESSION['LoginStudent'];
										$id_query = "select roll_no from student_info WHERE email = '$current' ";
										$id_run = mysqli_query($con, $id_query);
										$id_row = mysqli_fetch_array($id_run);
										$roll_no = $id_row['roll_no'];
										$max_semester = "select max(semester) as semester from student_courses where roll_no = '$roll_no'";
										$max_run = mysqli_query($con, $max_semester);
										$row = mysqli_fetch_array($max_run);
										$semester = $row['semester'];
										$query = "select * from student_courses inner join course_subjects on student_courses.subject_code=course_subjects.subject_code where student_courses.roll_no='$roll_no' and student_courses.semester = '$semester'";
										$run = mysqli_query($con, $query);
										while ($row = mysqli_fetch_array($run)) { ?>
											<div class="products-row">
												<div class="product-cell"><span>
														<?php echo $row['subject_code'] ?>
													</span></div>
												<div class="product-cell"><span>
														<?php echo $row['subject_name'] ?>
													</span></div>
												<div class="product-cell"><span>
														<?php echo $row['semester'] ?>
													</span></div>
												<div class="product-cell"><span>100</span></div>
											</div>
										<?php }
										?>
									</div>
								</div>
							</section>
						</div>
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12">
						<div>
							<section class="mt-4">
								<div class="btn btn-block table-one d-flex">
									<span class="font-weight-bold">Attendance Status</span>
									<a href="" class="ml-auto" data-toggle="collapse" data-target="#collapsefour"></a>

								</div>
								<div class="collapse show mt-2" id="collapsefour">
									<div class="products-area-wrapper tableView">
										<div class="products-header">
											<div class="product-cell">Roll No</div>
											<div class="product-cell">Present</div>
											<div class="product-cell">Absent</div>
											<div class="product-cell">Percentage</div>
										</div>
										<?php
										$current = $_SESSION['LoginStudent'];
										$id_query = "select roll_no from student_info WHERE email = '$current' ";
										$id_run = mysqli_query($con, $id_query);
										$id_row = mysqli_fetch_array($id_run);
										$roll_no = $id_row['roll_no'];
										$query = "select count(attendance_id) as attendance_id,sum(attendance) as attendance,student_id from student_attendance where student_id='$roll_no'";
										$run = mysqli_query($con, $query);
										while ($row1 = mysqli_fetch_array($run)) { ?>
											<div class="products-row">
												<div class="product-cell"><span>
														<?php echo $roll_no ?>
													</span></div>
												<div class="product-cell"><span>
														<?php echo $row1['attendance'] ? $row1['attendance'] : "0" ?>
													</span></div>
												<div class="product-cell"><span>
														<?php echo $row1['attendance_id'] - $row1['attendance'] ?>
													</span></div>
												<?php $attendace = $row1['attendance_id'] > 0 ? round(($row1['attendance'] * 100) / $row1['attendance_id']) . "%" : "0%" ?>
												<div class="product-cell"><span>
														<?php echo $attendace ?>
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
					<br><br>&nbsp;
					<div>
						<h4>Personal Information</h4>
					<?php 
											$current = $_SESSION['LoginStudent'];
											$id_query = "select roll_no from student_info WHERE email = '$current' ";
											$id_run = mysqli_query($con, $id_query);
											$id_row = mysqli_fetch_array($id_run);
											$roll_no = $id_row['roll_no'];
											$query="select * from student_info where roll_no='$roll_no'";
											$run=mysqli_query($con,$query);
											while ($row1=mysqli_fetch_array($run)) { ?>
												<div class="container  mt-1  mb-1">
			<div class="row pt-5">
				
				<div class="col-md-8">
					<h3 class="ml-5">Name - <?php echo $row1['first_name']." ".$row1['middle_name']." ".$row1['last_name'] ?></h3><br>
					<div class="row">
						<div class="col-md-6">
							<h5>Father Name:</h5> <?php echo $row1['father_name']  ?><br><br>
							<h5>Email:</h5> <?php echo $row1['email']  ?><br><br>
							<h5>Contact:</h5> <?php echo $row1['mobile_no']  ?><br><br>
						</div>
						<div class="col-md-6">
							<h5>Address:</h5> <?php echo $row1['permanent_address']  ?><br><br>
						
							<h5>UID:</h5> <?php echo $row1['roll_no']  ?><br><br>
						</div>		
					</div>
				</div>
				<hr>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Gender:</h5> <?php echo $row1['gender']  ?></div>
				<div class="col-md-4"><h5>Date of Birth:</h5> <?php echo $row1['dob']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Phone No:</h5> <?php echo $row1['other_phone']  ?></div>
				<div class="col-md-4"><h5>State:</h5> <?php echo $row1['state']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Permanent Adress:</h5> <?php echo $row1['permanent_address']  ?></div>
				<div class="col-md-4"><h5>Current Address:</h5> <?php echo $row1['current_address']  ?></div>
				<div class="col-md-4"><h5>Place of Birth:</h5> <?php echo $row1['place_of_birth']  ?></div>
			</div>
			
		</div>

										
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