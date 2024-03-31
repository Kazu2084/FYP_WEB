<?php
    // if (!isset($_SESSION['ADMIN_USERID'])){
    //   redirect(web_root."admin/index.php");
    //  }
    include('../../Common/admin-sidenav-header.php');
    include('../../Common/header.php');


  $companyid = $_GET['id'];
  $company = New Company();
  $res = $company->single_company($companyid);

?>
<div class="app-content" style="padding-bottom: 24px">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Edit Company</h1>
	</div>
    <div></div>
    <br/>
	
 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

       
            <!-- <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Edit Company</h1>
          </div> -->
          <!-- /.col-lg-12 -->
       <!-- </div>  -->
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COMPANYNAME">Company Name:</label>

                      <div class="col-md-8">

                        <input type="hidden" name="COMPANYID" value="<?php echo $res->COMPANYID ;?>">
                         <input class="form-control input-sm" id="COMPANYNAME" name="COMPANYNAME" placeholder=
                            "Company Name" type="text" value="<?php echo $res->COMPANYNAME ;?>">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COMPANYADDRESS">Company Address:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="COMPANYADDRESS" name="COMPANYADDRESS" placeholder=
                            "Company Address" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $res->COMPANYADDRESS ;?></textarea>
                         <!-- <input class="form-control input-sm" id="COMPANYADDRESS" name="COMPANYADDRESS" placeholder="Company Address" value="<?php echo $res->COMPANYADDRESS ;?>" />  -->
                      </div>
                    </div>
                  </div> 
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COMPANYCONTACTNO">Company Contact No.:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="COMPANYCONTACTNO" name="COMPANYCONTACTNO" placeholder=
                            "Company Contact No." type="text" value="<?php echo $res->COMPANYCONTACTNO ;?>">
                      </div>
                    </div>
                  </div>

               <!--  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COMPANYMISSION">Company Mission:</label>

                      <div class="col-md-8">
                        
                         <textarea class="form-control input-sm" id="COMPANYMISSION" name="COMPANYMISSION" placeholder=
                            "Company Mission" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $res->COMPANYMISSION ;?></textarea>
                      </div>
                    </div>
                  </div>  -->



            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                      <!-- <a href="index.php" class="btn btn_fixnmix"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> -->
                      <button class="btn btn-primary btn-sm" name="save" type="submit" > Save</button>
                   
                      </div>
                    </div>
                  </div>

              
   
        </form>
    </div>