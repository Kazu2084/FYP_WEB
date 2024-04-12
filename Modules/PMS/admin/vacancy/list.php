<?php
//   if (!isset($_SESSION['ADMIN_USERID'])){
//   redirect(web_root."admin/index.php");
//  } 
include('../../Common/admin-sidenav-header.php');
include('../../Common/header.php');
?>
<div class="app-content" style="padding-bottom: 24px">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Vacancy</h1>
		<a href="index.php?view=add" class="btn btn-primary btn-xs  "> Add Job
			Vacancy</a>
	</div>
	<div></div>
	<br />
	<form action="controller.php?action=delete" Method="POST">
		<div class="table-responsive">
			<!-- <table id="dash-table" class="table table-striped table-bordered table-hover" style="font-size:12px"
				cellspacing="0"> -->
			<div class="products-area-wrapper tableView">

				<thead>
					<div class="products-header">

						<!-- <div class="product-cell"><span>No.</span></div> -->
						<div class="product-cell"><span>Company Name</span></div>
						<div class="product-cell"><span>Occupation Title</span></div>
						<div class="product-cell"><span>Require no. of Employees</span></div>
						<div class="product-cell"><span>Salaries</span></div>
						<div class="product-cell"><span>Duration of Employment</span></div>
						<div class="product-cell"><span>Qualification/Work experience</span></div>
						<div class="product-cell"><span>Job Description</span></div>
						<div class="product-cell"><span>Prefered Sex</span></div>
						<div class="product-cell"><span>Sector of Vacancy</span></div>
						<!-- <div class="product-cell"><span>Job Status</span></div> -->
						<div class="product-cell"><span>Action</span></div>
					</div>
				</thead>
				<tbody>
					<?php
					// `COMPANYID`, `OCCUPATIONTITLE`, `REQ_NO_EMPLOYEES`, `SALARIES`, `DURATION_EMPLOYEMENT`, `QUALIFICATION_WORKEXPERIENCE`, `JOBDESCRIPTION`, `PREFEREDSEX`, `SECTOR_VACANCY`, `JOBSTATUS`
					$mydb->setQuery("SELECT * FROM `tbljob` j, `tblcompany` c WHERE j.COMPANYID=c.COMPANYID");
					$cur = $mydb->loadResultList();
					foreach ($cur as $result) {
						echo '<div class="products-row">';
						// echo '<td width="5%" align="center"></span></div>';
						// echo '<div class="product-cell"><span>
						//      <input type="checkbox" name="selector[]" id="selector[]" value="'.$result->CATEGORYID. '"/>
						// 		' . $result->CATEGORIES.'</a></span></div>';
						echo '<div class="product-cell"><span>' . $result->COMPANYNAME . '</span></div>';
						echo '<div class="product-cell"><span>' . $result->OCCUPATIONTITLE . '</span></div>';
						echo '<div class="product-cell"><span>' . $result->REQ_NO_EMPLOYEES . '</span></div>';
						echo '<div class="product-cell"><span>' . $result->SALARIES . '</span></div>';
						echo '<div class="product-cell"><span>' . $result->DURATION_EMPLOYEMENT . '</span></div>';
						echo '<div class="product-cell"><span>' . $result->QUALIFICATION_WORKEXPERIENCE . '</span></div>';
						echo '<div class="product-cell"><span>' . $result->JOBDESCRIPTION . '</span></div>';
						echo '<div class="product-cell"><span>' . $result->PREFEREDSEX . '</span></div>';
						echo '<div class="product-cell"><span>' . $result->SECTOR_VACANCY . '</span></div>';
						//echo '<div class="product-cell"><span>' . $result->JOBSTATUS . '</span></div>';
						echo '<div class="product-cell"><span><a title="Edit" href="index.php?view=edit&id=' . $result->JOBID . '" class="btn btn-primary btn-xs  ">  Edit</a>
				  		     <br><a title="Delete" href="controller.php?action=delete&id=' . $result->JOBID . '" class="btn btn-danger btn-xs  "> Delete </a></span></div>';
						// echo '<div class="product-cell"><span></span></div>';
						echo '</div>';
					}
					?>
				</tbody>

				</table>
			</div>

	</form>

	<div class="table-responsive">