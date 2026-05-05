<?= $this->include('header') ?>
<style>
	.main-category{
		display: none;
	}
</style>

	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="<?php echo base_url(
           '/'
       ); ?>">Home<i class="ti-arrow-right"></i></a></li>
							<li><a href="<?php echo base_url(
           'orders'
       ); ?>">My orders<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="<?php echo base_url(
           'customer_order'
       ); ?>">Order # <?php echo $all_order_data['OrderNumber']; ?></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
	
	
		<div id="customer-order" class="col-lg-12 mb-5">
               <div class="card account-card">
                <div class="card-body">
                <h2 class="">Order <?php echo $all_order_data['OrderNumber']; ?> </h2>
                <p class="">Order <?php echo $all_order_data['OrderNumber']; ?> was placed on <strong><?php echo $all_order_data['OrderDate']; ?></strong> and is currently <strong>
                    <?php echo $all_order_data['OrderStatus']; ?>
                           
                            
                    </strong>.</p>
                <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
                <hr>
                <div class="table-responsive mb-4">
                  <table class="table customer-order">
                    <thead>
                      <tr>
                          <th>Sr no.</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <!--<th>Discount</th>-->
                        <th>Total</th>
                      </tr>
                    </thead>
                   
                    
                    <tbody>
                    <?php
                      $i=1;
                        $pricearr=[];
                        foreach($all_product_data as $single_product_data)
                        {
                           $b=(json_decode($single_product_data['ProductImage']));
                        //   die;
                           $pricearr[]=$single_product_data['Price'];
                      ?>
                    <tr>
                      <td scope="row"><?php echo $i; ?></td>
                      
                    
                      <td>
                          <img src="<?php echo base_url(); ?>admin/public/assets/img/product_images/<?php echo $b[0]; ?>"  height="50" width="50">
                        </td>
                     
                      <td><?php if(!empty($single_product_data['Quantity'])) { echo $single_product_data['Quantity'];} else{ echo "NA";}?></td>
                      <td><?php if(!empty($single_product_data['Price'])) {echo $single_product_data['Price'];} else{ echo "NA";}?></td>
                       <td>
                           <?php
                            $quantity = $single_product_data['Quantity'];
                        $price = $single_product_data['Price'];
                       
                       if($quantity!='N/A' && $price!='N/A')
                       {
                        echo $total = $quantity * $price;
                       }
                      
                        ?>
                   
                           </td>
                     
                
                    
                    </tr>
                    <?php
                        $i++;
                        }
                        ?>
 
       
      </tbody>
      
                    
                    <tfoot>
                      <tr>
                        <th colspan="4" class="text-right">Order Subtotal</th>
                        <?php
                        $totalprice = array_sum($pricearr);
                        ?>
                        <th>
                               <?php echo $totalprice; ?>
                            </th>
                      </tr>
                      
                      <tr>
                        <th colspan="4" class="text-right">Tax</th>
                        <th><?php echo ($totalprice*10/100)+10; ?></th>
                      </tr>
                      <tr>
                        <th colspan="4" class="text-right">Total</th>
                         <th>
                               <?php echo $all_order_data['TotalAmount']; ?>
                            </th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.table-responsive-->
               
              </div>
            </div>
	</div>
	<!--/ End Shopping Cart -->
			
	<!-- Start Shop Services Area  -->
	<section class="shop-services section">
		<div class="container">
				<div class="row" style="width:1140px;">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over $100</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
	
	<!-- Start Shop Newsletter  -->
	<section class="shop-newsletter section">
		<div class="container">
			<div class="inner-top">
				<div class="row" style="width:1140px;">
					<div class="col-lg-8 offset-lg-2 col-12">
						<!-- Start Newsletter Inner -->
						<div class="inner">
							<h4>Newsletter</h4>
							<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
							<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
								<input name="EMAIL" placeholder="Your email address" required="" type="email">
								<button class="btn">Subscribe</button>
							</form>
						</div>
						<!-- End Newsletter Inner -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
	
	
	
	<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
									<div class="product-gallery">
										<div class="quickview-slider-active">
											<div class="single-slider">
												<img src="images/modal1.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal2.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal3.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal4.jpg" alt="#">
											</div>
										</div>
									</div>
								<!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>Flared Shift Dress</h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 customer review)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                        </div>
                                    </div>
                                    <h3>$29.00</h3>
                                    <div class="quickview-peragraph">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                                    </div>
									<div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">Size</h5>
												<select>
													<option selected="selected">s</option>
													<option>m</option>
													<option>l</option>
													<option>xl</option>
												</select>
											</div>
											<div class="col-lg-6 col-12">
												<h5 class="title">Color</h5>
												<select>
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div>
										</div>
									</div>
                                    <div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div>
									<div class="add-to-cart">
										<a href="#" class="btn">Add to cart</a>
										<a href="#" class="btn min"><i class="ti-heart"></i></a>
										<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
									</div>
                                    <div class="default-social">
										<h4 class="share-now">Share:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div></div></div>
        </div>
        <!-- Modal end -->
	
<?= $this->include('footer') ?>