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
            <canvas id="profitPieChart" width="600" height="500"></canvas>
        </div>
        <div style="flex: 1;">
            <h3>No. of Copies</h3>
            <canvas id="profitBarChart" width="600" height="500"></canvas>
        </div>
    </div>
    <script src="dashboard.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
