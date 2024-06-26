<?php
    session_start();
    include('../includes/dbconn.php');
    include('../includes/check-login.php');
    check_login();
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    
    <!-- <link href="../dist/css/style.min.css" rel="stylesheet"> -->
    
</head>

<body>
    
    
    
   
 
<?php include '../Common/student-sidenav-header.php';?>
            
            <div class="app-content">
    <div class="app-content-header">
        <h1 class="app-content-headerText">My Room Details</h1>
    </div>

    <div class="app-content-actions">

               
                
                 <div class="card">
                 
                   <div class="card-body">
                   
                      <div class="row">
                      
                      <div class="table-responsive">
                                    <table id="zctb" class="table table-striped table-bordered no-wrap">

                                        <tbody>

                                        <?php	
                                        $aid=$student_id;
                                        $ret="SELECT * from roomregistration where ID=?";
                                        $stmt= $mysqli->prepare($ret) ;
                                        $stmt->bind_param('s',$aid);
                                        $stmt->execute() ;
                                        $res=$stmt->get_result();
                                        $cnt=1;
                                        while($row=$res->fetch_object())
                                            {
                                                ?>

                                            <tr>
                                                <td colspan="3"><b>Date & Time of Registration: <?php echo $row->postingDate;?></b></td>
                                                
                                            </tr>

                                            <tr>

                                            <td><b>Room no :</b></td>
                                            <td><?php echo $row->roomno;?></td>

                                            <td><b>Starting Date :</b></td>
                                            <td><?php echo $row->stayfrom;?></td>

                                            <td><b>Seater :</b></td>
                                            <td><?php echo $row->seater;?></td>
                                            

                                            </tr>

                                            <tr>

                                            <td><b>Duration:</b></td>
                                            <td><?php echo $dr=$row->duration;?> Months</td>

                                            <td><b>Food Status:</b></td>
                                            <td>
                                            <?php if($row->foodstatus==0){
                                            echo "Not Required";
                                            } else {
                                            echo "Required";
                                            }
                                            ;?> </td>

                                            <td><b>Fees Per Month :</b></td>
                                            <td>&#8377;<?php echo $fpm=$row->feespm;?></td>

                                            

                                            </tr>

                                            <tr>
                                            <td colspan="6"><b>Total Fees (<?php echo ($dr).' months'?>) : 
                                            <?php if($row->foodstatus==1){ 
                                            $fd=211; 
                                            echo '&#8377;'.(($fd+$fpm)*$dr);
                                            } else {
                                            echo '$'.$dr*$fpm;
                                            }
                                            ?></b></td>
                                            </tr>


                                            <tr>
                                            <td><b>Registration Number :</b></td>
                                            <td><?php echo $row->regno;?></td>
                                            <td><b>Full Name :</b></td>
                                            <td><?php echo $row->firstName;?> <?php echo $row->middleName;?> <?php echo $row->lastName;?></td>
                                            <td><b>Email Address:</b></td>
                                            <td><?php echo $row->emailid;?></td>
                                            </tr>


                                            <tr>
                                            <td><b>Contact Number :</b></td>
                                            <td><?php echo $row->contactno;?></td>
                                            <td><b>Gender :</b></td>
                                            <td><?php echo $row->gender;?></td>
                                            <td><b>Selected Course :</b></td>
                                            <td><?php echo $row->course;?></td>
                                            </tr>


                                            <tr>
                                            <td><b>Emergency Contact No. :</b></td>
                                            <td><?php echo $row->egycontactno;?></td>
                                            <td><b>Guardian Name :</b></td>
                                            <td><?php echo $row->guardianName;?></td>
                                            <td><b>Guardian Relation :</b></td>
                                            <td><?php echo $row->guardianRelation;?></td>
                                            </tr>

                                            <tr>
                                            <td><b>Guardian Contact No. :</b></td>
                                            <td colspan="6"><?php echo $row->guardianContactno;?></td>
                                            </tr>

                                            <tr>
                                            <td><b>Current Address:</b></td>
                                            <td colspan="2">
                                            <?php echo $row->corresAddress;?><br />
                                            <?php echo $row->corresCIty;?>, <?php echo $row->corresPincode;?><br />
                                            <?php echo $row->corresState;?>


                                            </td>
                                            <td><b>Permanent Address:</b></td>
                                            <td colspan="2">
                                            <?php echo $row->pmntAddress;?><br />
                                            <?php echo $row->pmntCity;?>, <?php echo $row->pmntPincode;?><br />	

                                            </td>
                                            </tr>


                                            <?php
                                            $cnt=$cnt+1;
                                            } ?>

                                        </tbody>
                                    </table>
                                   
                                </div>
                      
                      
                      </div>
                   
                   
                   </div>
                 
                 
                 </div>

                <!-- Table column end -->

            </div>
            
          
           
        </div>
        
    </div>
    
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.min.js"></script>
</body>

</html>