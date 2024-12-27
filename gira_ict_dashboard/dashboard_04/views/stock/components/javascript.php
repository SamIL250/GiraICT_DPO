<script>
 
    document.addEventListener('DOMContentLoaded', function() {
        var updateModal = document.getElementById('updateModal');
        
        updateModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget;
            // Extract info from data-* attributes
            var stockId = button.getAttribute('data-id');
            // console.log(categoryId);
            
            var stockName = button.getAttribute('data-name'); 
            var dateAdded = button.getAttribute('data-date');

            // Update the modal's content
            document.getElementById('updateStockId').value = stockId;
            document.getElementById('stockName').value = stockName;
            document.getElementById('dateAdded').value = dateAdded;
        });
    }); 


    // document.getElementById('form').addEventListener('submit', (event) => {
    //     event.preventDefault(); //preventing the form to submit the default way

    //     //create a form data object to capture input values
    //     const form = event.target; // or you can use 'this' inside the callback
    //     const formData = new FormData(form);

    //     //send data to services/products,php 
    //     const response = fetch('services/products/categories.php', {
    //         method: 'POST',
    //         body: formData
    //     })

        
    //     .then(response => response.json())
    //     .then(data => {
    //         //display the response from php
    //         document.getElementById('responseMessage').innerHTML = data.message;
    //         if(data.success) {
    //             console.log(data.message);
                
    //             //clear the form
    //             // document.getElementById('form').reset();
    //             // document.getElementById('responseMessage').innerHTML = data.message
    //         } else {
    //             console.log(data.message);
    //             // document.getElementById('responseMessage').innerHTML = data.message;
    //         }
    //     })
    //     .catch(error => {
    //         console.log("Error: ", error);
    //         // document.getElementById('responseMessage').innerHTML = 'An error occurred. Please try again.';
    //     })
    // })

</script>