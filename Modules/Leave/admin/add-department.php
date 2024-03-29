<?php
session_start();
error_reporting(0);
include('../includes/connection.php');
include "../Common/admin-sidenav-header.php";

    if (isset($_POST['add'])) {

        $deptname = $_POST['departmentname'];
        $deptshortname = $_POST['departmentshortname'];
        $deptcode = $_POST['deptcode'];
        $sql = "INSERT INTO tbldepartments(DepartmentName,DepartmentCode,DepartmentShortName) VALUES(:deptname,:deptcode,:deptshortname)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':deptname', $deptname, PDO::PARAM_STR);
        $query->bindParam(':deptcode', $deptcode, PDO::PARAM_STR);
        $query->bindParam(':deptshortname', $deptshortname, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();

        if ($lastInsertId) {
            $msg = "Department Created Successfully";
        } else {
            $error = "Something went wrong. Please try again";
        }

    }

    ?>

    <!doctype html>
    <html class="no-js" lang="en">



    <body>



        <div class="app-content">
            <div class="app-content-header">
                <h1 class="app-content-headerText">Add Department</h1>

            </div>

            <div class="app-content-actions">

                <form method="POST">
                    <div class="card-body">


                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Department Name</label>
                            <input class="form-control" name="departmentname" type="text" required id="example-text-input">
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Shortform</label>
                            <input class="form-control" name="departmentshortname" type="text" autocomplete="off" required
                                id="example-text-input">
                        </div>

                        <div class="form-group">
                            <label for="example-email-input" class="col-form-label">Code</label>
                            <input class="form-control" name="deptcode" type="text" autocomplete="off" required
                                id="example-email-input">
                        </div>
<br>
                        <button class="btn btn-primary" name="add" id="add" type="submit">ADD</button>

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
