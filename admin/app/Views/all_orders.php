<style>
  .table_product_img_th {
    width: 13%;
  }

  .table_product_img {
    width: 78%;
  }

  .addprobtn2 {
    float: left;
    color: #f7941d;
    padding: 10;
    border-radius: 5px;
    font-weight: bold;
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

  .dataTables_empty {
    text-align: center;
  }

  #example th[aria-label*="Order No"] {
    width: 120px !important;
  }

  #example th[aria-label*="Order Date"] {
    width: 140px !important;
    /* Adjust width as needed */
  }
</style>

<?= $this->include('templates/header') ?>

<div class="text-nowrap m-3 mx-lg-4">
  <div class="card">
    <div class="card-body p-0">
      <span class="addprobtn2">Orders</span><a href="<?php echo base_url(); ?>add-order"><span class="addprobtn">Add Order</span></a>
    </div>

  </div>
  <div class="card mt-3">
    <div class='card-body'>


      <div class="col-md-12">
        <div class="mb-4 mt-2 row gap-3 gap-md-0">
          <div class="col-md-3">
            <select id="order_no" name="order_no" class="form-select order_no">
              <option value="">Select Order No</option>
              <?php
              foreach ($orders as $single_customers_data) {
                // print_r($single_coupons_data);
                // die;

              ?>
                <option value="<?php echo $single_customers_data['OrderNumber']; ?>"> <?php echo $single_customers_data['OrderNumber']; ?> </option>
              <?php
              }
              ?>
            </select>
          </div>

          <!-- <div class="col-md-2">
          <select id="order_amount" name="order_amount" class="form-select order_amount">
                                                              <option value="">Select Amount</option>
                                                              <?php
                                                              //foreach($orders as $single_customers_data){
                                                              // print_r($single_coupons_data);
                                                              // die;

                                                              ?>
                    <option value="<?php //echo $single_customers_data['TotalAmount'];
                                    ?>"> <?php //echo $single_customers_data['TotalAmount'];
                                          ?> </option> 
                    <?php
                    //  }
                    ?>
        </select>
</div> -->
          <div class="col-md-3">
            <select id="order_status" name="order_status" class="form-select order_status">
              <option value="">Order Status</option>
              <option value="Pending"> Pending </option>
              <option value="Order Processing"> Order Processing </option>
              <option value="Order Cancelled"> Order Cancelled </option>
              <option value="Shipped"> Shipped </option>
              <option value="Completed">Completed</option>
            </select>
          </div>

          <div class="col-md-3">
            <input type="date" class="form-control date_order_selecter" id="date_order_selecter" name="date_order_selecter" value="<?php //echo  $coupons_data['coupons_data']; 
                                                                                                                                    ?>">

          </div>

          <div class="col-md-3">
            <button type="button" class="btn btn-primary w-100 search_order_datas" id="search_order_datas"><i class="fa fa-search"></i>Search </button>
          </div>


        </div>
      </div>

      <div class="table-responsive">
        <table class="table mb-3 mt-3" id="example">
          <thead>
            <tr>
              <th class="text-center">Sr.No</th>
              <th class="sorting wide-header" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Order No: activate to sort column ascending">Order No</th>
              <th>Customer</th>
              <th>Payment</th>
              <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Order Date: activate to sort column descending" style="width: 61.672px;" aria-sort="ascending">Order Date</th>
              <th>Amount</th>
              <th>Status</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0 order_table_data">
            <?php
            $i = 1;
            if (isset($orders)) {
              foreach ($orders as $ord) {
            ?>
                <tr>
                  <td class="text-center"><?php echo $i; ?></td>
                  <td><?php echo $ord['OrderNumber']; ?></td>
                  <td class="text-capitalize">
                    <?php echo $ord['UserFirstName']; ?>
                    <?php echo $ord['UserLastName']; ?>
                  </td>
                  <td class="text-capitalize"><?php echo $ord['payment']; ?></td>
                  <td><?php echo date("d M, Y", strtotime($ord['OrderDate'])); ?></td>
                  <td><?php echo $ord['TotalAmount']; ?></td>
                  <td class="text-capitalize">
                    <?php
                    if ($ord['OrderStatus'] == "panding") {
                      echo "Pending";
                    } else {
                      echo $ord['OrderStatus'];
                    }


                    $ord['OrderStatus'];
                    ?>
                  </td>
                  <td class="text-center">
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo base_url('view_order_details/' . $ord['OrderID']); ?>"><i class="fa fa-eye me-2"></i> View Details</a>
                        <a class="dropdown-item" href="<?php echo base_url('invoice/' . $ord['OrderID']); ?>"><i class="fa fa-file-pdf me-2"></i> Invoice download</a>
                        <a class="dropdown-item remove_order" data-id="<?php echo $ord['OrderID'];  ?>" href="#"><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
            <?php
                $i++;
              }
            }
            ?>

            <!--<tr>
          <td> <strong> 5654</strong></td>
          <td><img src="<?php echo base_url(); ?>public/assets/img/backgrounds/18.jpg"  class="table_product_img"></td>
           <td>
            T-Shirts
          </td>
          <td>John Deo</td>
         
          <td>Complete</td>
          <td>
          
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu" style="">
              <a class="dropdown-item" href="<?php echo base_url('view_order_details'); ?>"><i class="bx bx-trash me-2"></i> View Details</a>
                
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td> <strong>56</strong></td>
          <td><img src="<?php echo base_url(); ?>public/assets/img/backgrounds/18.jpg"  class="table_product_img"></td>
           <td>
            T-Shirts
          </td>
          <td>Neha</td>
         
          <td>pending</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu" style="">
              		<a class="dropdown-item" href="<?php echo base_url('view_order_details'); ?>"><i class="bx bx-trash me-2"></i> View Details</a>
                
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td> <strong>342</strong></td>
          <td><img src="<?php echo base_url(); ?>public/assets/img/backgrounds/18.jpg"  class="table_product_img"></td>
           <td>
            T-Shirts
          </td>
          <td>Jay</td>
         
          <td>Canceled</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu" style="">
              <a class="dropdown-item" href="<?php echo base_url('view_order_details'); ?>"><i class="bx bx-trash me-2"></i> View Details</a>
               
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td> <strong>42</strong></td>
          <td><img src="<?php echo base_url(); ?>public/assets/img/backgrounds/18.jpg"  class="table_product_img"></td>
           <td>
            T-Shirts
          </td>
          <td>Sunanda</td>
         
          <td>Complete</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu" style="">
              		
              <a class="dropdown-item" href="<?php echo base_url('view_order_details'); ?>"><i class="bx bx-trash me-2"></i> View Details</a>
                  
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td> <strong>154</strong></td>
          <td><img src="<?php echo base_url(); ?>public/assets/img/backgrounds/18.jpg"  class="table_product_img"></td>
           <td>
            T-Shirts
          </td>
          <td>Kiran</td>
         
          <td>Complete</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu" style="">
              <a class="dropdown-item" href="<?php echo base_url('view_order_details'); ?>"><i class="bx bx-trash me-2"></i> View Details</a>
                
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>-->
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

<?= $this->include('templates/footer') ?>