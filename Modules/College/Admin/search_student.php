
<?php
session_start();
if (!$_SESSION["LoginAdmin"]) {
	header('location:../../../Login/index.html');
}
require_once "../../../Connection/connection.php";
?>




<!---------------- Search Student form here ------------------------>

<?php
	if(isset($_POST["btnSearch"]))
    {
		$userId = $_POST['search'];
        $query="select * from login where ID='$userId' ";
        $result=mysqli_query($con,$query);
        if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_array($result)) {
				echo $_SESSION['LoginStudent']=$row['user_id'];
				header('Location: ../student/student-index.php');
            }
        }
        else
        { 
            header("Location: student.php");
        }
	}
	
?>

<!---------------- Search Student form here ------------------------>