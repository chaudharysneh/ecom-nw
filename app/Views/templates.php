<?php include ('header.php');?>
<section class="templates mt-5">
    <div class="container">
        <div class="row">
            <?php 
            if($templates){
                foreach($templates as $template){
                    ?>
                    
                        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                            <a href="<?php echo base_url().'product-design-customize/'.$product_id.'?template_id='.$template['templateID']; ?>">
                            <img
                            src="/<?php echo $template['image']; ?>"
                            class="w-100 shadow-1-strong rounded mb-4"
                            alt="Wintry Mountain Landscape"
                            />
                            </a>
                        </div>
                    
                    <?php
                    
                }
            }else{
                    ?>
                        <div class="alert alert-warning w-100 text-center" role="alert">
                          No tamplate available for this product
                        </div>
                    <?php
                }
                
            ?>
        </div>
    </div>
    

</section>
<?php include ('footer.php');?>