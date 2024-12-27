<script type="text/javascript">
    // Load the Google Charts library
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Data table for the chart
        var data = google.visualization.arrayToDataTable([
        ['Stock Name', 'Total Amount'],
        <?php
        // PHP code to fetch data and output rows for the chart
        $query = "SELECT s.stock_name, SUM(p.amount) AS total_amount
                    FROM payments p
                    JOIN orders o ON p.order_id = o.order_id
                    JOIN order_items oi ON o.order_id = oi.order_id
                    JOIN products pr ON oi.product_id = pr.product_id
                    JOIN stock s ON pr.stock_id = s.stock_id
                    
                    GROUP BY s.stock_name";
        
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "['" . $row['stock_name'] . "', " . $row['total_amount'] . "],";
        }
        ?>
        ]);

        // Options for the chart
        var options = {
        title: 'Payments by Stock',
        is3D: false
        };

        // Draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>