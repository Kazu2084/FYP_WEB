<?php
include('../Common/admin-sidenav-header.php');
include('connection.php');
?>

<div class="app-content">
	<div class="app-content-header">
		<h1 class="app-content-headerText">Dashboard</h1>
	</div>

	<div class="app-content-actions">
	<div style="display: flex;">
        <div style="flex: 1;">
            <h3>Fees /Person</h3>
            <canvas id="profitPieChart" width="450" height="450"></canvas>
        </div>
        <div style="flex: 1;">
            <h3>Seater/ Room</h3>
            <canvas id="profitBarChart" width="500" height="400"></canvas>
            <div style="text-align:center">Room Number</div>
        </div>
    </div>
    <script src="dashboard.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
