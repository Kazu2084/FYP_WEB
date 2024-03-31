<!DOCTYPE html>
<html lang="en">


</head>
<body>

  <?php include('../Common/admin-sidenav-header.php') ?>


  <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Manage Menu</h1>
	  <a href="addMenu.php" class="btn btn-sm btn-success">Add Menu</a>

    </div>

    <div class="app-content-actions">


			
			
					<div class="products-area-wrapper tableView">
                  <div class="products-header">
								
									<div class="product-cell">Cat. Id</div>
									<div class="product-cell image">Img</div>
									<div class="product-cell">Item Detail</div>
									<div class="product-cell">Action</div>
								</div>
							
							
                            <?php
                                $sql = "SELECT * FROM `cafe_product`";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    $pizzaId = $row['productId'];
                                    $pizzaName = $row['productName'];
                                    $pizzaPrice = $row['productPrice'];
                                    $pizzaDesc = $row['productDesc'];
                                    $pizzaCategorieId = $row['productCategorieId'];

                                    echo '<div class="products-row">
                                            <div class="product-cell"><span>' .$pizzaCategorieId. '</span></div>
                                            <div class="product-cell image"><span>
                                                <img style="width: 100px;
                                                height: 100px;" src="/Cafe/img/pizza-'.$pizzaId. '.jpg" alt="image for this item" width="150px" height="150px">
                                            </span></div>
                                            <div class="product-cell"><span>
                                                <p>Name : <b>' .$pizzaName. '</b></p>
                                                <p>Description : <b class="truncate">' .$pizzaDesc. '</b></p>
                                                <p>Price : <b>' .$pizzaPrice. '</b></p>
                                            </span></div>
                                            <div class="product-cell"><span>
												<div>
													<button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#updateItem' .$pizzaId. '">Edit</button>
													
                          <form action="partials/_menuManage.php" method="POST">
                          <br>
														<button name="removeItem" class="btn btn-sm btn-danger">Delete</button>
														<input type="hidden" name="pizzaId" value="'.$pizzaId. '">
													</form>
												</div>
                                            </span></div>
                                        </div>';
                                }
                            ?>
							 </div>
                        </div>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	
</div>

<?php 
    $pizzasql = "SELECT * FROM `cafe_product`";
    $pizzaResult = mysqli_query($conn, $pizzasql);
    while($pizzaRow = mysqli_fetch_assoc($pizzaResult)){
        $pizzaId = $pizzaRow['productId'];
        $pizzaName = $pizzaRow['productName'];
        $pizzaPrice = $pizzaRow['productPrice'];
        $pizzaCategorieId = $pizzaRow['productCategorieId'];
        $pizzaDesc = $pizzaRow['productDesc'];
?>

<!-- Modal -->
<div class="modal fade" id="updateItem<?php echo $pizzaId; ?>" tabindex="-1" role="dialog" aria-labelledby="updateItem<?php echo $pizzaId; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="updateItem<?php echo $pizzaId; ?>">Item Id: <?php echo $pizzaId; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<form action="partials/_menuManage.php" method="post" enctype="multipart/form-data">
		    <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
		   		<div class="form-group col-md-8">
					<b><label for="image">Image</label></b>
					<input type="file" name="itemimage" id="itemimage" accept=".jpg" class="form-control" required style="border:none;" onchange="document.getElementById('itemPhoto').src = window.URL.createObjectURL(this.files[0])">
					
					<input type="hidden" id="pizzaId" name="pizzaId" value="<?php echo $pizzaId; ?>">
					<button type="submit" class="btn btn-success my-1" name="updateItemPhoto">Update Img</button>
				</div>
				<div class="form-group col-md-4">
					<img src="/Cafe/img/pizza-<?php echo $pizzaId; ?>.jpg" id="itemPhoto" name="itemPhoto" alt="item image" width="100" height="100">
				</div>
			</div>
		</form>
		<form action="partials/_menuManage.php" method="post">
            <div class="text-left my-2">
                <b><label for="name">Name</label></b>
                <input class="form-control" id="name" name="name" value="<?php echo $pizzaName; ?>" type="text" required>
            </div>
			<div class="text-left my-2 row">
				<div class="form-group col-md-6">
                	<b><label for="price">Price</label></b>
                	<input class="form-control" id="price" name="price" value="<?php echo $pizzaPrice; ?>" type="number" min="1" required>
				</div>
				<div class="form-group col-md-6">
					<b><label for="catId">Category Id</label></b>
                	<input class="form-control" id="catId" name="catId" value="<?php echo $pizzaCategorieId; ?>" type="number" min="1" required>
				</div>
            </div>
            <div class="text-left my-2">
                <b><label for="desc">Description</label></b>
                <textarea class="form-control" id="desc" name="desc" rows="2" required minlength="6"><?php echo $pizzaDesc; ?></textarea>
            </div>
            <input type="hidden" id="pizzaId" name="pizzaId" value="<?php echo $pizzaId; ?>">
            <button type="submit" class="btn btn-success" name="updateItem">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
	}
?>