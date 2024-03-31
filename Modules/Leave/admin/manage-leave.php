<?php
// session_start();
// error_reporting(0);
include ('../includes/connection.php');
include "../Common/admin-sidenav-header.php";

?>
<!doctype html>
<html class="no-js" lang="en">

<body>



    <div class="app-content">
        <div class="app-content-header">
            <h1 class="app-content-headerText">Dashboard</h1>

        </div>

        <div class="app-content-actions">
            <div class="products-area-wrapper tableView">
                <div class="products-header">


                    <div class="product-cell">S.N</div>
                    <div class="product-cell">Staff ID</div>
                    <div class="product-cell">Full Name</div>
                    <div class="product-cell">Leave Type</div>
                    <div class="product-cell">Applied On</div>
                    <div class="product-cell">Current Status</div>
                    <div class="product-cell"></div>
                </div>

                <?php

                $sql = "SELECT tblleaves.id as lid,teacher_info.first_name,teacher_info.last_name,teacher_info.teacher_id,tblleaves.LeaveType,tblleaves.PostingDate,tblleaves.Status from tblleaves join teacher_info on tblleaves.empid=teacher_info.teacher_id order by lid desc";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1;
                if ($query->rowCount() > 0) {
                    foreach ($results as $result) {
                        ?>

                        <div class="products-row">
                            <div class="product-cell"><span> <b>
                                        <?php echo htmlentities($cnt); ?>
                                    </b></span></div>
                            <div class="product-cell"><span>
                                 <?php echo htmlentities($result->teacher_id); ?> 
                                </span></div>
                            <div class="product-cell"><span>
                                    <?php echo htmlentities($result->first_name . " " . $result->last_name); ?>
                                </span></div>
                            <div class="product-cell"><span>
                                    <?php echo htmlentities($result->LeaveType); ?>
                                </span></div>
                            <div class="product-cell"><span>
                                    <?php echo htmlentities($result->PostingDate); ?>
                                </span></div>
                            <div class="product-cell"><span>
                                    <?php $stats = $result->Status;

                                    if ($stats == 1) {
                                        ?>
                                        <span>Approved </span>
                                    <?php }
                                    if ($stats == 2) { ?>
                                        <span>Declined </span>
                                    <?php }
                                    if ($stats == 0) { ?>
                                        <span>Pending </span>
                                    <?php } ?>

                                </span></div>


                            <div class="product-cell"><span><a
                                        href="employeeLeave-details.php?leaveid=<?php echo htmlentities($result->lid); ?>"
                                        class="btn btn-primary btn-sm">View Details</a></span></div>
                        </div>
                        <?php $cnt++;
                    }
                } ?>

            </div>
        </div>
    </div>
    </div>
    </div>