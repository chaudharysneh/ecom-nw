<?= $this->include('header') ?>
<style>
	.main-category{
		display: none;
	}
</style>

<?php
$AllsettingsModel = new \App\Models\Allsettingsmodel();
$all_setting_data = $AllsettingsModel->first();
?>
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
							<li class="active">Order Details</li>
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
	<div class="col-lg-3 col-12">
              <!--
              *** CUSTOMER MENU ***
              _________________________________________________________
              -->
              <div class="card sidebar-menu">
                <div class="card-header customer_heading">
                  <h4 class="card-title">Customer section</h4>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills flex-column">
                      <a href="<?php echo base_url(
                          'orders'
                      ); ?>" class="nav-link active"><i class="fa fa-list"></i> My orders</a>
                      <a href="<?php echo base_url(
                          'wishlist'
                      ); ?>" class="nav-link"><i class="fa fa-heart"></i> My wishlist</a>
                      <a href="<?php echo base_url(
                          'my_account'
                      ); ?>" class="nav-link"><i class="fa fa-user"></i> My account</a>
                      <a href="<?php echo base_url(
                          '/'
                      ); ?>" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a>
                  </ul>
                </div>
              </div>
              <!-- /.col-lg-3-->
              <!-- *** CUSTOMER MENU END ***-->
            </div>
	
		<div id="customer-order" class="col-lg-9 mb-5">
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
                        <th>Variation</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <!--<th>Discount</th>-->
                        <th>Total</th>
                      </tr>
                    </thead>
                   
                    
                    <tbody>
      <?php
                      $i=1;
                      $subtot=0; 
                    //   echo "<pre>";print_r($all_product_data);
                    
                        foreach($all_product_data as $single_product_data)
                        {
                        //   print_r($single_product_data);
                           $b=(json_decode($single_product_data['ProductImage']));
                        //   die;

                      ?>
                    <tr>
                      <td scope="row"><?php echo $i; ?></td>
                      
                    
                      <td>
                          <img src="<?php echo base_url(); ?>admin/public/assets/img/product_images/<?php echo $b[0]; ?>"  height="50" width="50">
                        </td>
                     <td>
                         <?php 
                         if(!empty($single_product_data['variation_details'])){
                             $arr=json_decode($single_product_data['variation_details'],true);
                            //  echo "<pre>";print_r($arr);
                             $resultString = implode(',', array_map(function($type, $name) {
                                    return "<strong>".$type."</strong>:".$name."<br>";
                                }, $arr['VariationTypeName'], $arr['VariationName']));
                                echo $resultString;
                            // foreach($arr as $key=>$single_data){
                              
                            //     foreach($single_data as $key1=>$data){
                                  
                            //     }
                            // }
                         }else{
                             echo "-";
                         }
                         ?>
                         
                     </td>
                      <td><?php if(!empty($single_product_data['Quantity'])) { echo $single_product_data['Quantity'];} else{ echo "NA";}?></td>
                      <td><?php if(!empty($single_product_data['Price'])) {echo $all_setting_data['currency'] .$single_product_data['Price'];} else{ echo "NA";}?></td>
                       <td>
                           <?php
                            $quantity = $single_product_data['Quantity'];
                        $price = $single_product_data['Price'];
                       $subtot=$subtot+($quantity*$price);
                       if($quantity!='N/A' && $price!='N/A')
                       {
                        echo $all_setting_data['currency'].$total = $quantity * $price;
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
                        <th colspan="5" class="text-right">Order Subtotal</th>
                    <?php 
                        // $quantity = $single_product_data['Quantity'];
                        // $price = $single_product_data['Price'];
                      //  $total = $quantity * $price;
                   
                        ?>
                        <th>
                               <?php echo $all_setting_data['currency'].number_format($subtot ,2); ?>
                            </th>
                      </tr>
                      <!--<tr>-->
                      <!--  <th colspan="5" class="text-right">Shipping and handling</th>-->
                      <!--  <th>$10.00</th>-->
                      <!--</tr>-->
                      <tr>
                        <th colspan="5" class="text-right">Tax (+)</th>
                        <th><?php echo $all_setting_data['currency']; ?><?php echo number_format($all_order_data['totalTax'], 2); ?></th>
                      </tr>

                      <?php if ($all_order_data['totalDiscount'] > 0): ?>
                            <tr>
                                <th colspan="5" class="text-right">Discount (-)</th>
                                <!--<th>$<?php // echo $all_order_data['totalDiscount']; ?></th>-->
                                <th><?php echo $all_setting_data['currency']; ?><?php echo number_format($all_order_data['totalDiscount'], 2); ?></th>
                            </tr>
                        <?php endif; ?>

                      <?php if ($all_order_data['totalShipingCost'] > 0): ?>
                        <tr>
                            <th colspan="5" class="text-right">Shipping Charges (+)</th>
                            <th><?php echo $all_setting_data['currency']; ?><?php echo number_format($all_order_data['totalShipingCost'], 2); ?></th>
                        </tr>
                    <?php endif; ?>

                      <tr>
                        <th colspan="5" class="text-right">Total</th>
                         <th>
                             <?php //echo $subtot+($subtot*10/100)+10; ?>
                               <?php echo $all_setting_data['currency'].number_format($all_order_data['TotalAmount'], 2); ?>
                            </th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.table-responsive-->
                <div class="row addresses">
                    
                  <div class="col-lg-6">
                    <h2>Invoice Address</h2>
                    <p><?php echo  $all_user_data['UserFirstName']; ?> <?php echo $all_user_data['UserLastName']; ?><br><?php echo $all_user_data['UserAddress']; ?><br><?php echo $all_user_data['UserAddress2']; ?><br><?php echo $user_data->CountryName;  ?></p>
                  </div>
                  
                   <div class="col-lg-6">
                    <h2>Shipping Address</h2>
                    <p><?php echo  $all_user_data['UserFirstName']; ?> <?php echo $all_user_data['UserLastName']; ?><br><?php echo $all_user_data['UserAddress']; ?><br><?php echo $all_user_data['UserAddress2']; ?><br><?php echo $user_data->CountryName;  ?></p>
                  </div>
                  
                  
                  <!--<div class="col-lg-6">-->
                  <!--  <h2>Shipping Address</h2>-->
                  <!--  <p>John Brown<br>13/25 New Avenue<br>New Heaven<br>45Y 73J<br>England<br>Great Britain</p>-->
                  <!--</div>-->
                  
                  
                </div>
              </div>
            </div>
	</div>
	<!--/ End Shopping Cart -->

	
	
	
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