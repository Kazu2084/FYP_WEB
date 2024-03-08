
<?php
    include('../../Common/admin-sidenav-header.php');
    include('../../Common/header.php');
?>
<div class="app-content" style="padding-bottom: 24px">
	<div>
		<h1 class="app-content-headerText">Add Company</h1>
	</div>
    <div></div>
    <br/>
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST">
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COMPANYNAME">Company Name:</label>

                      <div class="col-md-8">
                         <input class="form-control input-sm" id="COMPANYNAME" name="COMPANYNAME" placeholder=
                            "Company Name" type="text" value="" autocomplete="none">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COMPANYADDRESS">Company Address:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="COMPANYADDRESS" name="COMPANYADDRESS" placeholder=
                            "Company Address" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea>
                         <!-- <input class="form-control input-sm" id="COMPANYADDRESS" name="COMPANYADDRESS" placeholder="Company Address"   autocomplete="none"/>  -->
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COMPANYCONTACTNO">Company Contact No.:</label>
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="COMPANYCONTACTNO" name="COMPANYCONTACTNO" placeholder=
                            "Company Contact No." type="text" value="" autocomplete="none">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>  

                      <div class="col-md-8">
                         <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                      <!-- <a href="index.php" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> -->
                     
                     </div>
                    </div>
                  </div> 
 
          
        </form>
      
 