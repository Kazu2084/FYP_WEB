<?php
//   if (!isset($_SESSION['ADMIN_USERID'])){
//   redirect(web_root."admin/index.php");
//  } 
include('../../Common/admin-sidenav-header.php');
include('../../Common/header.php');
?>
<div class="app-content" style="padding-bottom: 24px">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Company</h1>
		<a href="index.php?view=add" class="btn btn-primary btn-xs  "> Add Company</a>
	</div>
	<div></div>
	<br />


	<form action="controller.php?action=delete" Method="POST">
		<div class="table-responsive">
			<div class="products-area-wrapper tableView">
				<!-- <table id="dash-table" class="table table-bordered table-hover"  style="font-size:12px" cellspacing="0"> -->
				<div class="products-area-wrapper tableView">

					<thead>
						<div class="products-header">
							<!-- <div class="product-cell"><span>No.</span></div> -->
							<div class="product-cell"><span>Name</span></div>
							<div class="product-cell"><span>Address</span></div>
							<div class="product-cell"><span>Contact No.</span></div>
							<div class="product-cell"><span>Action</span></div>
						</div>
				</div>
				</thead>
				<tbody>
					<?php
					$mydb->setQuery("SELECT * FROM `tblcompany`");
					$cur = $mydb->loadResultList();
					foreach ($cur as $result) {
						echo ' <div class="products-row">';
						// echo '<td width="5%" align="center"></span></div>';
						// echo '<div class="product-cell"><span>
						//      <input type="checkbox" name="selector[]" id="selector[]" value="'.$result->CATEGORYID. '"/>
						// 		' . $result->CATEGORIES.'</a></span></div>';
						echo '<div class="product-cell"><span>' . $result->COMPANYNAME . '</span></div>';
						echo '<div class="product-cell"><span>' . $result->COMPANYADDRESS . '</span></div>';
						echo '<div class="product-cell"><span>' . $result->COMPANYCONTACTNO . '</span></div>';
						echo '<div class="product-cell"><span><a title="Edit" href="index.php?view=edit&id=' . $result->COMPANYID . '" class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></a>
				  		     <a title="Delete" href="controller.php?action=delete&id=' . $result->COMPANYID . '" class="btn btn-danger btn-xs  ">  <span class="fa  fa-trash fw-fa "></a></span></div>';
						// echo '<div class="product-cell"><span></span></div>';
						echo '</div>';
					}
					?>
				</tbody>

				</table>
				</div>
				<div class="btn-group">
					<!--  <a href="index.php?view=add" class="btn btn-default">New</a> -->
					<?php
					// if($_SESSION['ADMIN_ROLE']=='Administrator'){
					// // echo '<button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button'
					// ; }?>
				</div>
			</div>

	</form>

	<div class="table-responsive">