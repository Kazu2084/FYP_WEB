<?php
include("connection.php");

// Fetch data for pie chart
$sqlPie = "select COUNT(productId) as total, categorieName from cafe_categories , cafe_product where cafe_categories.categorieId = cafe_product.productCategorieId GROUP BY categorieName";
$resultPie = $conn->query($sqlPie);

$dataPie = array();

if ($resultPie->num_rows > 0) {
    while($row = $resultPie->fetch_assoc()) {
        $dataPie[] = $row;
    }
}

// Fetch data for bar graph
$sqlBar = "select userId, SUM(amount) as total FROM cafe_orders GROUP BY userId";
$resultBar = $conn->query($sqlBar);

$dataBar = array();

if ($resultBar->num_rows > 0) {
    while($row = $resultBar->fetch_assoc()) {
        $dataBar[] = $row;
    }
}

$conn->close();

// Return data as JSON
header('Content-Type: application/json');
echo json_encode(array("pie_chart_data" => $dataPie, "bar_chart_data" => $dataBar));
?>
