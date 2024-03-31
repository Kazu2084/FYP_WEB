<?php
// session_start();
//error_reporting(0);
include('../includes/connection.php');
include "../Common/admin-sidenav-header.php";


    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $sql = "DELETE from  tblleavetype  WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $msg = "Leave type record deleted";

    }
    ?>


    <body>



        <div class="app-content">
            <div class="app-content-header">
                <h1 class="app-content-headerText">Leave Info</h1>
                <a href="add-leavetype.php" class="btn btn-sm btn-info">Add New Leave Type</a>
            </div>

            <div class="app-content-actions">
                <div class="products-area-wrapper tableView">
                    <div class="products-header">
                        <div class="product-cell">#</div>
                        <div class="product-cell">Leave Type</div>
                        <div class="product-cell">Description</div>
                        <div class="product-cell">Created</div>
                        <div class="product-cell"></div>

                    </div>


                    <?php $sql = "SELECT * from tblleavetype";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) { ?>
                            <div class="products-row">
                                <div class="product-cell"><span>
                                        <?php echo htmlentities($cnt); ?>
                                    </span></div>
                                <div class="product-cell"><span>
                                        <?php echo htmlentities($result->LeaveType); ?>
                                    </span></div>
                                <div class="product-cell"><span>
                                        <?php echo htmlentities($result->Description); ?>
                                    </span></div>
                                <div class="product-cell"><span>
                                        <?php echo htmlentities($result->CreationDate); ?>
                                    </span></div>
                                <div class="product-cell"><span><a class="btn btn-primary"
                                            href="edit-leaveType.php?lid=<?php echo htmlentities($result->id); ?>">Edit</a>
                                        <a class="btn btn-primary" href="leave-section.php?del=<?php echo htmlentities($result->id); ?>"
                                            onclick="return confirm('Do you want to delete?');">Delete</a>
                                    </span></div>
                            </div>

                            <?php $cnt++;
                        }
                    } ?>
                   
                    
                </div>
            </div>
        </div>
        </div>


        </div>


        </div>

        </div>


        </div>




        </div>

    </body>

    </html>

