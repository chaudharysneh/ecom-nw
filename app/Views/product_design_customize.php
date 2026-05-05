<?php 
$settings = new App\Models\Settings();
$sett_data = $settings->get()->getRow();
$ProductID = '';
$product_imag = '<?php echo base_url();  ?>/admin/public/assets/img/product_images/1687351964_d3464780de6a48a9aae3.jpg';
if(!empty($product)){
  $prdimage = json_decode($product['ProductImage']);
  $singleimg = (isset($prdimage[0]))?($prdimage[0]):('');
  $product_imag = base_url('admin/public/assets/img/product_images/' . $singleimg);
  $ProductID = $product['ProductID'];
}

if($new_templates!=""){
    $product_imag = base_url($new_templates); 
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Photo Editor</title>
  
  <link
      type="text/css"
      href="https://uicdn.toast.com/tui-color-picker/v2.2.6/tui-color-picker.css"
      rel="stylesheet"
    />
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/font-awesome.css">
    <link type="text/css" href="<?php echo base_url(); ?>public/photon/css/service-mobile.css" rel="stylesheet" />
</head>
<body>
    <!-- Image editor controls - top area -->
    <div class="header">
     
      <div class="menu">
        <!-- <span class="button">
          <img src="<?php echo base_url(); ?>public/photon/img/openImage.png" style="margin-top: 5px" />
          <input type="file" accept="image/*" id="input-image-file" />
        </span> -->
        <button class="button disabled" id="btn-undo"><img src="<?php echo base_url(); ?>public/photon/img/undo.png" /></button>
        <button class="button disabled" id="btn-redo"><img src="<?php echo base_url(); ?>public/photon/img/redo.png" /></button>
        <button class="button" id="btn-remove-active-object"><img src="<?php echo base_url(); ?>public/photon/img/remove.png" /></button>
        <button class="button" id="btn-download"><img src="<?php echo base_url(); ?>public/photon/img/download.png" /></button>
        <button class="button pull-right" id="saveAndContinue" data-product_id ="<?php echo $ProductID; ?>" ><i class="fa fa-shopping-cart"></i></button>
      </div>
    </div>
   
    <!-- <div class="col-md-2 pull-left">

    </div> -->
    <!-- Image editor area -->
    <div class="tui-image-editor"></div>
    <!-- Image editor controls - bottom area -->
    <div class="tui-image-editor-controls ">
      <ul class="scrollable">
        <li class="menu-item">
          <button class="menu-button" ></button>
        </li>

        <li class="menu-item">
          <button class="menu-button" id="btn-select-images"><i class="fa fa-image" style="font-size:20px"></i></button>
          <div class="submenu">
            <div class="row" style="display: flex;">
              <ul class="scrollable" >
                <div class="tab-teaser">
                  <div class="tab-menu">
                        <ul>
                          <li><a href="#" class="active" data-rel="upload">Upload</a></li>
                          <li><a href="#" data-rel="gallary" class="">Gallary</a></li>
                          <li><a href="#" data-rel="template" class="">Template</a></li>
                        </ul>
                  </div>

                  <div class="tab-main-box">
                      <div class="tab-box" id="upload" style="display:block;">
                        <br>
                        <div>
                        <div class="d-flex align-items-center">
                          <div class="qq-upload-button-selector btn btn-dark-gray btn-block" ng-class="{'user-albums-enable': appConfiguration.config.userAlbums.enable}" style="position: relative; overflow: hidden; direction: ltr;">
                              <div class="uploadbtdiv">
                                  <span ng-bind-html="appConfiguration.labels.STUDIO_LEFT_PANEL_IMAGE_GALLERY_LABEL_UPLOAD_IMAGE_HEADING">Upload Your Image</span>
                              </div>
                          <input  title="Upload Your Image"  accept="image/*" id="input-image-file" type="file" name="qqfile" style="position: absolute; right: 0px; top: 0px; font-family: Arial; font-size: 118px; margin: 0px; padding: 0px; cursor: pointer; opacity: 0; height: 100%;"></div>
                          
                      </div>
                      <br>
                          <div class="row">
                            <?php 
                              
                              if(!empty($uploads)){
                                foreach ($uploads as $key => $item) {
                                  $img_url = isset($item['image'])?(base_url().$item['image']):('');
                                  $template_id = isset($item['templateID'])?($item['templateID']):('');
                                  ?>
                                  <div class="col-md-4">
                                    <div class="image-container">
                                      <span class="delet_image" data-template_id="<?php echo $template_id; ?>"><i class="fa fa-trash-o"></i></span>
                                      <img class="img-thumbnail uploaded_image" src="<?php echo $img_url;  ?>">
                                    </div>
                                  </div>
                                  <?php
                                }
                              }
                            ?>
                          
                        </div>
                          <!-- <span class="button imagbtn">
                            <input type="file" accept="image/*" id="input-image-file" />
                          </span> -->
                        </div>
                        <br>
                        
                        <br>
                      </div>
                      <div class="tab-box" id="gallary">
                        
                          <br>
                          <div class="row">
                            <?php 
                              
                              if(!empty($gallary)){
                                foreach ($gallary as $key => $item) {
                                  $img_url = isset($item['image'])?(base_url().$item['image']):('');
                                  ?>
                                  <div class="col-md-4">
                                    <img class="img-thumbnail uploaded_image" src="<?php echo $img_url;  ?>">
                                  </div>
                                  <?php
                                }
                              }
                            ?>
                          
                        </div>
                      </div>
                      <div class="tab-box" id="template">
                          <br>
                          <div class="row">
                          
                            <?php 
                              
                              if(!empty($templates)){
                                foreach ($templates as $key => $item) {
                                  $img_url = isset($item['image'])?(base_url().$item['image']):('');
                                  ?>
                                  <div class="col-md-4">
                                    <img class="img-thumbnail uploaded_image" src="<?php echo $img_url;  ?>">
                                  </div>
                                  <?php
                                }
                              }
                            ?>
                         
                          
                        </div>
                      </div>
                  </div>
                </div>
              </ul>
              <button class="btn-prev"><i class="fa fa-chevron-circle-left" aria-hidden="true" style="font-size:20px"></i></button>
            </div>
            
            
          </div>
        </li>

        <li class="menu-item">
          <button class="menu-button" id="btn-crop"><i class="fa fa-crop" style="font-size:20px"></i></button>
          <div class="submenu">
            
            <button class="btn-prev"><i class="fa fa-chevron-circle-left" aria-hidden="true" style="font-size:20px"></i></button>
            <ul class="scrollable">
              <li class="menu-item">
                <button class="submenu-button" id="btn-apply-crop"><i class="fa fa-save" style="font-size:20px"></i></button>
              </li>
            </ul>
          </div>
        </li>
        <li class="menu-item">
          <button class="menu-button"><i class="fa fa-refresh"  style="font-size:20px"></i></button>
          <div class="submenu">
            <button class="btn-prev"><i class="fa fa-chevron-circle-left" aria-hidden="true" style="font-size:20px"></i></button>
            <ul class="scrollable">
              <li class="menu-item">
                <button class="submenu-button" id="btn-rotate-clockwise"><i class="fa fa-repeat" aria-hidden="true" style="font-size:20px"></i></button>
              </li>
              <li class="menu-item">
                <button class="submenu-button" id="btn-rotate-counter-clockwise"><i class="fa fa-undo" aria-hidden="true"  style="font-size:20px"></i></button>
              </li>
              <li class="menu-item">
                <button class="submenu-button" id="btn-flip-x"><i class="fa fa-arrows-h" aria-hidden="true" style="font-size:20px"></i></button>
              </li>
              <li class="menu-item">
                <button class="submenu-button" id="btn-flip-y"><i class="fa fa-arrows-v" aria-hidden="true" style="font-size:20px"></i></button>
              </li>
            </ul>
          </div>
        </li>
        <li class="menu-item">
          <button class="menu-button" id="btn-draw-line"><i class="fa fa-paint-brush" aria-hidden="true" style="font-size:20px"></i></button>
          <div class="submenu">
            <button class="btn-prev"><i class="fa fa-chevron-circle-left" aria-hidden="true" style="font-size:20px"></i></button>
            <ul class="scrollable">
              <li class="menu-item">
                <button class="submenu-button" id="btn-free-drawing">Free<br />Drawing</button>
              </li>
              <li class="menu-item">
                <button class="submenu-button" id="btn-line-drawing">Line<br />Drawing</button>
              </li>
              <li class="menu-item">
                <button class="submenu-button" id="btn-change-size">Brush<br />Size</button>
                <div class="hiddenmenu">
                  <input id="input-brush-range" type="range" min="10" max="100" value="50" />
                </div>
              </li>
              <li class="menu-item">
                <button class="submenu-button" id="btn-change-text-color">Brush<br />Color</button>
                <div class="hiddenmenu">
                  <div id="tui-brush-color-picker"></div>
                </div>
              </li>
            </ul>
          </div>
        </li>
        <li class="menu-item">
          <button class="menu-button" id="btn-draw-shape"><i class="fa fa-heart-o" aria-hidden="true" style="font-size:20px"></i></button>
          <div class="submenu">
            <button class="btn-prev"><i class="fa fa-chevron-circle-left" aria-hidden="true" style="font-size:20px"></i></button>
            <ul class="scrollable">
              <li class="menu-item">
                <button class="submenu-button" id="btn-add-rect">Rectagle</button>
              </li>
              <li class="menu-item">
                <button class="submenu-button" id="btn-add-square">Square</button>
              </li>
              <li class="menu-item">
                <button class="submenu-button" id="btn-add-ellipse">Ellipse</button>
              </li>
              <li class="menu-item">
                <button class="submenu-button" id="btn-add-circle">Circle</button>
              </li>
              <li class="menu-item">
                <button class="submenu-button" id="btn-add-triangle">Triangle</button>
              </li>
              <li class="menu-item">
                <button class="submenu-button" id="btn-stroke-size">Stroke<br />Size</button>
                <div class="hiddenmenu">
                  <input id="input-stroke-range" type="range" min="1" max="100" value="10" />
                </div>
              </li>
              <li class="menu-item">
                <button class="submenu-button" id="btn-change-shape-color">Color</button>
                <div class="hiddenmenu">
                  <div class="top">
                    <label for="fill-color"
                      ><input
                        type="radio"
                        id="fill-color"
                        name="select-color-type"
                        value="fill"
                        checked="checked"
                      />
                      Fill</label
                    >
                    <label for="stroke-color"
                      ><input
                        type="radio"
                        id="stroke-color"
                        name="select-color-type"
                        value="stroke"
                      />
                      Stroke</label
                    >
                    <label for="input-check-transparent"
                      ><input type="checkbox" id="input-check-transparent" />Transparent</label
                    >
                  </div>
                  <div id="tui-shape-color-picker"></div>
                </div>
              </li>
            </ul>
          </div>
        </li>
        <li class="menu-item">
          <button class="menu-button"><i class="fa fa-smile-o" aria-hidden="true" style="font-size:20px"></i></button>
          <div class="submenu">
            <button class="btn-prev"><i class="fa fa-chevron-circle-left" aria-hidden="true" style="font-size:20px"></i></button>
            <ul class="scrollable">
              <li class="menu-item">
                <button class="submenu-button" id="btn-add-arrow-icon">Arrow<br />Icon</button>
              </li>
              <li class="menu-item">
                <button class="submenu-button" id="btn-add-cancel-icon">Cancel<br />Icon</button>
              </li>
              <li class="menu-item">
                <button class="submenu-button" id="btn-change-icon-color">Color</button>
                <div class="hiddenmenu">
                  <div id="tui-icon-color-picker"></div>
                </div>
              </li>
            </ul>
          </div>
        </li>
        <li class="menu-item">
          <button class="menu-button" id="btn-add-text"><i class="fa fa-file-text" aria-hidden="true" style="font-size:20px"></i></button>
          <div class="submenu">
            <button class="btn-prev"><i class="fa fa-chevron-circle-left" aria-hidden="true" style="font-size:20px"></i></button>
            <ul class="scrollable">
              <li class="menu-item">
                <button class="submenu-button" id="btn-change-size"><i class="fa fa-text-width" aria-hidden="true" style="font-size:20px"></i></button>
                <div class="hiddenmenu">
                  <input id="input-text-size-range" type="range" min="10" max="240" value="120" />
                </div>
              </li>
              <li class="menu-item">
                <button class="submenu-button" id="btn-change-style"><i class="fa fa-font" aria-hidden="true" style="font-size:20px"></i></button>
                <div class="hiddenmenu">
                  <button class="hiddenmenu-button btn-change-text-style" data-style-type="bold">
                    <i class="fa fa-bold" aria-hidden="true" style="font-size:20px"></i>
                  </button>
                  <button class="hiddenmenu-button btn-change-text-style" data-style-type="italic">
                  <i class="fa fa-italic" aria-hidden="true" style="font-size:20px"></i>
                  </button>
                  <button
                    class="hiddenmenu-button btn-change-text-style"
                    data-style-type="underline"
                  >
                    <u><i class="fa fa-underline" aria-hidden="true" style="font-size:20px"></i></u>
                  </button>
                </div>
              </li>
              <li class="menu-item">
                <button class="submenu-button" id="btn-change-align"><i class="fa fa-align-justify" aria-hidden="true" style="font-size:20px"></i></button>
                <div class="hiddenmenu">
                  <button class="hiddenmenu-button btn-change-text-style" data-style-type="left">
                  <i class="fa fa-align-left" aria-hidden="true" style="font-size:20px"></i>
                  </button>
                  <button class="hiddenmenu-button btn-change-text-style" data-style-type="center">
                  <i class="fa fa-align-center" aria-hidden="true" style="font-size:20px"></i>
                  </button>
                  <button class="hiddenmenu-button btn-change-text-style" data-style-type="right">
                  <i class="fa fa-align-right" aria-hidden="true" style="font-size:20px"></i>
                  </button>
                </div>
              </li>
              <li class="menu-item">
                <button class="submenu-button" id="btn-change-text-color"><i class="fa fa-tachometer" aria-hidden="true" style="font-size:20px"></i></button>
                <div class="hiddenmenu">
                  <div id="tui-text-color-picker"></div>
                </div>
              </li>
            </ul>
          </div>
        </li>
      </ul>
      <!-- <p class="msg">Menu Scrolling <b>Left ⇔ Right</b></p> -->
    </div>
    
    <!-- Jquery -->
    <script src="<?php echo base_url(); ?>public/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/jquery-migrate-3.0.0.js"></script>
	  <script src="<?php echo base_url(); ?>public/js/jquery-ui.min.js"></script>
  
    <script
      type="text/javascript"
      src="https://api-storage.cloud.toast.com/v1/AUTH_e18353c4ea5746c097143946d0644e61/toast-ui-cdn/tui-image-editor/v3.11.0/example/fabric-v4.2.0.js"
    ></script>
    <script
      type="text/javascript"
      src="https://uicdn.toast.com/tui.code-snippet/v1.5.0/tui-code-snippet.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://uicdn.toast.com/tui-color-picker/v2.2.6/tui-color-picker.min.js"
    ></script>
    
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.3/FileSaver.min.js"
    ></script>
    <!-- <script type="text/javascript" src="../dist/tui-image-editor.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tui-image-editor/3.15.3/tui-image-editor.js" integrity="sha512-Hg4qH05STUfG23g4q6efE9RaLLfb32rf40zG0giiad1RzSYZS4wT40Lv4QS0/2dY7wr2tI7rkTz9tuUgEEftog==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo base_url(); ?>public/photon/js/service-mobile.js"></script>
    <script>
      loadImage('<?php echo $product_imag; ?>');

      $('body').find('.uploaded_image').on('click',function(){
        var src = $(this).attr('src');
        loadImage(src);
      })

      // tbals

      var tabLinks = document.querySelectorAll('.tab-menu li a');

    for (var i = 0; i < tabLinks.length; i++) {
      tabLinks[i].addEventListener('click', function(event) {
        event.preventDefault();

        var target = this.getAttribute('data-rel');

        // Remove 'active' class from all tab links
        var allTabLinks = document.querySelectorAll('.tab-menu li a');
        for (var j = 0; j < allTabLinks.length; j++) {
          allTabLinks[j].classList.remove('active');
        }

        // Add 'active' class to the clicked tab link
        this.classList.add('active');

        // Show the corresponding tab content and hide others
        var tabContents = document.querySelectorAll('.tab-box');
        for (var k = 0; k < tabContents.length; k++) {
          if (tabContents[k].id === target) {
            tabContents[k].style.display = 'block';
          } else {
            tabContents[k].style.display = 'none';
          }
        }
      });
    }

    </script>
  </body>
</html>
