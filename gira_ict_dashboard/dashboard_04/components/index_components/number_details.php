<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light   d-flex align-items-center justify-content-between p-4" onclick="window.location.replace('./products.php')">
                <i class="fa fa-box fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Products</p>
                    <h6 class="mb-0 font-bold">
                        <?php require'./components/counts/products.php' ?>
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light   d-flex align-items-center justify-content-between p-4" onclick="window.location.replace('./orders.php')">
                <i class="fa fa-truck fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Orders</p>
                    <h6 class="mb-0 font-bold">
                        <?php require'./components/counts/orders.php'?>
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light   d-flex align-items-center justify-content-between p-4" onclick="window.location.replace('./orders.php')">
                <i class="fa fa-money-bill fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Purchases</p>
                    <h6 class="mb-0 font-bold">
                        <?php require'./components/counts/purchases.php'?>
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light   d-flex align-items-center justify-content-between py-4 px-0" onclick="window.location.replace('./sales.php')">
                <!-- <i class="fa fa-chart-pie fa-3x text-primary"></i> -->
                <div class="ms-3">
                    <p class="text-xl font-bold">Total stock (Frw)</p>
                    <h6 class="mb-0 font-bold text-2xl  px-2 alert-success border flex items-center rounded">
                        <?php require'./components/counts/total_stock.php'?><small style="font-size: 10px;">Frw</small>
                    </h6>
                    <br>
                    <hr>
                    <br>
                    <p class="mb-2 text-lg font-bold">Total Sales</p>
                    <h6 class="mb-0 font-bold text-2xl alert-danger flex items-center  px-2 border rounded-3xl">
                        <?php require'./components/counts/sales.php'?><small style="font-size: 10px;">Frw</small>
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div>