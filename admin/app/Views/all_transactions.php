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
    padding: 10;
    border-radius: 5px;
}
.addprobtn2 {
    float: left;
    color: #696cff;
    padding: 10;
    border-radius: 5px;
    font-weight: bold;
}

div#trans_table_length label , div#trans_table_filter label {
    display: flex;
}

div#trans_table_filter input , div#trans_table_filter input {
    width:76%;
}
div#trans_table_filter {
    float: right;
}
/* Remove height, padding, and borders for table headers */
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
thead th:nth-child(8)  /* For 'Payment Date' column */
{
    padding-top: 10px !important;
    padding-bottom: 15px !important;
    line-height: 1 !important;
}

.dataTables_empty {
    text-align: center;
}
.sorting_1
{
    text-align: center;
}
#trans_table {
    width: 100% !important;
}
</style>
<?= $this->include('templates/header') ?>
<div class="table-responsive text-nowrap m-5">
	<div class="card">
	<div class="card-body p-0">
		<span class="addprobtn2">Transactions</span>
	</div>
</div>
	<div class="card mt-3">
		<div class='card-body'>
		    
		    <div class="col-md-12">
		     <div class="mb-4 mt-2 row">
		        
	   <!--     <div class="col-md-2">-->
    <!--<input type="text" placeholder="Search" class="form-control search_trans_data" id="search_trans_data">-->
    <!--</div>-->
    

                <div class="col-md-3">
                    <select id="all_trans" name="all_trans" class="form-select all_trans">
                          <option value="">All Transactions</option>
                         <?php 
                        //  print_r($trans_data);
                         
                        foreach($trans_data as $single_trans_data){
                        if(!empty($single_trans_data['OrderID'])) 
                        {
                        $products = new App\Models\Ordermodel();
                        $prod = $products
                           ->where('OrderID', $single_trans_data['OrderID'])
                           ->get()
                           ->getRow();
                        ?>
                        <option value="<?php echo $prod->OrderID ?? '';?>"> <?php echo $prod->OrderNumber ?? '';?> </option> 
                        <?php
                          }else{
                             echo 'No Product Found';
                          }
                         }
                         
                        ?>
                       </select>
                </div>



                <!-- <div class="col-md-2">
                    <select id="trans_amount" name="trans_amount" class="form-select trans_amount">
                      <option value="">Amount</option>
                       <?php 
                             //foreach($all_amount_data as $single_trans_data){
                                // print_r($single_coupons_data);
                                // die;
                            
                            ?>
                            <option value="<?php //echo $single_trans_data['Amount'];?>"> <?php //echo $single_trans_data['Amount'];?> </option> 
                            <?php
                              //}
                            ?>
                    </select>
                </div> -->

                <div class="col-md-3">
                    <select id="payment_status" name="payment_status" class="form-select payment_status">
                      <option value="">Payment Status</option>
                      <option value="1"> Success </option>
                       <option value="2"> Pending </option>
                        <option value="3"> Failed </option>
                   </select>
                </div>


                <div class="col-md-3">
                    <input type="date"  class="form-control date_trans_selecter" id="date_trans_selecter" name="date_trans_selecter" value="<?php //echo  $coupons_data['coupons_data']; ?>">
                   
                </div>
                
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary w-100 search_trans_datas" id="search_trans_datas"><i class="fa fa-search"></i>Search </button>
                    </div>
                </div>
                </div>
		    
		
		    
			<table class="table mt-3 mb-3" id="trans_table" >
                  <thead >
                  <tr>
            <th class="sorting sorting_asc text-center" aria-controls="trans_table" rowspan="1" colspan="1">Sr.No</th>
            <th class="sorting text-center" aria-controls="trans_table" rowspan="1" colspan="1">Order ID</th>
            <th class="sorting text-center" aria-controls="trans_table" rowspan="1" colspan="1">Customers</th>
            <th class="sorting text-center" aria-controls="trans_table" rowspan="1" colspan="1">Transaction ID</th>
            <th class="sorting text-center" aria-controls="trans_table" rowspan="1" colspan="1">Payment</th>
            <th class="sorting text-center" aria-controls="trans_table" rowspan="1" colspan="1">Amount</th>
            <th class="sorting text-center" aria-controls="trans_table" rowspan="1" colspan="1">Status</th>
            <th class="sorting text-center"  aria-controls="trans_table" rowspan="1" colspan="1">Date</th>
        </tr>
                  </thead>
                  <tbody class="table-border-bottom-0 trans_table_data">
                      
                      
                      <?php 
                      $i=1;
                          foreach($trans_data as $single_product){
                          ?>
                          
                        <tr>
                             <td class="text-center"> <strong> <?php echo $i++; ?></strong></td>
                             <?php 
                                if (!empty($single_product['OrderID'])) {
                                    $products = new App\Models\Ordermodel();
                                    $prod = $products
                                    ->where('OrderID', $single_product['OrderID'])
                                    ->get()
                                    ->getRow();
                                ?>
                                    <td class="text-center">
                                        
                                        <a style="color: #697a8d;" href="<?php echo base_url('view_order_details/' . $single_product['OrderID']); ?>">
                                         <?php echo $prod->OrderNumber ?? ''; ?>
                                        </a>
                                    </td>
                               

                             
                             <td >
                                 <strong>Name : </strong><?php echo $single_product['UserFirstName']; ?> <?php echo $single_product['UserLastName']; ?><br>
                                 <strong>Email : </strong><?php echo $single_product['UserEmail']; ?>
                            </td >
                                 <td class="text-center"><?php  if(!empty($single_product['Transation_id'])){echo $single_product['Transation_id'];}else{echo "-";} ?></td>
                          
                            <td>
                                <?php echo $single_product['PaymentType'];?>
                              <?php  //if($single_product['PaymentType']==1) {echo "Credit card";} ?>
                              <?php //if($single_product['PaymentType']==2) {echo "Paypal";} ?>
                             <?php //if($single_product['PaymentType']==3) {echo "Bank transfer";} ?>
                             </td>
                          
                          
                           <td><?php echo $single_product['Amount']; ?></td>
                          <td>
                              <?php echo $single_product['PaymentStatus']; ?>
                              <?php  //if($single_product['PaymentStatus']==1) {echo "Success";} ?>
                              <?php //if($single_product['PaymentStatus']==2) {echo "Pending";} ?>
                             <?php //if($single_product['PaymentStatus']==3) {echo "Failed";} ?>
                             </td>
                             <td><?php echo $single_product['PaymentDate']; ?></td>
                        
                        </tr>
                        
                         <?php }
                         }
                         ?>
                
                       
                      </tbody>
                </table>
        		</div>
        	</div>
            
          </div>
  
<script>
    $('#trans_table').DataTable({
    "scrollY": "300px",     // Optional: enables vertical scrolling
    "scrollCollapse": true,  // Optional: ensures the table scrolls properly when content is smaller
    "paging": false,         // Optional: disables pagination
    "fixedHeader": false,    // Disable fixed header feature if it’s causing the issue
    "responsive": true       // Optional: enables responsive design for the table
});

</script>

  <?= $this->include('templates/footer') ?>