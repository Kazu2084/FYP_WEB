<!DOCTYPE html>
<html lang="en">


</head>

<body>

    <?php include('../Common/admin-sidenav-header.php') ?>


    <div class="app-content">
        <div class="app-content-header">
            <h1 class="app-content-headerText">Manage Orders</h1>
            <a href="#" onclick="window.print()" class="btn btn-sm btn-success" data-toggle="modal"
                data-target="#modalForExam">Print</a>
        </div>

        <div class="app-content-actions">
            <div class="products-area-wrapper tableView">
                <div class="products-header">
                    <div class="product-cell">Order ID</div>
                    <div class="product-cell">User ID</div>
                    <div class="product-cell">Address</div>
                    <div class="product-cell">Phone No</div>
                    <div class="product-cell">Amount</div>
                    <div class="product-cell">Payment Mode</div>
                    <div class="product-cell">Order Date</div>
                    <div class="product-cell">Status</div>
                    <div class="product-cell">Items</div>


                </div>

                <?php
                $sql = "SELECT * FROM `cafe_orders`";
                $result = mysqli_query($conn, $sql);
                $counter = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $Id = $row['userId'];
                    $orderId = $row['orderId'];
                    $address = $row['address'];
                    $zipCode = $row['zipCode'];
                    $phoneNo = $row['phoneNo'];
                    $amount = $row['amount'];
                    $orderDate = $row['orderDate'];
                    $paymentMode = $row['paymentMode'];

                    if ($paymentMode == 0) {
                        $paymentMode = "Cash on Delivery";
                    } else {
                        $paymentMode = "Online";
                    }
                    $orderStatus = $row['orderStatus'];
                    $counter++;

                    echo '<div class="products-row">
                                <div class="product-cell"><span>' . $orderId . '</span></div>
                                <div class="product-cell"><span>' . $Id . '</span></div>
                                <div class="product-cell"' . $address . '"><span>' . substr($address, 0, 20) . '...</span></div>
                                <div class="product-cell"><span>' . $phoneNo . '</span></div>
                                <div class="product-cell"><span>' . $amount . '</span></div>
                                <div class="product-cell"><span>' . $paymentMode . '</span></div>
                                <div class="product-cell"><span>' . $orderDate . '</span></div>
                                <div class="product-cell"><span><a class ="btn btn-primary" href="#" data-toggle="modal" data-target="#orderStatus' . $orderId . '" class="view">View</a></span></div>
                                <div class="product-cell"><span><a class="btn btn-primary" href="#" data-toggle="modal" data-target="#orderItem' . $orderId . '" class="view" title="View Details">View</a></span></div>
                            </div>';
                }
                if ($counter == 0) {
                    ?>
                    <script> document.getElementById("NoOrder").innerHTML = '<div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%"> You have not Recieve any Order!	</div>';</script>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
    </div>

    <?php
    include 'partials/_orderItemModal.php';
    include 'partials/_orderStatusModal.php';
    ?>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        .tooltip.show {
            top: -62px !important;
        }

        .table-wrapper .btn {
            float: right;
            color: #333;
            background-color: #fff;
            border-radius: 3px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-wrapper .btn:hover {
            color: #333;
            background: #f2f2f2;
        }

        .table-wrapper .btn.btn-primary {
            color: #fff;
            background: #03A9F4;
        }

        .table-wrapper .btn.btn-primary:hover {
            background: #03a3e7;
        }

        .table-title .btn {
            font-size: 13px;
            border: none;
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        .table-title {
            color: #fff;
            background: #4b5366;
            padding: 16px 25px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 80px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            /* background-color: #fcfcfc; */
        }

        table.table-striped.table-hover tbody tr:hover {
            /* background: #f5f5f5; */
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
        }

        table.table td a:hover {
            color: #2196F3;
        }

        table.table td a.view {
            width: 30px;
            height: 30px;
            color: #2196F3;
            border: 2px solid;
            border-radius: 30px;
            text-align: center;
        }

        table.table td a.view i {
            font-size: 22px;
            margin: 2px 0 0 1px;
        }

        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }

        table {
            counter-reset: section;
        }

        .count:before {
            counter-increment: section;
            content: counter(section);
        }
    </style>

    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>