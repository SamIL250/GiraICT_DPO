<div class="flex-grow p-6">
    <div class="bg-white p-4 rounded-0">
        <!-- Messages List (Card Layout) -->
        <div class="space-y-4">
            <!-- Example Message Card -->
            <?php
                $messages = mysqli_query($conn, "SELECT * FROM feedbacks ORDER BY created_at DESC");
                foreach($messages as $message) {
            ?>
            <div class="bg-white p-4 rounded-0 shadow-sm flex flex-col md:flex-row border items-start md:items-center justify-between">
                <div class="flex-grow">
                    <p class="font-semibold text-lg"><?= $message['names'] ?></p>
                    <p class="text-sm text-gray-500"><?= $message['email'] ?></p>
                    <p class="text-gray-700 mt-2"><?= $message['message'] ?></p>
                    <p class="text-sm text-gray-400 mt-1"><?= $message['created_at'] ?></p>
                </div>
                <div class="mt-4 md:mt-0 md:ml-4 flex space-x-2">
                    <!-- Reply Button -->
                    <button 
                        class="btn btn-outline-warning btn-sm rounded-0" 
                        onclick="openReplyModal('<?= $message['email'] ?>')">
                        Reply
                    </button>
                    <button onclick="window.location.replace('./services/messages/delete_message.php?message=<?=$message['feed_id']?>')" class="btn btn-outline-danger btn-sm rounded-0">Delete</button>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Reply Modal -->
<div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="replyModalLabel">Reply to <span id="recipientEmail" class="font-bold"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="./services/messages/reply_message.php" method="POST">
                    <input type="hidden" name="reply_to" id="emailInput">
                    <div class="mb-3">
                        <label for="replyMessage" class="form-label">Message</label>
                        <textarea class="form-control" id="replyMessage" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn bg-black text-white rounded-0">Send a reply</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to Open Modal and Set Email -->
<script>
    function openReplyModal(email) {
        // Set the email in the modal
        document.getElementById('recipientEmail').textContent = email;
        document.getElementById('emailInput').value = email;
        
        // Show the Bootstrap modal
        var replyModal = new bootstrap.Modal(document.getElementById('replyModal'));
        replyModal.show();
    }
</script>
