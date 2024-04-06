document.addEventListener('DOMContentLoaded', function() {
    fetch('fetch_data.php')
        .then(response => response.json())
        .then(data => {
            // Extract data for pie chart
            const pieLabels = data.pie_chart_data.map(item => item.book_title);
            const pieValues = data.pie_chart_data.map(item => item.book_copies);

            // Generate pie chart
            const pieCtx = document.getElementById('profitPieChart').getContext('2d');
            const pieChart = new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: pieLabels,
                    datasets: [{
                        label: 'No. of copies',
                        data: pieValues,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Profit Analysis by Category (Pie Chart)'
                    }
                }
            });

            // Extract data for bar graph
            const barLabels = data.bar_chart_data.map(item => item.book_title);
            const barValues = data.bar_chart_data.map(item => item.book_copies);

            // Generate bar graph
            const barCtx = document.getElementById('profitBarChart').getContext('2d');
            const barChart = new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: barLabels,
                    datasets: [{
                        label: 'No. of copies',
                        data: barValues,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: 'Profit Analysis by Category (Bar Graph)'
                    }
                }
            });
        })
        .catch(error => console.error('Error fetching data:', error));
});
