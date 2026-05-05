<?php include ('header.php');?>
<style>
	.main-category{
		display: none;
	}
	/*.map-section{*/
	/*    padding: 0px 215px;*/
	/*}*/
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
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="contect.php">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
  
	<!-- Start Contact -->
	<section id="contact-us" class="contact-us pt-0 section">
		<div class="container">
				<div class="contact-head">
					<div class="row mb-5">
						<div class="col-lg-8 col-12">
							<div class="card p-4">
								<div class="title">
									<h4>Get in touch</h4>
									<h3>Write us a message</h3>
								</div>
								<form class="form" method="post">
									<div class="row">
										<div class="col-lg-6 col-12 mb-1">
											<div class="form-group fullname mb-0">
												<label>Your Name<span>*</span></label>
												<input name="fullname" id="fullname" type="text" placeholder="" maxlength="30">
											</div>
										</div>
										<div class="col-lg-6 col-12 mb-1">
											<div class="form-group subject mb-0">
												<label>Your Subjects<span>*</span></label>
												<input name="subject" id="subject" type="text" placeholder="" maxlength="30">
											</div>
										</div>
										<div class="col-lg-6 col-12 mb-1">
											<div class="form-group emailid mb-0">
												<label>Your Email<span>*</span></label>
												<input name="email" id="emailid" type="email" placeholder="">
											</div>	
										</div>
										<div class="col-lg-6 col-12 mb-1">
											<div class="form-group phoneno mb-0">
												<label>Your Phone<span>*</span></label>
												<input type="number" name="phoneno" id="phoneno" placeholder="" maxlength="12">
											</div>
										</div>
										<div class="col-12 mb-3">
											<div class="form-group message mb-0">
												<label>Your message<span>*</span></label>
												<textarea id="message" name="message" placeholder="" maxlength="300"></textarea>
											</div>
										</div>
										<div class="dis_msg"></div>
										<div class="col-12">
											<div class="form-group button">
												<button type="button" name="submit" id="contactbtn" class="btn rounded" style="height:45px;padding: 9px 12px;">Send Message</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>

						<div class="col-lg-4 col-12">
							<div class="card p-4 h-100">
								<div class="single-info">
									<i class="fa fa-phone"></i>
									<h4 class="title">Call us Now:</h4>
										<ul>
										<li><a href="tel:<?=$all_setting_data['Phone'] ?? '';?>">+<?=$all_setting_data['Phone'] ?? '';?></a></li>
										<!--<li><a href="tel:5226724521120">+522 672-452-1120</li>-->
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-envelope-open"></i>
									<h4 class="title">Email:</h4>
									<ul>
										<li><a href="mailto:<?=$all_setting_data['Email'] ?? '';?>"><?=$all_setting_data['Email'] ?? '';?></a></li>
										<!--<li><a href="mailto:info@yourwebsite.com">support@yourwebsite.com</a></li>-->
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-location-arrow"></i>
									<h4 class="title">Our Address:</h4>
									<ul>
										<li><?=$all_setting_data['Address'] ?? '';?></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
	<!--/ End Contact -->
	
	<!-- Map Section -->
	<div class="map-section mt-1 mb-3 text-center container">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193677.81034525938!2d-74.13851071310677!3d40.669214162796116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25f18a9544a0b%3A0x8ef353a024aeb84e!2sGlobal%20Tours%20And%20Travel%20Inc!5e0!3m2!1sen!2sin!4v1685427944046!5m2!1sen!2sin" width="1350" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>
	<!--/ End Map Section -->
	
	
	
	
<?php include ('footer.php');?>