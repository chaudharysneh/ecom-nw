
var base_url = $("#base_url").val();

  
$(document).ready(function () {
    $('#search_cat').niceSelect();
    $("ul .sub-category li").first('a').remove();
  $('.pagination').addClass('product-pagination')
  $('ul.pagination li').addClass('page-item')
  $('ul.pagination li.page-item a').addClass('page-link')
  
  function getVals() {
    // Get slider values
    let parent = this.parentNode
    let slides = parent.getElementsByTagName('input')
    let slide1 = parseFloat(slides[0].value)
    let slide2 = parseFloat(slides[1].value)
 
    // Neither slider will clip the other, so make sure we determine which is larger
    if (slide1 > slide2) {
      let tmp = slide2
      slide2 = slide1
      slide1 = tmp
    }

    let displayElement = parent.getElementsByClassName('rangeValues')[0]
    // displayElement.innerHTML = currency + slide1 + ' - ' currency + slide2
    displayElement.innerHTML = currency + slide1 + ' - ' + currency + slide2;
    $('#hidden_minimum_price').val(slide1);
    $('#hidden_maximum_price').val(slide2);
  }
  
  function getVals1() {
    // Get slider values
    let parent = this.parentNode;
    let slides = parent.getElementsByTagName('input');
    let slide1 = parseFloat(slides[0].value);
    let slide2 = parseFloat(slides[1].value);
    // Neither slider will clip the other, so make sure we determine which is larger
    if (slide1 > slide2) {
      let tmp = slide2
      slide2 = slide1
      slide1 = tmp
    }

    let displayElement = parent.getElementsByClassName('rangeValues1')[0];
    displayElement.innerHTML = currency + slide1 + ' - ' + currency + slide2;
    $('#hidden_minimum_price').val(slide1);
    $('#hidden_maximum_price').val(slide2);
  }
  
  function getVals2() {
    // Get slider values
    let parent = this.parentNode
    let slides = parent.getElementsByTagName('input')
    let slide1 = parseFloat(slides[0].value)
    let slide2 = parseFloat(slides[1].value)
    // Neither slider will clip the other, so make sure we determine which is larger
    if (slide1 > slide2) {
      let tmp = slide2
      slide2 = slide1
      slide1 = tmp
    }

    let displayElement = parent.getElementsByClassName('rangeValues2')[0]
    displayElement.innerHTML = currency + slide1 + ' - ' + currency + slide2
    $('#hidden_minimum_price').val(slide1)
    $('#hidden_maximum_price').val(slide2)
  }

  window.onload = function () {
    // Initialize Sliders
    let sliderSections = document.getElementsByClassName('range-slider')
    for (let x = 0; x < sliderSections.length; x++) {
      let sliders = sliderSections[x].getElementsByTagName('input')
      for (let y = 0; y < sliders.length; y++) {
        if (sliders[y].name === 'range') {
          sliders[y].oninput = getVals
          // Manually trigger event first time to display values
          sliders[y].oninput()
        }
      }
    }
    
    let sliderSections1 = document.getElementsByClassName('range-slider1')
    for (let x = 0; x < sliderSections1.length; x++) {
      let sliders = sliderSections1[x].getElementsByTagName('input')
      for (let y = 0; y < sliders.length; y++) {
        if (sliders[y].name === 'range') {
          sliders[y].oninput = getVals1
          // Manually trigger event first time to display values
          sliders[y].oninput()
        }
      }
    }
    
    let sliderSections2 = document.getElementsByClassName('range-slider2')
    for (let x = 0; x < sliderSections2.length; x++) {
      let sliders = sliderSections2[x].getElementsByTagName('input')
      for (let y = 0; y < sliders.length; y++) {
        if (sliders[y].name === 'range') {
          sliders[y].oninput = getVals2
          // Manually trigger event first time to display values
          sliders[y].oninput()
        }
      }
    }
  }
  
})

function validateEmail(email) {
    var re =
      /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }
$(document).ready(function() 
{


var regEx =  /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
$('.add_comment_data').on('click', function () {
   
    
    var name =$("#name").val();
    var email =  $('#email').val(); 
     var message =  $('#message').val(); 
     var validEmail = regEx.test(email);
    var baseurl = $("#baseurl").val();
   
 flag=0;
 
 if(email==''){
         $('#email_err').text('Email is required').addClass("text-danger");
        flag=1;
      }else{
        $('#email_err').text('');
      }

   
      if (email!='' && !validEmail) 
      {
        $('#email_err').text('Please enter valid email').addClass("text-danger");
        flag=1;
      }        
      if (email!='' && validEmail) 
      {
        $('#email_err').text('');
      }
      
     
    if(name==''){
      $('#name_err').text('Name is required.').addClass("text-danger");
      flag=1;
    }else{
      $('#name_err').text('');
    }


    
    if(message==''){
      $('#message_err').text('Message is required').addClass("text-danger");
      flag=1;
    }else{
      $('#message_err').text('');
    }
  
    if(flag==0){   
      var vanueForm = document.getElementById("add_comment");
      var fd = new FormData(vanueForm);
    
    $.ajax({
        type: 'POST',
        url: baseurl + 'send_comment_data',
        data: fd,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response == 1) {
                $("#msg2").removeClass("text-danger");
                $("#msg2").text('Comment Posted Successfully!').addClass("text-success");

                // Uncomment the following lines if you want to reload the page after a successful response
                setTimeout(function () {
                    location.reload();
                }, 2000);
            }
        },
        // Add error handling
        error: function (jqXHR, textStatus, errorThrown) {
            // Handle errors here
            console.log(textStatus, errorThrown);
            $("#msg2").removeClass("text-success");
            $("#msg2").text('Error sending email. Please try again.').addClass("text-danger");
        }
    });
    }
   
});

$('.send_email_data').on('click', function (e) {
    e.preventDefault();

    let myform = document.getElementById("add_subscribe");

    // Check form validity
    if (!myform.checkValidity()) {
        $("#msg").removeClass("text-success");
        $("#msg").text('Email is required!').addClass("text-danger");
        return;
    }

    var email = $('#send_email').val();
    var base_url = $('#baseurl').val();

    let fd = new FormData(myform);
    fd.set('email', email);

    $.ajax({
        type: 'POST',
        url: base_url + 'send_email_data',
        data: fd,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response == 1) {
                $("#msg").removeClass("text-danger");
                $("#msg").text('Check your email...').addClass("text-success");

                // Uncomment the following lines if you want to reload the page after a successful response
                setTimeout(function () {
                    location.reload();
                }, 2000);
            }
        },
        // Add error handling
        error: function (jqXHR, textStatus, errorThrown) {
            // Handle errors here
            console.log(textStatus, errorThrown);
            $("#msg").removeClass("text-success");
            $("#msg").text('Error sending email. Please try again.').addClass("text-danger");
        }
    });
});

  

  $('.common_selector').click(function () {
    filter_data()
  })
  function get_filter(class_name) {
    var filter = []
    $('.' + class_name + ':checked').each(function () {
      filter.push($(this).val())
    })

    return filter
  }
  function filter_data() {
    var minimum_price = $('#hidden_minimum_price').val()
    var maximum_price = $('#hidden_maximum_price').val()
    
    var sort =  $('.price_change').val()
    var url = window.location.href
    if (url.indexOf('product') > 0) 
    {
        if(minimum_price != '' && maximum_price != '' && sort != '') 
        {
            var neurl =
              '?minimum_price=' +
              window.btoa(minimum_price) +
              '&&maximum_price=' +
              window.btoa(maximum_price) +
              '&&sort='+
              window.btoa(sort)
            window.location.href = neurl
        }
        else if (minimum_price != '' && maximum_price != '') 
        {
        var nurl =
          '?minimum_price=' +
          window.btoa(minimum_price) +
          '&&maximum_price=' +
          window.btoa(maximum_price) 
          
        window.location.href = nurl
        }
        else if (sort != '') 
        {
            var n_url1 = '?sort=' +window.btoa(sort)
            window.location.href = n_url1
        }
        else
        {
        var nu_rl =
          '?minimum_price=' + window.btoa(minimum_price) + '&&maximum_price=' + window.btoa(maximum_price)
        window.location.href = nu_rl
        }
    } 
    else 
    {
        if(minimum_price != '' && maximum_price != '' && sort != '') {
        var nwurl =
          '?minimum_price=' +
          window.btoa(minimum_price) +
          '&&maximum_price=' +
          window.btoa(maximum_price) +
          '&&sort='+
          window.btoa(sort)
        window.location.href = nwurl
      }
      else if (minimum_price != '' && maximum_price != '') {
        var new_url =
          url +
          '?minimum_price=' +
          window.btoa(minimum_price) +
          '&&maximum_price=' +
          window.btoa(maximum_price) 
        window.location.href = new_url
      } 
       else if (minimum_price != '' && maximum_price != '' && sort != '') {
        var nurl3 =
          '?minimum_price=' +
          window.btoa(minimum_price) +
          '&&maximum_price=' +
          window.btoa(maximum_price) +
          '&&sort=' +
          window.btoa(sort)
        window.location.href = nurl3
      }
      else if (sort != '') 
      {
        var n_url2 = '?sort=' +window.btoa(sort)
        window.location.href = n_url2
      }
       else {
        var nw_url =
          url +
          '?minimum_price=' +
          window.btoa(minimum_price) +
          '&&maximum_price=' +
          window.btoa(maximum_price)
        window.location.href = nw_url
      }
    }
  }
  
  
  $(function () {
  // Check if the slider values are stored in local storage
  if (localStorage.getItem('minimum_price') && localStorage.getItem('maximum_price')) {
    var minPrice = parseFloat(localStorage.getItem('minimum_price'));
    var maxPrice = parseFloat(localStorage.getItem('maximum_price'));
  } else {
    var minPrice = 0; // Default minimum price
    var maxPrice = 50000; // Default maximum price
  }
  
  if (localStorage.getItem('min_price') && localStorage.getItem('max_price')) {
    var minprice = parseFloat(localStorage.getItem('min_price'));
    var maxprice = parseFloat(localStorage.getItem('max_price'));
  } else {
    var minprice = 0; // Default minimum price
    var maxprice = 50000; // Default maximum price
  }
  
  $('.range-slider').slider({
    range: true,
    min: 0,
    max: 50000,
    values: [minPrice, maxPrice],
    step: 500,
    stop: function (event, ui) {
      $('.rangeValues').html(currency + ui.values[0] + ' - ' + currency + ui.values[1])
      console.log(ui.values[0])
      console.log(ui.values[1])
      $('#hidden_minimum_price').val(ui.values[0])
      $('#hidden_maximum_price').val(ui.values[1])
      
      localStorage.setItem('minimum_price', ui.values[0]);
      localStorage.setItem('maximum_price', ui.values[1]);
      
      setTimeout(function()
      {
        filter_data()    
      },1500);
      
    },
    slide: function (event, ui) {
        if (ui.handleIndex === 0) 
        {
            // Left handle moved
            if (ui.values[0] >= ui.values[1]) 
            {
                ui.values[0] = ui.values[1] - 500;
                // Prevent the left handle from going beyond the right handle
            }
        } 
        else 
        {
            // Right handle moved
            if (ui.values[1] <= ui.values[0]) 
            {
                ui.values[1] = ui.values[0] + 500;
                // Prevent the right handle from going beyond the left handle
            }
        }
        
        // Update the UI
        $('.rangeValues').html(currency + ui.values[0] + ' - ' + currency + ui.values[1]);
        $('#hidden_minimum_price').val(ui.values[0]);
        $('#hidden_maximum_price').val(ui.values[1]);
        //$('#hidden_maximum_price').val(ui.values[1]);
    }
  })
   $('.rangeValues').html(currency + minPrice + ' - ' + currency + maxPrice);
  $('#hidden_minimum_price').val(minPrice);
  $('#hidden_maximum_price').val(maxPrice);
  
  $('.range-slider1').slider({
    range: true,
    min: 0,
    max: 50000,
    values: [minprice, maxprice],
    step: 500,
    stop: function (event, ui) {
      $('.rangeValues1').html(currency + ui.values[0] + ' - ' + currency + ui.values[1])
      localStorage.setItem('min_price', ui.values[0]);
      localStorage.setItem('max_price', ui.values[1]);
      $('#hidden_minimum_price').val(ui.values[0])
      $('#hidden_maximum_price').val(ui.values[1])
       setTimeout(function()
      {
        filter_cat_data()
      },1500);
    },
    slide: function (event, ui) {
        if (ui.handleIndex === 0) 
        {
            // Left handle moved
            if (ui.values[0] >= ui.values[1]) 
            {
                ui.values[0] = ui.values[1] - 500;
                // Prevent the left handle from going beyond the right handle
            }
        } 
        else 
        {
            // Right handle moved
            if (ui.values[1] <= ui.values[0]) 
            {
                ui.values[1] = ui.values[0] + 500;
                // Prevent the right handle from going beyond the left handle
            }
        }
        
        // Update the UI
        $('.rangeValues1').html(currency + ui.values[0] + ' - ' + currency + ui.values[1]);
        $('#hidden_minimum_price').val(minprice);
        $('#hidden_maximum_price').val(maxprice);
        //$('#hidden_maximum_price').val(ui.values[1]);
    }
  })
  
    $('.range-slider2').slider({
    range: true,
    min: 0,
    max: 50000,
    values: [minprice, maxprice],
    step: 500,
    stop: function (event, ui) {
      $('.rangeValues2').html(currency + ui.values[0] + ' - ' + currency + ui.values[1])
      localStorage.setItem('min_price', ui.values[0]);
      localStorage.setItem('max_price', ui.values[1]);
      $('#hidden_minimum_price').val(ui.values[0])
      $('#hidden_maximum_price').val(ui.values[1])
       setTimeout(function()
      {
        filter_subcat_data()
      },1500);
    },
    slide: function (event, ui) {
        if (ui.handleIndex === 0) 
        {
            // Left handle moved
            if (ui.values[0] >= ui.values[1]) 
            {
                ui.values[0] = ui.values[1] - 500;
                // Prevent the left handle from going beyond the right handle
            }
        } 
        else 
        {
            // Right handle moved
            if (ui.values[1] <= ui.values[0]) 
            {
                ui.values[1] = ui.values[0] + 500;
                // Prevent the right handle from going beyond the left handle
            }
        }
        
        // Update the UI
        $('.rangeValues2').html(currency + ui.values[0] + ' - ' + currency + ui.values[1]);
        $('#hidden_minimum_price').val(minprice);
        $('#hidden_maximum_price').val(maxprice);
        //$('#hidden_maximum_price').val(ui.values[1]);
    }
  })
  $('.rangeValues2').html(currency + minprice + ' - ' + currency + maxprice);
  $('#hidden_minimum_price').val(minprice);
  $('#hidden_maximum_price').val(maxprice);
  
});
  
  $(document).on('change', '.price_change', function () {
   
    var sort = $('.price_change').val()
    var minimum_price = $('#hidden_minimum_price').val()
    var maximum_price = $('#hidden_maximum_price').val()
   
    var url = window.location.href
   
    if (url.indexOf('product') > 0) 
    {
        if(minimum_price != '' && maximum_price != '')
        {
            var r_url='?minimum_price='+window.btoa(minimum_price)+'&&maximum_price='+window.btoa(maximum_price)
            window.location.href = r_url
        }
        if(minimum_price != '' && maximum_price != '' && sort != '')
          {
              var laurl =
              '?minimum_price=' +
              window.btoa(minimum_price) +
              '&&maximum_price=' +
              window.btoa(maximum_price) +
              '&&sort='+
              window.btoa(sort)
            window.location.href = laurl
          }
        if(minimum_price != '' && maximum_price != '' && sort != '') {
        var nurl =
          '?minimum_price=' +
          window.btoa(minimum_price) +
          '&&maximum_price=' +
          window.btoa(maximum_price) +
          '&&sort='+
          window.btoa(sort)
        window.location.href = nurl
      }
      else if(minimum_price != '' && maximum_price != '')
      {
          var url2 = '?minimum_price=' +
          window.btoa(minimum_price) +
          '&&maximum_price=' +
          window.btoa(maximum_price) 
          
        window.location.href = url2
      }
      
    } 
    
})

 
    $(".cat_sort").on('change',function()
    {
        var min_price=$("#hidden_minimum_price").val();
        var max_price=$("#hidden_maximum_price").val();
        var sort = $(".cat_sort").val();
        var url = window.location.href;
        var id = url.substring(url.lastIndexOf('/') + 1);
        var newurl=url.replace(id,'');
     
        if(newurl.indexOf('category') > 0)
        {
           
            if(min_price!='' && max_price!='')
            {
                var r_url='?min_price='+window.btoa(min_price)+'&&max_price='+window.btoa(max_price)
                window.location.href = r_url
            }
             
             if(sort!='')
            {
                var newurl='?sort='+window.btoa(sort)
                window.location.href=newurl
            }
           
             if(sort!='' && min_price!='' && max_price!='')
            {
                 var surl='?sort='+window.btoa(sort)+'&&min_price='+window.btoa(min_price)+'&&max_price='+window.btoa(max_price)
                 window.location.href=surl
            }
        }
    });
    
    $(".subcat_sort").on('change',function()
    {
        var min_price=$("#hidden_minimum_price").val();
        var max_price=$("#hidden_maximum_price").val();
        var sort = $(".subcat_sort").val();
        var url = window.location.href;
        var id = url.substring(url.lastIndexOf('/') + 1);
        var newurl=url.replace(id,'');
        
        if(newurl.indexOf('subcategory') > 0)
        {
            if(min_price!='' && max_price!='')
            {
                var r_url='?min_price='+window.btoa(min_price)+'&&max_price='+window.btoa(max_price)
                window.location.href = r_url
            }
             
             if(sort!='')
            {
                var newurl='?sort='+window.btoa(sort)
                window.location.href=newurl
            }
           
             if(sort!='' && min_price!='' && max_price!='')
            {
                 var surl='?sort='+window.btoa(sort)+'&&min_price='+window.btoa(min_price)+'&&max_price='+window.btoa(max_price)
                 window.location.href=surl
            }
        }
    });
    
     
  
  function get_cat_filter(class_name) {
    var filter = []
    $('.' + class_name + ':checked').each(function () {
      filter.push($(this).val())
    })

    return filter
  }
  function filter_cat_data()
  {
      var min_price=$("#hidden_minimum_price").val();
      var max_price=$("#hidden_maximum_price").val();
      var sort = $(".cat_sort").val();
      var url = window.location.href;
      var id = url.substring(url.lastIndexOf('/') + 1);
      var newurl=url.replace(id,'');
      
        if(sort!='')
        {
            var nurl='?sort='+window.btoa(sort)
            window.location.href = nurl
        }
         if(min_price!='' && max_price!='')
        {
            var r_url='?min_price='+window.btoa(min_price)+'&&max_price='+window.btoa(max_price)
            window.location.href = r_url
        }
        
         if(sort!='' && min_price!='' && max_price!='')
        {
            var newurl='?sort='+window.btoa(sort)+'&&min_price='+window.btoa(min_price)+'&&max_price='+window.btoa(max_price)
            window.location.href=newurl
        }
        
         if(sort!='' && min_price!='' && max_price!='')
         {
             var surl='?sort='+window.btoa(sort)+'&&min_price='+window.btoa(min_price)+'&&max_price='+window.btoa(max_price)
             window.location.href=surl
         }
         
  }
  
    function filter_subcat_data()
    {
        var min_price=$("#hidden_minimum_price").val();
      var max_price=$("#hidden_maximum_price").val();
      var sort = $(".subcat_sort").val();
      var url = window.location.href;
      var id = url.substring(url.lastIndexOf('/') + 1);
      var newurl=url.replace(id,'');
      
        if(sort!='')
        {
            var nurl='?sort='+window.btoa(sort)
            window.location.href = nurl
        }
         if(min_price!='' && max_price!='')
        {
            var r_url='?min_price='+window.btoa(min_price)+'&&max_price='+window.btoa(max_price)
            window.location.href = r_url
        }
        
         if(sort!='' && min_price!='' && max_price!='')
        {
            var newurl='?sort='+window.btoa(sort)+'&&min_price='+window.btoa(min_price)+'&&max_price='+window.btoa(max_price)
            window.location.href=newurl
        }
        
        if(sort!='' && min_price!='' && max_price!='')
        {
            var surl='?sort='+window.btoa(sort)+'&&min_price='+window.btoa(min_price)+'&&max_price='+window.btoa(max_price)
            window.location.href=surl
        }    
    }
    
    $('.common_selector1').click(function(){
         var min_price=$("#hidden_minimum_price").val();
        var max_price=$("#hidden_maximum_price").val();
        var sort = $(".cat_sort").val();
        var url = window.location.href;
        var id = url.substring(url.lastIndexOf('/') + 1);
        var newurl=url.replace(id,'');
     
        if(newurl.indexOf('category') > 0)
        {
           
            if(min_price!='' && max_price!='')
            {
                var r_url='?min_price='+window.btoa(min_price)+'&&max_price='+window.btoa(max_price)
                window.location.href = r_url
            }
             
             if(min_price!='' && max_price!='' && sort!='')
            {
                var newurl='?sort='+window.btoa(sort)+'&&min_price='+window.btoa(min_price)+'&&max_price='+window.btoa(max_price)
                window.location.href=newurl
            }
             if(min_price!='' && max_price!='')
            {
                var nwurl='?min_price='+window.btoa(min_price)+'&&max_price='+window.btoa(max_price)
                window.location.href=nwurl
            }
             if(sort!='' && min_price!='' && max_price!='')
            {
                 var surl='?sort='+window.btoa(sort)+'&&min_price='+window.btoa(min_price)+'&&max_price='+window.btoa(max_price)
                 window.location.href=surl
            }
        }
    });
        
		$('.active-slider').owlCarousel({
			items: 1,
			loop: true,
			nav: true,
            animateOut: 'fadeOut',
            autoplay: true,
			navText: ['<h1> < </h1>', '<h1> > </h1>']
		});

       
   
        $("#country").on('change',function()
        {
            var country = $(this).val();
           $.ajax({
                url:'getcountrystate',
                type: "POST",
                data: {country:country},
                dataType:'html',
                success: function(data)
                {
                    $('#state').html(data);
                }
            });
        });
        
        $("#state").on('change',function()
        {
           var state = $("#state").val();
           $.ajax({
               url:'getstatecity',
               type:'POST',
               data:{state:state},
               dataType:'html',
               success:function(data)
               {
                   $("#city").html(data);
               }
               
               
           })
        });
        
        $("#register").on('click',function()
        {
             var firstName = $("#firstName").val();
             var lastName = $("#lastName").val();
             var password = $("#password").val();
             var confpass = $("#confpass").val();
             var emailAddress = $("#emailAddress").val();
             var phoneNumber = $("#phoneNumber").val();
             var dob = $("#dob").val();
             var profile_pic = $("#profile_pic").prop('files');
             var address1 = $("#address1").val();
             var address2 = $("#address2").val();
             var country = $("#country").val();
             var state = $("#state").val();
             var city = $("#city").val();
             var postcode = $("#postcode").val();
             var regEx =  /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		     var validEmail = regEx.test(emailAddress);
             
             var flag=1;
             
             $(".error").remove();
             
             if(firstName=='')
             {
                $(".firstName").after('<div class="error text-danger">Please enter first name</div>');
                 flag=0;
             }
             if(lastName=='')
             {
                $(".lastName").after('<div class="error text-danger">Please enter last name</div>');
                 flag=0;
             }
             if(password=='')
             {
                $(".password").after('<div class="error text-danger">Please enter password</div>');
                 flag=0;
             }
             if(confpass=='')
             {
                $(".confpass").after('<div class="error text-danger">Please enter confirm password</div>');
                 flag=0;
             }
             else if(password!==confpass)
             {
                $(".confpass").after('<div class="error text-danger">password & confirm password not match</div>');
                 flag=0; 
             }
             if(emailAddress=='')
             {
                $(".emailAddress").after('<div class="error text-danger">Please enter email address</div>');
                 flag=0; 
             }
             else if (emailAddress!='' && !validEmail) 
    	     {
    			$('.emailAddress').after('<div class="error text-danger">Please enter a valid email address</div>');
    			flag=0;
	         }
             if(phoneNumber=="")
             {
                $(".phoneNumber").after('<div class="error text-danger">Please enter phone number</div>');
                 flag=0; 
             }
             
             if(flag==0)
             {
                 return false;
             }
             var formElem = $("#registerdt");
             var formdata = new FormData(formElem[0]);
             formdata.append('profile_pic',profile_pic);
             $.ajax({
                 type:'POST',
                 url:'save_register',
                 data:formdata,
                 cache:false,
                 contentType:false,
                 processData:false,
                 dataType:'json',
                 success:function(data)
                 {
                    if(data==1)
                    {
                        $(".emailarr").remove();
                        $(".dis_msg").append('<div class="text-success savedt">User created successfully</div>');
                        setTimeout(function()
                        {
                           window.location.href='/'; 
                        },1500);
                    }
                    else 
                    {
                        $(".savedt").remove();
                        $(".dis_msg").append('<div class="text-danger emailarr error">Email already exist!</div>');
                    }
                 }
             });

        });
        
        $("#contactbtn").on('click',function()
        {
            var fullname = $("#fullname").val();
            var subject = $("#subject").val();
            var email = $("#emailid").val();
            var phoneno = $("#phoneno").val();
            var message = $("#message").val();
            var regEx =  /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		    var validEmail = regEx.test(email);
		     
            var flag=1;
            $(".error").remove();
            
            if(fullname=='')
            {
                $(".fullname").after('<div class="error text-danger">Please enter fullname.</div>');
                flag=0;
            }
            if(subject=='')
            {
                 $(".subject").after('<div class="error text-danger">Please enter subject.</div>');
                flag=0;
            }
            if(email=='')
            {
                $(".emailid").after('<div class="error text-danger">Please enter email address.</div>');
                flag=0;
            }
            else if(!validEmail)
            {
                $(".emailid").after('<div class="error text-danger">Please enter valid email address</div>');
                 flag=0; 
            }
            if(phoneno=='')
            {
                $(".phoneno").after('<div class="error phoneerr text-danger">Please enter phone no.</div>');
                flag=0;
            }
            else if ($("#phoneno").val().length != 10) 
            {
                $('.phoneno').after('<div class="error phoneerr text-danger">* Please enter 10 digits phone no.</div>');
                flag = 0
            }
           
            if(message=='')
            {
                $(".message").after('<div class="error text-danger">Please enter message.</div>');
                flag=0;
            }
            if(flag==0)
            {
                return false;
            }
            $.ajax({
                type:'POST',
                url:'savecontact',
                data:{fullname:fullname,subject:subject,email:email,phoneno:phoneno,message:message},
                dataType:'json',
                success:function(data)
                {
                    if(data==1)
                    {
                        $(".dis_msg").after('<div class="text-success">Contact data saved successfully</div>');
                        setTimeout(function()
                        {
                            window.location.reload();
                        },1500);
                    }
                    else if(data==0)
                    {
                        $(".dis_msg").after('<div class="text-danger emailarr error">Email already exist!</div>');
                    }
                }
            });
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
			   $('#new_password_err').text('New Password is required').addClass("text-danger");
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
							url: "changed_password",
							method: "POST",
							data: {
								current_password: current_password,
								new_password: new_password,
								confirm_password:confirm_password
							},
							success: function(data){
								
								if(data==1){
									
									$("#success_msg").text('Password Changed Successfully...').addClass("text-success");
									
									setTimeout(function () {
										location.reload();
									}, 2000);
								}
								else if(data==2){
									$("#confirm_password_err").text('Confirm password not matched with new password').addClass("text-danger");
								}
								else if(data==3){
									$("#current_password_err").text('Current password is invalid').addClass("text-danger");
								}
								else if(data==0){
									alert('Password cannot be changed');
								}
						}
					});
				}
	
				if(flag==1){
					return false;
				}
				   
			});
			
			
		$("#account_form").on('click',function()
        {
            // alert('hii');
             var firstname = $("#firstname").val();
             var lastname = $("#lastname").val();
            //  alert(lastname);
             var address1 = $("#address1").val();
             var address2 = $("#address2").val();
             var phone = $("#phone").val();
             var country = $("#country").val();
             var state = $("#state").val();
             var city = $("#city").val();
             var zip = $("#zip").val();
             var email = $("#email").val();
             var regEx =  /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		     var validEmail = regEx.test(email);
             
           var base_url = $("#base_url").val();
				var flag=0;
				

				if (firstname=="") 
				{
					$('#firstname_err').text('First Name  is required').addClass("text-danger");
					flag=1;
				} 
		 
				if (firstname!="") 
				{
					$('#firstname_err').text('');
				} 

				if (lastname=="") 
				{
					$('#lastname_err').text('Last Name is required').addClass("text-danger");
					flag=1;
				} 
				
					if (lastname!="") 
				{
					$('#lastname_err').text('');
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
			   
			   if(phone!="" && phone.length!=10) {
		    $('#phone_err').text('Phone is required only 10 digits').addClass("text-danger");
			flag=0;
		}

        if(phone!="" && phone.length==10) {
		    $('#phone_err').text('').addClass("text-danger");
		
		}
			   
				
				
				 if (country=="") 
			   {
				   $('#country_err').text('Country is required').addClass("text-danger");
				   flag=1;
			   } 
		
			   if (country!="") 
			   {
				   $('#country_err').text('');
			   } 
			   
			   
			   	if (state=="") 
				{
					$('#street_err').text('State is required').addClass("text-danger");
					flag=1;
				} 
				
					if (state!="") 
				{
					$('#street_err').text('');
				} 
				
				 if (city=="") 
			   {
				   $('#city_err').text('City is required').addClass("text-danger");
				   flag=1;
			   } 
		
			   if (city!="") 
			   {
				   $('#city_err').text('');
			   } 
			   
			   if (zip=="") 
			   {
			      
				   $('#zip_err').text('ZIP is required').addClass("text-danger");
				   flag=1;
			   } 
		
			   if (zip!="") 
			   {
				   $('#zip_err').text('');
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

			  
					
				  if(flag==0){

					let account_form_data = document.getElementById("account_form_data");
					let fd = new FormData(account_form_data );

						$.ajax({
								url: "update_account_form_data",
								type: "POST",
								data: fd,
								processData: false,
								contentType: false,
								success: function(data){
									console.log(data);

									if(data==1){
								
										$("#msg2").text('Profile Updated Successfully...').addClass("text-success");
										
										setTimeout(function () {
											location.href=base_url;
										}, 2000);
									}
								
									
							}
						});
					}
		
					if(flag==1){
						return false;
					}
					   
				});
				
				$("#add_address_form").on('click',function()
        {
            // alert('hii');
             var firstname = $("#firstname").val();
             var lastname = $("#lastname").val();
            //  alert(lastname);
             var address1 = $("#address1").val();
            //  var address2 = $("#address2").val();
             var phone = $("#phone").val();
             var country = $("#country").val();
             var state = $("#state").val();
             var city = $("#city").val();
             var zip = $("#zip").val();
    //          var email = $("#email").val();
    //          var regEx =  /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		  //   var validEmail = regEx.test(email);
             
           var base_url = $("#base_url").val();
				var flag=0;
				

				if (firstname=="") 
				{
					$('#firstname_err').text('First Name  is required').addClass("text-danger");
					flag=1;
				} 
		 
				if (firstname!="") 
				{
					$('#firstname_err').text('');
				} 

				if (lastname=="") 
				{
					$('#lastname_err').text('Last Name is required').addClass("text-danger");
					flag=1;
				} 
				
					if (lastname!="") 
				{
					$('#lastname_err').text('');
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
			   
			   if(phone!="" && phone.length!=10) {
		    $('#phone_err').text('Phone is required only 10 digits').addClass("text-danger");
			flag=0;
		}

        if(phone!="" && phone.length==10) {
		    $('#phone_err').text('').addClass("text-danger");
		
		}
			   
				
				
				 if (country=="") 
			   {
				   $('#country_err').text('Country is required').addClass("text-danger");
				   flag=1;
			   } 
		
			   if (country!="") 
			   {
				   $('#country_err').text('');
			   } 
			   
			   
			   	if (state=="") 
				{
					$('#street_err').text('State is required').addClass("text-danger");
					flag=1;
				} 
				
					if (state!="") 
				{
					$('#street_err').text('');
				} 
				
				 if (city=="") 
			   {
				   $('#city_err').text('City is required').addClass("text-danger");
				   flag=1;
			   } 
		
			   if (city!="") 
			   {
				   $('#city_err').text('');
			   } 
			   
			   if (zip=="") 
			   {
			      
				   $('#zip_err').text('ZIP is required').addClass("text-danger");
				   flag=1;
			   } 
		
			   if (zip!="") 
			   {
				   $('#zip_err').text('');
			   } 
			   
			   
			    if (address1=="") 
			   {
				   $('#cus_address1_err').text('Address is required').addClass("text-danger");
				   flag=1;
			   } 
		
			   if (address1!="") 
			   {
				   $('#cus_address1_err').text('');
			   } 
			   
			 //  if (address2=="") 
			 //  {
			      
				//   $('#cus_address2_err').text('Address is required').addClass("text-danger");
				//   flag=1;
			 //  } 
		
			 //  if (address2!="") 
			 //  {
				//   $('#cus_address2_err').text('');
			 //  } 
			   
			   
		 
			 //  if (email=="") 
				// {
				// 	$('#email_err').text('Email is required').addClass("text-danger");
				// 	flag=1;
				// } 
		
				// if (email!="") 
				// {
				// 	$('#email_err').text('');
				// } 
		
		 
			 //  if (email!='' && !validEmail) 
			 //  {
				// 	$('#email_err').text('Enter a valid email').addClass("text-danger");
				// 	flag=1;
			 //  }
		
			 //  if (email!='' && validEmail) 
			 //  {
				// 	$('#email_err').text('');
			 //  }

			  
					
				  if(flag==0){

					let account_form_data = document.getElementById("address_form_data");
					let fd = new FormData(account_form_data );

						$.ajax({
								url: "save_address_form_data",
								type: "POST",
								data: fd,
								processData: false,
								contentType: false,
								success: function(data){
									console.log(data);

									if(data==1){
								
										$("#msg").text('Address Added Successfully...').addClass("text-success");
										
										setTimeout(function () {
											location.href=base_url;
										}, 2000);
									}
								
									
							}
						});
					}
		
					if(flag==1){
						return false;
					}
					   
				});
			
				$("#edit_address_form").on('click',function()
        {
            // alert('hii');
             var firstname = $("#firstname").val();
             var lastname = $("#lastname").val();
            //  alert(lastname);
             var address1 = $("#address1").val();
            //  var address2 = $("#address2").val();
             var phone = $("#phone").val();
             var country = $("#country").val();
             var state = $("#state").val();
             var city = $("#city").val();
             var zip = $("#zip").val();
    //          var email = $("#email").val();
    //          var regEx =  /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		  //   var validEmail = regEx.test(email);
             
           var base_url = $("#base_url").val();
           
            var baseurl = $("#baseurl").val();
				var flag=0;
				

				if (firstname=="") 
				{
					$('#firstname_err').text('First Name  is required').addClass("text-danger");
					flag=1;
				} 
		 
				if (firstname!="") 
				{
					$('#firstname_err').text('');
				} 

				if (lastname=="") 
				{
					$('#lastname_err').text('Last Name is required').addClass("text-danger");
					flag=1;
				} 
				
					if (lastname!="") 
				{
					$('#lastname_err').text('');
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
			   
			   if(phone!="" && phone.length!=10) {
		    $('#phone_err').text('Phone is required only 10 digits').addClass("text-danger");
			flag=0;
		}

        if(phone!="" && phone.length==10) {
		    $('#phone_err').text('').addClass("text-danger");
		
		}
			   
				
				
				 if (country=="") 
			   {
				   $('#country_err').text('Country is required').addClass("text-danger");
				   flag=1;
			   } 
		
			   if (country!="") 
			   {
				   $('#country_err').text('');
			   } 
			   
			   
			   	if (state=="") 
				{
					$('#street_err').text('State is required').addClass("text-danger");
					flag=1;
				} 
				
					if (state!="") 
				{
					$('#street_err').text('');
				} 
				
				 if (city=="") 
			   {
				   $('#city_err').text('City is required').addClass("text-danger");
				   flag=1;
			   } 
		
			   if (city!="") 
			   {
				   $('#city_err').text('');
			   } 
			   
			   if (zip=="") 
			   {
			      
				   $('#zip_err').text('ZIP is required').addClass("text-danger");
				   flag=1;
			   } 
		
			   if (zip!="") 
			   {
				   $('#zip_err').text('');
			   } 
			   
			   
			    if (address1=="") 
			   {
				   $('#cus_address1_err').text('Address is required').addClass("text-danger");
				   flag=1;
			   } 
		
			   if (address1!="") 
			   {
				   $('#cus_address1_err').text('');
			   } 
			   
			 //  if (address2=="") 
			 //  {
			      
				//   $('#cus_address2_err').text('Address is required').addClass("text-danger");
				//   flag=1;
			 //  } 
		
			 //  if (address2!="") 
			 //  {
				//   $('#cus_address2_err').text('');
			 //  } 
			   
			   
		 
			 //  if (email=="") 
				// {
				// 	$('#email_err').text('Email is required').addClass("text-danger");
				// 	flag=1;
				// } 
		
				// if (email!="") 
				// {
				// 	$('#email_err').text('');
				// } 
		
		 
			 //  if (email!='' && !validEmail) 
			 //  {
				// 	$('#email_err').text('Enter a valid email').addClass("text-danger");
				// 	flag=1;
			 //  }
		
			 //  if (email!='' && validEmail) 
			 //  {
				// 	$('#email_err').text('');
			 //  }

			  
					
				  if(flag==0){

					let account_form_data = document.getElementById("edit_address_form_data");
					let fd = new FormData(account_form_data );

						$.ajax({
								url: baseurl + "update_address_form_data",
								type: "POST",
								data: fd,
								processData: false,
								contentType: false,
								success: function(data){
									console.log(data);

									if(data==1){
								
										$("#msg").text('Address Updated Successfully...').addClass("text-success");
										
										setTimeout(function () {
											location.href=base_url;
										}, 2000);
									}
								
									
							}
						});
					}
		
					if(flag==1){
						return false;
					}
					   
				});	
				  $(document).on('click', '.del_address', function () 
        {
           var address_ids = $(this).attr("data-id");
         
        //   var base_url = $("#base_url").val();
           
            // var baseurl = $("#baseurl").val();
              if (confirm('Are you sure delete this record?')) {
             $.ajax({
               type: 'POST',
               url: 'delete_address',
               data: { address_ids: address_ids },
              //  contentType: false,
              //   processData: false,
               success: function (data) {
                   
                   console.log(data);
      
                 if (data == 1) {
                  
                  setTimeout(function () {
                     window.location.reload();
                  }, 2000);
                 }
               },
             });
             
              }
           
        });
				
		$(document).on('click', '.add_wishlist', function () 
        {
           var product_ids = $(this).attr("data-id");
         
             $.ajax({
               type: 'POST',
               url: base_url+'add_to_wishlist',
               data: { product_ids: product_ids },
              //  contentType: false,
              //   processData: false,
               success: function (data) {
                   
                   console.log(data);
                if(data==1)
                {
                    Swal.fire({
                                    title: 'Product added to wishlist!',
                                    didOpen: function () {
                                      Swal.showLoading()
                                      // AJAX request simulated with setTimeout
                                      setTimeout(function () {
                                        Swal.close()
                                      }, 2000)
                                    }
                                  });
                    //$(".wishlistdata").html('<span class="error text-success">Product added wishlist successfully.</span>');
                }
                //  if (data == 1) {
                  
                //   setTimeout(function () {
                //      window.location.reload();
                //   }, 2000);
                //  }
               },
             });
           
        });
        
        
 
        $(document).on('click', '.remove_wishlist', function () 
        {
           var product_ids = $(this).attr("data-id");
         
             $.ajax({
               type: 'POST',
               url: base_url+'delete_wishlist',
               data: { product_ids: product_ids },
              //  contentType: false,
              //   processData: false,
               success: function (data) {
                   
                   console.log(data);
      
                //  if (data == 1) {
                  
                //   setTimeout(function () {
                //      window.location.reload();
                //   }, 2000);
                //  }
               },
             });
           
        });
        
       
        
        $(document).on('click','#logindata',function()
        {
            var emailids = $("#emailids").val();
            var passwords = $("#passwords").val();
           
            var flag=1;
            $(".error").remove();
            if(emailids=='')
            {
                $(".emailids").after('<span class="mb-3 error text-danger">Please enter email id</span>');
                flag=0;
            }
            if(passwords=='')
            {
                $(".emailids").after('<span class="mb-3 error text-danger">Please enter password</span>');
                flag=0;
            }
            if(flag==0)
            {
                return false;
            }
            $.ajax({
                type:'post',
                url:'checkout_login',
                data:{emailids:emailids,passwords:passwords},
                success:function(data)
                {
                    if(data=='2')
                    {
                       
                        $(".msg_data").html('<span class="error text-success">Login successfully</span>');
                        setTimeout(function()
                        {
                            window.location.reload();    
                        },2000);
                    }
                    else 
                    {
                        $(".msg_data").html('<span class="error text-danger">Invalid login</span>');
                    }
                }
            });
        });

        
        
  $(".add_wishlist").each(function () {
      $(this).click(function(){ 
       $(this).next().removeClass('d-none');
        // $(this).prev().removeClass('d-block');
       
        $(this).addClass('d-none');
        $(this).removeClass('d-block');



      });
  });


    $(".remove_wishlist").each(function() 
    {
        $(this).click(function(){ 
           $(this).prev().addClass('d-block');
        $(this).addClass('d-none');
   
    //   $(this).prev().show();

      });
  });
    
    // $("#search_prd").on('click',function()
    // {
    //   var serch_cat = $("#serch_cat").val();
    //   var nurl = 'product';
    //   if(serch_cat)
    //   {
    //       var newurl ='?searchprd='+window.btoa(serch_cat);
    //       window.location.href = nurl+newurl
           
    //   }
   
    // });
  
  $("#search_prd").on('click', function () {
    var serch_cat = $("#serch_cat").val();
    var nurl = 'product';

    if (serch_cat) {
        var newurl = '?searchprd=' + window.btoa(serch_cat);
        window.location.href = nurl + newurl;
    } else {
        window.location.href = nurl;
    }
});

   $("#serch_cat").keyup(function(e) {
       e.preventDefault();
       if($(this).val().length < 1)
       {
            $("#suggesstion-box").empty();
       }
       else 
       {
          
		$.ajax({
			type: "POST",
			url: base_url+"fetchproduct",
			data: 'keyword=' + $(this).val(),
			beforeSend: function() {
				$("#serch_cat").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
			},
			success: function(data) {
			    
				$("#suggesstion-box").show();
				$("#suggesstion-box").html(data);
				$("#serch_cat").css("background", "#FFF");
			},
			error: function (xhr, status, error)
			{
                console.log('Server error:', error);
            }
		});
       }
       
	});
 
});
    function selectCountry(val) 
    {
    	$("#serch_cat").val(val);
    	$("#suggesstion-box").hide();
       
            var newurl = 'product';
            if(val)
            {
                var nurl = '?prd='+window.btoa(val);
                window.location.href = newurl+nurl
            }
            
    }    