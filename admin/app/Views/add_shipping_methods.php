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
</style>        
            
<?= $this->include ('templates/header') ?>
          <!-- Content wrapper -->
          <div class="text-nowrap m-5">
            <div class="card">
              <div class="card-body p-0">
          		<span class="addprobtn2">Add Shipping methods</span><a href="<?php echo base_url(); ?>all_methods"><span class="addprobtn">All Shipping methods</span></a>
              </div>
             </div>
             <form id="add_shipping"  enctype="multipart/form-data">
          <div class="content-wrapper">
            <!-- Content -->

            <div class="flex-grow-1 container-p-y">
             
              <input type="hidden" id="base_url" value="<?php echo base_url('all_shipping') ?>">
              <!--<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add</span> Tags</h4>-->
              <div class="row">
                <div class="col-md-6 tag-mar">
                  <div class="card mb-4">
                    <!--<h5 class="card-header">Default</h5>-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Shipping Name</label>
                        <input type="text" class="form-control" id="shipping_name" name="shipping_name"
                        placeholder="" aria-describedby="defaultFormControlHelp">
                      <p class="text-danger shipping_name_err"> </p>
                      </div>
                      <div class="card-body p-2 mb-3">
                        <button type="button" class="addprobtn" id="add_shipping_data">
                      Add Shipping</button>
                      </div>
                      <p id="msg"> </p>
                    </div>
                
                  </div>
                </div>
               </div>
</form>
              </div>
            </div>
      
          </div> 
          
         
            <!-- / Content -->

<?= $this->include ('templates/footer') ?>

<script>
     $('#add_shipping_data').on('click', function () {
         
          let shipping_name = $('#shipping_name').val();
          let zone_name = $('#zone_name').val();
          let shipping_rate = $('#shipping_rate').val();
          
          let base_url = $('#base_url').val();
  
  
      
          var flag = 1
      
          if (shipping_name == '') {
            $(".shipping_name_err").show();
            $('.shipping_name_err').html('Shipping name is required')
            flag = 0
           
          } else {
             $('.shipping_name_err').hide()
          
          }
  
          if (flag == 1) {
          
              let add_shipping_data = document.getElementById('add_shipping');
              let fd = new FormData(add_shipping_data)
  
          //   fd.append('files',files);
         
            $.ajax({
              url: 'save_shipping_methods',
              data: fd,
              cache: false,
              processData: false,
              contentType: false,
              type: 'POST',
              success: function (data) {
                console.log(data)
                if (data == 1) {
                      // Show success notification using SweetAlert
                      Swal.fire({
                          icon: 'success',
                          title: 'Success!',
                          text: 'Shipping Added Successfully!',
                          timer: 2000,
                          showConfirmButton: false
                      }).then(() => {
                          // Redirect after the success message
                          window.location.href = base_url;
                      });
                  } else if (data == 2) {
                      // Show error notification using SweetAlert
                      Swal.fire({
                          icon: 'error',
                          title: 'Error!',
                          text: 'Country Already Exists!',
                          showConfirmButton: true
                      });
                  }

                
                // do something with the result
              },
            })
          } 
          else {
            return false
          }
        })
</script>