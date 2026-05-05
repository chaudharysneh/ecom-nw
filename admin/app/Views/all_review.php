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
.dataTables_empty {
    text-align: center;
}
</style>
<?= $this->include('templates/header') ?>
<div class="table-responsive text-nowrap m-5">
	<div class="card">
	<div class="card-body p-0">
		<span class="addprobtn2">Reviews</span>
	</div>
</div>
	<div class="card mt-3">
		<div class='card-body '>
			<table class="table mt-3 mb-3" id="example" >
      <thead>
        <tr>
          <th>Customer</th>
          <th>Rating</th>
          <th>Review</th>
          <th>Product</th>
          <th>Submitted On</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
          <?php 
          $i=1;
        //   print_r($review_array); die;
          foreach($review_array as $single_data){
          ?>
        <tr>
          <td> <strong><?php echo $single_data['name']; ?></strong></td>
          <td>
          <?php 
          $star= $single_data['rating']; 
          $html ='';
          for($x=1; $x<=$star; $x++){
             $html.='<i class="fa fa-star"></i>';
          }
          ?>
          <?=$html?>
          </td>
            
           <td>
            <?php echo $single_data['description'];  ?>
          </td>
          <td><?php echo $single_data['product_name']; ?></td>
          <td><?php echo $single_data['created_date']; ?></td>
          <td class="text-center">
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu" style="">
                
                <a class="dropdown-item del_review" href="javascript:void(0);" data-id="<?= $single_data['review_id'] ?>"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        <?php }?>
        <!--<tr>-->
        <!--  <td> <strong> John</strong></td>-->
        <!--  <td><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></td>-->
        <!--   <td>-->
        <!--    Nice Product-->
        <!--  </td>-->
        <!--  <td>T-Shirt</td>-->
        <!--  <td>3/3/2023</td>-->
        <!--  <td>-->
        <!--    <div class="dropdown">-->
        <!--      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>-->
        <!--      <div class="dropdown-menu" style="">-->
              
        <!--        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </td>-->
        <!--</tr>-->
        <!--<tr>-->
        <!--  <td> <strong> John</strong></td>-->
        <!--  <td><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></td>-->
        <!--   <td>-->
        <!--    Nice Product-->
        <!--  </td>-->
        <!--  <td>T-Shirt</td>-->
        <!--  <td>3/3/2023</td>-->
        <!--  <td>-->
        <!--    <div class="dropdown">-->
        <!--      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>-->
        <!--      <div class="dropdown-menu" style="">-->
                
        <!--        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </td>-->
        <!--</tr>-->
        <!--<tr>-->
        <!--  <td> <strong> John</strong></td>-->
        <!--  <td><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></td>-->
        <!--   <td>-->
        <!--    Nice Product-->
        <!--  </td>-->
        <!--  <td>T-Shirt</td>-->
        <!--  <td>3/3/2023</td>-->
        <!--  <td>-->
        <!--    <div class="dropdown">-->
        <!--      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>-->
        <!--      <div class="dropdown-menu" style="">-->
              
        <!--        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </td>-->
        <!--</tr><tr>-->
        <!--  <td> <strong> John</strong></td>-->
        <!--  <td><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></td>-->
        <!--   <td>-->
        <!--    Nice Product-->
        <!--  </td>-->
        <!--  <td>T-Shirt</td>-->
        <!--  <td>3/3/2023</td>-->
        <!--  <td>-->
        <!--    <div class="dropdown">-->
        <!--      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>-->
        <!--      <div class="dropdown-menu" style="">-->
               
        <!--        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </td>-->
        <!--</tr>-->
        <!--<tr>-->
        <!--  <td> <strong> John</strong></td>-->
        <!--  <td><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></td>-->
        <!--   <td>-->
        <!--    Nice Product-->
        <!--  </td>-->
        <!--  <td>T-Shirt</td>-->
        <!--  <td>3/3/2023</td>-->
        <!--  <td>-->
        <!--    <div class="dropdown">-->
        <!--      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>-->
        <!--      <div class="dropdown-menu" style="">-->
                
        <!--        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </td>-->
        <!--</tr>-->
       
      </tbody>
    </table>
		</div>
	</div>
    
  </div>
  


  <?= $this->include('templates/footer') ?>