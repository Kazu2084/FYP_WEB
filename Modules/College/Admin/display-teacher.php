
<?php  
	session_start();

	if ($_SESSION["LoginAdmin"] && !$_SESSION['LoginTeacher'])
	{
		$teacher_id=$_GET['teacher_id'];
	}
	else if(!$_SESSION["LoginAdmin"] && $_SESSION['LoginTeacher']){
		$teacher_email=$_SESSION['LoginTeacher'];
		$teacher_id="";
	}
	else{ 
		header('location:../../../Login/index.html');
	}
	require_once "../../../Connection/connection.php";
	?>



<!doctype html>
<html lang="en">
	<head>
		<title>Teacher Profile</title>
	</head>
	<body>
	<?php include ('../Common/admin-sidenav-header.php') ?>
	<?php
		if($teacher_id){
			$query="select * from teacher_info where teacher_id='$teacher_id'";
		}
		else{
			$query="select * from teacher_info where email='$teacher_email'";
		}
?>
		<div class="app-content">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Teacher Profile</h1>
		<!-- <button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".bd-example-modal-lg">Add Teacher</button> -->
	</div>

	<div class="app-content-actions">
		<?php
		$run=mysqli_query($con,$query);
		while ($row=mysqli_fetch_array($run)) {
	?>
		<div class="container  mt-1  mb-1">
			<div class="row pt-5">
				
				<div class="col-md-8">
					<h3 class="ml-5">Name - <?php echo $row['first_name']." ".$row['middle_name']." ".$row['last_name'] ?></h3><br>
					<div class="row">
						<div class="col-md-6">
							<h5>Father Name:</h5> <?php echo $row['father_name']  ?><br><br>
							<h5>Email:</h5> <?php echo $row['email']  ?><br><br>
							<h5>Contact:</h5> <?php echo $row['phone_no']  ?><br><br>
						</div>
						<div class="col-md-6">
							<h5>Address:</h5> <?php echo $row['permanent_address']  ?><br><br>
						
							<h5>Teacher ID:</h5> <?php echo $row['teacher_id']  ?><br><br>
						</div>		
					</div>
				</div>
				<hr>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Status:</h5> <?php echo $row['teacher_status']  ?></div>
				<div class="col-md-4"><h5>Gender:</h5> <?php echo $row['gender']  ?></div>
				<div class="col-md-4"><h5>Date of Birth:</h5> <?php echo $row['dob']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Phone No:</h5> <?php echo $row['other_phone']  ?></div>
				<div class="col-md-4"><h5>State:</h5> <?php echo $row['state']  ?></div>
				<div class="col-md-4"><h5>Last Qualification:</h5> <?php echo $row['last_qualification']  ?></div>
			</div>
			<div class="row pt-3">
				<div class="col-md-4"><h5>Permanent Adress:</h5> <?php echo $row['permanent_address']  ?></div>
				<div class="col-md-4"><h5>Current Address:</h5> <?php echo $row['current_address']  ?></div>
				<div class="col-md-4"><h5>Place of Birth:</h5> <?php echo $row['place_of_birth']  ?></div>
			</div>
			
		</div>
	<?php } ?>
</body>
</html>
