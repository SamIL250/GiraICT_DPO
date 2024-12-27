<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateForm" method="POST" action="./actions/updates/stock.php">
                    <input type="hidden" name="stock_id" id="updateStockId">
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="stockName" name="stock_name" required>
                    </div> 
                    <div class="mb-3">
                        <label for="dateAdded" class="form-label">Date created</label>
                        <input type="text" class="form-control" id="dateAdded" name="date_added" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update_stock">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>