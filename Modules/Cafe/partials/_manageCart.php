<?php
include '_dbconnect.php';
// session_start();

// require_once "../../../Connection/connection.php";

session_start();
if (isset($_SESSION["LoginStudent"])) {
  $username = $_SESSION['LoginStudent'];
  $userId =  $_SESSION['student_id'];
  $loggedin= true;
} elseif (isset($_SESSION["LoginTeacher"])) {
  $username = $_SESSION['LoginTeacher'];
  $userId =  $_SESSION['teacher_id'];
  $loggedin= true;
} elseif (isset($_SESSION["LoginStaff"])) {
  $username = $_SESSION['LoginStaff'];
  $userId =  $_SESSION['staff_id'];
  $loggedin= true;
}


if($_SERVER["REQUEST_METHOD"] == "POST") {
    //$userId = $_SESSION['userId'];
    if(isset($_POST['addToCart'])) {
        $itemId = $_POST["itemId"];
        // Check whether this item exists
        $existSql = "SELECT * FROM `viewcart` WHERE productId = '$itemId' AND `userId`='$userId'";
        $result = mysqli_query($conn, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if($numExistRows > 0){
            echo "<script>alert('Item Already Added.');
                    window.history.back(1);
                    </script>";
        }
        else{
            $sql = "INSERT INTO `viewcart` (`productId`, `itemQuantity`, `userId`, `addedDate`) VALUES ('$itemId', '1', '$userId', current_timestamp())";   
            $result = mysqli_query($conn, $sql);
            if ($result){
                echo "<script>
                    window.history.back(1);
                    </script>";
            }
        }
    }
    if(isset($_POST['removeItem'])) {
        $itemId = $_POST["itemId"];
        $sql = "DELETE FROM `viewcart` WHERE `productId`='$itemId' AND `userId`='$userId'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Removed');
                window.history.back(1);
            </script>";
    }
    if(isset($_POST['removeAllItem'])) {
        $sql = "DELETE FROM `viewcart` WHERE `userId`='$userId'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Removed All');
                window.history.back(1);
            </script>";
    }
    if(isset($_POST['checkout'])) {
         $amount = $_POST["amount"];
        // $address1 = $_POST["address"];
        // $address2 = $_POST["address1"];
        //$phone = $_POST["phone"];
        // $zipcode = $_POST["zipcode"];
      
        // $address = $address1.", ".$address2;
        
        
        // $passSql = "SELECT * FROM common_info WHERE id=$userId"; 
        // $passResult = mysqli_query($conn, $passSql);
        // $passRow=mysqli_fetch_assoc($passResult);
        // $userName = $passRow['first_name'];
        if (true){ 
            $sql = "INSERT INTO `cafe_orders` (`userId`, `amount`, `paymentMode`, `orderStatus`, `orderDate`) VALUES ('$userId', '$amount', '0', '0', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            $orderId = $conn->insert_id;
            if ($result){
                $addSql = "SELECT * FROM `viewcart` WHERE userId='$userId'"; 
                $addResult = mysqli_query($conn, $addSql);
                while($addrow = mysqli_fetch_assoc($addResult)){
                    $pizzaId = $addrow['productId'];
                    $itemQuantity = $addrow['itemQuantity'];
                    $itemSql = "INSERT INTO `orderitems` (`orderId`, `productId`, `itemQuantity`) VALUES ('$orderId', '$pizzaId', '$itemQuantity')";
                    $itemResult = mysqli_query($conn, $itemSql);
                }
                $deletesql = "DELETE FROM `viewcart` WHERE `userId`='$userId'";   
                $deleteresult = mysqli_query($conn, $deletesql);
                echo '<script>alert("Thanks for ordering with us. Your order id is ' .$orderId. '.");
                    window.location.href="http://localhost/FYP_ERP/Modules/Cafe/index.php";  
                    </script>';
                    exit();
            }
        } 
        else{
            echo '<script>alert("Cannot place the order.");
             window.history.back(1);
                    </script>';
                     exit();
        }    
    }
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
    {
        $pizzaId = $_POST['pizzaId'];
        $qty = $_POST['quantity'];
        $updatesql = "UPDATE `viewcart` SET `itemQuantity`='$qty' WHERE `productId`='$pizzaId' AND `userId`='$userId'";
        $updateresult = mysqli_query($conn, $updatesql);
    }
    
}
?>