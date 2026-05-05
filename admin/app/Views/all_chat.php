
<?= $this->include ('templates/header') ?>
<style>
    .staff-chat, .cust-chat {
        margin: 0px 8px;
        padding: 5px 12px !important;
        font-weight: 500;
        margin-bottom: 8px;
            }
            .user-st-chat, .staff-st-chat{
                align-items: end;
            }
            input#msgtext:focus {
    
    box-shadow: none;
    
}
#chat1, #chat2 {
    box-shadow: 0px 2px 7px -2px;
        }
.staff-chat {
     border-radius: 9px 9px 9px 0px;
}
.cust-chat {
    border: 1px solid #e4e4e4;
    font-weight: 600;
    border-radius: 9px 9px 0px 9px;
        }
#chat1 .card-body::-webkit-scrollbar, #chat2 .card-body::-webkit-scrollbar  {
    display: none;
}
#chat1 .card-header {
    /*background: #1E1E2D;*/
    background: rgb(24, 31, 57);
    border-radius: 16px 16px 0px 0px;
    border: none;
}
#chat1 .card-footer {
    background: white;
    border-radius: 0px 0px 16px 16px;
}
#chat1 .card-title  {
    font-weight: 600;
}
#chat1 .card-body{
    height: 433px;
    padding-top: 20px;
    position: relative;
    overflow: auto;
}
#chat2 .card-body {
    height: 576px;
    padding-top: 20px;
    position: relative;
    overflow: auto;
}
.user-chat-name {
    color: black;
    margin-bottom: 4px;
    align-items: center;
    display: flex;
    font-weight: 600;
    padding-left: 10px;
    font-size: 16px;
}
.new-msg-side {
    color: black;
    margin-bottom: 4px;
    padding-left: 10px;
    font-size: 16px;
}
.myborderchat {
    border-radius: 30px;
    box-shadow: 0px 1px 8px 0px #00000040;
    align-items: center;
    gap: 5px;
}
.my-br {
    border-radius: 30px;
}
.my-br:focus, .my-br:active, .my-br:focus-visible, .my-br {
    outline: none;
    border: none;
}
.chatno {
    border-radius: 50%;
    padding: 5px 9px;
    font-size: 11px;
}
#chat2 .card-body ul li a {
    margin: 0px 20px;
}
    #fileDisplay {
        display: flex;
        flex-wrap: wrap; 
    }

    .file-container {
        margin: 0 10px; 
        text-align: center; 
    }

    .file-info {
        margin-top: 5px; 
    }

    .file-info p {
        margin: 0;
    }
    #chat1 .send-btn {
    background: white !important;
}
.search-bar {
    padding: 10px;
    background-color: #f8f9fa; /* Light background color */
    border-bottom: 1px solid #dee2e6; /* Subtle border */
    border-radius: 16px 16px 0px 0px;
}
.search-form {
    display: flex;
    align-items: center;
}
.search-form button {
    background-color: rgb(24, 31, 57); /* Bootstrap primary color */
    border: none;
    border-radius: 5px;
    color: #ffffff;
    padding: 6px 12px;
    cursor: pointer;
    transition: background-color 0.3s;
}

/* Hover effect for the search button */
.search-form button:hover {
    background-color:black; /* Darker shade for hover */
}

/* Icon inside the button */
.search-form button i {
    font-size: 16px;
}
.search-form input[type="text"] {
    border: 1px solid #ced4da; /* Light border color */
    border-radius: 5px;
    padding: 8px 12px;
    width: 100%; /* Full width */
    font-size: 14px;
    margin-right: 5px;
}
 .chat-message {
        display: flex;
        align-items: center; /* Center vertically */
        justify-content: center; /* Center horizontally */
        height: 80%; /* Ensure it takes full height of the parent */
    }
</style>

 <main id="main" class="main">
   

<section class="chatbtwstandcu pb-5 pt-4">
  <div class="container">
    <div class="row d-flex justify-content-center" style="display: flex;">
        <div class="col-lg-4 col-xl-4 col-md-6 col-12">
            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">

            <div class="card" id="chat2" style="border-radius: 15px;">
                <div class="card-body p-0">
                    <ul class="list-unstyled mb-0">
                        <div class="search-bar">
                          <form class="search-form d-flex align-items-center" action="#">
                            <input type="text" id="search-query" name="query" placeholder="Search" title="Enter search keyword">
                            <button title="Search"><i class="fa fa-search me-0 text-center"></i></button>
                          </form>
                        </div>
                        <?php
                            $url = base_url('/public/assets/img/product_images/');
                            $defaultImage = base_url('/public/assets/img/product_images/default_img.jpeg');
                        ?>
                        <?php foreach ($chatData as $chat): ?>
                            <li class="p-2 border-bottom currentchat">
                                <a href="#" class="d-flex justify-content-between user-link" 
                                   data-user-id="<?= htmlspecialchars($chat['sender_id']) ?>"
                                   data-order-id="<?= htmlspecialchars($chat['order_id']) ?>">
                                    <div class="d-flex flex-row">
                                        <?php 
                                            $productImages = json_decode($chat['ProductImage'], true);
                                            $firstImage = !empty($productImages) ? $url . $productImages[0] : $defaultImage;
                                        ?>
                                      <img src="<?= $firstImage; ?>" class="mt-1" alt="Product Image" style="width: 50px; height: 50px; border-radius: 50%;object-fit:contain;">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="pt-1">
                                                    <div class="row">
                                                        <div class="col-lg-9">
                                                            <p class="user-chat-name mt-0"><?= htmlspecialchars($chat['UserFirstName']) ?> <br> (#<?= htmlspecialchars($chat['OrderNumber']) ?>)</p>
                                                        </div>
                                                        <!-- <div class="col-lg-3 text-right">
                                                            <?php if ($chat['read_status'] == 0): ?> -->
                                                                <!-- <span class="bg-danger float-end text-white chatno">
                                                                    New
                                                                </span> -->
                                                            <!-- <?php endif; ?>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-lg-12"> -->
                                                <!-- <p class="new-msg-side">
                                                    <?= htmlspecialchars($chat['message']) ?>
                                                </p> -->
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-8 col-xl-8 col-12 pl-lg-2">
            <div class="chat-message text-center border rounded-5 shadow-lg" style="width: 100%; height: 95%;">
                <h2>Click any user to open a chat.</h2>
            </div>
            <div class="card d-none" id="chat1" style="border-radius: 15px;">
                <div class="card-header m-0">
                    <div class="row">
                        <div class="col-lg-6 col-6 d-flex" style="align-items: center; gap: 10px;">
                            <img id="chat-user-img" src="" alt="avatar" 
                                 class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" 
                                 style="height: 50px; width: 50px;">
                            <h5 id="chat-user-name" class="card-title text-start my-1"></h5>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="chat-body"></div>
                <div class="card-footer text-muted d-flex justify-content-start align-items-center px-3 py-2">
                    <div class="input-group mb-0 myborderchat bg-white">
                        <input type="hidden" id="order_id_input" value="">
                        <input type="text" id="msgtext" class="form-control border-1 my-br" placeholder="Text Your Message...">
                        <div id="fileDisplay" class="mt-2 d-flex flex-wrap"></div>
                        <input type="file" id="fileInput" multiple style="display: none;">
                        <i class="fa fa-paperclip mx-2 d-none" style="font-size: 22px; cursor: pointer;" id="paperclipIcon"></i>
                        <i class="fa-brands fa-telegram me-3 send-btn btn" id="send-btn" data-user-id="" style="font-size: 30px; color: #1E1E2D; cursor: pointer;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</section>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
       document.getElementById('paperclipIcon').addEventListener('click', function() {
    document.getElementById('fileInput').click();
});

document.getElementById('fileInput').addEventListener('change', function(event) {
    const files = event.target.files;
    const fileDisplay = document.getElementById('fileDisplay');
    fileDisplay.innerHTML = ''; 

    if (files.length > 0) {
        Array.from(files).forEach((file, index) => {
            const fileContainer = document.createElement('div');
            fileContainer.classList.add('d-flex', 'align-items-center', 'position-relative', 'mx-2', 'mb-2');
            
            const removeBtn = document.createElement('button');
            removeBtn.classList.add('btn', 'btn-danger', 'btn-sm', 'pb-0', 'position-absolute', 'rounded-5');
            removeBtn.style.transform = 'translate(100%, -50%)';
            removeBtn.innerHTML = '&times;';
            removeBtn.addEventListener('click', () => {
                fileContainer.remove();
            });

            const fileInfo = document.createElement('div');
            fileInfo.classList.add('ms-2');

            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '50px'; 
                    img.style.height = 'auto';
                    img.style.borderRadius = '8px'; 
                    fileContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            } else {
                let icon;
                switch (file.type) {
                    case 'application/pdf':
                        icon = '<i class="fa fa-file-pdf-o" style="font-size: 24px; color: #e74c3c;"></i>';
                        break;
                    case 'application/msword':
                    case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                        icon = '<i class="fa fa-file-word-o" style="font-size: 24px; color: #3498db;"></i>';
                        break;
                    case 'application/vnd.ms-excel':
                    case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
                        icon = '<i class="fa fa-file-excel-o" style="font-size: 24px; color: #2ecc71;"></i>';
                        break;
                    case 'text/csv':
                        icon = '<i class="fa fa-file-text-o" style="font-size: 24px; color: #95a5a6;"></i>';
                        break;
                    default:
                        icon = '<i class="fa fa-file-o" style="font-size: 24px; color: #7f8c8d;"></i>';
                }
                fileInfo.innerHTML = `${icon} `;
            }
            fileContainer.appendChild(fileInfo);
            fileContainer.appendChild(removeBtn);
            fileDisplay.appendChild(fileContainer);
        });
    }
});

$(document).on('click', '.user-link', function(event) {
    event.preventDefault();

    var userId = $(this).data('user-id');
    var orderId = $(this).data('order-id');
    $('#order_id_input').val(orderId);
    var base_url = $('#base_url').val();
    $('.chat-message').addClass('d-none');
    $('#chat1').removeClass('d-none');

    // setInterval(function() {
    //     getLiveMsg(userId, orderId, base_url);
    // }, 5000);

    $.ajax({
        url: base_url + "fetchChatData",
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({ userId: userId, orderId: orderId }),
        success: function(response) {
            console.log(response);
            if (response.status === 'success') {
                if (response.user) {
                    $('#chat1 .card-header h5').text(response.user.username);
                    var profileImg = response.user.UserProfile 
                        ? base_url + 'public/upload_images/' + response.user.UserProfile 
                        : base_url + 'public/assets/img/ava1-bg.webp';
                    $('#chat1 .card-header img').attr('src', profileImg);
                } else {
                    $('#chat1 .card-header img').attr('src', base_url + 'public/assets/img/ava1-bg.webp');
                }

                var messagesHtml = '';
                console.log(response.messages);
                response.messages.forEach(function(message) {
                    var isFromLoggedInUser = message.sender_id === response.userId;
                    var imgSrc;

                    // Differentiate the image path based on whether the message is from the logged-in user or not
                    if (!isFromLoggedInUser) {
                        imgSrc = message.sender_profile 
                            ? base_url + 'public/upload_images/' + message.sender_profile  // Use 'profile_images' path for non-logged-in users
                            : base_url + 'public/assets/img/ava1-bg.webp';
                    } else {
                        imgSrc = message.sender_profile 
                            ? base_url + 'public/assets/img/profile_images/' + message.sender_profile  // Use 'profile_images' path for logged-in users
                            : base_url + 'public/assets/img/ava1-bg.webp';
                    }

                    var msgClass = isFromLoggedInUser ? 'justify-content-end' : 'justify-content-start';
                    var marginClass = isFromLoggedInUser ? 'me-3' : 'ms-3';

                    messagesHtml += '<div class="d-flex flex-row ' + msgClass + ' mb-4">';
                    if (!isFromLoggedInUser) {
                        messagesHtml += '<img src="' + imgSrc + '" class="rounded-5" alt="avatar" style="width: 50px; height: 50px; border-radius: 50%;">';
                    }


                    messagesHtml += '<div class="mt-2 max-width-500 mx-3 ' + marginClass + '">';
                    messagesHtml += '<p class="small p-2 mx-2 ' + message.mClass + ' mb-3 ' + message.textColor + ' rounded-3 bg-primary" style="' + message.bgColor + '">';
                    if (message.msg_type == 1) {
                        messagesHtml += message.message;
                    } else if (message.msg_type == 2) {
                        messagesHtml += '<img src="' + message.message + '" alt="image" style="max-width: 120px; height: auto;">';
                        messagesHtml += '<div style="margin-top: -15px;"><a href="' + message.message + '" download=""><i class="fas fa-download"></i></a></div>';
                    }
                    messagesHtml += '</p>';
                    messagesHtml += '<small class="text-muted">' + message.created_at + '</small>';
                    messagesHtml += '</div>';

                    if (isFromLoggedInUser) {
                        messagesHtml += '<img src="' + imgSrc + '" class="rounded-5" alt="avatar" style="width: 50px; height: 50px;">';
                    }
                    messagesHtml += '</div>';
                });

                $('#chat1 .card-body').html(messagesHtml);
                $("#chat1 .card-body").scrollTop($("#chat1 .card-body")[0].scrollHeight);
            } else {
                console.error('Error:', response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
        }
    });
});










   $('#send-btn').on('click', function() {
    const receiverID = $(this).data('user-id'); 
    const orderId = $('#order_id_input').val(); 
    const textMessage = $('#msgtext').val(); 
    const base_url = $('#base_url').val();
    const fileInput = $('#fileInput')[0];
    const files = fileInput.files;
    // console.log(receiverID);
    const formData = new FormData();
    formData.append('user-id', receiverID); 
    formData.append('textMsg', textMessage);
    formData.append('order_id', orderId);

    if (files.length > 0) {
        for (let i = 0; i < files.length; i++) {
            formData.append('file', files[i]);
        }
    }

    // Log FormData contents for debugging
    for (let pair of formData.entries()) {
        // console.log(pair[0]+ ', '+ pair[1]); 
    }

    $.ajax({
        url: base_url + "sendMessage",
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
    if (response.status) {
        console.log(response.status);

        // Clear input fields
        $('#msgtext').val('');
        $('#fileDisplay').html('');
        $('#fileInput').val('');

        const chatBody = $('#chat-body');
        const message = response.data;

        // Determine profile image source
        let imgSrc = message.userprofile 
            ? `${base_url}public/assets/img/profile_images/${message.userprofile}` 
            : `${base_url}public/assets/img/profile_images/default_user.png`;

        if (message.sender_id != receiverID) {
            imgSrc = base_url.replace("portal/", "admin/") + `public/assets/img/profile_images/${message.userprofile}`;
        }

        const messageHtml = `
            <div class="d-flex flex-row ${message.sender_id != receiverID ? 'justify-content-end' : ''} mb-4">
                ${message.sender_id == receiverID ? `
                    <img src="${imgSrc}" alt="avatar" class="me-3" style="width: 40px; height: 40px; border-radius: 50%;"/>
                ` : ''}
                <div class="mt-2 max-width-500">
                    <p class="small p-2 mb-1 me-3 text-white rounded-3 bg-primary">
                        ${message.msg_type == 1 ? message.message : ''}
                        ${message.msg_type == 2 ? `<img src="${message.message}" width="120px" height="80%">
                            <div style="margin-top: -15px;">
                                <a href="${message.message}" download=""><i class="fas fa-download"></i></a>
                            </div>` : ''}
                        ${message.msg_type == 3 ? `<video width="150px" height="100px" controls>
                            <source src="${message.message}" type="video/mp4">
                            </video>` : ''}
                        ${message.msg_type == 4 ? `<a href="${message.message}" class="font-weight-bold text-white" download>
                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i> 
                            ${message.message.split("/").pop().split(".")[0]}
                            </a>` : ''}
                    </p>
                    <p class="small text-muted text-end mb-3">
                        ${message.created_at}
                    </p>
                </div>
                ${message.sender_id != receiverID ? `
                    <img src="${imgSrc}" alt="avatar" class="ms-3" style="width: 50px; height: 50px; border-radius: 50%;"/>
                ` : ''}
            </div>
        `;

        // Append the message HTML and scroll to the bottom
        chatBody.append(messageHtml);
        chatBody.scrollTop(chatBody[0].scrollHeight);
    } else {
        console.error('Failed to send message:', response.message);
    }
},


        error: function(jqXHR, textStatus, errorThrown) {
            console.error('AJAX error:', textStatus, errorThrown);
        }
    });

    getLiveMsg(receiverID, base_url); 
});






    document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.user-link').forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            
            const userId = this.getAttribute('data-user-id');
            
            document.querySelector('.send-btn').setAttribute('data-user-id', userId);
            
            document.getElementById('chat-user-img').src = this.querySelector('img').src;
            document.getElementById('chat-user-name').textContent = this.querySelector('.user-chat-name').textContent;
        });
    });
});
//  setInterval(newMsgCheck,5000);
    
//     function newMsgCheck(){
//         var base_url = $("#base_url").val();
//         $.ajax({
//           type: "post",
//           url: base_url +"newMsgCheck",
//           data: {
//             'ok':'ok',
//             },
//           success: function (response) {
//                 if (response != 0) {
//                 $(".countMsg").html(response).removeClass("d-none");
//             } else {
//                 $(".countMsg").html(response).addClass("d-none");
//             }
//           }
//         });
//     }
  function getLiveMsg(userId, base_url) {
    $.ajax({
        type: "POST",
        url: base_url + "getLiveMsg",
        data: {
            'receiverID': userId,
        },
        success: function(response) {
            try {
                var userChats;

                if (typeof response === 'string') {
                    userChats = JSON.parse(response);
                } else if (typeof response === 'object') {
                    userChats = response;
                }

                if (Array.isArray(userChats)) {
                    var newChat = '';
                    userChats.forEach(element => {
                        newChat += '<div class="d-flex flex-row ' + element.class + '">';

                        // Sender's message
                        if (userId == element.from_id) {
                            var imgSrc = (element.from_id == '8') 
                                ? base_url.replace("portal/", "admin/") + 'public/assets/img/' + element.userProfile
                                : (element.userProfile 
                                    ? base_url + 'public/assets/img/' + element.userProfile
                                    : base_url + 'public/assets/img/default-avatar.png');

                            newChat += '<img src="' + imgSrc + '" class="rounded-5" alt="avatar" style="width: 40px; height: 40px;">';
                            newChat += '<div class="mt-2 max-width-500">';
                            newChat += '<p class="small p-2 ' + element.mClass + ' mb-1 ' + element.textColor + ' rounded-3 bg-primary" style="' + element.bgColor + '">';

                            // Message content
                            if (element.msg_type == 1) {
                                newChat += element.message;
                            } else if (element.msg_type == 2) {
                                newChat += '<img src="' + element.message + '" width="120px" height="80%">';
                                newChat += '<div style="margin-top: -15px;"><a href="' + element.message + '" download=""><i class="fas fa-download"></i></a></div>';
                            } else if (element.msg_type == 3) {
                                newChat += '<video width="150px" height="100px" controls><source src="' + element.message + '" type="video/mp4"></video>';
                            } else if (element.msg_type == 4) {
                                newChat += '<a href="' + element.message + '" class="font-weight-bold text-white" download><i class="fa fa-file-pdf-o" aria-hidden="true"></i> ' + element.message.split("/").pop().split(".")[0] + '</a>';
                            }

                            newChat += '</p>';
                            newChat += '<p class="small text-muted text-end mb-3">' + element.created_at + '</p>'; // Timestamp for sender
                            newChat += '</div>';
                        }

                        // Receiver's message
                        if (userId != element.from_id) {
                            newChat += '<div class="mt-2 max-width-500">';
                            newChat += '<p class="small p-2 ' + element.mClass + ' mb-1 ' + element.textColor + ' rounded-3 bg-primary" style="' + element.bgColor + '">';

                            // Message content
                            if (element.msg_type == 1) {
                                newChat += element.message;
                            } else if (element.msg_type == 2) {
                                newChat += '<img src="' + element.message + '" width="120px" height="80%">';
                                newChat += '<div style="margin-top: -15px;"><a href="' + element.message + '" download=""><i class="fas fa-download"></i></a></div>';
                            } else if (element.msg_type == 3) {
                                newChat += '<video width="150px" height="100px" controls><source src="' + element.message + '" type="video/mp4"></video>';
                            } else if (element.msg_type == 4) {
                                newChat += '<a href="' + element.message + '" class="font-weight-bold text-white" download><i class="fa fa-file-pdf-o" aria-hidden="true"></i> ' + element.message.split("/").pop().split(".")[0] + '</a>';
                            }

                            newChat += '</p>';
                            newChat += '<p class="small text-muted mb-3">' + element.created_at + '</p>'; // Timestamp for receiver
                            newChat += '</div>';

                            var imgSrc = (element.from_id == '8') 
                                ? base_url.replace("portal", "admin") + 'public/assets/img/' + element.userProfile
                                : (element.userProfile 
                                    ? base_url + 'public/assets/img/' + element.userProfile
                                    : base_url + 'public/assets/img/ava1-bg.webp');

                            newChat += '<img src="' + imgSrc + '" class="rounded-5" alt="avatar" style="width: 50px; height: 50px;">';
                        }

                        newChat += '</div>';
                    });

                    $('#chat1 .card-body').html(newChat);
                    $("#chat1 .card-body").scrollTop($("#chat1 .card-body")[0].scrollHeight);
                }
            } catch (error) {
                console.error('Error parsing response:', error);
            }
        },
        error: function(xhr, status, error) {
            console.error("Ajax request error: " + error);
        }
    });
}



$(document).ready(function() {
    $('#search-query').on('keyup', function() {
        var query = $(this).val().toLowerCase();
        $('.currentchat').each(function() {
            var text = $(this).text().toLowerCase();
            $(this).toggle(text.indexOf(query) > -1);
        });
    });
});

</script>
<?= $this->include ('templates/footer') ?>