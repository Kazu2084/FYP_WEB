
<?php
session_start();
if (!$_SESSION["LoginAdmin"]) {
	header('location:../../../Login/index.html');
}
require_once "../../../Connection/connection.php";
?>


<?php
if (isset($_POST['sub'])) {
	$roll_no = $_POST['roll_no'];
	$amount = $_POST['amount'];
	$status = $_POST['status'];
	$que = "insert into student_fee(roll_no,amount,status)values('$roll_no','$amount','$status')";
	$run = mysqli_query($con, $que);
	if ($run) {
		echo "Insert Successfully";
	} else {
		echo " Insert Not Successfully";
	}
}

?>

<!doctype html>
<html lang="en">

<?php include('../Common/admin-sidenav-header.php') ?>


<div class="app-content">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Fees</h1>
		
	</div>

	<div class="app-content-actions">
		<form action="student-fee.php" method="post">
			<div class="row mt-3">
				<div class="col-md-6">
					<div class="form-group">
						<label>Enter Roll No:</label>
						<div class="d-flex">
							<input type="text" class="form-control" name="roll_no" placeholder="Enter Roll No">
							<br><input type="submit" name="submit" class="btn btn-primary px-4 ml-4" value="Submit">
							<br>
						</div>
					</div>
				</div>
				<div class="col-md-6 align-items-baseline pt-4">
				</div>
		</form><br>

		<div class="products-area-wrapper tableView">
			<br>
			<div class="products-header">
				<div class="product-cell">Sr No.</div>
				<div class="product-cell">Roll No.</div>
				<div class="product-cell">Student Name</div>
				<div class="product-cell">Program</div>
				<div class="product-cell">Amount (Rs.)</div>
			</div>
			<?php
			$i = 1;
			if (isset($_POST['submit'])) {
				$roll_no = $_POST['roll_no'];


				$que = "select roll_no,first_name,middle_name,last_name,course_code from student_info where roll_no='$roll_no' ";
				$run = mysqli_query($con, $que);
				while ($row = mysqli_fetch_array($run)) {
					?>
					<form action="student-fee.php" method="post">
						<div class="products-row">
							<div class="product-cell"><span>
									<?php echo $i++ ?>
								</span></div>
							<div class="product-cell"><span>
									<?php echo $row['roll_no'] ?>
								</span></div>
							<input type="hidden" name="roll_no" value=<?php echo $row['roll_no'] ?>>
							<div class="product-cell"><span>
									<?php echo $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'] ?>
								</span></div>
							<div class="product-cell"><span>
									<?php echo $row['course_code'] ?>
								</span></div>
							<div class="product-cell"><span><input type="text" name="amount" class="form-control"
										placeholder="Enter Amount for fee"></span></div>
							<input type="hidden" name="status" value="Paid">

						</div>

						<?php
				}
			}
			?>
				<input type="submit" class="btn btn-primary px-5" name="sub">

			</form>
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