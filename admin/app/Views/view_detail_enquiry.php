<style>
.textarea{
    width: 100%;
    font-size: 0.9375rem;
    font-weight: 400;
    height: 100px;
    line-height: 1.53;
    color: #697a8d;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d9dee3;
    border-radius: 0.375rem;
}
.addprobtn2 {
    float: left;
    color: #696cff;
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
.form-control:disabled, .form-control[readonly] {
    background-color: #fff!important; 
    opacity: 1;
}
</style>        
            
          <?= $this->include ('templates/header') ?>   
          <!-- Content wrapper -->
          <div class="text-nowrap m-5">
            <div class="card">
              <div class="card-body p-0">
          		<span class="addprobtn2">Enquiry Detail</span><a href="<?php echo base_url(); ?>all_manage_enquries"><span class="addprobtn">Back</span></a>
              </div>
             </div>
             <form>
          <div class="content-wrapper">
            <!-- Content -->

            <div class="flex-grow-1 container-p-y">
              <!--<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add</span> Tags</h4>-->
              <div class="row">
                <div class="col-md-12 tag-mar">
                  <div class="card mb-4">
                    <!--<h5 class="card-header">Default</h5>-->
                    <div class="card-body">
                        <div class="row border-bottom">
                            <div class="col-lg-4">
                                <div class="my-3">
                        <b><span >Name :</span></b>
                       <span class="text-wrap"><?php echo !empty($all_enquiry_data['Fullname']) ? $all_enquiry_data['Fullname'] : "NA"; ?>
</span>
                      </div>
                            </div>
                            <div class="col-lg-4">
                                 <div class="my-3">
                        <b><span >Email : </span></b>
                       <span><?php if(!empty($all_enquiry_data['Email'])){echo $all_enquiry_data['Email'];}else{echo "NA";} ?></span>
                      </div>
                            </div>
                            <div class="col-lg-4">
                                   <div class="my-3">
                        <b><span >Mobile : </span></b>
                       <span><?php if(!empty($all_enquiry_data['Mobile'])){echo $all_enquiry_data['Mobile'];}else{echo "NA";}  ?></span>
                      </div>
                            </div>
                        </div>
                        
                        <div class="row border-bottom">
                            <div class="col-lg-4">
                                <div class="my-3">
                        <b><span >Subject :</span></b>
                       <span class="text-wrap"><?php if(!empty($all_enquiry_data['Subject'])){echo $all_enquiry_data['Subject'];}else{echo "NA";} ?></span>
                      </div>
                            </div>
                            <div class="col-lg-6">
                                 <div class="my-3">
                        <b><span >Message : </span></b>
                       <span class="text-wrap"><?php if(!empty($all_enquiry_data['Message'])){echo $all_enquiry_data['Message'];}else{echo "NA";} ?></span>
                      </div>
                            </div>
                           
                        </div>
                   
                 
                        
                        
                      <!--<div class="card-body p-2 mb-3">-->
                      <!--<a href="edit_products.php"><span class="addprobtn">Edit Product</span></a>-->
                      <!--</div>-->
                    </div>
                </div>
                </div>
               </div>
              </div>
            </div>
            </form> 
          </div> 
          
         
            <!-- / Content -->

           <?= $this->include ('templates/footer') ?>