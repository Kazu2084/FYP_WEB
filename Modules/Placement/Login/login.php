<!-- PHP Starts Here -->
<?php  
    session_start();
    require_once "../Connection/connection.php"; 
    $message="Email Or Password Does Not Match";
    if(isset($_POST["btnlogin"]))
    {
        $username=$_POST["email"];
        $password=$_POST["password"];

        $_SESSION['email'] = $username;
        $_SESSION['password'] = $password;

        $query="select * from login where user_id='$username' and Password='$password' ";
        $result=mysqli_query($conn,$query);
        if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_array($result)) {
                if ($row["Role"]=="Admin")
                {
                    $_SESSION['LoginAdmin']=$row["user_id"];
                    header('Location: ../admin/company/');
                }
                else if($row["Role"]=="Applicant")
                {
                    $_SESSION['LoginApplicant']=$row['user_id'];
                    header('Location: ../index.html');
                }
            }
        }
        else
        { 
            header("Location: ../login.php");
        }
    }
?>
