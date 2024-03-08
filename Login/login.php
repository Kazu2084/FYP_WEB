<!-- PHP Starts Here -->
<?php 
session_start();
    require_once "../Connection/connection.php"; 
    $message="Email Or Password Does Not Match";
    if(isset($_POST["btnlogin"]))
    {
        $username=$_POST["email"];
        $password=$_POST["password"];

        $query="select * from login where username='$username' and password='$password' ";
        $result=mysqli_query($con,$query);
        if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_array($result)) {
                if ($row["role"]=="Admin")
                {?>
                    <script>alert("admin");</script><?php
                    $_SESSION['LoginAdmin']=$row["username"];
                    header('Location: ../ERP_Homepage/Admin/homepage.php');
                }
                else if ($row["role"]=="Teacher")
                {
                    $_SESSION['LoginTeacher']=$row["user_id"];
                    header('Location: ../ERP_Homepage/Teacher/homepage.php');
                }
                else if ($row["role"]=="Student")
                {
                    $_SESSION['LoginStudent']=$row['user_id'];
                    header('Location: ../ERP_Homepage/Student/homepage.php');
                }
                else if ($row["role"]=="Staff")
                {
                    $_SESSION['LoginStaff']=$row['username'];
                    header('Location: ../ERP_Homepage/Staff/homepage.php');
                }
                else if ($row["role"]=="Librarian")
                {
                    $_SESSION['LoginStudent']=$row['user_id'];
                    header('Location: ../student/student-index.php');
                }
                else if ($row["role"]=="Placement")
                {
                    $_SESSION['LoginStudent']=$row['user_id'];
                    header('Location: ../student/student-index.php');
                }
                else if ($row["role"]=="Examiner")
                {
                    $_SESSION['LoginStudent']=$row['user_id'];
                    header('Location: ../student/student-index.php');
                }
                else if ($row["role"]=="Chef")
                {
                    $_SESSION['LoginStudent']=$row['user_id'];
                    header('Location: ../student/student-index.php');
                }
                else if ($row["role"]=="Warden")
                {
                    $_SESSION['LoginStudent']=$row['user_id'];
                    header('Location: ../student/student-index.php');
                }
            }
        }
        else
        { 
            header("Location: index.html");
        }
    }
?>