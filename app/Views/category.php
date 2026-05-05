<?= $this->include('header') ?>
<style>
  .main-category{
    display: none;
  }
  .btn{
      text-transform:capitalize !important;
  }
</style>

<section class="">

<div class="">
	<div class="container">
		<div class="row no-gutters">
		    
		    <div class="col-lg-3">
              <!--
              *** MENUS AND FILTERS ***
              _________________________________________________________
              -->
              <div class="card sidebar-menu mb-4">
               
                <div class="card-body">
                  <ul class="nav nav-pills flex-column category-menu">
                    <li><a href="<?php echo base_url(
                        'category'
                    ); ?>" class="nav-link">Men <span class="badge badge-secondary">42</span></a>
                      <ul class="list-unstyled">
                        <li><a href="<?php echo base_url(
                            'category'
                        ); ?>" class="nav-link">T-shirts</a></li>
                        <li><a href="<?php echo base_url(
                            'category'
                        ); ?>" class="nav-link">Shirts</a></li>
                        <li><a href="<?php echo base_url(
                            'category'
                        ); ?>" class="nav-link">Pants</a></li>
                        <li><a href="<?php echo base_url(
                            'category'
                        ); ?>" class="nav-link">Accessories</a></li>
                      </ul>
                    </li>
                    <li><a href="<?php echo base_url(
                        'category'
                    ); ?>" class="nav-link active">Ladies  <span class="badge badge-light">123</span></a>
                      <ul class="list-unstyled">
                        <li><a href="<?php echo base_url(
                            'category'
                        ); ?>" class="nav-link">T-shirts</a></li>
                        <li><a href="<?php echo base_url(
                            'category'
                        ); ?>" class="nav-link">Skirts</a></li>
                        <li><a href="<?php echo base_url(
                            'category'
                        ); ?>" class="nav-link">Pants</a></li>
                        <li><a href="<?php echo base_url(
                            'category'
                        ); ?>" class="nav-link">Accessories</a></li>
                      </ul>
                    </li>
                    <li><a href="<?php echo base_url(
                        'category'
                    ); ?>" class="nav-link">Kids  <span class="badge badge-secondary">11</span></a>
                      <ul class="list-unstyled">
                        <li><a href="<?php echo base_url(
                            'category'
                        ); ?>" class="nav-link">T-shirts</a></li>
                        <li><a href="<?php echo base_url(
                            'category'
                        ); ?>" class="nav-link">Skirts</a></li>
                        <li><a href="<?php echo base_url(
                            'category'
                        ); ?>" class="nav-link">Pants</a></li>
                        <li><a href="<?php echo base_url(
                            'category'
                        ); ?>" class="nav-link">Accessories</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card sidebar-menu mb-4">
                <div class="card-header">
                  <h3 class="h4 card-title">Brands <a href="#" class="btn link-text pull-right"><i class="fa fa-times-circle"></i> Clear</a></h3>
                </div>
                <div class="card-body">
                  <form>
                    <div class="form-group">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Armani  (10)
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Versace  (12)
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Carlo Bruni  (15)
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Jack Honey  (14)
                        </label>
                      </div>
                    </div>
                    <button class="btn btn-default"><i class="fa fa-pencil"></i> Apply</button>
                  </form>
                </div>
              </div>
              <div class="card sidebar-menu mb-4">
                <div class="card-header">
                  <h3 class="h4 card-title">Colours <a href="#" class="btn link-text pull-right"><i class="fa fa-times-circle"></i> Clear</a></h3>
                </div>
                <div class="card-body">
                  <form>
                    <div class="form-group">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"><span class="colour white"></span> White (14)
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"><span class="colour blue"></span> Blue (10)
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"><span class="colour green"></span>  Green (20)
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"><span class="colour yellow"></span>  Yellow (13)
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"><span class="colour red"></span>  Red (10)
                        </label>
                      </div>
                    </div>
                    <button class="btn btn-default"><i class="fa fa-pencil"></i> Apply</button>
                  </form>
                </div>
              </div>
              <!-- *** MENUS AND FILTERS END ***-->
              
            </div>
            
			<div class="col-lg-9 col-12 pl-5 justify-content-center">
				<div class="text-inner">
				    
				     <div class="box info-bar">
                <div class="row">
                  <div class="col-md-12 col-lg-4 products-showing">Showing <strong>12</strong> of <strong>25</strong> products</div>
                  <div class="col-md-12 col-lg-7 products-number-sort">
                    <form class="form-inline d-block d-lg-flex justify-content-between flex-column flex-md-row">
                      <div class="products-number"><strong>Show</strong><a href="#" class="btn btn-sm category-btn active">12</a><a href="#" class="btn category-btn btn-sm">24</a><a href="#" class="btn category-btn btn-sm">All</a><span>products</span></div>
                      <div class="products-sort-by mt-2 mt-lg-0">
                          <strong>Sort by</strong>
                        <select name="sort-by" class="form-control">
                          <option>Price</option>
                          <option>Name</option>
                          <option>Sales first</option>
                        </select>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
					
				    <div class="row">
				        <div class="col-md-4 product_col">
				            <!-- bbb_deals -->
				            <div class="bbb_deals">
				                <div class="ribbon ribbon-top-right"><span><small class="cross">x </small>4</span></div>
				                <div class="bbb_deals_title">Today's Combo Offer</div>
				                <div class="bbb_deals_slider_container">
				                    <div class=" bbb_deals_item">
				                        <div class="bbb_deals_image"><img src="<?php echo base_url(); ?>public/images/mini-banner1.jpg" alt="#"></div>
				                        <div class="bbb_deals_content">
				                            <div class="bbb_deals_info_line d-flex flex-row justify-content-start mt-2 mb-2">
				                                <div class="bbb_deals_item_category"><a href="#">Summer Travel Collection</a></div>
				                                <div class="bbb_deals_item_price_a ml-auto"><strike>₹300</strike></div>
				                            </div>
				                            <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
				                                <div class="bbb_deals_item_name">HP Notebook</div>
				                                <div class="bbb_deals_item_price ml-auto">₹25,550</div>
				                            </div>
				                            <div class="available">
				                                <div class="available_line d-flex flex-row justify-content-start mt-2 mb-2">
				                                    <div class="available_title">Available: <span>6</span></div>
				                                    <div class="sold_stars ml-auto"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
				                                </div>
				                                <div class="available_bar"><span style="width:17%"></span></div>
				                            </div>
				                        </div>
				                    </div>
				                </div>
				                <div class="button d-flex text-center">
									<a href="<?php echo base_url(
             'single_product'
         ); ?>" class="btn link-text mt-3 m-1">View Details</a>
									<a href="<?php echo base_url(
             'cart'
         ); ?>" class="btn cart_btn link-text mt-3 m-1">Add to Cart</a>
								</div>
				            </div>
				            
				        </div>
				        <div class="col-md-4 product_col">
				            <!-- bbb_deals -->
				            <div class="bbb_deals">
				                <div class="ribbon ribbon-top-right"><span><small class="cross">x </small>2</span></div>
				                <div class="bbb_deals_title">Today's Combo Offer</div>
				                <div class="bbb_deals_slider_container">
				                    <div class=" bbb_deals_item">
				                        <div class="bbb_deals_image"><img src="<?php echo base_url(); ?>public/images/mini-banner2.jpg" alt="#"></div>
				                        <div class="bbb_deals_content">
				                            <div class="bbb_deals_info_line d-flex flex-row justify-content-start mt-2 mb-2">
				                                <div class="bbb_deals_item_category"><a href="#">Awesome Bag</a></div>
				                                <div class="bbb_deals_item_price_a ml-auto"><strike>₹400</strike></div>
				                            </div>
				                            <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
				                                <div class="bbb_deals_item_name">HP Envy</div>
				                                <div class="bbb_deals_item_price ml-auto">₹35,550</div>
				                            </div>
				                            <div class="available">
				                                <div class="available_line d-flex flex-row justify-content-start mt-2 mb-2">
				                                    <div class="available_title">Available: <span>6</span></div>
				                                    <div class="sold_stars ml-auto"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
				                                </div>
				                                <div class="available_bar"><span style="width:17%"></span></div>
				                            </div>
				                        </div>
				                    </div>
				                </div>
				                <div class="button d-flex text-center">
									<a href="<?php echo base_url(
             'single_product'
         ); ?>" class="btn link-text mt-3 m-1">View Details</a>
									<a href="<?php echo base_url(
             'cart'
         ); ?>" class="btn cart_btn link-text mt-3 m-1">Add to Cart</a>
								</div>
				            </div>
				        </div>
				        <div class="col-md-4 product_col">
				            <!-- bbb_deals -->
				            <div class="bbb_deals">
				                <div class="ribbon ribbon-top-right"><span><small class="cross">x </small>3</span></div>
				                <div class="bbb_deals_title">Today's Combo Offer</div>
				                <div class="bbb_deals_slider_container">
				                    <div class=" bbb_deals_item">
				                        <div class="bbb_deals_image"><img src="<?php echo base_url(); ?>public/images/mini-banner3.jpg" alt="#"></div>
				                        <div class="bbb_deals_content">
				                            <div class="bbb_deals_info_line d-flex flex-row justify-content-start mt-2 mb-2">
				                                <div class="bbb_deals_item_category"><a href="#">Mid Season</a></div>
				                                <div class="bbb_deals_item_price_a ml-auto"><strike>₹500</strike></div>
				                            </div>
				                            <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
				                                <div class="bbb_deals_item_name">Toshiba B77</div>
				                                <div class="bbb_deals_item_price ml-auto">₹27,550</div>
				                            </div>
				                            <div class="available">
				                                <div class="available_line d-flex flex-row justify-content-start mt-2 mb-2">
				                                    <div class="available_title">Available: <span>6</span></div>
				                                    <div class="sold_stars ml-auto"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
				                                </div>
				                                <div class="available_bar"><span style="width:17%"></span></div>
				                            </div>
				                        </div>
				                    </div>
				                </div>
				                <div class="button d-flex text-center">
									<a href="<?php echo base_url(
             'single_product'
         ); ?>" class="btn link-text mt-3 m-1">View Details</a>
									<a href="<?php echo base_url(
             'cart'
         ); ?>" class="btn cart_btn link-text mt-3 m-1">Add to Cart</a>
								</div>
				            </div>
				        </div>
				    

									</div>

			<div class="row justify-content-center">
				        <div class="col-md-4 mb-5">
				            <!-- bbb_deals -->
				            <div class="bbb_deals">
				                <div class="ribbon ribbon-top-right"><span><small class="cross">x </small>4</span></div>
				                <div class="bbb_deals_title">Today's Combo Offer</div>
				                <div class="bbb_deals_slider_container">
				                    <div class=" bbb_deals_item">
				                        <div class="bbb_deals_image"><img src="<?php echo base_url(); ?>public/images/mini-banner1.jpg" alt="#"></div>
				                        <div class="bbb_deals_content">
				                            <div class="bbb_deals_info_line d-flex flex-row justify-content-start mt-2 mb-2">
				                                <div class="bbb_deals_item_category"><a href="#">Travel Collection</a></div>
				                                <div class="bbb_deals_item_price_a ml-auto"><strike>₹300</strike></div>
				                            </div>
				                            <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
				                                <div class="bbb_deals_item_name">HP Notebook</div>
				                                <div class="bbb_deals_item_price ml-auto">₹25,550</div>
				                            </div>
				                            <div class="available">
				                                <div class="available_line d-flex flex-row justify-content-start mt-2 mb-2">
				                                    <div class="available_title">Available: <span>6</span></div>
				                                    <div class="sold_stars ml-auto"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
				                                </div>
				                                <div class="available_bar"><span style="width:17%"></span></div>
				                            </div>
				                        </div>
				                    </div>
				                </div>
				                <div class="button d-flex text-center">
									<a href="<?php echo base_url(
             'single_product'
         ); ?>" class="btn link-text mt-3 m-1">View Details</a>
									<a href="<?php echo base_url(
             'cart'
         ); ?>" class="btn cart_btn link-text mt-3 m-1">Add to Cart</a>
								</div>
				            </div>
				            
				        </div>
				        <div class="col-md-4 mb-5">
				            <!-- bbb_deals -->
				            <div class="bbb_deals">
				                <div class="ribbon ribbon-top-right"><span><small class="cross">x </small>2</span></div>
				                <div class="bbb_deals_title">Today's Combo Offer</div>
				                <div class="bbb_deals_slider_container">
				                    <div class=" bbb_deals_item">
				                        <div class="bbb_deals_image"><img src="<?php echo base_url(); ?>public/images/mini-banner2.jpg" alt="#"></div>
				                        <div class="bbb_deals_content">
				                            <div class="bbb_deals_info_line d-flex flex-row justify-content-start mt-2 mb-2">
				                                <div class="bbb_deals_item_category"><a href="#">Awesome Bag</a></div>
				                                <div class="bbb_deals_item_price_a ml-auto"><strike>₹400</strike></div>
				                            </div>
				                            <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
				                                <div class="bbb_deals_item_name">HP Envy</div>
				                                <div class="bbb_deals_item_price ml-auto">₹35,550</div>
				                            </div>
				                            <div class="available">
				                                <div class="available_line d-flex flex-row justify-content-start mt-2 mb-2">
				                                    <div class="available_title">Available: <span>6</span></div>
				                                    <div class="sold_stars ml-auto"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
				                                </div>
				                                <div class="available_bar"><span style="width:17%"></span></div>
				                            </div>
				                        </div>
				                    </div>
				                </div>
				                <div class="button d-flex text-center">
									<a href="<?php echo base_url(
             'single_product'
         ); ?>" class="btn link-text mt-3 m-1">View Details</a>
									<a href="<?php echo base_url(
             'cart'
         ); ?>" class="btn cart_btn link-text mt-3 m-1">Add to Cart</a>
								</div>
				            </div>
				        </div>
				        <div class="col-md-4 mb-5">
				            <!-- bbb_deals -->
				            <div class="bbb_deals">
				                <div class="ribbon ribbon-top-right"><span><small class="cross">x </small>3</span></div>
				                <div class="bbb_deals_title">Today's Combo Offer</div>
				                <div class="bbb_deals_slider_container">
				                    <div class=" bbb_deals_item">
				                        <div class="bbb_deals_image"><img src="<?php echo base_url(); ?>public/images/mini-banner3.jpg" alt="#"></div>
				                        <div class="bbb_deals_content">
				                            <div class="bbb_deals_info_line d-flex flex-row justify-content-start mt-2 mb-2">
				                                <div class="bbb_deals_item_category"><a href="#">Mid Season</a></div>
				                                <div class="bbb_deals_item_price_a ml-auto"><strike>₹500</strike></div>
				                            </div>
				                            <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
				                                <div class="bbb_deals_item_name">Toshiba B77</div>
				                                <div class="bbb_deals_item_price ml-auto">₹27,550</div>
				                            </div>
				                            <div class="available">
				                                <div class="available_line d-flex flex-row justify-content-start mt-2 mb-2">
				                                    <div class="available_title">Available: <span>6</span></div>
				                                    <div class="sold_stars ml-auto"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
				                                </div>
				                                <div class="available_bar"><span style="width:17%"></span></div>
				                            </div>
				                        </div>
				                    </div>
				                </div>
				                <div class="button d-flex text-center">
									<a href="<?php echo base_url(
             'single_product'
         ); ?>" class="btn link-text mt-3 m-1">View Details</a>
									<a href="<?php echo base_url(
             'cart'
         ); ?>" class="btn cart_btn link-text mt-3 m-1">Add to Cart</a>
								</div>
				            </div>
				        </div>
				    </div>
				    <div class="row justify-content-center">
				    <p class="loadMore"><a href="#" class="btn text-white btn-lg"><i class="fa fa-chevron-down"></i> Load more</a></p>
				    </div>
				    <div class="row justify-content-center">
				        <nav aria-label="Page navigation example">
                          <ul class="product-pagination pagination">
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
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


<?= $this->include('footer') ?>
