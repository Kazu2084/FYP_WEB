<?php 
session_start();
if ($_SESSION['LoginAdmin']){
    $id_session=$_SESSION['LoginAdmin'];
}
else if ($_SESSION['LoginLibrarian']){
    
    $id_session=$_SESSION['LoginLibrarian'];
}
else{
    header('location:book.php');
}
?>