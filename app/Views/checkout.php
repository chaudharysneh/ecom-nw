<?= $this->include('header') ?>

<style>
	.shadow {
		box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
		border-radius: 0.25rem !important;
	}

	.main-category {
		display: none;
	}

	a.loginbtn {
		text-decoration: underline;
		color: blue;
		/*font-size: 20px;*/
	}

	.checkout1 {
		background: #fff;
		padding-bottom: 12px;
	}

	.breadcrumbs {
		background-color: #F6F7FB;
		position: relative;
		padding-top: 15px;
		padding-bottom: 0px;
	}

	#semiTransparenDiv {
		width: 100%;

		/*-Lets Center the Spinner-*/
		position: fixed;
		left: 0;
		right: 0;
		top: 0;
		bottom: 0;

		/*Centering my shade */
		margin-bottom: 40px;
		margin-top: 60px;

		background-color: rgba(255, 255, 255, 0.7);
		z-index: 9999;
		display: none;
	}

	@-webkit-keyframes spin {
		from {
			-webkit-transform: rotate(0deg);
		}

		to {
			-webkit-transform: rotate(360deg);
		}
	}

	@keyframes spin {
		from {
			transform: rotate(0deg);
		}

		to {
			transform: rotate(360deg);
		}
	}

	#semiTransparenDiv::after {
		content: '';
		display: block;
		position: absolute;
		left: 48%;
		top: 40%;
		width: 80px;
		height: 80px;
		border-style: solid;
		border: 5px solid black;
		border-top-color: #6CC4EE;
		border-width: 7px;
		border-radius: 50%;
		-webkit-animation: spin .8s linear infinite;

		/* Lets make it go round */
		animation: spin .8s linear infinite;
	}

	.modal-dialog {
		max-width: 630px;
	}

	.address_radio {
		width: 17px;
		height: 20px;
		margin: 40px;
	}

	.modal-content {
		border-radius: 8px !important;
	}

	.modal-dialog .modal-content .modal-header .close {
		height: 26px;
		width: 26px;
		line-height: 25px;
		font-size: 14px;
	}
</style>

<?php
$payurl = "https://www.sandbox.paypal.com/cgi-bin/webscr";
// $payid= "sb-m1dgv@business.example.com"; // nishank id

$paypal_details = json_decode($paymentgateway[2]['details']);
$payid = $paypal_details->merchant_email;
// $payid= "sb-avo4c21567069@business.example.com";


//$payid= "sb-ew9cj22223037@business.example.com";
$itemPrice = $CartTotals->totalWithShipping;
$curreny = 'USD';
$session = \Config\Services::session();

?>

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
						<li><a href="<?php echo base_url('/'); ?>">Home<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="<?php echo base_url('checkout'); ?>">Checkout</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<div class="succ_msg"></div>
<!-- Start Checkout -->
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<section class="checkout1">
				<?php
				if (empty($cart)) {
					?>
					<div class="card">
						<div class="card-header">
							<h5>Checkout</h5>
						</div>
						<div class="card-body cart">
							<div class="col-sm-12 empty-cart-cls text-center p-5">
								<h3><strong>Your shopping cart is empty</strong></h3>
								<p> Please add your product in cart </p>
								<a href="product" class="btn rounded text-white btn-primary cart_btn cart-btn-transform m-3"
									data-abc="true">Continue Shopping</a>
							</div>
						</div>
					</div>
					<?php
				} else {

				}
				?>
			</section>
		</div>
	</div>
</div>

<section class="shop checkout section" style="padding-top:0px;">
	<div class="container">
		<form id="checkoutsubmiform">
			<?php
			$user_id = $session->get('user_id');
			$merchant_order_id = $user_id . "rozar-" . date("YmdHis");
			?>
			<input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
			<input type="hidden" name="merchant_order_id" id="merchant_order_id"
				value="<?php echo $merchant_order_id; ?>" />
			<?php
			$session = session();


			if (!empty($user_id)) {
				?>

				<?php
			} else {
				?>

				<?php
				if (!empty($cart)) {
					?>


					<strong class="text text-danger mb-3">If you have already account , Please Login from here</strong>
					<a href="#" class="loginbtn text" data-toggle="modal" data-target="#exampleModal">Login</a>
					<?php
				}
				?>
				<?php
			}
			?>
			<div class="row">
				<div class="col-lg-8 col-12">
					<?php
					foreach ($all_address_data as $key => $single_order_data) {

						if ($key == 0) {//   print_r($single_order_data);
							// die;
							?>
							<div class="checkout-form card p-4 mt-4">
								<div class="row">
									<div class="col-lg-8">
										<p class="font-weight-bold mb-2 text-dark text-capitalize">
											<?= $single_order_data['first_name']; ?> 		<?= $single_order_data['last_name']; ?>
										</p>
										<span class="mt-0"><?= $single_order_data['address']; ?></span><br>
										<span class="mt-0"><?= $single_order_data['city']; ?>,
											<?= $single_order_data['state']; ?>,
											<?= $single_order_data['country']; ?> </span><br>
										<label class="mb-0">Zip : <span class="mt-0"
												id=""><?= $single_order_data['zipcode']; ?></span></label><br>
										<label>Phone : <span class="mt-0"
												id=""><?= $single_order_data['number']; ?></span></label>
									</div>
									<div class="col-lg-4">
										<a href="<?php echo base_url(); ?>edit_address/<?= base64_encode($single_order_data['id']); ?>"
											class="btn customer-order-btn link-text m-0 mb-2 mt-2 btn-primary rounded border-0 float-right"
											style="padding:12px;">Edit Address</a>
									</div>
								</div>
							</div>
							<?php
						}
					}
					?>
					<!--</div>-->

					<?php
					if (!empty($cart)) {
						?>
						<div class="loginerr"></div>
						<div class="checkout-form card p-4 mt-4">
							<h2>Make Your Checkout Here</h2>
							<p>Please register in order to checkout more quickly</p>
							<!-- Form -->
							<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id; ?>" />
							<input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>" />

							<input type="hidden" name="business" value="<?php echo $payid; ?>">
							<!-- Buy Now button. -->
							<input type="hidden" name="cmd" value="_xclick">
							<!-- Details about the item that buyers will purchase. -->
							<input type="hidden" name="success" value="">
							<!--<input type="hidden" name="first_name" value="<?php //echo $userdata['UserFirstName'] ?>">-->
							<!--<input type="hidden" name="last_name" value="<?php //echo $userdata['UserLastName']; ?>">-->
							<input type="hidden" name="amount" value="<?php echo $itemPrice; ?>">
							<input type="hidden" name="currency_code" value="<?php echo $curreny; ?>">

							<input type="hidden" name="payment_type" value="paypal">
							<!-- URLs -->
							<input type="hidden" name="cancel_return" value="<?php echo base_url('payment_cancel'); ?>">
							<input type="hidden" name="return" value="<?php echo base_url('payment_success'); ?>">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-12 mb-3">
									<div class="form-group fname mb-0">
										<label>First Name<span>*</span></label>
										<input type="text" name="fname" id="fname" maxlength="15"
											value="<?php echo isset($user_data['first_name']) ? ($user_data['first_name']) : (''); ?>"
											placeholder="" class="form-control">
									</div>
									<div class="fname_error"></div>
								</div>
								<div class="col-lg-6 col-md-6 col-12 mb-3">
									<div class="form-group lname mb-0">
										<label>Last Name<span>*</span></label>
										<input type="text" name="lname" id="lname" maxlength="15"
											value="<?php echo isset($user_data['last_name']) ? ($user_data['last_name']) : (''); ?>"
											placeholder="" class="form-control">
									</div>
									<div class="lname_error"></div>
								</div>
								<div class="col-lg-6 col-md-6 col-12 mb-3">
									<div class="form-group mb-0">
										<label>Email Address<span>*</span></label>
										<input type="email" id="email" name="email"
											value="<?php echo isset($userdata['UserEmail']) ? ($userdata['UserEmail']) : (''); ?>"
											placeholder="" class="form-control">
									</div>
									<div class="email_error"></div>
								</div>
								<div class="col-lg-6 col-md-6 col-12 mb-3">
									<div class="form-group mb-0">
										<label>Phone Number<span>*</span></label>
										<input type="number" name="phoneno" id="phoneno" maxlength="12"
											value="<?php echo isset($user_data['number']) ? ($user_data['number']) : (''); ?>"
											placeholder="" class="form-control">
									</div>
									<div class="phone_error"></div>
								</div>
								<div class="col-lg-6 col-md-6 col-12 mb-3">
									<div class="form-group mb-0">
										<label>Country<span>*</span></label>
										<select name="CountryID" id="country" class="form-control taxfor">
											<!--<option value="">Select country</option>-->
											<?php
											if ($Countries) {
												foreach ($Countries as $country) {
													?>
													<option value="<?php echo $country['CountryID']; ?>" <?php if (isset($user_data['UserCountry']) && $user_data['UserCountry'] == $country['CountryID'])
														   echo 'selected'; ?>>
														<?php echo $country['CountryName']; ?>
													</option>
													<?php
												}
											}
											?>


										</select>
									</div>
									<div class="country_error"></div>
								</div>
								<div class="col-lg-6 col-md-6 col-12 mb-3">
									<div class="form-group mb-0">
										<label>State / Division<span>*</span></label>
										<select name="state-province" id="state" class="form-control taxfor">
											<!--<option value="">Select state</option>-->
											<?php
											if ($State) {
												foreach ($State as $sts) {
													?>
													<option
														value="<?php echo isset($userdata['UserState']) ? ($userdata['UserState']) : (''); ?>"
														<?php if (isset($userdata['UserState']) && $userdata['UserState'] == $sts['StateID'])
															echo 'selected'; ?>>
														<?php echo $sts['StateName']; ?>
													</option>
													<?php
												}
											}
											?>

										</select>
									</div>
									<div class="state_error"></div>
								</div>
								<div class="col-lg-6 col-md-6 col-12 mb-3">
									<div class="form-group mb-0">
										<label>City<span>*</span></label>
										<select name="city-province" id="city" class="form-control taxfor">
											<!--<option value="">Select city</option>-->
											<?php
											if ($City) {
												foreach ($City as $cts) {
													?>
													<option
														value="<?php echo isset($userdata['UserCity']) ? ($userdata['UserCity']) : (''); ?>"
														<?php if (isset($userdata['UserCity']) && $userdata['UserCity'] == $cts['CityID'])
															echo 'selected'; ?>>
														<?php echo $cts['CityName']; ?>
													</option>
													<?php
												}
											}
											?>
										</select>
									</div>
									<div class="city_error"></div>
								</div>
								<div class="col-lg-6 col-md-6 col-12 mb-3">
									<div class="form-group mb-0">
										<label>Address Line 1<span>*</span></label>
										<input type="text" name="address1" id="address1" maxlength="110"
											value="<?php echo isset($user_data['address']) ? ($user_data['address']) : (''); ?>"
											placeholder="" class="form-control">
									</div>
									<div class="address1_error"></div>
								</div>
								<div class="col-lg-6 col-md-6 col-12 mb-3">
									<div class="form-group mb-0">
										<label>Address Line 2</label>
										<input type="text" name="address2" id="address2" maxlength="110"
											value="<?php // echo isset($user_data['address'])?($user_data['address']):(''); ?>"
											placeholder="" class="form-control">
									</div>
									<div class="address2_error"></div>
								</div>
								<div class="col-lg-6 col-md-6 col-12 mb-3">
									<div class="form-group mb-0">
										<label>Postal Code<span>*</span></label>
										<input type="text" name="postcode" id="postcode" maxlength="10"
											value="<?php // echo isset($user_data['zipcode']) ? ($user_data['zipcode']) : (''); ?>"
											placeholder="" class="form-control taxfor_postal">
									</div>
									<div class="postcode_error"></div>
								</div>
								<!--<div class="col-lg-6 col-md-6 col-12">-->
								<!--	<div class="form-group">-->
								<!--		<label>Company</label>-->
								<!--		<input type="text" name="company_name" id="company" value=""  placeholder="" class="form-control">-->
								<!--	</div>-->
								<!--	<div class="company_error"></div>-->
								<!--</div>-->

							</div>

							<!--/ End Form -->
						</div>
						<?php
					}
					?>

				</div>
				<?php
				if (!empty($cart)) { ?>
					<div class="col-lg-4 col-12">
						<div class="order-details mt-4">
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>ITEMS</h2>
								<?php
								$CartObj = new App\Controllers\Cart;
								$CartTotals = (object) $CartObj->calculateCartTotals();
								$cart = session()->get('cart');
								$totalCartItem = 0;

								if (!is_null($cart) && is_array($cart)) {
									$totalCartItem = count($cart);
								}
								?>
								<?php
								if ($totalCartItem > 0) {
									?>
									<ul class="shopping-list pt-0">
										<?php
										foreach ($cart as $item) {
											$imgurl = ($item['ProductImage']) ? ($item['ProductImage']) : ('');
											?>
											<li class="pt-0 px-3 pb-0">
												<br />
												<div class="row align-items-center flex-row">
													<div class="col-3">
														<a class="cart-img mt-1" href="javascript:void(0)"><img
																src="<?php echo $imgurl; ?>" alt="javascript:void(0)"
																style="max-width: 100%;"></a>
													</div>
													<div class="col-9">
														<p class="mt-0" style="line-height: 15px;"><b style="font-size:12px;font-weight:500;"><?php echo $item['name']; ?></b></p>
														<p class="mt-0" style="font-size:12px;"><?php
														if (isset($item['vari_data']) && !empty($item['vari_data'])) {
															$VariationName = array_column($item['vari_data'], 'VariationName');
															////   print_r($VariationName);
															echo implode('-', $VariationName);
														} else {
															echo "-";
														} ?>
														</p class="mt-0">
														<p class="quantity mt-0" style="font-size: 12px;line-height: 15px;"><?php echo $item['quantity']; ?>x - <span
																class="amount"><?php echo $all_setting_data['currency']; ?><?php echo $item['unit_price']; ?></span>
														</p>
													</div>
												</div>
											</li>
											<?php
										}
										?>

									</ul>
									<?php
								} else {
									?>
									<ul class="shopping-list">
										<li>
											<h4 class="text-center"><a href="javascript:void(0)">cart is empty</a></h4>

										</li>

									</ul>
									<?php
								}
								?>
							</div>

							<div class="single-widget">
								<!-- ============== Conditional Shipping Section ============== -->
								<?php if ($CartTotals->isShippingEnabled == 1 && $CartTotals->shippingCost != 0) { ?>
									<div>
										<h2 class="mt-0 pt-0">Shipping</h2>
										<div class="content mt-3 pl-4">
											<?php foreach ($shipping_method as $single_shipping_method) { ?>
												<div class="form-check">
													<input class="ship_method" type="radio" name="flexRadioDefault"
														id="flexRadioDefault1"
														value="<?php echo $single_shipping_method['MethodID']; ?>" <?php if ($single_shipping_method['MethodID'] == 9) {
															   echo 'checked';
														   } ?>>
													<label class="form-check-label" for="flexRadioDefault1">
														<?php echo $single_shipping_method['MethodName']; ?>
													</label>
												</div>
											<?php } ?>
										</div>
									</div>
								<?php } ?>
								<!-- ============== Shipping Section End ============== -->
								<!-- <?php // echo "<pre>"; print_r($CartTotals); ?>						-->
								<h2>CART TOTALS</h2>
								<div class="content">
									<ul>
										<li>Sub Total<span
												id="n_subtotal"><?php echo $all_setting_data['currency']; ?><?php echo number_format($CartTotals->subtotal, 2); ?></span>
										</li>

										<?php if ($CartTotals->isTaxEnabled == 1) { ?>
										<li class="d-flex justify-content-between">
											<div>
												<div>(+) Tax </div>
												<div><small id="n_taxname"></small></div>
											</div>
											<div><span
													id="n_tax"><?php echo $all_setting_data['currency']; ?><?php echo number_format($CartTotals->tax, 2); ?></span>
											</div>
										</li>
										<?php } ?>

										<?php if ($CartTotals->DiscountPrice > 0) { ?>
											<li>(-) Discount
												<span id="n_DiscountPrice">
													<small class="coupon-code"
														style="font-weight:600;">(<?php echo $CartTotals->couponCode; ?>)</small>
													<?php echo $all_setting_data['currency']; ?>
													<?php echo number_format($CartTotals->DiscountPrice, 2); ?>
												</span>
											</li>
										<?php } ?>

										<!-- <li>(+) Shipping<span
												id="n_shippingCost">$<?php // echo number_format($CartTotals->shippingCost, 2); ?></span>
										</li> -->

										<!-- ============== Conditional Shipping Cost ============== -->
										<?php if ($CartTotals->isShippingEnabled == 1) { ?>
											<li>(+) Shipping
												<span id="n_shippingCost">
													<?php
													if ($CartTotals->shippingCost == 0) {
														echo "Free shipping";
													} else {
														echo $all_setting_data['currency'] . number_format($CartTotals->shippingCost, 2);
													}
													?>
												</span>
											</li>
										<?php } ?>
										<!-- ============== Shipping Cost End ============== -->

										<li class="last">Total<span
												id="n_totalWithShipping"><?php echo $all_setting_data['currency']; ?><?php echo number_format($CartTotals->totalWithShipping, 2); ?></span>
										</li>
										<!-- <li class="last">Total<span id="n_totalWithShipping">$<?php // echo $CartTotals->totalWithShipping; ?></span></li> -->
									</ul>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>Payments</h2>
								<div class="content">
									<div class="col pt-3 px-4">
										<!--<label class="checkbox-inline w-100" for="patment_method1"><input name="patment_method" id="patment_method1" class="payment_method" value="check" type="radio"> Check Payments</label>-->
										<?php
										//	1=COD,2=bank_transfer,3=paypal,4=strip,5=razorpay
									
										if (!empty($paymentgateway)) {
											foreach ($paymentgateway as $pgateway) {
												if ($pgateway['status'] == 1) {

													if ($pgateway['type'] == 1) {
														?>
														<label
															class="checkbox-inline w-100 <?= isset($pgateway['type']) ? $pgateway['type'] : '' ?>"
															for="patment_method<?php echo $pgateway['type']; ?>">
															<input name="patment_method" id="patment_method<?php echo $pgateway['type']; ?>"
																class="payment_method" value="cod" type="radio">
															Cash On Delivery
														</label>
														<?php
													} else if ($pgateway['type'] == 2) {
														//echo '2=bank_transfer';
														?>
															<label
																class="checkbox-inline w-100 <?= isset($pgateway['type']) ? $pgateway['type'] : '' ?>"
																for="patment_method<?php echo $pgateway['type']; ?>">
																<input name="patment_method" id="patment_method<?php echo $pgateway['type']; ?>"
																	class="payment_method" value="bank_transfer" type="radio">
																Bank Transfer
															</label>
														<?php
													}
													if ($pgateway['type'] == 3) {
														//echo '3=paypal';
														?>
														<label
															class="checkbox-inline w-100 <?= isset($pgateway['type']) ? $pgateway['type'] : '' ?>"
															for="patment_method<?php echo $pgateway['type']; ?>">
															<input name="patment_method" id="patment_method<?php echo $pgateway['type']; ?>"
																class="payment_method" value="paypal" type="radio">
															PayPal
														</label>
														<?php
													}
													if ($pgateway['type'] == 4) {
														// echo '4=strip';
														?>
														<label
															class="checkbox-inline w-100 <?= isset($pgateway['type']) ? $pgateway['type'] : '' ?>"
															for="patment_method<?php echo $pgateway['type']; ?>">
															<input name="patment_method" id="patment_method<?php echo $pgateway['type']; ?>"
																class="payment_method" value="stripe" type="radio">
															Stripe
														</label>
														<?php
													}
													if ($pgateway['type'] == 5) {
														//echo '5=razorpay';
														?>
														<label
															class="checkbox-inline w-100 <?= isset($pgateway['type']) ? $pgateway['type'] : '' ?>"
															for="patment_method<?php echo $pgateway['type']; ?>">
															<input name="patment_method" id="patment_method<?php echo $pgateway['type']; ?>"
																class="payment_method" value="razorpay" type="radio">
															Razorpay
														</label>
														<?php
													}
													if ($pgateway['type'] == 6) {
														//echo '6=phonepay';
														?>
														<label
															class="checkbox-inline w-100 <?= isset($pgateway['type']) ? $pgateway['type'] : '' ?>"
															for="patment_method<?php echo $pgateway['type']; ?>">
															<input name="patment_method" id="patment_method<?php echo $pgateway['type']; ?>"
																class="payment_method" value="phonepay" type="radio">
															Phone Pay
														</label>
														<?php
													}


												}
											}
										}

										if ($paymentgateway[0]['status'] != 1) {
											$cod_status = 'disabled';
											$cod_class = 'text-muted';
										}
										if ($paymentgateway[2]['status'] != 1) {
											$paypal_status = 'disabled';
											$paypal_class = 'text-muted';
										}
										?>
										<!--<label class="checkbox-inline w-100 <?= isset($cod_class) ? $cod_class : '' ?>" for="patment_method2"><input name="patment_method" id="patment_method2" class="payment_method" value="cod" type="radio" <?= isset($cod_status) ? $cod_status : '' ?>> Cash On Delivery</label>-->
										<!--<label class="checkbox-inline w-100 <?= isset($paypal_class) ? $paypal_class : '' ?>" for="patment_method3"><input name="patment_method" id="patment_method3" class="payment_method" value="paypal" type="radio" <?= isset($paypal_status) ? $paypal_status : '' ?>> PayPal</label>-->
										<div id="stripe-container" class="shadow" style="display: none; padding: 10px;">
											<label for="card-element">
												Credit or debit card
											</label>
											<div id="card-element">
												<!-- A Stripe Element will be inserted here. -->
											</div>

											<!-- Used to display form errors. -->
											<div id="card-errors" class="text-danger" role="alert"></div>
										</div>

									</div>
								</div>
								<div class="payment_error_div px-4"></div>
							</div>
							<!--/ End Order Widget -->
							<!-- Payment Method Widget -->
							<div class="single-widget payement">
								<div class="content">
									<img src="<?php echo base_url(); ?>public/images/payment-method.png" alt="#">
								</div>
							</div>
							<div class="single-widget get-button">
								<div class="content">
									<button type="button" <?php if (empty($cart)) {
										echo "disabled";
									} else {
										echo "";
									} ?>
										class="button btn btncheck rounded" style="padding:12px;">
										proceed to checkout
									</button>

								</div>

							</div>
							<!--/ End Button Widget -->
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</form>
		<!-- Modal -->
		<div class="modal fade modal-open" id="addressModal" tabindex="-1" role="dialog"
			aria-labelledby="addressModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<!--<h5 class="modal-title text-center" id="addressModalLabel">Change Address</h5>-->
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body px-3 pb-3 mt-4">
						<!-- Your form goes here -->
						<?php
						foreach ($all_address_data as $key => $single_order_data) {
							?>
							<div class="checkout-form card p-0 mt-3">
								<div class="row">
									<!--<div class="col-lg-2 mt-4">-->
									<!--                     <div class="form-check">-->
									<!--                       <input class="form-check-input address_radio" type="radio" name="address_radio" data-id = "<? //$single_order_data['id']; ?>" id="address_radio" <?php // if($key==0) { echo "checked"; } else {echo "";} ?>>-->
									<!--                     </div>-->
									<!--         </div>-->
									<div class="col-lg-10">
										<p class="font-weight-bold mb-0 text-capitalize text-dark">
											<?= $single_order_data['first_name']; ?> 	<?= $single_order_data['last_name']; ?>
										</p>
										<span class="mt-0"><?= $single_order_data['address']; ?></span><br>
										<span class="mt-0"><?= $single_order_data['city']; ?>,
											<?= $single_order_data['state']; ?>, <?= $single_order_data['country']; ?>
										</span><br>
										<label class="mb-0">Zip : <span class="mt-0"
												id=""><?= $single_order_data['zipcode']; ?></span></label><br>
										<label>Phone : <span class="mt-0"
												id=""><?= $single_order_data['number']; ?></span></label>
									</div>
								</div>
							</div>
							<?php

						}

						?>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary rounded" data-dismiss="modal"
							style="padding:12px;">Close</button>
						<!--<button type="submit" class="btn btn-primary">Save changes</button>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Checkout -->
<div id="semiTransparenDiv"></div>
<!-- Start Shop Services Area  -->

<?= $this->include('footer') ?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
	var currency = '<?php echo $all_setting_data["currency"]; ?>';


	$(document).ready(function () {
		$('#openAddressModal').on('click', function () {
			$('#addressModal').modal('show');
		});
		$('.address_radio').change(function () {
			// Check if the radio button is checked
			if ($(this).is(':checked')) {
				// Get the data-id attribute value
				var address_id = $(this).attr('data-id');
				// alert(address_id);

				$.ajax({
					url: 'get_address_data',
					type: 'POST',
					data: { address_id: address_id },
					success: function (response) {
						console.log(response);
						var res = JSON.parse(response);

						// Update form fields with the fetched data
						$('#fname').val(res.first_name);
						$('#lname').val(res.last_name);
						$('#address1').val(res.address);
						// $('#country').val(res.country);
						// $('#state').val(res.state);
						// $('#city').val(res.city);
						// Assuming res is an object
						$('#country').append('<option value="' + res.country + '">' + res.country + '</option>').val(res.country);
						$('#state').append('<option value="' + res.state + '">' + res.state + '</option>').val(res.state);
						$('#city').append('<option value="' + res.city + '">' + res.city + '</option>').val(res.city);

						$('#postcode').val(res.zipcode);
						$('#phoneno').val(res.number);
						// Update other fields as needed
						$('#addressModal').modal('hide');
					},

					error: function (error) {
						console.error('Error fetching data:', error);
					}
				});
			}
		});
		//

		var country_val = $("#country").val();
		var state_val = $("#state").val();
		var city_val = $("#city").val();
		//   var ship_method_val=$(".ship_method").val();
		//   console.log(country_val); 
		$("#country").val(country_val).trigger("change");
		$("#state").val(state_val).trigger("change");
		$("#city").val(city_val).trigger("change");


		$(document).on('change keyup', '.taxfor, .taxfor_postal', function () {
			//  alert("hello");
			var this_ = $(this);
			//  console.log((this_).val());
			var parent = $(this).parent().parent().parent();
			//  console.log(parent);
			var country = parent.find("#country").val();
			var state = parent.find("#state").val();
			var city = parent.find("#city").val();
			var postcode = parent.find("#postcode").val();

			// console.log(country, state, city, postcode);

			$.ajax({
				url: 'for_update_tax',
				type: 'POST',
				data: { country: country, state: state, city: city, postcode: postcode },
				async: false,
				success: function (response) {
					//   console.log(response);
					var res = JSON.parse(response);
					console.log(res);

					// Format the values to 2 decimal places
					var formattedSubtotal = currency + parseFloat(res.subtotal).toFixed(2);
					var formattedTax = currency + parseFloat(res.tax).toFixed(2);
					var formattedDiscountPrice = currency + parseFloat(res.DiscountPrice).toFixed(2);
					var formattedTotalWithShipping = currency + parseFloat(res.totalWithShipping).toFixed(2);

					// Update the displayed values
					$("#n_subtotal").text(formattedSubtotal);
					$("#n_tax").text(formattedTax);
					$("#n_DiscountPrice").text(formattedDiscountPrice);
					// $("#n_DiscountPrice").html(
					// 	`<small class="coupon-code" style="font-weight:600;">(${res.couponCode})</small> ` + 
					// 	formattedDiscountPrice
					// );

					$("#n_totalWithShipping").text(formattedTotalWithShipping);
					$("#n_taxname").text(res.all_taxname);
				}
			});
		});



		function get_shipping_data(postcode, ship_method) {

			$.ajax({
				url: 'for_get_shipping_data',
				type: 'POST',
				data: { postcode: postcode, ship_method: ship_method || null}, 
				async: false,
				success: function (response) {
					//   console.log(response);
					var res = JSON.parse(response);
					console.log('res : '.res);

					// Format the values to 2 decimal places
					var formattedSubtotal = currency + parseFloat(res.subtotal).toFixed(2);
					// var formattedShippingCost = (res.shippingCost === 1) ? "No shipping available" : "$" + parseFloat(res.shippingCost).toFixed(2);
					var formattedShippingCost;
					if (res.shippingCost === 1) {
						formattedShippingCost = "No shipping available";
					} else if (res.shippingCost === 0) {
						formattedShippingCost = "Free shipping";
					} else {
						formattedShippingCost = currency + parseFloat(res.shippingCost).toFixed(2);
					};
					var formattedTax = currency + parseFloat(res.tax).toFixed(2);
					var formattedDiscountPrice = currency + parseFloat(res.DiscountPrice).toFixed(2);
					var formattedTotalWithShipping = currency + parseFloat(res.totalWithShipping).toFixed(2);

					// Update the displayed values
					$("#n_subtotal").text(formattedSubtotal);
					$("#n_tax").text(formattedTax);
					$("#n_DiscountPrice").text(formattedDiscountPrice);
					$("#n_totalWithShipping").text(formattedTotalWithShipping);
					$("#n_taxname").text(res.all_taxname);

					// Check if shipping cost is zero
					if (res.shippingCost === 1) {
						$("#n_shippingCost").text(formattedShippingCost);
						$(".btncheck").prop("disabled", true);
						if (!$('#shipping-unavailable-msg').length) {
							$(".btncheck").after('<div id="shipping-unavailable-msg" class="text-danger fw-semibold mt-2">Shipping is not available for your location.</div>');
						}
					} else {
						$("#n_shippingCost").text(formattedShippingCost);
						$(".btncheck").prop("disabled", false);
						$("#shipping-unavailable-msg").remove();
					}
				}
			});

		}

		$(document).on('keyup', '.taxfor_postal', function () {
			//  alert("hello");
			var this_ = $(this);
			//  console.log((this_).val());

			var postcode = this_.val();
			console.log(postcode);
			var ship_method = $('.ship_method:checked').val();
			console.log(ship_method);

			get_shipping_data(postcode, ship_method);

		});
		$(document).on('change', '.ship_method', function () {
			//  alert("hello");
			var this_ = $(this);
			//  console.log((this_).val());

			var ship_method = this_.val();
			console.log(ship_method);
			var postcode = $('.taxfor_postal').val();
			console.log(postcode);
			get_shipping_data(postcode, ship_method);


		});

	});

</script>