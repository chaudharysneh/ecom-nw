$(document).ready(function () {
      $('.faq_data').hide();
    
    $("ul.pagination li").addClass('page-item');
    $("ul.pagination li a").addClass('page-link');
    
    $('#simple').hide();
$('#variable').hide();
    var product_type_id = $('#product_type').find(":selected").val();
    
   
			     //	alert(product_type_id);
			     	
			     	   let simple = $('#simple').val()


    let variable = $('#variable').val()
    
    
			     	
			     	if(product_type_id==1){
			     	    $('#simple').show();
			     	    $('#variable').hide();
			     	    
			     	}
			     	
			     		if(product_type_id==2){
			     	    $('#variable').show();
			     	    $('#simple').hide();
			     	}
			     	



  $('#login').on('click', function() {
	
		var email = $('#email').val();
		var pass = $('#password').val();
	
        var regEx =  /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		var validEmail = regEx.test(email);

		var base_url = $("#base_url").val();
        var flag=0;

		if (email=="") 
		{
			$('#email_err').text('Email is required').addClass("text-danger");
			flag=1;
		} 

        if (email!="") 
		{
			$('#email_err').text('');
		} 

 
       if (email!='' && !validEmail) 
	   {
			$('#email_err').text('Enter a valid email').addClass("text-danger");
			flag=1;
	   }

       if (email!='' && validEmail) 
	   {
			$('#email_err').text('');
	   }
			

       if (pass=="") 
       {
           $('#password_err').text('Password is required').addClass("text-danger");
           flag=1;
       } 

       if (pass!="") 
       {
           $('#password_err').text('');
       } 


       
          if(flag==0){
				$.ajax({
						url: "admin-login",
						method: "POST",
						data: {
						email: email,
						password: pass
						},
						success: function(data){
							if(data==1){
								
								$("#login_msg").removeClass("text-danger");
								$("#login_msg").text('Login Successfully...').addClass("text-success");
								
								setTimeout(function () {
									location.href=base_url;
								}, 2000);
							}
							else if(data==2){
								$("#login_msg").text('Email or password not match!!').addClass("text-danger");
							}
							
					}
				});
            }

            if(flag==1){
                return false;
            }
               
		});



    $('#change_password').on('click', function() {

			var current_password = $('#current_password').val();
			var new_password = $('#new_password').val();
			var confirm_password = $('#confirm_password').val();

			var base_url = $("#base_url").val();
			var flag=0;
	
			if (current_password=="") 
			{
				$('#current_password_err').text('Current Password is required').addClass("text-danger");
				flag=1;
			} 
	
			if (current_password!="") 
			{
				$('#current_password_err').text('');
			} 
	
		   if (new_password=="") 
		   {
			   $('#new_password_err').text('New Password  is required').addClass("text-danger");
			   flag=1;
		   } 
	
		   if (new_password!="") 
		   {
			   $('#new_password_err').text('');
		   } 
		   
		   if (confirm_password=="") 
		   {
			   $('#confirm_password_err').text('Confirm Password is required').addClass("text-danger");
			   flag=1;
		   } 
	
		   if (confirm_password!="") 
		   {
			   $('#confirm_password_err').text('');
		   } 
		   
		   if (confirm_password!="" && confirm_password!=new_password) 
		   {
			   $('#confirm_password_err').text('Confirm password not matched with new password').addClass("text-danger");
			   flag=1;
		   } 
	
		   if (confirm_password!="" && confirm_password==new_password) 
		   {
			   $('#confirm_password_err').text('');
		   } 
	
		   
			  if(flag==0){
					$.ajax({
							url: "changepwd",
							method: "POST",
							data: {
								current_password: current_password,
								new_password: new_password,
								confirm_password:confirm_password
							},
							success: function(data){
								
								if(data==1){
									
									Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Password Changed Successfully...',
                    showConfirmButton: false,
                    timer: 2000
                });
        
                // Redirect after 2 seconds
                setTimeout(function () {
                    location.href = "change-password";
                }, 2000);
								}
								else if(data==2){
									$("#confirm_password_err").text('Confirm password not matched with new password').addClass("text-danger");
								}
								else if(data==3){
									$("#current_password_err").text('Current password is invalid').addClass("text-danger");
								}
								else if(data==0){
									Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Something went wrong please try again later!',
                    showConfirmButton: true
                });
								}
						}
					});
				}
	
				if(flag==1){
					return false;
				}
				   
			});

      $('#update_profile').on('click', function() {
	
				var firstname = $('#firstname').val();
				var lastname = $('#lastname').val();
				var email = $('#email').val();
				var dob = $('#dob').val();
				var gender = $('#gender').val();
				var phone = $('#phone').val();
				var country = $('#country').val();
				var state = $('#state').val();
				var city = $('#city').val();
				var post_code = $('#post_code').val();
				var address1 = $('#address1').val();
				var address2 = $('#address2').val();

				var regEx =  /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				var validEmail = regEx.test(email);
		
				var base_url = $("#base_url").val();
				var flag=0;
				

				if (firstname=="") 
				{
					$('#first_name_err').text('Firstname  is required').addClass("text-danger");
					flag=1;
				} 
		 
				if (firstname!="") 
				{
					$('#first_name_err').text('');
				} 

				if (lastname=="") 
				{
					$('#last_name_err').text('Lastname is required').addClass("text-danger");
					flag=1;
				} 
		 
				if (lastname!="") 
				{
					$('#last_name_err').text('');
				} 

				if (email=="") 
				{
					$('#email_err').text('Email is required').addClass("text-danger");
					flag=1;
				} 
		
				if (email!="") 
				{
					$('#email_err').text('');
				} 
		
		 
			   if (email!='' && !validEmail) 
			   {
					$('#email_err').text('Enter a valid email').addClass("text-danger");
					flag=1;
			   }
		
			   if (email!='' && validEmail) 
			   {
					$('#email_err').text('');
			   }

			   if (phone=="") 
			   {
				   $('#phone_err').text('Phone is required').addClass("text-danger");
				   flag=1;
			   } 
		
			   if (phone!="") 
			   {
				   $('#phone_err').text('');
			   } 
					
				  if(flag==0){

					let update_profile_form = document.getElementById("update_profile_form");
					let fd = new FormData(update_profile_form );

						$.ajax({
								url: "update-profile",
								method: "POST",
								data: fd,
								processData: false,
								contentType: false,
								success: function(data){
									console.log(data);

									if (data == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Profile updated successfully...',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(function () {
                        location.href = 'profile'; // Redirect after showing the success message
                    });
                } else if (data == 2) {
                    $("#profile_pic_err").text('Please upload only jpg, jpeg, png, and gif files.').addClass("text-danger");
                } else if (data == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Profile cannot be updated.',
                    });
                }
                
									
							}
						});
					}
		
					if(flag==1){
						return false;
					}
					   
				});


        $('#add_tags_data').on('click', function () {
          // alert ("hi");
     
          // alert("hello");
          
          let name = $('#name').val()
          
      
          let base_url = $('#base_url').val()
  
  
      
          var flag = 1
      
          if (name == '') {
                   $(".name_err").show();
            $('.name_err').html('Name is required')
            flag = 0
           
          } else {
             $('.name_err').hide()
          
          }
  
          
         
      
         
          if (flag == 1) {
          
              let myform = document.getElementById('add_tags');
              let fd = new FormData(myform)
  
          //   fd.append('files',files);
         
            $.ajax({
              url: 'save_tags',
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
                      text: 'Tag Added Successfully!',
                      timer: 2000,
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
  
        $('#update_tags_data').on('click', function () {
          // alert ("hi");
     
          // alert("hello");
  
          
          let name = $('#name').val()
          
      
          let base_url = $('#base_url').val()
  
  
      
          var flag = 1
      
          if (name == '') {
                   $(".name_err").show();
            $('.name_err').html('Name is required')
            flag = 0
           
          } else {
             $('.name_err').hide()
          
          }
  
          
         
      
         
          if (flag == 1) {
          
              let myform = document.getElementById('edit_tags');
              let fd = new FormData(myform)
  
          //   fd.append('files',files);
         
            $.ajax({
              url: 'update_tags',
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
                      text: 'Tag Updated Successfully!',
                      timer: 2000,
                      showConfirmButton: false
                  }).then(function () {
                      window.location.href = base_url;
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
  
  
        $(document).on('click', '.del_tags_type', function () 
        {
          
        
           var tagstype_ids = $(this).attr("data-id");
           Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#333',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: 'delete_tags_type',
                    data: { tagstype_ids: tagstype_ids },
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
        

  

//faqs....

$('#add_faqs_data').on('click', function () {
          // alert ("hi");
     
          // alert("hello");
          
          let faqs_que = $('#faqs_que').val()
          let faqs_ans = $('#faqs_ans').val()
          
          
      
          let base_url = $('#base_url').val()
  
  
      
          var flag = 1
      
          if (faqs_que == '') {
                   $(".faqs_que_err").show();
            $('.faqs_que_err').html('Question is required')
            flag = 0
           
          } else {
             $('.faqs_que_err').hide()
          
          }
          
          if (faqs_ans == '') {
                   $(".faqs_que_err").show();
            $('.faqs_ans_err').html('Answer is required')
            flag = 0
           
          } else {
             $('.faqs_ans_err').hide()
          
          }
  
          
         
      
         
          if (flag == 1) {
          
              let myform = document.getElementById('add_faqs_form');
              let fd = new FormData(myform)
  
          //   fd.append('files',files);
         
            $.ajax({
              url: 'save_faqs',
              data: fd,
              cache: false,
              processData: false,
              contentType: false,
              type: 'POST',
              success: function (data) {
                // console.log(data)
                if (data == 1) {
                  Swal.fire({
                      icon: 'success',
                      title: 'Success',
                      text: 'FAQs Added Successfully!',
                      timer: 2000,  // Alert will close after 2 seconds
                      showConfirmButton: false
                  }).then(function () {
                      // Redirect to the base URL after the alert closes
                      window.location.href = base_url;
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
        
        
        $('#edit_faqs_data').on('click', function () {
          // alert ("hi");
     
          // alert("hello");
          
          let faqs_que = $('#faqs_que').val()
          let faqs_ans = $('#faqs_ans').val()
          
          
      
          let base_url = $('#base_url').val()
  
  
      
          var flag = 1
      
          if (faqs_que == '') {
                   $(".faqs_que_err").show();
            $('.faqs_que_err').html('Question is required')
            flag = 0
           
          } else {
             $('.faqs_que_err').hide()
          
          }
          
          if (faqs_ans == '') {
                   $(".faqs_que_err").show();
            $('.faqs_ans_err').html('Answer is required')
            flag = 0
           
          } else {
             $('.faqs_ans_err').hide()
          
          }
  
          
         
      
         
          if (flag == 1) {
          
              let myform = document.getElementById('edit_faqs_form');
              let fd = new FormData(myform)
  
          //   fd.append('files',files);
         
            $.ajax({
              url: 'update_faqs',
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
                      text: 'FAQs Updated Successfully!',
                      timer: 2000,  // Alert will close after 2 seconds
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
    $(document).on('click', '.del_faqs_type', function () 
        {
          
        
           var faqstype_ids = $(this).attr("data-id");
         
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
                // Proceed with the AJAX request to delete the FAQs type
                $.ajax({
                    type: 'POST',
                    url: 'delete_faqs_type',
                    data: { faqstype_ids: faqstype_ids },
                    success: function (data) {
                        console.log(data);
        
                        if (data == 1) {
                            // Show success message using SweetAlert2
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'Record deleted successfully.',
                                timer: 2000,
                                showConfirmButton: false
                            }).then(function () {
                                // Reload the page after the alert closes
                                window.location.reload();
                            });
                        }
                    },
                });
            }
        });
        
        });
//faqs end ....
// brands....
$('#add_brands_data').on('click', function () {
        //   alert ("hi");
        //   exit;
     
          // alert("hello");
          
          let name = $('#name').val()
          
      
          let base_url = $('#base_url').val()
  
  
      
          var flag = 1
      
          if (name == '') {
                   $(".name_err").show();
            $('.name_err').html('Name is required')
            flag = 0
           
          } else {
             $('.name_err').hide()
          
          }
  
          
         
      
         
          if (flag == 1) {
          
              let myform = document.getElementById('add_brand_form');
              let fd = new FormData(myform)
  
          //   fd.append('files',files);
         
            $.ajax({
              url: 'save_brands',
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
                      text: 'Brand Added Successfully!',
                      timer: 2000,
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
        
$('#update_brands_data').on('click', function () {
        //   alert ("hi");
        //   exit;
     
          // alert("hello");
  
          
          let name = $('#name').val()
          
      
          let base_url = $('#base_url').val()
  
  
      
          var flag = 1
      
          if (name == '') {
                   $(".name_err").show();
            $('.name_err').html('Name is required')
            flag = 0
           
          } else {
             $('.name_err').hide()
          
          }
  
          
         
      
         
          if (flag == 1) {
          
              let myform = document.getElementById('edit_brands_form');
              let fd = new FormData(myform)
  
          //   fd.append('files',files);
         
            $.ajax({
              url: 'update_brands',
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
                      text: 'Brand Updated Successfully!',
                      timer: 2000,
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
        
$(document).on('click', '.del_brands_type', function () 
        {
          
        
           var brandtype_ids = $(this).attr("data-id");
        //   alert (brandtype_ids);
         
              Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#333',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: 'delete_brands_type',
                        data: { brandtype_ids: brandtype_ids },
                        success: function (data) {
                            console.log(data);
                            if (data == 1) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'Record Deleted successfully.',
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
// brands...

  $('#add_catagories_data').on('click', function () {
    // alert ("hi");

    // alert("hello");

    let name = $('#name').val()
    let description = $('#description').val()
    let file = $('#filetoupload').val()

    let base_url = $('#base_url').val()



    var flag = 1

    if (name == '') {
      $(".name_err").show();
      $('.name_err').html('Name is required');
      flag = 0;
  } else if (name.length < 3) { // Minimum length check (3 characters in this example)
      $(".name_err").show();
      $('.name_err').html('Name must be at least 3 characters long');
      flag = 0;
  } else if (name.length > 50) { // Maximum length check (50 characters in this example)
      $(".name_err").show();
      $('.name_err').html('Name must be less than 10 characters');
      flag = 0;
  } else {
      $('.name_err').hide();
  }
  


    if (description.trim().length <= 0) {
      $(".description_err").show();
      $('.description_err').html('Description is required')
      flag = 0

    } else {
      $('.description_err').hide()

    }


    // if (file == '') {
    //   $(".file_err").show();
    //   $('.file_err').html('Catagory Image is required')
    //   flag = 0

    // } else {
    //   $('.file_err').hide()

    // }


    if (flag == 1) {

      let myform = document.getElementById('add_catagories');
      let fd = new FormData(myform)

      //   fd.append('files',files);

      $.ajax({
        url: 'save_catagories',
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (data) {

            if (data == 1) {
                // Use SweetAlert for success notification
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Category Added Successfully!',
                    timer: 1000, // Auto close after 2 seconds
                    showConfirmButton: false // Hide the confirm button
                }).then(function () {
                    window.location.href = base_url; // Redirect to the base URL after the alert closes
                });

            } else if (data == 2) {
                // Use SweetAlert for error notification
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Category Already Exists!',
                    showConfirmButton: true // Show the confirm button so the user can acknowledge the message
                });
            }

        },
      })
    }
    else {
      return false
    }
  })


  $('#edit_catagories_data').on('click', function () {
    // alert ("hi");

    // alert("hello");

    let name = $('#name').val()
    let description = $('#description').val()
    let file = $('#filetoupload').val()

    let base_url = $('#base_url').val()



    var flag = 1

    if (name == '') {
      $(".name_err").show();
      $('.name_err').html('Name is required')
      flag = 0

    } else {
      $('.name_err').hide()

    }


    if (description.trim().length <= 0) {
      $(".description_err").show();
      $('.description_err').html('Description is required')
      flag = 0

    } else {
      $('.description_err').hide()

    }


    //    if (file == '') {
    //     $(".file_err").show();
    // $('.file_err').html('This field is required')
    // flag = 0

    // } else {
    // $('.file_err').hide()

    // }


    if (flag == 1) {

      let myform = document.getElementById('edit_catagories');
      let fd = new FormData(myform)

      //   fd.append('files',files);

      $.ajax({
        url: 'update_catagories',
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (data) 
        {
          console.log(data)

            if (data == 1) {
                // SweetAlert for success notification
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Category Updated Successfully!',
                    timer: 2000, // Auto close after 2 seconds
                    showConfirmButton: false // Hide confirm button
                }).then(function () {
                    window.location.href = base_url; // Redirect to base URL after alert closes
                });

            } else if (data == 2) {
                // SweetAlert for error notification
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Category Already Exists!',
                    showConfirmButton: true // Require user to confirm the alert
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


  $(document).on('click', '.del_catagory', function () {


    var cat_ids = $(this).attr("data-id");


    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#333',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: 'delete_catagory',
                data: { cat_ids: cat_ids },
                success: function (data) {
                    console.log(data);
    
                    if (data == 1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'Record deleted successfully.',
                            timer: 1000,
                            showConfirmButton: false
                        }).then(function () {
                            window.location.reload();
                        });
                    } 
                    else if (data == 2) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Subcategory is available for this category.',
                            timer: 1000,
                            showConfirmButton: false
                        }).then(function () {
                            window.location.reload();
                        });
                    }
                },
            });
        }
    });
    
  });
  
  $(document).on('click', '.del_review', function () {


    var review_ids = $(this).attr("data-id");

    // Show the confirmation dialog using SweetAlert2
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
              // Proceed with the AJAX request to delete the review
              $.ajax({
                  type: 'POST',
                  url: 'delete_review',
                  data: { review_ids: review_ids },
                  success: function (data) {
                      console.log(data);

                      if (data == 1) {
                          // Show success message using SweetAlert2
                          Swal.fire({
                              icon: 'success',
                              title: 'Deleted!',
                              text: 'Record deleted successfully.',
                              timer: 2000,
                              showConfirmButton: false
                          }).then(function () {
                              // Reload the page after the alert closes
                              window.location.reload();
                          });
                      }
                      // Uncomment the following block if you need to handle case when data == 2
                      // else if (data == 2) {
                      //     Swal.fire({
                      //         icon: 'warning',
                      //         title: 'Warning!',
                      //         text: 'Subcategory is available for this category.',
                      //         timer: 2000,
                      //         showConfirmButton: false
                      //     }).then(function () {
                      //         window.location.reload();
                      //     });
                      // }
                  }
              });
          }
        });

  });




  $('#add_options_data').on('click', function () {
    // alert ("hi");

    // alert("hello");

    let name = $('#name').val()


    let base_url = $('#base_url').val()



    var flag = 1

    if (name == '') {
      $(".name_err").show();
      $('.name_err').html('Name is required')
      flag = 0

    } else {
      $('.name_err').hide()

    }





    if (flag == 1) {

      let myform = document.getElementById('add_options');
      let fd = new FormData(myform)

      //   fd.append('files',files);

      $.ajax({
        url: 'save_options',
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
                text: 'Option Added Successfully!',
                timer: 2000,
                showConfirmButton: false
            }).then(function () {
                window.location.href = base_url;
            });
        } 
        else if (data == 2) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Option Already Exists!'
            });
        }
        
        },
      })
    }
    else {
      return false
    }
  })


  $(document).on('click', '.del_options', function () {


    var optionstype_ids = $(this).attr("data-id");

    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to delete this record?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#333',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: 'POST',
          url: 'delete_options_type',
          data: { optionstype_ids: optionstype_ids },
          success: function (data) {
            console.log(data);
    
            if (data == 1) {
              Swal.fire({
                title: 'Deleted!',
                text: 'Record deleted successfully.',
                icon: 'success',
                timer:2000,
                showConfirmButton: false
              }).then(() => {
                setTimeout(function () {
                  window.location.reload();
                }, 2000);
              });
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            Swal.fire({
              title: 'Error!',
              text: 'There was a problem deleting the record.',
              icon: 'error',
              confirmButtonText: 'OK'
            });
          }
        });
      }
    });
    
  });



  $('#edit_options_data').on('click', function () {
    // alert ("hi");

    // alert("hello");

    let name = $('#name').val()


    let base_url = $('#base_url').val()



    var flag = 1

    if (name == '') {
      $(".name_err").show();
       $('.name_err').html('Name is required')
      flag = 0

    } else {
      $('.name_err').hide()

    }





    if (flag == 1) {

      let myform = document.getElementById('edit_options');
      let fd = new FormData(myform)

      //   fd.append('files',files);

      $.ajax({
        url: 'update_options',
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
                text: 'Option Updated Successfully!',
                timer: 2000,
                showConfirmButton: false
            }).then(function () {
                window.location.href = base_url;
            });
          } 
          else if (data == 2) {
              Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: 'Option Already Exists!'
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


  $('#add_sub_catagories_data').on('click', function () {
    // alert ("hi");

    // alert("hello");

    let name = $('#name').val()
    let category = $('#category').val()
    let sub_category_image = $('#sub_cat_img').val()


    let base_url = $('#base_url').val()



    var flag = 1

    if (name == '') {
      $(".name_err").show();
      $('.name_err').html('Name is required')
      flag = 0

    } else {
      $('.name_err').hide()

    }




    if (category == '') {
      $(".category_err").show();
       $('.category_err').html('Catagory is required')
      flag = 0

    } else {
      $('.category_err').hide()

    }
    // if (sub_category_image == '') {
    //   $(".sub_cat_img_err").show();
    //   $('.sub_cat_img_err').html('Image is required')
    //   flag = 0

    // } else {
    //   $('.sub_cat_img_err').hide()

    // }


    if (flag == 1) {

      let myform = document.getElementById('add_sub_catagories');
      let fd = new FormData(myform)

      //   fd.append('files',files);

      $.ajax({
        url: 'save_sub_catagories',
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
                title: 'Success!',
                text: 'Sub-Category Added Successfully!',
                timer: 2000, // Auto close after 2 seconds
                showConfirmButton: false
            }).then(function () {
                window.location.href = base_url; // Redirect to base URL after alert closes
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


  $('#edit_sub_catagories_data').on('click', function () {
    // alert ("hi");

    // alert("hello");

    let name = $('#name').val()
    let category = $('#category').val()



    let base_url = $('#base_url').val()



    var flag = 1

    if (name == '') {
      $(".name_err").show();
     $('.name_err').html('Name is required')
      flag = 0

    } else {
      $('.name_err').hide()

    }




    if (category == '') {
      $(".category_err").show();
       $('.category_err').html('Catagory is required')
      flag = 0

    } else {
      $('.category_err').hide()

    }





    if (flag == 1) {

      let myform = document.getElementById('edit_sub_catagories');
      let fd = new FormData(myform)

      //   fd.append('files',files);

      $.ajax({
        url: 'update_sub_catagories',
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
                title: 'Success!',
                text: 'Sub-Category Updated Successfully!',
                timer: 2000, // Auto close after 2 seconds
                showConfirmButton: false
            }).then(function () {
                window.location.href = base_url; // Redirect to base URL after alert closes
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


  $(document).on('click', '.del_sub_catagory', function () {


    var subcatagory_ids = $(this).attr("data-id");


      Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
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
                  url: 'delete_subcategory',
                  data: { subcatagory_ids: subcatagory_ids },
                  success: function (data) {

                      console.log(data);

                      if (data == 1) {
                          // Show SweetAlert for successful deletion
                          Swal.fire({
                              icon: 'success',
                              title: 'Deleted!',
                              text: 'Record deleted successfully.',
                              timer: 1000, // Auto close after 2 seconds
                              showConfirmButton: false
                          }).then(function () {
                              window.location.reload(); // Reload page after alert closes
                          });
                      }
                      
                      if (data == 2) {
                          // Show SweetAlert for error with subcategory products
                          Swal.fire({
                              icon: 'error',
                              title: 'Error!',
                              text: 'Products are not available for this Subcategory.',
                              showConfirmButton: true
                          }).then(function () {
                              window.location.reload(); // Reload page after alert closes
                          });
                      }
                  },
              });
          }
      });

  });



  $('#add_option_value_data').on('click', function () {
    var flag = 1
    
    $("input[name='name[]']").each(function () {
      let name = $(this).val();
      //  alert(name);

      if (name == '') {
        $(".name_err").show();
        $('.name_err').html('All field is required')
        flag = 0

      } else {
        $('.name_err').hide()

      }

    });



    let optionvalue = $('#optionvalue').val()
    let base_url = $('#base_url').val()
    
    if (optionvalue == '') {
      $(".option_value_err").show();
      $('.option_value_err').html('Optionvalue is required')
      flag = 0

    } else {
      $('.option_value_err').hide()

    }
    
    if(optionvalue == 15){
        $("input[name='option_img[]']").each(function(){
            let img_name=$(this).val();
            // console.log(img_name);
            if(img_name==''){
                $(".name_err").show();
                $('.name_err').html('All field is required')
                flag = 0
            } 
            else {
                $('.name_err').hide()
        
              }
            
        });
    }


    if (flag == 1) {

      let myform = document.getElementById('add_option_value');
      let fd = new FormData(myform)

      //   fd.append('files',files);

      $.ajax({
        url: 'save_option_value',
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
                text: 'Option Value Added Successfully!',
                timer: 2000,
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



  $(document).on('click', '.del_option_value', function () {


    var option_value_ids = $(this).attr("data-id");

    if (confirm('Are you sure delete this record?')) {
      $.ajax({
        type: 'POST',
        url: 'delete_option_value',
        data: { option_value_ids: option_value_ids },
        success: function (data) {

          console.log(data);

          if (data == 1) {
            alert('Record deleted successfully.');
            setTimeout(function () {
              window.location.reload();
            }, 2000);
          }
        },
      });
    }
  });






  $('#edit_option_value_data').on('click', function () {
    // alert ("hi");

    var flag = 1
    $("input[name='name[]']").each(function () {
      let name = $(this).val();
      //  alert(name);

      if (name == '') {
        $(".name_err").show();
        $('.name_err').html('All field is required')
        flag = 0

      } else {
        $('.name_err').hide()

      }

    });

    // alert("hello");

   
    let optionvalue = $('#optionvalue').val()


    let base_url = $('#base_url').val()



   




    if (optionvalue == '') {
      $(".option_value_err").show();
     $('.option_value_err').html('Option is required')
      flag = 0

    } else {
      $('.option_value_err').hide()

    }


    if (flag == 1) {

      let myform = document.getElementById('edit_option_value');
      let fd = new FormData(myform)

      //   fd.append('files',files);

      $.ajax({
        url: 'update_option_value',
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
                text: 'Option Value Updated Successfully!',
                timer: 2000,
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

 $("#category").on("change",function(){
    //  alert('hii');
					var category_id = $(this).val();
					   // alert(category_id);
					
					$.ajax({
						url: "get-sub-category",
						method: "POST",
						data: {category_id:category_id},
					    success: function(data){
							$("#subcategory").html(data);
						}
			  });
			});

		
			     
			 $(document).on('change', ".variation_type", function () {
			     var parent = $(this).parent().parent().parent();
			     	var variation_type_id = $(this).val();
			     //	console.log(variation_type_id);
				// print_r(variation_type_id);
				$.ajax({
					url: "get-variations",
					method: "POST",
					data: {variation_type_id:variation_type_id},
					success: function(data){
					   
						parent.find(".variation").html(data);
					}
		  });
			     
        // alert(this.value);
    });
    
    
  
   
    
    
    	 $(document).on('change', ".product_type", function () {
			     //var parent = $(this).parent().parent().parent();
			     	var product_type_id = $(this).val();
			     //	console.log(product_type_id);
			     	
			     	   let simple = $('#simple').val()


    let variable = $('#variable').val()

    // $('#variable').show();
    
    


			     	
			     	if(product_type_id==1){
			     	    $('#simple').show();
			     	    $('#variable').hide();
			     	    
			     	}
			     	
			     		if(product_type_id==2){
			     	    $('#variable').show();
			     	    $('#simple').hide();
			     	}
			     	
			     	
				// print_r(variation_type_id);
				// $.ajax({
				// 	url: "get-variations",
				// 	method: "POST",
				// 	data: {variation_type_id:variation_type_id},
				// 	success: function(data){
					   
				// 		parent.find(".variation").html(data);
				// 	}
		  //});
			     
        // alert(this.value);
    });
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
// 			  $('.variation_data').each(function (i) {
// 			       var j = 0;
			      
// 			          	$(".variation_type_"+j).on("change",function(){
// 			          	        console.log(".variation_type_"+j);
			          	    
// 			          	    alert("hii");
// 				var variation_type_id = $(this).val();
// 				// print_r(variation_type_id);
// 				$.ajax({
// 					url: "get-variations",
// 					method: "POST",
// 					data: {variation_type_id:variation_type_id},
// 					success: function(data){
// 						$(".variation_"+j).html(data);
// 					}
// 		  });
// 		});
		
// 		j++;
// });




//   $(document).on('click', '.remove_more_option_value_data', function () {
//     var flag = 1
//     // $("input[name='name[]']").each(function () {
//       // let names = $(this).val();
//       let name = $(this).attr("data-option-name");
//       // alert(name);

//       // if (name == '') {
//       //   $(".name_err").show();
//       //   $('.name_err').html('This field is required')
//       //   flag = 0

//       // } else {
//       //   $('.name_err').hide()

//       // }
//     // });
//     // 
//       let more_option_value_ids = $('#id').val()

//       Swal.fire({
//         title: 'Are you sure?',
//         text: 'You will not be able to revert this!',
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#333',
//          cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, Remove it!',
//         cancelButtonText: 'No, keep it'
//       }).then((result) => {
//         if (result.isConfirmed) {
//           $.ajax({
//             type: 'POST',
//             url: 'delete_more_option_value',
//             data: { more_option_value_ids: more_option_value_ids, name: name },
//             success: function (data) {
//               console.log(data);
      
//               if (data == 1) {
//                 Swal.fire(
//                   'Deleted!',
//                   'Option Value Removed Successfully.',
//                   'success'
//                 );
//                 // Uncomment below to reload the page after 2 seconds
//                 // setTimeout(function () {
//                 //   location.reload();
//                 // }, 2000);
//               }
//             },
//           });
//         }
//       });
//   });

$(document).on('click', '.remove_more_option_value_data', function () {
    var name = $(this).attr("data-option-name");
    let more_option_value_ids = $('#id').val();

    $.ajax({
        type: 'POST',
        url: 'delete_more_option_value',
        data: { more_option_value_ids: more_option_value_ids, name: name },
        success: function (data) {
            console.log(data);

            if (data == 1) {
                // Show success message using Swal or any other method
                Swal.fire(
                    'Deleted!',
                    'Option Value Removed Successfully.',
                    'success'
                );

                // Uncomment below to reload the page after 2 seconds
                // setTimeout(function () {
                //   location.reload();
                // }, 2000);
            }
        },
        error: function (xhr, status, error) {
            console.error('Error while deleting:', error);
        }
    });
});

var selected_images = "";
		$("#product_images").on("change", function() {
			selected_images = $("#product_images")[0].files.length;
			// if ($("#product_images")[0].files.length > 4) {
			// 	$('#product_images_err').text('You can select only 4 images').addClass("text-danger");
			// 	return false;
			// } 
			// else{
			// 	$('#product_images_err').text('');
			// 	return true;
			// }
		});
		
// 			if (window.File && window.FileList && window.FileReader) {
// 					  $("#product_images").on("change", function(e) {
// 						var files = e.target.files,
// 						  filesLength = files.length;
// 						for (var i = 0; i < filesLength; i++) {
// 						  var f = files[i]
// 						  var fileReader = new FileReader();
// 						  fileReader.onload = (function(e) {
// 							var file = e.target;
// 							$("<span class=\"pip\">" +
// 							  "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\" width='100' height='100'/>" +
// 							  "<br/><span class=\"remove\">Remove image</span>" +
// 							  "</span>").insertAfter("#product_images");
// 							$(".remove").click(function(){
// 							  $(this).parent(".pip").remove();
// 							});
							
// 							// Old code here
// 							/*$("<img></img>", {
// 							  class: "imageThumb",
// 							  src: e.target.result,
// 							  title: file.name + " | Click to remove"
// 							}).insertAfter("#files").click(function(){$(this).remove();});*/
							
// 						  });
// 						  fileReader.readAsDataURL(f);
// 						}
// 						console.log(files);
// 					  });
// 					} else {
// 					  alert("Your browser doesn't support to File API")
// 					}


  $('#add_product').on('click', function() {
       
			
				var product_name = $('#product_name').val();
				var product_type = $('#product_type').val();
				var product_desc = $('#product_desc').val();
				var product_type = $('#product_type').val();
				var product_sku = $('#product_sku').val();
				var category = $('#category').val();
				var subcategory = $('#subcategory').val();
				var tag = $('#tag').val();
				// var product_cart_desc = $('#product_cart_desc').val();
				var product_short_desc = $('#product_short_desc').val();
				var product_long_desc = $('#product_long_desc').val();
				var product_images = $('#product_images').val();
				// var product_price = $('.product_price').val();
				var product_stock = $('.product_stock').val();
				// var product_low_stock = $('#product_low_stock').val();
				var brand = $('#brand').val();
				// var variation_type = $('#variation_type').val();
				
				// var variation =[];
				// var variation = $('#variation').val();
				var stock_status = $('#stock_status').val();
				var product_weight = $('#product_weight').val();
				var product_dimension = $('#product_dimension').val();
				var shipping_methods = $('#shipping_methods').val();
				var product_quantity2 = $('#product_quantity2').val();
				var product_price2 = $('#product_price2').val();
				var product_sale_price2=$('#product_sale_price2').val();
				let base_url = $('#base_url').val();
				
				
				 var flag = 0;
				 
			
				 	 if(product_type==2){
				 
                // $("select[name='variation_type[]']").each(function (i) {
                //   var variation_type = $(this).val();
                //     // alert("hii");
            
                //   if (variation_type == '') {
                //     // $(".product_price_err").show();
                //     $(this).next('#variation_type_err'+i).show();
                   
                //     $(this).next('#variation_type_err'+i).html('Option is required').addClass("text-danger");
                //     flag = 1;
            
                //   } else {
                //     $(this).next('span').hide()
            
                //   }
            
                // });
                
                
            
                 
                $("select.selectvariation").each(function (i) {
                  let variation = $(this).val();
                  let label = $(this).parent().find('label').text();
                  console.log(label);
                    // alert(product_price);
                    if(label == 'color' ){
                      if (variation == '') {
                        // $(".product_price_err").show();
                        $(this).next('#variations_err'+i).show();
                        
                        $(this).next('#variations_err'+i).html('Value is required').addClass("text-danger");
                        flag = 1;
                
                      } else {
                        $(this).next('span').hide()
                
                      }
                    }
                });
				
		console.log('bhavik modi');		 	 
           console.log(flag);
			
                $("input[name='product_quantity[]']").each(function () {
                  let product_quantity = $(this).val();
                    // alert(product_price);
            
                  if (product_quantity == '') {
                    // $(".product_price_err").show();
                    $(this).next('span').show();
                    
                    $(this).next('span').html('Quantity is required').addClass("text-danger");
                    flag = 1;
            
                  } else {
                    $(this).next('span').hide()
            
                  }
            
                });
            
            
            
    //   console.log($('.product_price').val();)
                $("input[name='product_price[]']").each(function () {
                  let product_price = $(this).val();
                    console.log(product_price);
            
                  if (product_price == '') {
                    // $(".product_price_err").show();
                    $(this).next('span').show();
                    
                    $(this).next('span').html('Price is required').addClass("text-danger");
                    flag = 1;
            
                  } else {
                    $(this).next('span').hide()
            
                  }
            
                });
                
                   $("input[name='product_sale_price[]']").each(function () {
                  let product_sale_price = $(this).val();
                    // alert(product_price);
            
                  if (product_sale_price == '') {
                    // $(".product_price_err").show();
                    $(this).next('span').show();
                    
                    $(this).next('span').html('Sale Price is required').addClass("text-danger");
                    flag = 1;
            
                  } else {
                    $(this).next('span').hide()
                    var res = check_price($(this));
                    console.log("resham bhavik");
                    if(res == false){
                        $(this).next('span').html('Sale Price is lower to Product Price').addClass("text-danger");
                        flag = 1;
                        return false;
                    }else{
                        $(this).next('span').html('').addClass("text-danger");
                    }
                  }
            
                });
                
                
                //   $("input[name='variation_image_1[]']").each(function () {
                  $(".variation_image").each(function () {
                       
                  let variation_image = $(this).val();
                    // alert(product_price);
            
                  if (variation_image == '') {
                    // $(".product_price_err").show();
                    $(this).next('span').show();
                    
                    $(this).next('span').html('Variation Image is required').addClass("text-danger");
                    flag = 1;
            
                  } else {
                    $(this).next('span').hide()
            
                  }
            
                });
                
				 	 }
		
				
                
				
				

				
			if(product_type==1){
				// var flag=0;
			    
				if (product_quantity2=="") 
				{
					$('#product_quantity_err2').text('Quantity  is required').addClass("text-danger");
					flag=1;
				} 
		 
				if (product_quantity2!="") 
				{
					$('#product_quantity_err2').text('');
				} 
				
				if (product_price2=="") 
				{
					$('#product_price_err2').text('Price is required').addClass("text-danger");
					flag=1;
				} 
		 
				if (product_price2!="") 
				{
					$('#product_price_err2').text('');
				} 
				
				
				if (product_sale_price2=="") 
				{
					$('#product_sale_price_err2').text('Sale Price is required').addClass("text-danger");
					flag=1;
				} 
		 
				if (product_sale_price2!="") 
				{
					$('#product_sale_price_err2').text('');
				} 
				if(Number(product_sale_price2) > Number(product_price2)){
				    $('#product_sale_price_err2').text('Sale Price must be less than product price').addClass("text-danger");
					flag=1;
				}
			
			}

				if (product_name=="") 
				{
					$('#product_name_err').text('Product Name is required').addClass("text-danger");
					flag=1;
				} 
		 
				if (product_name!="") 
				{
					$('#product_name_err').text('');
				} 

				if (product_desc=="") 
				{
					$('#description_err').text('Product Description is required').addClass("text-danger");
					flag=1;
				} 
		 
				if (product_desc!="") 
				{
					$('#description_err').text('');
				} 

				if (product_sku=="") 
				{
					$('#product_sku_err').text('Product SKU is required').addClass("text-danger");
					flag=1;
				} 
		 
				if (product_sku!="") 
				{
					$('#product_sku_err').text('');
				} 

				if (category=="") 
				{
					$('#category_err').text('Catagory is required').addClass("text-danger");
					flag=1;
				} 
		
				if (category!="") 
				{
					$('#category_err').text('');
				} 
				
				if (subcategory=="") 
				{
					$('#sub_category_err').text('Sub Catagory is required').addClass("text-danger");
					flag=1;
				} 
		
				if (subcategory!="") 
				{
					$('#sub_category_err').text('');
				} 

				
			

				if (product_short_desc=="") 
				{
					$('#product_short_desc_err').text('Product Short Description is required').addClass("text-danger");
					flag=1;
				} 
		
				if (product_short_desc!="") 
				{
					$('#product_short_desc_err').text('');
				} 

			

				
				if (product_images=="") 
				{
					$('#product_images_err').text('Product Image is required').addClass("text-danger");
					flag=1;
				} 
		
				if (product_images!="") 
				{
					$('#product_images_err').text('');
				}

				if (product_images!="" && selected_images > 4) {
					$('#product_images_err').text('You can select only 4 images').addClass("text-danger");
					flag=1;
			    } 
				
				if (product_images!="" && selected_images <= 4) {
					$('#product_images_err').text('');
				} 
				
			
				if (product_stock=="") 
				{
					$('#product_stock_err').text('Product Stock is required').addClass("text-danger");
					flag=1;
				} 
		
				if (product_stock!="") 
				{
					$('#product_stock_err').text('');
				} 
				
			


				if (stock_status=="") 
				{
					$('#stock_status_err').text('Stock Status is required').addClass("text-danger");
					flag=1;
				} 
		
				if (stock_status!="") 
				{
					$('#stock_status_err').text('');
				} 
			
			
				
				if (product_type=="") 
				{
					$('#product_type_err').text('Type is required').addClass("text-danger");
					flag=1;
				} 
		 
				if (product_type!="") 
				{
					$('#product_type_err').text('');
				} 
				
				if (shipping_methods=="") 
				{
					$('#shipping_methods_err').text('Class is required').addClass("text-danger");
					flag=1;
				} 
		 
				if (shipping_methods!="") 
				{
					$('#shipping_methods_err').text('');
				} 
				
			
					
				  if(flag==0){
				    //   alert('ajax');

					let add_product_form = document.getElementById("add_product_form");
					let fd = new FormData(add_product_form);

						$.ajax({
								url: "save-product",
								method: "POST",
								data: fd,
								//  beforeSend: function() {
                                   
                //                     $(".loader").show();
                                    
                //                 },
                            	processData: false,
								contentType: false,
								success: function(data)
                {

                if (data == 1) 
                  {
                   

                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Product Added Successfully...',
                        timer: 2000,
                        showConfirmButton: false 
                    }).then(function () 
                    {
                       $(".loader").show();
                        window.location.href = base_url; 
                    });
                
                } else if (data == 2) {

                  $("#product_images_err").text('This field is required').addClass("text-danger");
                    
                
                } else if (data == 0) {

                  Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Product cannot be added. Please try again.',
                    });
                }
                
									
							}
						});
					}
		
					if(flag==1){
						return false;
					}
					   
				});


 $('#edit_product').on('click', function() {
    //   alert('fvbrtvb');
			
				var product_name = $('#product_name').val();
				var product_type = $('#product_type').val();
				var product_desc = $('#product_desc').val();
				var product_type = $('#product_type').val();
				var product_sku = $('#product_sku').val();
				var category = $('#category').val();
				var subcategory = $('#subcategory').val();
				var tag = $('#tag').val();
				// var product_cart_desc = $('#product_cart_desc').val();
				var product_short_desc = $('#product_short_desc').val();
				var product_long_desc = $('#product_long_desc').val();
				var product_images = $('#product_images').val();
				// var product_price = $('.product_price').val();
				var product_stock = $('.product_stock').val();
				// var product_low_stock = $('#product_low_stock').val();
				var brand = $('#brand').val();
				// var variation_type = $('#variation_type').val();
				
				// var variation =[];
				// var variation = $('#variation').val();
				var stock_status = $('#stock_status').val();
				var product_weight = $('#product_weight').val();
				var product_dimension = $('#product_dimension').val();
				var shipping_methods = $('#shipping_methods').val();
				var product_quantity2 = $('#product_quantity2').val();
				var product_price2 = $('#product_price2').val();
				var product_sale_price2=$('#product_sale_price2').val();
				var flag = 0;
				var variation_image_index = [];
				if(product_type == 2){
    				$(".variation_image_index").each(function () {
    				    variation_image_index.push($(this).val());
    				})
				}
				
				// var old_variation_image = [];
				// $(".old_variation_image").each(function () {
				//     old_variation_image.push($(this).val());
				// })
				
				var variation_image = [];
				var tmp= false;
				var tmp_eq= '';
				if(product_type == 2){
				$(".variation_image").each(function (i) {
				    if($(this).val() != ''){
				        variation_image.push($(this).val());
				    }else{
				        var this_old_variation_image = $(this).parent().find('.old_variation_image').val();
				        if(this_old_variation_image != ''){
				            variation_image.push(this_old_variation_image);    
				        }else{
				            console.log('hhh');
    				        $(this).focus();
    				        tmp_eq = i;
    				        tmp = true;
    				        return false;
				        }
				    }
				})
				}
				console.log($(".variation_image").length);
				if(tmp){
				    $(".variation_image").eq(tmp_eq).focus();
				    return false;
				}
				
				   let base_url = $('#base_url').val();
				
				
				if(product_type==2){
				 var flag = 0;
				 
			
			 $("select[name='variation_type[]']").each(function (i) {
                  var variation_type = $(this).val();
                    // console.log(i);
                    // alert("hii");
            
                  if (variation_type == '') {
                    // $(".product_price_err").show();
                    $(this).next('#variation_type_err'+i).show();
                   
                    $(this).next('#variation_type_err'+i).html('Option is required').addClass("text-danger");
                    flag = 1;
            
                  } else {
                    $(this).next('span').hide()
            
                  }
            
                });
                
                
                 
                 
                $("select[name='variation[]']").each(function (i) {
                  let variation = $(this).val();
                    // alert(variation);
            
                  if (variation == '') {
                    // $(".product_price_err").show();
                    $(this).next('#variations_err'+i).show();
                    
                    $(this).next('#variations_err'+i).html('Value is required').addClass("text-danger");
                    flag = 1;
            
                  } else {
                    $(this).next('span').hide()
            
                  }
            
                });
				
			
			
                $("input[name='product_quantity[]']").each(function () {
                  let product_quantity = $(this).val();
                    // alert(product_price);
            
                  if (product_quantity == '') {
                    // $(".product_price_err").show();
                    $(this).next('span').show();
                    
                    $(this).next('span').html('Quantity is required').addClass("text-danger");
                    flag = 1;
            
                  } else {
                    $(this).next('span').hide()
            
                  }
            
                });
            
            
            
          
                $("input[name='product_price[]']").each(function () {
                  let product_price = $(this).val();
                    // alert(product_price);
            
                  if (product_price == '') {
                    // $(".product_price_err").show();
                    $(this).next('span').show();
                    
                    $(this).next('span').html('Price is required').addClass("text-danger");
                    flag = 1;
            
                  } else {
                    $(this).next('span').hide()
            
                  }
            
                });
                
                 $("input[name='product_sale_price[]']").each(function () {
                  let product_sale_price = $(this).val();
                    // alert(product_price);
            
                  if (product_sale_price == '') {
                    // $(".product_price_err").show();
                    $(this).next('span').show();
                    
                    $(this).next('span').html('Sale Price is required').addClass("text-danger");
                    flag = 1;
            
                  } else {
                    $(this).next('span').hide()
                    var res = check_price($(this));
                    console.log("resham bhavik");
                    if(res == false){
                        $(this).next('span').html('Sale Price is lower to Product Price').addClass("text-danger");
                        flag = 1;
                        return false;
                    }else{
                        $(this).next('span').html('').addClass("text-danger");
                    }
            
                  }
            
                });
           
 }	
             
				
				

				//  var flag=0;
					
			if(product_type==1){
		
				if (product_quantity2=="") 
				{
					$('#product_quantity_err2').text('Quantity  is required').addClass("text-danger");
					flag=1;
					return false;
				
				} 
		 
				if (product_quantity2!="") 
				{
					$('#product_quantity_err2').text('');
				} 
				
				if (product_price2=="") 
				{
					$('#product_price_err2').text('Price is required').addClass("text-danger");
					flag=1;
					return false;
				} 
		 
				if (product_price2!="") 
				{
					$('#product_price_err2').text('');
				} 
					if (product_sale_price2=="") 
				{
					$('#product_sale_price_err2').text('Sale Price is required').addClass("text-danger");
					flag=1;
				} 
		 
				if (product_sale_price2!="") 
				{
					$('#product_sale_price_err2').text('');
				} 
				console.log(flag);
				if(Number(product_sale_price2) > Number(product_price2)){
				    $('#product_sale_price_err2').text('Sale Price must be less than product price').addClass("text-danger");
					flag=1;
				}else{
				    $('#product_sale_price_err2').text('');
				}
			 //   var flag=0;
			    
			    
			}
console.log(flag); 
// return false;
				if (product_name=="") 
				{
					$('#product_name_err').text('Product Name is required').addClass("text-danger");
					flag=1;
				} 
		 
				if (product_name!="") 
				{
					$('#product_name_err').text('');
				} 

				if (product_desc=="") 
				{
					$('#description_err').text('Product Description is required').addClass("text-danger");
					flag=1;
				} 
		 
				if (product_desc!="") 
				{
					$('#description_err').text('');
				} 

				if (product_sku=="") 
				{
					$('#product_sku_err').text('Product SKU is required').addClass("text-danger");
					flag=1;
				} 
		 
				if (product_sku!="") 
				{
					$('#product_sku_err').text('');
				} 

				if (category=="") 
				{
					$('#category_err').text('Catagory is required').addClass("text-danger");
					flag=1;
				} 
		
				if (category!="") 
				{
					$('#category_err').text('');
				} 
				
				if (subcategory=="") 
				{
					$('#sub_category_err').text('Sub Catagory is required').addClass("text-danger");
					flag=1;
				} 
		
				if (subcategory!="") 
				{
					$('#sub_category_err').text('');
				} 

				
			

				if (product_short_desc=="") 
				{
					$('#product_short_desc_err').text('Product Short Description is required').addClass("text-danger");
					flag=1;
				} 
		
				if (product_short_desc!="") 
				{
					$('#product_short_desc_err').text('');
				} 

			

				
				// if (product_images=="") 
				// {
				// 	$('#product_images_err').text('Product Image is required').addClass("text-danger");
				// 	flag=1;
				// } 
		
				// if (product_images!="") 
				// {
				// 	$('#product_images_err').text('');
				// }

				if (product_images!="" && selected_images > 4) {
					$('#product_images_err').text('You can select only 4 images').addClass("text-danger");
					flag=1;
			    } 
				
				if (product_images!="" && selected_images <= 4) {
					$('#product_images_err').text('');
				} 
				
			
				if (product_stock=="") 
				{
					$('#product_stock_err').text('Product Stock is required').addClass("text-danger");
					flag=1;
				} 
		
				if (product_stock!="") 
				{
					$('#product_stock_err').text('');
				} 
				
			


				if (stock_status=="") 
				{
					$('#stock_status_err').text('Stock Status is required').addClass("text-danger");
					flag=1;
				} 
		
				if (stock_status!="") 
				{
					$('#stock_status_err').text('');
				} 
			
			
				
				if (product_type=="") 
				{
					$('#product_type_err').text('Type is required').addClass("text-danger");
					flag=1;
				} 
		 
				if (product_type!="") 
				{
					$('#product_type_err').text('');
				} 
				
// 			console.log(flag);
					
				  if(flag==0){
				    //   alert('ajax');

					let edit_product_form = document.getElementById("edit_product_form");
					let fd = new FormData(edit_product_form);
					fd.append('variation_image_index',variation_image_index);
					fd.append('variation_image',variation_image);

						$.ajax({
								url: "update_product",
								method: "POST",
								data: fd,
								// beforeSend: function() {
                                   
                //                     $(".loader").show();
                                    
                //                 },
								processData: false,
								contentType: false,
								success: function(data){
								// 	console.log(data);
                if (data == 1) {
                    // Clear any previous errors
                    // $("#profile_pic_err").text("");
                    
                    // Use SweetAlert for success notification
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Product Updated Successfully...',
                        timer: 1000, // Auto close after 2 seconds
                        showConfirmButton: false // Hide the confirm button
                    }).then(function () {
                      $(".loader").show();
                        window.location.href = base_url; // Redirect to the base URL after the alert closes
                    });
                
                } else if (data == 2) {
                    // Validation error for product images
                    // $("#product_images_err").text('This field is required').addClass("text-danger");
                    
                    // Optionally, you can use SweetAlert for validation warning as well
                    Swal.fire({
                        icon: 'warning',
                        title: 'Validation Error',
                        text: 'Please upload the required product image.',
                    });
                
                } else if (data == 0) {
                    // Use SweetAlert for failure notification
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Product cannot be added. Please try again.',
                    });
                }
                
									
							}
						});
					}
		
					if(flag==1){
						return false;
					}
					   
				});




  var max_fields = 10; //Maximum allowed input fields 
  var wrapper = $(".wrapper"); //Input fields wrapper
  var add_button = $(".add_more_option_value_data"); //Add button class or ID
  var x = 1; //Initial input field is set to 1

  //When user click on add input button
  $(add_button).click(function (e) {
    e.preventDefault();
    console.log(wrapper);

    if (x < max_fields) {
      x++; 
      
        $(wrapper).append(`<div class="border p-2 mt-2 rounded position-relative">
                            <label for="defaultFormControlInput" class="form-label">Option Value</label>
                            <input type="text" class="form-control option_value" id="name" name="name[]" placeholder="John Doe" aria-describedby="defaultFormControlHelp">
                            <label for="defaultFormControlInput" class="form-label">Option Value Image</label>
                            <input type="file" class="form-control option_img" id="option_img" name="option_img[]" placeholder="John Doe" aria-describedby="defaultFormControlHelp">
                            <a href="javascript:void(0);" class="remove position-absolute remove_field remove_more_option_value_data" style="top: 3px;right: 13px;">Remove</a>
                            <p class="text-danger name_err"> </p>
                            </div>`);
    }
  });

  // when user click on remove button
  $(wrapper).on("click", ".remove_field", function (e) {
    e.preventDefault();
    $(this).parent('div').remove(); //remove inout field
    x--; //inout field decrement
  })








// jignesh ...................................

$('#country').on('change', function() {
  var countryid = $('#country').val();
  var base = $('#base_url').val();
//   console.log(countryid);
  // let origin = location.origin;
  
  $.ajax({
    url: base+"get_state_from_country",
    method: "POST",
//     contentType: false,
// processData: false,
    data: {countryid:countryid},
    
    
    success: function(data){
      // console.log(data);

      var statedata= JSON.parse(data);
      var statedata_count= statedata.length;
      var html ='';
      html +='<option value="">State</option>'
      for(var i=0;i<statedata_count;i++){
        var data1 = statedata[i];
        html +='<option value="'+data1.StateID+'">'+data1.StateName+'</option>'
      }
      $('#state').html('')
      $('#state').html(html)
      // if(data==1){
      // 	$("#profile_pic_err").text("");
      // 	$("#successmsg").text('Profile updated successfully...').addClass("text-success");
        
      // 	setTimeout(function () {
      // 		location.href='profile';
      // 	}, 2000);
      // }
      // else if(data==2){
      // 	$("#profile_pic_err").text('Please upload only jpg,jpeg,png and gif file.').addClass("text-danger");
      // }
      // else if(data==0){
      // 	alert("Profile cannot be updated");
      // }
      
  }
});



});



$('#state').on('change', function() {
  // alert ("fff");
  var stateid = $('#state').val();
  var base = $('#base_url').val();
  // console.log(stateid);

  $.ajax({
    url: base+"get_city_from_state",
    method: "POST",
    data: {stateid:stateid},
    
    
    success: function(data){
      // console.log(data);

      var citydata= JSON.parse(data);
      var citydata_count= citydata.length;
      var html ='';
      html +='<option value="">City</option>'
      for(var i=0;i<citydata_count;i++){
        var data1 = citydata[i];
        html +='<option value="'+data1.CityID+'">'+data1.CityName+'</option>'
      }
      $('#city').html('')
      $('#city').html(html)
      // if(data==1){
      // 	$("#profile_pic_err").text("");
      // 	$("#successmsg").text('Profile updated successfully...').addClass("text-success");
        
      // 	setTimeout(function () {
      // 		location.href='profile';
      // 	}, 2000);
      // }
      // else if(data==2){
      // 	$("#profile_pic_err").text('Please upload only jpg,jpeg,png and gif file.').addClass("text-danger");
      // }
      // else if(data==0){
      // 	alert("Profile cannot be updated");
      // }
      
  }
});



});

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
  }

$('#add_customer').on('click', function() {
  // alert ("hjj");
  let a= $("#firstname").val();
            let b= $("#lastname").val();
            let c= $("#dob").val();
            let d= $("#email").val();
            let f= $("#phone").val();
  let g= $("#password").val();
//   let h= $("#address1").val();
//   let i= $("#address2").val();
//   let j= $("#country").val();
//   let k= $("#state").val();
//   let l= $("#city").val();
//   let m= $("#postcode").val();
            let flag = 1;

  if(a==""){
    $("#cus_fname_err").html("Please Enter First Name!").addClass("text-danger");
      flag =0;
      

  }else{
    $("#cus_fname_err").html("");
    
  }
  if(b==""){
    $("#cus_lname_err").html("Please Enter Last Name!").addClass("text-danger");
      flag =0;
      

  }else{
    $("#cus_lname_err").html("");
    
  }
  if(c==""){
    $("#cus_dob_err").html("Please Enter Date Of Birth").addClass("text-danger");
      flag =0;
      

  }else{
    $("#cus_dob_err").html("");
    
  }

  if(d==""){
    $("#cus_email_err").html("Please Enter Email!").addClass("text-danger");
      flag =0;
      

  }else if(!validateEmail(d)){
    
    $("#cus_email_err").html("Please Enter Valid Email.").addClass("text-danger");
    flag=0;
  }
  else{
    $("#cus_email_err").html("");
    
  }

  if(f == "") {
    $("#cus_phone_err").html("Please Enter Phone Number!").addClass("text-danger");
    flag = 0;
} else if(!/^\d{10}$/.test(f)) {
    $("#cus_phone_err").html("Phone number must be 10 digits").addClass("text-danger");
    flag = 0;
} else {
    $("#cus_phone_err").html("");
}


  if(g==""){
    $("#cus_password_err").html("Please Enter Password!").addClass("text-danger");
      flag =0;
      

  }else{
    $("#cus_password_err").html("");
    
  }

//   if(h==""){
//     $("#cus_address1_err").html("this field is required").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#cus_address1_err").html("");
    
//   }

//   if(i==""){
//     $("#cus_address2_err").html("this field is required").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#cus_address2_err").html("");
    
//   }

//   if(j==""){
//     $("#cus_country_err").html("this field is required").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#cus_country_err").html("");
    
//   }

//   if(k==""){
//     $("#cus_state_err").html("this field is required").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#cus_state_err").html("");
    
//   }
//   if(l==""){
//     $("#cus_city_err").html("this field is required").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#cus_city_err").html("");
    
//   }
//   if(m==""){
//     $("#cus_postcode_err").html("this field is required").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#cus_postcode_err").html("");
    
//   }



  if(flag==1){
    // console.log ("ok") ;
   }else{
     return false;
   }


   
   let myform = document.getElementById("add_customer_from");
   let fd = new FormData(myform);
     $.ajax({
     url: "save_customers",
     data: fd,
     cache: false,
     processData: false,
     contentType: false,
     type: 'POST',
     success: function(data){
       
      //  let getdata= JSON.parse(data);
      //  console.log(getdata);
      //  
       
      if (data == 1) {
        Swal.fire({
            icon: 'success',
            title: "Success",
            text: "Customer Added Successfully!",
            timer: 2000,
            showConfirmButton: false,
        }).then(function () {
            setTimeout(function () {
                window.location.href = 'all-customers';
            }, 2000);
        });
    }
    
    if (data == 2) {
        Swal.fire({
            icon: 'error',
            title: "Error",
            text: "Email Already Exists!",
            showConfirmButton: true,
        })
    }
    
 // do something with the result
}
});


});

$('#edit_customer').on('click', function() {
  // alert ("hjj");
  let base_url= $("#base_url").val();
  let a= $("#firstname").val();
            let b= $("#lastname").val();
            let c= $("#dob").val();
            // let d= $("#email").val();
            // let f= $("#phone").val();
  // let g= $("#password").val();
//   let h= $("#address1").val();
//   let i= $("#address2").val();
//   let j= $("#country").val();
//   let k= $("#state").val();
//   let l= $("#city").val();
//   let m= $("#postcode").val();
            let flag = 1;

  if(a==""){
    $("#cus_fname_err").html("Please Enter First Name!").addClass("text-danger");
      flag =0;
      

  }else{
    $("#cus_fname_err").html("");
    
  }
  if(b==""){
    $("#cus_lname_err").html("Please Enter Last Name!").addClass("text-danger");
      flag =0;
      

  }else{
    $("#cus_lname_err").html("");
    
  }
  if(c==""){
    $("#cus_dob_err").html("Please Enter Date Of Birth").addClass("text-danger");
      flag =0;
      

  }else{
    $("#cus_dob_err").html("");
    
  }

  // if(d==""){
  // 	$("#cus_email_err").html("this field is required").addClass("text-danger");
  // 	  flag =0;
      

  // }else if(!validateEmail(d)){
    
  // 	$("#cus_email_err").html("put like abc@xyz.com ").addClass("text-danger");
  // 	flag=0;
  // }
  // else{
  // 	$("#cus_email_err").html("");
    
  // }

//   if(f==""){
//     $("#cus_phone_err").html("this field is required").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#cus_phone_err").html("");
    
//   }

  // if(g==""){
  // 	$("#cus_password_err").html("this field is required").addClass("text-danger");
  // 	  flag =0;
      

  // }else{
  // 	$("#cus_password_err").html("");
    
  // }

//   if(h==""){
//     $("#cus_address1_err").html("this field is required").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#cus_address1_err").html("");
    
//   }

//   if(i==""){
//     $("#cus_address2_err").html("this field is required").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#cus_address2_err").html("");
    
//   }

//   if(j==""){
//     $("#cus_country_err").html("this field is required").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#cus_country_err").html("");
    
//   }

//   if(k==""){
//     $("#cus_state_err").html("this field is required").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#cus_state_err").html("");
    
//   }
//   if(l==""){
//     $("#cus_city_err").html("this field is required").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#cus_city_err").html("");
    
//   }
//   if(m==""){
//     $("#cus_postcode_err").html("this field is required").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#cus_postcode_err").html("");
    
//   }



  if(flag==1){
    console.log ("ok") ;
   }else{
     return false;
   }


   
   let myform = document.getElementById("edit_customer_from");
   let fd = new FormData(myform);
     $.ajax({
     url: "edit_customers",
     data: fd,
     cache: false,
     processData: false,
     contentType: false,
     type: 'POST',
     success: function(data)
     {
      //  let getdata= JSON.parse(data);
      //  console.log(getdata);
      Swal.fire({
        icon: 'success',
        title: 'Updated!',
        text: 'Customer Updated Successfully!',
        timer: 1000, 
        showConfirmButton: false 
    }).then(function () {
        window.location.href = base_url;
    });

}
});


});

$(document).on('click', '.del_customer', function () 
{
  

   var customer_ids = $(this).attr("data-id");
 
   Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#333',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: 'del_customer',
                data: { customer_ids: customer_ids },
                success: function (data) {
                    console.log(data);

                    if (data == 1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'Record deleted successfully.',
                            showConfirmButton: false,
                            timer: 1000
                        }).then(function () {
                            window.location.reload();
                        });
                    }
                }
            });
        }
    });

});

$(document).on('click', '.del_product', function () 
{
  

   var product_ids = $(this).attr("data-id");
 
   Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#333',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: 'del_product',
                data: { product_ids: product_ids },
                success: function (data) {
                  console.log(data);

                  if (data == 1) {
                      Swal.fire({
                          icon: 'success',
                          title: 'Deleted!',
                          text: 'Record Deleted successfully.',
                          showConfirmButton: false,
                          timer: 2000
                      }).then(function () {
                          window.location.reload();
                      });
                  } else if (data == 2) {
                      Swal.fire({
                          icon: 'warning',
                          title: 'Warning!',
                          text: 'This product is currently in use and cannot be deleted!',
                          showConfirmButton: true,
                          confirmButtonColor: '#333',
                      })
                  }                  
                  
                }
            });
        }
    });
});


 $('#add_banners_data').on('click', function () {
    // alert ("hi");

    // alert("hello");

    // let name = $('#name').val()
    // let description = $('#description').val()
    // let position = $('#position').val()
    let file = $('#filetoupload').val()
    let url = $('#url').val()
    let base_url = $('#base_url').val()



    var flag = 1

    // if (name == '') {
    //   $(".name_err").show();
    //   $('.name_err').html('Name is required')
    //   flag = 0

    // } else {
    //   $('.name_err').hide()

    // }


    // if (description.trim().length <= 0) {
    //   $(".description_err").show();
    //   $('.description_err').html('Description is required')
    //   flag = 0

    // } else {
    //   $('.description_err').hide()

    // }


    // if (file == '') {
    //   $(".file_err").show();
    //   $('.file_err').html('Catagory Image is required')
    //   flag = 0

    // } else {
    //   $('.file_err').hide()

    // }


    // if (position == '') {
    //   $(".position_err").show();
    //   $('.position_err').html('Position is required')
    //   flag = 0

    // } else {
    //   $('.position_err').hide()

    // }
    
     if (url == '') {
      $(".url_err").show();
      $('.url_err').html('Button URL  is required')
      flag = 0

    } else {
      $('.url_err').hide()

    }

    if (flag == 1) {

      let add_banners_data = document.getElementById('add_banners');
      let fd = new FormData(add_banners_data)

      //   fd.append('files',files);

      $.ajax({
        url: 'save_banners',
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
                text: 'Banners Added Successfully!',
                timer: 2000,  // Alert will close after 2 seconds
                showConfirmButton: false
            }).then(function () {
                window.location.href = base_url;
            });
        } else if (data == 2) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Banners Already Exist!',
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
  

$('#edit_banners_data').on('click', function () {
    // alert ("hi");

    // alert("hello");

    // let name = $('#name').val()
    // let description = $('#description').val()
    // let position = $('#position').val()
    let file = $('#filetoupload').val()
let url = $('#url').val()


    let base_url = $('#base_url').val()



    var flag = 1

    // if (name == '') {
    //   $(".name_err").show();
    //   $('.name_err').html('Name is required')
    //   flag = 0

    // } else {
    //   $('.name_err').hide()

    // }


    // if (description.trim().length <= 0) {
    //   $(".description_err").show();
    //   $('.description_err').html('Description is required')
    //   flag = 0

    // } else {
    //   $('.description_err').hide()

    // }


    // if (file == '') {
    //   $(".file_err").show();
    //   $('.file_err').html('Catagory Image is required')
    //   flag = 0

    // } else {
    //   $('.file_err').hide()

    // }


//  if (position == '') {
//       $(".position_err").show();
//       $('.position_err').html('Position is required')
//       flag = 0

//     } else {
//       $('.position_err').hide()

//     }
    
     if (url == '') {
      $(".url_err").show();
      $('.url_err').html('Button URL  is required')
      flag = 0

    } else {
      $('.url_err').hide()

    }

    if (flag == 1) {

      let edit_banners_data = document.getElementById('edit_banners');
      let fd = new FormData(edit_banners_data)

      //   fd.append('files',files);

      $.ajax({
        url: 'update_banners',
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
                text: 'Banners Updated Successfully!',
                timer: 2000,  // Alert will close after 2 seconds
                showConfirmButton: false
            }).then(function () {
                window.location.href = base_url;
            });
        } else if (data == 2) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Banner Already Exist!',
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
// });


$(document).on('click', '.del_banners', function () 
{
  

   var banners_ids = $(this).attr("data-id");
//   alert(banners_ids);
   
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#333',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!'
    }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
              type: 'POST',
              url: 'del_banners',
              data: { banners_ids: banners_ids },
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
              },
          });
      }
    });

});


$(document).ready(function() {
    $('.tag').select2();
});
$(document).ready(function() {
    $('.tags1').select2();
});
$('#add_coupon_data').on('click', function() {
//   alert ("hjj");
            let a= $("#coupon_code").val();
            let b= $("#coupon_type").val();
            let c= $("#coupon_value").val();
            let d= $("#s_date").val();
            let f= $("#e_date").val();
            
            let g= $("#coupon_name").val();
            let h= $("#specification").val();
            let i= $("#user_status").val();
            
            let j= $("#product_coupons").val();
            let k= $("#catagory_coupons").val();
            let l= $("#product_couponed").val();
            let m= $("#usertype_coupons").val();
            
           
            
  

            let flag = 1;
            
             if(j==1){
                 
                  if(k==""){
    $(".catagory_coupons_err").html("Please enter your Catagory!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".catagory_coupons_err").html("");
    
  }
  
             }
             
          
             
              if(j==2){
                  
                  if(l==""){
    $(".product_couponed_err").html("Please select your Product!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".product_couponed_err").html("");
    
  }
  
              }
              
             
   
             
              if(j==3){
                  
                  if(m==""){
    $(".usertype_coupons_err").html("Please select your User!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".usertype_coupons_err").html("");
    
  }
              }
              
              
            
             if(j==""){
    $(".product_coupon_err").html("Please enter your Product Coupon!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".product_coupon_err").html("");
    
  }
  
  
  
  
   
  
   
       
            
     if(g==""){
    $(".coupon_err").html("Please enter your Coupon Name!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".coupon_err").html("");
    
  }
     
     if(i==""){
    $(".type_err").html("Please select your User status!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".type_err").html("");
    
  }
  
  if(h==""){
    $(".specification_err").html("Please enter your Product Specifications!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".specification_err").html("");
    
  }
            

  if(a==""){
    $(".code_err").html("Please enter your Coupon Code!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".code_err").html("");
    
  }
  if(b==""){
    $(".type_err").html("Please select your Coupon type!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".type_err").html("");
    
  }
  if(b==1){
      
      if(c>100 || c<0){
        //   console.log('hellooooo');
          $(".value_err2").html("Please enter Value between 0-100").addClass("text-danger");
          flag=0;
      }
      else{
          $(".value_err2").html("");
      }
  }
  
  
  
  
  
  if(c==""){
    $(".value_err").html("This field is required").addClass("text-danger");
      flag =0;
      

  }else{
    $(".value_err").html("");
    
  }

  if(d==""){
    $(".sdate_err").html("Please enter your Start Date!").addClass("text-danger");
      flag =0;
      

  }else{
  
    $(".sdate_err").html("");
    
  }
  if(f==""){
    $(".edate_err").html("Please enter your Last Date!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".edate_err").html("");
    
  }



  if(flag==1){
    // console.log ("ok") ;
   }else{
     return false;
   }


   
   let myform = document.getElementById("add_coupon_form");
   let fd = new FormData(myform);
     $.ajax({
     url: "save_coupons",
     data: fd,
     cache: false,
     processData: false,
     contentType: false,
     type: 'POST',
     success: function(data){
       
      //  let getdata= JSON.parse(data);
      //  console.log(getdata);
      if (data == 1) {
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Coupon Added Successfully!',
            timer: 2000,
            showConfirmButton: false
        }).then(function () {
            window.location.href = 'all-coupons';
        });
    }
    
    if (data == 2) {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Email Already Exists!',
            showConfirmButton: true
        });
    }
    
 // do something with the result
}
});


});




$('#update_coupon_data').on('click', function() {
//   alert ("hjj");
  let a= $("#coupon_code").val();
            let b= $("#coupon_type").val();
            let c= $("#coupon_value").val();
            let d= $("#s_date").val();
            let f= $("#e_date").val();
            
            let g= $("#coupon_name").val();
            let h= $("#specification").val();
            let i= $("#user_status").val();
            
            let j= $("#product_coupons").val();
            let k= $("#catagory_coupons").val();
            let l= $("#product_couponed").val();
            let m= $("#usertype_coupons").val();
 let base_url = $("#base_url").val();
           
            let flag = 1;
            
             if(j==1){
                 
                  if(k==""){
    $(".catagory_coupons_err").html("Please enter your Catagory!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".catagory_coupons_err").html("");
    
  }
  
             }
             
          
             
              if(j==2){
                  
                  if(l==""){
    $(".product_couponed_err").html("Please select your Product!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".product_couponed_err").html("");
    
  }
  
              }
              
             
   
             
              if(j==3){
                  
                  if(m==""){
    $(".usertype_coupons_err").html("Please select your User!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".usertype_coupons_err").html("");
    
  }
              }
              
              
            
             if(j==""){
    $(".product_coupon_err").html("Please enter your Product Coupon!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".product_coupon_err").html("");
    
  }
  
  
  
  
   
  
   
       
            
     if(g==""){
    $(".coupon_err").html("Please enter your Coupon Name!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".coupon_err").html("");
    
  }
     
     if(i==""){
    $(".type_err").html("Please select your User status!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".type_err").html("");
    
  }
  
  if(h==""){
    $(".specification_err").html("Please enter your Product Specifications!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".specification_err").html("");
    
  }
            

  if(a==""){
    $(".code_err").html("Please enter your Coupon Code!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".code_err").html("");
    
  }
  if(b==""){
    $(".type_err").html("Please select your Coupon type!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".type_err").html("");
    
  }
  if(b==1){
      
      if(c>100 || c<0){
        //   console.log('hellooooo');
          $(".value_err2").html("Please enter Value between 0-100").addClass("text-danger");
          flag=0;
      }
      else{
          $(".value_err2").html("");
      }
  }
  
  
  
  
  
  if(c==""){
    $(".value_err").html("This field is required").addClass("text-danger");
      flag =0;
      

  }else{
    $(".value_err").html("");
    
  }

  if(d==""){
    $(".sdate_err").html("Please enter your Start Date!").addClass("text-danger");
      flag =0;
      

  }else{
  
    $(".sdate_err").html("");
    
  }
  if(f==""){
    $(".edate_err").html("Please enter your Last Date!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".edate_err").html("");
    
  }





  if(flag==1){
    // console.log ("ok") ;
   }else{
     return false;
   }
   

   
   let myform = document.getElementById("edit_coupon_form");
   let fd = new FormData(myform);
     $.ajax({
     url: "update_coupons",
     data: fd,
     cache: false,
     processData: false,
     contentType: false,
     type: 'POST',
     success: function(data){
       
      //  let getdata= JSON.parse(data);
      //  console.log(getdata);

      if (data == 1) {
        swal.fire({
          icon:'success',
          title:'Success',
          text:"Coupon Updated Successfully",
          timer:2000,
          showConfirmButton:false

        }).then(function () {
          window.location.href = base_url;
        }, 2000);


        
         
       }
       
 // do something with the result
}
});


});

$(document).on('click', '.del_coupons_type', function () 
{
  

   var coupons_ids = $(this).attr("data-id");
 
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#333',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: 'del_coupons',
                data: { coupons_ids: coupons_ids },
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
// SEO .....

$('#add_testimonial_btn').on('click', function() {
//   alert ("hjj"); exit;
         let a= $("#testi_content").val();
            let b= $("#testi_author").val();
            let c= $("#testi_company").val();
            let d= $("#testi_position").val();
            let f= $("#testi_image").val();
  

            let flag = 1;

  if(a==""){
    $(".testi_content_err").html("Please Enter Content!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".testi_content_err").html("");
    
  }
  if(b==""){
    $(".testi_author_err").html("Please Enter Author!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".testi_author_err").html("");
    
  }
  
  
  
  if(c==""){
    $(".testi_company_err").html("Please Enter Company").addClass("text-danger");
      flag =0;
      

  }else{
    $(".testi_company_err").html("");
    
  }
  if(d==""){
    $(".testi_position_err").html("Please Enter Position").addClass("text-danger");
      flag =0;
      

  }else{
    $(".testi_position_err").html("");
    
  }
   if(f==""){
    $(".testi_image_err").html("Please Select Image").addClass("text-danger");
      flag =0;
      

  }else{
    $(".testi_image_err").html("");
    
  }
  



  if(flag==1){
    // console.log ("ok") ;
   }else{
     return false;
   }


   
   let myform = document.getElementById("add_testimonial_form");
   let fd = new FormData(myform);
     $.ajax({
     url: "save_testimonial",
     data: fd,
     cache: false,
     processData: false,
     contentType: false,
     type: 'POST',
     success: function(data){
       
      //  let getdata= JSON.parse(data);
      //  console.log(getdata);
      //  
       
      if (data == 1) {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Data Added Successfully!',
            timer: 2000,  // Alert will close after 2 seconds
            showConfirmButton: false
        }).then(function () {
            window.location.href = 'all-testimonial';
        });
    }
    
      
 // do something with the result
}
});


});

$('#edit_testimonial_btn').on('click', function() {
//   alert ("hjj"); exit;
         let a= $("#testi_content").val();
            let b= $("#testi_author").val();
            let c= $("#testi_company").val();
            let d= $("#testi_position").val();
            let f= $("#testi_image").val();
        var base_url=$("#base_url").val();

            let flag = 1;

  if(a==""){
    $(".testi_content_err").html("Please Enter Content!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".testi_content_err").html("");
    
  }
  if(b==""){
    $(".testi_author_err").html("Please Enter Author!").addClass("text-danger");
      flag =0;
      

  }else{
    $(".testi_author_err").html("");
    
  }
  
  
  
  if(c==""){
    $(".testi_company_err").html("Please Enter Company").addClass("text-danger");
      flag =0;
      

  }else{
    $(".testi_company_err").html("");
    
  }
  if(d==""){
    $(".testi_position_err").html("Please Enter Position").addClass("text-danger");
      flag =0;
      

  }else{
    $(".testi_position_err").html("");
    
  }
//   if(f==""){
//     $(".testi_image_err").html("Please Enter keywords").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $(".testi_image_err").html("");
    
//   }
  



  if(flag==1){
    // console.log ("ok") ;
   }else{
     return false;
   }


   
   let myform = document.getElementById("edit_testimonial_form");
   let fd = new FormData(myform);
     $.ajax({
     url: "update_testimonial",
     data: fd,
     cache: false,
     processData: false,
     contentType: false,
     type: 'POST',
     success: function(data){
       
      //  let getdata= JSON.parse(data);
        // console.log(data);

      if (data == 1) {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Data Updated Successfully!',
            timer: 2000,  // Alert will close after 2 seconds
            showConfirmButton: false
        }).then(function () {
            window.location.href = base_url;
        });
    }
    
 // do something with the result
}
});


});


$(document).on('click', '.del_testimonial_type', function () 
{
  

   var testimonial_ids = $(this).attr("data-id");
 
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
            // Proceed with the AJAX request to delete the testimonial
            $.ajax({
                type: 'POST',
                url: 'del_testimonial',
                data: { testimonial_ids: testimonial_ids },
                success: function (data) {
                    console.log(data);

                    if (data == 1) {
                        // Show success message using SweetAlert2
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'Record deleted successfully.',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(function () {
                            // Reload the page after the alert closes
                            window.location.reload();
                        });
                    }
                }
            });
        }
      });

});


// seo end....
// tax page ...

//   $(document).on('change', '#country_tax', function () {
// // $('#country1').on('change', function() {
//     // alert ("hh");
//   var countryid = $('#country_tax').val();
//   var base = $('#base_url').val();
//   console.log(countryid);
//   console.log(base);
//   // let origin = location.origin;

//   $.ajax({
//     url: base+"get_state_from_country",
//     method: "POST",
// //     contentType: false,
// // processData: false,

//     data: {countryid:countryid},
    
    
//     success: function(data){
//       // console.log(data);

//       var statedata= JSON.parse(data);
//       var statedata_count= statedata.length;
//       var html ='';
//       html +='<option value="">State</option>'
//       for(var i=0;i<statedata_count;i++){
//         var data1 = statedata[i];
//         html +='<option value="'+data1.StateID+'">'+data1.StateName+'</option>'
//       }
//       $('#state').html('')
//       $('#state').html(html)
      
      
      
//   }
// });
// });

$('#add_tax_btn').on('click', function() {
//   alert ("hjj");
  let a= $("#tax_name").val();
            let b= $("#tax_rate").val();
            let c= $("#country").val();
            let d= $("#state").val();
            let f= $("#city").val();
            let g= $("#tax_zip").val();
            let h= $("#shipping").val();
            
            let base_url=$("#base_url").val();
            
            
  

            let flag = 1;

  if(a==""){
    $("#tax_name_err").html("Please enter Tax Name!").addClass("text-danger");
      flag =0;
      

  }else{
    $("#tax_name_err").html("");
    
  }
  if(b==""){
    $("#tax_rate_err").html("Please Enter Tax Rate!").addClass("text-danger");
      flag =0;
      

  }else{
    $("#tax_rate_err").html("");
    
  }
  
//   if(c==""){
//     $("#country_err").html("This field is required").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#country_err").html("");
    
//   }

//   if(d==""){
//     $("#state_err").html("This field is required!").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#state_err").html("");
    
//   }
//   if(f==""){
//     $("#city_err").html("This field is required!").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#city_err").html("");
    
//   }
  
//   if(g==""){
//     $("#zip_err").html("This field is required!").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#zip_err").html("");
    
//   }
   if(h==""){
    $("#shipping_err").html("This field is required!").addClass("text-danger");
      flag =0;
      

  }else{
    $("#shipping_err").html("");
    
  }



  if(flag==1){
    // console.log ("ok") ;
   }else{
     return false;
   }


   
   let myform = document.getElementById("add_taxes_form");
   let fd = new FormData(myform);
     $.ajax({
     url: base_url + "save_taxes",
     data: fd,
     cache: false,
     processData: false,
     contentType: false,
     type: 'POST',
     success: function(data){
       
      //  let getdata= JSON.parse(data);
      //  console.log(getdata);
      //  
      if (data == 1) {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Data Added Successfully!',
            timer: 2000,  
            showConfirmButton: false
        }).then(function () {
            window.location.href = base_url + 'all_taxes';
        });
    } 
    else if (data == 2) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Data already exists!',
            timer: 2000,  
            showConfirmButton: false
        });
    }
    
  
}
});


});

$('#edit_tax_btn').on('click', function() {
//   alert ("hjj");
            let a= $("#tax_name").val();
            let b= $("#tax_rate").val();
            let c= $("#country").val();
            let d= $("#state").val();
            let f= $("#city").val();
            let g= $("#tax_zip").val();
            let h= $("#shipping").val();
            let i= $("#id").val();
            
            let base_url=$("#base_url").val();
            let baseurl=$("#baseurl").val();

            console.log(i);
            
  

            let flag = 1;

  if(a==""){
    $("#tax_name_err").html("Please enter your Coupon Code!").addClass("text-danger");
      flag =0;
      

  }else{
    $("#tax_name_err").html("");
    
  }
  if(b==""){
    $("#tax_rate_err").html("Please select your Coupon type!").addClass("text-danger");
      flag =0;
      

  }else{
    $("#tax_rate_err").html("");
    
  }
  
//   if(c==""){
//     $("#country_err").html("This field is required").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#country_err").html("");
    
//   }

//   if(d==""){
//     $("#state_err").html("Please enter your Start Date!").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#state_err").html("");
    
//   }
  
//   if(f==""){
//     $("#city_err").html("Please enter your Last Date!").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#city_err").html("");
    
//   }
//   if(g==""){
//     $("#zip_err").html("Please enter your Last Date!").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#zip_err").html("");
    
//   }
  
   if(h==""){
    $("#shipping_err").html("Please enter your Last Date!").addClass("text-danger");
      flag =0;
      

  }else{
    $("#shipping_err").html("");
    
  }



  if(flag==1){
    // console.log ("ok") ;
   }else{
     return false;
   }


   
   let myform = document.getElementById("edit_taxes_form");
   let fd = new FormData(myform);
     $.ajax({
     url: "update_taxes",
     data: fd,
     cache: false,
     processData: false,
     contentType: false,
     type: 'POST',
     success: function(data){
       
      //  let getdata= JSON.parse(data);
      //  console.log(getdata);
      //  
       
      if (data == 1) {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Data Updated Successfully!',
            timer: 2000,  // Alert will close after 2 seconds
            showConfirmButton: false
        }).then(function () {
            window.location.href = base_url;
        });
    } 
    else if (data == 2) {
        // Error notification using SweetAlert2
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Data already exists!',
            showConfirmButton: true
        });
    }
 
}
});


});

$(document).on('click', '.del_taxes_type', function () 
{
  

   var taxes_ids = $(this).attr("data-id");
 
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
        // Proceed with the AJAX request
        $.ajax({
            type: 'POST',
            url: 'del_taxes',
            data: { taxes_ids: taxes_ids },
            success: function (data) {
                console.log(data);

                if (data == 1) {
                    // Show success message using SweetAlert2
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'Record deleted successfully.',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(function () {
                        // Reload the page after the alert closes
                        window.location.reload();
                    });
                }
            }
        });
    }
});

});


$('#add_setting').on('click', function () {
  // alert ("hi");

  // alert("hello");

  let title = $('#title').val()
  let email = $('#email').val()
  let phone = $('#phone').val()
  let logo = $('#formFile').val()
  let address = $('#address').val()
  let description = $('#description').val()
  // let currency = $('#currency').val().trim();
  // let currencyError = $('#currency_err');
  

  var regEx =  /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		var validEmail = regEx.test(email);

  let base_url = $('#base_url').val()

  var flag = 1;

  // const validCurrencySymbols = ['$', '€', '£', '¥', 'Fr', 'C$', 'A$', '₹', '₩', '₽', 'R$', 'R', '﷼', 'S$'];

 
  // currencyError.text('');
  
  // if (validCurrencySymbols.includes(currency)) 
  //   {
  //     currencyError.text('');
  //     currencyError.css('color', '');
  // } else 
  // {
  //     currencyError.text('Please enter a valid currency symbol.');
  //     currencyError.css('color', 'red');
  //     flag=0;
  // }
   


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

  	if (title=="") 
		{
			$('#title_err').text('Title is required').addClass("text-danger");
			flag=0;
		} 

        if (title!="") 
		{
			$('#title_err').text('');
		} 

       if (address=="") 
		{
			$('#address_err').text('Address is required').addClass("text-danger");
			flag=0;
		} 

        if (address!="") 
		{
			$('#address_err').text('');
		} 
   
        if (description=="") 
		{
			$('#description_err').text('Description is required').addClass("text-danger");
			flag=0;
		} 

        if (description!="") 
		{
			$('#description_err').text('');
		} 



//   if (email == '') {
//     $("#email_err").show();
//     $('#email_err').html('Email is required').addClass("text-danger");
    
//     flag = 0

//   } else {
//     $('#email_err').hide()

//   }

  if (phone=="") 
		{
			$('#phone_err').text('Phone is required').addClass("text-danger");
			flag=0;
		} 
	

        if (phone!="") 
		{
			$('#phone_err').text('');
		} 

    	if(phone!="" && phone.length!=10) {
		    $('#phone_err').text('Phone is required only 10 digits').addClass("text-danger");
			flag=0;
		}

        if(phone!="" && phone.length==10) {
		    $('#phone_err').text('').addClass("text-danger");
		
		}

  if (flag == 1) {

    let myform = document.getElementById('add_setting_data');
    let fd = new FormData(myform)

    //   fd.append('files',files);

    $.ajax({
      url: 'save_setting_data',
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
              text: 'Setting Updated Successfully!',
              showConfirmButton: false,
              timer: 2000
          }).then(() => {
              window.location.reload();
          });
      }

      },
    })
  }
  else {
    return false
  }
})

$(document).on('click', '.del_enquiry_type', function () 
{
  

   var enquiry_ids = $(this).attr("data-id");
 
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
                  url: 'del_enquiry',
                  data: { enquiry_ids: enquiry_ids },
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



    $(document).on('click','.remove_order',function()
    {
        var orderid = $(this).data('id'); 
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#333',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
          if (result.isConfirmed) {
              $.ajax({
                  type: 'POST',
                  url: 'rmv_order',
                  data: { orderid: orderid },
                  success: function(data) {
                      if (data == 1) {
                          Swal.fire({
                              icon: "success",
                              title: "Deleted!",
                              text: "Record deleted successfully.",
                              timer: 2000,
                              showConfirmButton: false
                          }).then(function () {
                              window.location.reload(); // Reload the page after 2 seconds
                          });
                      }
                  }
              });
          }
      });
      
    });
    
   
    
    $("#product_coupons").on('change',function()
    {
        var coupon = $(this).val();
        if(coupon=='1')
        {
            $("#catagory_coupon").show();
            $("#product_coupon").hide();
            $("#usertype_coupon").hide();
            $('#product_coupon').val('').trigger('change');
            $('#usertype_coupon').val('').trigger('change');
           
             
        }
        if(coupon=='2')
        {
            // alert('fgfgbn');
            $("#product_coupon").show();
            $("#catagory_coupon").hide();
            $("#usertype_coupon").hide();
             $('#catagory_coupon').val('').trigger('change');
            $('#usertype_coupon').val('').trigger('change');
        }
        if(coupon=='3')
        {
            $("#usertype_coupon").show();
            $("#catagory_coupon").hide();
            $("#product_coupon").hide();
               $('#product_coupon').val('').trigger('change');
            $('#catagory_coupon').val('').trigger('change');
        }
    });
    
   /* $("#save_comment").on('click',function()
    {
        var comments = $("#comments").val();
        var order_id = $("#order_id").val();
        var baseurl = $("#base_url").val();
        var flag=1;
        $(".error").remove();
        if(comments=='')
        {
            $(".comments").after('<div class="text-danger error">Please enter comments</div>');
            flag=0;
        }
        if(flag==0)
        {
            return false;
        }
        $.ajax({
            type:'POST',
            url:baseurl+'savecomments',
            data:{order_id:order_id,comments:comments},
            success:function(data)
            {
                if(data==1)
                {
                    $("#show_msg").after('<div class="text-success">Comment added successfully</div>');
                    setTimeout(function()
                    {
                        location.reload();
                    },2000);
                }
                else
                {
                    alert('something problem in add data');
                }
            }
        });
    });*/
    
     $("#search_datas").on('click',function()
    {
        // alert('dgde');
          let search_data = $('#search_data').val()
          
          let coupon_type_status = $('#coupon_type_status').val()
          let all_products = $('#all_products').val()
          let date_from_selecter = $('#date_from_selecter').val()
            let date_to_selecter = $('#date_to_selecter').val()
          let discount_on = $('#discount_on').val()
        //   alert(date_from_selecter);
         
         
          $.ajax({
                type:'POST',
                url:'search_filter_data',
                dataType: 'json',
                data:{ search_data:search_data,coupon_type_status: coupon_type_status, all_products:all_products, date_from_selecter:date_from_selecter,date_to_selecter: date_to_selecter, discount_on:discount_on },
                success: function(response) {
                  var table = $('#coupon_table').DataTable();
                  table.clear();
              
                  if (response[0] && response[0].message === "No Data Available") {
                      table.rows.add([['No Data Available', '', '', '', '', '', '', '', '']]);
                  } else {
                      var rows = response.map(item => [
                          `<div class="text-center">${item.index}</div>`,                     
                          `<div>${item.CouponName}</div>`,                                   
                          `<div>${item.ProductSpecification}</div>`,                          
                          `<div>${item.CouponCode}</div>`,                                   
                          `<div>${item.CouponType}</div>`,                                   
                          `<div>${item.CouponValue}</div>`,                                  
                          `<div>From: ${item.DateRange.From} To: ${item.DateRange.To}</div>`, 
                          `<div>${item.UserStatus}</div>`,                                   
                          `<td class="text-center text-center">
                              <div class="dropdown ">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                      <i class="bx bx-dots-vertical-rounded"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                      <a class="dropdown-item" href="${item.Actions.Edit}">
                                          <i class="bx bx-edit-alt me-1"></i> Edit
                                      </a>
                                      <a class="dropdown-item del_coupons_type" href="javascript:void(0);" data-id="${item.Actions.Delete['data-id']}">
                                          <i class="bx bx-trash me-1"></i> Delete
                                      </a>
                                  </div>
                              </div>
                          </td>`
                      ]);
                      table.rows.add(rows);
                  }
              
                  table.draw();
              }
              


            });
          
          
    });
    
    
     
    
    $("#search_dataes").on('click', function() 
    {
      let all_phone = $('#all_phone').val();
      let all_email = $('#all_email').val();
      let date_selecter = $('#date_selecter').val();
     
          $.ajax({
              type: 'POST',
              url: 'search_filter_customer_details_data',
              dataType: 'json',  
              data: {
                  all_phone: all_phone,
                  all_email: all_email,
                  date_selecter: date_selecter
              },
              success: function(response) {
                  var table = $('#example').DataTable();
                  table.clear();
                  
                  if (response[0] && response[0].message === "No Data Available") {
                      table.rows.add([['No Data Available', '', '', '', '', '']]);
                  } else {
                      var rows = response.map(item => [
                          `<div class="text-center">${item.index}</div>`,
                          `<div >${item.first_name}</div>`,
                          `<div >${item.email}</div>`,
                          `<div >${item.phone}</div>`,
                          `<div class="text-center">${item.registration_date}</div>`,
                          `<div class="dropdown text-center">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                  <a class="dropdown-item" href="${item.actions.view}"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                                  <a class="dropdown-item" href="${item.actions.edit}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                  <a class="dropdown-item del_customer" href="javascript:void(0);" data-id="${item.actions.delete}"><i class="bx bx-trash me-1"></i> Delete</a>
                              </div>
                          </div>`
                      ]);
                      table.rows.add(rows);
                  }
                  
                  table.draw();
              },
              error: function(xhr, status, error) {
                  console.error('AJAX error:', status, error);
              }
          });
      
  });
  
    
    
    //  $("#search_trans_datas").on('click',function()
    // {
    //     // alert('dgde');
    //     //   let search_trans_data = $('#search_trans_data').val()
    //        let payment_status = $('#payment_status').val()
    //     //   let coupon_type = $('#coupon_type').val()
    //       let all_trans = $('#all_trans').val()
    //       let trans_amount = $('#trans_amount').val()
    //       let date_trans_selecter = $('#date_trans_selecter').val()
    //     //   alert(all_trans);
         
        
         
          // $.ajax({
          //       type:'POST',
          //       url:'search_trans_filter_data',
          //       dataType: 'html',
          //       data:{ payment_status: payment_status, all_trans:all_trans, trans_amount:trans_amount, date_trans_selecter:date_trans_selecter },
          //       success:function(data)
          //       {
          //           $('.trans_table_data').html(data);
          //       }
          //   });
          
          
    // });

  //   $("#search_trans_datas").on('click', function() {
  //     let payment_status = $('#payment_status').val();
  //     let all_trans = $('#all_trans').val();
  //     let trans_amount = $('#trans_amount').val();
  //     let date_trans_selecter = $('#date_trans_selecter').val();
      
  //     $.ajax({
  //         type: 'POST',
  //         url: 'search_trans_filter_data',
  //         dataType: 'json',  // Expect JSON response
  //         data: {
  //             payment_status: payment_status,
  //             all_trans: all_trans,
  //             trans_amount: trans_amount,
  //             date_trans_selecter: date_trans_selecter
  //         },
  //         success: function(data) {

  //                 let table = $('#example').DataTable();
  //                 table.clear();

  //                 if (data.length > 0) {
  //                   table.rows.add(data);
  //               } else {
  //                   table.rows.add([['No Data Available', '', '', '', '', '', '', '']]);
  //               }
                
  //               table.draw();
  //           },
  //           error: function(xhr, status, error) {
  //               console.error('AJAX error:', status, error);
  //     }


              
          
  //     });
  // });

  $("#search_trans_datas").on('click', function() {
    let payment_status = $('#payment_status').val();
    let all_trans = $('#all_trans').val();
    let trans_amount = $('#trans_amount').val();
    let date_trans_selecter = $('#date_trans_selecter').val();
    $.ajax({
        type: 'POST',
        url: 'search_trans_filter_data',
        dataType: 'json',  // Expect JSON response
        data: {
            payment_status: payment_status,
            all_trans: all_trans,
            trans_amount: trans_amount,
            date_trans_selecter: date_trans_selecter
        },
        success: function(data) {
          console.log(data);
      
          // $('.trans_table_data').html(data);
      
          let table = $('#trans_table').DataTable();
          table.clear();
      
          if (data.noData) {
              // For no data, you can use empty rows with a message
              table.rows.add([['No Data Available', '', '', '', '', '', '', '']]);
          } else {
              // Convert the data to an array of arrays if necessary
              let formattedData = data.map(item => [
                  item.index, 
                  item.orderNumber, 
                  item.customerdetails, 
                  item.transationId,  
                  item.paymentType, 
                  item.amount, 
                  item.paymentStatus, 
                  item.paymentDate
              ]);
              table.rows.add(formattedData);
          }
          
          table.draw();
      },
      
      
        error: function(xhr, status, error) {
            console.error('AJAX error:', status, error);
        }
    });
});

  
    
    
    $("#search_order_datas").on('click', function() 
    {

    let order_id = $('#order_no').val();
    let order_no = $('#order_no').val();
    let order_amount = $('#order_amount').val();
    let order_status = $('#order_status').val();
    let date_order_selecter = $('#date_order_selecter').val();

    $.ajax({
      type: 'POST',
      url: 'search_order_filter_data',
      dataType: 'json',  
      data: {
          order_no: order_no,
          order_amount: order_amount,
          order_status: order_status,
          date_order_selecter: date_order_selecter
      },
      success: function(data) {
          // Assuming `data` contains an array of rows for DataTable
          let table = $('#example').DataTable();
          table.clear();
          
          if (data.length > 0) {
              table.rows.add(data);
          } else {
              table.rows.add([['No Data Available', '', '', '', '', '', '', '']]);
          }
          
          table.draw();
      },
      error: function(xhr, status, error) {
          console.error('AJAX error:', status, error);
      }
  });
  
});

    
   /* $(document).on('click',"#search_product",function()
    {
       var search_data = $("#search_data").val();
       var product_name = $("#product_name").val();
       
       $.ajax({
            type:'POST',
            url:'search_product',
            data:{search_data:search_data,product_name:product_name},
            dataType:'html',
            success:function(data)
            {
                $(".filter_data").html(data);  
            }
       });
    });*/

    $(document).on('click', '#search_product', function () {
   
        var search_data = $("#search_data").val();
        var product_name = $("#product_name").val();
   
    var url = window.location.href
   
    if (url.indexOf('all-products') > 0) 
    {
         if(search_data!='')
          {
                var laurl ='?search_data=' +search_data; 
                window.location.href = laurl;
          }
        if(product_name !='')
        {
            var nurl = '?product_name=' +product_name; 
            window.location.href = nurl;
        }
        if(search_data != '' && product_name != '')
        {
            var r_url='?search_data='+search_data+'&&product_name='+product_name;
            window.location.href = r_url;
        }
       
      
    } 
    
});

    $(document).ready(function() {
    $('.product_data').select2();
    $('#coupon_table').DataTable({
        "scrollX":true
    });
    $('#customer_table').DataTable({
        "scrollX":true
    });
    
     $('#trans_table').DataTable({
        "scrollX":true
    });
    
     $('#order_table').DataTable({
     //   "scrollX":true
    });
    //  $('#example').DataTable({
    //     "scrollX":true
    // });
});

$('#add_cms_btn').on('click', function () {
//   alert("hii");

//   var enquiry_ids = $(this).attr("data-id");

   var title=$("#title").val();
    // var editor_data = $("#description").val(); 
    //  var editor_data = CKEDITOR.instances.description.getData();  
//     var editor = CKEDITOR.instances.description;  // Replace 'editor1' with the ID of your CKEditor instance
// var content = editor.getData();
    var editor_data = CKEDITOR.instances['description'].getData();
    // alert(editor_data);
$("#editordata").val(editor_data);

    // alert
   let base_url = $('#base_url').val();
   let baseurl = $('#baseurl').val();
//   alert(baseurl);
   
//   console.log(title);
  console.log(editor_data);
//   exit;

  var flag = 1;
  
  if(title==""){
    $("#title_err").html("Please enter title!").addClass("text-danger");
      flag =0;
      

  }else{
    $("#title_err").html("");
  }
  
  if(editor_data==""){
    $("#editor_err").html("Please enter content!").addClass("text-danger");
      flag =0;
      

  }else{
    $("#editor_err").html("");
  }
  
    
   if(flag==1){
    // console.log ("ok") ;
   }else{
     return false;
   }
   
   let myform = document.getElementById("add_cms_form_data");
    let fd = new FormData(myform );
    
    //   fd.append('editordata',editor_data);
   $.ajax({
     type: 'POST',
    // url: "<?php echo base_url('admin/save_cms'); ?>",
     url: baseurl+'save_cms',
     data: fd,
     contentType: false,
     processData: false,
     success: function (data) {
       
       console.log(data);
       

//   if (data == 1) {
//         $('#msg').addClass('text-success')
//          $('#msg').html('CMS Data Added Successfully!')
//          $('#msg').removeClass('text-danger')
//          setTimeout(function () {
//                  window.location.href = 'all_cms';
//               }, 2000);
//       }
     },
   });
   
});

// $('#edit_cms_btn').on('click', function () {
// //   alert("hii");

// //   var enquiry_ids = $(this).attr("data-id");
// // var id =$(this).attr('cmsid');
//  var id=$("#cmsid").val();
// // alert(id);
//   var title=$("#title").val();
//      var editor_data = $("#description").val(); 
//   let base_url= $("#base_url").val();
// //   console.log(title);
// //   console.log(editor_data);
// //   exit;

//   var flag = 1;
  
//   if(title==""){
//     $("#title_err").html("Please enter title!").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#title_err").html("");
//   }
  
//   if(editor_data==""){
//     $("#editor_err").html("Please enter content!").addClass("text-danger");
//       flag =0;
      

//   }else{
//     $("#editor_err").html("");
//   }
  
    
//   if(flag==1){
//     // console.log ("ok") ;
//   }else{
//      return false;
//   }
   
//   $.ajax({
//      type: 'POST',
//      url: 'update_cms',
//      data: { id:id, title:title, editor_data:editor_data },
//     //  contentType: false,
//     //   processData: false,
//      success: function (data) {
       
//       console.log(data);

//   if (data == 1) {
//         $('#msg').addClass('text-success')
//          $('#msg').html('CMS Data Updated Successfully!')
//          $('#msg').removeClass('text-danger')
//          setTimeout(function () {
//                  window.location.href = base_url;
//               }, 2000);
//       }
//      },
//   });
   
// });

  $(document).on('click', '.del_cms_data', function () 
        {
          
        
           var cms_ids= $(this).attr("data-id");
         
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
                // Proceed with the AJAX request
                $.ajax({
                    type: 'POST',
                    url: 'delete_cms',
                    data: { cms_ids: cms_ids },
                    success: function (data) {
                        console.log(data);
        
                        if (data == 1) {
                            // Show success message using SweetAlert2
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'Record deleted successfully.',
                                timer: 2000,
                                showConfirmButton: false
                            }).then(function () {
                                // Reload the page after the alert closes
                                window.location.reload();
                            });
                        }
                    }
                });
            }
        });
        
        });







// main end........
});

