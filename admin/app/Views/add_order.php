<?= $this->include('templates/header') ?>
<!-- Include Select2 and Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<style>
    .select2-container--default .select2-selection--single {
        display: block !important;
        width: 100% !important;
        height: calc(1.5em + .75rem + 2px) !important;
        padding: 0.375rem .75rem !important;
        font-size: 1rem !important;
        font-weight: 400 !important;
        color: #495057 !important;
        background-color: #fff !important;
        background-clip: padding-box !important;
        border: 1px solid #ced4da !important;
        border-radius: .25rem !important;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 6px !important;
        right: 3px !important;
    }


    .btn {
        color: #fff;
        background: #f7941d;
    }

    .btn:hover {
        color: #ffffff;
        background: #f7941d;
    }

    .col-5 {
        -ms-flex: 0 0 41.666667%;
        flex: 0 0 41.666667%;
        max-width: 100% !important;
    }

    .form-control:disabled,
    .form-control[readonly] {
        background-color: white !important;
        opacity: 1;
    }

    .spinner-border {
        width: 30px;
        height: 30px;
    }

    .addprobtn2 {
        float: left;
        color: #f7941d;
        padding: 10;
        border-radius: 5px;
        font-weight: bold;
    }

    .addprobtn {
        float: right;
        background: #f7941d;
        color: white;
        padding: 5px 14px !important;
        border-radius: 5px;
        border-color: #fff;
        border: none;
        margin-top: 4px;
        margin-right: 10px;
    }

    div#navbar-collapse{
        display: none !important;
    }
</style>
<div class="container-fluid px-3 px-lg-4 mt-5">
    <div class="card">
        <div class="card-body p-1">
            <span class="addprobtn2">Add Order</span><a href="<?php echo base_url(); ?>all-orders"><span class="addprobtn">All Orders</span></a>
        </div>
    </div>

    <form id="orderForm" enctype="multipart/form-data">
        <div class="content-wrapper">
            <input type="hidden" id="base_url" value="<?= base_url('all_banners'); ?>">



            <div class="row mt-3">
                <div class="col-md-12 tag-mar">
                    <div class="card mb-4">
                        <div class="card-body pb-0">
                            <div class="col-md-3 mt-3 p-0">
                                <div class="form-group">
                                    <label for="customerSelect">Select Customer Type</label>
                                    <select class="form-control" id="customerSelect" name="customerSelect">
                                        <option value="">Select Customer Type</option>
                                        <option value="1">Customer</option>
                                        <option value="2">NoN-Customer</option>
                                    </select>
                                    <span class="customer_err  text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-12 p-0 userfristname">
                                <div class="form-group">
                                    <label for="UserFirstName">Select Customer</label>
                                    <select class="form-control select2" id="UserFirstName" name="UserFirstName" style=" width: 100%;">
                                        <option value="">Select Customer</option>
                                        <?php if (isset($users)) {
                                            foreach ($users as $user) { ?>
                                                <option value="<?= $user['UserID']; ?>"><?= $user['UserFirstName']; ?></option>

                                        <?php }
                                        } ?>
                                    </select>
                                    <span class="user_err  text-danger"></span>
                                </div>
                            </div>

                            <div class="col-12" id="product-rows-container">
                                <!-- Product Row Template -->
                                <div class="row product-row" id="product-row-1">
                                    <div class="col-md-3 px-1">
                                        <div class="form-group">
                                            <label for="product-1">Select Product</label>
                                            <select class="form-control select2 product-select main-product" id="product-1" name="product[]">
                                                <option value="">Select Product</option>
                                                <?php if (isset($products)) {
                                                    foreach ($products as $product) { ?>
                                                        <option value="<?= $product['ProductID']; ?>" data-price="<?= $product['ProductPrice']; ?>">
                                                            <?= $product['ProductName']; ?>
                                                        </option>
                                                <?php }
                                                } ?>
                                            </select>
                                            <span class="pro_err  text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 px-1">
                                        <div class="form-group">
                                            <label for="Quantity-1">Quantity</label>
                                            <input type="number" class="form-control quantity quantitys" id="Quantity-1" name="Quantity[]" placeholder="Quantity" min="1" value="">
                                            <span class="qua_err text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 px-1">
                                        <div class="form-group">
                                            <label for="Price-1">Price</label>
                                            <input type="number" class="form-control price" id="Price-1" name="Price[]" placeholder="Price" min="1" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3 px-1">
                                        <label for="totalprice-1">Total Price</label>
                                        <div class="form-group d-flex flex-row align-items-center gap-2">
                                            <input type="number" class="form-control total-price" id="totalprice-1" name="totalprice[]" placeholder="Total Price" min="1" readonly>
                                            <button type="button" id="add-product-row" class="btn ">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row d-flex justify-content-end">
                                    <div class="col-3 px-1">
                                        <div class="form-group">
                                            <label for="grandTotal-1">Grand Total</label>
                                            <input type="number" class="form-control float-right" id="grandTotal-1" name="grandTotal" placeholder="Grand Total" min="0" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row userdetail " style="display: none;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="UserFirstNameInput">Customer Full Name</label>
                                        <input type="text" class="form-control" id="UserFirstNameInput" name="UserFirstNameInput" placeholder="Enter Name">
                                    </div>
                                </div>
                            </div>

                            <!-- Row for city and state -->
                            <div class="row userdetail" style="display: none;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="UserCity">Customer City</label>
                                        <input type="text" class="form-control" id="UserCity" name="UserCity" placeholder="Enter User City">
                                        <div class="text-danger" id="city_err"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="UserState">Customer State</label>
                                        <input type="text" class="form-control" id="UserState" name="UserState" placeholder="Enter User State">
                                        <div class="text-danger" id="state_err"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Row for zip and phone -->
                            <div class="row userdetail " style="display: none;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="UserZip">Customer Zip</label>
                                        <input type="text" class="form-control" id="UserZip" name="UserZip" placeholder="Enter User Zip">
                                        <div class="text-danger" id="zip_err"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="UserPhone">Customer Phone</label>
                                        <input type="text" class="form-control" id="UserPhone" name="UserPhone" placeholder="Enter User Phone">
                                    </div>
                                </div>
                            </div>

                            <div class="row userdetail " style="display: none;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="UserAddress">Customer Address</label>
                                        <input type="text" class="form-control" id="UserAddress" name="UserAddress" placeholder="Enter User Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="UserAddress2">Customer Address2</label>
                                        <input type="text" class="form-control" id="UserAddress2" name="UserAddress2" placeholder="Enter User Address2">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 ml-1">
                            <div class="form-group">
                                <label class="form-group" for="paymentMethod">Select Payment Method:</label>
                                <select class="form-control" id="paymentMethod" name="paymentMethod">
                                    <option value="Cash on Delivery">Cash on Delivery</option>
                                    <option value="Stripe">Stripe</option>
                                    <option value="PayPal">PayPal</option>
                                    <option value="Razorpay">Razorpay</option>
                                </select>
                                <div class="text-danger paymentMethod_error"></div>
                            </div>
                        </div>


                        <div class="row ml-auto px-5">
                            <div class="col-md-12" style="margin-bottom: 26px; margin-left: 24px; position: relative;">
                                <button type="submit" id="submitOrderForm" class="btn text-white w-100">Submit</button>
                                <div id="loader" style="display: none; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                    <div class="spinner-border" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>


    </form>

</div>

<?= $this->include('templates/footer') ?>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Disable all form fields except the "Customer Type" select box
        const formFields = document.querySelectorAll('.form-control');
        const customerSelect = document.getElementById('customerSelect');

        formFields.forEach(field => {
            if (field !== customerSelect) {
                field.disabled = true;
            }
        });

        // Listen for a change event on the customer type select box
        customerSelect.addEventListener('change', function() {
            if (customerSelect.value) {
                formFields.forEach(field => field.disabled = false);
            } else {
                // Disable all form fields if no customer type is selected
                formFields.forEach(field => {
                    if (field !== customerSelect) {
                        field.disabled = true;
                    }
                });
            }
        });
    });

    // --------------============

    $(document).ready(function() {
        $('.userdetail').hide();
        $('.userfristname').hide();

        $('#customerSelect').change(function() {
            const selectedValue = $(this).val();

            // Reset the User select field and clear all user details
            $('#UserFirstName').val(''); // Clear the select user dropdown
            $('#email').val('');
            $('#UserFirstNameInput').val('');
            $('#UserCity').val('');
            $('#UserState').val('');
            $('#UserZip').val('');
            $('#UserPhone').val('');
            $('#UserAddress').val('');
            $('#UserAddress2').val('');

            if (selectedValue == "2") {
                $('.userdetail').show();
                $('.userfristname').hide();
            } else if (selectedValue == "1") {
                $('.userdetail').show();
                $('.userfristname').show();
            } else {
                $('.userdetail').hide();
                $('.userfristname').hide();
            }
        });

        $('#UserFirstName').change(function() {
            const userId = $(this).val();

            if (userId) {
                $.ajax({
                    url: 'getUserDetails',
                    type: 'POST',
                    data: {
                        userId: userId
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('#email').val(response.data.UserEmail);
                            $('#UserFirstNameInput').val(response.data.UserFirstName);
                            $('#UserCity').val(response.data.UserCity);
                            $('#UserState').val(response.data.UserState);
                            $('#UserZip').val(response.data.UserZip);
                            $('#UserPhone').val(response.data.UserPhone);
                            $('#UserAddress').val(response.data.UserAddress);
                            $('#UserAddress2').val(response.data.UserAddress2);
                        } else {
                            alert("User details not found!");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            } else {
                // Clear the form fields if no user is selected
                $('#email').val('');
                $('#UserFirstNameInput').val('');
                $('#UserCity').val('');
                $('#UserState').val('');
                $('#UserZip').val('');
                $('#UserPhone').val('');
                $('#UserAddress').val('');
                $('#UserAddress2').val('');
            }
        });
    });


    //     $(document).ready(function() {
    //     $('.userdetail').hide();
    //     $('.userfristname').hide();

    //     $('#customerSelect').change(function() {
    //         const selectedValue = $(this).val();

    //         if (selectedValue == "2") { 
    //             $('.userdetail').show();
    //             $('.userfristname').hide();
    //         } else if (selectedValue == "1") {
    //             $('.userdetail').show();
    //             $('.userfristname').show();
    //         } else {
    //             $('.userdetail').hide();
    //             $('.userfristname').show();
    //         }
    //     });

    //     $('#UserFirstName').change(function() {
    //         const userId = $(this).val();

    //         if (userId) {
    //             $.ajax({
    //                 url: 'getUserDetails',  
    //                 type: 'POST',
    //                 data: { userId: userId },
    //                 dataType: 'json',
    //                 success: function(response) {
    //                     if (response.success) {
    //                         $('#email').val(response.data.UserEmail);
    //                         $('#UserFirstNameInput').val(response.data.UserFirstName);
    //                         $('#UserCity').val(response.data.UserCity);
    //                         $('#UserState').val(response.data.UserState);
    //                         $('#UserZip').val(response.data.UserZip);
    //                         $('#UserPhone').val(response.data.UserPhone);
    //                         $('#UserAddress').val(response.data.UserAddress);
    //                         $('#UserAddress2').val(response.data.UserAddress2);
    //                     } else {
    //                         alert("User details not found!");
    //                     }
    //                 },
    //                 error: function(xhr, status, error) {
    //                     console.log(error);
    //                 }
    //             });
    //         } else {
    //             // Clear the form fields if no user is selected
    //             $('#email').val('');
    //             $('#UserFirstNameInput').val('');
    //             $('#UserCity').val('');
    //             $('#UserState').val('');
    //             $('#UserZip').val('');
    //             $('#UserPhone').val('');
    //             $('#UserAddress').val('');
    //             $('#UserAddress2').val('');
    //         }
    //     });
    // });
    // $(document).ready(function() {
    //     $('.userdetail').hide();
    //     $('.userfristname').hide();
    //     $('#customerSelect').change(function() {
    //         const selectedValue = $(this).val();

    //         if (selectedValue == "2") { 
    //             $('.userdetail').show();
    //              $('.userfristname').hide();

    //         }else if(selectedValue == "1"){
    //             $('.userdetail').show();
    //               $('.userfristname').show();
    //         }
    //         else {
    //             $('.userdetail').hide();
    //               $('.userfristname').show();


    //         }
    //     });

    // });


    $(document).ready(function() {

        $('.select2').select2();

        function calculateTotalPrice(rowId) {
            var quantity = parseFloat($(`#Quantity-${rowId}`).val()) || 0;
            var price = parseFloat($(`#Price-${rowId}`).val()) || 0;
            var totalPrice = quantity * price;

            // Update the total price for the current row
            $(`#totalprice-${rowId}`).val(totalPrice.toFixed(2));

            // Calculate the grand total
            var grandTotal = 0;

            // Loop through all rows to calculate the grand total
            $('[id^="totalprice-"]').each(function() {
                var rowTotal = parseFloat($(this).val()) || 0; // Get the total price for each row
                grandTotal += rowTotal; // Accumulate the grand total
            });

            // Update the grand total input field
            $('#grandTotal-1').val(grandTotal.toFixed(2)); // Ensure this matches your grand total input ID
        }

        $(document).on('change', '.product-select', function() {
            const selectedOption = $(this).find('option:selected');
            const rowId = $(this).attr('id').split('-')[1];
            const price = selectedOption.data('price');

            $(`#Price-${rowId}`).val(price);

            const quantityInput = $(`#Quantity-${rowId}`);
            if (quantityInput.val() === '' || quantityInput.val() < 1) {
                quantityInput.val(1);
            }

            calculateTotalPrice(rowId);
        });

        $(document).on('input', '.quantity', function() {
            const rowId = $(this).attr('id').split('-')[1];
            const quantity = $(this).val();

            if (!/^\d+$/.test(quantity) || quantity < 1) {
                $(this).val(1);
                alert("Please enter a valid whole number (1 or greater) for quantity.");
            }

            calculateTotalPrice(rowId);
        });

        let productRowCount = 1;
        $('#add-product-row').on('click', function() {
            productRowCount++;
            const newRow = `
                <div class="row product-row" id="product-row-${productRowCount}">
                    <div class="col-md-3 px-1">
                        <div class="form-group">
                            <label for="product-${productRowCount}">Select Product</label>
                            <select class="form-control select2 product-select" id="product-${productRowCount}" name="product[]">
                             <option value="">Select Product</option>
                                <?php foreach ($products as $product) { ?>
                                    <option value="<?= $product['ProductID']; ?>" data-price="<?= $product['ProductPrice']; ?>"><?= $product['ProductName']; ?></option>
                                <?php } ?>
                            </select>
                            <span class="products_err text-danger"></span>
                        </div>
                    </div>
                    
                    <div class="col-md-3 px-1">
                        <div class="form-group">
                            <label for="Quantity-${productRowCount}">Quantity</label>
                            <input type="number" class="form-control quantity" id="Quantity-${productRowCount}" name="Quantity[]" placeholder="Quantity" min="1" value="">
                             <span class="quantity_err text-danger"></span>
                        </div>
                    </div>
                    
                    <div class="col-md-3 px-1">
                        <div class="form-group">
                            <label for="Price-${productRowCount}">Price</label>
                            <input type="number" class="form-control price" id="Price-${productRowCount}" name="Price[]" placeholder="Price" min="1" readonly>
                             <span class="price_err text-danger"></span>
                        </div>
                    </div>
                    
                    <div class="col-md-3 px-1">
                            <label for="totalprice-${productRowCount}">Total Price</label>
                        <div class="form-group d-flex flex-row align-items-center gap-1">
                            <input type="number" class="form-control total-price" id="totalprice-${productRowCount}" name="totalprice[]" placeholder="Total Price" min="1" readonly>
                             <span class="totalprice_err text-danger"></span>
                             
                             <button type="button" class="btn btn-danger bg-danger remove-product-row">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        </div>
                    </div>
                </div>
            `;
            $('#product-rows-container').append(newRow);
            $('.select2').select2();
        });

        $(document).on('click', '.remove-product-row', function() {
            $(this).closest('.product-row').remove();
        });

        $('#submitOrderForm').click(function(e) {
            e.preventDefault();
            let isValid = true;

            $('#state_err').text('');
            $('#city_err').text('');
            $('#zip_err').text('');

            $('.products_err, .quantity_err, .price_err, .totalprice_err').text('');

            var customer = $("#customerSelect").val();
            if (!customer) {
                $('.customer_err').text('Please select a customer.');
                isValid = false;
            } else {
                $('.pro_err').text();
            }


            if (customer == 1 && '') {
                $('.user_err').text('Please select a user.');
                isValid = false;
            } else {
                $('.user_err').text('');
            }


            var paymentMethod = $('.paymentMethod').val();
            if (paymentMethod == '') {
                $('.paymentMethod_error').text('Please select Payment Method.');
                isValid = false;
            } else {
                $('.paymentMethod_error').text();
            }


            var mainproduct = $('.main-product').val();

            if (!mainproduct) {
                $('.pro_err').text('Please select a product.');
                isValid = false;
            } else {
                $('.pro_err').text();
            }

            var quantitys = $('.quantitys').val();
            if (!quantitys) {
                $('.qua_err').text('Please select a quantity.');
                isValid = false;
            } else {
                $('.qua_err').text();
            }



            $('.product-row').each(function() {
                var product = $(this).find('.product-select').val();
                var quantity = $(this).find('.quantity').val();
                var price = $(this).find('.price').val();
                var totalprice = $(this).find('.total-price').val();

                if (!product) {
                    $(this).find('.products_err').text('Please select a product.');
                    isValid = false;
                }
                if (!quantity || quantity <= 0) {
                    $(this).find('.quantity_err').text('Please enter a valid quantity.');
                    isValid = false;
                }
                // if (!price) {
                //     $(this).find('.price_err').text('Price cannot be empty.');
                //     isValid = false;
                // }
                // if (!totalprice) {
                //     $(this).find('.totalprice_err').text('Total price cannot be empty.');
                //     isValid = false;
                // }
            });

            $('.userdetail:visible').find('input').each(function() {
                // Exclude UserAddress2 field
                if ($(this).attr('id') === 'UserAddress2') {
                    return; // skip this input
                }

                if ($(this).val().trim() === '') {
                    isValid = false;
                    $(this).addClass('is-invalid');
                    $(this).siblings('.qua_err').text('This field is required.');
                } else {
                    $(this).removeClass('is-invalid');
                    $(this).siblings('.qua_err').text('');
                }
            });


            //   $('.userdetail:visible').find('input').each(function() {
            //         if ($(this).val().trim() === '') { // Check if the input is empty
            //             isValid = false;
            //             $(this).addClass('is-invalid'); // Add Bootstrap error class
            //             $(this).siblings('.qua_err').text('This field is required.'); // Display error message
            //         } else {
            //             $(this).removeClass('is-invalid'); // Remove error class if valid
            //             $(this).siblings('.qua_err').text(''); // Clear error message
            //         }
            //     });
            if (!isValid) {
                return;
            }
            $('#loader').show();
            let formData = $('#orderForm').serialize();
            $.ajax({
                type: 'POST',
                url: 'add-save-order',
                data: formData,
                success: function(response) {
                    response = typeof response === 'string' ? JSON.parse(response) : response;

                    if (response.success === '1') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Order submitted successfully!',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            setTimeout(() => {
                                // window.location.reload();
                                window.location.href = "https://ecom-demo.fableadtech.com/admin//all-orders";
                            }, 1000);
                        });
                        $('#loader').hide();
                    } else if (response.success === 'state') {
                        $('#state_err').text(response.message);
                    } else if (response.success === 'city') {
                        $('#city_err').text(response.message);
                    } else if (response.success === 'tax') {
                        $('#zip_err').text(response.message);
                    } else {
                        if (response.errors) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Something Went Wrong Try Again Later!',
                                timer: 2000,
                                showConfirmButton: true
                            })
                        }
                    }
                },
                error: function() {
                    alert('An error occurred while submitting the order.');
                }
            });
        });
    });
</script>