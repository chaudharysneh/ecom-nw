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
          		<span class="addprobtn2">Add Country</span><a href="<?php echo base_url(); ?>all_country"><span class="addprobtn">Country</span></a>
              </div>
             </div>
             <form id="edit_country">
          <div class="content-wrapper">
            <!-- Content -->

            <div class="flex-grow-1 container-p-y">
                
            <input type="hidden" name="country_id" id="country_id" value="<?php echo $singlcountrydata['CountryID']; ?>">
             <input type="hidden" id="base_url" value="<?php echo base_url('all_country') ?>">
             
              <!--<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add</span> Tags</h4>-->
              <div class="row">
                <div class="col-md-6 tag-mar">
                  <div class="card mb-4">
                    <!--<h5 class="card-header">Default</h5>-->
                    <div class="card-body">
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Country Name</label>
                        <input type="text" class="form-control" id="con_name" name="con_name" value="<?php echo $singlcountrydata['CountryName']; ?>"  aria-describedby="defaultFormControlHelp">
                      <p class="text-danger con_name_err"> </p>
                      </div>
                      <p id="msg"> </p>
                      <div class="card-body p-2 mb-3">
                      <button type="button" class="addprobtn" id="edit_country_data">
                      Update Country</button>
                     
                      </div>
                      
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
     $('#edit_country_data').on('click', function () {
          // alert ("hi");
     
          // alert("hello");

          let con_name = $('#con_name').val()
          
      
          let base_url = $('#base_url').val()
  
  
      
          var flag = 1
      
          if (con_name == '') {
                   $(".con_name_err").show();
            $('.con_name_err').html('Country name is required')
            flag = 0
           
          } else {
             $('.con_name_err').hide()
          
          }
  
          
         
      
         
          if (flag == 1) {
          
              let myform = document.getElementById('edit_country');
              let fd = new FormData(myform)
  
          //   fd.append('files',files);
         
            $.ajax({
              url: 'update_country',
              data: fd,
              cache: false,
              processData: false,
              contentType: false,
              type: 'POST',
              success: function (data) {
                console.log(data)
                if (data == 1) {

                  Swal.fire({
                    icon:"success",
                    title:"Success",
                    text:"Country Edit Successfully!",
                    timer:2000,
                    showConfirmButton:false

                  }).then(function () {

                    window.location.href = base_url
                  },2000)

                }
                
                if(data == 2)
                {
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

