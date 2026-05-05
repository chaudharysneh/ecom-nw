<?php include('header.php'); ?>
<style>
	.main-category {
		display: none;
	}

	.custom-box {
		/*border: 1px solid #ccc;*/
		padding: 20px;
		margin: 10px;
		height: 270px;
		box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.1);
		border-radius: 5px;
	}

	i.fa.fa-calendar,
	i.fa.fa-comments {
		color: #f7941d;
		margin-right: 5px;
		font-size: 13px;
	}
</style>

<body>

	<div class="container">
		<div class="row">
		<div class="col-md-10 mb-5">
            <div class="mt-5 pt-0 row">
                <?php
                if (!empty($all_blog_data)) {
                    // Instantiate models once
                    $category_model = new App\Models\Categorymodel();
                    $comment_model = new App\Models\BlogcommentModel();
                    
                    foreach ($all_blog_data as $single_blog_data) {
                        ?>
                        <div class="col-sm-4 px-2">
                            <div class="custom-box">
                                <?php
                                $string = $single_blog_data['title'];

                                // Shorten the title if necessary
                                $shortenedString = (strlen($string) > 15) ? substr($string, 0, 15) . '...' : $string;

                                // Fetch category data safely
                                $blog_comment_dt = $category_model->where('CategoryID', $single_blog_data['category'])->first();
                                $categoryName = isset($blog_comment_dt['CategoryName']) ? $blog_comment_dt['CategoryName'] : 'Unknown Category';

                                // Create a URL-friendly blog string
                                $blog_String = str_replace(' ', '_', $single_blog_data['title']);
                                ?>
                                <h5 class="blog-title mb-2"><?= htmlspecialchars($shortenedString); ?></h5>
                                <div class="image text-center">
                                    <a href="<?= base_url(); ?>blog/<?= $categoryName; ?>/<?= $blog_String; ?>/<?= base64_encode($single_blog_data['blg_id']); ?>/<?= base64_encode($single_blog_data['category']); ?>">
                                       
										<img src="<?php echo base_url(); ?>admin/public/upload_images/<?php echo $single_blog_data['image']; ?>"
										style="height:150px; width:270px;object-fit:cover;object-position: 50% 0%;">
                                    </a>
                                </div>
                                <div class="justify-content-center mt-2 row">
                                    <span class="">
                                        <a href="#" class="mr-2"><i class="fa fa-calendar"></i>
                                            <?php
                                            $dateString = $single_blog_data['created_at'];
                                            $dateTime = new DateTime($dateString);
                                            echo $dateTime->format('M d, Y');
                                            ?>
                                        </a>
                                        <?php
                                        $blog_comment_count = $comment_model->where('blog_id', $single_blog_data['blg_id'])->countAllResults();
                                        ?>
                                        <a href="#" class="mr-2"><i class="fa fa-comments"></i>Comment (<?= $blog_comment_count; ?>)</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>

		<div class="col-md-2">
            <div class="mt-5 row">
                <div class="col-form-label">
                    <div class="main-sidebar mt-0" style="padding: 26px;">
                        <div class="single-widget category">
                            <h3 class="title">Blog Categories</h3>
                            <ul class="categor-list">
                                <?php 
                                if (!empty($catdata)) {
                                    foreach ($catdata as $catdt) {
                                        ?>
                                        <li><a href="<?= base_url() ?>all_blog/<?= htmlspecialchars($catdt['CategoryName']); ?>/<?= base64_encode($catdt['CategoryID']); ?>"><?= htmlspecialchars($catdt['CategoryName']); ?></a></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="single-widget recent-post">
                            <?php
                            if (!empty($catagory_blog_data)) {
                                foreach ($catagory_blog_data as $blog_dt) {
                                    $cat_dt = $category_model->where('CategoryID', $blog_dt['category'])->first();
                                    ?>
                                    <div class="single-post">
                                        <div class="image">
											<img src="<?php echo base_url(); ?>admin/public/upload_images/<?php echo $blog_dt['image']; ?>">
                                        </div>
                                        <div class="content">
                                            <h5>
                                                <a href="<?= base_url(); ?>blogs/<?= htmlspecialchars($cat_dt['CategoryName']); ?>/<?= base64_encode($blog_dt['id']); ?>/<?= htmlspecialchars($blog_dt['title']); ?>"><?= htmlspecialchars($blog_dt['title']); ?></a>
                                            </h5>
                                            <ul class="comment">
                                                <li><i class="fa fa-calendar" aria-hidden="true"></i>
                                                    <?php
                                                    $dateString = $blog_dt['created_at'];
                                                    $dateTime = new DateTime($dateString);
                                                    echo $dateTime->format('M d, Y');
                                                    ?>
                                                </li>
                                                <?php
                                                $blog_comment_count = $comment_model->where('blog_id', $blog_dt['id'])->countAllResults();
                                                ?>
                                                <li><i class="fa fa-commenting-o" aria-hidden="true"></i><?= $blog_comment_count; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		</div>



	</div>

	<!--<div class="row justify-content-center" id="pagination_link">-->
	<?php //if ($pager): ?>
	<?php //$pagi_path = 'blog'; ?>

	<?php //endif; ?>
	<!--</div>-->

	<?//= $pagination ?>

	<div class="justify-content-center" id="pagination_link">
		<nav aria-label="Page navigation">
			<ul class="justify-content-center pagination product-pagination">
				<?php for ($i = 1; $i <= $totalPages; $i++): ?>
					<li class="page-item <?= ($currentPage == $i) ? 'active' : '' ?>">
						<a href="?page=<?= $i ?>" class="page-link"
							style="margin-bottom: 15px; margin-top: -50px;"><?= $i ?></a>
					</li>
				<?php endfor; ?>


				<!--		<li class="page-item">-->
				<!--	<a href="https://ecomweb.fableadtechnolabs.com/product?page=2" class="page-link">-->
				<!--		2				</a>-->
				<!--</li>-->
				<!--		<li class="page-item">-->
				<!--	<a href="https://ecomweb.fableadtechnolabs.com/product?page=3" class="page-link">-->
				<!--		3				</a>-->
				<!--</li>-->

			</ul>
		</nav>

	</div>

</body>
<?php include('footer.php'); ?>