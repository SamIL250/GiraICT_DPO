<div class="modal fade" id="formModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- <div id="responseMessage"></div> -->
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Add new stock</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="./services/products/stock.php" method="post">
                <div class="mb-3">
                    <input type="text" class="border rounded py-2 px-3 w-100" placeholder="Stock Name" name="stock_name" required>
                </div> 
                <div class="mb-3">
                    <button class="w-100 py-2 text-white rounded bg-[--primary] hover:bg-[--light-primary]" type="submit" name="new_stock">Add stock</button>
                </div>
            </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="rounded py-2 px-6 bg-[--secondary]" data-bs-dismiss="modal" name="new_category">Cancer</button>
        </div>

        </div>
    </div>
</div>