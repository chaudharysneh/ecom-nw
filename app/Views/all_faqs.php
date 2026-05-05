<?php include ('header.php');?>
<head>
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
  .main-category{
    display: none;
  }
  
  .arrow-icon::before {
    /*content: "\f078";*/
    /* Downward arrow icon */
    /*font-family: "Font Awesome 5 Free";*/
    /*font-weight: 900;*/
    float: right;
}

.btn[aria-expanded="true"] .arrow-icon::after {
    content: "\f077"; /* Upward arrow icon */
    transform: rotate(-180deg);
}
#add_title{
        font-size: 18px;
}

</style>
		
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index1.html" style="font-size: 20px;">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="blog-single.html" style="font-size: 20px">
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
		<section class="blog-single" style="margin: 0px;
    margin-top: -75px">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-12">
						<div class="">
							<div class="row">
								<div class="col-12">
									
									<div class="blog-detail">
										<h1 class=""> <?php echo $all_cms_data['CmsTitle'];?></h1>
									
										<div class="content">
											
											<p id="add_title"><?php echo $all_cms_data['CmsContent']; ?></p>
											
										</div>
									</div>
									
								</div>
								
					
								
								
								<div class="col-12" id="accordion">
								    <?php 
								   if(!empty($all_cms_data['CmsID']))
                {
                    // print_r($prd);
                    $quest = json_decode($all_cms_data['FaqQuestion']);
                    $answe = json_decode($all_cms_data['FaqAnswer']);
                    // print_r($quest);
                    foreach($quest as $key=>$que){
                        // print_r($que);
           ?>
    
        <div class="card">
            <div class="card-header" id="heading<?php echo $key; ?>">
                <h5 class="mb-0">
                    <div class="accordion-button collapsed font-weight-light toggleBtn" id="toggleBtn" data-toggle="collapse" data-target="#collapse<?php echo $key; ?>" aria-expanded="false" aria-controls="collapse<?php echo $key; ?>">
                        <?php echo $que; ?>
                        <i class="fa fa-chevron-down float-right" id="toggleIcon"></i>
                         <!--<span class="arrow-icon"></span>-->
                    </div>
                   
                </h5>
            </div>

            <div id="collapse<?php echo $key; ?>" class="collapse" aria-labelledby="heading<?php echo $key; ?>" data-parent="#accordion">
                <div class="card-body h5">
                    <?php echo $answe[$key]; ?>
                </div>
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
		</section>
		<!--/ End Blog Single -->
		<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}



</script>

			
<?php include ('footer.php');?>

<script>
    $(document).ready(function() {
$(document).on('click', '.toggleBtn', function () {
  var icon = $(this).children('i');
   if (icon.hasClass("fa-chevron-down")) {
      icon.removeClass("fa-chevron-down").addClass("fa-chevron-up");
    } else {
      icon.removeClass("fa-chevron-up").addClass("fa-chevron-down");
    }
  });
});

</script>