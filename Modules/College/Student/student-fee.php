<!---------------- Session starts form here ----------------------->
<?php
session_start();
if (!$_SESSION["LoginStudent"]) {
	header('location:../login/login.php');
}
require_once "../connection/connection.php";
?>
<!---------------- Session Ends form here ------------------------>


<!doctype html>
<html lang="en">

<?php include('../Common/student-sidenav-header.php') ?>

<div class="app-content">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Fee</h1>

	</div>

	<div class="app-content-actions">
		<div class="products-area-wrapper tableView">
			<div class="products-header">

				<div class="product-cell">Voucher No.</div>
				<div class="product-cell">Roll No.</div>
				<div class="product-cell">Student Name</div>
				<div class="product-cell">Program</div>
				<div class="product-cell">Amount</div>
				<div class="product-cell">Posting Date</div>
				<div class="product-cell">Status</div>
			</div>
			<?php
			$roll_no = $_SESSION['LoginStudent'];
			//$roll_no = "MCS-S19-1";
			$query = "select fee_voucher,student_fee.roll_no,first_name,middle_name,last_name,course_code,amount,date(posting_date) as posting_date,status from student_fee inner join student_info on student_fee.roll_no=student_info.roll_no where student_info.email='$roll_no'";
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
						<?php echo $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'] ?>
					</span></div>
					<div class="product-cell"><span>
						<?php echo $row['course_code'] ?>
					</span></div>
					<div class="product-cell"><span>
						<?php echo $row['amount'] ?>
					</span></div>
					<div class="product-cell"><span>
						<?php echo date($row['posting_date']) ?>
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
</div>
</main>
<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>