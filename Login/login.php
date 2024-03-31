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
                if ($row["role"]=="admin")
                {?>
                    <script>alert("admin");</script><?php
                    $_SESSION['LoginAdmin']=$row["username"];
                    header('Location: ../ERP_Homepage/Admin/homepage.php');
                }
                else if ($row["role"]=="teacher")
                {
                    $_SESSION['LoginTeacher']=$row["username"];
                    $_SESSION['teacher_id']=$row['ID'];
                    header('Location: ../ERP_Homepage/Teacher/homepage.php');
                }
                else if ($row["role"]=="student")
                {
                    $_SESSION['LoginStudent']=$row['username'];
                    $_SESSION['student_id']=$row['ID'];
                    header('Location: ../ERP_Homepage/Student/homepage.php');
                }
                else if ($row["role"]=="staff")
                {
                    $_SESSION['LoginStaff']=$row['username'];
                    $_SESSION['staff_id']=$row['ID'];
                    header('Location: ../ERP_Homepage/Staff/homepage.php');
                }
                else if ($row["role"]=="librarian")
                {
                    $_SESSION['LoginLibrarian']=$row['username'];
                    header('Location: ../Modules/Library/Librarian/book.php');
                }
                else if ($row["role"]=="placement")
                {
                    $_SESSION['LoginPlacement']=$row['username'];
                    header('Location: ../Modules/PMS/admin/dashboard.php');
                }
                else if ($row["role"]=="examiner")
                {
                    $_SESSION['LoginExaminer']=$row['username'];
                    header('Location: http://localhost/FYP_ERP/Modules/Exam/adminpanel/admin/home.php');
                }
                else if ($row["role"]=="chef")
                {
                    $_SESSION['LoginChef']=$row['username'];
                    header('Location: ../Modules/Cafe/admin/home.php');
                }
                else if ($row["role"]=="warden")
                {
                    $_SESSION['LoginWarden']=$row['username'];
                    header('Location: ../Modules/Hostel/admin/dashboard.php');
                }
            }
        }
        else
        { 
            header("Location: index.html");
        }
    }
?>