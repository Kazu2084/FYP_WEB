<!DOCTYPE html>
<html lang="en">


</head>
<body>

  <?php include('../Common/admin-sidenav-header.php') ?>


  <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Add Category</h1>
    </div>

    <div class="app-content-actions">

      <form action="partials/_categoryManage.php" method="post" enctype="multipart/form-data">
                    <div class="card">
                       
                        <div class="card-body">
                            <div class="form-group">
                                <label class="control-label">Category Name: </label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Category Desc: </label>
                                <input type="text" class="form-control" name="desc" required>
                            </div> 
                            <div class="form-group">
								<label for="image" class="control-label">Image</label>
								<input type="file" name="image" id="image" accept=".jpg" class="form-control" required style="border:none;">
							</div>  
                        </div>  
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="createCategory" class="btn btn-sm btn-primary col-sm-3 offset-md-4"> Add </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>