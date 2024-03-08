<?php
	include('../../Common/admin-sidenav-header.php');
    include('../../Common/header.php');
?>
<div class="app-content" style="padding-bottom: 24px">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Users</h1>
		<a href="index.php?view=add" class="btn btn-primary btn-xs  "> Add User</a> 
	</div>
    <div></div>
    <br/>
       	 
   		 	<div class="col-lg-12"> 
				<table id="dash-table" class="table  table-bordered table-hover table-responsive" style="font-size:12px;" cellspacing="0"> 
				  <thead>
				  	<tr>
				  		<th>Account ID</th>
				  		<th> Account Name</th>
				  		<th>Username</th>
				  		<th>Role</th>
				  		<th width="10%" >Action</th>
				 
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		// $mydb->setQuery("SELECT * 
								// 			FROM  `tblusers` WHERE TYPE != 'Customer'");
				  		$mydb->setQuery("SELECT * 
											FROM  `tblusers`");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  		// echo '<td width="5%" align="center"></td>';
				  		echo '<td>' . $result->USERID.'</a></td>';
				  		echo '<td>' . $result->FULLNAME.'</a></td>';
				  		echo '<td>'. $result->USERNAME.'</td>';
				  		echo '<td>'. $result->ROLE.'</td>';
				  		If($result->USERID==$_SESSION['ADMIN_USERID'] || $result->ROLE=='MainAdministrator' || $result->ROLE=='Administrator') {
				  			$active = "Disabled";

				  		}else{
				  			$active = "";

				  		}

				  		echo '<td align="center" > <a title="Edit" href="index.php?view=edit&id='.$result->USERID.'"  class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></span></a>
				  					 <a title="Delete" href="controller.php?action=delete&id='.$result->USERID.'" class="btn btn-danger btn-xs" '.$active.'><span class="fa fa-trash fw-fa"></span> </a>
				  					 </td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>  
			</div> 
 