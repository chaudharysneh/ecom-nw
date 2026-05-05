<?= $this->include('header') ?>
<style>
  .main-category {
    display: none;
  }

  .btn {
    text-transform: capitalize !important;
  }

  .range-slider1 {
        top: 45px;
    text-align: center;
    position: relative;
    background: #f7941d;
    border: 1px solid transparent;
    height: 3px;
    border-radius: 0px;

  }

  .rangeValues1 {
    display: block;
    margin-top: -55px;
    font-size: 15px;
    color: #000000c4;
    border-radius: 5px;
    padding: 5px;
    box-shadow: 0px 1px 4px 1px rgba(0, 0, 0, 0.25);
  }

  input[name=range] {
    -webkit-appearance: none;
    border: 1px solid white;
    width: 240px;
    position: absolute;
    left: 0;
  }

  input[name=range]::-webkit-slider-runnable-track {
    width: 240px;
    height: 5px;
    background: #ddd;
    border: none;
    border-radius: 3px;

  }

  input[name=range]::-webkit-slider-thumb {
    -webkit-appearance: none;
    border: none;
    height: 16px;
    width: 16px;
    border-radius: 50%;
    background: #21c1ff;
    margin-top: -4px;
    cursor: pointer;
    position: relative;
    z-index: 1;
  }

  input[name=range]:focus {
    outline: none;
  }

  input[name=range]:focus::-webkit-slider-runnable-track {
    background: #ccc;
  }

  input[name=range]::-moz-range-track {
    width: 300px;
    height: 5px;
    background: #ddd;
    border: none;
    border-radius: 3px;
  }

  input[name=range]::-moz-range-thumb {
    border: none;
    height: 16px;
    width: 16px;
    border-radius: 50%;
    background: #21c1ff;

  }


  /*hide the outline behind the border*/

  input[name=range]:-moz-focusring {
    outline: 1px solid white;
    outline-offset: -1px;
  }

  input[name=range]::-ms-track {
    width: 300px;
    height: 5px;
    /*remove bg colour from the track, we'll use ms-fill-lower and ms-fill-upper instead */
    background: transparent;
    /*leave room for the larger thumb to overflow with a transparent border */
    border-color: transparent;
    border-width: 6px 0;
    /*remove default tick marks*/
    color: transparent;
    z-index: -4;

  }

  input[name=range]::-ms-fill-lower {
    background: #777;
    border-radius: 10px;
  }

  input[name=range]::-ms-fill-upper {
    background: #ddd;
    border-radius: 10px;
  }

  input[name=range]::-ms-thumb {
    border: none;
    height: 16px;
    width: 16px;
    border-radius: 50%;
    background: #21c1ff;
  }

  input[name=range]:focus::-ms-fill-lower {
    background: #888;
  }

  input[name=range]:focus::-ms-fill-upper {
    background: #ccc;
  }

  .bbb_deals_image img.product_image {
    max-width: 100%;
    max-height: 100%;
    height: 130px;
    width: auto;
    object-fit: contain;

  }

  .ui-slider-horizontal .ui-slider-handle {
    top: -0.5em;
    margin-left: -.6em;
  }

  .ui-slider-range {
    left: 0%;
    width: 100%;
    /* background: #ccc !important; */
    background: #f7941d !important;
  }

  .ui-slider-handle {
    left: 100%;
    border-radius: 50%;
    background: #fff !important;
    border: 6px solid #f7941d !important;
  }
  .category-menu .badge {
    /* background-color: #f7941d; */
    color: #f7941d;
    font-weight: 600;
    font-size: 80%;
  }

  .ct-heart i{
  color:#999999;
  font-size: 20px;
  transition: all ease 0.3s;
}

.ct-heart{
  height: 40px;
   width: 40px; 
   line-height: 47px; 
   background: #ffffff; 
   border-radius: 5px;
   border:1px solid #ddd;
   padding-right:10px !important;
   transition: all ease 0.3s;
}

.ct-heart:hover{
  background-color: #f7941d;
  border:1px solid #f7941d;
}

.ct-heart:hover i{
  color:#fff;
}

 .ct-heart:hover .remove_wishlist {
      color:white !important;
  }

</style>
<?php
$AllsettingsModel = new \App\Models\Allsettingsmodel();
$all_setting_data = $AllsettingsModel->first();
?>
<section class="">

  <div class="">
    <div class="container-fluid px-0">
      <div class="row no-gutters px-5">

        <div class="col-lg-2">
          <!--
              *** MENUS AND FILTERS ***
              _________________________________________________________
              -->
          <!-- <div class="card sidebar-menu mb-4 mt-3"> -->
          <div class="card sidebar-menu mb-4" style="margin-top:1.2rem;">
            <div class="card-body">
              <button class="btn d-lg-none w-100 rounded d-flex justify-content-between align-items-center"
                type="button" data-toggle="collapse" data-target="#categoryDropdown" aria-expanded="false"
                aria-controls="categoryDropdown">
                <span>Categories</span>
                <i class="fas fa-chevron-down"></i> <!-- Dropdown icon -->
              </button>

              <!-- Collapsible category list -->
              <div class="collapse d-lg-block" id="categoryDropdown">
                <ul class="nav nav-pills flex-column category-menu">
                  <?php foreach ($cat as $key => $catdata) { ?>
                    <li>
                      <a href="<?php echo base_url('category/' . base64_encode($catdata['CategoryID'])); ?>"
                        class="nav-link text-capitalize">
                        <i class="fa-chevron-right fa-solid mr-1" style="font-size: 12px; color: #f7941d; "></i>
                        <?php echo wordwrap($catdata['CategoryName'], 20, "<br>\n"); ?>
                        <span class="badge float-right">
                          (<?php echo $countcat[$key]; ?>)
                        </span>
                      </a>
                    </li>
                    <hr class="m-0" style="background:#eee;"> <!-- Horizontal rule below each item -->
                  <?php } ?>
                </ul>
              </div>
            </div>

          </div>


          <!-- ======= -->


          <!-- ===================== -->

          <div class="card sidebar-menu mb-4 d-none d-lg-block" style="box-shadow:none !important;">
              <div class=" py-2 px-0" style="border-bottom: 1px solid black;">
              <h3 class="h4 card-title" style="font-size:21px;font-weight:600;">Price</h3>

            </div>
            <div class="card-body" style="height:100px;">
              <div class="range-slider1">
                <span class="rangeValues1 text-center"></span>
                <input value="<?php if (!empty($minimum_price))
                  echo $minimum_price;
                else
                  echo '0'; ?>" min="0"
                  max="50000" step="500" name="range" type="hidden">
                <input value="<?php if (!empty($maximum_price))
                  echo $maximum_price;
                else
                  echo '50000'; ?>" min="0"
                  max="50000" step="500" name="range" type="hidden">
                <input type="hidden" id="hidden_minimum_price"
                  value="<?php if (!empty($minimum_price))
                    echo $minimum_price;
                  else
                    echo '0'; ?>" />
                <input type="hidden" id="hidden_maximum_price"
                  value="<?php if (!empty($maximum_price))
                    echo $maximum_price;
                  else
                    echo '50000'; ?>" />
              </div>
            </div>
          </div>


          <!-- *** MENUS AND FILTERS END ***-->

        </div>

        <div class="col-lg-10 col-12 pl-0 pl-lg-4 justify-content-center">
          <div class="text-inner">

            <div class="box info-bar py-0 py-lg-2 mt-0 mt-lg-4 mb-0 mb-sm-1">
              <div class="row d-flex align-items-center flex-row">
                <div class="col-md-6 col-lg-6 col-6 products-showing">
                  <p class="mt-0">Category:<strong>
                      <?php
                      echo $catname->CategoryName;
                      ?>
                    </strong></p>
                  <!--Showing <strong>12</strong> of <strong>25</strong> products-->
                </div>
                <!-- <div class="col-md-12 col-lg-6 products-number-sort"> -->
                <div class="col-md-6 col-lg-6 col-6 products-number-sort d-flex justify-content-end ">
                  <form class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row">
                    <div class="products-number">
                      <!--<strong>Show</strong><a href="#" class="btn btn-sm category-btn active">12</a><a href="#" class="btn category-btn btn-sm">24</a><a href="#" class="btn category-btn btn-sm">All</a><span>products</span>-->
                    </div>
                    <!-- <div class="products-sort-by mt-2 mt-lg-0 form-group"> -->
                    <div class="products-sort-by mt-3 mt-lg-0 form-group d-flex align-items-center">
                      <!-- <strong class="m-0 mr-3">Sort by</strong> -->
                      <strong class="m-0 mr-3 d-none d-lg-block">Sort By</strong>
                      <select name="sort-by" class="form-control cat_sort">
                        <option value="">Price</option>
                        <option value="ASC" <?php if ($sort == 'ASC')
                          echo 'selected'; ?>>Low to high</option>
                        <option value="DESC" <?php if ($sort == 'DESC')
                          echo 'selected'; ?>>High to low</option>
                      </select>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="row">
              <?php
              if (!empty($catres)) {
                foreach ($catres as $resdt) {
                  if (!empty($resdt['ProductImage'])) {

                    $jsondt = json_decode($resdt['ProductImage']);
                    ?>
                    <!-- <div class="col-md-4 product_col"> -->
                    <div class="col-lg-3 col-md-4 col-12 product_col">
                      <div class="bbb_deals">

                        <div class="bbb_deals_slider_container">
                          <div class=" bbb_deals_item">
                            <a
                              href="<?php echo base_url($resdt['slug'] . "/" . 'product_detail/' . base64_encode($resdt['ProductID'])); ?>">
                              <div class="bbb_deals_image text-center">
                                <?php
                                $jsondt = json_decode($resdt['ProductImage']);

                                if (!empty($jsondt)) {
                                  ?>
                                  <img src="<?php echo base_url('admin/public/assets/img/product_images/' . $jsondt[0]); ?>"
                                    alt="#" class="product_image">
                                <?php
                                } else {
                                  ?>
                                  <img src="<?php echo base_url('admin/public/assets/img/product_images/18.jpg'); ?>" alt="#"
                                    class="product_image">
                                <?php
                                }
                                ?>
                              </div>
                              <div class="bbb_deals_content">
                                <div class="bbb_deals_info_line d-flex flex-column justify-content-start">
                                  <div class="bbb_deals_item_name text-capitalize">
                                    <p style="font-size:13px;font-weight:500;">
                                      <?php
                                      $product_name = $resdt['ProductName'];
                                      $limited_name = implode(' ', array_slice(explode(' ', $product_name), 0, 4));
                                      echo $limited_name;
                                      ?>
                                    </p>
                                  </div>
                                  <?php
                                  if (!empty($resdt['ProductPrice'])) {
                                    $productPrice = $resdt['ProductPrice'];
                                    $salePrice = $resdt['Sale_ProductPrice'];
                                    ?>
                                    <div class="bbb_deals_item_price">
                                     <span><?php echo $all_setting_data['currency']; ?><?php echo $salePrice; ?></span>
                                    <span style="text-decoration: line-through; color: #7e7e7e; font-weight: 400; font-size: 13px;">
                                    <?php echo $all_setting_data['currency']; ?><?php echo $productPrice; ?>
                                    </span>
                                    </div>
                                  <?php
                                  } else {
                                    $pricearr = [];
                                    foreach ($varprod as $vardt) {
                                      $pricearr[] = $vardt['VariationPrice'];
                                    }
                                    ?>
                                    <div class="bbb_deals_item_price">
                                      <?php echo $all_setting_data['currency']; ?><?php echo array_sum($pricearr); ?></div>
                                  <?php
                                  }
                                  ?>
                                </div>
                                <div class="available">
                                  <div class="available_bar"><span style="width:17%"></span></div>
                                </div>
                              </div>
                            </a>
                          </div>
                        </div>





                        <div class="row px-2 mt-3 pb-3">
                          <div class="col-lg-10 col-md-10 col-6 p-0">
                            <div class="button d-flex text-start">
                              <form class="addtocartform" action="<?= base_url('addToCart') ?>" method="POST">
                                <input type="hidden" name="productId" value="<?php echo $resdt['ProductID']; ?>">
                                <input type="hidden" name="quantity" value="1" min="1">
                                <!--<a href="<?php //echo base_url('cart'); ?>" class="btn cart_btn link-text mt-3 m-1">Add to Cart</a>-->
                                <button class="btn cart_btn add_cart link-text mt-0 rounded" type="submit">Add to
                                  Cart</button>
                              </form>
                            </div>
                          </div>

                          <!-- <div class="col-lg-6 align-self-center text-right"> -->
                          <div class="col-lg-2 px-0 col-md-2 col-6 align-self-center text-right ct-heart">

                            <?php

                            $session = session();
                            $user_id = $session->get('user_id');


                            if (empty($user_id)) {
                              ?>
                              <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="ti-heart"></i></a>

                            <?php
                            } else {
                              if (!empty($wishlist['Status']) && $wishlist['Status'] == 1 && $wishlist['ProductID'] == $resdt['ProductID']) {
                                ?>
                                <i class="add_wishlist ti-heart mt-2 align-self-center added_wish d-none" id="add_wishlist"
                                  data-id="<?= $resdt['ProductID'] ?>"></i>
                                <i class="align-self-center  remove_wishlist removed_wish ti-heart " id="remove_wishlist"
                                  data-id="<?= $resdt['ProductID'] ?>" style="color: orange;"></i>

                              <?php
                              } else {
                                ?>
                                <i class="add_wishlist ti-heart mt-2 align-self-center added_wish" id="add_wishlist"
                                  data-id="<?= $resdt['ProductID'] ?>"></i>
                                <i class="align-self-center  remove_wishlist removed_wish ti-heart d-none" id="remove_wishlist"
                                  data-id="<?= $resdt['ProductID'] ?>" style="color: orange;"></i>
                                <?php

                              }
                            }
                            ?>
                            <div class="wishlistdata"></div>

                          </div>
                        </div>
                      </div>
                    </div>
                  <?php
                  } else {
                    ?>

                    <?php
                  }
                }
              } else {
                ?>
                <!-- <div class="col-lg-12"><br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <h3 class="text-center">No Product found</h3>
                </div> -->

                <div class="col-lg-12 d-flex align-items-center justify-content-center flex-column">
                  <!--<div><i class="fas fa-search"></i></div>-->
                  <img
                    src="https://cdni.iconscout.com/illustration/premium/thumb/no-product-illustration-download-in-svg-png-gif-file-formats--ecommerce-package-empty-box-online-shopping-pack-e-commerce-illustrations-6632286.png"
                    alt="NOt found" class="auto" style="height:275px;" />
                  <h5 class="text-center text-muted mb-3" style="margin-top:5px;">Oops! No matches found</h5>
                </div>
              <?php
              }
              ?>


            </div>

            <div class="row justify-content-center pb-3">
              <?php if ($pager): ?>
                <?php $pagi_path = 'category/' . base64_encode($id); ?>
                <?php $pager->setPath($pagi_path); ?>
                <?= $pager->links() ?>
              <?php endif; ?>
            </div>



          </div>
        </div>
      </div>
    </div>


  </div>
  </div>
  </div>
  </div>


  </div>
</section>
<br />
<br />
<br />

<?= $this->include('footer') ?>