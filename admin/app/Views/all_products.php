<style>
    footer {
        margin-top: 50px;
    }

    .table_product_img_th {
        width: 13%;
    }

    .table_product_img {
        width: 78%;
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

    .addprobtn2 {
        float: left;
        color: #f7941d;
        padding: 10;
        border-radius: 5px;
        font-weight: bold;
    }

    .product-name {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        /* Limit to 2 lines */
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .product-short-desc {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        /* Limit to 2 lines */
        overflow: hidden;
        text-overflow: ellipsis;
        max-height: 3em;
        /* Adjust based on line height */
        line-height: 1.5em;
        /* Set line height */
    }

    .dataTables_empty {
        text-align: center;
    }
</style>
</style>
<?= $this->include('templates/header') ?>
<div class="table-responsive text-nowrap m-3 mx-lg-4">
    <div class="card">
        <div class="card-body p-0">
            <span class="addprobtn2">Products</span><a href="<?php echo base_url(); ?>add-products"><span class="addprobtn">Add Products</span></a>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div classs="form-group">
                        <!--<input class="form-control" type="text" id="search_data" placeholder="Seach" />-->
                        <!-- <input type="hidden" id="base_url" class="form-control" value="https://ecom-demo.fableadtech.com/admin//"> -->
                        <input type="hidden" id="base_url" class="form-control" value="<?= base_url() ?>">
                        <input type="text" id="searchProduct" class="form-control" placeholder="Search product..." oninput="filterProducts()">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div classs="form-group">
                        <!--<select class="form-control d-none" id="product_name" onchange="filterProducts()">-->
                        <!-- <select class="form-control" id="product_name" onchange="filterProducts()">
	                        <option value="">Select Product</option>
	                        <?php
                            // foreach($products as $prddata)
                            // {
                            ?>
	                            <option value="<?php //echo $prddata['ProductName']; 
                                                ?>"<?php //if($prddata['ProductName']==$prdname) echo 'selected'; 
                                                                                        ?>><?php //echo $prddata['ProductName'] 
                                                                                                                                                            ?></option>
	                        <?php
                            // }
                            ?>
	                    </select> -->
                    </div>
                </div>
                <!-- <div class="col-sm-4">
	                <button type="button" class="addprobtn" id="search_product">Search</button>
	           </div> -->
            </div>
        </div>
        <div class='card-body filter_data'>
            <div class="row">
                <?php
                $i = 1;
                if (!empty($product_data)) {
                    foreach ($product_data as $single_product) {
                        helper('text');
                        $b = (json_decode($single_product['ProductImage']));

                ?>
                        <div class="col-md-4 col-lg-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body px-3 py-3">
                                    <h5 class="card-subtitle">
                                        <!-- <?php echo $single_product['ProductName']; ?> -->
                                        <h5 class="card-subtitle product-name">
                                            <?php echo htmlspecialchars($single_product['ProductName'], ENT_QUOTES); ?>
                                        </h5>

                                    </h5>
                                </div>
                                <img class="img-fluid w-100" height="150" style="object-fit:contain;" src="<?php echo base_url(); ?>public/assets/img/product_images/<?php echo $b[0]; ?>" alt="Card image cap" />
                                <div class="card-body">

                                    <h6 class="card-subtitle"><strong>Category: </strong>
                                        <?php
                                        $catdata = new App\Models\catagorymodel();
                                        $rescat = $catdata->where('CategoryID', $single_product['CategoryID'])->get()->getRow();
                                        if (!empty($rescat)) {
                                            echo wordwrap($rescat->CategoryName, 20, "<br>\n");
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </h6>
                                    <br />
                                    <h6 class="card-subtitle"><strong>Description: </strong></h6>
                                    <p class="mb-0" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
                                        <?php echo htmlspecialchars($single_product['ProductShortDesc'], ENT_QUOTES); ?>
                                    </p>
                                </div>
                                <div class="card-body pt-3 pb-2 px-3">
                                    <div class="row">
                                        <div class="col col-xs-4">
                                            <div class="col-xs-4">
                                                <?php
                                                if ($single_product['Stock_Status'] == 1) {
                                                ?>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled" checked disabled>
                                                        <label class="form-check-label" for="flexSwitchCheckDisabled"><a class="dropdown-item" href="<?php echo base_url(); ?>product-details/<?php echo $single_product['ProductID'] ?>"><i class="fa fa-eye" aria-hidden="true" style="margin-top: -5px;"></i></a></label>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="form-check form-switch mb-2">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled>
                                                        <label class="form-check-label" for="flexSwitchCheckDisabled"><a class="dropdown-item" href="<?php echo base_url(); ?>product-details/<?php echo $single_product['ProductID'] ?>"><i class="fa fa-eye" aria-hidden="true" style="margin-top: -5px;"></i></a></label>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col col-xs-2">

                                        </div>
                                        <div class="col col-xs-4 text-end">
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                <div class="dropdown-menu" style="">
                                                    <a class="dropdown-item" href="<?php echo base_url(); ?>edit-product-details/<?php echo $single_product['ProductID'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item del_product" href="javascript:void(0);" data-id="<?= $single_product['ProductID'] ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <h5 class="text-center">No Product Found</h5>
                <?php
                }
                ?>
            </div>
            <!--			<table class="table mt-3 mb-3" id="example">
                <thead>
                    <tr>
                       <th>Id</th>
                       <th class="table_product_img_th">Image</th>
                       <th>Name</th>
                       <th>Price</th>
                       <th>Stock</th>
                       <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  <?php
                    //   $i=1;
                    //     foreach($product_data as $single_product)
                    //     {
                    //         $b=(json_decode($single_product['ProductImage']));

                    ?>
                    <tr>
                          <td> <strong> <?php echo $i++; ?></strong></td>
                          <td>
                              <?php //if(!empty($b)){ 
                                ?>
                              <img src="<?php //echo base_url(); 
                                        ?>public/assets/img/product_images/<?php //echo $b[0]; 
                                                                                                    ?>"  class="table_product_img">
                              <?php //}else{echo "NA";}
                                ?>
                            </td>
                           <td>
                            <?php //echo $single_product['ProductName']; 
                            ?>
                          </td>
                          <td><?php //echo $single_product['ProductPrice']; 
                                ?></td>
                         
                          <td><?php //if($single_product['Stock_Status']=='1'){echo "In Stoke";}if($single_product['Stock_Status']=='2'){echo "Out Of Stoke";} 
                                ?></td>
                          <td>
                            <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                              <div class="dropdown-menu" style="">
                              		<a class="dropdown-item" href="<?php //echo base_url(); 
                                                                        ?>product-details/<?php //echo $single_product['ProductID'] 
                                                                                                                ?>"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
                                <a class="dropdown-item" href="<?php //echo base_url(); 
                                                                ?>edit-product-details/<?php //echo $single_product['ProductID'] 
                                                                                                                ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item del_product" href="javascript:void(0);" data-id="<? //= $single_product['ProductID'] 
                                                                                                            ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                              </div>
                            </div>
                          </td>
                    </tr>
                    <?php
                    // } 
                    ?>
       
      </tbody>
            </table>-->
            <div class="d-flex justify-content-center text-center">
                <nav aria-label="Page navigation">
                    <ul class="pagination" id="pagination">
                        <?php if ($pager) : ?>
                            <?= $pager->links() ?>
                        <?php endif ?>
                    </ul>
                </nav>
            </div>
        </div>


    </div>

    <script>
        function filterProducts(page = 1) {
            const searchData = $('#searchProduct').val();
            const productName = $('#product_name').val();
            const base_url = $('#base_url').val();

            console.log("Search data: " + searchData);
            console.log("Page: " + page);

            // Send AJAX request to fetch products based on the page
            $.ajax({
                url: `${base_url}all_products?page=${page}`, // Ensure page param is added here
                type: 'GET',
                data: {
                    search_data: searchData,
                    product_name: productName
                },
                dataType: 'json',
                success: function(data) {
                    updateProductList(data.products);
                    updatePagination(data.pager);
                },
                error: function(xhr, status, error) {
                    console.error('Request failed:', error);
                }
            });
        }

        function updatePagination(pagerLinksHtml) {
            const $paginationContainer = $('#pagination');
            $paginationContainer.html(pagerLinksHtml); // Update pagination links HTML

            // Bind click event to each pagination link after updating HTML
            $paginationContainer.find('a').on('click', function(e) {
                e.preventDefault();
                const page = $(this).attr('href').split('page=')[1]; // Extract page number from URL

                if (page) {
                    filterProducts(page); // Call filterProducts with selected page
                }
            });
        }

        function updateProductList(products) {
            const $productListContainer = $('.filter_data .row');
            $productListContainer.empty();

            const base_url = $('#base_url').val();

            if (products && products.length > 0) {
                products.forEach((product) => {
                    const productImages = JSON.parse(product.ProductImage || '[]');
                    const imageUrl = productImages.length ? productImages[0] : 'default-image.jpg';
                    const imagePath = `${base_url}public/assets/img/product_images/${imageUrl}`;

                    const productHtml = `
            <div class="col-md-4 col-lg-4 mb-3">
            <div class="card h-100">
            <a href="${base_url}edit-product-details/${product.ProductID}">
            <div class="card-body px-3 py-3">
                            <h5 class="card-subtitle product-name">${product.ProductName}</h5>
                        </div>
                        <img class="img-fluid w-100" height="150" style="object-fit:contain;" src="${imagePath}" alt="${product.ProductName}" />
                        <div class="card-body">
                        <h6 class="card-subtitle"><strong>Category: </strong>${product.CategoryName}</h6>
                        <p class="product-short-desc" style="color:var(--bs-body-color)"><strong>Description: </strong>${product.ProductShortDesc}</p>
                        </div>
                        </a>
                        <div class="card-body pt-3 pb-2 px-3">
                            <div class="row">
                             <div class="col col-xs-4">
                                    <div class="col-xs-4">
                                        ${product.Stock_Status === "1" ? `
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled" checked disabled>
                                                <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">
                                                    <a class="dropdown-item" href="${base_url}product-details/${product.ProductID}">
                                                        <i class="fa fa-eye" aria-hidden="true" style="margin-top: -5px;"></i>
                                                    </a>
                                                </label>
                                            </div>
                                        ` : `
                                            <div class="form-check form-switch mb-2">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled>
                                                <label class="form-check-label" for="flexSwitchCheckDisabled">
                                                    <a class="dropdown-item" href="${base_url}product-details/${product.ProductID}">
                                                        <i class="fa fa-eye" aria-hidden="true" style="margin-top: -5px;"></i>
                                                    </a>
                                                </label>
                                            </div>
                                        `}
                                    </div>
                                </div>
                                <div class="col col-xs-2"></div>
                                <div class="col col-xs-4 text-end">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="${base_url}edit-product-details/${product.ProductID}">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <a class="dropdown-item del_product" href="javascript:void(0);" data-id="${product.ProductID}">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    
            `;
                    $productListContainer.append(productHtml);
                });
            } else {
                $productListContainer.append('<h5 class="text-center">No Products Found</h5>');
            }
        }

        // Initialize the search on page load
        $(document).ready(function() {
            filterProducts(1);

            $('#search_product').on('click', function() {
                filterProducts(1);
            });
        });
    </script>
    <style>
        .pagination {
            display: flex;
            padding-left: 0;
            list-style: none;
            float: right;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination li a {
            position: relative;
            display: block;
            color: #697a8d;
            background-color: #f0f2f4;
            border: 0px solid #d9dee3;
            padding: 8px 12px;
            border-radius: 4px;
            text-decoration: none;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .pagination li a:hover {
            background-color: #e2e6ea;
            /* Slightly darker for hover effect */
            color: #495057;
            /* Adjust the hover color */
        }

        .pagination .active a {
            background-color: #c8d1dc;
            /* Different background for active page */
            color: #495057;
            /* Text color for active page */
            font-weight: bold;
            cursor: default;
        }
    </style>
    <?= $this->include('templates/footer') ?>