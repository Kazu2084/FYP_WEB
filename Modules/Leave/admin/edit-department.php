<?php
session_start();
error_reporting(0);
include('../includes/connection.php');
include "../Common/admin-sidenav-header.php";

    if (isset($_POST['update'])) {

        $did = intval($_GET['deptid']);
        $deptname = $_POST['departmentname'];
        $deptshortname = $_POST['departmentshortname'];
        $deptcode = $_POST['deptcode'];
        $sql = "UPDATE tbldepartments set DepartmentName=:deptname,DepartmentCode=:deptcode,DepartmentShortName=:deptshortname where id=:did";
        $query = $dbh->prepare($sql);
        $query->bindParam(':deptname', $deptname, PDO::PARAM_STR);
        $query->bindParam(':deptcode', $deptcode, PDO::PARAM_STR);
        $query->bindParam(':deptshortname', $deptshortname, PDO::PARAM_STR);
        $query->bindParam(':did', $did, PDO::PARAM_STR);
        $query->execute();
        $msg = "Department updated Successfully";
    }

    ?>

    <!doctype html>
    <html class="no-js" lang="en">



    <body>



        <div class="app-content">
            <div class="app-content-header">
                <h1 class="app-content-headerText">Edit Department Info</h1>

            </div>

            <div class="app-content-actions">



                <form method="POST">
                    <div class="card-body">

                     

                        <?php
                        $did = intval($_GET['deptid']);
                        $sql = "SELECT * from tbldepartments WHERE id=:did";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':did', $did, PDO::PARAM_STR);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 1;
                        if ($query->rowCount() > 0) {
                            foreach ($results as $result) { ?>


                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Department Name</label>
                                    <input class="form-control" name="departmentname" type="text" required id="example-text-input"
                                        value="<?php echo htmlentities($result->DepartmentName); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Shortform</label>
                                    <input class="form-control" name="departmentshortname" type="text" autocomplete="off" required
                                        id="example-text-input" value="<?php echo htmlentities($result->DepartmentShortName); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="example-email-input" class="col-form-label">Code</label>
                                    <input class="form-control" name="deptcode" type="text" autocomplete="off" required
                                        id="example-email-input" value="<?php echo htmlentities($result->DepartmentCode); ?>">
                                </div>

                            <?php }
                        } ?>
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
