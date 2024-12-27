<?php
    // SQL query to get the total quantity of products by category
    $query = "SELECT categories.name AS category_name, COUNT(products.product_id) AS product_count
    FROM products
    INNER JOIN categories ON products.category_id = categories.category_id
    GROUP BY categories.name;
    ";

    $result = $conn->query($query);

    // Prepare data for Google Charts
    $data = [];
    while($row = $result->fetch_assoc()) {
        $data[] = [$row['category_name'], (int)$row['product_count']];
    }

    // Convert the data array to JSON
    $dataJson = json_encode($data);

?>

<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
        // Prepare the data
        var data = new google.visualization.arrayToDataTable([
            ['Category', 'Product Count'],
            <?php echo implode(",", array_map(function($item) {
                return "['" . $item[0] . "', " . $item[1] . "]";
            }, json_decode($dataJson, true))); ?>
        ]);

        // Set chart options
        var options = { 
            legend: { position: 'none' },
            chart: { 
            },
            axes: {
                x: {
                    0: { side: 'top', label: 'Categories' } // Top x-axis label
                }
            },
            bar: { groupWidth: "90%" },
            backgroundColor: 'transparent',
            colors: ['#D22127'] 
        };

        // Draw the chart
        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>