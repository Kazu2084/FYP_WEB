
<?php
session_start();
if (!$_SESSION["LoginAdmin"]) {
	header('location:../../../Login/index.html');
}
require_once "../../../Connection/connection.php";
?>


<?php
	$message = "";
	$success_message = "";
	$error_message = "";
	if (isset($_POST['sub'])) {
		$count=$_POST['count'];
		for ($i=0; $i < $count; $i++) { 
			$date=date("d-m-y");
			$que="insert into student_courses(course_code,semester,roll_no,subject_code,assign_date)values('".$_POST['course_code'][$i]."','".$_POST['semester'][$i]."','".$_POST['roll_no'][$i]."','".$_POST['subject_code'][$i]."','$date')";
			$run=mysqli_query($con,$que);
			if ($run) {
				$success_message = "All Subjects Successfully Assigned To The Student";
			}	
			else{
				$error_message = "All Subjects Not Successfully Assigned To The Student";
			}
		}
	}

?>


<?php include('../Common/admin-sidenav-header.php') ?>


		<!-- <main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="bar-margin text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<h4>Assign Subject to Single Student </h4>
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
						<h5 class="py-2 pl-3 <?php //echo $bg_color; ?>">
							
							<?php //echo $message ?>
						</h5>
					</div> -->
					<div class="app-content">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Assign Subject to Student</h1>
		
	</div>

	<div class="app-content-actions">
						<form action="assign-single-student-subjects.php" method="post">
							<div class="row mt-3">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputEmail1">Select Course:</label>
										<select class="browser-default custom-select" name="course_code">
											<option >Select Course</option>
											<?php
												$query="select distinct(course_code) as course_code from course_subjects";
												$run=mysqli_query($con,$query);
												while($row=mysqli_fetch_array($run)) {
												echo	"<option value=".$row['course_code'].">".$row['course_code']."</option>";
												}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Enter Student ID:</label>
										<input type="text" name="roll_no" class="form-control" placeholder="Enter ID">
									</div>
								</div>
								<div class="col-md-4">
									<input type="submit" name="submit" class="btn btn-primary px-5" value="Submit">
								</div>
							</div>	
						</form>
					</div>
			
				<div class="row">
					<div class="col-md-12 ml-2">
						<section class="border mt-3">
						<div class="products-area-wrapper tableView">
		

		<div class="products-header">

									<div class="product-cell">Sr.No</div>
                                    <div class="product-cell">Roll No</div>
                                    <div class="product-cell">Course Code</div>
                                    <div class="product-cell">Subject Code</div>
                                    <div class="product-cell">Subject Name</div>
									<div class="product-cell">Semester</div>
											</div>
								<?php  
                                    $i=1;
                                    $count=0;
									if (isset($_POST['submit'])) {
										$course_code=$_POST['course_code'];
										$roll_no=$_POST['roll_no'];
										$que="select * from course_subjects where course_subjects.course_code='$course_code'";
                                        $run=mysqli_query($con,$que);
                                        while ($row=mysqli_fetch_array($run)) {
                                            $count++;
                                ?>
                                    <form action="assign-single-student-subjects.php" method="post">
									<div class="products-row">
                                           <div class="product-cell"><span><?php echo $i++ ?></span></div>
                                           <div class="product-cell"><span><?php echo $_POST['roll_no'] ?></span></div>
                                            <input type="hidden" name="roll_no[]" value=<?php echo $_POST['roll_no'] ?> >
                                           <div class="product-cell"><span><?php echo $row['course_code'] ?></span></div>
                                            <input type="hidden" name="course_code[]" value=<?php echo $row['course_code'] ?> >
                                           <div class="product-cell"><span><?php echo $row['subject_code'] ?></span></div>
                                            <input type="hidden" name="subject_code[]" value=<?php echo $row['subject_code'] ?> >
                                           <div class="product-cell"><span><?php echo $row['subject_name'] ?></span></div>
                                           <div class="product-cell"><span><?php echo $row['semester'] ?></span></div>
                                            <input type="hidden" name="semester[]" value=<?php echo $row['semester'] ?> >
                                            <input type="hidden" name="count" value="<?php echo $count ?>">
											</div>
								<?php		
									}
									}
								?>
								        <input class="btn btn-success px-5 my-1" type="submit" name="sub">

								    </form>
									</div>	
						</section>
					</div>
				</div>
			</div>
		</main>
</body>
</html>

