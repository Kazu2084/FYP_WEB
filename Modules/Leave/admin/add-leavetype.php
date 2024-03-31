<?php
// session_start();
error_reporting(0);
include('../includes/connection.php');
include "../Common/admin-sidenav-header.php";

    if (isset($_POST['add'])) {
        $leavetype = $_POST['leavetype'];
        $description = $_POST['description'];
        $sql = "INSERT INTO tblleavetype(LeaveType,Description) VALUES(:leavetype,:description)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':leavetype', $leavetype, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();

        if ($lastInsertId) {
            $msg = "Leave type added Successfully";
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
                <h1 class="app-content-headerText">Add Leave Type</h1>

            </div>

            <div class="app-content-actions">

                <form method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Leave Type</label>
                            <input class="form-control" name="leavetype" type="text" required id="example-text-input"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Short Description</label>
                            <input class="form-control" name="description" type="text" autocomplete="off" required
                                id="example-text-input" required>

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
