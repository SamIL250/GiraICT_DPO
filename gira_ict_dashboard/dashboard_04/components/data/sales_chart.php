<?php
    $sales_query = mysqli_query(
        $conn,
        "SELECT MONTHNAME(payment_date) AS month, 
        SUM(amount) AS total_sales
        FROM payments
        WHERE payment_status = 'completed'
        GROUP BY MONTH(payment_date)
        ORDER BY MONTH(payment_date)"
    );


    $chartData = [];
    while ($row = $sales_query->fetch_assoc()) {
    $chartData[] = [$row['month'], (float)$row['total_sales']];
    }

    // Convert PHP array to JSON format for JavaScript
    $chartDataJson = json_encode($chartData); 

?>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Prepare the data for the chart
        const data = new google.visualization.DataTable();
        data.addColumn('string', 'Month');
        data.addColumn('number', 'Total Sales');
        data.addRows(<?php echo $chartDataJson; ?>);

        // Chart options
        const options = {
            title: 'Monthly Sales Amount',
            hAxis: { title: 'Month' },
            vAxis: { title: 'Sales Amount (Frw)' },
            legend: { position: 'top' },
            backgroundColor: 'transparent',
            colors: ['black'] // Customize color if needed
        };

        // Render the chart in the 'chart_div' element
        const chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>