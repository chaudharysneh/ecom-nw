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
											<!--<p>What a crazy time. I have five children in colleghigh school graduates.jpge or pursing post graduate studies  Each of my children attends college far from home, the closest of which is more than 800 miles away. While I miss being with my older children, I know that a college experience can be the source of great growth and experience can be the source of source of great growth and can provide them with even greater in future.</p>-->
											<p> <?php echo $all_cms_data['CmsContent']; ?></p>
											<!--<p>What a crazy time. I have five children in colleghigh school graduates.jpge or pursing post graduate studies  Each of my children attends college far from home, the closest of which is more than 800 miles away. While I miss being with my older children, I know that a college experience can be the source of great growth and experience can be the source of source of great growth and can provide them with even greater in future.</p>-->
											<!--<p>What a crazy time. I have five children in colleghigh school graduates.jpge or pursing post graduate studies  Each of my children attends college far from home, the closest of which is more than 800 miles away. While I miss being with my older children, I know that a college experience can be the source of great growth and experience can be the source of source of great growth and can provide them with even greater in future.</p>-->
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