document.addEventListener("DOMContentLoaded", function () {
  fetch("fetch_data.php")
    .then((response) => response.json())
    .then((data) => {
      // Extract data for pie chart
      const pieLabels = data.pie_chart_data.map(
        (item) => item.firstName + " " + item.lastName
      );
      const pieValues = data.pie_chart_data.map((item) => item.feespm);

      // Generate pie chart
      const pieCtx = document.getElementById("profitPieChart").getContext("2d");
      const pieChart = new Chart(pieCtx, {
        type: "pie",
        data: {
          labels: pieLabels,
          datasets: [
            {
              label: "Fees",
              data: pieValues,
              backgroundColor: [
                "rgba(255, 99, 132, 0.5)",
                "rgba(54, 162, 235, 0.5)",
                "rgba(255, 206, 86, 0.5)",
                "rgba(75, 192, 192, 0.5)",
              ],
              borderColor: [
                "rgba(255, 99, 132, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
              ],
              borderWidth: 1,
            },
          ],
        },
        options: {
          title: {
            display: true,
            text: "Profit Analysis by Category (Pie Chart)",
          },
        },
      });

      // Extract data for bar graph
      const barLabels = data.bar_chart_data.map((item) => item.room_no);
      const barValues = data.bar_chart_data.map((item) => item.seater);

      // Generate bar graph
      const barCtx = document.getElementById("profitBarChart").getContext("2d");
      // X-axis variable (labels/categories)
      const xAxisLabel = "Room Number";

      // Y-axis variable (numerical values)
      const yAxisLabel = "Number of Seaters";

      const barChart = new Chart(barCtx, {
        type: "bar",
        data: {
          labels: barLabels,
          datasets: [
            {
              label: "No. of seaters",
              data: barValues,
              backgroundColor: "rgba(54, 162, 235, 0.5)",
              borderColor: "rgba(54, 162, 235, 1)",
              borderWidth: 1,
            },
          ],
        },
        options: {
          scales: {
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
                scaleLabel: {
                  display: true,
                  labelString: yAxisLabel,
                },
              },
            ],
            xAxes: [
              {
                scaleLabel: {
                  display: true,
                  labelString: xAxisLabel,
                },
              },
            ],
          },
          title: {
            display: true,
            text: "Profit Analysis by Category (Bar Graph)",
          },
        },
      });
    })
    .catch((error) => console.error("Error fetching data:", error));
});
