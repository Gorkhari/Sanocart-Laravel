<?php
include ('../config.php');
include ('../call/get_today_order.php');
?>
<div class="main-body-container">
    <html>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link href="CSS/style.css" rel="stylesheet" type="text/css">

    <body>
        <h2>Order Count By Date</h2>

        <canvas id="myChart" width="500px">

        </canvas>
</div>

<script>
    var xValues = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

    new Chart("myChart", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                data: [<?php echo $row_count['count']; ?>, 0, 1, 5, 3, ],
                borderColor: "Green",
                fill: false
            }]
        },
        options: {
            legend: {
                display: false
            }
        }
    });
</script>