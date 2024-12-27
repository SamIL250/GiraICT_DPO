<script> 
        var tableViewBtn = document.getElementById('table'); 
        var contentViewBtn = document.getElementById('content');

        var tableView = document.getElementById('table_view'); 
        var contentView = document.getElementById('content_view');
         
        contentView.style.display = 'grid';
        tableView.style.display = 'none';

        tableViewBtn.addEventListener('click', function() {
            tableView.style.display = 'block'; 
            contentView.style.display = 'none';
        });
 

        contentViewBtn.addEventListener('click', function() {
            tableView.style.display = 'none'; 
            contentView.style.display = 'grid';
        });
 
        document.addEventListener('DOMContentLoaded', function() {
            var updateModal = document.getElementById('updateModal');
            
            updateModal.addEventListener('show.bs.modal', function(event) {
                // Button that triggered the modal
                var button = event.relatedTarget;
                // Extract info from data-* attributes
                var productId = button.getAttribute('data-id');
                // console.log(categoryId);
                
                var productCategory = button.getAttribute('data-category');
                var productName = button.getAttribute('data-name');
                var productDescription = button.getAttribute('data-description');
                var productPrice = button.getAttribute('data-price');
                var productStock = button.getAttribute('data-stock');
                var imageUrl = button.getAttribute('data-url');
                // console.log(imageUrl);
                
                var dateAdded = button.getAttribute('data-date');

                // Update the modal's content
                document.getElementById('updateProductId').value = productId;
                document.getElementById('productCategory').value = productCategory;
                document.getElementById('productName').value = productName;

                document.getElementById('productDescription').value = productDescription;
                document.getElementById('productPrice').value = productPrice;
                document.getElementById('productStock').value = productStock;
                document.getElementById('imageName').innerHTML = imageUrl;

                //imagePath 
                var imagePath = './data/images/' + imageUrl;
                console.log(imagePath); 
                document.getElementById('productImage').setAttribute('src', imagePath)
                document.getElementById('productDate').value = dateAdded;
               
            });
        });  
        
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader(); 
            reader.onload = function() {
                var preview = document.getElementById('image_preview');
                var iconWrapper = document.getElementById('icon_wrapper');
                var img_container = document.getElementById('img_container');
                var img_name = document.getElementById('img_name');
                
                preview.src = reader.result;
                preview.style.display = 'block';  // Show the preview
                //show image name
                img_name.innerHTML = input.files[0].name;
                
                 // Show the icon
                iconWrapper.style.display = 'block';
                
                img_container.style.display = 'block'; // Show the image container

                 // Hide the icon
                iconWrapper.style.display = 'none';
                
                img_container.style.display = 'block'; // Show the image container
            }; 
            reader.readAsDataURL(input.files[0]);
        }


</script>