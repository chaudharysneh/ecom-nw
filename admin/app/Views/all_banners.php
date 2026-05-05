
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
		<span class="addprobtn2">Banners</span><a href="<?php echo base_url(); ?>add_banners"><span class="addprobtn">Add Banners</span></a>
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
           <!-- <th class="">Position</th> -->
             <th class="text-center">URL</th>
          <th class="table_product_img_th text-center">Image</th>
       
          
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">



                      <?php
                     $i=1;
                       foreach($allbannersdata as $single_banners_data)
                       {
                          // print_r($single_banners_data);
                          // die;

                      ?>
                    <tr>
                      <td scope="row" class="text-center"><?php  echo $i; ?></td>
                      <td><?php echo isset($single_banners_data['BannerTitle']) && !empty($single_banners_data['BannerTitle']) ? $single_banners_data['BannerTitle'] : 'N/A'; ?></td>
                      <!-- <td><?php echo isset($single_banners_data['BannerPosition']) && !empty($single_banners_data['BannerPosition']) ? $single_banners_data['BannerPosition'] : 'N/A'; ?></td> -->
                      <td><?php echo isset($single_banners_data['BannerText']) && !empty($single_banners_data['BannerText']) ? $single_banners_data['BannerText'] : 'N/A'; ?></td>
                      <td><?php echo $single_banners_data['BannerUrl'];?></td>
                
                      <td class="text-center"> 
                        <?php 
                        if (!empty($single_banners_data['BannerImg'])) { ?>
                            <img src="<?php echo base_url().'public/upload_images/'. $single_banners_data['BannerImg'];?>" 
                                style="vertical-align: middle;width: 150px;height: 70px;object-fit: cover;border: 7px solid #dadada70;border-radius: 5%;">
                        <?php 
                        } else { ?>
                            <img src="<?php echo base_url().'public/upload_images/18.jpg'?>" 
                                style="vertical-align: middle;width: 150px;height: 70px;object-fit: cover;border: 7px solid #dadada70;border-radius: 5%;">
                        <?php 
                        } ?>
                    </td>
                
                      <td class="text-center">
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu" style="">
                   <a class="dropdown-item" href="<?php echo base_url(); ?>edit_banners/<?= $single_banners_data['BannerID'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item del_banners" href="javascript:void(0);" data-id="<?= $single_banners_data['BannerID'] ?>"> <i class="bx bx-trash me-1"></i> Delete</a>
               
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