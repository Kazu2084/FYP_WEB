<?php
include('../../../Connection/connection.php');
//include('../Common/header.php');
?>
<html>

<head>
	<title>Library Management System</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

	<style>
		.container {
			width: 100%;
			margin: auto;
		}

		.table {
			width: 100%;
			margin-bottom: 20px;
			/* border-collapse: collapse; */
		}

		/* tr,
		td,
		th {
			border: 1px solid black;
		} */

		.table-striped tbody>tr:nth-child(odd)>td,
		.table-striped tbody>tr:nth-child(odd)>th {
			background-color: #f9f9f9;
		}

		@media print {
			#print {
				display: none;
			}
		}

		#print {
			width: 90px;
			height: 30px;
			font-size: 18px;
			background: white;
			border-radius: 4px;
			margin-left: 28px;
			cursor: hand;
		}
	</style>

	<script>
		function printPage() {
			window.print();
		}
	</script>
</head>


<body>
<div style="width: 100%;overflow:auto;">
	<div class="container">
		<div id="header">
			<br />
			<h1 class="m-20 p-10 text-center">Library Management System</h1>
			<div class="float-end">
				<b style="color:blue;">Date Prepared:</b>
				<?php include('currentdate.php'); ?>
			</div>

			<br />
            <br />

			
			
	
			<?php
			$return_query = mysqli_query($con, "SELECT * from borrow_book 
							LEFT JOIN book ON borrow_book.book_id = book.book_id 
							LEFT JOIN user ON borrow_book.user_id = user.user_id 
							where borrow_book.borrowed_status = 'borrowed'  order by borrow_book.borrow_book_id DESC");
			$return_count = mysqli_num_rows($return_query);
			// $count_penalty = mysqli_query($con,"SELECT sum(book_penalty) FROM return_book ")or die(mysqli_error());
			// $count_penalty_row = mysqli_fetch_array($count_penalty);
			?>
			<p style="font-size:14pt; font-weight:bold;" class="m-2 float-start">Borrowed
				Books&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</p>
			<button class="float-end" type="submit" id="print" onclick="printPage()">Print</button>

			<table class="table table-responsive center table-bordered py-10 my-10">
				<!--<div class="pull-left">
									<div class="span"><div class="alert alert-info"><i class="icon-credit-card icon-large"></i>&nbsp;Total Amount of Penalty:&nbsp;<?php echo "Php " . $count_penalty_row['sum(book_penalty)'] . ".00"; ?></div></div>
								</div>
								<br /> -->
				<thead>
					<tr>
					<tr>
						<th>Barcode</th>
						<th>Borrower Name</th>
						<th>Level</th>
						<th>Section</th>
						<th>Title</th>
						<!---		<th>Author</th>
									<th>ISBN</th>	-->
						<th>Date Borrowed</th>
						<th>Due Date</th>
						<!-- <th>Date Returned</th> -->
						<!-- <th>Penalty</th> -->
					</tr>
					</tr>
				</thead>
				<tbody>
					<?php
					while ($return_row = mysqli_fetch_array($return_query)) {
						$id = $return_row['borrow_book_id'];
						?>
						<tr>
							<td>
								<?php echo $return_row['book_barcode']; ?>
							</td>
							<td>
								<?php echo $return_row['firstname'] . " " . $return_row['middlename'] . " " . $return_row['lastname']; ?>
							</td>
							<td>
								<?php echo $return_row['level']; ?>
							</td>
							<td>
								<?php echo $return_row['section']; ?>
							</td>
							<td>
								<?php echo $return_row['book_title']; ?>
							</td>
							<!---	<td style="text-transform: capitalize"><?php // echo $return_row['author']; ?></td>
								<td><?php // echo $return_row['isbn']; ?></td>	-->
							<td>
								<?php echo date("M d, Y h:m:s a", strtotime($return_row['date_borrowed'])); ?>
							</td>
							<?php
							if ($return_row['book_penalty'] != 'No Penalty') {
								echo "<td class=''>" . date("M d, Y h:m:s a", strtotime($return_row['due_date'])) . "</td>";
							} else {
								echo "<td'>" . date("M d, Y h:m:s a", strtotime($return_row['due_date'])) . "</td>";
							}

							?>
							
						</tr>
					<?php
					}
					if ($return_count <= 0) {
						echo '
									<table class="table table-responsive center table-bordered py-10 my-10">
										<tr>
											<td style="padding:10px;" class="alert alert-danger">No Books returned at this moment</td>
										</tr>
									</table>
								';
					}
					?>
					</tr>
				</tbody>
			</table>

			<br />
			<br />
			<?php
			// include('../../../Connection/connection.php');
			// $user_query = mysqli_query($con, "select * from admin where admin_id='$id_session'") or die(mysqli_error());
			// $row = mysqli_fetch_array($user_query); {
				?>
				<!-- <h2><i class="glyphicon glyphicon-user"></i>
					<?php //echo '<span style="color:blue; font-size:15px;">Prepared by:' . "<br /><br /> " . $row['firstname'] . " " . $row['lastname'] . " " . '</span>'; ?>
				</h2> -->
			<?php //} ?>
		</div>
	</div>
			</div>
</body>

</html>