

<style>
	.table_product_img_th{
    width: 13%;
}
.table_product_img {
    width: 78%;
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
    color: #696cff;
    padding: 10;
    border-radius: 5px;
    font-weight: bold;
}
.name{
    width:18%!important;
}

div#coupon_table_length label , div#coupon_table_filter label {
    display: flex;
}

div#coupon_table_filter input , div#coupon_table_filter input {
    width:76%;
}
div#coupon_table_filter {
    float: right;
}
#coupon_table {
    width: 100% !important;
}
#coupon_table thead, 
#coupon_table thead tr {
    margin: 0;
    padding: 0;
    border-spacing: 0;
}
.dataTables_scroll *,
.dataTables_scroll *::before,
.dataTables_scroll *::after {
    box-sizing: content-box;
}

table th {
    height: auto !important;            /* Ensures no specific height is applied */
    padding: 0 !important;              /* Removes padding */
    border-top: none !important;        /* Removes the top border */
    border-bottom: none !important;     /* Removes the bottom border */
}

/* Remove extra height for the row */
table tr {
    height: auto !important;            /* Ensures no height is set for rows */
}

/* Make sure the content inside the th divs fit properly */
table th div {
    height: auto !important;            /* Removes fixed height */
    overflow: visible !important;       /* Allows content to overflow if necessary */
}

/* Hide the extra header that is wrapped in .dataTables_scrollHead */
.dataTables_scrollHead {
    display: none !important;
}


thead th:nth-child(1), /* For 'Sr.No' column */
thead th:nth-child(2), /* For 'Order ID' column */
thead th:nth-child(3), /* For 'Customer Details' column */
thead th:nth-child(4), /* For 'Transaction ID' column */
thead th:nth-child(5), /* For 'Payment Type' column */
thead th:nth-child(6), /* For 'Amount' column */
thead th:nth-child(7), /* For 'Payment Status' column */
thead th:nth-child(8), 
thead th:nth-child(9) /* For 'Payment Date' column */
{
    padding-top: 10px !important;
    padding-bottom: 15px !important;
    line-height: 1 !important;
}


</style>
<?= $this->include ('templates/header') ?>
<div class="table-responsive text-nowrap m-5">
	<div class="card">
	<div class="card-body p-0">
		<span class="addprobtn2">Coupons </span><a href="<?php echo base_url(); ?>add-coupons"><span class="addprobtn">Add Coupons</span></a>
	</div>
</div>

	<div class="card mt-3">
	   
		<div class='card-body'>
		    <div class="col-md-12">
		     <div class="mb-4 mt-2 row">
		        
	     
    



<!-- <div class="col-md-2">
    <select id="discount_on" name="discount_on" class="form-select discount_on">
        <option value="">Discount On</option>
          <?php 
          // foreach($coupon_data_value as $single_coupons_data)
          // {
              // print_r($single_coupons_data);
              // die;
          ?>
          <option value="<?php //echo $single_coupons_data['CouponValue'];?>"> <?php //echo $single_coupons_data['CouponValue'];?> </option> 
          <?php
           // }
          ?>
    </select>
</div>

<div class="col-md-2">
    <select id="coupon_type_status" name="coupon_type_status" class="form-select coupon_type_status">
                                          <option value="">Coupon Type</option>
                                          <option value="1"> Percentage </option>
                                          <option value="2"> Fixed </option>
    </select>
</div> -->

<!--<div class="col-md-2">-->
<!--    <select id="all_status" name="all_status" class="form-select all_status">-->
<!--                                          <option value="">All</option>-->
                                          <!--<option value="1">Active</option>-->
                                          <!--<option value="2">Inactive</option>-->
                                          <!--<option value="3">Expired</option>-->
<!--                                       </select>-->
<!--</div>-->



<div class="col-md-2">
    <div class="row">
        <div class="col-lg-3">
             <label for="from" class="mt-2">From :</label>
        </div>
        <div class="col-lg-9">  
        <input type="date"  class="form-control date_from_selecter" id="date_from_selecter" name="date_from_selecter" value="<?php //echo  $coupons_data['coupons_data']; ?>">
        </div>
    </div>
</div>


<div class="col-md-2">
    <div class="row">
        <div class="col-lg-2">
             <label for="to" class="mt-2">To :</label>
        </div>
        <div class="col-lg-9">
            <input type="date"  class="form-control date_to_selecter" id="date_to_selecter" name="date_to_selecter" value="<?php //echo  $coupons_data['coupons_data']; ?>">
        </div>
</div>
      
   
    
   
</div>


<div class="col-md-7 text-end">
    <button type="button" class="btn btn-primary mb-4 search_datas" id="search_datas"><i class="fa fa-search"></i>Search </button>
    </div>


</div>
</div>

<!--<div class="row">-->
<!--    <div class="col-md-2">-->
<!--    <button type="button" class="bg-primary form-control mb-4 text-lightest search_datas" id="search_datas"><i class="fa fa-search"></i>Search </button>-->
<!--    </div>-->
<!--    <div class="col-md-2">-->
<!--    <a href=""> Reset </a>-->
<!--</div>-->
<!--</div>-->




			<table class="table mt-3 mb-3" id="coupon_table" >
      <thead>
        <tr>
          <th class="text-center" aria-controls="coupon_table">Sr.No</th>   
          <th class="text-center" aria-controls="coupon_table">Coupon</th>
          <th class="text-center" aria-controls="coupon_table">User Specific</th>
          <th class="text-center" aria-controls="coupon_table">Code</th>
          <th class="text-center" aria-controls="coupon_table">Type</th>
          <th class="text-center" aria-controls="coupon_table">Discount</th>
          <th class="text-center" aria-controls="coupon_table">Validity</th>
          <th class="text-center" aria-controls="coupon_table">Status</th>
          <!--<th>Status</th>-->
          <th class="text-center"class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0 coupon_table_data">
      <?php
                      $i=1;
                        foreach($coupons_data as $single_coupons_data)
                        {
                      ?>
                      <tr>
                        <td scope="row" class="text-center"><?php echo $i; ?></td>
                        <td><?php echo $single_coupons_data['CouponName'];?></td>
                        <td><?php echo $single_coupons_data['ProductSpecification'];?></td>
                        
                        <td><?php echo $single_coupons_data['CouponCode'];?></td>
                        <td><?php if($single_coupons_data['CouponType']==1){echo "Percentage";}if($single_coupons_data['CouponType']==2){echo "Fixed";}  ?></td>
                        <td><?php echo $single_coupons_data['CouponValue'];?></td>
                          
                        <td>
                          <strong>From :</strong> <?php echo date('d-m-Y',strtotime($single_coupons_data['StartDate']));?>
                            <strong>To :</strong> <?php echo date('d-m-Y',strtotime($single_coupons_data['EndDate']));?>  
                          </td>
                        <td>
                           <?php if($single_coupons_data['UserStatus']==1){echo '<i class="fa fa-check" style="color: green;"></i>'."Active";} ?>
                           <?php  if($single_coupons_data['UserStatus']==2){echo  '<i class="fa fa-check" style="color: red;"></i>'. "Inactive";} 
                            if($single_coupons_data['UserStatus']==3){echo "Exepired";} ?></td>
                           <!--<td> -->
                           <?php //if($single_coupons_data['UserStatus']==1){echo "<i class='fa fa-toggle-on' style='color: green;'></i>";} if($single_coupons_data['UserStatus']==2){echo "<i class='fa fa-toggle-off' style='color: red';></i>";} if($single_coupons_data['UserStatus']==3){echo "Exepired";} ?>
                           <!--</td>-->
                        <td class="text-center">
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu" style="">
                              <a class="dropdown-item" href="<?php //echo base_url(); ?>edit-coupons/<?= $single_coupons_data['CouponID'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                              <a class="dropdown-item del_coupons_type" href="javascript:void(0);" data-id="<?= $single_coupons_data['CouponID'] ?>"> <i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                          </div>
                        </td>
                    </tr>
                    <?php
                        $i++;
                        }
                        ?>
 
       
      </tbody>
    </table>
		</div>
	</div>
    
  </div>
  


<?= $this->include ('templates/footer') ?>