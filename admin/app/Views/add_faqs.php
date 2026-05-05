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
          		<span class="addprobtn2">Add FAQs</span><a href="<?php echo base_url(); ?>all-faqs"><span class="addprobtn">FAQs</span></a>
              </div>
             </div>
             <form id="add_faqs_form">
          <div class="content-wrapper">
            <!-- Content -->

            <div class="flex-grow-1 container-p-y">
            <input type="hidden" id="base_url" value="<?php echo base_url('all-faqs') ?>">
              <!--<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add</span> Tags</h4>-->
              <div class="row">
                <div class="col-md-6 tag-mar">
                  <div class="card mb-4">
                    <!--<h5 class="card-header">Default</h5>-->
                    <div class="card-body">
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">FAQs Question</label>
                        <textarea type="text" class="form-control" id="faqs_que" name="faqs_que" placeholder="John Doe" aria-describedby="defaultFormControlHelp"></textarea>
                      <p class="text-danger faqs_que_err"> </p>
                      </div>
                       <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">FAQs Answer</label>
                        <textarea type="text" class="form-control" id="faqs_ans" name="faqs_ans" placeholder="John Doe" aria-describedby="defaultFormControlHelp"></textarea>
                      <p class="text-danger faqs_ans_err"> </p>
                      </div>
                      <div class="card-body p-2 mb-3">
                      <button type="button" class="addprobtn" id="add_faqs_data">
                      Add FAQs</button>
                     
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