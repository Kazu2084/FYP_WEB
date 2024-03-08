<?php
    session_start();
    error_reporting(0);
    include('../includes/dbconn.php');
include "../Common/admin-sidenav-header.php";

    if(strlen($_SESSION['alogin'])==0){   
    header('location:index.php');
    } else {
    if(isset($_POST['update'])){
    $lid=intval($_GET['lid']);
    $leavetype=$_POST['leavetype'];
    $description=$_POST['description'];
    $sql="UPDATE tblleavetype set LeaveType=:leavetype,Description=:description where id=:lid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':leavetype',$leavetype,PDO::PARAM_STR);
    $query->bindParam(':description',$description,PDO::PARAM_STR);
    $query->bindParam(':lid',$lid,PDO::PARAM_STR);
    $query->execute();

    $msg="Leave type updated successfully";


    }

?>

<!doctype html>
<html class="no-js" lang="en">



<body>



        <div class="app-content">
            <div class="app-content-header">
                <h1 class="app-content-headerText">Edit Leave Type</h1>

            </div>

            <div class="app-content-actions">
    
   
                                 <form method="POST">
                                 <div class="card-body">
                                        

                                        <?php
                                            $lid=intval($_GET['lid']);
                                            $sql = "SELECT * from tblleavetype where id=:lid";
                                            $query = $dbh -> prepare($sql);
                                            $query->bindParam(':lid',$lid,PDO::PARAM_STR);
                                            $query->execute();
                                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt=1;
                                            if($query->rowCount() > 0)
                                            {
                                            foreach($results as $result)
                                            {               ?> 
                                    

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Leave Type</label>
                                            <input class="form-control form-control-lg" name="leavetype" type="text" required id="example-text-input" value="<?php echo htmlentities($result->LeaveType);?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Short Description</label>
                                            <input class="form-control form-control-lg" name="description" type="text" autocomplete="off" required id="example-text-input" value="<?php echo htmlentities($result->Description);?>" required>
                                                
                                        </div>

                                        <?php }
                                        }?>
<br>
                                        <button class="btn btn-primary" name="update" id="update" type="submit">Update</button>
                                        
                                    </div>
                         </form>
                        </div>
                    </div>
                    
                    
                </div>
                
                
                </div>
                
            </div>
            
        
        </div>
        

        

    </div>
    
</body>

</html>

<?php } ?>