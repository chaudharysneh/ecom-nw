<style>
    .textarea {
        width: 100%;
        font-size: 0.9375rem;
        font-weight: 400;
        height: 100px;
        line-height: 1.53;
        color: #697a8d;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #d9dee3;
        border-radius: 0.375rem;
    }

    .addprobtn2 {
        float: left;
        color: #696cff;
        padding: 10;
        border-radius: 5px;
        font-weight: bold;
    }

    .addprobtn {
        float: right;
        background: #f7941d;
        color: white;
        padding: 3px 9px !important;
        border-radius: 5px;
        border-color: #fff;
        border: none;
        margin-top: 7px;
        margin-right: 10px;
    }

    .form-control:disabled,
    .form-control[readonly] {
        background-color: #fff !important;
        opacity: 1;
    }

    .product-image-container {
        position: relative;
        width: 300px;
        padding-top: 250px;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        margin: 2px auto;
        /*max-width: 160px;*/
        left: 20px;
        top: 10px
    }


    .product-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: contain;
        border-radius: 10px;
        transition: transform 0.3s ease;
    }

    .product-image:hover {
        transform: scale(1.05);
        /* Slight zoom on hover */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        /* Enhanced shadow on hover */
    }

    .addprobtn:hover {
        color: white;
    }
</style>

<?= $this->include('templates/header') ?>
<!-- Content wrapper -->
<div class="text-nowrap m-3 mx-lg-4">
    <div class="card">
        <div class="card-body p-0">
            <span class="addprobtn2">Product Detail</span><a href="<?php echo base_url(); ?>all-products"><span class="addprobtn">Back</span></a>
        </div>
    </div>
    <form>
        <div class="content-wrapper">
            <!-- Content -->

            <div class="flex-grow-1 container-p-y">
                <!--<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add</span> Tags</h4>-->
                <div class="row">
                    <div class="col-md-12 tag-mar">
                        <div class="card mb-4">
                            <!--<h5 class="card-header">Default</h5>-->
                            <div class="card-body">
                                <div class="row border-bottom">
                                    <div class="col-lg-4">
                                        <div class="my-3">
                                            <b><span>Product Name :</span></b>
                                            <span class="text-wrap"><?php echo $product_data['ProductName']; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="my-3">
                                            <b><span>Category : </span></b>
                                            <span><?php echo $categoryname ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="my-3">
                                            <b><span>Sub Category : </span></b>
                                            <span><?php echo $subcategory_name ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="row">
                                            <?php
                                            $b = (json_decode($product_data['ProductImage']));
                                            // print_r($b); die;
                                            foreach ($b as $key => $single_img) {
                                            ?>
                                                <div class="col-6">

                                                    <div class="product-image-container">
                                                        <img src="<?php echo base_url(); ?>public/assets/img/product_images/<?php echo $single_img; ?>" class="product-image">
                                                    </div>

                                                    <?php //if($key==1){
                                                    ?>
                                                    <!--<br>-->
                                                    <?php //}
                                                    ?>

                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row border-bottom">
                                            <div class="col-lg-6">
                                                <div class="my-3">
                                                    <b><span>ProductSKU : </span></b>

                                                    <span><?php if (!empty($product_data['ProductSKU'])) {
                                                                echo $product_data['ProductSKU'];
                                                            } else {
                                                                echo "N/A";
                                                            } ?></span>

                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="my-3">
                                                    <b><span>Price : </span></b>

                                                    <span><?php if (!empty($product_data['ProductPrice'])) {
                                                                echo $product_data['ProductPrice'];
                                                            } else {
                                                                echo "N/A";
                                                            } ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row border-bottom">
                                            <div class="col-lg-6">
                                                <div class="my-3">
                                                    <b><span>Brand : </span></b>
                                                    <span><?php echo $brand_name ?></span>
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="my-3">
                                                    <b><span>Tag :</span></b>
                                                    <?php
                                                    if (!empty($tagnameee)) {
                                                        foreach ($tagnameee as $val) { ?>

                                                            <span><?php echo $val['tagname'] . ','; ?></span>

                                                        <?php
                                                        }
                                                    } else {
                                                        ?><span><?php echo "N/A"; ?></span><?php
                                                            }
                                                                ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row border-bottom">
                                            <div class="col-lg-6">
                                                <div class="my-3">
                                                    <b><span>Stock : </span></b>

                                                    <span><?php if (!empty($product_data['ProductStock'])) {
                                                                echo $product_data['ProductStock'];
                                                            } else {
                                                                echo "N/A";
                                                            } ?></span>
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="my-3">
                                                    <b><span>Weight : </span></b>
                                                    <span><?php
                                                            if (!empty($product_data['product_weight']) && $product_data['product_weight'] !== 'N/A') {
                                                                echo $product_data['product_weight'] . ' Kg';
                                                            } else {
                                                                echo "N/A";
                                                            }
                                                            ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row border-bottom">
                                            <div class="col-lg-12">
                                                <div class="my-3 text-wrap">
                                                    <b><span>Short Description : </span></b>
                                                    <span><?php if (!empty($product_data['ProductShortDesc'])) {
                                                                echo $product_data['ProductShortDesc'];
                                                            } else {
                                                                echo "N/A";
                                                            } ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row border-bottom">
                                            <div class="col-lg-12">
                                                <div class="my-3 text-wrap">
                                                    <b><span>Long Description : </span></b>
                                                    <span><?php if (!empty($product_data['ProductLongDesc'])) {
                                                                echo $product_data['ProductLongDesc'];
                                                            } else {
                                                                echo "N/A";
                                                            } ?></span>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                </div>
                                <?php if ($product_data['ProductType'] == 2 && !empty($variation_detail)) { ?>
                                    <div class="row border-bottom">
                                        <h3>Variation</h3>
                                    </div>
                                    <?php foreach ($variation_detail as $single_detail) { ?>
                                        <div class="row border-bottom">
                                            <div class="col-lg-4">
                                                <div class="my-3">
                                                    <b><span><?php // echo ucwords($single_detail['variationtype_name']) . ':'; 
                                                                ?></span></b>
                                                    <span><?php echo $single_detail['variation_name']; ?></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="my-3">
                                                    <b><span>Quantity : </span></b>
                                                    <span><?php echo $single_detail['variation_stock']; ?></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="my-3">
                                                    <b><span>Price : </span></b>
                                                    <span><?php echo $single_detail['variation_price']; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>



                                <div class="card-body mt-2">
                                    <a href="<?php echo base_url(); ?>edit-product-details/<?= $product_data['ProductID'] ?>"

                                        <span class="addprobtn mb-3">Edit Product</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<!-- / Content -->

<?= $this->include('templates/footer') ?>