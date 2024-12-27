<div class="modal fade" id="formModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- <div id="responseMessage"></div> -->
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Add new product category</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="./services/products/categories.php" method="post">
                <div class="mb-3">
                    <input type="text" class="border rounded py-2 px-3 w-100" placeholder="Category Name" name="category_name" required>
                </div>
                <div class="mb-3">
                    <textarea class="border rounded py-2 px-3 w-100" placeholder="Description" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <button class="w-100 py-2 text-white rounded bg-[--primary] hover:bg-[--light-primary]" type="submit" name="new_category">Add category</button>
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