<?= $this->include('header') ?>
<style>
    a.active {
        border-bottom: 2px solid #f7941d;
    }

    .nav-link {
        color: rgb(110, 110, 110);
        font-weight: 500;
    }

    .nav-link:hover {
        color: #f7941d;
    }

    .nav-pills .nav-link.active {
        color: black;
        background-color: white;
        border-radius: 0.5rem 0.5rem 0 0;
        font-weight: 600;
        background: white !important;
    }

    .tab-content {
        padding-bottom: 1.3rem;
    }

    .form-control {
        background-color: rgb(241, 243, 247);
        border: none;
    }

    /* 3nd card */
    /*.all-category:hover,.main-category:hover{*/
    /*    opacity:0 !important;*/
    /*}*/
    .card {
        border-radius: 10px;
    }

    .nav-pills .nav-link {
        border-radius: 0;
        padding: 10px 15px;
        transition: background-color 0.3s ease;
    }

    .nav-pills .nav-link.active {
        background-color: #f8f9fa;
        border-bottom: 2px solid #f7941d;
    }

    .review {
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-control:focus {
        box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 7px rgba(0, 0, 0, 0.2);
    }

    select {
        -webkit-appearance: none;
        -moz-appearance: none;
        text-indent: 1px;
        text-overflow: "";
    }

    /* 1st card */

    ul {
        list-style: none;
        /*margin-top: 1rem;*/
        padding-inline-start: 0;
    }

    .search {
        padding: 0 1rem 0 1rem;
    }

    .ccontent li .wrapp {
        padding: 0.3rem 1rem 0.001rem 1rem;
    }

    .ccontent li .wrapp div {
        font-weight: 600;
    }

    .ccontent li .wrapp p {
        font-weight: 360;
    }

    .ccontent li:hover {
        background-color: rgb(117, 93, 255);
        color: white;
    }

    /* 2nd card */

    .addinfo {
        padding: 0 1rem;
    }

    .form-items {
        border: 3px solid #ba9b9b;
        padding: 15px;
        display: inline-block;
        /* width: 40%; */
        min-width: 100%;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
        text-align: left;
        -webkit-transition: all 0.4s ease;
        transition: all 0.4s ease;
    }

    .all-category:hover ul.main-category {
        opacity: 1;
    }

    ul.main-category {
        opacity: 0;
    }

    /*forzoom*/
    .product-img--main {
        position: relative;
        overflow: hidden;

        /*width: 600px;*/
        width: calc(100% + 15px);
        /*height: 600px;*/
        height: 430px;
        float: left;
        margin: 10px;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        margin-top: 0px;
    }

    .product-img--main__image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-position: center;
        /*background-size: cover;*/
        background-repeat: no-repeat;
        -webkit-transition: -webkit-transform .5s ease-out;
        transition: -webkit-transform .5s ease-out;
        transition: transform .5s ease-out;
        transition: transform .5s ease-out, -webkit-transform .5s ease-out;
    }

    /*for end zoom*/
    .active_img {
        border: 1px solid #f7941d !important;
    }

    .modal-content {
        border-radius: 8px !important;
    }
    
    .select-container {
    position: relative !important;
    display: inline-block !important;
    width: 100% !important;
}

.custom-select {
    appearance: none !important; /* Removes default browser styles */
    -webkit-appearance: none !important;
    -moz-appearance: none !important;
    width: 100% !important;
    padding-right: 30px !important; /* Space for the dropdown icon */
}


.custom-select:focus {
    outline: none !important;
    border-color: #f7941d !important;
}

.select-container::after {
    /*content: '▼' !important; */
    font-size: 12px !important;
    color: #333 !important;
    position: absolute !important;
    right: 10px !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    pointer-events: none !important;
}

    
    
</style>
<?php
$AllsettingsModel = new \App\Models\Allsettingsmodel();
$all_setting_data = $AllsettingsModel->first();
?>
<div class="single_product">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-12">
                <div class="text-inner">
                    <div class="row">
                        <div class="col-lg-4 order-lg-2 order-1">
                            <nav>
                                <ol class="breadcrumb mb-2">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                                    <li class="breadcrumb-item active">
                                        <?php

                                        if (!empty($all_product_data['CategoryID'])) {

                                            ?>
                                            <?php echo ($prod) ? ($prod->CategoryName) : (''); ?>
                                            <?php
                                        }
                                        ?>

                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <div class="row">
                        <?php
                        $image_path = base_url() . 'admin/public/assets/img/product_images/1686203341_1d5ea750350c2370cd69.jpg';
                        if (isset($_REQUEST['uid']) && $_REQUEST['uid'] != "") {
                            $uid = $_REQUEST['uid'];
                            $imageData = session()->get($uid);
                            $image_path = $imageData['image_path'];
                            ?>
                            <div class="col-lg-12">
                                <div class="alert alert-danger text-center"><i
                                        class="fa fa-exclamation-triangle 2x"></i>Your design will not be saved until this
                                    page has been completed!</div>
                            </div>
                            <?php
                        } else {
                            $prdimage = json_decode($all_product_data['ProductImage']);
                        }
                        ?>

                        <!---->
                        <div class="col-lg-6 order-lg-2 order-1">

                            <!--<div class="image_selected"><img src="<?php //echo base_url('admin/public/assets/img/product_images/' . $prdimage[0]); ?>" id="large-image" alt=""></div>-->
                            <div class="image_selected product-img--main" data-scale="2"
                                data-image="<?php echo base_url('admin/public/assets/img/product_images/' . $prdimage[0]); ?>">
                            </div>
                            <div class="">
                                <?php
                                if ($prdimage != "") {
                                    foreach ($prdimage as $key => $single_img) {
                                        ?>
                                        <img src="<?php echo base_url('admin/public/assets/img/product_images/' . $single_img); ?>"
                                            class="preview-image <?= $key == 0 ? "active_img" : "" ?>" alt="Product Image"
                                            style="border-radius: 5px; padding: 8px; object-fit: contain; object-position: center;border:1px solid #e8e8e8;height:80px;width:80px;">
                                        <?php
                                    }
                                }
                                ?>
                            </div>

                        </div>
                        <!---->
                        <div class="col-lg-6 order-3">
                            <div class="product_description">
                                <div class="product_name">
                                    <h3 class="text-capitalize"><?php echo $all_product_data['ProductName']; ?></h3>
                                </div>
                                <?php
                                if ($all_product_data['ProductType'] != 2) {
                                    $productPrice = $all_product_data['ProductPrice'];
                                    $salePrice = $all_product_data['Sale_ProductPrice'];
                                    ?>
                                    <span
                                        class="product_price"><?php echo $all_setting_data['currency']; ?><?php echo $salePrice; ?></span>
                                    <span
                                        style="text-decoration: line-through; color: #7e7e7e; font-weight: 400; font-size: 22px;">
                                        <?php echo $all_setting_data['currency']; ?><?php echo $productPrice; ?>
                                    </span>
                                    <?php
                                } else {
                                    //  $pricearr=[];
                                    $variations = new App\Models\Variationmodel();
                                    $varia_dt = $variations->where('ProductID', $all_product_data['ProductID'])->first();
                                    $pricearr = $varia_dt['Sale_VariationPrice'];
                                    if ($pricearr == null || $pricearr == 0 || $pricearr == "" ) {
                                        $pricearr = $varia_dt['Sale_VariationPrice'];
                                    }

                                    ?>

                                <span class="product_price" data-value="<?php echo $pricearr; ?>"><?php echo $all_setting_data['currency']; ?><?php echo $pricearr; ?></span><?php
                                }
                                ?>

                            </div>
                            <div>
                                <div class="row">
                                    <div class="col-xs-6" style="margin-left: 15px;">
                                        <p class="my-3"><?php echo $all_product_data['ProductShortDesc']; ?></p>
                                    </div>

                                   
                                </div>
                            </div>
                            <hr class="m-0 mb-4 mt-2 singleline">
                            <?php
                            // print_r($all_product_data);
                            if ($all_product_data['ProductType'] == 2) {
                                ?>
                                <input type="hidden" name="product_id" id="product_id"
                                    value="<?php echo $all_product_data['ProductID']; ?>">
                                <input type="hidden" name="variation_id" id="variation_id"
                                    value="<?php echo $all_product_data['VariationID']; ?>">
                                <div class="row">
                                    <?php
                                    foreach ($varrtype as $vares) {
                                        if (isset($variationsval[$vares['VariationTypeID']]) && !empty($variationsval[$vares['VariationTypeID']])) {
                                            ?>
                                            <div class="col-xs-4" style="margin-left: 13px;">
                                                <div class="">
                                                    <div class="form-group">
                                                        <b><?php echo ucfirst($vares['VariationTypeName']); ?> :</b>
                                                        <div class="select-container">
                                                            <select
                                                                class="custom-select <?php echo ucfirst($vares['VariationTypeName']); ?>">
                                                                <option value="">Select
                                                                    <?php echo ucfirst($vares['VariationTypeName']); ?>
                                                                </option>
                                                                <?php
                                                                foreach ($variationsval[$vares['VariationTypeID']] as $varval) {
                                                                    ?>
                                                                    <option value="<?php echo $varval['VariationID']; ?>">
                                                                        <?php echo $varval['VariationName']; ?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="row">
                                <div class="col-xs-4" style="margin-left: 13px;">
                                    <div class="product_quantity"> <span class="text-dark">QTY: </span> <input
                                            id="quantity_input" type="number" pattern="[0-9]*" value="1" min="1">

                                    </div>
                                </div>
                                <div class="col-xs-4" style="display: flex;">
                                    <!-- <button type="button" class="btn shop-button">Add to Cart</button>  -->

                                    <form class="addtocartform" action="/addToCart" method="POST">
                                        <input type="hidden" name="productId"
                                            value="<?php echo $all_product_data['ProductID']; ?>">
                                        <input type="hidden" name="quantity" id="quantity" value="1" min="1">
                                        <input type="hidden" name="price" id="price" value="" />
                                        <input type="hidden" name="variationId" value="0">
                                        <button class="btn cart_btn add_cart link-text mx-1 rounded" type="submit"
                                            style="padding: 9px 12px !important;height:45px;box-shadow: 0px 3px 5px 1px rgb(0 0 0 / 31%);">
                                            <!--<a href="<?php //echo base_url('cart'); ?>" class="">-->
                                            Add to Cart </a></button>
                                    </form>

                                </div>
                                <div class="col-xs-4">
                                    <div class="product_fav">
                                        <?php
                                        $session = session();
                                        $user_id = $session->get('user_id');
                                        if (empty($user_id)) {
                                            ?>
                                            <a href="#" data-toggle="modal" data-target="#exampleModal"><i
                                                    class="fa fa-heart"></i></a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="<?php echo base_url('wishlist'); ?>"><i class="fa fa-heart"></i></a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mt-3">
                                <div class="col-12">
                                    <div class="card shadow-lg border-0">
                                        <!-- Dropdown button -->
                                        <a class="btn btn-primary text-white rounded d-flex align-items-center justify-content-between"
                                            data-toggle="collapse" href="#productDetails" role="button"
                                            aria-expanded="false" aria-controls="productDetails">
                                            <span>View Product Details</span>
                                            <i class="ml-2 fa fa-chevron-down"></i> <!-- FontAwesome icon -->
                                        </a>

                                        <!-- Collapsible content -->
                                        <div class="collapse mt-3" id="productDetails">
                                            <!-- nav options -->
                                            <ul class="nav nav-pills mb-3 px-3 pt-3 bg-light" id="pills-tab"
                                                role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active text-dark fw-bold" id="pills-home-tab"
                                                        data-toggle="pill" href="#pills-home" role="tab"
                                                        aria-controls="pills-home" aria-selected="true">Details</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-dark fw-bold" id="pills-contact-tab"
                                                        data-toggle="pill" href="#pills-contact" role="tab"
                                                        aria-controls="pills-contact" aria-selected="false">Reviews</a>
                                                </li>
                                            </ul>

                                            <!-- content -->
                                            <div class="tab-content p-4" id="pills-tabContent">
                                                <!-- 1st tab -->
                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                                    aria-labelledby="pills-home-tab">
                                                    <table class="table table-striped table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <!--<?php // print_r($all_product_data); ?>-->
                                                                <th scope="row">Product Type</th>
                                                                <td><?php echo !empty($all_product_data['ProductType']) ? ($all_product_data['ProductType'] == 1 ? 'Simple' : 'Variation') : 'N/A'; ?>
                                                                </td>
                                                            </tr>
                                                            <!--<?php // foreach ($varrtype as $vares): ?>-->
                                                                <!--<tr>-->
                                                                <!--    <th scope="row">-->
                                                                        
                                                                <!--        <?php// echo ucfirst($vares['VariationTypeName']); ?>-->
                                                                <!--    </th>-->
                                                                <!--    <td><?php //echo !empty($getvariation) ? implode(', ', array_column($getvariation, 'VariationName')) : 'N/A'; ?>-->
                                                                <!--    </td>-->
                                                                <!--</tr>-->
                                                            <?php// endforeach; ?>
                                                            <tr>
                                                                <th scope="row">Stock</th>
                                                                <td><?php echo $all_product_data['ProductStock']; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Dimension</th>
                                                                <td><?php echo !empty($all_product_data['product_dimensions']) ? $all_product_data['product_dimensions'] : 'N/A'; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Weight</th>
                                                                <td><?php echo !empty($all_product_data['product_weight']) ? $all_product_data['product_weight'] . "gm" : 'N/A'; ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Status</th>
                                                                <td><?php echo $all_product_data['Stock_Status'] == '1' ? 'In-stock' : 'Out-stock'; ?>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- 2nd tab -->
                                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                                    aria-labelledby="pills-contact-tab">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <?php if (!empty($all_review_data)): ?>
                                                                <?php foreach ($all_review_data as $review_data): ?>
                                                                    <div class="review mb-3">
                                                                        <p style="color: white;">
                                                                            <?= $review_data['description']; ?>
                                                                        </p>
                                                                    </div>
                                                                <?php endforeach; ?>
                                                            <?php else: ?>
                                                                <p class="text-muted">There are no reviews yet.</p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- End of collapse -->
                                    </div>
                                </div>
                            </div>
                            <!--==================-->
                        </div>
                    </div>
                    <div class="modal" id="exampleModal">
                        <div class="modal-dialog">
                            <div class="m-auto modal-content w-50">
                                <!-- Modal Header -->
                                <div class="card-header p-3">
                                    <h4 class="modal-title">Login</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        style="margin-top: -30px;">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="h-100 m-auto modal-body my-lg-3 my-md-3 w-75">

                                    <div class="">
                                        <div class="form-group">
                                            <label>Email Address<span>*</span></label>
                                            <input type="text" id="emailids" name="emailids" placeholder=""
                                                class="form-control">
                                        </div>
                                        <div class="emailid_error"></div>
                                    </div>
                                    <div class="">
                                        <div class="form-group">
                                            <label>Password<span>*</span></label>
                                            <input type="password" name="password" id="passwords" placeholder=""
                                                class="form-control">
                                        </div>
                                        <div class="pass_error"></div>
                                    </div>
                                    <div class="msg_data"></div>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" id="logindata"
                                        class="btn btn-info cart_btn rounded">Submit</button>
                                    <button type="button" class="btn bg-secondary rounded"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?= $this->include('footer') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    var varrtype = '<?php print_r(json_encode(array_column($varrtype, 'VariationTypeName'))) ?>';
    var varrtype_json = JSON.parse(varrtype);
    var formattedArray = varrtype_json.map(function (item) {
        return item.charAt(0).toUpperCase() + item.slice(1);
    });
    var formattedString = '.' + formattedArray.join(', .');
    var currency = '<?php echo $all_setting_data["currency"]; ?>';


    $(document).on('change', formattedString, function () {
        var product_id = $("#product_id").val();
        var tmp_arr = [];
        var color = $(".color").val();
        $.each(formattedArray, function (index, value) {
            var selectedValue = $('.' + value).val();
            console.log("Selected value for " + value + ": " + selectedValue);
            tmp_arr.push(selectedValue === "" ? "" : selectedValue);
        });


        var data = {
            varrtype: varrtype_json,
            product_id: product_id,
            varrval: tmp_arr
        };
        var checkVal = $(this).val();
        if (checkVal != '') {
            $.ajax({
                type: 'POST',
                url: base_url + 'show_variation1',
                data: data,
                success: function (response) {
                    var jsonObject = JSON.parse(response);

                    if (jsonObject.status === 'success') {
                        $("#price").val(jsonObject.price);
                        $("span.product_price").text(currency + jsonObject.price);
                        $("input[name='variationId']").val(jsonObject.VariationID);

                        // Update available options and reset values if needed
                        $.each(formattedArray, function (index, value) {
                            console.log(value);
                            var valuesToKeep = jsonObject.availble[value];

                            if (index !== 0) {
                                $('.' + value + ' option').each(function () {
                                    if (valuesToKeep.indexOf($(this).val()) === -1) {
                                        $(this).prop('disabled', true);
                                    } else {
                                        $(this).prop('disabled', false);
                                    }
                                });
                            }

                            // Reset dropdown value if no value is selected
                            var selectedValue = jsonObject.selected_data[index] || "";
                            $('.' + value).val(selectedValue);
                        });

                    } else {
                        console.error("Failed to update variation data.");
                    }
                },
                error: function () {
                    console.error("AJAX request failed.");
                }
            });
        } else {
            var pprice = $("span.product_price").data('value');
            $("span.product_price").text(currency + pprice);
            $("#price").val("");
            $.each(formattedArray, function (index, value) {
                $('.' + value).val('');
            });
        }
    });

    $(document).ready(function () {
        $('select[name="variations[]"]').on('change', function () {
            var form = document.getElementById('productForm');
            var formData = new FormData(form);

            $.ajax({
                url: "/getvariationsprice",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('.product_price').html(response);

                    //alert(response);
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log("Error: " + errorThrown);
                }
            });
        });
        $("#quantity_input").on('change', function () {
            var qty = $(this).val();
            $("#quantity").val(qty);
        });
        $(document).on('click', '#logindata', function () {
            var emailids = $("#emailids").val();
            var passwords = $("#passwords").val();

            var flag = 1;
            $(".error").remove();
            if (emailids == '') {
                $(".emailids").after('<span class="error text-danger">Please enter email id</span>');
                flag = 0;
            }
            if (passwords == '') {
                $(".emailids").after('<span class="error text-danger">Please enter password</span>');
                flag = 0;
            }
            if (flag == 0) {
                return false;
            }
            $.ajax({
                type: 'post',
                url: '/checkout_login',
                data: { emailids: emailids, passwords: passwords },
                success: function (data) {
                    if (data == '2') {

                        $(".msg_data").html('<span class="error text-success">Login successfully</span>');
                        setTimeout(function () {
                            window.location.reload();
                        }, 2000);
                    }
                    else {
                        $(".msg_data").html('<span class="error text-danger">Invalid login</span>');
                    }
                }
            });
        });

        $(document).on('click', '.preview-image', function () {

            const imagePath = $(this).attr('src');
            $('.preview-image').removeClass("active_img");
            $(this).addClass("active_img");
            $('.image_selected').attr('data-image', imagePath);
            $('.product-img--main__image').css({
                'background-image': 'url(' + $('.image_selected').attr('data-image') + ')'
            });
        });
        $(document).on('mouseover', '.main-category', function () {
            // console.log ("jjj");
            $(this).css('opacity', '0');
            $(this).css('z-index', '0');
        });
        // $('.main-category').css('opacity', '0');
        //  $(document).on('click','.all-category',function(){
        //     // console.log ("jjj");
        //     if ($('.main-category').css('opacity') === '1') {
        //             $('.main-category').css('opacity', '0 !important');
        //         } else {
        //             $('.main-category').css('opacity', '1 !important');
        //         }
        // });
        // $(document).on('mouseout','.all-category',function(){
        //     // console.log ("jjj");
        //     $('.main-category').css('opacity', '0 !important');
        // });
        // img zoom code
        $('.product-img--main')
            // tile mouse actions
            .on('mouseover', function () {
                $(this).children('.product-img--main__image').css({
                    'transform': 'scale(' + $(this).attr('data-scale') + ')'
                });
            })
            .on('mouseout', function () {
                $(this).children('.product-img--main__image').css({
                    'transform': 'scale(1)'
                });
            })
            .on('mousemove', function (e) {
                $(this).children('.product-img--main__image').css({
                    'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 + '%'
                });
            })
            // tiles set up
            .each(function () {
                $(this)
                    // add a image container
                    .append('<div class="product-img--main__image"></div>')
                    // set up a background image for each tile based on data-image attribute
                    .children('.product-img--main__image').css({
                        'background-image': 'url(' + $(this).attr('data-image') + ')'
                    });
            });
        // end zoom code
    });
</script>