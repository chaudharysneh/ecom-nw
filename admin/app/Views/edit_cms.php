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
.wrap {
   width: 70%;
   min-width: 562px;
   margin: 60px auto 0;
   background: #fafafa;
   border-radius: 8px;
   box-shadow: 0 5px 8px 0 rgba(0,0,0,.4);
   padding: 10px;
}

.toolbar {
   width: 100%;
   margin: 0 auto 10px;
}

button {
   width: 30px;
   height: 30px;
   border-radius: 3px;
   background: none;
   border: none;
   box-sizing: border-box;
   padding: 0;
   font-size: 20px;
   color: #a6a6a6;
   cursor: pointer;
   outline: none;
}

button:hover {
   border: 1px solid #a6a6a6;
   color: #777;
}

#bold,
#italic,
#underline {
   font-size: 18px;
}

#underline,
#align-right {
   margin-right: 17px;
}

#align-left {
   margin-left: 17px;
}

select {
   height: 24px;
   font-size: 15px;
   font-weight: bold;
   color: #444;
   background: #fcfcfc;
   border: 1px solid #a6a6a6;
   border-radius: 3px;
   margin: 0;
   outline: none;
   cursor: pointer;
}

select > option {
   font-size: 15px;
   background: #fafafa;
}

#fonts {
   width: 140px;
}

.sp-replacer {
   background: #fcfcfc;
   padding: 1px 2px 1px 3px;
   border-radius: 3px;
   border-color: #a6a6a6;
   margin-top: -1px;
}

.sp-replacer:hover {
   border-color: #a6a6a6;
   color: inherit;
}

.sp-preview {
   width: 15px;
   height: 15px;
   border: none;
   margin-top: 2px;
   margin-right: 3px;
}

.sp-preview-inner, 
.sp-alpha-inner, 
.sp-thumb-inner {
   border-radius: 3px;
}

.editor {
   position: relative;
   width: 100%;
   height: 60vh;
   margin: 0 auto;
   padding: 20px;
   background: #fcfcfc;
   border-radius: 3px;
   box-shadow: inset 0 0 8px 1px rgba(0,0,0,.2);
   box-sizing: border-box;
   overflow: hidden;
   word-break: break-all;
   outline: none;
}
</style>        
            
<?= $this->include('templates/header') ?>   
          <!-- Content wrapper -->
          <div class="text-nowrap m-5">
            <div class="card">
              <div class="card-body p-0">
          		<span class="addprobtn2">CMS Page</span>
              </div>
             </div>
             <form method="post" enctype="multipart/form-data" id="update_cms_form_data">
                  <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>all_cms">
                    <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url() ?>">
                  <input type="hidden" name="cmsid" id="cmsid" value="<?php echo $cms_data['CmsID'] ?>">
            
          <div class="content-wrapper">
            <!-- Content -->

            <div class="flex-grow-1 container-p-y">
              <!--<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add</span> Tags</h4>-->
              <div class="row">
                <div class="col-md-12 tag-mar">
                  <div class="card mb-4">
                    <!--<h5 class="card-header">Default</h5>-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Title</label>
                        <input
                          type="text"
                          class="form-control"
                          id="title"
                          name="title"
                          placeholder="John Doe"
                          value="<?php echo $cms_data['CmsTitle']; ?>"
                          aria-describedby="defaultFormControlHelp"
                        />
                      </div>
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Page URL</label>
                        <input
                          type="url"
                          class="form-control"
                          id="pageurl"
                          name="pageurl"
                           value="<?php echo $cms_data['CmsUrl']; ?>"
                          placeholder=""
                          aria-describedby="defaultFormControlHelp"
                        />
                        <span id="pageurl_err"></span>
                      </div>
                       <div class="mb-3">
                           <div>
                        
       <textarea name="editor1"><?php echo $cms_data['CmsContent']; ?></textarea>

                       
                      </div>
                      
                      
                                    
                               
         <span id="editor_err"></span>

                       <input type="hidden" name="editordata" id="editordata">
                      </div>
                      
                      <!--  <div class="mb-3">-->
                      <!--  <label for="defaultFormControlInput" class="form-label">Discription</label>-->
                      <!--  <textarea name="comment" form="usrform" class="textarea"></textarea>-->
                      <!--</div>-->

                      
                      <!--<div class="card-body p-2 mb-3">-->
                      <!--     <button type="button" class="addprobtn" id="edit_cms_btn">Edit CMS Page</button>-->
                      
               <div class="col-md-12">
                      <label for="faqs"> Is FAQ : </label>
  <input type="checkbox" id="faqsed" name="faqs" value="1"
  <?php 
if($cms_data['IsChecked']==1) { echo "checked";}
?>
>


                      </div>
                       <div style="<?php 
                      if($cms_data['IsChecked']==1) { echo "display:block"; }   if($cms_data['IsChecked']==0) { echo "display:none"; } ?>">
                          
                      
                      <div class="faqs_datas wrapper">
                          <?php
           $products = new App\Models\Cmsfaqsmodel();
           $prod = $products
               ->where('CmsID', $cms_data['CmsID'])
               ->get()
               ->getResult('array');
              
            foreach ($prod as $prd) 
            {
                if(!empty($prd['CmsID']))
                {
                    // print_r($prd);
                    $quest = json_decode($prd['FaqQuestion']);
                    $answe = json_decode($prd['FaqAnswer']);
                    // print_r($quest);
                    foreach($quest as $key=>$que){
                        // print_r($que);
           ?>
                          

                      <div class="mb-3 mt-4">
                        <label for="defaultFormControlInput" class="form-label">Question</label>
                        <input
                          type="text"
                          class="form-control faqs_questions"
                          id="faq_question"
                          name="faq_question[]"
                          value="<?php echo $que; ?>"
                      
                          aria-describedby="defaultFormControlHelp"
                        />
                        <span id="question_err0"></span>
                      </div>

                      <div class="mb-3">
                      <label for="defaultFormControlInput" class="form-label">Answer</label>
                        <textarea name="faq_answer[]" id="faq_answer" class="form-control faq_answers" cols="5" rows="5"><?php echo $answe[$key]; ?></textarea>


                        <span id="answer_err0"></span>
                     </div>
                     <?php 
                    }
                }
            }
                ?>
<div class="card-body p-2 mb-3 mt-5">
                          
                          
                          <!-- <span class="addprobtn mb-3" id="add_cms_btn">Add CMS Page</span> -->
                          <span class="addprobtn mb-3 add_more_faq_data" id="add_more_faq_data">Add More</span>
                    
                   
                           <!-- <button type="button" class="addprobtn" id="cms_submit_data">
                           Add CMS</button> -->
                           </div>

</div>
</div>
                      
                                  
                            <div class="card-body p-2 mb-3">
                          
                         
                     <span class="addprobtn m-0 mb-3 mt-4" id="edit_cms_btn">Edit CMS Page</span>
                  <!--<button type="button" class="addprobtn mb-3" id="edit_cms_btn">Edit CMS Page</button>-->
                  
                      <!--<button type="button" class="addprobtn" id="add_cms_btn">-->
                      <!--Add CMS</button>-->
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
           <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" ></script>
          <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>  
          <script>
          function removeInlineStyles(htmlContent) {
               var tempElement = document.createElement('div');
               tempElement.innerHTML = htmlContent;

               // Traverse through each element and remove the 'style' attribute
               var elements = tempElement.querySelectorAll('*');
               elements.forEach(function(element) {
                  element.removeAttribute('style');
               });

               // Return the HTML content without inline styles
               return tempElement.innerHTML;
               }
               
               CKEDITOR.replace('editor1', {
                  allowedContent: true,
                   //filebrowserUploadUrl: '<?php echo base_url() ?>cms/upload_image',
                   filebrowserUploadUrl: '<?php echo base_url() ?>upload_image',
                  filebrowserUploadMethod: 'form',
                  on: {
                     instanceReady: function(evt) {
                        // CKEditor instance is ready, you can now call getData()
                        var editorContent = evt.editor.getData();
                        // ...
                     }
                  }
               });
           
         </script>
          <script>
             CKEDITOR.replace('editor1');  
    
  
    function getData() {  
        //Get data written in first Editor   
        var editor_data = CKEDITOR.instances['editor1'].getData();  
        //Set data in Second Editor which is written in first Editor  
        // CKEDITOR.instances['editor2'].setData(editor_data);  
    }  
          </script>
          



          <script>

$(document).ready(function() {
          $('#faqsed').change(function() {
            // alert('hhkl');
            if ($(this).is(':checked')) {
               // alert('klo');
              var checkboxValue = $(this).val();
            //   alert(checkboxValue);
              $('.faqs_datas').show();



            //   console.log(checkboxValue); // Output the value of the checkbox
            } else {
               $('.faqs_datas').hide();
            //   console.log("Checkbox is unchecked");
            }
          });
      


var max_fields = 10; //Maximum allowed input fields 
  var wrapper = $(".wrapper"); //Input fields wrapper
  var add_button = $(".add_more_faq_data"); //Add button class or ID
  var x = 1; //Initial input field is set to 1
var i = 0;
  //When user click on add input button
  $(add_button).click(function (e) {
    e.preventDefault();
      i++;

    //Check maximum allowed input fields
    if (x < max_fields) {
      x++; //input field increment
      //add input field 

     
      $(wrapper).append('<div class="mb-2 mt-2">'+
      '<div class="">'+
      '<div class="mb-3 mt-4">'+
      '<label for="defaultFormControlInput" class="form-label">Question</label>'+
      '<input type="text" class="form-control faqs_questions" id="faq_question" name="faq_question[]" aria-describedby="defaultFormControlHelp">'+
      '<span id="question_err'+i+'"></span>'+
      '</div>'+
      '<div class="mb-3">'+
      '<label for="defaultFormControlInput" class="form-label">Answer</label>'+
      '<textarea name="faq_answer[]" id="faq_answer" class="form-control faq_answers" cols="5" rows="5"></textarea>'+
      '<span id="answer_err'+i+'"></span>'+
       '</div>'+
       '<a href="javascript:void(0);" class="h-100 remove_btns remove_field remove_more_option_value_data">'+
       'Remove'+
       '</a>'+
      '</div>');
      
        i++;
        // alert(i);
    
    }
  
  });

  // when user click on remove button
  $(wrapper).on("click", ".remove_field", function (e) {
    e.preventDefault();
    $(this).parent('div').remove(); //remove inout field
    x--; //inout field decrement
  })



        $('#edit_cms_btn').on('click', function() {
            // alert('hii');
       
			
			
		    var htmlContent = CKEDITOR.instances.editor1.getData();
		  //  alert(htmlContent);
                     // Sanitize the HTML content using DOMPurify
            var editorContent = removeInlineStyles(htmlContent);
            var title = $('input[name="title"]').val();
            var pageurl = $('input[name="pageurl"]').val();
             var faq = $('#faqsed').val();
             let base_url= $("#base_url").val();
               let baseurl= $("#baseurl").val();
			var flag = 1;
				var check ="";
				 
		    if ($('#faqsed').prop('checked')) 
		    {
		         check = 1;
                var faq_question = [];
                $("input[name='faq_question[]']").each(function (i) 
                {
                     faq_question.push($(this).val());
                   
                     if ($(this).val() == '') 
                    {
                        // $(".product_price_err").show();
                        $(this).next('#question_err'+i).show();
                        
                        $(this).next('#question_err'+i).html('Please enter question!').addClass("text-danger");
                        flag = 0;
                
                    }
                    else 
                    {
                        $(this).next('span').hide()
                    }
            
                });
                

                var faq_answer=[];
                $("textarea[name='faq_answer[]']").each(function (i) 
                {
                    faq_answer.push($(this).val());
				     if ($(this).val() == '') 
				    {
                        $(this).next('#answer_err'+i).show();
                        $(this).next('#answer_err'+i).html('Please enter answer!').addClass("text-danger");
                        flag = 0;
                    } 
                    else 
                    {
                        $(this).next('span').hide()
                    }
                });	
           
            }
                else{
                     check = 0;
                }
    				if (title=="") 
    				{
    					$('#title_err').text('Please enter title!').addClass("text-danger");
    					flag=0;
    				} 
    		 
    				if (title!="") 
    				{
    					$('#title_err').text('');
    				} 
    				
    				if (pageurl=="") 
    				{
    					$('#pageurl_err').text('Please enter url!').addClass("text-danger");
    					flag=0;
    				} 
    				if (pageurl!="") 
    				{
    					$('#pageurl_err').text('');
    				} 
    				
    				if (editorContent=="") 
    				{
    					$('#editor_err').text('Please enter content!').addClass("text-danger");
    					flag=0;
    				} 
    		 
    				if (editorContent!="") 
    				{
    					$('#editor_err').text('');
    				} 
				    if(flag==0)
                    {
                        return false;
                    }
                    
                    if(flag==1)
                    {
                        var update_cms_form_data = document.getElementById("update_cms_form_data");
					    var fd = new FormData(update_cms_form_data);
					    fd.append('htmlContent',htmlContent);
					    fd.append('ischecked',check);
                        $.ajax({
                           url: 'update_cms',
                           type: 'POST',
                           data: fd,
                           cache:false,
                           contentType:false,
                           processData:false,
                           dataType: 'json',
                           success: function(response) {
                              // Handle the response from the server
                              //   if (data == '1') {
                                Swal.fire({
                                      icon: 'success',
                                      title: 'Success',
                                      text: 'CMS Data Updated Successfully!',
                                      timer: 2000,  // Alert will close after 2 seconds
                                      showConfirmButton: false
                                  }).then(function () {
                                      // Redirect to the base URL after the alert closes
                                      window.location.href = base_url;
                                  });

                                    //}
                           },
                           
                            });

                    }
          
            });
});

</script>
         
            <!-- / Content -->

            <?= $this->include('templates/footer') ?>
            