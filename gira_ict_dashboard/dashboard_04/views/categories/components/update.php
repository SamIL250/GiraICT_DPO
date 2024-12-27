<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateForm" method="POST" action="./actions/updates/category.php">
                    <input type="hidden" name="category_id" id="updateCategoryId">
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="category_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoryDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="categoryDescription" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="dateAdded" class="form-label">Date created</label>
                        <input type="text" class="form-control" id="dateAdded" name="date_added" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update_category">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
