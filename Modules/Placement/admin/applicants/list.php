<?php
	//  if(!isset($_SESSION['ADMIN_USERID'])){
    //   redirect(web_root."admin/index.php");
    //  }
	include('../../Common/admin-sidenav-header.php');
    include('../../Common/header.php');
?>
<div class="app-content" style="padding-bottom: 24px">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Applicants</h1>
	</div>
    <div></div>
    <br/>
						<form class="wow fadeInDownaction" action="controller.php?action=delete" Method="POST"> 
						<div class="products-area-wrapper tableView"> 		
							<table id="dash-table" class="table table-hover table-responsive" style="font-size:12px" cellspacing="0">
							
							  <thead>
							  	<div class="products-header">
									<div class="product-cell">Applicant</div>
									<div class="product-cell">Job Title</div>
									<div class="product-cell">Company</div>
									<div class="product-cell">Applied Date</div>
									<div class="product-cell">Remarks</div>
									<div class="product-cell">Action</div>
							  	</div>
							  </thead> 
							  <tbody>
							  	<?php   
							  		// $mydb->setQuery("SELECT * 
											// 			FROM  `tblusers` WHERE TYPE != 'Customer'");
							  		$mydb->setQuery("SELECT * FROM `tblcompany` c  , `tbljobregistration` j, `tbljob` j2, `tblapplicants` a WHERE c.`COMPANYID`=j.`COMPANYID` AND  j.`JOBID`=j2.`JOBID` AND j.`APPLICANTID`=a.`APPLICANTID` ");
							  		$cur = $mydb->loadResultList();

									foreach ($cur as $result) { 
							  		echo '<div class="products-row">';
							  		// echo '<td width="5%" align="center">';
							  		echo '<div class="product-cell"><span>'. $result->APPLICANT.'</span></div>';
							  		echo '<div class="product-cell"><span>' . $result->OCCUPATIONTITLE.'</a></span></div>';
							  		echo '<div class="product-cell"><span>' . $result->COMPANYNAME.'</a></span></div>'; 
							  		echo '<div class="product-cell"><span>'. $result->REGISTRATIONDATE.'</span></div>';
							  		echo '<div class="product-cell"><span>'. $result->REMARKS.'</span></div>';  
					  				echo '<div class="product-cell"><span>    
					  		             <a title="View" href="index.php?view=view&id='.$result->REGISTRATIONID.'"  class="btn btn-info btn-xs  ">
					  		              View</a> 
					  		             <a title="Remove" href="controller.php?action=delete&id='.$result->REGISTRATIONID.'"  class="btn btn-danger btn-xs  ">
					  		             Remove</a> 
					  					 </span></div>';
							  		echo '</div>';
							  	} 
							  	?>
							  </tbody>
							
							</table>
							
							 
							</form>
							</div>
       
                 
 