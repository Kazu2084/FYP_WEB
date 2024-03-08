<?php
include('../../Common/admin-sidenav-header.php');
include('../../Common/header.php');
?>
<div class="app-content" style="padding-bottom: 24px">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Category</h1>
		<a href="index.php?view=add" class="btn btn-primary btn-xs  ">Add Category</a>
	</div>
	<div></div>
	<br />

	<form action="controller.php?action=delete" Method="POST">
		<div class="table-responsive">
			<!-- <table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0"> -->
			<div class="products-area-wrapper tableView">
				<thead>
					<div class="products-header">
						<!-- <th>No.</th> -->
						<div class="product-cell"><span>
								<!-- <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">  -->
								Category</span></div>
						<div class="product-cell"><span>Action</span></div>
					</div>
				</thead>
				<tbody>
					<?php
					$mydb->setQuery("SELECT * FROM `tblcategory`");
					$cur = $mydb->loadResultList();

					foreach ($cur as $result) {
						echo '<div class="products-row">';
						// echo '<td width="5%" align="center"></td>';
						// echo '<td>
						//      <input type="checkbox" name="selector[]" id="selector[]" value="'.$result->CATEGORYID. '"/>
						// 		' . $result->CATEGORIES.'</a></td>';
						echo '<div class="product-cell" style="align:center" ><span>' . $result->CATEGORY . '</span></div>';
						echo '<div class="product-cell"><span><a title="Edit" href="index.php?view=edit&id=' . $result->CATEGORYID . '" class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></a>
				  		     <a title="Delete" href="controller.php?action=delete&id=' . $result->CATEGORYID . '" class="btn btn-danger btn-xs  ">  <span class="fa  fa-trash fw-fa "></a></span></div>';
						// echo '<td></td>';
						echo '</div>';
					}
					?>
				</tbody>

				</table>
				<div class="btn-group">
					<!--  <a href="index.php?view=add" class="btn btn-default">New</a> -->
					<?php
					if ($_SESSION['ADMIN_ROLE'] == 'Administrator') {
						// echo '<button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button'
						;
					} ?>
				</div>


	</form>

	<div class="table-responsive">