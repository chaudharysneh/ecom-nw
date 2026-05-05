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
          		<span class="addprobtn2">Add Shipping</span>
              <a href="<?php echo base_url(); ?>all_shipping"><span class="addprobtn">All Shipping</span></a>
              </div>
             </div>
             <form id="add_shipping"  enctype="multipart/form-data">
          <div class="content-wrapper">
            <!-- Content -->

            <div class="flex-grow-1 container-p-y">
             
              <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
              <!--<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add</span> Tags</h4>-->
              <div class="row">
                <div class="col-md-12 tag-mar">
                  <div class="card mb-4">
                    <!--<h5 class="card-header">Default</h5>-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Shipping Name</label>
                        <!--<input type="text" class="form-control" id="shipping_name" name="shipping_name"-->
                        <!--placeholder="" aria-describedby="defaultFormControlHelp">-->
                        <select class="form-control" name="shipping_name">
                        <?php 
                        if(!empty($all_shipping_methods)){
                            foreach($all_shipping_methods as $val){
                        ?> 
                        <option value='<?=$val['MethodID']?>'><?=$val['MethodName']?></option>
                        <?php } } ?>
                        </select>
                      <p class="text-danger shipping_name_err"> </p>
                      </div>
                  
                  
                  
                  
                  
                  <div class="border-label-secondary p-1 row">
                            <div class="col-lg-4">
                                  <div class=" mb-3">
                                       <label for="largeSelect" class="form-label">Country</label>
                                      <select class="form-select" aria-label="Default select example" name="country" id="country">
                              <option value="">Country</option>
                              <?php 
                            //   print_r($data); die;
                              foreach($country as $key=>$value){
                                //   print_r($value);
                              
                              ?>
                              <option value="<?php echo $value['CountryID'] ?>"><?php echo $value['CountryName'] ?></option>
                              <?php  } ?>
                              
                            </select>
                            <span class="text-danger" id="country_err"></span>
                                    </div>
                            </div>
                               <div class="col-lg-4">
                                  <div class=" mb-3">
                                       <label for="largeSelect" class="form-label">State</label>
                                        <select class="form-select" aria-label="Default select example" name="state" id="state">
                              <option value="">State</option>
                              
                            </select>
                            <span class="text-danger" id="state_err"></span>
                                    </div>
                            </div>
                             <div class="col-lg-4">
                                  <div class=" mb-3">
                                       <label for="largeSelect" class="form-label">City</label>
                                       <select class="form-select" aria-label="Default select example" name="city" id="city">
                              <option value="">City</option>
                              <!--<option value="India">India</option>-->
                              <!--<option value="Nepal">Nepal</option>-->
                              <!--<option value="Bhutan">Bhutan</option>-->
                              <!--<option value="Pakistan">Pakistan</option>-->
                            </select>
                            <span class="text-danger" id="city_err"></span>
                                    </div>
                            </div>
                            <div class='row text-muted text-end small'>
                                <span>This is just for reference to get zipcode/postal code</span>
                            </div>
                            </div>
                  
                  
                  
                  
                        <label for="defaultFormControlInput" class="form-label">Zone</label>
                        <div class="mb-3">
                        <!--<input type="text" class="form-control" id="zone_name" name="zone_name" placeholder="" aria-describedby="defaultFormControlHelp">-->
                        <select class="form-select" id="zone_name" name="zone_name[]" multiple="multiple">
                        </select>
                      <p class="text-danger zone_name_err"> </p>
                      </div>
                      
                      

                       <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Rate</label>
                        <input type="number" class="form-control" id="shipping_rate" name="shipping_rate" placeholder="" aria-describedby="defaultFormControlHelp">
                      <p class="text-danger shipping_rate_err"> </p>
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function () {
    
    $('#zone_name').select2({
        tags: true,
        placeholder: 'Select Zone'
    });
    
    // var country = 'India';

    // // Replace 'YOUR_API_KEY' with your actual OpenCage Data API key
    // const apiKey = '58e5ddbe8ba34a3da862fcabf3271ed8';
    
    // // Example: Geocoding request for a country
    // const countryName = 'United States';

    // // Construct the API URL
    // const apiUrl = `https://api.opencagedata.com/geocode/v1/json?key=${apiKey}&q=${countryName}`;

    // // Make the API request
    // $.get(apiUrl, function (data) {
    //   // Handle the response data
    //   console.log(data);

    //   // Assuming the first result corresponds to the country
    //   const countryResult = data.results[0];

    //   // Use the country information to fetch additional data from another source
    //   const countryCode = countryResult.components.country_code;
    // });
    
    
    
// var city = 'Surat, Gujarat, India';

// $.ajax({
//   url: 'https://api.opencagedata.com/geocode/v1/json',
//   method: 'GET',
//   data: {
//     q: city,
//     key: '58e5ddbe8ba34a3da862fcabf3271ed8'
//   },
//   success: function(response) {
//     if (response.results.length > 0) {
//       $.each(response.results, function(index, result) {
//         var location = result.geometry;

//         // Use OpenStreetMap Nominatim to get postal code from coordinates
//         $.ajax({
//           url: 'https://nominatim.openstreetmap.org/reverse',
//           method: 'GET',
//           data: {
//             lat: location.lat,
//             lon: location.lng,
//             format: 'json',
//             addressdetails: 1
//           },
//           success: function(response) {
//             if (response.address && response.address.postcode) {
//               console.log('Postal Code:', response.address.postcode);
//             } else {
//               console.log('Postal Code not found for the specified coordinates.');
//             }
//           },
//           error: function(error) {
//             console.error('Error:', error);
//           }
//         });
//       });
//     } else {
//       console.log('No results found for the specified city.');
//     }
//   },
//   error: function(error) {
//     console.error('Error:', error);
//   }
// });


    });
    
    
    $(document).on('change','#city',function(){
        var selectedValue = $('#zone_name').val();
        console.log(selectedValue);
        $('#zone_name').val([]);
        // Clear the options without affecting the selected value
        // $('#zone_name').empty().select2({
        //   data: null
        // });
        var city1 = $('#city :selected').text();
        var state = $('#state :selected').text();
        var country = $('#country :selected').text();
        var zipcode = [];
        var city = city1+', '+state+', '+country;
        $.ajax({
          url: 'https://api.opencagedata.com/geocode/v1/json',
          method: 'GET',
          async: false,
          data: {
            q: city,
            key: '58e5ddbe8ba34a3da862fcabf3271ed8'
          },
          success: function(response) {
            if (response.results.length > 0) {
                
              $.each(response.results, function(index, result) {
                var location = result.geometry;
        
                // Use OpenStreetMap Nominatim to get postal code from coordinates
                $.ajax({
                  url: 'https://nominatim.openstreetmap.org/reverse',
                  method: 'GET',
                  async: false,
                  data: {
                    lat: location.lat,
                    lon: location.lng,
                    format: 'json',
                    addressdetails: 1
                  },
                  success: function(response) {
                    if (response.address && response.address.postcode) {
                    //   console.log('Postal Code:', response.address.postcode);
                      if ($.inArray(response.address.postcode, zipcode) !== -1) {
                      }else{
                        zipcode.push(response.address.postcode);
                      }
                    } else {
                      
                    }
                  },
                  error: function(error) {
                    console.error('Error:', error);
                  }
                });
              });
            } else {
              console.log('No results found for the specified city.');
            }
          },
          error: function(error) {
            console.error('Error:', error);
            
            
          }
        });
        
        if(zipcode.length > 0){
            var html = "";
            var newOptions = [];
            $.each(zipcode, function(index, result) {
                // html += "<option value='"+result+"'>"+result+"</option>";
                  newOptions.push({ id: result, text: result })
                
            });
            console.log(selectedValue);
                $('#zone_name').select2({
                  data: newOptions
                });
            $('#zone_name').val(selectedValue).trigger('change');
            // $('#zone_name').html(html);
        }
        
    })
    

     $('#add_shipping_data').on('click', function () {
         
          let shipping_name = $('#shipping_name').val();
          let zone_name = $('#zone_name').val();
          let shipping_rate = $('#shipping_rate').val();
          let country = $('#country').val();
          let state = $('#state').val();
          let city = $('#city').val();
          let base_url = $('#base_url').val();

          
  
  
      
          var flag = 1

          if (country == '') {
            $("#country_err").show();
            $('#country_err').html('Country is required')
            flag = 0
           
          } else {
             $('#country_err').hide()
          
          }
          if (state == '') {
            $("#state_err").show();
            $('#state_err').html('State is required')
            flag = 0
           
          } else {
             $('#state_err').hide()
          
          }
          if (city == '') {
            $("#city_err").show();
            $('#city_err').html('City is required')
            flag = 0
           
          } else {
             $('#city_err').hide()
          
          }
      
          if (shipping_name == '') {
            $(".shipping_name_err").show();
            $('.shipping_name_err').html('Shipping name is required')
            flag = 0
           
          } else {
             $('.shipping_name_err').hide()
          
          }
          if (zone_name == '') {
            $(".zone_name_err").show();
            $('.zone_name_err').html('Zone name is required')
            flag = 0
           
          } else {
             $('.zone_name_err').hide()
          
          }
          if (shipping_rate == '') {
            $(".shipping_rate_err").show();
            $('.shipping_rate_err').html('Shipping rate is required')
            flag = 0
           
          } else {
             $('.shipping_rate_err').hide()
          
          }
  
          if (flag == 1) {
          
              let add_shipping_data = document.getElementById('add_shipping');
              let fd = new FormData(add_shipping_data)
  
          //   fd.append('files',files);
         
            $.ajax({
              url: 'save_shipping',
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
                        text: 'Shipping Added Successfully!',
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        // Redirect to the all shipping page after 2 seconds
                        window.location.href = base_url + 'all_shipping';
                    });
                } else if (data == 2) {
                    // Show error message for existing zipcode
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Zipcode is Already Exist for this shipping method!',
                        showConfirmButton: true
                    });
                } else if (data == 3) {
                    // Show error message for multiple existing zipcodes
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Zipcodes are Already Exist!',
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
      
        
//         $(document).on('change','#country1', function() {
//   var countryid = $(this).val();
//   var base = $('#base_url').val();
// //   console.log(countryid);
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
//       // if(data==1){
//       // 	$("#profile_pic_err").text("");
//       // 	$("#successmsg").text('Profile updated successfully...').addClass("text-success");
        
//       // 	setTimeout(function () {
//       // 		location.href='profile';
//       // 	}, 2000);
//       // }
//       // else if(data==2){
//       // 	$("#profile_pic_err").text('Please upload only jpg,jpeg,png and gif file.').addClass("text-danger");
//       // }
//       // else if(data==0){
//       // 	alert("Profile cannot be updated");
//       // }
      
//   }
// });
// });
</script>