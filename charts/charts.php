<h3 class="fw-bold mb-3">Summary</h3>
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Line Chart</div>
      </div>
      <div class="card-body">
        <div class="chart-container">
          <canvas id="lineChart"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Bar Chart</div>
      </div>
      <div class="card-body">
        <div class="chart-container">
          <canvas id="barChart"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Doughnut Chart</div>
      </div>
      <div class="card-body">
        <div class="chart-container">
          <canvas id="doughnutChart" style="width: 50%; height: 50%"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Multiple Bar Chart</div>
      </div>
      <div class="card-body">
        <div class="chart-container">
          <canvas id="multipleBarChart"></canvas>
        </div>
      </div>
    </div>
  </div>
  
</div>
<script src="../assets/js/core/jquery-3.7.1.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<!-- Chart JS -->
<script src="../assets/js/plugin/chart.js/chart.min.js"></script>
<!-- jQuery Scrollbar -->
<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<!-- Kaiadmin JS -->
<script src="../assets/js/kaiadmin.min.js"></script>
<!-- Kaiadmin DEMO methods, don't include it in your project! -->
<script src="../assets/js/setting-demo2.js"></script>
<script>
  var lineChart = document.getElementById("lineChart").getContext("2d"),
    barChart = document.getElementById("barChart").getContext("2d"),
    doughnutChart = document
    .getElementById("doughnutChart")
    .getContext("2d"),
    multipleBarChart = document
    .getElementById("multipleBarChart")
    .getContext("2d");

  var myLineChart = new Chart(lineChart, {
    type: "line",
    data: {
      labels: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
      ],
      datasets: [{
        label: "Active Users",
        borderColor: "#1d7af3",
        pointBorderColor: "#FFF",
        pointBackgroundColor: "#1d7af3",
        pointBorderWidth: 2,
        pointHoverRadius: 4,
        pointHoverBorderWidth: 1,
        pointRadius: 4,
        backgroundColor: "transparent",
        fill: true,
        borderWidth: 2,
        data: [
          542, 480, 430, 550, 530, 453, 380, 434, 568, 610, 700, 900,
        ],
      }, ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      legend: {
        position: "bottom",
        labels: {
          padding: 10,
          fontColor: "#1d7af3",
        },
      },
      tooltips: {
        bodySpacing: 4,
        mode: "nearest",
        intersect: 0,
        position: "nearest",
        xPadding: 10,
        yPadding: 10,
        caretPadding: 10,
      },
      layout: {
        padding: {
          left: 15,
          right: 15,
          top: 15,
          bottom: 15
        },
      },
    },
  });

  var myBarChart = new Chart(barChart, {
    type: "bar",
    data: {
      labels: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
      ],
      datasets: [{
        label: "Sales",
        backgroundColor: "rgb(23, 125, 255)",
        borderColor: "rgb(23, 125, 255)",
        data: [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4],
      }, ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true,
          },
        }, ],
      },
    },
  });

  var myDoughnutChart = new Chart(doughnutChart, {
    type: "doughnut",
    data: {
      datasets: [{
        data: [10, 20, 30],
        backgroundColor: ["#f3545d", "#fdaf4b", "#1d7af3"],
      }, ],

      labels: ["Red", "Yellow", "Blue"],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      legend: {
        position: "bottom",
      },
      layout: {
        padding: {
          left: 20,
          right: 20,
          top: 20,
          bottom: 20,
        },
      },
    },
  });

  var myMultipleBarChart = new Chart(multipleBarChart, {
    type: "bar",
    data: {
      labels: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
      ],
      datasets: [{
          label: "First time visitors",
          backgroundColor: "#59d05d",
          borderColor: "#59d05d",
          data: [95, 100, 112, 101, 144, 159, 178, 156, 188, 190, 210, 245],
        },
        {
          label: "Visitors",
          backgroundColor: "#fdaf4b",
          borderColor: "#fdaf4b",
          data: [
            145, 256, 244, 233, 210, 279, 287, 253, 287, 299, 312, 356,
          ],
        },
        {
          label: "Pageview",
          backgroundColor: "#177dff",
          borderColor: "#177dff",
          data: [
            185, 279, 273, 287, 234, 312, 322, 286, 301, 320, 346, 399,
          ],
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      legend: {
        position: "bottom",
      },
      title: {
        display: true,
        text: "Traffic Stats",
      },
      tooltips: {
        mode: "index",
        intersect: false,
      },
      responsive: true,
      scales: {
        xAxes: [{
          stacked: true,
        }, ],
        yAxes: [{
          stacked: true,
        }, ],
      },
    },
  });

</script>