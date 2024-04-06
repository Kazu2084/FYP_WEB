<?php
include("connection.php");

// Fetch data for pie chart
$sqlPie = "select book_title, book_copies FROM book GROUP BY book_title";
$resultPie = $conn->query($sqlPie);

$dataPie = array();

if ($resultPie->num_rows > 0) {
    while($row = $resultPie->fetch_assoc()) {
        $dataPie[] = $row;
    }
}

// Fetch data for bar graph
$sqlBar = "select book_title, book_copies FROM book GROUP BY book_title";
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
