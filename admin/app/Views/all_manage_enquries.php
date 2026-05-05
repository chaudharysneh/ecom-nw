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
.dataTables_empty {
    text-align: center;
}
</style>
<?= $this->include ('templates/header') ?>
<div class="table-responsive text-nowrap m-5">
	<div class="card">
	<div class="card-body p-0">
		<span class="addprobtn2">Enquiry </span> 
	</div>
</div>
	<div class="card mt-3">
		<div class='card-body '>
			<table class="table mt-3 mb-3" id="example" >
      <thead>
        <tr>
          <th class="text-center">Sr.No</th>    
          <th class="">Name</th>
          <th>Subject</th>
          <th>Email</th>
           <!--<th>Phone</th>-->
          <th>Message</th>
         
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      <?php
                      $i=1;
                         foreach($all_enquiry_data as $single_manage_enquries)
                        {
                          // print_r($single_catagories_data);
                          // die;
                          $full_msg=$single_manage_enquries['Message'];
                          $small_msg=substr($full_msg, 0, 25);
                          

                      ?>
                    <tr>
                      <td scope="row" class="text-center"><?php echo $i; ?></td>
                     
                      <td><?php echo $single_manage_enquries['Fullname'];?></td>
                      <td><?php echo  $single_manage_enquries['Subject']; ?></td>
                      <td><?php echo $single_manage_enquries['Email'];?></td>
                       <!--<td><?php echo $single_manage_enquries['Mobile'];?></td>-->
                      <td><?php echo $small_msg ?></td>
                     
                     
                
                      <td class="text-center">
                      <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu" style="">
                  <a class="dropdown-item" href="<?php echo base_url(); ?>view_detail_enquiry/<?php echo $single_manage_enquries['EnquiriID'] ?>"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                
                <a class="dropdown-item del_enquiry_type" href="javascript:void(0);" data-id="<?= $single_manage_enquries['EnquiriID'] ?>"> <i class="bx bx-trash me-1"></i> Delete</a>
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