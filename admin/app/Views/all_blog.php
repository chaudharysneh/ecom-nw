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
    width:15%;
}
.dataTables_empty {
    text-align: center;
}
</style>
<?= $this->include('templates/header') ?>
<div class="table-responsive text-nowrap m-5">
	<div class="card">
	<div class="card-body p-0">
		<span class="addprobtn2">Blog</span><a href="<?php echo base_url(); ?>add_blog"><span class="addprobtn">Add Blog</span></a>
	</div>
</div>
	<div class="card mt-3">
		<div class='card-body '>
			<table class="table mt-3 mb-3" id="example" >
      <thead>
        <tr>
          <th class="text-center">Sr.No</th> 
         <th class="">Title</th>
         <th>Description</th>
           <th class="">Image</th>
           <th>Category</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">



                      <?php
                     $i=1;
                      foreach($allblogsdata as $single_banners_data)
                      {
                        
                      ?>
                    <tr>
                      <td scope="row" class="text-center"><?php  echo $i; ?></td>
                      <td><?php echo $single_banners_data['title'];?></td>
                      <td><?php echo $single_banners_data['description'];?></td>
                      
                      <td> 
                          <?php 
                          if (!empty($single_banners_data['image'])) { ?>
                              <img src="<?php echo base_url().'public/upload_images/'. $single_banners_data['image'];?>" 
                                  width="50" height="50" style="object-fit: cover; border: 2px solid #dadada70; border-radius: 5%;">
                          <?php 
                          } else { ?>
                              <img src="<?php echo base_url().'public/upload_images/18.jpg'?>" 
                                  width="50" height="50" style="object-fit: cover; border: 2px solid #dadada70; border-radius: 5%;">
                          <?php 
                          } ?>
                      </td>

                      <td><?php if(!empty($single_banners_data['CategoryName'])) { echo $single_banners_data['CategoryName']; } else { echo "NA"; } ?></td>
                    
                      <td class="text-center">
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu" style="">
                   <a class="dropdown-item" href="<?php echo base_url(); ?>edit_blog/<?= $single_banners_data['id'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                   
                   
                  <a class="dropdown-item del_blog" href="javascript:void(0);" data-id="<?= $single_banners_data['id'] ?>"> <i class="bx bx-trash me-1"></i> Delete</a>
               
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
  


<?= $this->include('templates/footer') ?>


<script>
    $(document).on('click', '.del_blog', function () 
{
  

   var blog_ids = $(this).attr("data-id");
//   alert(banners_ids);
   
      Swal.fire({
          title: 'Are you sure?',
          text: 'Do you want to delete this record?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#333',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'Cancel'
      }).then((result) => {
          if (result.isConfirmed) {
              $.ajax({
                  type: 'POST',
                  url: 'del_blog',
                  data: { blog_ids: blog_ids },
                  success: function (data) {
                      console.log(data);

                      if (data == 1) {
                          Swal.fire({
                              icon: 'success',
                              title: 'Deleted!',
                              text: 'Record deleted successfully.',
                              timer: 2000,
                              showConfirmButton: false
                          }).then(function () {
                              window.location.reload();
                          });
                      }
                  }
              });
          }
      });

});
</script>