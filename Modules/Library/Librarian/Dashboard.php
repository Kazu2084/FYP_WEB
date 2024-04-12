<?php
include('../Common/librarian-sidenav-header.php');
include('connection.php');
?>

<div class="app-content">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Dashboard</h1>
	</div>

	<div class="app-content-actions">
	<div style="display: flex;">
        <div style="flex: 1;">
            <h3>No. of Copies</h3>
            <canvas id="profitPieChart" width="450" height="450"></canvas>
        </div>
        <div style="flex: 1;">
            <h3>No. of times borrowed/Book</h3>
            <canvas id="profitBarChart" width="450" height="400"></canvas>
        </div>
    </div>
    <script src="dashboard.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
