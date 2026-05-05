<?= $this->include('header') ?>
<style>
	.main-category{
		display: none;
	}
	#order-summary p{
	    font-size: 11px;
    color: #333;
    font-weight: 400;
    margin-top: 8px;
    margin-bottom: 8px;
    line-height:14px;
	}

	@media (max-width: 576px) { 
 .left .btn,
 .right .btn{
    font-size:11px !important;
  }
}

.coupon-list {
    list-style: none;
    padding: 10px 10px 10px 0px;
    margin: 0;
    max-height: 350px; 
    overflow-y: auto; 
    border: none;
    border-radius: 8px; 
}

.coupon-item {
    margin-bottom: 15px;
}

.coupon-card {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 6px 30px;
    border: 1px solid #ddd;
    border-radius: 49px;
    background-color: #f9f9f9;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.coupon-card:hover {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    background-color: #f0f0f0;
}

.coupon-details {
    flex-grow: 1;
}

.coupon-code {
    font-size: 18px;
    font-weight: bold;
    color: #333;
}

.coupon-discount {
    font-size: 12px;
}

.coupon-expiry {
    font-size: 14px;
    color: #777;
    margin-top: 0px;
}

.selectCouponBtn {
    background-color: #f7941d26;
    border: none;
    color: #f7941d;
    padding: 10px 20px;
    border-radius: 25px;
    cursor: pointer;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.4s ease;
}

.selectCouponBtn:hover {
    background-color: #f7941d;
    color:white;
    outline:none;
}

.selectCouponBtn:focus {
    outline:none;
    box-shadow:none;
}

.coupon-list::-webkit-scrollbar {
    width: 8px;
    margin-left:10px;
}

.coupon-list::-webkit-scrollbar-thumb {
    background-color: #cccccc;
    border-radius: 10px;
    margin-left:10px;
}

.order-summary{
	
}


</style>

<?php
$AllsettingsModel = new \App\Models\Allsettingsmodel();
$all_setting_data = $AllsettingsModel->first();
// echo "<pre>jhhhhhh jhhhhhhhh";
// print_r($all_setting_data['currency']);
?>

	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="<?php echo base_url('/'); ?>">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="<?php echo base_url('cart'); ?>">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	
			
	<!-- Shopping Cart -->
	<div class="shopping-cart section1 pt-0">
		<div class="container">
			<?php 
// echo "<pre>"; print_r($cart); 
			if(!empty($cart)){
				?>
				<div class="row">
				<div class="col-md-9 col-12">
					<!-- Shopping Summery -->
					<div class="box rounded mt-0" style="overflow-x: hidden;">
					<form action="" method="POST" id="cartProductList">
						<!--<table class="table shopping-summery" style="margin-left:-10px;">-->
						    <table class="table shopping-summery">
							<thead class="rounded">
								<tr class="main-hading">
									<th>PRODUCT</th>
									<th>NAME</th>
									<th>VARIATION</th>
									<th class="text-center">PRICE</th>
									<th class="text-center">QUANTITY</th>
									<th class="text-center">TOTAL</th> 
									<th class="text-center"><i class="ti-trash remove-icon"></i></th>
								</tr>
							</thead>
							<tbody>
								<?php    
									foreach($cart as $item){
										$imgurl = ($item['ProductImage'])?($item['ProductImage']):('');
										?>
										<tr id="<?php echo $item['id']; ?>">
											<td class="image col-3 col-lg-auto" data-title="No"><img src="<?php echo $imgurl; ?>" alt="#">
											</td>
											<td class="product-des col-4 col-lg-auto" data-title="Description">
												<p class="product-name"><a href="<?php echo base_url($item['slug']."/".'product_detail/'.base64_encode($item['id'])); ?>"><?php  echo $item['name']; ?></a></p>
												<p class="product-des"><?php  echo $item['ProductCartDesc']; ?></p>
											</td>
											<td class="col-2 col-lg-2">
											    <?php
											 //   $VariationName = array_column($item['vari_data'],'VariationName');
											 ////   print_r($VariationName);
											 //   echo implode('-',$VariationName);
											 if(isset($item['vari_data']) && !empty($item['vari_data'])){
											    foreach($item['vari_data'] as $single_vari){
											    echo "<strong>".$single_vari['VariationTypeName'].": </strong>".$single_vari['VariationName'].",<br>";
											   } }else{echo "-";}?>
											</td>
														    
											<td class="price col-3 col-lg-auto" data-title="Price"><span>
											    <?php
														    
														    if(!empty($item['price']))
														    {
														    ?>
															<span><?php echo $all_setting_data['currency']; ?><?php echo $item['unit_price']; ?></span>
															<?php 
														    }
														    else 
														    {
														        $pricearr=[];
														        $variations = new App\Models\Variationmodel();
														        $varia_dt = $variations->where('ProductID',$item['id'])->get()->getResult('array');
														      //  print_r($varia_dt);
														        foreach($varia_dt as $vardt)
														        {
														            $pricearr[]=$vardt['VariationPrice'];
														        }
														    ?>
														    <span><?php echo $all_setting_data['currency']; ?><?php echo array_sum($pricearr);?></span>
														    <?php 
														    }
														    ?>
														    
														    <!--$<?php  //echo $item['unit_price']; ?>-->
														    </span></td>
														    
											<td class="qty col-4 col-lg-auto" data-title="Qty"><!-- Input Order -->
											<?php
										if(!empty($item['price'])){
											    ?>
											
												<div class="input-group pb-2">
													<div class="button minus">
														<button type="button" class="btn btn-primary btn-number"  data-type="minus" data-id="<?php echo $item['id']; ?>" data-price="<?php  echo $item['unit_price']; ?>" data-field="quant[<?php echo $item['id']; ?>]">
															<i class="ti-minus"></i>
														</button>
													</div>
													<input type="text" name="quant[<?php echo $item['id']; ?>]" class="input-number"  data-min="1" data-max="100" value="<?php echo $item['quantity']; ?>">
													<div class="button plus">
														<button type="button" class="btn btn-primary btn-number" data-type="plus" data-id="<?php echo $item['id']; ?>" data-price="<?php  echo $item['unit_price']; ?>" data-field="quant[<?php echo $item['id']; ?>]">
															<i class="ti-plus"></i>
														</button>
													</div>
												</div>
												<?php 
										}
										else{
										     $variations = new App\Models\Variationmodel();
                                            $varia_dt = $variations->where('ProductID', $item['id'])->first();
                                            // print_r($varia_dt);
                                            ?>
										    <div class="input-group">
													<div class="button minus">
														<button type="button" class="btn btn-primary btn-number"  data-type="minus" data-id="<?php echo $varia_dt['ProductID']; ?>" data-price="<?php  echo $varia_dt['VariationPrice']; ?>" data-field="quant[<?php echo $varia_dt['ProductID']; ?>]">
															<i class="ti-minus"></i>
														</button>
													</div>
													<input type="text" name="quant[<?php echo $varia_dt['ProductID']; ?>]" class="input-number"  data-min="1" data-max="100" value="<?php echo $item['quantity']; ?>">
													<div class="button plus">
														<button type="button" class="btn btn-primary btn-number" data-type="plus" data-id="<?php echo $varia_dt['ProductID']; ?>" data-price="<?php  echo $varia_dt['VariationPrice']; ?>" data-field="quant[<?php echo $varia_dt['ProductID']; ?>]">
															<i class="ti-plus"></i>
														</button>
													</div>
												</div>
												<?php 
										}
										?>
										    
										
												<!--/ End Input Order -->
											</td>
											<td class="total_amount col-4 col-lg-auto" data-title="Total" data-id="<?php echo $item['id']; ?>"><span>
											    <?php
														    
														    if(!empty($item['price']))
														    {
														    ?>
															<span class="px-5 px-lg-0"><?php echo $all_setting_data['currency']; ?><?php echo $item['total']; ?></span>
															<?php 
														    }
														    else 
														    {
														        $pricearr=[];
														        $variations = new App\Models\Variationmodel();
														        $varia_dt = $variations->where('ProductID',$item['id'])->get()->getResult('array');
														      //  print_r($varia_dt);
														        foreach($varia_dt as $vardt)
														        {
														            $pricearr[]=$vardt['VariationPrice'];
														        }
														    ?>
														    <span><?php echo $all_setting_data['currency']; ?><?php echo array_sum($pricearr);?></span>
														    <?php 
														    }
														    ?>
											    <!--$<?php  //echo $item['total']; ?>-->
											    </span></td>
											<td class="action col-4 col-lg-auto" data-title="Remove"><a class="removeItem px-5 px-lg-0" data-id="<?php echo $item['id']; ?>" href="javascript:void(0)"><i class="ti-trash remove-icon"></i></a></td>
										</tr>
										<?php
									}
								?>
								
							</tbody>
						</table>
						<input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>" />
					<!--/ End Shopping Summery -->
					</form>
					
					<!-- <div class="box-footer d-flex justify-content-between flex-column flex-lg-row p-4"> -->
					<div class="box-footer d-flex justify-content-between flex-lg-row">
                    	<div class="left"><button class="btn rounded"><a href="<?php echo base_url('product'); ?>" class="link-text"><i class="fa fa-chevron-left"></i> Continue shopping</a></button></div>
						<div class="right d-flex flex-row">
							<button class="btn updateCartbtn rounded"><i class="fa fa-refresh"></i> Update cart</button>
							<!-- <button type="submit" class="btn rounded"><a href="<?php // echo base_url('checkout'); ?>" class="link-text">Proceed to checkout <i class="fa fa-chevron-right"></i></a></button> -->

							<a href="<?php echo base_url('checkout'); ?>" class="link-text">
								<button type="button" class="btn rounded">
									Proceed to checkout <i class="fa fa-chevron-right"></i>
								</button>
							</a>

						</div>
                  	</div>
					
			
                </div>

					<div class="col-sm-6 px-0">
                    <div class="box order-summary rounded">
                        <div class="box-header">
                            <h4 class="mb-0">Coupon code</h4>
                        </div>
                        <?php 
                        $couponCode ="";
                        if (session()->has('couponCode')) {
                            $couponCode = session()->get('couponCode');
                        }
                        ?>
                        <!-- <p class="text-muted">If you have a coupon code, please enter it in the box below.</p> -->
						<p class="text-muted">Select Coupon code according to your preference.</p>
                        <form id="apllyCouponForm" class="apllyCouponForm" action="POST" style="<?php echo ($couponCode!="")?('display:none'):(''); ?>">
                            <div class="input-group">
                                <input type="text" value="<?php echo $couponCode; ?>" name="couponCode" id="couponCode" class="form-control">
                                <!--<span class="input-group-append">-->
                                <!--    <button type="submit" class="btn cart-btn rounded"><i class="fa fa-gift"></i></button>-->
                                <!--</span>-->
                            </div>
                        </form>
                
                        <div id="removeCouponForm" class="removeCouponForm" style="<?php echo ($couponCode=="")?('display:none'):(''); ?>">
                            <div> 
                                <button type="button" class="btn cart-btn removeCoupon "><i class="fa fa-trash"></i></button>
                                Coupon: <span class="couponname"><?= $couponCode; ?></span>
                            </div>
                        </div>
                        
						
                        <div class="coupondata mb-2"></div>
                
                        <!-- Button to Show All Coupons -->
                        <!--<button id="showCouponsBtn" class="btn mt-2 rounded">Show All Coupons</button>-->
                        <button id="showCouponsBtn" class="btn mt-2 rounded">
                            Show All Coupons <i class="fas fa-chevron-down ml-3"></i>
                        </button>
                        
                        <!-- Dropdown for coupons with scroll limit -->
                        <div class="all_copouns mt-2" style="display:none;">
                            <ul class="coupon-list">
                                <?php foreach ($coupons as $coupon): ?>
                                    <li class="coupon-item">
                                        <div class="coupon-card">
                                            <div class="coupon-details">
                                                <!--<div class="coupon-code"><? // $coupon['CouponCode']; ?></div>-->
                    <div class="coupon-code"><?= strlen($coupon['CouponCode']) > 15 ? substr($coupon['CouponCode'], 0, 15) . '...' : $coupon['CouponCode']; ?></div>

                                                <div class="coupon-discount text-muted" style="margin-top:-4px;">Coupon Code</div>
                                                <!--<div class="coupon-expiry">-->
                                                <!--    Valid till: <? // date('d M Y', strtotime($coupon['EndDate'])); ?>-->
                                                <!--</div>-->
                                            </div>
                                            <!--<button type="button" class="selectCouponBtn" data-coupon-code="<?= $coupon['CouponCode']; ?>">-->
                                            <!--    Apply-->
                                            <!--</button>-->
                                            <!-- Button to trigger coupon application -->
                                            <button id="applyCouponButton" class="btn btn-primary  selectCouponBtn" data-coupon-code="<?= $coupon['CouponCode']; ?>">Apply</button>

                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

				</div>
				<div class="col-lg-3">
					<div id="order-summary" class="order-summary box mt-0">
						<div class="box-header">
							<h4 class="mb-0">Order Summary</h4>
						</div>
						<p class="text-muted my-2" >Shipping and additional costs are calculated based on the values you have entered.</p>
						<div class="table-responsive">
						
							<table class="table order-summary-table">
							   
								<tbody>
								<tr>
									<td class="text-dark">Subtotal</td>
									<th><?php echo $all_setting_data['currency']; ?><?php echo number_format($CartTotals->subtotal, 2); ?></th>
								</tr>

								
								<!-- <tr>
									<td class="text-dark">Shipping Cost</td>
									<th> -->
										<?php 
											// if ($CartTotals->shippingCost == 0) {
											// 	// echo "Free shipping";
											// } else {
											// 	// echo $all_setting_data['currency'] . number_format($CartTotals->shippingCost, 2);
											// }
										?>
									<!-- </th>
								</tr> -->
								

								<?php 
									
									if ($isShippingEnabled): ?>
										<tr>
											<td class="text-dark">Shipping Cost</td>
											<th>
												<?php
												if ($CartTotals->shippingCost == 0) {
													echo "Free shipping";
												} else {
													echo $all_setting_data['currency'] . number_format($CartTotals->shippingCost, 2);
												}
												?>
											</th>
										</tr>
									<?php endif;
								?>


								<!-- <tr>
									<td class="text-dark">Tax</td>
									<th>
										<?php //echo $all_setting_data['currency']; ?><?php // echo number_format($CartTotals->tax, 2); ?></th>
								</tr> -->


								<?php 
									if ($isTaxEnabled): ?>
										<tr>
										<td class="text-dark">Tax</td>
										  <th><?php echo $all_setting_data['currency']; ?><?php echo number_format($CartTotals->tax, 2); ?></th>
										</tr>
									<?php endif;
								?>


								<?php 
									if($CartTotals->DiscountPrice>0)
									{
										?>
											<tr class="Discount">
												<td class="text-dark">Discount</td>
												<th><?php echo $all_setting_data['currency']; ?><?php echo number_format($CartTotals->DiscountPrice, 2); ?></th>
											</tr>
										<?php
									} 
								?>
								<tr class="total">
									<td class="text-dark">Total</td>
									<th><?php echo $all_setting_data['currency']; ?><?php echo number_format($CartTotals->totalWithShipping, 2); ?></th>
								</tr>
								
								</tbody>
							</table>
						</div>
					</div>
					
				</div>
			</div>
				<?php
			}else{
				?>
					<div class="container-fluid empty-cart  mt-100 mb-5">
						<div class="row">
						
							<div class="col-md-12">
							
									<div class="card">
        								<div class="card-header">
        								<h5>Cart</h5>
        								</div>
        								<div class="card-body cart">
        										<div class="col-sm-12 empty-cart-cls text-center p-5">
        											
        											<h3><strong>Your shopping cart is empty</strong></h3>
        											<p style="font-size:100px; margin-top:15px;">
                   <!--             Return to the store to add items for your delivery slot. Before proceed to checkout you must add some products to your shopping cart. You will find a lot of interesting products on our shop page.-->
                   <i class="fa-solid fa-box-open"></i>
                            </p>
        											<a href="product" class="rounded btn btn-primary cart_btn cart-btn-transform m-3 text-white" data-abc="true">continue shopping</a>
        											
        										</div>
        								</div>
						            </div>
								
							</div>
						
						</div>
						
						</div>
				<?php
			}
			?>
			
			
		</div>
		
	</div>
	<!--/ End Shopping Cart -->
				

		

<?= $this->include('footer') ?>
<script>

$(document).ready(function() {
  
    $('#showCouponsBtn').on('click', function() {
        $('.all_copouns').slideToggle(); 
    });

    
    $(document).on('click', '.selectCouponBtn', function() {
        var couponCode = $(this).data('coupon-code');
        $('#couponCode').val(couponCode); 
        $('.all_copouns').slideUp(); 
        $('#apllyCouponForm').submit(); 
    });

   
    $('.removeCoupon').on('click', function() {
        $('#couponCode').val(''); 
        $('#apllyCouponForm').show(); 
        $('#removeCouponForm').hide(); 
    });
});

</script>