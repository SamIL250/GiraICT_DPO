<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="deleteModalLabel">Are you sure you want to delete the category?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                This action cannot be undone.
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <form id="deleteForm" method="GET" action="./services/purchases/delete_purchase.php">
                    <input type="hidden" name="order_id" id="productId">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <button type="button" class="btn border rounded-0" data-bs-dismiss="modal">Discard</button>
            </div>
        </div>
    </div>
</div>