<?php
    include '../includes/dbconn.php';

    $sql = "SELECT id FROM roomregistration";
                $query = $mysqli->query($sql);
                echo "$query->num_rows";
?>