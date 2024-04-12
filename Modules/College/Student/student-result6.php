<!doctype html>
<html lang="en">
<?php include ('../Common/student-sidenav-header-result.php') ?>
<div class="app-content">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Result</h1>

	</div>

	<div class="app-content-actions">


		<div class="products-area-wrapper tableView">
			<div class="products-header">
				<div class="product-cell">Term</div>
				<div class="product-cell">Course</div>
				<div class="product-cell">Subject</div>
				<div class="product-cell">Cr.Hr</div>
				<div class="product-cell">Total Marks</div>
				<div class="product-cell">Obtain Marks</div>
				<div class="product-cell">Grade</div>
				<div class="product-cell">CGPA</div>
			</div>
			<?php
			$cgpa = 0;
			$gpa = 0;
			$total_marks = 0;
			$obtain_marks = 0;
			$count = 0;


			$current = $_SESSION['LoginStudent'];
			$id_query = "select roll_no from student_info WHERE email = '$current' ";
			$id_run = mysqli_query($con, $id_query);
			$id_row = mysqli_fetch_array($id_run);
			$roll_no = $id_row['roll_no'];

			// $roll_no=$_SESSION['student_id'];
			

			$query = "select * from class_result cr inner join course_subjects cs on cr.subject_code=cs.subject_code where cr.roll_no='$roll_no'";
			//$query = "select * from class_result cr inner join course_subjects cs on cr.subject_code=cs.subject_code inner join student_info si on si.course_code=cs.course_code where si.email='$roll_no' and cr.roll_no=si.roll_no";
			$run = mysqli_query($con, $query);
			while ($row = mysqli_fetch_array($run)) { ?>
				<?php if ($row['semester'] == 6) { ?>
					<div class="products-row">
						<div class="product-cell"><span>
								<?php echo $row['course_code'] . "-" . $row['semester']; ?>
							</span></div>
						<div class="product-cell"><span>
								<?php echo $row['course_code'] ?>
							</span></div>
						<div class="product-cell"><span>
								<?php echo $row['subject_code'] ?>
							</span></div>
						<div class="product-cell"><span>
								<?php echo $row['credit_hours'] ?>
							</span></div>
						<div class="product-cell"><span>
								<?php echo $row['total_marks'] ?>
							</span></div>
						<div class="product-cell"><span>
								<?php echo $row['obtain_marks'] ?>
							</span></div>
						<?php
						if ($row['obtain_marks'] > 85) {
							$grade = 'A+';
							$credits = 4.0;
						} else if ($row['obtain_marks'] > 80) {
							$grade = 'A';
							$credits = 4.0;
						} else if ($row['obtain_marks'] > 75) {
							$grade = 'B+';
							$credits = 3.7;
						} else if ($row['obtain_marks'] > 70) {
							$grade = 'B';
							$credits = 3.3;
						} else if ($row['obtain_marks'] > 65) {
							$grade = 'C+';
							$credits = 3.0;
						} else if ($row['obtain_marks'] > 60) {
							$grade = 'C';
							$credits = 2.7;
						} else if ($row['obtain_marks'] > 55) {
							$grade = 'D+';
							$credits = 2.5;

						} else if ($row['obtain_marks'] > 50) {
							$grade = 'D';
							$credits = 2.0;
						} else {
							$grade = 'F';
							$credits = 0.0;
						}
						?>
						<div class="product-cell"><span>
								<?php echo $grade ?>
							</span></div>
						<div class="product-cell"><span>
								<?php echo $credits ?>
							</span></div>
					</div>
					<?php
					$count++;
					$score = $credits * $row['credit_hours'];
					$gpa = $gpa + $score;
					$cgpa = $cgpa + $row['credit_hours'];
					$obtain_marks = $obtain_marks + $row['obtain_marks'];
					$total_marks = $total_marks + $row['total_marks'];
				}
			}
			
			?>
			<div class="products-row"><br>
				<hr />
			</div>
			<div class="products-row">
				<div class="product-cell"><span>
						<?php echo "1." ?>
					</span></div>
				<div class="product-cell"><span>
						<?php echo "FINAL RESULT" ?>
					</span></div>
				<div class="product-cell"><span>
						<?php echo $count; ?>
					</span></div>
				<div class="product-cell"><span>
						<?php echo $cgpa ?>
					</span></div>
				<div class="product-cell"><span>
						<?php echo $total_marks; ?>
					</span></div>
				<div class="product-cell"><span>
						<?php echo $obtain_marks; ?>
					</span></div>
				<?php
				$marks_grade = $total_marks == true ? ($obtain_marks * 100) / $total_marks : 0;
				$marks_grade = round($marks_grade);
				if ($marks_grade > 85) {
					$final = 'A+';
				} else if ($marks_grade > 80) {
					$final = 'A';
				} else if ($marks_grade > 75) {
					$final = 'B+';
				} else if ($marks_grade > 70) {
					$final = 'B';
				} else if ($marks_grade > 65) {
					$final = 'C+';
				} else if ($marks_grade > 60) {
					$final = 'C';
				} else if ($marks_grade > 55) {
					$final = 'D+';
				} else if ($marks_grade > 50) {
					$final = 'D';
				} else {
					$marks_grade == true ? $final = 'F' : $final = "0";
				}
				?>
				<div class="product-cell"><span>
						<?php echo $final ?>
					</span></div>
				<div class="product-cell"><span>
						<?php echo $gpa > 0 ? round($total_cgpa = $gpa / $cgpa, 2) : "0" ?>
					</span></div>

			</div>

			</section>
		</div>
	</div>
</div>
</div>
</body>

</html>