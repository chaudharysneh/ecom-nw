<?= $this->include ('templates/header') ?>

<style>
/* Remove DataTables default styling */
#notificationsTable {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 1rem;
}

#notificationsTable_wrapper .dataTables_paginate {
    display: flex;
    justify-content: flex-end;
    margin-top: 10px;
}

#notificationsTable_wrapper .dataTables_paginate .paginate_button {
       padding: 0.3rem 0.8rem;
    margin: 0 5px;
    border: none;
    border-radius: 5px;
    background-color: #3244a9;
    color: #fffbff;
    font-weight: bold;
    cursor: pointer;
    width: 10%;
    text-align: center;
}

#notificationsTable_wrapper .dataTables_paginate .paginate_button.current {
    background-color: #2cdd9b;
    color: white;
}

#notificationsTable_wrapper .dataTables_paginate .paginate_button:hover {
    background-color: #2cdd9b;
    color: white;
}

.notification-box {
    display: flex;
    align-items: center;
    background-color: #fff;
    margin-bottom: 1rem;
    padding: 10px;
    border: none;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-radius: 0.5rem;
}

.notification-text {
    flex: 1;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    margin-left: 10px;
}

.dropdown-list-image {
    height: 1.5rem;
    width: 1.5rem;
}

.dropdown-list-image img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius: 50%;
}

/* Remove the DataTables headers */
.dataTables_wrapper .dataTables_filter, 
.dataTables_wrapper .dataTables_info, 
.dataTables_wrapper .dataTables_length, 
.dataTables_wrapper .dataTables_processing, 
.dataTables_wrapper .dataTables_paginate {
    padding: 0;
    margin: 0;
}

#notificationsTable thead {
    display: none;
}

#notificationsTable_wrapper .dataTables_paginate .paginate_button:hover{
    background : #5767bd;
    color:white;
}

/* Responsive adjustment */
@media (max-width: 768px) {
    .notification-box {
        flex-direction: column;
        align-items: flex-start;
        padding: 10px 3px;
    }

    .notification-text {
        white-space: normal;
        text-overflow: clip;
    }

    .dropdown-list-image {
        height: 1.5rem;
        width: 1.5rem;
    }
}
.addprobtn {
  float: right;
    background: #f7941d;
    color: white;
    padding: 3px 9px !important;
    border-radius: 5px;
    border-color: #fff;
    border: none;
    margin-top: 7px;
    margin-right: 10px;
}
</style>
<div class="text-nowrap m-5">
    <div class="card">
        <div class="card-body p-0">
            <span class="addprobtn2">Notifications</span>
            <a href="<?php echo previous_url(); ?>"><span class="addprobtn">Back</span></a>
        </div>
    </div>

<div class="container">
    <div class="row mt-4 mb-4">
        <div class="col-lg mt-4 px-3">
        <table id="notificationsTable" class="table">
    <thead>
        <tr>
            <th>Notification</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data)): ?>
            <?php foreach ($data as $notification): ?>
                <tr>
                    <td class="border border-0">
                        <div class="notification-box border border-0 mb-0 d-flex flex-row align-items-center">
                            <!-- Notification Icon -->
                            <div class="dropdown-list-image mr-2">
                                <img class="rounded-circle" src="https://cdn-icons-png.flaticon.com/128/2645/2645897.png" alt="Notification Icon" />
                            </div>
                            <!-- Notification Text -->
                            <div class="notification-text font-weight-bold flex-grow-1">
                                <?= esc($notification['title']); ?>
                                <div class="text-muted small mt-1">
                                    <?= esc($notification['description']); ?>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-link text-danger delete-notification" 
                                data-id="<?= esc($notification['id']); ?>" 
                                title="Delete Notification">
                            <i class="fa fa-times"></i>
                        </button>
                    </td>

                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="2" class="text-center">No notifications available.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


        </div>
    </div>
</div>
</div>

<script>
    $(document).on('click', '.delete-notification', function () {
        const notificationId = $(this).data('id');
        const notificationItem = $(this).closest('.notification-item'); 

        $.ajax({
            url: `delete_notification/${notificationId}`, 
            method: 'DELETE',
            success: function (response) {
                if (response.status === 'success') 
                {
                    location.reload();
                } 
                else 
                {
                    console.error('Failed to remove notification:', response.message);
                }
            },
            error: function (xhr, status, error) 
            {
                console.error('Error deleting notification:', error);
            }
        });
    });
</script>

<?= $this->include ('templates/footer') ?>
