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
</style>

<div class="container">
    <div class="row mt-4 mb-4">
        <div class="col-lg mt-4 px-3">
            <table id="notificationsTable" class="table">
                <thead>
                    <tr>
                        <th>Notification</th>
                    </tr>
                </thead>
                <tbody>
                            <tr>
                                <td class="border border-0">
                                    <div class="notification-box border border-0 mb-0 d-flex flex-row ">
                                        <div class="dropdown-list-image mr-2">
                                            <img class="rounded-circle" src="https://cdn-icons-png.flaticon.com/128/2645/2645897.png" alt="" />
                                        </div>
                                        <div class="notification-text font-weight-bold">
                                           gbgghgjhg
                                        </div>
                                        <span class="ml-auto">
                                            <div class="text-right text-muted">
                                            gbgghgjhg
                                            </div>
                                        </span>
                                        <div class="btn-group float-right">
                                    <div class="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button class="dropdown-item del_notif fw-semibold" type="button" baseurl="<?= base_url(); ?>"><i class="fa-solid fa-check-double me-2"></i>Mark as Read</button>
                                    </div>
                                </div>
                                    </div>
                                </td>
                            </tr>
                        <tr>
                            <td class="text-center">No notifications available.</td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->include ('templates/footer') ?>
