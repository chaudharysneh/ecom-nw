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
    padding: 10;
    border-radius: 5px;
    border: none;
}
</style>        
            
<?= $this->include ('templates/header') ?>  
          <!-- Content wrapper -->
          <div class="text-nowrap m-5">
            <div class="card">
              <div class="card-body p-2">
          		<span class="addprobtn2">Add Taxclass</span><a href="<?php echo base_url(); ?>all_taxe_class"><span class="addprobtn">Taxclass</span></a>
              </div>
             </div>
             <form id="edit_taxclass">
          <div class="content-wrapper">
            <!-- Content -->

            <div class="flex-grow-1 container-p-y">
            <input type="hidden" id="base_url" value="<?php echo base_url('all_taxe_class') ?>">
            <input type="hidden" id="tax_class_id" name ="tax_class_id" value="<?php echo $single_tax_class_data['taxe_class_id']; ?>">
              <!--<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add</span> Tags</h4>-->
              <div class="row">
                <div class="col-md-6 tag-mar">
                  <div class="card mb-4">
                    <!--<h5 class="card-header">Default</h5>-->
                    <div class="card-body">
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Taxclass Name</label>
                        <input type="text" class="form-control" id="taxclass_name" name="taxclass_name"  value="<?=$single_tax_class_data['class_name'];?>" aria-describedby="defaultFormControlHelp">
                      <p class="text-danger taxclass_name_err"> </p>
                      </div>
                      
                      <div class="card-body p-2 mb-3">
                      <button type="button" class="addprobtn" id="edit_taxclass_data">
                      Edit Taxclass</button>
                     
                      </div>
                      <p id="msg"> </p>
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
<script>
            // taxclass 
          $('#edit_taxclass_data').on('click', function () {
          // alert ("hi");
     
          // alert("hello");
          
          let taxclass_name = $('#taxclass_name').val()
          
      
          let base_url = $('#base_url').val()
  
  
      
          var flag = 1
      
          if (taxclass_name == '') {
                   $(".taxclass_name_err").show();
            $('.taxclass_name_err').html('Taxclass Name is required')
            flag = 0
           
          } else {
             $('.taxclass_name_err').hide()
          
          }
  
          
         
      
         
          if (flag == 1) {
          
              let myform = document.getElementById('edit_taxclass');
              let fd = new FormData(myform)
  
          //   fd.append('files',files);
         
            $.ajax({
              url: 'update_taxes_class',
              data: fd,
              cache: false,
              processData: false,
              contentType: false,
              type: 'POST',
              success: function (data) {
                console.log(data)
                if (data == 1) {
                  Swal.fire({
                      icon: 'success',
                      title: 'Success',
                      text: 'Taxclass Updated Successfully!',
                      timer: 1000,  
                      showConfirmButton: false
                  }).then(function () {
                      window.location.href = base_url; 
                  });
              }

              },
            })
          } 
          else {
            return false
          }
        })
</script>
