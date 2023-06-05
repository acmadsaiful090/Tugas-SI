var suhuData = {
  labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun"],
  datasets: [
      {
        label:"Suhu",
          fill: true, // Set fill to true
          backgroundColor: "rgba(75,192,192,0.4)", // Set background color
          borderColor: "rgba(75,192,192,1)",
          borderCapStyle: 'butt',
          borderDash: [],
          borderDashOffset: 0.0,
          borderJoinStyle: 'miter',
          pointBorderColor: "rgba(75,192,192,1)",
          pointBackgroundColor: "#fff",
          pointBorderWidth: 1,
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(75,192,192,1)",
          pointHoverBorderColor: "rgba(220,220,220,1)",
          pointHoverBorderWidth: 2,
          pointRadius: 1,
          pointHitRadius: 10,
          data: [20, 22, 23, 25, 27, 28],
      }
  ]
};

var suhuOptions = {
  scales: {
      yAxes: [{
          scaleLabel: {
              display: true,
              labelString: 'Suhu'
          },
          ticks: {
              beginAtZero: true
          }
      }]
  },
  legend: {
      display: false
  }
};

var suhuChart = new Chart(document.getElementById("suhuChart"), {
  type: 'line',
  data: suhuData,
  options: suhuOptions,
  options: {
    responsive: true,
    maintainAspectRatio: false
  }
});



var kelembabanData = {
  labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun"],
  datasets: [
    {
      label: "Kelembaban",
      fill: false,
      lineTension: 0.1,
      backgroundColor: "rgba(54, 162, 235, 0.2)",
      borderColor: "rgba(54, 162, 235, 1)",
      borderCapStyle: "butt",
      borderDash: [],
      borderDashOffset: 0.0,
      borderJoinStyle: "miter",
      pointBorderColor: "rgba(54, 162, 235, 1)",
      pointBackgroundColor: "#fff",
      pointBorderWidth: 1,
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(54, 162, 235, 1)",
      pointHoverBorderColor: "rgba(220, 220, 220, 1)",
      pointHoverBorderWidth: 2,
      pointRadius: 1,
      pointHitRadius: 10,
      data: [60, 62, 64, 63, 65, 67],
    }
  ]
};

var kelembabanOptions = {
  scales: {
    yAxes: [
      {
        ticks: {
          beginAtZero: true
        }
      }
    ]
  },
  title: {
    display: true,
    text: 'Kelembaban'
  }
};

var kelembabanChart = new Chart(document.getElementById("kelembabanChart"), {
  type: "line",
  data: kelembabanData,
  options: kelembabanOptions
});

var tekananUdaraData = {
  labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun"],
  datasets: [
      {
          label: "Tekanan Udara",
          fill: false,
          lineTension: 0.1,
          backgroundColor: "rgba(75,192,192,0.4)",
          borderColor: "rgba(75,192,192,1)",
          borderCapStyle: 'butt',
          borderDash: [],
          borderDashOffset: 0.0,
          borderJoinStyle: 'miter',
          pointBorderColor: "rgba(75,192,192,1)",
          pointBackgroundColor: "#fff",
          pointBorderWidth: 1,
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(75,192,192,1)",
          pointHoverBorderColor: "rgba(220,220,220,1)",
          pointHoverBorderWidth: 2,
          pointRadius: 1,
          pointHitRadius: 10,
          data: [1005, 1010, 1012, 1008, 1007, 1011],
      }
  ]
};

var tekananUdaraOptions = {
  scales: {
      yAxes: [{
          ticks: {
              beginAtZero: false
          }
      }]
  },
  title: {
    display: true,
    text: 'Tekanan Udara'
  }
};

var tekananUdaraChart = new Chart(document.getElementById("tekananUdaraChart"), {
  type: 'line',
  data: tekananUdaraData,
  options: tekananUdaraOptions
});

var kecepatanAnginData = {
  labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun"],
  datasets: [
      {
          label: "Kecepatan Angin",
          fill: false,
          lineTension: 0.1,
          backgroundColor: "rgba(255, 99, 132, 0.4)",
          borderColor: "rgba(255, 99, 132, 1)",
          borderCapStyle: 'butt',
          borderDash: [],
          borderDashOffset: 0.0,
          borderJoinStyle: 'miter',
          pointBorderColor: "rgba(255,99,132,1)",
          pointBackgroundColor: "#fff",
          pointBorderWidth: 1,
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(255,99,132,1)",
          pointHoverBorderColor: "rgba(220,220,220,1)",
          pointHoverBorderWidth: 2,
          pointRadius: 1,
          pointHitRadius: 10,
          data: [5, 8, 7, 6, 4, 3],
      }
  ]
};

var kecepatanAnginOptions = {
  scales: {
      yAxes: [{
          ticks: {
              beginAtZero: true
          }
      }]
  },
  title: {
      display: true,
      text: 'Kecepatan Angin'
  }
};

var kecepatanAnginChart = new Chart(document.getElementById("kecepatanAnginChart"), {
  type: 'line',
  data: kecepatanAnginData,
  options: kecepatanAnginOptions
});


window.addEventListener('resize', function(){
  suhuChart.resize();
  kelembabanChart.resize();
  tekananUdaraChart.resize();
  kecepatanAnginChart.resize();
});


