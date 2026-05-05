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
             <form method = "post">
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
                          value="<?php echo  $cms_data['CmsTitle'];?>"
                          placeholder="John Doe"
                          aria-describedby="defaultFormControlHelp"
                          disabled
                          
                        />
                      </div>
                       <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Page URL</label>
                        <input
                          type="url"
                          class="form-control"
                          id="pageurl"
                          name="pageurl"
                           value="<?php echo  $cms_data['CmsUrl'];?>"
                          placeholder=""
                          aria-describedby="defaultFormControlHelp"
                          disabled
                          />
                        <span id="pageurl_err"></span>
                      </div>
                      
                       <div class="mb-3">
                        
       <textarea name="editor1" disabled><?php echo  $cms_data['CmsContent'];?></textarea>

                       
                      </div>
                      <!--  <div class="mb-3">-->
                      <!--  <label for="defaultFormControlInput" class="form-label">Discription</label>-->
                      <!--  <textarea name="comment" form="usrform" class="textarea"></textarea>-->
                      <!--</div>-->

                  <div class="col-md-12">
                      <label for="faqs"> Is FAQ : </label>
  <input type="checkbox" id="faqs" name="faqs" value="1"<?php 
if($cms_data['IsChecked']==1) { echo "checked";} ?> disabled
>


                      </div>
                
                      <div style="<?php 
                      if($cms_data['IsChecked']==1) { echo "display:block"; } else { echo "display:none"; } ?>">
                          
                      <div class="faq_datas wrapper">


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
?>



                      
                      <?php 
                }
            }
            

            
                ?>
                </div>
</div>
                      
                      
                      <div class="card-body p-2 mb-3">
                          <a href="<?php echo base_url(); ?>edit_cms/<?= $cms_data['CmsID'] ?>"
                         
                     <span class="addprobtn mb-3">Edit CMS Page</span></a>
               
                  
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
          <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>  
          <script>
             CKEDITOR.replace('editor1');  
    CKEDITOR.replace('editor2');  
  
    function getData() {  
        //Get data written in first Editor   
        var editor_data = CKEDITOR.instances['editor1'].getData();  
        //Set data in Second Editor which is written in first Editor  
        CKEDITOR.instances['editor2'].setData(editor_data);  
    }  
          </script>
         
            <!-- / Content -->

            <?= $this->include('templates/footer') ?>
            