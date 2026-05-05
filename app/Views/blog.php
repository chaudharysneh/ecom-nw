<?php include('header.php'); ?>
<style>
	.main-category {
		display: none;
	}

	.blog-single .blog-meta span a:hover {
		color: black;
	}

	.blog-single .blog-meta span a i:hover {
		color: black;
	}

	.blog-single .blog-meta .author i {
		color: black;
	}

	.blog-single .share-social .content-tags .tag-inner li a:hover {
		background: #f4f7fc;
		color: black;
	}

	#section2 {
		padding: 5px 0 !important;

	}

	/*#blog_data:hover ,#blog_data1:hover, #blog_data2:hover, #blog_data3:hover, #blog_data4:hover, #blog_data5:hover{*/
	/*    color : none !important;*/

	/*}*/
	/*.blog-single .blog-meta span a:hover {*/
	/*    color : none !important;*/
	/*}*/
	/*.blog-single .blog-meta span a:hover {*/
	/*    color: none;*/
	/*}*/
</style>

<!-- Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="">Blog<i class="ti-arrow-right"></i></a></li>
						<li class="active"><?= $single_blog_data['CategoryName']; ?></li>

					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Blog Single -->
<section class="blog-single section" id="section2">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-12">
				<div class="blog-single-main">
					<div class="row">
						<div class="col-12">
							<div class="image" style="height: 315px;">
								<img src="<?php echo base_url(); ?>admin/public/upload_images/<?php echo $single_blog_data['image']; ?>"
									class="rounded" height="500" width="500"
									style=" width : 100% !important; height: 100% !important; object-fit: contain; object-position: center; ">
							</div>
							<div class="blog-detail">
								<h2 class="blog-title"><?= $single_blog_data['title']; ?></h2>
								<div class="blog-meta">
									<span class="author"><a id="blog_data"><i
												class="fa fa-user"></i>By<?= $user_dt['UserFirstName']; ?></a><a
											id="blog_data1"><i class="fa fa-calendar"></i>
											<?php
											$dateString = $single_blog_data['created_at'];

											$dateTime = new DateTime($dateString);
											$formattedDate = $dateTime->format('M d, Y');

											echo $formattedDate;

											?>



										</a><a id="blog_data2" class=""><i class="fa fa-comments"></i>Comment
											(<?php echo $all_comment_count; ?>)</a></span>
								</div>
								<div class="content">
									<p><?= $single_blog_data['description']; ?></p>
									<!--<blockquote> <i class="fa fa-quote-left"></i> Do what you love to do and give it your very best. Whether it's business or baseball, or the theater, or any field. If you don't love what you're doing and you can't give it your best, get out of it. Life is too short. You'll be an old man before you know it. risus. Ut tincidunt, erat eget feugiat eleifend, eros magna dapibus diam.</blockquote>-->
									<!--<p>What a crazy time. I have five children in colleghigh school graduates.jpge or pursing post graduate studies  Each of my children attends college far from home, the closest of which is more than 800 miles away. While I miss being with my older children, I know that a college experience can be the source of great growth and experience can be the source of source of great growth and can provide them with even greater in future.</p>-->
									<!--<p>What a crazy time. I have five children in colleghigh school graduates.jpge or pursing post graduate studies  Each of my children attends college far from home, the closest of which is more than 800 miles away. While I miss being with my older children, I know that a college experience can be the source of great growth and experience can be the source of source of great growth and can provide them with even greater in future.</p>-->
								</div>
							</div>
							<div class="share-social">
								<div class="row">
									<div class="col-12">
										<div class="content-tags">
											<h4>Tags:</h4>
											<ul class="tag-inner">

												<?php
												if (!empty($all_tag_data)) {
													foreach ($all_tag_data as $tag_dt) {
														?>



														<li><a id="blog_data3"><?= $tag_dt['tagname'] ?? 'N/A'; ?></a></li>
														<?php
													}
												} else {
													?>
													<li><a id="blog_data4"><?php echo "N/A"; ?></a></li>
													<?php
												}
												?>
												<!--<li><a href="#">wordpress</a></li>-->
												<!--<li><a href="#">html</a></li>-->
												<!--<li><a href="#">multipurpose</a></li>-->
												<!--<li><a href="#">education</a></li>-->
												<!--<li><a href="#">template</a></li>-->
												<!--<li><a href="#">Ecommerce</a></li>-->
											</ul>
										</div>
									</div>
									<div class="col-12">
										<div class="content-tags">
											<h4>Catagory:</h4>
											<ul class="tag-inner" style="padding-left: 90px!important">


												<li><a id="blog_data5"><?= $single_blog_data['CategoryName']; ?></a></li>

												<!--<li><a href="#">wordpress</a></li>-->
												<!--<li><a href="#">html</a></li>-->
												<!--<li><a href="#">multipurpose</a></li>-->
												<!--<li><a href="#">education</a></li>-->
												<!--<li><a href="#">template</a></li>-->
												<!--<li><a href="#">Ecommerce</a></li>-->
											</ul>
										</div>
									</div>

									<!-- ------------------------ -->
									<div class="col-12">
					<div class="comments">
						<h3 class="comment-title">Comments (<?php echo $all_comment_count; ?>)</h3>
						<!-- Single Comment -->
						<?php
						if (!empty($all_comment_data)) {
							foreach ($all_comment_data as $comment_dt) {
								?>

								<div class="single-comment">
									<img src="https://via.placeholder.com/80x80" alt="#">
									<div class="content">
										<h4><?= $comment_dt['name']; ?><span>
												<?php
												$time = $comment_dt['created_at'];
												$timestamp = strtotime($time);
												$formattedDate = date("g:i A \O\\n M j, Y", $timestamp);
												;


												?>
												At <?= $formattedDate; ?>
												<!--At 8:59 pm On Feb 28, 2018-->
											</span></h4>
										<p><?= $comment_dt['comments']; ?></p>
										<!--<div class="button">-->
										<!--	<a href="#" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>Reply</a>-->
										<!--</div>-->
									</div>
								</div>
								<?php
							}
						}
						?>

					</div>
				</div>
									 <!-- ================== -->
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="col-lg-6 col-12">
				<div class="main-sidebar pb-0 rounded mt-0">
					<!-- Single Widget -->
					<div class="single-widget category">
						<h3 class="title">Blog Categories</h3>
						<ul class="categor-list">
							<?php
							if (!empty($catdata)) {
								// print_r($catdata);
								foreach ($catdata as $catdt) {
									?>
									<li><a
											href="<?= base_url(); ?>blogs/<?= $catdt['CategoryName']; ?>/<?= base64_encode($catdt['CategoryID']); ?>"><?= $catdt['CategoryName']; ?></a>
									</li>

									<?php
								}
							}
							?>
						</ul>
					</div>
					<!--/ End Single Widget -->
					<!-- Single Widget -->
					<div class="single-widget recent-post">



						<!-- Single Post -->
						<?php
						if (!empty($catagory_blog_data)) {
							// print_r($catagory_blog_data);
							foreach ($catagory_blog_data as $blog_dt) {

								?>
								<div class="single-post">
									<div class="image">

										<img
											src="<?php echo base_url(); ?>admin/public/upload_images/<?php echo $blog_dt['image']; ?>">



									</div>
									<div class="content">
										<?php

										$catagory = new App\Models\Categorymodel();
										// print_r($catagory);
										// die;
								
										$cat_dt = $catagory->where('CategoryID', $blog_dt['category'])->first();
										// print_r($cat_dt);
										// foreach($varia_dt as $vardt)
										// {
										//     $pricearr[]=$vardt['VariationPrice'];
										// }
										?>

										<h5>

											<?php
											$blog_title = $blog_dt['title'];
											$blog_String = str_replace(' ', '_', $blog_title);
											?>

											<a
												href="<?= base_url(); ?>blogs/<?= $cat_dt['CategoryName']; ?>/<?= base64_encode($blog_dt['id']); ?>/<?= base64_encode($cat_dt['CategoryID']); ?><?= $blog_String; ?>"><?= $blog_dt['title']; ?></a>

										</h5>
										<ul class="comment">
											<li><i class="fa fa-calendar" aria-hidden="true"></i>
												<?php
												$dateString = $blog_dt['created_at'];

												$dateTime = new DateTime($dateString);
												$formattedDate = $dateTime->format('M d, Y');

												echo $formattedDate;

												?>
											</li>

											<?php
											$Blog_data = new App\Models\BlogcommentModel();
											$blog_comment_dt = $Blog_data->where('blog_id', $blog_dt['id'])->countAllResults();

											//  foreach($blog_comment_dt as $blog_dtt) {
											//      print_r($blog_dtt);
									
											//  }
									

											?>

											<li><i class="fa fa-commenting-o" aria-hidden="true"></i>
												<?= $blog_comment_dt ?></li>
										</ul>
									</div>
								</div>
								<?php
							}
						}

						?>
						<!-- End Single Post -->

					</div>
					<!--/ End Single Widget -->

					<!-- Single Widget -->

					<!--/ End Single Widget -->
					<!-- Single Widget -->
					<!--/ End Single Widget -->
					<!-- Single Widget -->

					<!--/ End Single Widget -->
					<!-- Single Widget -->

					<!--/ End Single Widget -->
				</div>
				
				<div class="col-12">
					<div class="reply">
						<div class="reply-head mt-4">
							<h2 class="reply-title">Leave a Comment</h2>
							<!-- Comment Form -->
							<form class="form px-4 pt-2 rounded mb-3" id="add_comment" action="#">
								<input type="hidden" name="baseurl" id="baseurl" value="<?= base_url() ?>">
								<input type="hidden" name="comm_id" id="comm_id" value="<?= $single_blog_data['id']; ?>">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Your Name<span>*</span></label>
											<input type="text" name="name" id="name" placeholder="" required="required">
											<p id="name_err"></p>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Your Email<span>*</span></label>
											<input type="email" name="email" id="email" placeholder=""
												required="required">
											<p id="email_err"></p>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Your Message<span>*</span></label>
											<textarea name="message" id="message" placeholder=""></textarea>
											<p id="message_err"></p>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group button">
											<button type="button" class="btn add_comment_data rounded">Post
												comment</button>
										</div>
										<p id="msg2"></p>
									</div>
								</div>
							</form>
							<!-- End Comment Form -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Blog Single -->

<?php include('footer.php'); ?>