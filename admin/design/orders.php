<style>
	.table_product_img_th{
    width: 13%;
}
.table_product_img {
    width: 78%;
}
</style>

<?php include ('header.php');?>
<div class="table-responsive text-nowrap m-5">
	<div class="card">
	<div class="card-body p-3">
		<span class="mini-header ">Orders</span>
	</div>
</div>
	<div class="card mt-3">
		<div class='card-body'>
				<table class="table mb-3 mt-3" id="example">
      <thead>
        <tr>
          <th>Id</th>
          <th class="table_product_img_th">Image</th>
          <th>Product Name</th>
          <th>Customer Name</th>
          <th>status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr>
          <td> <strong> 5654</strong></td>
          <td><img src="assets/img/backgrounds/18.jpg"  class="table_product_img"></td>
           <td>
            T-Shirts
          </td>
          <td>John Deo</td>
         
          <td>Complete</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu" style="">
              		<a class="dropdown-item" href="order_details.php"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
               
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
       <tr>
          <td> <strong>56</strong></td>
          <td><img src="assets/img/backgrounds/18.jpg"  class="table_product_img"></td>
           <td>
            T-Shirts
          </td>
          <td>Neha</td>
         
          <td>pending</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu" style="">
              		<a class="dropdown-item" href="order_details.php"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td> <strong>342</strong></td>
          <td><img src="assets/img/backgrounds/18.jpg"  class="table_product_img"></td>
           <td>
            T-Shirts
          </td>
          <td>Jay</td>
         
          <td>Canceled</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu" style="">
              		<a class="dropdown-item" href="order_details.php"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td> <strong>42</strong></td>
          <td><img src="assets/img/backgrounds/18.jpg"  class="table_product_img"></td>
           <td>
            T-Shirts
          </td>
          <td>Sunanda</td>
         
          <td>Complete</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu" style="">
              		<a class="dropdown-item" href="order_details.php"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td> <strong>154</strong></td>
          <td><img src="assets/img/backgrounds/18.jpg"  class="table_product_img"></td>
           <td>
            T-Shirts
          </td>
          <td>Kiran</td>
         
          <td>Complete</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu" style="">
              		<a class="dropdown-item" href="order_details.php"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
               
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
		</div>
	</div>
    
  </div>

<?php include ('footer.php');?>