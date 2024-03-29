<?php
session_start();
//error_reporting(0);
include('../includes/connection.php');
include "../Common/admin-sidenav-header.php";


    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $sql = "DELETE from  tbldepartments  WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $msg = "The selected department has been deleted";

    }

    ?>

    <!doctype html>
    <html class="no-js" lang="en">


    <body>

        <div class="app-content">
            <div class="app-content-header">
                <h1 class="app-content-headerText">Departments</h1>
                <a href="add-department.php" class="btn btn-sm btn-info">Add New Department</a>

            </div>

            <div class="app-content-actions">
                <div class="products-area-wrapper tableView">
                    <div class="products-header">
                        <div class="product-cell">#</div>
                        <div class="product-cell">Department</div>
                        <div class="product-cell">Shortform</div>
                        <div class="product-cell">Code</div>
                        <div class="product-cell">Created Date</div>

                        <div class="product-cell">Action</div>
                    </div>

                    <?php $sql = "SELECT * from tbldepartments";
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
                                        <?php echo htmlentities($result->DepartmentName); ?>
                                    </span></div>
                                <div class="product-cell"><span>
                                        <?php echo htmlentities($result->DepartmentShortName); ?>
                                    </span></div>
                                <div class="product-cell"><span>
                                        <?php echo htmlentities($result->DepartmentCode); ?>
                                    </span></div>
                                <div class="product-cell"><span>
                                        <?php echo htmlentities($result->CreationDate); ?>
                                    </span></div>
                                <div class="product-cell"><span><a class="btn btn-primary"
                                            href="edit-department.php?deptid=<?php echo htmlentities($result->id); ?>">Edit</a>&nbsp;<a
                                            class="btn btn-primary" href="department.php?del=<?php echo htmlentities($result->id); ?>"
                                            onclick="return confirm('Do you want to delete');"> Delete</a></span></div>
                            </div>
                            <?php $cnt++;
                        }
                    } ?>

                </div>
            </div>
        </div>
        </div>




    </body>

    </html>

