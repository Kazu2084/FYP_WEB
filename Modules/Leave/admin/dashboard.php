<?php
session_start();
error_reporting(0);
include('../includes/dbconn.php');
include "../Common/admin-sidenav-header.php";
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    ?>
    <!doctype html>
    <html class="no-js" lang="en">

    <body>



        <div class="app-content">
            <div class="app-content-header">
                <h1 class="app-content-headerText">Dashboard</h1>

            </div>

            <div class="app-content-actions">
             
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