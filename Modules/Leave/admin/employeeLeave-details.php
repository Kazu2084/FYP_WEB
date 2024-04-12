<?php
    // session_start();
    // error_reporting(0);
    include('../includes/connection.php');
    include "../Common/admin-sidenav-header.php";
  

    // code for update the read notification status
    $isread=1;
    $did=intval($_GET['leaveid']);  
    date_default_timezone_set('Asia/Kolkata');
    $admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
    $sql="UPDATE tblleaves set IsRead=:isread where id=:did";
    $query = $dbh->prepare($sql);
    $query->bindParam(':isread',$isread,PDO::PARAM_STR);
    $query->bindParam(':did',$did,PDO::PARAM_STR);
    $query->execute();

    // code for action taken on leave
    if(isset($_POST['update'])){ 
    $did=intval($_GET['leaveid']);
    $description=$_POST['description'];
    $status=$_POST['status'];   
    date_default_timezone_set('Asia/Kolkata');
    $admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));

    $sql="UPDATE tblleaves set AdminRemark=:description,Status=:status,AdminRemarkDate=:admremarkdate where id=:did";
    $query = $dbh->prepare($sql);
    $query->bindParam(':description',$description,PDO::PARAM_STR);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->bindParam(':admremarkdate',$admremarkdate,PDO::PARAM_STR);
    $query->bindParam(':did',$did,PDO::PARAM_STR);
    $query->execute();
    $msg="Leave updated Successfully";
    } ?>

<!doctype html>
<html class="no-js" lang="en">


<body>



        <div class="app-content">
            <div class="app-content-header">
                <h1 class="app-content-headerText">Leave Details</h1>

            </div>

            <div class="app-content-actions">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center">
                                            
                        

                                            <?php 
                                            $lid=intval($_GET['leaveid']);
                                            $sql = "SELECT tblleaves.id as lid,common_info.first_name,common_info.last_name,common_info.id,common_info.gender,common_info.email,tblleaves.LeaveType,tblleaves.ToDate,tblleaves.FromDate,tblleaves.Description,tblleaves.PostingDate,tblleaves.Status,tblleaves.AdminRemark,tblleaves.AdminRemarkDate from tblleaves join common_info on tblleaves.empid=common_info.id where tblleaves.id=:lid";
                                            $query = $dbh -> prepare($sql);
                                            $query->bindParam(':lid',$lid,PDO::PARAM_STR);
                                            $query->execute();
                                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt=1;
                                            if($query->rowCount() > 0)
                                            {
                                            foreach($results as $result)
                                            {         
                                                ?>

                                                <tr>

                                                <td ><b>Staff ID:</b></span></div>
                                              <td colspan="1"><?php echo htmlentities($result->id);?></span></div>
                                            <div class="product-cell"><span> <b>Staff Name:</b></span></div>
                                              <td colspan="1"><a href="update-employee.php?empid=<?php echo htmlentities($result->id);?>" target="_blank">
                                                <?php echo htmlentities($result->first_name." ".$result->last_name);?></a></span></div>

                                              <td ><b>Gender :</b></span></div>
                                              <td colspan="1"><?php echo htmlentities($result->gender);?></span></div>
                                          </div>

                                          <tr>
                                             <td ><b>Staff Email:</b></span></div>
                                            <td colspan="1"><?php echo htmlentities($result->email);?></span></div>
                                             

                                            <td ><b>Leave Type:</b></span></div>
                                            <td colspan="1"><?php echo htmlentities($result->LeaveType);?></span></div>
                                            
                                        </div>

                                    <tr>
                                             
                                             <td ><b>Leave From:</b></span></div>
                                            <td colspan="1"><?php echo htmlentities($result->FromDate);?></span></div>
                                            <td><b>Leave Upto:</b></span></div>
                                            <td colspan="1"><?php echo htmlentities($result->ToDate);?></span></div>
                                            
                                        </div>

                                    

                                <tr>
                                <td ><b>Leave Applied:</b></span></div>
                                <div class="product-cell"><span><?php echo htmlentities($result->PostingDate);?></span></div>

                                <td ><b>Status:</b></span></div>
                                <div class="product-cell"><span><?php $stats=$result->Status;
                                if($stats==1){
                                ?>
                                    <span style="color: green">Approved</span>
                                    <?php } if($stats==2)  { ?>
                                    <span style="color: red">Declined</span>
                                    <?php } if($stats==0)  { ?>
                                    <span style="color: blue">Pending</span>
                                    <?php } ?>
                                    </span></div>

                                    
                                </div>

                                <tr>
                                     <td ><b>Leave Conditions: </b></span></div>
                                     <td colspan="5"><?php echo htmlentities($result->Description);?></span></div>
                                          
                                </div>

                                <tr>
                                    <td ><b>Admin Remark: </b></span></div>
                                    <td colspan="12"><?php
                                    if($result->AdminRemark==""){
                                    echo "Waiting for Action";  
                                    }
                                    else{
                                    echo htmlentities($result->AdminRemark);
                                    }
                                    ?></span></div>
                                </div>

                                <tr>
                                <td ><b>Admin Action On: </b></span></div>
                                    <div class="product-cell"><span><?php
                                    if($result->AdminRemarkDate==""){
                                    echo "NA";  
                                    }
                                    else{
                                    echo htmlentities($result->AdminRemarkDate);
                                    }
                                    ?></span></div>
                                </div>

                                
                                <?php 
                                if($stats==0)
                                {

                                ?>
                            <tr>
                            <td colspan="12">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">SET ACTION</button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">SET ACTION</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="POST" name="adminaction">
                                <div class="modal-body">
                                
                                    <select class="custom-select" name="status" required="">
                                        <option value="">Choose...</option>
                                        <option value="1">Approve</option>
                                        <option value="2">Decline</option>
                                    </select></p>
                                    <br>
                                    <p><textarea id="textarea1" name="description" class="form-control" name="description" placeholder="Description" row="5" maxlength="500" required></textarea></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" name="update">Apply</button>
                                </div>
                                </div>
                            </div>
                            </div>

                            </span></div>
                            </div>
                            <?php } ?>
                            </form>
                             </div>
                                         <?php $cnt++;} }?>
                                   
                                           
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Striped table end -->
                    
                </div>
                
                
                </div>
                
            </div>
            
        
        </div>
		
        

        

    </div>
    <!-- jquery latest version -->
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    
    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
</body>

</html>
