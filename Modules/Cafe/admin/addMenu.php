<!DOCTYPE html>
<html lang="en">


</head>

<body>
<?php require 'partials/_dbconnect.php'; ?>
	<?php include('../Common/admin-sidenav-header.php') ?>

	<?php
	$sql = "SELECT * FROM `pizza`";
	$result = mysqli_query($conn, $sql);

	?>

	<?php
	$pizzasql = "SELECT * FROM `pizza`";
	$pizzaResult = mysqli_query($conn, $pizzasql);
	?>
	<div class="app-content">
		<div class="app-content-header">
			<h1 class="app-content-headerText">Add Menu Item</h1>
		</div>

		<div class="app-content-actions">
			<form action="partials/_menuManage.php" method="post" enctype="multipart/form-data">
				<div class="card mb-3">

					<div class="card-body">
						<div class="form-group">
							<label class="control-label">Name: </label>
							<input type="text" class="form-control" name="name" required>
						</div>
						<div class="form-group">
							<label class="control-label">Description: </label>
							<textarea cols="30" rows="3" class="form-control" name="description" required></textarea>
						</div>
						<div class="form-group">
							<label class="control-label">Price</label>
							<input type="number" class="form-control" name="price" required min="1">
						</div>
						<div class="form-group">
							<label class="control-label">Category: </label>
							<select name="categoryId" id="categoryId" class="custom-select browser-default" required>
								<option hidden disabled selected value>None</option>
								<?php
								$catsql = "SELECT * FROM `categories`";
								$catresult = mysqli_query($conn, $catsql);
								while ($row = mysqli_fetch_assoc($catresult)) {
									$catId = $row['categorieId'];
									$catName = $row['categorieName'];
									echo '<option value="' . $catId . '">' . $catName . '</option>';
								}
								?>
							</select>
						</div>

						<div class="form-group">
							<label for="image" class="control-label">Image</label>
							<input type="file" name="image" id="image" accept=".jpg" class="form-control" required
								style="border:none;">

						</div>
					</div>

					<div class="card-footer">
						<div class="row">
							<div class="mx-auto">
								<button type="submit" name="createItem" class="btn btn-sm btn-primary"> Create </button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>