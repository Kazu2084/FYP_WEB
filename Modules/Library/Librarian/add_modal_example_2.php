<?php
//include('../Common/librarian-sidenav-header.php');
////include('../Common/header.php'); ?>
	<a class="btn btn-primary pull-right" for="DeleteAdmin" href="#cc" data-toggle="modal" data-target="#cc">
		<i class="glyphicon glyphicon-edit icon-white"></i> Edit
	</a>								
	<div class="modal fade" id="cc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-edit"></i> Edit</h4>
		</div>
		<div class="modal-body">
                            <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-md-6" for="first-name">Amount <span class="required">*</span>
                                    </label>
                                    <div class="col-md-2">
                                        <input type="number" name="penalty_amount" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
								<div class="modal-footer">
								<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
								<button type="submit" style="margin-bottom:5px;" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</button>
								</div>
                            </form>
							
							<?php
								if (isset($_POST['submit'])) {
									
									$penalty_amount = $_POST['penalty_amount'];
									
									{
										mysqli_query($con,"INSERT INTO penalty (penalty_amount) VALUES ('$penalty_amount')") or die (mysqli_error());
									}
									{
										echo "<script>alert('Successfully Added!'); window.location='settings.php'</script>";
									}
								}
							?>
		</div>
		</div>
	</div>
	</div>