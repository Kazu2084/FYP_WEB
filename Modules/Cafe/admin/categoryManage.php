<!DOCTYPE html>
<html lang="en">


</head>
<body>

  <?php include('../Common/admin-sidenav-header.php') ?>


  <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Manage Category</h1>
      <a href="createCategory.php" class="btn btn-sm btn-success">Add Category</a>

    </div>

    <div class="app-content-actions">

    
             
                 
                        <div class="products-area-wrapper tableView">
                            <div class="products-header">
                        
                            <div class="product-cell">Id</div>
                            <div class="product-cell">Img</div>
                            <div class="product-cell">Category Detail</div>
                            <div class="product-cell">Action</div>
</div>
                        <?php 
                            $sql = "SELECT * FROM `categories`"; 
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                $catId = $row['categorieId'];
                                $catName = $row['categorieName'];
                                $catDesc = $row['categorieDesc'];

                                echo '<div class="products-row">
                                        <div class="product-cell"><span><b>' .$catId. '</b></span></div>
                                        <div class="product-cell"><span><img style="width: 100px;
                                        height: 100px;" src="/Cafe/img/card-'.$catId. '.jpg" alt="image for this Category" width="150px" height="150px"></span></div>
                                        <div class="product-cell"><span>
                                            <p>Name : <b>' .$catName. '</b></p>
                                            <p>Description : <b class="truncate">' .$catDesc. '</b></p>
                                        </span></div>
                                        <div class="product-cell"><span>
                                            <div>
                                            <button class="btn btn-sm btn-primary edit_cat" type="button" data-toggle="modal" data-target="#updateCat'.$catId.'">Edit</button>
                                            
                                            <form action="partials/_categoryManage.php" method="POST">
                                            <br>
                                                <button name="removeCategory" class="btn btn-sm btn-danger">Delete</button>
                                                <input type="hidden" name="catId" value="'.$catId.'">
                                            </form></div>
                                        </span></div>
                                    </div>';
                            }
                        ?> 
                         </div>
                        </div>
                    </div>
                </div>
            </div>
      
    </div>	    
</div>


<?php 
    $catsql = "SELECT * FROM `categories`";
    $catResult = mysqli_query($conn, $catsql);
    while($catRow = mysqli_fetch_assoc($catResult)){
        $catId = $catRow['categorieId'];
        $catName = $catRow['categorieName'];
        $catDesc = $catRow['categorieDesc'];
?>

<!-- Modal -->
<div class="modal fade" id="updateCat<?php echo $catId; ?>" tabindex="-1" role="dialog" aria-labelledby="updateCat<?php echo $catId; ?>" aria-hidden="true" style="width: -webkit-fill-available;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateCat<?php echo $catId; ?>">Category Id: <b><?php echo $catId; ?></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="partials/_categoryManage.php" method="post" enctype="multipart/form-data">
		    <div class="text-left my-2 row" >
		   		<div class="form-group col-md-8">
					<b><label for="image">Image</label></b>
					<input type="file" name="catimage" id="catimage" accept=".jpg" class="form-control" required style="border:none;" onchange="document.getElementById('itemPhoto').src = window.URL.createObjectURL(this.files[0])">
					<input type="hidden" id="catId" name="catId" value="<?php echo $catId; ?>">
          <br>
					<button type="submit" class="btn btn-success my-1" name="updateCatPhoto">Update Img</button>
				</div>
				<div class="form-group col-md-4">
					<img src="/Cafe/img/card-<?php echo $catId; ?>.jpg" id="itemPhoto" name="itemPhoto" alt="Category image" width="100" height="100">
				</div>
			</div>
		</form>
        <form action="partials/_categoryManage.php" method="post">
            <div class="text-left my-2">
                <b><label for="name">Name</label></b>
                <input class="form-control" id="name" name="name" value="<?php echo $catName; ?>" type="text" required>
            </div>
            <div class="text-left my-2">
                <b><label for="desc">Description</label></b>
                <textarea class="form-control" id="desc" name="desc" rows="2" required minlength="6"><?php echo $catDesc; ?></textarea>
            </div>
            <input type="hidden" id="catId" name="catId" value="<?php echo $catId; ?>">
            <button type="submit" class="btn btn-success" name="updateCategory">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
    }
?>