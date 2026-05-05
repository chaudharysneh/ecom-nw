<?= $this->include('templates/header') ?>

<style>
    .card-body h3{
        font-size:17px;
    }
    .dk-bg{
        background-color: #333 !important;
    }
    .dataTables_empty
    {
        text-align: center;
    }
    .text-white
    {
        margin-top: -1px;
    }
    .sp
    {
        margin-left:8px
    }
    .text-nowrap
    {
        margin-top: -8px;
        font-size: 17px;
    }

    .www
    {
        width: 13% !important;
    }
    
    .wht-spc-nwrap{
        white-space:nowrap !important;
    }
    
    /* .dropdown-icon {*/
    /*    appearance: none;*/
    /*    -webkit-appearance: none; */
    /*    -moz-appearance: none; */
    /*    background: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white"><path d="M7 10l5 5 5-5H7z"/></svg>') no-repeat right 10px center;*/
    /*    background-size: 25px 28px;*/
    /*    padding-right: 30px;*/
    /*    border: 1px solid #fff;*/
    /*    border-radius: 4px;*/
    /*    cursor: pointer;*/
    /*    color:#fff;*/
    /*}*/

    /* Optional: Add hover effect for better user experience */
    /*.dropdown-icon:hover {*/
    /*    border-color: #888;*/
    /*}*/

    
</style>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-6 col-lg-4">
            <div class="card mb-3 ">
            <div class="card-body dk-bg text-white d-flex align-items-center pt-3 pb-1 px-3 rounded">
                    <div class="card-title d-flex align-items-center flex-grow-1">
                        <div class="box-icon">
                            <i class="fa fa-shopping-bag header-icon" aria-hidden="true"></i>
                        </div>
                         <a href = "<?php echo base_url('all-products')?>">
                          <span class="d-block mb-0 text-white">Products</span>
                          </a>
                    </div>
                    
                    <h4 class="card-title text-nowrap mb-2 text-end text-white">
                        <?php echo $pro_count; ?>
                    </h4>
                </div>

            </div>
        </div>
        <div class="col-6 col-lg-4">
            <div class="card mb-3 ">
                <div class="card-body dk-bg text-white d-flex align-items-center pt-3 pb-1 px-3 rounded">
                    <div class="card-title d-flex align-items-center flex-grow-1">
                        <div class="box-icon">
                            <i class="fa fa-shopping-cart header-icon" aria-hidden="true"></i>
                        </div>
                        <a href = "<?php echo base_url('all-orders')?>">
                        <span class="d-block mb-0 text-white">Orders</span>
                         </a>
                    </div>
                    
                    <h4 class="card-title text-nowrap mb-2 text-end text-white">
                        <?php echo $orders_count; ?>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-4">
            <div class="card mb-3 ">
                <div class="card-body dk-bg text-white d-flex align-items-center pt-3 pb-1 px-3 rounded">
                    <div class="card-title d-flex align-items-center flex-grow-1">
                        <div class="box-icon">
                            <i class="fa fa-user  header-icon" aria-hidden="true"></i>
                        </div>
                        <a href = "<?php echo base_url('all-customers')?>">
                        <span class="d-block mb-0 text-white">Customer</span>
                        </a>
                    </div>
                    
                    <h4 class="card-title text-nowrap mb-2 text-end text-white">
                        <!-- $<?php //echo $total_revenue; ?> -->
                        <?php echo $cutomer_count; ?>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-4">
            <div class="card mb-3 ">
                <div class="card-body dk-bg text-white d-flex align-items-center pt-3 pb-1 px-2 rounded">
                    <div class="card-title d-flex align-items-center flex-grow-1">
                        <div class="box-icon">
                            <i class="fa-solid fa-money-bill header-icon" aria-hidden="true"></i>
                        </div>
                        <span class="d-none d-lg-block mb-0 text-white">Revenue This Month</span>
                        <span class="d-block d-lg-none mb-0 text-white">Revenue</span>
                    </div>
                    
                    <h4 class="card-title text-nowrap mb-2 text-end text-white">
                    <?php echo $currency; ?><?php echo $total_revenue_this_month; ?>

                        
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-4">
            <div class="card mb-3 ">
                <div class="card-body dk-bg text-white d-flex align-items-center pt-3 pb-1 px-3 rounded">
                    <div class="card-title d-flex align-items-center flex-grow-1">
                        <div class="box-icon">
                            <i class="fa fa-book header-icon" aria-hidden="true"></i>
                        </div>
                          <a href = "<?php echo base_url('all_blog')?>">
                        <span class="d-block mb-0 text-white">Blogs</span>
                         </a>
                    </div>
                    
                    <h4 class="card-title text-nowrap mb-2 text-end text-white">
                        <?php echo $blog_count; ?>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-4">
            <div class="card mb-3 ">
                <div class="card-body dk-bg text-white d-flex align-items-center pt-3 pb-1 px-3 rounded">
                    <div class="card-title d-flex align-items-center flex-grow-1">
                        <div class="box-icon">
                            <i class="fa fa-question-circle header-icon" aria-hidden="true"></i>
                        </div>
                        <a href = "<?php echo base_url('all_manage_enquries')?>">
                        <span class="d-block mb-0 text-white">Enquiry</span>
                         </a>
                    </div>
                    
                    <h4 class="card-title text-nowrap mb-2 text-end text-white">
                        <?php echo $EnquiryModel_data; ?>
                    </h4>
                </div>

            </div>
        </div>

        <!-- Total Revenue -->
    <!-- <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2"></div> -->
    </div>

<div class="row mt-2 ">
    <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
        <div class="card">
            <div class="row row-bordered g-0">
                <div class="col-md-12">
                <h5 class="card-header text-white py-3 text-end d-flex justify-content-between align-items-center">
                    <span>Total Revenue &nbsp;<span>(<?php echo $currency; ?><?php echo $total_revenue; ?>)</span></span>
                    &nbsp;<select class="form-control ms-2" id="yearDropdown" name="year" style="width: auto; appearance: auto;">
                            <?php
                            $currentYear = date("Y");
                            for ($i = $currentYear; $i >= $currentYear - 0; $i--) {
                                echo "<option value=\"$i\">$i</option>";
                            }
                            ?>
                        </select>
                </h5>
                    <div id="totalRevenueChart" class="px-2"></div>
                </div>


            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4 order-2 order-md-3 order-lg-2 mb-4">
        <div class="card">
            <h5 class="card-header text-white ">
                Today's Order
            </h5>
            <?php
            // echo '<pre>';
            // print_r($today_order);die;
            if (!empty($today_order)) {
                foreach ($today_order as $key => $value) 
                {
                    $customer_name = $value['fname'];  
                    $order_number = $value['OrderNumber'];   
            ?>
                <div class="card-body pdpd">
                    <div class="card shadow-sm my-2 border-0">
                        <div class="card-body d-flex align-items-center bg-light rounded p-3" style="height: 47px;;">
                            <!-- Icon and Title -->
                            <div class="d-flex align-items-center flex-grow-1">
                                <div class="box-icon bg-light rounded-circle me-3 d-flex align-items-center justify-content-center shadow" 
                                    style="width: 40px; height: 40px; border: 2px solid ;">
                                    <?php 
                                    $profile_image = !empty($value['profile_image']) ? $value['profile_image'] : '1726489852_e592e9acb7da41b704cb.jpg'; // Default fallback image
                                    $image_url = base_url('public/assets/img/profile_images/' . $profile_image);
                                    ?>
                                    
                                    <img src="<?php echo $image_url; ?>" 
                                        alt="Icon" 
                                        class="img-fluid rounded-circle" 
                                        style="width: 28px; height: 28px; object-fit: cover;">
                                </div>

                                <div>
                                    <a href="<?php echo base_url('view_order_details/'.$value['OrderID']); ?>" class="text-decoration-none">
                                        <span class="fs-5 fw-bold text-dark d-block"><?php echo $customer_name; ?></span>
                                        <span class="text-muted small">Order number - <?php echo $order_number; ?></span>
                                    </a>
                                </div>
                            </div>
                            
                            <a href="<?php echo base_url('view_order_details/'.$value['OrderID']); ?>" class="text-decoration-none">
                                <h4 class="card-title mb-0 fw-bold redirect-icon">
                                    <i class="fa fa-chevron-right" style="font-size:14px;"></i>
                                </h4>
                            </a>
                        </div>
                    </div>
                </div>
            <?php
                }
            } else {
                // Display a message when there are no orders
                echo "<div class='alert text-center mb-0'>No orders for today.</div>";
            }
            ?>
        </div>
    </div>
</div>
<div class="col-12 col-lg-12 mb-4">
        <div class="card">
            <div class="card-body overflow-auto">
                <table class="table mb-3 mt-3" id="example">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="wht-spc-nwrap">Order No</th>
                            <th class="wht-spc-nwrap">Customer Name</th>
                            <th>Payment</th>
                            <th class="wht-spc-nwrap">Order Date</th>
                            <th class="wht-spc-nwrap">Total amount</th>
                            <th>status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 order_table_data">
                        <?php
                        $i = 1;
                        if (isset($orders) && !empty($orders)) {
                            foreach ($orders as $ord) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $i; ?></td>
                            <td><?php echo $ord['OrderNumber']; ?></td>
                            <td><?php if (!empty($ord['UserFirstName'])) { echo $ord['UserFirstName'] . ' ' . $ord['UserLastName']; } else { echo '-'; } ?></td>
                            <td><?php echo $ord['payment']; ?></td>
                            <td><?php echo date("d M, Y", strtotime($ord['OrderDate'])); ?></td>
                            <td><?php echo $ord['TotalAmount']; ?></td>
                            <td><?php if ($ord['OrderStatus'] == "panding") { echo "Pending"; } else { echo $ord['OrderStatus']; } ?></td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo base_url('view_order_details/' . $ord['OrderID']); ?>">
                                            <i class="fa fa-eye me-2"></i> View Details
                                        </a>
                                        <a class="dropdown-item remove_order" data-id="<?php echo $ord['OrderID']; ?>" href="#">
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                            $i++;
                            }
                        } else {
                            echo '<tr><td colspan="8" class="text-center">No matching records found</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    
              
</div>

<script>


</script>

<style>
    .redirect-icon {
    width: 25px;
    height: 25px;
    background-color: #e0e0e0; /* Light gray */
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Soft shadow */
    cursor: pointer;
    transition: transform 0.2s, background-color 0.2s;
}

.redirect-icon i {
    color: #7d7d7d; /* Gray for the arrow */
    font-size: 15px;
    margin-top:4px
}

.redirect-icon:hover {
    background-color: #d0d0d0; /* Slightly darker gray on hover */
    transform: scale(1.1); /* Slight zoom effect */
}

.pdpd
{
    padding: 0px 1.5rem 0rem 1.5rem !important;
}

</style>
            



<?= $this->include('templates/footer') ?>


 