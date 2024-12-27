<?php

require './components/data/sales_chart.php';
require './components/data/sales_by_stock_chart.php';
?>

<div class="container-fluid pt-4 px-4 relative">
    <div class="">
        <div class="grid grid-cols-12 items-center ">
            <div class="col-span-6">
                <p class="text-3xl">Sales</p>
            </div>
        </div>
    </div>


    <div class="min-h-screen bg-gray-50">
        <!-- Header -->
        <header class="bg-white border-b-2 border-gray-300 py-4 px-6">
            <h1 class="text-2xl font-semibold text-gray-800">Sales Dashboard</h1>
        </header>

        <!-- Main Content -->
        <div class="p-6">
            <!-- Chart Section -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Sales Overview</h2>
                <div class="bg-white p-6 shadow-sm border border-gray-300">
                    <!-- Sales Chart Placeholder -->
                    <div class="flex justify-between">
                        <div>
                            <p class="font-bold">Total sales</p>
                        </div>
                        <div>
                            <p class="text-xl font-bold border alert-success px-2 rounded-2xl">
                                <?php
                                require './components/counts/sales.php'
                                ?>
                                <small>Frw</small>
                            </p>
                        </div>
                    </div>
                    <br />
                    <div id="chart_div" class="w-full h-64"></div>

                    <!-- total sales -->
                    <hr>
                    <br>
                    <br>
                    <div class="grid grid-cols-12 mb-10 gap-2">
                        <div class="col-span-8">
                            <div class="flex justify-between">
                                <div>
                                    <p class="font-bold">Stock earnings</p>
                                </div>
                            </div>
                            <div id="piechart" style="width: 500px; height: 300px;" class="bg-dark"></div>
                        </div>
                        <div class="col-span-4 px-50 flex items-center">

                            <div class="w-100 grid grid-cols-1 gap-2">
                                <?php
                                $stock_sales = mysqli_query(
                                    $conn,
                                    "SELECT 
                                        s.stock_name,
                                        CONCAT(MONTHNAME(p.payment_date), YEAR(p.payment_date)) AS month_year,
                                        SUM(p.amount) AS total_amount
                                    FROM 
                                        payments p
                                    INNER JOIN 
                                        orders o ON p.order_id = o.order_id
                                    INNER JOIN 
                                        order_items oi ON o.order_id = oi.order_id
                                    INNER JOIN 
                                        products pr ON oi.product_id = pr.product_id
                                    
                                    INNER JOIN 
                                        stock s ON pr.stock_id = s.stock_id
                                    WHERE 
                                        p.payment_status = 'completed'
                                    GROUP BY 
                                        s.stock_name, YEAR(p.payment_date), MONTH(p.payment_date)
                                    ORDER BY 
                                        p.payment_date, s.stock_name"
                                );

                                $last_month_year = ""; // To track the last displayed month and year

                                foreach ($stock_sales as $stock) {
                                    // Check if the current month_year is different from the last displayed one
                                    if ($last_month_year !== $stock['month_year']) {
                                        echo "<span class='px-2 font-bold'>" . htmlspecialchars($stock['month_year']) . "</span>";
                                        $last_month_year = $stock['month_year'];
                                    }
                                ?>
                                    <div class="border-2 cursor-pointer hover:bg-[whitesmoke] p-2 flex justify-between w-auto"
                                        
                                        onclick="window.location.replace('sales_stock_overview.php?stock=<?php echo htmlspecialchars($stock['stock_name']); ?>')">
                                        <p><?= htmlspecialchars($stock['stock_name']) ?></p>
                                        <h2><?= number_format($stock['total_amount'], 2) ?> Frw</h2>
                                    </div>
                                    <hr>
                                <?php
                                }
                                ?>
                            </div>

                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

     
    <!-- <div class="flex min-h-screen bg-gray-100">
     Sidebar -->


</div>