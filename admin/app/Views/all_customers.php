<style>
    .table_product_img_th {
        width: 13%;
    }

    .table_product_img {
        width: 78%;
    }

    #example th.text-center[aria-label*="Registration Date"] {
        width: 200px !important;
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

    .addprobtn2 {
        float: left;
        color: #f7941d;
        padding: 10;
        border-radius: 5px;
        font-weight: bold;
    }

    div#customer_table_length label,
    div#customer_table_filter label {
        display: flex;
    }

    div#customer_table_filter input,
    div#customer_table_filter input {
        width: 76%;
    }

    div#customer_table_filter {
        float: right;
    }

    .dataTables_empty {
        text-align: center;
    }
</style>
<?= $this->include('templates/header') ?>
<!-- <div class="text-nowrap m-5"> -->
<div class="text-nowrap m-3 mx-lg-4">
    <div class="card">
        <div class="card-body p-0">
            <span class="addprobtn2">Customers</span><a href="<?php echo base_url(); ?>add-customers"><span class="addprobtn">Add Customers</span></a>
        </div>
    </div>

    <div class="card mt-3">
        <div class='card-body'>
            <div class="mb-4 mt-2 row gap-3 gap-md-0">
                <div class="col-md-3">
                    <select id="all_email" name="all_email" class="form-select all_email">
                        <option value="">All Email</option>
                        <?php
                        foreach ($customers_data as $single_customers_data) {
                            // print_r($single_coupons_data);
                            // die;

                        ?>
                            <option value="<?php echo $single_customers_data['UserEmail']; ?>"> <?php echo $single_customers_data['UserEmail']; ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <select id="all_phone" name="all_phone" class="form-select all_phone">
                        <option value="">Phone Number</option>
                        <?php
                        foreach ($customers_data as $single_customers_data) {

                        ?>
                            <option value="<?php echo $single_customers_data['UserPhone']; ?>"> <?php echo $single_customers_data['UserPhone']; ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <input type="date" class="form-control date_selecter" id="date_selecter" name="date_selecter" value="<?php //echo  $coupons_data['coupons_data']; 
                                                                                                                            ?>">

                </div>

                <div class="col-md-3">
                    <button type="button" class="btn btn-primary w-100 search_dataes" id="search_dataes">
                        <i class="fa fa-search"></i> Search
                    </button>
                </div>
            </div>


 <div class="table-responsive">
            <table class="table mt-3 mb-3 overflow-auto" id="example">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th class="text-center sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Registration Date: activate to sort column ascending" style="width: 200px !important;">Registration Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0 customer_details_table">
                    <?php
                    $i = 1;
                    foreach ($customers_data as $single_customer) {
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i++ ?></td>
                            <td><?php echo $single_customer['UserFirstName']; ?></td>
                            <td><?php echo $single_customer['UserEmail']; ?></td>
                            <td>
                                <?php if (!empty($single_customer['UserPhone'])) {
                                    echo $single_customer['UserPhone'];
                                } else {
                                    echo "NA";
                                } ?>
                                <!--State:-->
                                <?php //echo $single_customer['UserState']; 
                                ?>
                                <!--City:-->
                                <?php //echo $single_customer['UserCity']; 
                                ?>


                            </td>
                            <td class="text-center"> <?php echo date('d-m-Y', strtotime($single_customer['UserRegistrationDate'])); ?> </td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu" style="">
                                        <a class="dropdown-item" href="<?php echo base_url(); ?>view_customer_details/<?php echo $single_customer['UserID'] ?>"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                                        <a class="dropdown-item" href="<?php echo base_url(); ?>edit-customer-details/<?php echo $single_customer['UserID'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item del_customer" href="javascript:void(0);" data-id="<?= $single_customer['UserID'] ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>

</div>


<?= $this->include('templates/footer') ?>