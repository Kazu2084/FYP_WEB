<?php
    include '../includes/connection.php';

    if (isset($_SESSION["LoginTeacher"])) {
        $current_session = $_SESSION['LoginTeacher'];
        $eid =  $_SESSION['teacher_id'];
      }elseif (isset($_SESSION["LoginStaff"])) {
        $current_session = $_SESSION['LoginStaff'];
        $eid =  $_SESSION['staff_id'];
      }
    //$eid=$_SESSION['eid'];
    $sql = "SELECT first_name,last_name, teacher_id from  teacher_info where teacher_id=:eid";
    $query = $dbh -> prepare($sql);
    $query->bindParam(':eid',$eid,PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;

    if($query->rowCount() > 0){
        foreach($results as $result)
    {    ?>
        <p style="color:white;"><?php echo htmlentities($result->first_name." ".$result->last_name);?></p>
        <span><?php echo htmlentities($result->teacher_id)?></span>
<?php }
    } 
?>