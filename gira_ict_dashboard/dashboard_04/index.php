    <?php
        require './base.php';
        require './components/data/sales_chart.php';
        require './components/data/products_chart.php';
        require './components/index_components/number_details.php';
    ?> 
        
       
        <!-- Sales Chart Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="grid grid-cols-1 gap-3">
            <div class="">
                    <div class="bg-light text-center   p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0" style="font-weight: 700; font-size: 24px;">Sales</h6>
                            <a href="sales.php">Show All</a>
                        </div>
                        <div id="chart_div"></div>
                    </div>
                </div>
                <div class="">
                    <div class="bg-light text-center   p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0" style="font-weight: 700; font-size: 24px;">Available Products</h6>
                            <a href="products.php">Show All</a>
                        </div>
                        <!-- <canvas id="worldwide-sales"></canvas> -->
                        <div class="bg-light">
                            <div id="top_x_div"></div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- Sales Chart End -->


        <!-- Recent Sales Start -->
         
        <!-- Recent Sales End -->


        <!-- Widgets Start -->
        
    </div> 
</div>




  <!-- Widgets End -->


            <!-- Footer Start -->
            <!-- <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">GiraIct</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                           
                            Designed By <a href="https://datasystems.com">Data Systems</a>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Footer End -->
            <!-- </div> -->
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>