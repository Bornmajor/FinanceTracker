<?php
include('functions.php');

$sess_usr_id = $_SESSION['usr_id'];

$query = "SELECT expense_month,SUM(amount_spent) AS total_expense FROM expenses GROUP BY expense_month";
$result = mysqli_query($connection,$query);

$data = array(
    "months" => array(),
    "total_expenses" => array()
);
while ($row = mysqli_fetch_assoc($result)) {
    $data["months"][] = $row["expense_month"];
    $data["total_expenses"][] = $row["total_expense"];
}

$data_json = json_encode($data);


?>
   <!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- #area chart -->
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}
// Use the PHP generated JSON data to update the chart
var data = <?php echo $data_json; ?>;
// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: data.months,
    datasets: [{
      label: "Expense",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "#3b7e44",
      pointRadius: 3,
      pointBackgroundColor: "#3b7e44",
      pointBorderColor: "#3b7e44",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "black",
      pointHoverBorderColor: "white",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: data.total_expenses,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Ksh ' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Ksh' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

</script>


<?php
// Rescaling proportionally: This method maintains the relative weight of each percentage but adjusts them slightly to reach 100%. Here's how:
// Sum the current percentages: Add all four percentages together.
// Calculate the scaling factor: Divide 100 by the sum you obtained in step 1. This factor represents how much each percentage needs to be multiplied by.
// Rescale each percentage: Multiply each individual percentage by the scaling factor.

//daily
$daily = intervalSavingRate('daily');
$weekly = intervalSavingRate('weekly');
$monthly = intervalSavingRate('monthly');
$yearly = intervalSavingRate('yearly');


$interalArray = array($daily,$weekly,$monthly,$yearly);
//convert to json
$sum_array = array_sum($interalArray);


$scaling_factor = 100/$sum_array;

// Rescale each percentage
$adjustedPercentages = [];
for ($i = 0; $i < count($interalArray); $i++) {
  $adjustedPercentages[] = round($interalArray[$i] * $scaling_factor);
}

//encode to json to be used in script
$adjustedPercentages = json_encode($adjustedPercentages);

?>

<script>


// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Daily", "Weekly", "Monthly", "Yearly"],
    datasets: [{
      data: <?php echo $adjustedPercentages ?>,
      backgroundColor: ['#4e73df', '#3b7e44', '#36b9cc','#f6c23e'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf','#f6c23e'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});


</script>