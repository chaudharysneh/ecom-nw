<?php include ('header.php');?>
<style>
  .main-category{
    display: none;
  }

  section.blog-single1 {
    background: #fff;
}

</style>
		
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="blog-single.html">
									<?php echo $all_cms_data['CmsTitle'] ;?>
								</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
			
		<!-- Start Blog Single -->
		<section class="blog-single1">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-12">
						<div class="blog-single-main">
							<div class="row">
								<div class="col-12">
									
									<div class="blog-detail">
										<h2 class="blog-title"> <?php echo $all_cms_data['CmsTitle'];?> </h2>
										<div class="content">
											<p> <?php echo $all_cms_data['CmsContent']; ?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Blog Single -->
			
<?php include ('footer.php');?>