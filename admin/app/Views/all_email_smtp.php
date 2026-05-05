<style>
  .textarea {
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

  .form-control:disabled,
  .form-control[readonly] {
    background-color: #fff !important;
    opacity: 1;
  }
</style>

<?= $this->include('templates/header') ?>
<!-- Content wrapper -->
<div class="text-nowrap m-5">
  <div class="card">
    <div class="card-body p-0">
      <span class="addprobtn2">Edit Email SMTP</span>
      <!--<a href="<?php //echo base_url(); ?>all-customers"><span class="addprobtn">Back</span></a>-->
    </div>
  </div>
  <form method="POST" id="edit_email_smtp_from" enctype="multipart/form-data">
    <!--<input type="hidden" name="base_url" id="base_url" value="<?php //echo base_url() ?>all-customers">-->
    <input type="hidden" name="email_smtp_id" id="email_smtp_id" value="<?php echo $all_email_smtp_data['id'] ?>">
      <div class="content-wrapper">
         <!-- Content -->
         <div class="flex-grow-1 container-p-y">

            <div class="row">
               <div class="col-md-12 tag-mar">
                  <div class="card mb-4">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">Host</label>
                                 <input type="text" class="form-control" id="hostname" name="hostname" 
                                 value="<?php echo $all_email_smtp_data['host'] ?>"
                                 aria-describedby="defaultFormControlHelp" />
                                 <span id="hostname_err"></span>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">From Name</label>
                                 <input type="text" class="form-control" id="username" name="username"
                                 value="<?php echo $all_email_smtp_data['username'] ?>" aria-describedby="defaultFormControlHelp" />
                                 <span id="username_err"></span>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">From Email</label>
                                 <input type="text" class="form-control" id="email" name="email"
                                 value="<?php echo $all_email_smtp_data['email'] ?>" aria-describedby="defaultFormControlHelp" />
                                 <span id="email_err"></span>
                              </div>
                           </div>
                           
                          

                     </div>
                       <div class="row">
                            <div class="col-lg-4">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">Password</label>
                                 <input type="password" class="form-control" id="password" name="password"
                                 value="<?php //echo $all_email_smtp_data['password'] ?>" aria-describedby="defaultFormControlHelp" />
                                 <span id="password_err"></span>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">Port</label>
                                 <input type="number" class="form-control" id="portname" name="portname" 
                                 value="<?php echo $all_email_smtp_data['port'] ?>"
                                 aria-describedby="defaultFormControlHelp" />
                                 <span id="portname_err"></span>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">Protocol</label>
                                 <select class="form-control form-select" id="protocol" name="protocol"  aria-describedby="defaultFormControlHelp" >
                              <option value="ssl" <?php if($all_email_smtp_data['protocol']==1) {echo "selected";} else{echo "";}?> >SSL</option>
                <option value="tls"  <?php if($all_email_smtp_data['protocol']==2) {echo "selected";} else{echo "";}?>>TLS</option>
                                 </select>
                                 <span id="protocol_err"></span>
                              </div>
                           </div>
                  

                        <div id="msg"></div>
                        <div class="card-body p-2 mb-3">
                           <!-- <a href="add_category.php"><span class="addprobtn">Add Product</span></a> -->

                           <button type="button" class="addprobtn" id="edit_smtp_email">Edit SMTP Email</button>
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

<?= $this->include('templates/footer') ?>
<script>

$(document).on('click', '#edit_smtp_email', function () {
    
    let hostname = $('#hostname').val();
    let username = $('#username').val();
    let password = $('#password').val();
    let portname = $('#portname').val();
    let protocol = $('#protocol').val();
    var email = $('#email').val();
var regEx =  /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		var validEmail = regEx.test(email);


    // let base_url = $('#base_url').val();



    var flag = 1
    	if (email=="") 
		{
			$('#email_err').text('Email is required').addClass("text-danger");
			flag=0;
		} 

        if (email!="") 
		{
			$('#email_err').text('');
		} 

 
       if (email!='' && !validEmail) 
	   {
			$('#email_err').text('Enter a valid email').addClass("text-danger");
			flag=0;
	   }

       if (email!='' && validEmail) 
	   {
			$('#email_err').text('');
	   }
	   

    if(hostname==""){
    $("#hostname_err").html("Please enter your hostname!").addClass("text-danger");
      flag =0;
   
  }else{
    $("#hostname_err").html("");
    
  }

 if(username==""){
    $("#username_err").html("Please enter your username!").addClass("text-danger");
      flag =0;
   
  }else{
    $("#username_err").html("");
    
  }

//  if(password==""){
//     $("#password_err").html("Please enter your password!").addClass("text-danger");
//       flag =0;
   
//   }else{
//     $("#password_err").html("");
    
//   }

if(portname==""){
    $("#portname_err").html("Please enter your portname!").addClass("text-danger");
      flag =0;
   
  }else{
    $("#portname_err").html("");
    
  }
  if(protocol==""){
    $("#protocol_err").html("Please enter your protocol!").addClass("text-danger");
      flag =0;
   
  }else{
    $("#protocol_err").html("");
    
  }
    if (flag == 1) {

      let myform = document.getElementById('edit_email_smtp_from');
      let fd = new FormData(myform)

      //   fd.append('files',files);

      $.ajax({
        url: 'update_email_smtp',
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (data) {
          console.log(data)
          if (data == 1) 
          {
              Swal.fire({
                  icon: 'success',
                  title: 'Success!',
                  text: 'SMTP Email Updated Successfully!',
                  timer: 2000, 
                  showConfirmButton: false
              }).then(() => {
                  window.location.reload();
              });
          } else {
              Swal.fire({
                  icon: 'error',
                  title: 'Error!',
                  text: 'There was an issue updating the SMTP Email.',
                  timer: 2000,
                  showConfirmButton: false
              });
          }

        },
      })
    }
    else {
      return false
    }
  
  
      });
      
</script>