<?php 
    require './components/data/sales_by_stock_chart.php';
    $stock_name = "";

    if(isset($_GET['stock'])) { 
        $stock_name = $_GET['stock'];  
    }

    // $stock_data = mysqli_query(
    //     $conn,
    //     "SELECT s.*, pr.*, oi.*, o.*, p.*, SUM(p.amount) AS total_amount
    //     FROM payments p
    //     INNER JOIN orders o ON p.order_id = o.order_id
    //     INNER JOIN order_items oi ON o.order_id = oi.order_id
    //     INNER JOIN products pr ON oi.product_id = pr.product_id
    //     INNER JOIN stock s ON pr.stock_id = s.stock_id
    //     WHERE s.stock_name = '$stock_name'
    //     GROUP BY s.stock_name"
    // );
 
    // foreach($stock_data as $data){
    //     $total_sales = $data['total_amount'];        
    //     // echo $total_sales;
    // }
?>  

<div class="container-fluid pt-4 px-4 relative">
    <div class="">
        <div class="grid grid-cols-12 items-center ">
            <div class="col-span-6">
                <a href="./sales.php" class=""><i class="fa fa-arrow-left"></i> Back to sales</a>
            </div> 
        </div>
    </div> 


    <div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <header class="bg-white border-b-2 border-gray-300 py-4 px-6">
        <h1 class="text-2xl font-semibold text-gray-800"><?=$stock_name?></h1>
    </header>

    <!-- Main Content -->
    <div class="p-6">
        <!-- Chart Section -->
        <div class="mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Sales Overview</h2>
            <div class="bg-white p-6 shadow-sm border border-gray-300">
                <?php
                
                    $stock_data = mysqli_query(
                        $conn,
                        "SELECT 
                            stock.*,
                            payments.*,
                            order_items.*,
                            orders.*,
                            products.*,
                            SUM(payments.amount) AS total_amount, -- Total earnings
                            MONTHNAME(payments.payment_date) AS month, -- Month name for grouping
                            SUM(payments.amount) AS monthly_amount -- Monthly earnings
                        FROM 
                            payments
                        INNER JOIN 
                            orders ON payments.order_id = orders.order_id
                        INNER JOIN 
                            order_items ON orders.order_id = order_items.order_id
                        INNER JOIN 
                            products ON order_items.product_id = products.product_id
                        INNER JOIN 
                            stock ON products.stock_id = stock.stock_id
                        WHERE 
                            stock.stock_name = '$stock_name'
                            AND payments.payment_status = 'completed'
                            AND orders.status = 'delivered'
                        GROUP BY 
                            MONTH(payments.payment_date) -- Group by month to get monthly totals
                        ORDER BY 
                            payments.payment_date
                        "
                    ); 
                    // $data = [];
                    while($data =  mysqli_fetch_assoc($stock_data)){ 
                        ?>      
                            <br>
                            <br>
                            <br>
                            <p class="text-2xl font-bold"><?=$data['month']?></p>
                            <div class="flex justify-between border p-2 items-center rounded-3xl">  
                                <div>
                                    <p class="font-bold">Total sales</p>
                                </div>
                                <div>
                                    <p class="text-xl font-bold border alert-success px-2 rounded-2xl">
                                        <?=number_format($data['total_amount'], 2)?> Frw
                                    </p>
                                </div>
                            </div>
                            <br>
                            <div class="grid grid-cols-12"> 
                                <div class="col-span-7 border-l-2">
                                    <div class="px-5">
                                        <p class="text-xl">Details</p>
                                        <br>
                                        <div class="flex justify-between items-center">
                                            <p class="font-bold">Total earnings</p> 
                                            <p class="text-2xl text-[#888] font-bold"><?=number_format($data['total_amount'],2)?> Frw</p>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <p class="font-bold">Stock earnings</p> 
                                            <p class="text-2xl text-[#888] font-bold"><?=number_format(($data['total_amount'] * 80)/ 100,2)?> Frw</p>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <p class="font-bold">Company earnings</p> 
                                            <p class="text-2xl text-[#888] font-bold"><?=number_format(($data['total_amount'] * 20)/ 100,2)?> Frw</p>
                                        </div>
                                        <button class="w-100 my-3 bg-[#F5ED4D] py-2">Pay 70% stock earnings</button>
                                    </div>
                                    
                                </div>
                            </div>
                        <?php
                    }
                ?> 
            </div>
        </div> 

    </div>
</div>






    <!-- <div class="flex min-h-screen bg-gray-100">
     Sidebar -->
    

</div>