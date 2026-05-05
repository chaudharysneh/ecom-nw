<style>
.textarea{
    width: 100%;
    font-size: 0.9375rem;
    font-weight: 400;
    height: 100px;
    line-height: 1.53;
    color: #697a8d;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d9dee3;
    border-radius: 0.375rem;
}
.addprobtn2 {
    float: left;
    color: #696cff;
    padding: 10;
    border-radius: 5px;
    font-weight: bold;
}
.addprobtn {
    float: right;
    background: #f7941d;
    color: white;
    padding: 10;
    border-radius: 5px;
    border: none;
}
.chat-container {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.chat-message {
    padding: 0px;
    border-radius: 10px;
    max-width: auto;
}

.chat-message.sender {
    align-self: flex-end;
    background-color: #007bff;
    color: #fff;
}

.chat-message.receiver {
    align-self: flex-start;
    background-color: #f1f1f1;
    color: #000;
}

.chat-time {
    font-size: 0.75rem;
    color: #888;
    text-align: right;
}

.chat-text {
    padding: 0px;
}
.chat-text {
    display: flex;
    align-items: center;
}

.chat-image {
    width: 40px !important;
    height: 40px !important;
    border-radius: 50%;
    margin-right: 10px; /* Adjust spacing between image and text */
}
.card {
    position: relative;
    overflow: hidden;
}

.chat-container {
    max-height: 400px; /* Adjust the height as needed */
    overflow-y: auto; /* Enables vertical scrolling */
}

.chat-text {
    display: flex;
    align-items: center;
}

.chat-image {
    width: 40px !important;
    height: 40px !important;
    border-radius: 50%;
    margin-right: 10px; /* Adjust spacing between image and text */
}

.chat-message {
    margin-bottom: 10px; /* Space between messages */
}

.card-footer {
    /* Add styles for the footer if needed */
}
.content-footer{
    display:none;
}
</style>        
            
<?= $this->include ('templates/header') ?>

          <!-- Content wrapper -->
    <!--      <div class="text-nowrap m-5">-->
    <!--<div class="card">-->
    <!--    <div class="card-body p-2">-->
    <!--        <span class="addprobtn2">Chat</span>-->
    <!--        <a href="<?php //echo base_url(); ?>all_chat"><span class="addprobtn">Back</span></a>-->
    <!--    </div>-->
    <!--</div>-->
    	<?php
$url = base_url('/public/assets/img/product_images/');
$defaultImage = base_url('public/assets/img/product_images/');
$recieverImage = base_url('public/assets/img/profile_images/');
?>
    <form id="edit_catagories" enctype="multipart/form-data">
    <input type="hidden" id="base_url" value="<?php echo base_url('all-categories') ?>">
   
    <input type="hidden" name="admin" id="admin" value="<?php echo $currentUserId; ?>">
    
    <div class="content-wrapper">
        <div class="flex-grow-1 container-p-y p-4">
            <div class="card">
               <div class="card-header d-flex align-items-center">
                    <?php if (!empty($chatData)): ?>
                        <?php
                            $firstChat = $chatData[0];
                            $productImages = json_decode($firstChat['ProductImage'], true);
                            $firstImageUrl = !empty($productImages) && is_array($productImages) ? $url . $productImages[0] : $defaultImage . 'default-image.jpg';
                        ?>
                        <!-- Product Image -->
                        <img src="<?= htmlspecialchars($firstImageUrl); ?>" alt="Product Image" class="rounded-circle" style="width: 40px; height: 40px; margin-right: 5px;">
                
                        <!-- Product Name and Order Number -->
                        <div>
                            <h5 class="mb-0">
                                <?= htmlspecialchars($firstChat['ProductName'] ?? 'Unknown Product'); ?>
                            </h5>
                            <!-- Add a line break for the order number below the product name -->
                            <span class="small text-white">#<?= htmlspecialchars($firstChat['OrderNumber'] ?? 'Unknown Order'); ?></span>
                             <input type="hidden" name="user" id="user" value="<?= htmlspecialchars($firstChat['sender_id'] ?? ''); ?>">
                        </div>
                    <?php endif; ?>
                </div>
                <!-- Chat messages container -->
                <div class="col-12">
                    <div class="chat-container">
                        <?php if (!empty($chatData)): ?>
                            <?php foreach ($chatData as $chat): ?>
                                <div class="chat-message ms-2 <?php echo ($chat['sender_id'] == $currentUserId) ? 'sender' : 'receiver'; ?>">
                                    <div class="chat-image rounded-5 w-25 h25"></div>
                                    <div class="chat-text me-4">
                                        <?php 
                                            $productImages = json_decode($chat['ProductImage'], true);
                                            $imageUrl = !empty($productImages) && is_array($productImages) ? $url . $productImages[0] : $defaultImage . 'default-image.jpg';
                                        ?>
                                        <img src="<?= htmlspecialchars($imageUrl); ?>" alt="Product Image" class="chat-image">
                                        <?php echo htmlspecialchars($chat['message']); ?>
                                    </div>
                                    <div class="chat-time">
                                        <?php echo date('H:i', strtotime($chat['created_at'])); ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No messages found.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Footer for input and sending messages -->
                <div class="card-footer">
                    <div class="input-group">
                        <label for="file-upload" class="btn btn-secondary">
                            <i class="fa fa-paperclip"></i>
                        </label>
                        <input type="file" id="file-upload" name="file" style="display: none;">
                        <input type="text" id="message-text" name="message_text" class="form-control" placeholder="Type your message here">
                        <button type="submit" class="btn btn-primary fa fa-telegram">
                            <i class="fab fa-telegram-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


</div>
<?= $this->include ('templates/footer') ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle file selection
        $('#file-upload').on('change', function() {
            var fileName = $(this).val().split('\\').pop();
            console.log('File selected:', fileName);
            // You can show the selected file name or preview here if needed
        });

        // Handle form submission
        $('#chat-form').on('submit', function(e) {
            e.preventDefault(); 

            var formData = new FormData(this); 
            var orderId = $('#order_id').val();

            // Send AJAX request
            $.ajax({
                url: '<?php echo base_url('send_message'); ?>',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false, 
                success: function(response) {
                    $('#message-text').val(''); 
                    $('#file-upload').val(''); 

                    var newMessage = `
                        <div class="chat-message ${response.sender_id === <?php echo $currentUserId; ?> ? 'sender' : 'receiver'}">
                            <div class="chat-text">${response.message}</div>
                            <div class="chat-time">${response.created_at}</div>
                        </div>
                    `;
                    $('.chat-container').append(newMessage);
                },
                error: function() {
                    alert('An error occurred while sending the message.');
                }
            });
        });
    });
</script>
