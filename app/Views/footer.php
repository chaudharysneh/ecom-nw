<?php

$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $directoryURI);
$first_part = $components[1];
$cmsdata = new App\Models\CmsModel();
$resdt = $cmsdata->get()->getResult('array');

$stripe_public_key = 'stripe_public_key';
$stripe_secret_key = 'stripe_secret_key';

$key_id = 'rzp_test_9UrkTeo8gsGo77';
$key_secret = 'rOG3EgOvfgOTlRIPSvjuFn8T';

$paymentGatewayModel = new \App\Models\Paymentgatewaymodel();
$paymentgateway = $paymentGatewayModel->findAll();

if (!empty($paymentgateway)) {
	foreach ($paymentgateway as $pgateway) {
		if ($pgateway['status'] == 1) {

			if ($pgateway['type'] == 1) {

			} else if ($pgateway['type'] == 2) {

			}
			if ($pgateway['type'] == 3) {
				//echo '3=paypal';

			}
			if ($pgateway['type'] == 4) {
				// echo '4=strip';
				$pdata = json_decode($pgateway['details'], true);
				if ($pdata) {
					$stripe_public_key = $pdata['public_key'] ?? '';
					$stripe_secret_key = $pdata['secret_key'] ?? '';
				}

			}
			if ($pgateway['type'] == 5) {
				// echo '5=razorpay';
				$pdata = json_decode($pgateway['details'], true);
				if ($pdata) {
					$key_id = $pdata['keyId'] ?? '';
					$key_secret = $pdata['key_secret'] ?? '';
				}

			}


		}
	}
}


?>


<style>
	.send_email:focus-visible {
		outline: none;
	}



	@media (min-width: 2721px) {
		.footer {
			position: absolute;
			bottom: 0;
			width: 100%;
		}
	}

	@media (min-width: 2720px) and (max-width: 4081px) {
		.footer {
			position: absolute;
			bottom: 0;
			width: 100%;
		}
	}

	/* .footer {
	position: relative;
	bottom: 0;
} */
</style>


<!-- Start Footer Area -->
<?php
$AllsettingsModel = new \App\Models\Allsettingsmodel();
$all_setting_data = $AllsettingsModel->first();
?>



<footer class="footer modern-footer">
    <!-- Start Shop Services Area -->
    <section class="shop-services pt-5 pb-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="modern-service-item">
                        <div class="service-icon"><i class="fa-solid fa-truck-fast"></i></div>
                        <div class="service-text">
                            <h4>Free Shipping</h4>
                            <p>Orders over <?php echo $all_setting_data['currency']; ?>100</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="modern-service-item">
                        <div class="service-icon"><i class="fa-solid fa-arrow-rotate-left"></i></div>
                        <div class="service-text">
                            <h4>Free Return</h4>
                            <p>Within 30 days returns</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="modern-service-item">
                        <div class="service-icon"><i class="fa-solid fa-shield-halved"></i></div>
                        <div class="service-text">
                            <h4>Secure Payment</h4>
                            <p>100% secure payment</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="modern-service-item">
                        <div class="service-icon"><i class="fa-solid fa-gem"></i></div>
                        <div class="service-text">
                            <h4>Best Piece</h4>
                            <p>Guaranteed price</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Shop Newsletter -->
    <section class="footer-newsletter pt-5 pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="newsletter-content">
                        <h2 class="text-white mb-3">Join Our Newsletter</h2>
                        <p class="text-white-50 mb-4">Subscribe to get special offers, free giveaways, and once-in-a-lifetime deals.</p>
                        <form id="add_subscribe" method="post" class="modern-newsletter-form">
                            <input type="hidden" name="baseurl" value="<?php echo base_url(); ?>">
                            <div class="input-group mb-2">
                                <input name="email" class="form-control" placeholder="Your email address" required type="email">
                                <button type="submit" class="btn btn-primary send_email_data">Subscribe Now</button>
                            </div>
                            <p id="msg" class="text-left mt-2"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Top -->
    <div class="footer-top pt-5 pb-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget about-widget">
                        <div class="footer-logo mb-4">
                            <?php 
                            $settings = new App\Models\Settings();
                            $sett_data = $settings->get()->getRow();
                            ?>
                            <a href="<?php echo base_url(); ?>">
                                <img src="<?php echo base_url('admin/public/upload_images/' . $sett_data->Logo); ?>" alt="logo" style="max-height: 45px;">
                            </a>
                        </div>
                        <p class="mb-4"><?= $all_setting_data['Description'] ?? 'Providing high-quality furniture and home decor solutions for a modern lifestyle.'; ?></p>
                        <div class="app-buttons d-flex gap-2">
                            <a href="#"><img src="https://assets.pharmeasy.in/apothecary/images/googlePlay.svg?dim=360x0" alt="Google Play"></a>
                            <a href="#"><img src="https://assets.pharmeasy.in/apothecary/images/appStore.svg?dim=256x0" alt="App Store"></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget">
                        <h4 class="widget-title">Information</h4>
                        <ul class="footer-links">
                            <li><a href="<?php echo base_url('about_us'); ?>">About Us</a></li>
                            <li><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
                            <li><a href="<?php echo base_url('blog'); ?>">Our Blog</a></li>
                            <li><a href="#">Track Order</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget">
                        <h4 class="widget-title">Our Policies</h4>
                        <ul class="footer-links">
                            <?php foreach ($resdt as $rsdata) { 
                                if ($rsdata['status'] == 1) { ?>
                                    <li><a href="<?php echo base_url() . $rsdata['CmsUrl']; ?>"><?php echo $rsdata['CmsTitle']; ?></a></li>
                                <?php } 
                            } ?>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget contact-widget">
                        <h4 class="widget-title">Get In Touch</h4>
                        <ul class="contact-info">
                            <li><i class="fa-solid fa-location-dot"></i> <?= $all_setting_data['Address'] ?? ''; ?></li>
                            <li><i class="fa-solid fa-envelope"></i> <a href="mailto:<?= $all_setting_data['Email'] ?? ''; ?>"><?= $all_setting_data['Email'] ?? ''; ?></a></li>
                            <li><i class="fa-solid fa-phone"></i> <a href="tel:<?= $all_setting_data['Phone'] ?? ''; ?>">+<?= $all_setting_data['Phone'] ?? ''; ?></a></li>
                        </ul>
                        <div class="footer-social mt-4">
                            <?php
                            $links = json_decode($all_setting_data['Links'] ?? '{}', true);
                            $facebook = json_decode($links['facebook'] ?? '{}', true);
                            $twitter = json_decode($links['twitter'] ?? '{}', true);
                            $insta = json_decode($links['insta'] ?? '{}', true);
                            ?>
                            <?php if (!empty($facebook['link']) && $facebook['status'] == 1) { ?>
                                <a href="<?= $facebook['link'] ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                            <?php } ?>
                            <?php if (!empty($twitter['link']) && $twitter['status'] == 1) { ?>
                                <a href="<?= $twitter['link'] ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                            <?php } ?>
                            <?php if (!empty($insta['link']) && $insta['status'] == 1) { ?>
                                <a href="<?= $insta['link'] ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="footer-copyright pt-4 pb-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">© <?php echo date('Y'); ?> <strong><?= $all_setting_data['Title'] ?? 'FurniLife'; ?></strong>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                    <img src="<?php echo base_url(); ?>public/images/payments.png" alt="Payment Methods" style="max-height: 30px;">
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /End Footer Area -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css">
<!-- jQuery UI library -->
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

<!-- Jquery -->
<script src="<?php echo base_url(); ?>public/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/jquery-migrate-3.0.0.js"></script>


<script src="<?php echo base_url(); ?>public/js/jquery-ui.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
<!-- Popper JS -->
<script src="<?php echo base_url(); ?>public/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
<!-- Color JS -->
<!-- <script src="<?php echo base_url(); ?>public/js/colors.js"></script> -->
<!-- Slicknav JS -->
<script src="<?php echo base_url(); ?>public/js/slicknav.min.js"></script>
<!-- Owl Carousel JS -->
<script src="<?php echo base_url(); ?>public/js/owl-carousel.js"></script>
<!-- Magnific Popup JS -->
<script src="<?php echo base_url(); ?>public/js/magnific-popup.js"></script>
<!-- Waypoints JS -->
<script src="<?php echo base_url(); ?>public/js/waypoints.min.js"></script>
<!-- Countdown JS -->
<script src="<?php echo base_url(); ?>public/js/finalcountdown.min.js"></script>
<!-- Nice Select JS -->
<script src="<?php echo base_url(); ?>public/js/nicesellect.js"></script>
<!-- Flex Slider JS -->
<script src="<?php echo base_url(); ?>public/js/flex-slider.js"></script>
<!-- ScrollUp JS -->
<script src="<?php echo base_url(); ?>public/js/scrollup.js"></script>
<!-- Onepage Nav JS -->
<script src="<?php echo base_url(); ?>public/js/onepage-nav.min.js"></script>
<!-- Easing JS -->
<script src="<?php echo base_url(); ?>public/js/easing.js"></script>
<!-- Active JS -->
<script src="<?php echo base_url(); ?>public/js/active.js"></script>
<script src="<?php echo base_url(); ?>public/js/custom.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
	var options = {};
	var razorpay_pay_btn, instance;
	function razorpaySubmit(el) {
		if (typeof Razorpay == 'undefined') {
			setTimeout(razorpaySubmit, 200);
			if (!razorpay_pay_btn && el) {
				razorpay_pay_btn = el;
				el.disabled = true;
				el.value = 'Please wait...';
			}
		} else {
			if (!instance) {
				instance = new Razorpay(options);
				if (razorpay_pay_btn) {
					razorpay_pay_btn.disabled = false;
					razorpay_pay_btn.value = "Pay Now";
				}
			}
			instance.open();
		}
	}  
</script>

<script>

	var base_url = $("#base_url").val();
	var currency = '<?php echo $all_setting_data["currency"]; ?>';


	$(document).ready(function () {
		$('.addtocartform').on('submit', function (e) {
			$(".Color").css('border', '');
			$(".Size").css('border', '');
			$(".Material").css('border', '');

			e.preventDefault(); // Prevent form submission
			var Color = $(".Color").val();
			var Size = $(".Size").val();
			var Material = $(".Material").val();

			if ($(".Color").length) {
				if (Color == '') {
					$(".Color").focus();
					$(".Color").css('border', '1px solid red');
					return false
				}
			}

			if ($(".Size").length) {
				if (Size == '') {
					$(".Size").focus();
					$(".Size").css('border', '1px solid red');
					return false
				}
			}
			if ($(".Material").length) {
				if (Material == '') {
					$(".Material").focus();
					$(".Material").css('border', '1px solid red');
					return false
				}
			}


			var form = $(this);
			var url = form.attr('action');

			$('#semiTransparenDiv').css('display', 'block');

			let fd = new FormData(this);

			$.ajax({
				type: 'POST',
				url: url,
				data: fd,
				contentType: false,
				processData: false,
				success: function (response) {
					// Parse the JSON response
					var jsonObject = JSON.parse(response);
					if (jsonObject.status === 'success') {
						// Update cart details
						$('ul.shopping-list').html(jsonObject.cart);
						$(".total-count").text(jsonObject.CartTotals);
						$(".dropdown-cart-header span").text(jsonObject.CartTotals + " Items");

						// Build cart items
						var htmltag = '';
						for (var i = 0; i < jsonObject.cart.length; i++) {
							htmltag += '<li id="' + jsonObject.cart[i].id + '">' +
								'<a href="javascript:void(0)"  class="remove removeItem" data-id="' + jsonObject.cart[i].id + '" title="Remove this item"><i class="fa fa-remove"></i></a>' +
								'<a class="cart-img" href="javascript:void(0)"><img src="' + jsonObject.cart[i].ProductImage + '" alt="javascript:void(0)"></a>' +
								'<h4><a href="/single_product/' + jsonObject.cart[i].id + '">' + jsonObject.cart[i].name + '</a></h4>' +
								'<p class="quantity">' + jsonObject.cart[i].quantity + 'x - <span class="amount">' + currency + jsonObject.cart[i].unit_price + '</span></p>' +
								'</li>';
						}
						$('ul.shopping-list').html(htmltag);
						$(".total-amount").text(currency + jsonObject.total_item);

						// Set product details in modal
						$("#modalProductImage").attr("src", jsonObject.cart[jsonObject.cart.length - 1].ProductImage);
						// $("#modalProductName").text(jsonObject.cart[jsonObject.cart.length - 1].name);
						// Extract the product name
						let productName = jsonObject.cart[jsonObject.cart.length - 1].name;
						let words = productName.split(" ");
						if (words.length > 4) {
							productName = words.slice(0, 4).join(" ") + " ...";
						}
						$("#modalProductName").text(productName);
						$("#modalProductPrice").text(currency + jsonObject.cart[jsonObject.cart.length - 1].unit_price);

						// Show modal with updated product details
						setTimeout(function () {
							$("#cartModal").modal('show');
							$('#semiTransparenDiv').css('display', 'none');
						}, 2000);
					}
				},
				error: function (xhr, status, error) {
					// Handle error response
					console.log(xhr.responseText);
				}
			});

		});

		$("#login").on('click', function () {
			var email = $("#email").val();
			var password = $("#password").val();
			var regEx = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			var validEmail = regEx.test(email);

			$(".error").remove();
			var flag = 1;
			if (email == '') {
				$(".email").after('<div class="error text-danger">Please enter email address</div>');
				flag = 0;
			}
			else if (email != '' && !validEmail) {
				$('.email').after('<div class="error text-danger">Please enter a valid email address</div>');
				flag = 0;
			}
			if (password == '') {
				$('.password').after('<div class="error text-danger">Please enter password</div>');
				flag = 0;
			}
			if (flag == 0) {
				return false;
			}
			else {
				$.ajax({
					type: 'POST',
					url: 'customer_login',
					data: { email: email, password: password },
					dataType: 'json',
					success: function (data) {
						if (data == 1) {
							window.location.href = 'my_account';
						}
						else {
							$('.password').after('<div class="error text-danger">Email or Password is Wrong!</div>');
						}
					}
				});
			}
		});
	});

// 	$(document).on("click", ".removeItem", function (e) {
// 		e.preventDefault();

// 		var itemId = $(this).data("id");
// 		$('#semiTransparenDiv').css('display', 'block');
// 		$.ajax({
// 			url: base_url + "/removeFromCart",
// 			method: "POST",
// 			data: { itemId: itemId },
// 			success: function (response) {
// 				// Handle the response
// 				var jsonObject = JSON.parse(response);
// 				if (jsonObject.status === "success") {
// 					//console.log(jsonObject.status);
// 					//$('.loader').css('display','block');
// 					$('ul.shopping-list').html(jsonObject.cart);
// 					$(".total-count").text(jsonObject.CartTotals);
// 					$(".dropdown-cart-header span").text(jsonObject.CartTotals + " Items");
// 					var html = '';

// 					for (var i = 0; i < jsonObject.cart.length; i++) {
// 						html += '<li id="' + jsonObject.cart[i].id + '">' +
// 							'<a href="javascript:void(0)"  class="remove removeItem" data-id="' + jsonObject.cart[i].id + '" title="Remove this item"><i class="fa fa-remove"></i></a>' +
// 							'<a class="cart-img" href="javascript:void(0)"><img src="' + jsonObject.cart[i].ProductImage + '" alt="javascript:void(0)"></a>' +
// 							'<h4><a href="/single_product/' + jsonObject.cart[i].id + '">' + jsonObject.cart[i].name + '</a></h4>' +
// 							'<p class="quantity">' + jsonObject.cart[i].quantity + 'x - <span class="amount">' + currency + jsonObject.cart[i].unit_price + '</span></p>' +
// 							'</li>';
// 						$("ul.shopping-list li#" + jsonObject.cart[i].id).remove();
// 					}
// 					$('ul.shopping-list').html(html);


// 					$(".total-amount").text(currency + jsonObject.total_item);

// 					var formattedShippingCost;
// 					if (jsonObject.shippingCost === 0) {
// 						formattedShippingCost = "Free shipping";
// 					} else {
// 						formattedShippingCost = currency + parseFloat(jsonObject.shippingCost).toFixed(2);
// 					}


// 					$(".order-summary-table").html('<tbody>' +
// 						'<tr>' +
// 						'<td>Order subtotal</td>' +
// 						'<th>' + currency + jsonObject.total_item + '</th>' +
// 						'</tr>' +
// 						(jsonObject.DiscountPrice > 0 ?
// 							'<tr class="Discount">' +
// 							'<td>Discount</td>' +
// 							'<th>' + currency + parseFloat(jsonObject.DiscountPrice).toFixed(2) + '</th>' +
// 							'</tr>' : '') +
// 						// '<tr>' +
// 						// '<td>Tax</td>' +
// 						// '<th>' + currency + jsonObject.tax + '</th>' +
// 						// '</tr>' +
// 						(jsondt.isTaxEnabled ?
// 							'<tr>' +
// 							'<td class="text-dark">Tax</td>' +
// 							'<th>' + currency + parseFloat(jsonObject.tax).toFixed(2) + '</th>' +
// 							'</tr>' : '') +


// 						// '<tr class="ShippingCharges">' +
// 						// '<td>Shipping Cost</td>' +
// 						// '<th>' +
// 						// formattedShippingCost +
// 						// '</th>' +
// 						// '</tr>' +

// 						(jsonObject.isShippingEnabled ?
// 							'<tr>' +
// 							'<td class="text-dark">Shipping Cost</td>' +
// 							'<th>' + formattedShippingCost + '</th>' +
// 							'</tr>' : '') +

// 						'<tr class="total">' +
// 						'<td>Total</td>' +
// 						'<th>' + currency + jsonObject.totalWithShipping + '</th>' +
// 						'</tr>' +
// 						'</tbody>');

// 					if (jsonObject.itemid == '') {
// 						$(".empty-cart").show();
// 					}
// 					else {
// 						$(".shopping-summery tbody tr#" + jsonObject.itemid).remove();

// 					}
// 					setTimeout(function () {
// 						$('#semiTransparenDiv').css('display', 'none');
// 						//$('.loader').css('display','none');
// 					}, 2000);

// 					// Reload the page or update the cart contents

// 				}
// 				else {

// 				}
// 			},
// 			error: function (xhr, textStatus, errorThrown) {
// 				console.log("Error: " + errorThrown);
// 			}
// 		});
// 	});

$(document).on("click", ".removeItem", function (e) {
    e.preventDefault();

    var itemId = $(this).data("id");
    $('#semiTransparenDiv').css('display', 'block'); // Show loader
    $.ajax({
        url: base_url + "/removeFromCart", // Endpoint URL
        method: "POST",
        data: { itemId: itemId }, // Data to send
        success: function (response) {
            try {
                var jsonObject = JSON.parse(response); // Parse server response
                console.log("Response:", jsonObject); // Debugging

                if (jsonObject.status === "success") {
                    // Update cart items
                    var cart = jsonObject.cart;
                    var html = "";

                    cart.forEach(function (item) {
                        html += `
                            <li id="${item.id}">
                                <a href="javascript:void(0)" class="remove removeItem" data-id="${item.id}" title="Remove this item"><i class="fa fa-remove"></i></a>
                                <a class="cart-img" href="javascript:void(0)">
                                    <img src="${item.ProductImage}" alt="${item.name}">
                                </a>
                                <h4><a href="/single_product/${item.id}">${item.name}</a></h4>
                                <p class="quantity">${item.quantity}x - <span class="amount">${currency}${item.unit_price}</span></p>
                            </li>
                        `;
                    });

                    $("ul.shopping-list").html(html); // Update cart list
                    $(".total-count").text(jsonObject.CartTotals); // Update total count
                    $(".dropdown-cart-header span").text(jsonObject.CartTotals + " Items"); // Update header count
                    $(".total-amount").text(currency + jsonObject.total_item); // Update total price

                    // Update order summary
                    var formattedShippingCost =
                        jsonObject.shippingCost === 0
                            ? "Free shipping"
                            : currency + parseFloat(jsonObject.shippingCost).toFixed(2);

                    var orderSummaryHtml = `
                        <tbody>
                            <tr>
                                <td>Order subtotal</td>
                                <th>${currency}${jsonObject.total_item}</th>
                            </tr>
                            ${jsonObject.DiscountPrice > 0 ? `
                            <tr class="Discount">
                                <td>Discount</td>
                                <th>${currency}${parseFloat(jsonObject.DiscountPrice).toFixed(2)}</th>
                            </tr>` : ""}
                            ${jsonObject.isTaxEnabled ? `
                            <tr>
                                <td class="text-dark">Tax</td>
                                <th>${currency}${parseFloat(jsonObject.tax).toFixed(2)}</th>
                            </tr>` : ""}
                            ${jsonObject.isShippingEnabled ? `
                            <tr>
                                <td class="text-dark">Shipping Cost</td>
                                <th>${formattedShippingCost}</th>
                            </tr>` : ""}
                            <tr class="total">
                                <td>Total</td>
                                <th>${currency}${parseFloat(jsonObject.totalWithShipping).toFixed(2)}</th>
                            </tr>
                        </tbody>
                    `;

                    $(".order-summary-table").html(orderSummaryHtml); // Update order summary

                    // Remove item from cart table if applicable
                    if (jsonObject.itemid) {
                        $(".shopping-summery tbody tr#" + jsonObject.itemid).remove();
                    } else {
                        $(".empty-cart").show();
                    }
                } else {
                    console.error("Error status:", jsonObject.message);
                }
            } catch (e) {
                console.error("Failed to process response:", e);
            } finally {
                // Always hide the loader
                setTimeout(function () {
                    $('#semiTransparenDiv').css('display', 'none');
                }, 2000);
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            console.error("Error:", textStatus, errorThrown);
            // Hide the loader even if there's an error
            $('#semiTransparenDiv').css('display', 'none');
        }
    });
});


	$(document).ready(function () {
		$(".removeCoupon").on("click", function (e) {
			e.preventDefault();
			var couponCode = $("#couponCode").val();

			$.ajax({
				url: "removeCoupon",
				method: "POST",
				data: { couponCode: couponCode },
				success: function (response) {
					// Handle the response
					var jsondt = JSON.parse(response);
					if (jsondt.status === "success") {
						$("#couponCode").val('');
						$('.Discount').remove();
						$('#apllyCouponForm').css('display', 'block');
						$('#removeCouponForm').css('display', 'none');
						$('.couponname').html(jsondt.couponCode);
						$(".coupondata").html('<span class="error text-danger">' + jsondt.message + '.</span>');

						var formattedShippingCost;
						if (jsondt.shippingCost === 0) {
							formattedShippingCost = "Free shipping";
						} else {
							formattedShippingCost = currency + parseFloat(jsondt.shippingCost).toFixed(2);
						}

						$(".order-summary-table").html('<tbody>' +
							'<tr>' +
							'<td class="text-dark">Subtotal</td>' +
							'<th>' + currency + parseFloat(jsondt.total_item).toFixed(2) + '</th>' +
							'</tr>' +
							// '<tr>' +
							// '<td class="text-dark">Shipping Cost</td>' +
							// '<th>' + formattedShippingCost + '</th>' +
							// '</tr>' +
							(jsondt.isShippingEnabled ?
								'<tr>' +
								'<td class="text-dark">Shipping Cost</td>' +
								'<th>' + formattedShippingCost + '</th>' +
								'</tr>' : '') +
							// '<tr>' +
							// '<td class="text-dark">Tax</td>' +
							// '<th>' + currency + parseFloat(jsondt.tax).toFixed(2) + '</th>' +
							// '</tr>' +
							(jsondt.isTaxEnabled ?
								'<tr>' +
								'<td class="text-dark">Tax</td>' +
								'<th>' + currency + parseFloat(jsondt.tax).toFixed(2) + '</th>' +
								'</tr>' : '') +
							'<tr class="total">' +
							'<td class="text-dark">Total</td>' +
							'<th>' + currency + parseFloat(jsondt.totalWithShipping).toFixed(2) + '</th>' +
							'</tr>' +

							'</tbody>');
						//location.reload();
					}
					else if (jsondt.status === 'error') {
						// Print error message
						$(".coupondata").html('<span class="error text-danger">Please enter a valid coupon code.</span>');
					}
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("Error: " + errorThrown);
				}
			});

		});

		// $(".apllyCouponForm").on("submit", function(e) {
		// 	e.preventDefault();

		// 	var couponCode = $("#couponCode").val();

		//     // Check if the coupon code is empty
		//     if (couponCode.trim() === "")
		//     {
		//         $(".coupondata").html('<span class="error text-danger">Please enter a coupon code.</span>');
		//         //alert("Please enter a coupon code.");
		//         return; 
		//     }
		// 	var formData = $(this).serialize();

		// 	$.ajax({
		// 		url: "applyCoupon",
		// 		method: "POST",
		// 		data: formData,
		// 		success: function(response) 
		// 		{
		// 			// Handle the response
		// 			var jsondt = JSON.parse(response);
		// 			if(jsondt.status === "success") 
		// 			{ 
		// 			    $('#apllyCouponForm').css('display','none');

		// 			    $('#removeCouponForm').css('display','block');
		// 			    $('.couponname').html(jsondt.couponCode);
		// 			    $(".coupondata").html('<span class="error text-success">Coupon applied successfully.</span>');

		// 		         $(".order-summary-table").html('<tbody>'+
		// 						'<tr>'+
		// 							'<td class="text-dark">Subtotal</td>'+
		// 							'<th>$' + parseFloat(jsondt.total_item).toFixed(2) + '</th>'+
		// 						'</tr>'+
		// 						'<tr>'+
		// 							'<td class="text-dark">Shipping Cost</td>'+
		// 							'<th>$' + parseFloat(jsondt.shippingCost).toFixed(2) + '</th>'+
		// 						'</tr>'+
		// '<tr>'+
		// 	'<td class="text-dark">Tax</td>'+
		// 	'<th>$' + parseFloat(jsondt.tax).toFixed(2) + '</th>'+
		// '</tr>'+
		// 						'<tr class="Discount">'+
		// 										'<td class="text-dark">Discount</td>'+
		// 										'<th>$' + parseFloat(jsondt.DiscountPrice).toFixed(2) + '</th>'+
		// 									'</tr>'+
		// 						'<tr class="total">'+
		// 							'<td class="text-dark">Total</td>'+
		// 							'<th>$' + parseFloat(jsondt.totalWithShipping).toFixed(2) + '</th>'+
		// 						'</tr>'+

		// 						'</tbody>');
		// 		    // location.reload();
		// 			} 
		// 			else if(jsondt.status==='error')
		// 			{
		// 				// Print error message
		// 			    $(".coupondata").html('<span class="error text-danger">Please enter a valid coupon code.</span>');
		// 			}
		// 		},
		// 		error: function(xhr, textStatus, errorThrown) {
		// 			console.log("Error: " + errorThrown);
		// 		}
		// 	});
		// });

		$(".apllyCouponForm").on("submit", function (e) {
			e.preventDefault();

			var couponCode = $("#couponCode").val();

			// Check if the coupon code is empty
			if (couponCode.trim() === "") {
				$(".coupondata").html('<span class="error text-danger">Please enter a coupon code.</span>');
				return;
			}

			var formData = $(this).serialize();

			$.ajax({
				url: "applyCoupon",
				method: "POST",
				data: formData,
				success: function (response) {
					// Parse the JSON response
					try {
						var jsondt = JSON.parse(response);

						if (jsondt.status === "success") {
							// Hide coupon form and display remove coupon button
							$('#apllyCouponForm').hide();
							$('#removeCouponForm').show();

							// Show the coupon code applied
							$('.couponname').html(jsondt.couponCode);
							$(".coupondata").html('<span class="error text-success">Coupon applied successfully.</span>');

							var formattedShippingCost;
							if (jsondt.shippingCost === 0) {
								formattedShippingCost = "Free shipping";
							} else {
								formattedShippingCost = currency + parseFloat(jsondt.shippingCost).toFixed(2);
							}

							// Update the order summary table
							$(".order-summary-table").html(
								'<tbody>' +
								'<tr>' +
								'<td class="text-dark">Subtotal</td>' +
								'<th>' + currency + parseFloat(jsondt.total_item).toFixed(2) + '</th>' +
								'</tr>' +
								// '<tr>' +
								// '<td class="text-dark">Shipping Cost</td>' +
								// '<th>' + formattedShippingCost + '</th>' +
								// '</tr>' +
								(jsondt.isShippingEnabled ?
									'<tr>' +
									'<td class="text-dark">Shipping Cost</td>' +
									'<th>' + formattedShippingCost + '</th>' +
									'</tr>' : '') +
								// '<tr>' +
								// '<td class="text-dark">Tax</td>' +
								// '<th>' + currency + parseFloat(jsondt.tax).toFixed(2) + '</th>' +
								// '</tr>' +
								(jsondt.isTaxEnabled ?
									'<tr>' +
									'<td class="text-dark">Tax</td>' +
									'<th>' + currency + parseFloat(jsondt.tax).toFixed(2) + '</th>' +
									'</tr>' : '') +
								'<tr class="Discount">' +
								'<td class="text-dark">Discount</td>' +
								'<th>' + currency + parseFloat(jsondt.DiscountPrice).toFixed(2) + '</th>' +
								'</tr>' +
								'<tr class="total">' +
								'<td class="text-dark">Total</td>' +
								'<th>' + currency + parseFloat(jsondt.totalWithShipping).toFixed(2) + '</th>' +
								'</tr>' +
								'</tbody>'
							);

						} else if (jsondt.status === 'fail') {
							// Display an error message for invalid coupons
							$(".coupondata").html('<span class="error text-danger">' + jsondt.message + '</span>');
						}
					} catch (e) {
						console.error("Parsing error:", e);
						$(".coupondata").html('<span class="error text-danger">An unexpected error occurred.</span>');
					}
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("Error: " + errorThrown);
					$(".coupondata").html('<span class="error text-danger">An error occurred while applying the coupon. Please try again.</span>');
				}
			});
		});



		$(".btn-number").on('click', function (e) {
			var button = $(this);
			var qtyInput = button.closest('.input-group').find('.input-number');
			var id = button.data('id');
			var price = button.data('price');
			var qty = parseFloat(qtyInput.val());

			if (button.data('type') === 'minus') {
				if (qty > 0) {
					qtyInput.val(qty - 0);
				}
			} else if (button.data('type') === 'plus') {
				qtyInput.val(qty + 0);
			}

			var total = qtyInput.val() * price;
			$(".total_amount[data-id='" + id + "'] span").html(currency + total);
		});

		// 		$(".updateCartbtn").on("click", function(e) {
		// 			e.preventDefault();
		// 			var form = document.getElementById('cartProductList');
		// 			var formData = new FormData(form);
		// 			$('#semiTransparenDiv').css('display','block'); 
		// 			$.ajax({
		// 				url: "/updatecart",
		// 				method: "POST",
		// 				data: formData,
		// 				processData: false, 
		//     			contentType: false, 
		// 				success: function(response) {
		// 					// Handle the response
		// 					var jsonObject = JSON.parse(response);
		// 					console.log(jsonObject);
		// 					if (jsonObject.status === "success") 
		// 					{
		// 					    //$('.overlay').css('display','block');
		// 					    $('ul.shopping-list').html(jsonObject.cart);
		// 					    $(".total-count").text(jsonObject.CartTotals);
		// 					    $(".dropdown-cart-header span").text(jsonObject.CartTotals+" Items");
		// 					    var html='';
		// 					    var htmlres='';
		// 					    for(var i=0;i<jsonObject.cart.length;i++)
		//                         {
		//                             html += '<li id="'+jsonObject.cart[i].id+'">'+
		//                                 '<a href="javascript:void(0)"  class="remove removeItem" data-id="'+jsonObject.cart[i].id+'" title="Remove this item"><i class="fa fa-remove"></i></a>'+
		//                                 '<a class="cart-img" href="javascript:void(0)"><img src="'+jsonObject.cart[i].ProductImage+'" alt="javascript:void(0)"></a>'+
		//                                 '<h4><a href="/single_product/'+jsonObject.cart[i].id+'">'+jsonObject.cart[i].name+'</a></h4>'+
		//                                 '<p class="quantity">'+jsonObject.cart[i].quantity+'x - <span class="amount">$'+jsonObject.cart[i].unit_price+'</span></p>'+
		//                             '</li>';

		//                         }

		//                         $('ul.shopping-list').html(html);
		//                         $(".total-amount").text("$"+jsonObject.total_item);
		//                         $(".order-summary-table").html('<tbody>'+
		// 								'<tr>'+
		// 									'<td>Subtotal</td>'+
		// 									'<th>$' + parseFloat(jsonObject.total_item).toFixed(2) + '</th>'+
		// 								'</tr>'+
		// 								'<tr>'+
		// 									'<td class="text-dark">Shipping Cost</td>'+
		// 									'<th>$' + parseFloat(jsondt.shippingCost).toFixed(2) + '</th>'+
		// 								'</tr>'+
		// 								'<tr>'+
		// 									'<td>Tax</td>'+
		// 									'<th>$' + parseFloat(jsonObject.tax).toFixed(2) + '</th>'+
		// 								'</tr>'+
		// 								(jsonObject.DiscountPrice > 0 ?
		//                                 '<tr class="Discount">' +
		//                                 '<td>Discount</td>' +
		//                                 '<th>$' + parseFloat(jsonObject.DiscountPrice).toFixed(2) + '</th>' +
		//                                 '</tr>' : '') + 
		// 								'<tr class="total">'+
		// 									'<td>Total</td>'+
		// 									'<th>$' + parseFloat(jsonObject.totalWithShipping).toFixed(2)  +'</th>'+
		// 								'</tr>'+

		// 								'</tbody>');
		//                         setTimeout(function()
		//                         {
		//                             //   Swal.fire({
		//                             //         title: 'Product updated to cart!',
		//                             //         didOpen: function () {
		//                             //           Swal.showLoading()
		//                             //           // AJAX request simulated with setTimeout
		//                             //           setTimeout(function () {
		//                             //             Swal.close()
		//                             //           }, 2000)
		//                             //         }
		//                             //       });

		//                           // $('.overlay').css('display','none');
		//                             $('#semiTransparenDiv').css('display','none'); 
		//                         },2000);

		// 						// Reload the page or update the cart contents

		// 					} 
		// 					else 
		// 					{
		// 						// Print error message

		// 					}
		// 				},
		// 				error: function(xhr, textStatus, errorThrown) {
		// 					console.log("Error: " + errorThrown);
		// 				}
		// 			});
		// 		});
		$(".updateCartbtn").on("click", function (e) {
			e.preventDefault();
			var form = document.getElementById('cartProductList');
			var formData = new FormData(form);
			$('#semiTransparenDiv').css('display', 'block'); // Show the overlay
			$.ajax({
				url: "updatecart",
				method: "POST",
				data: formData,
				processData: false,
				contentType: false,
				success: function (response) { 
					var jsonObject = JSON.parse(response);
					console.log(jsonObject);
					if (jsonObject.status === "success") {
						$('ul.shopping-list').html(jsonObject.cart);
						$(".total-count").text(jsonObject.CartTotals);
						$(".dropdown-cart-header span").text(jsonObject.CartTotals + " Items");

						var html = '';
						for (var i = 0; i < jsonObject.cart.length; i++) {
							html += '<li id="' + jsonObject.cart[i].id + '">' +
								'<a href="javascript:void(0)" class="remove removeItem" data-id="' + jsonObject.cart[i].id + '" title="Remove this item"><i class="fa fa-remove"></i></a>' +
								'<a class="cart-img" href="javascript:void(0)"><img src="' + jsonObject.cart[i].ProductImage + '" alt="javascript:void(0)"></a>' +
								'<h4><a href="/single_product/' + jsonObject.cart[i].id + '">' + jsonObject.cart[i].name + '</a></h4>' +
								'<p class="quantity">' + jsonObject.cart[i].quantity + 'x - <span class="amount">' + currency + jsonObject.cart[i].unit_price + '</span></p>' +
								'</li>';
						}

						$('ul.shopping-list').html(html);
						$(".total-amount").text(currency + parseFloat(jsonObject.total_item).toFixed(2));

						var formattedShippingCost;
						if (jsonObject.shippingCost === 0) {
							formattedShippingCost = "Free shipping";
						} else {
							formattedShippingCost = currency + parseFloat(jsonObject.shippingCost).toFixed(2);
						}

						// Update order summary
						$(".order-summary-table").html('<tbody>' +
							'<tr><td class="text-dark">Subtotal</td><th>' + currency + parseFloat(jsonObject.total_item).toFixed(2) + '</th></tr>' +
							// '<tr><td class="text-dark">Shipping Cost</td><th>$' + parseFloat(jsonObject.shippingCost).toFixed(2) + '</th></tr>' +
							(jsonObject.isShippingEnabled ?
								'<tr><td class="text-dark">Shipping Cost</td><th>' + formattedShippingCost + '</th></tr>' : '') +
							// '<tr><td class="text-dark">Tax</td><th>' + currency + parseFloat(jsonObject.tax).toFixed(2) + '</th></tr>' +
							(jsonObject.isTaxEnabled ?
								'<tr><td class="text-dark">Tax</td><th>' + currency + parseFloat(jsonObject.tax).toFixed(2) + '</th></tr>' : '') +
							(jsonObject.DiscountPrice > 0 ?
								'<tr class="Discount"><td class="text-dark">Discount</td><th>' + currency + parseFloat(jsonObject.DiscountPrice).toFixed(2) + '</th></tr>' : '') +
							'<tr class="total"><td class="text-dark">Total</td><th>' + currency + parseFloat(jsonObject.totalWithShipping).toFixed(2) + '</th></tr>' +
							'</tbody>');

						// Hide the loading overlay immediately after update
						$('#semiTransparenDiv').css('display', 'none');
					}
					else {
						// Handle the error case (if any)
						$('#semiTransparenDiv').css('display', 'none'); // Ensure overlay is hidden
					}
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("Error: " + errorThrown);
					$('#semiTransparenDiv').css('display', 'none'); // Hide the overlay in case of error
				}
			});
		});



		$("select[name='CountryID']").on("change", function (e) {
			e.preventDefault();
			var CountryID = $(this).val();
			var formData = new FormData();
			formData.append('CountryID', CountryID);

			$.ajax({
				url: "/getstats",
				method: "POST",
				data: formData,
				processData: false,
				contentType: false,
				success: function (response) {
					const states = JSON.parse(response);
					// Get the select element
					var stateSelect = $("#state-province");
					// Clear existing options
					stateSelect.empty();

					var option = $("<option></option>");
					// Set the option value and text
					option.val('');
					option.text('Select');
					stateSelect.append(option);
					// Iterate over the states
					states.forEach(function (state) {
						// Create a new option element
						var option = $("<option></option>");

						// Set the option value and text
						option.val(state.StateID);
						option.text(state.StateName);

						// Append the option to the select element
						stateSelect.append(option);
					});

				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("Error: " + errorThrown);
				}
			});
		});


		//var stripe = Stripe('pk_test_pmq5HsqFgDq4eJVtVqg90w8700Ym4ScYKf');
		var stripe = Stripe('<?php echo $stripe_public_key; ?>');
		var elements = stripe.elements();
		var stripeContainer = document.getElementById('stripe-container');

		// Create an instance of the card Element.
		//var card = elements.create('card');
		var card = elements.create('card', {
			hidePostalCode: true, // Set to true to hide the ZIP code field
		});

		// Add an instance of the card Element into the `card-element` div.
		card.mount('#card-element');

		// Handle real-time validation errors from the card Element.
		card.addEventListener('change', function (event) {
			var displayError = document.getElementById('card-errors');
			if (event.error) {
				displayError.textContent = event.error.message;
			} else {
				displayError.textContent = '';
			}
		});
		function handleStripePayment() {
			// Show the Stripe container
			stripeContainer.style.display = 'block';
		}
		function removeDynamicElements() {
			var idInput = document.getElementsByName('stripe_token_id')[0];
			var typeInput = document.getElementsByName('stripe_token_type')[0];

			if (idInput) {
				idInput.parentNode.removeChild(idInput);
			}

			if (typeInput) {
				typeInput.parentNode.removeChild(typeInput);
			}
		}



		$(document).on("click", ".btncheck", function () {
			"use strict";
			removeDynamicElements();
			var flag = 1;
			$('.errortxt').remove();
			var patment_method = $("input[name='patment_method']:checked").val();

			if ($("#fname").val() == "") {
				$(".fname_error").html('<span class="errortxt text-danger">Please enter first name</span>');
				flag = 0;

			}
			if ($("#lname").val() == "") {
				$(".lname_error").after('<span class="errortxt text-danger">Please enter last name</span>');
				flag = 0;

			}
			if ($("#email").val() == "") {
				$("#email").focus();
				$(".email_error").after('<span class="errortxt text-danger">Please enter email address</span>');
				flag = 0;

			}
			// if ($('#phoneno').val() == "") {
			// 	$(".phone_error").after('<span class="errortxt text-danger">Please enter phone number</span>');
			// 	flag = 0;

			// }
			if ($('#phoneno').val() == "") {
				$(".phone_error").after('<span class="errortxt text-danger">Please enter phone number</span>');
				flag = 0;
			} else if ($('#phoneno').val().length !== 10) {
				$(".phone_error").after('<span class="errortxt text-danger">Phone number must be 10 digits</span>');
				flag = 0;
			}
			if ($('#country').val() == "") {
				$('select[name="CountryID"]').focus();
				$(".country_error").after('<span class="errortxt text-danger">Please select country</span>');
				flag = 0;

			}
			if ($("#state").val() == "") {
				$('select[name="state-province"]').focus();
				$(".state_error").after('<span class="errortxt text-danger">Please select state</span>');
				flag = 0;

			}
			if ($('#city').val() == "") {
				$('select[name="city"]').focus();
				$(".city_error").after('<span class="errortxt text-danger">Please select city</span>');
				flag = 0;

			}
			if ($("#address1").val() == "") {
				$('input[name="address1"]').focus();
				$(".address1_error").after('<span class="errortxt text-danger">Please enter address1</span>');
				flag = 0;

			}
			if ($("#postcode").val() == "") {
				$('input[name="postcode"]').focus();
				$(".postcode_error").after('<span class="errortxt text-danger">Please enter Postcode</span>');
				flag = 0;

			}

			if (!patment_method) {
				$('.payment_error_div').html('<div class="alert alert-danger errortxt" role="alert">Select Payment Method</div>');
				flag = 0;
			}

			if (flag == 0) {
				return false;
			}

			if (flag && patment_method) {
				//  $('.overlay').css('display','block');
				$('#semiTransparenDiv').css('display', 'block');
				var baseurl = $("#baseurl").val();
				var ajxurl = "";
				if (patment_method == 'paypal') {
					// document.getElementById('checkoutsubmiform').submit();


					ajxurl = baseurl + 'createPayment';
					// console.log(ajxurl);
					checkout_form_submit(ajxurl, patment_method);

				} else if (patment_method == 'stripe') {

					ajxurl = baseurl + 'checkout/stripe_payment';

					stripe.createToken(card).then(function (result) {
						if (result.error) {
							$('#semiTransparenDiv').css('display', 'none');
							// Inform the user if there was an error.
							var errorElement = document.getElementById('card-errors');
							errorElement.textContent = result.error.message;
							flag = 0;
							removeDynamicElements();

							return false;
							// Re-enable the submit button.
							//form.querySelector('button').disabled = false;
						} else {
							// Send the token to your server.
							//stripeTokenHandler(result.token);
							var token = result.token;
							// console.log(result.token);
							// alert(token.id);

							var tokenId = token.id;
							var tokenType = token.type;

							// Append the id and type to your form as hidden input fields
							var idInput = document.createElement('input');
							idInput.type = 'hidden';
							idInput.name = 'stripe_token_id';
							idInput.value = tokenId;

							var typeInput = document.createElement('input');
							typeInput.type = 'hidden';
							typeInput.name = 'stripe_token_type';
							typeInput.value = tokenType;

							// Append the inputs to the form
							document.getElementById('checkoutsubmiform').appendChild(idInput);
							document.getElementById('checkoutsubmiform').appendChild(typeInput);
							checkout_form_submit(ajxurl, patment_method);
						}

					});


				} else if (patment_method == 'razorpay') {
					var orderno = getRandomInt(10000, 99999);
					var amount = $('input[name="amount"]').val();
					var fname = $('input[name="fname"]').val();
					var lname = $('input[name="lname"]').val();
					var email = $('input[name="email"]').val();
					var phoneno = $('input[name="phoneno"]').val();
					var currencySymbol = '<?php echo $all_setting_data["currency"]; ?>'; // e.g., ₹, $, £, €

				var currencyMap = {
                        '₹': 'INR', 
                        '$': 'USD', 
                        '£': 'GBP', 
                        '€': 'EUR', 
                        '¥': 'JPY', 
                        'Fr': 'CHF', 
                        'C$': 'CAD', 
                        'A$': 'AUD', 
                        '₩': 'KRW', 
                        '₽': 'RUB', 
                        'R$': 'BRL', 
                        'R': 'ZAR',
                        'S$': 'SGD'
                    };

					var currencyy = currencyMap[currencySymbol] || 'INR';

					ajxurl = baseurl + 'checkout/razorpay_payment';
					console.log(currency);
				// 	alert(amount);
					options = {
						key: "rzp_test_9UrkTeo8gsGo77",
						amount: amount,
						name: fname + " " + lname,
						description: orderno,
						netbanking: true,
						currency: currencyy,
						
						prefill: {
							name: fname + " " + lname,
							email: email,
							contact: phoneno
						},
						notes: {
							soolegal_order_id: orderno,
						},
						handler: function (transaction) {
							document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
							var baseurl = $("#baseurl").val();
							ajxurl = baseurl + 'checkout/razorpay_payment';
							$("form#checkoutsubmiform").attr('action', ajxurl);
							$("form#checkoutsubmiform").attr('method', 'POST');
							document.getElementById('checkoutsubmiform').submit();
						},
						"modal": {
							"ondismiss": function () {
								location.reload()
							}
						}
					};

					razorpaySubmit(this);
				} else if (patment_method == 'cod') {
					ajxurl = baseurl + 'placeorder';
					$("form#checkoutsubmiform").attr('action', ajxurl);
					$("form#checkoutsubmiform").attr('method', 'POST');
					checkout_form_submit(ajxurl, patment_method);
					// $("form#checkoutsubmiform").submit();
				} else {
					ajxurl = baseurl + 'placeorder';
					checkout_form_submit(ajxurl, patment_method);
				}



			}

		});

		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

		function checkout_form_submit(ajxurl, patment_method) {
			var baseurl = $("#baseurl").val();
			var form = document.getElementById('checkoutsubmiform');
			var formData = new FormData(form);
			formData.append('patment_method', patment_method);

			// Debugging
			console.log(formData);

			$.ajax({
				url: ajxurl,
				method: "POST",
				data: formData,
				processData: false,
				contentType: false,
				success: function (response) {
					// If response is a JSON string, parse it
					if (typeof response === "string") {
						response = JSON.parse(response);
					}

					console.log(response);

					if (response.status == '1') {
						$(".succ_msg").html('<div class="alert alert-success">Your order has been placed successfully.</div>');
						setTimeout(function () {
							var url = baseurl + 'order_success';
							if (patment_method == 'stripe') {
								var OrderNumber = response.data.OrderNumber;
								url = baseurl + 'stripe_order_success?OrderNumber=' + OrderNumber;
							} else if (patment_method == 'cod') {
								var OrderNumber = response.data.OrderNumber;
								url = baseurl + 'cod_order_success?OrderNumber=' + OrderNumber;
							}
							console.log(url);

							window.location.href = url;
							$('#semiTransparenDiv').css('display', 'none');
						}, 2000);
					}
					else if (patment_method == 'paypal' && response.approval_url) {
						// Redirect to PayPal for payment
						window.location.href = response.approval_url;
					}
					else {
						// Handle failure or error
						$(".succ_msg").html('<div class="alert alert-danger">Error placing order. Please try again.</div>');
					}
				},
				error: function (xhr, textStatus, errorThrown) {
					console.log("Error: " + errorThrown);
				}
			});
		}



		$('input.payment_method[type="radio"]').on('click', function () {
			if ($(this).val() == 'paypal') {
				$("form#checkoutsubmiform").attr('action', 'https://www.sandbox.paypal.com/cgi-bin/webscr');
				// $("button").attr('type','submit');
				// $("button").removeClass('checkot_btn');
			}
			if ($(this).val() == 'cod') {
				$("form#checkoutsubmiform").attr('action', 'placeorder');
				// $("button").attr('type','submit');
				// $("button").removeClass('checkot_btn');
			}
			if ($(this).val() == 'stripe') {
				$("form#checkoutsubmiform").attr('action', '');
				handleStripePayment();
			} else {
				stripeContainer.style.display = 'none';
			}
			// 			else 
			// 			{
			// 				$("button").addClass('checkot_btn');
			// 				$("button").removeClass('btncheck');
			// 				$("form#checkoutsubmiform").attr('action','');
			// 			}
		});

		$(".btncheck_old").on('click', function () {
			var patment_method = $("input[name='patment_method']:checked").val();

			if ($("#fname").val() == "") {
				$(".fname_error").html('<span class="errortxt text-danger">Please enter first name</span>');
			}
			else {
				$(".fname_error").html('');
			}
			if ($("#lname").val() == "") {
				$(".lname_error").html('<span class="errortxt text-danger">Please enter last name</span>');
			}
			else {
				$(".lname_error").html('');
			}

			if ($("#email").val() == "") {
				$(".email_error").html('<span class="errortxt text-danger">Please enter email address</span>');
			}
			else {
				$(".email_error").html('');
			}
			if ($('#phoneno').val() == "") {
				$(".phone_error").html('<span class="errortxt text-danger">Please enter phone number</span>');
			}
			else {
				$(".phone_error").html('');
			}
			if ($('#country').val() == "") {
				$(".country_error").html('<span class="errortxt text-danger">Please select country</span>');
			}
			else {
				$(".country_error").html('');
			}
			if ($("#state").val() == "") {
				$(".state_error").html('<span class="errortxt text-danger">Please select state</span>');
			}
			else {
				$(".state_error").html('');
			}
			if ($("#city").val() == "") {
				$(".city_error").html('<span class="errortxt text-danger">Please select city</span>');
			}
			else {
				$(".city_error").html('');
			}
			if ($("#address1").val() == "") {
				$(".address1_error").html('<span class="errortxt text-danger">Please enter address1</span>');
			}
			else {
				$(".address1_error").html('');
			}
			if ($("#address2").val() == "") {
				$(".address2_error").html('<span class="errortxt text-danger">Please enter address2</span>');
			}
			else {
				$(".address2_error").html('');
			}
			if ($("#postcode").val() == '') {
				$(".postcode_error").html('<span class="errortxt text-danger">Please enter postcode</span>');
			}
			else {
				$(".postcode_error").html('');
			}
			if ($("#company").val() == '') {
				$(".company_error").html('<span class="errortxt text-danger">Please select company</span>');
			}
			else {
				$(".company_error").html('');
			}
			if (!patment_method) {
				$('.payment_error_div').html('<div class="alert alert-danger errortxt" role="alert">Select Payment Method</div>');
			}
			else {
				$('.payment_error_div').html('');
			}


		});


	});

</script>
</body>

</html>