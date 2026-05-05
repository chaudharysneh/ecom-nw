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

    .addprobtn:hover {
        color: white;
    }

    .order-number {
        color: #696cff;
        font-weight: bold;
    }

    .product-summery-headers {
        border-bottom: 2px solid #80808052;
    }

    img.product-img {
        width: 20%;
        margin-right: 10px;
    }

    .card-body {
        padding: 17px 34px !important;
    }

    .card {
        background-clip: padding-box;
        box-shadow: 0 2px 6px 0 rgba(67, 89, 113, 0.12);
        border: 1px solid #bdbcbcc2 !important;
    }

    input[type="file"] {
        position: absolute;
        font-size: 50px;
        opacity: 0;
        right: 0;
        top: 0;
    }

    button.addprobtn {
        position: relative;
        overflow: hidden;
    }

    .mm {
        margin-left: 35px !important;
    }

    .h4 {
        margin-top: 15px !important;
    }

    .mmm {
        margin-top: -8px;
    }

    .row.mt-4 {
        display: flex;
    }

    .row.mt-4>.col-lg-6 {
        display: flex;
        flex-direction: column;
    }

    .row.mt-4>.col-lg-6 .card {
        flex: 1;
    }

    .ppp {
        border-radius: 8px !important;
        padding: 0px !important;
    }

    .abc {
        padding: 1px !important;
        margin-top: 6px;
        margin-bottom: -10px;
        margin-left: -7px;
    }

    .ab {
        /* margin-top: 12px; */
        margin-left: 15px;
        margin-bottom: 0rem !important;
        font-size: 1rem !important;

    }

    .nnn {
        margin-top: 9px
    }

    .pp {
        margin-left: 20px;
    }

    #abcd {
        margin-right: -13px;
    }

    .word_exceed {
        overflow-wrap: break-word;
        word-break: break-word;
        white-space: normal;
    }
</style>
<?= $this->include('templates/header') ?>
<!-- Content wrapper -->
<div class="text-nowrap m-3 mx-lg-4">
    <!-- <div class="card mb-5">
            <div class="card-body p-1">
            
      		    <span class="addprobtn2">Orders</span><a href="<?php //echo base_url(); 
                                                                    ?>all-orders"><span class="addprobtn">Back</span></a>
            </div>
        </div> -->

    <div class="row">
        <div class="col-lg-4">
            <h4 class="nnn">Order Number&nbsp;<span class="order-number">#<?php echo $order_det->OrderNumber; ?></span></h4>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center ppp">
                    <h5 class="ab">Status</h5>
                    <div class="mb-3">
                        <select id="largeSelect" class="form-select order_sts abc" name="order_sts"
                            data-orderid="<?php echo $order_det->OrderID; ?>"
                            data-userid="<?php echo $order_det->UserID; ?>">
                            <option value="">Select Status</option>
                            <option value="Proof Approved"
                                <?php if ($order_det->OrderStatus == "Proof Approved") echo "selected"; ?>>Proof
                                Approved</option>
                            <option value="Pending"
                                <?php if ($order_det->OrderStatus == "Pending") echo "selected"; ?>>Pending
                            </option>
                            <option value="Order Processing"
                                <?php if ($order_det->OrderStatus == "Order Processing") echo "selected"; ?>>Order
                                Processing</option>
                            <option value="File Review"
                                <?php if ($order_det->OrderStatus == "File Review") echo "selected"; ?>>File Review
                            </option>
                            <option value="Waiting for file"
                                <?php if ($order_det->OrderStatus == "Waiting for file") echo "selected"; ?>>
                                Waiting for file</option>
                            <option value="Art work completed"
                                <?php if ($order_det->OrderStatus == "Art work completed") echo "selected"; ?>>Art
                                work completed</option>
                            <option value="File ready for printing"
                                <?php if ($order_det->OrderStatus == "File ready for printing") echo "selected"; ?>>
                                File ready for printing</option>
                            <option value="CS alert"
                                <?php if ($order_det->OrderStatus == "CS alert") echo "selected"; ?>>CS alert
                            </option>
                            <option value="On Hold"
                                <?php if ($order_det->OrderStatus == "On Hold") echo "selected"; ?>>On Hold
                            </option>
                            <option value="Pre-Press"
                                <?php if ($order_det->OrderStatus == "Pre-Press") echo "selected"; ?>>Pre-Press
                            </option>
                            <option value="In production"
                                <?php if ($order_det->OrderStatus == "In production") echo "selected"; ?>>In
                                production</option>
                            <option value="Out of Production"
                                <?php if ($order_det->OrderStatus == "Out of Production") echo "selected"; ?>>Out
                                of Production</option>
                            <option value="Order Cancelled"
                                <?php if ($order_det->OrderStatus == "Order Cancelled") echo "selected"; ?>>Order
                                Cancelled</option>
                            <option value="Printing Done"
                                <?php if ($order_det->OrderStatus == "Printing Done") echo "selected"; ?>>Printing
                                Done</option>
                            <option value="Ready for pickup"
                                <?php if ($order_det->OrderStatus == "Ready for pickup") echo "selected"; ?>>Ready
                                for pickup</option>
                            <option value="Shipped"
                                <?php if ($order_det->OrderStatus == "Shipped") echo "selected"; ?>>Shipped
                            </option>
                            <option value="Picked Up"
                                <?php if ($order_det->OrderStatus == "Picked Up") echo "selected"; ?>>Picked Up
                            </option>
                            <option value="Proof Sent - Waiting for approval"
                                <?php if ($order_det->OrderStatus == "Proof Sent - Waiting for approval") echo "selected"; ?>>
                                Proof Sent - Waiting for approval</option>
                            <option value="Pending order cancelled"
                                <?php if ($order_det->OrderStatus == "Pending order cancelled") echo "selected"; ?>>
                                Pending order cancelled</option>
                            <option value="Completed"
                                <?php if ($order_det->OrderStatus == "Completed") echo "selected"; ?>>Completed
                            </option>
                        </select>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-4">
            <a class="addprobtn" href="<?php echo base_url('all-orders'); ?>">Back</a>
            <button type="button" id="updorder" data-id="<?php echo $order_det->OrderID; ?>"
                class="addprobtn updorder">Update</button>
            <a class="addprobtn" href="<?php echo base_url('invoice/' . $order_det->OrderID); ?>">
                Invoice Download
            </a>

        </div>
    </div>
    <br />
    <div class="row">
        <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
        <div class="col-lg-12">
            <div class="card change_order">
                <div class="card-header">
                    <h5 class="text-center">Order Summary</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-dark">Product</th>
                                    <th class="text-dark">Price</th>
                                    <th class="text-dark">Sale Price</th>
                                    <th class="text-dark">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $orderitem = new App\Models\Orderitemmodel();
                                $orderdet =  $orderitem->select('orderitems.*,products.*')
                                    ->join('products', 'orderitems.ProductID = products.ProductID', 'left')
                                    ->where('orderitems.OrderID', $order_det->OrderID)
                                    ->findAll();

                                if (!empty($orderdet)) {
                                    foreach ($orderdet as $orders) {
                                        $images = [];
                                        $products = new App\Models\productmodel();
                                        $proddata = $products->where('ProductID', $orders['ProductID'])->get()->getRow();
                                        if (!empty($proddata->ProductImage)) {
                                            foreach (json_decode($proddata->ProductImage) as $img) {
                                                $images[] = $img;
                                            }
                                        } else {
                                            $images[] = '18.png'; // ensure it's an array
                                        }
                                ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-2 justify-content-center">
                                                    <img src="<?php echo base_url('public/assets/img/product_images/' . $images[0]); ?>" alt="product" width="40" height="40" class="rounded">
                                                    <div class="product-name">
                                                        <?php echo wordwrap($proddata->ProductName ?? '', 15, "<br>\n"); ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $currency . $orders['Price']; ?></td>
                                            <td><?php echo $currency . $orders['Sale_ProductPrice']; ?></td>
                                            <td><?php echo $orders['Quantity']; ?></td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo '<tr><td colspan="4">No products found for this order.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<br>
<div class="row gap-4 gap-md-0">

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-2">Order Summery</h5>
            </div>
            <div class="card-body">
                <div class=" order-summery">
                    <div class="row product-summery-headers p-2">
                    </div>
                    <?php
                    $items = new App\Models\Orderitemmodel();
                    $itemdt = $items->where('OrderID', $order_det->OrderID)->get()->getResult('array');
                    foreach ($itemdt as $itdt) {
                        $prddet = new App\Models\productmodel();
                        $proddata = $prddet->where('ProductID', $itdt['ProductID'])->get()->getRow();
                    ?>
                        <div class="row product-summery-headers p-2">
                            <!--T-shirt x 2-->
                            <?php
                            if (!empty($proddata->ProductName)) {
                            ?>
                                <div class="col-lg-6 word_exceed">
                                    <?php echo $proddata->ProductName . ' x ' . $itdt['Quantity']; ?>
                                </div>
                                <div class="col-lg-6  text-end">
                                    <?php echo $currency; ?><?php echo $itdt['Price']; ?>
                                </div>
                            <?php
                            } else {
                            ?>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="row product-summery-headers p-2">
                        <?php
                        $price = [];
                        $items = new App\Models\Orderitemmodel();
                        $itemdt = $items->where('OrderID', $order_det->OrderID)->get()->getResult('array');
                        foreach ($itemdt as $itdt) {
                            $price[] = $itdt['Price'];
                        }
                        $subtotal = array_sum($price);
                        ?>

                        <div class="col-lg-6">
                            <strong>Subtotal</strong>
                        </div>
                        <div class="col-lg-6  text-end">
                            <?php echo $currency; ?><?php echo array_sum($price); ?>
                        </div>
                    </div>

                    <?php
                    $orderModel = new App\Models\Ordermodel();
                    $orderDetails = $orderModel->where('OrderID', $order_det->OrderID)->first();
                    $shipping_charge = isset($orderDetails['totalShipingCost']) ? $orderDetails['totalShipingCost'] : 0;
                    $totalTax = isset($orderDetails['totalTax']) ? $orderDetails['totalTax'] : 0;
                    $totalDiscount = isset($orderDetails['totalDiscount']) ? $orderDetails['totalDiscount'] : 0;
                    $totalDiscount = isset($orderDetails['totalDiscount']) ? $orderDetails['totalDiscount'] : 0;
                    $referDis = isset($orderDetails['referDis']) ? $orderDetails['referDis'] : 0;
                    $totalAmount = isset($orderDetails['TotalAmount']) ? $orderDetails['TotalAmount'] : 0;
                    ?>

                    <div class="row product-summery-headers p-2">
                        <div class="col-lg-6 ">
                            Discount
                        </div>
                        <div class="col-lg-6 text-end">
                            <?php echo $currency; ?><?php echo number_format($totalDiscount, 2); ?>
                        </div>
                    </div>
                    <div class="row product-summery-headers p-2">
                        <div class="col-lg-6 ">
                            Tax
                        </div>
                        <div class="col-lg-6 text-end">
                            <?php echo $currency; ?><?php echo number_format($totalTax, 2); ?>
                        </div>
                    </div>
                    <div class="row product-summery-headers p-2">
                        <div class="col-lg-6 ">
                            Shipping
                        </div>
                        <div class="col-lg-6 text-end">
                            <?php echo $currency; ?><?php echo number_format($shipping_charge, 2); ?>
                        </div>
                    </div>

                    <div class="row product-summery-headers p-2">
                        <div class="col-lg-6 ">
                            Payment Method
                        </div>
                        <div class="col-lg-6  text-end">
                            <?php echo $order_det->payment; ?>
                        </div>
                    </div>
                    <div class="row  p-2">
                        <div class="col-lg-6 ">
                            <h5 class="m-0"> Total </h5>
                        </div>
                        <div class="col-lg-6  text-end">
                            <?php
                            $totaldata = $subtotal + $shipping_charge + $totalTax - $totalDiscount - $referDis;
                            ?>
                            <h5 class="m-0"><?php echo $currency; ?><?php echo number_format($totaldata, 2); ?></h5>

                        </div>
                    </div>

                </div>

            </div>




        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h5 class="pb-2 m-0">Customer Details</h5>
            </div>
            <div class="card-body">
                <div class="row shipping-details">

                    <div class="col-lg-6">
                        <div class="col-lg-12 mt-3">
                            <strong>Name</strong>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <strong>Email</strong>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <strong>Phone</strong>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <strong>Date Of Birth</strong>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <strong>Address 1</strong>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <strong>Address 2</strong>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="col-lg-12 mt-3">
                            <?php echo isset($order_det->fname) ? $order_det->fname . ' ' . ($order_det->lname ?? '') : '--'; ?>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <p><?php if (!empty($order_det->email)) echo wordwrap($order_det->email, 25, "<br>", true);
                                else echo ''; ?>
                            </p>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <?php if (!empty($order_det->phoneno)) echo $order_det->phoneno;
                            else echo '--'; ?>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <?php if (!empty($customer_data['DOB']) && $customer_data['DOB'] == '0000-00-00') echo $customer_data['DOB'];
                            else echo '--'; ?>
                        </div>
                        <div class="col-lg-12 mt-3" style="white-space: normal;">
                            <?php if (!empty($order_det->address1)) echo $order_det->address1;
                            else echo '--'; ?>
                        </div>
                        <div class="col-lg-12 mt-3" style="white-space: normal;">
                            <?php if (!empty($order_det->address2)) echo $order_det->address2;
                            else echo '--'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br />

    <div class="row gap-4 gap-md-0 mt-0 mt-lg-4">
        <div class="col-lg-6 pe-0">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-2">Order history</h5>
                </div>
                <div class="card-body">

                    <div class="row product-summery-headers p-2">
                        <div class="col-lg-6">
                            <strong>Comments</strong>
                        </div>
                        <div class="col-lg-6 text-center">
                            <strong>Date</strong>
                        </div>
                        <?php
                        $comments = new App\Models\Ordercommentmodel();
                        $commdata = $comments->where('order_id', $order_det->OrderID)->get()->getResult('array');
                        if (!empty($commdata)) {
                            foreach ($commdata as $comms) {
                        ?>


                                <div class="col-lg-6">
                                    <p><?php echo $comms['comments']; ?></p>
                                </div>
                                <div class="col-lg-6 text-center">
                                    <p><?php echo date("d-m-Y", strtotime($comms['dates'])); ?></p>
                                </div>
                            <?php
                            }
                        } else {
                            ?>
                            <div class="col-lg-6">
                                <p>No comments</p>
                            </div>

                            <div class="col-lg-6">
                                <p class="text-center">-/-/-</p>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 pe-0 px-4">
            <div class="card" id="abcd">
                <div class="card-header">
                    <h5 class="mb-2">Payment & Shipping</h5>
                </div>
                <div class="card-body">
                    <div class="row customer-details">

                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <strong>Payment Method</strong>
                                </div>
                                <div class="col-lg-6 text-center">
                                    <?php echo $order_det->payment; ?>
                                </div>
                            </div>
                            <!-- <hr class="mb-2"> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>


    <br>
    <!-- <div class="row mt-4">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center ppp">
                            <h5 class="m-0">Status</h5>
                            <div class="mb-3">
                                <select id="largeSelect" class="form-select order_sts" name="order_sts"
                                    data-orderid="<?php //echo $order_det->OrderID; 
                                                    ?>"
                                    data-userid="<?php //echo $order_det->UserID; 
                                                    ?>">
                                    <option value="">Select Status</option>
                                    <option value="Proof Approved"
                                        <?php //if($order_det->OrderStatus=="Proof Approved") echo "selected"; 
                                        ?>>Proof
                                        Approved</option>
                                    <option value="Pending"
                                        <?php //if($order_det->OrderStatus=="Pending") echo "selected"; 
                                        ?>>Pending
                                    </option>
                                    <option value="Order Processing"
                                        <?php //if($order_det->OrderStatus=="Order Processing") echo "selected"; 
                                        ?>>Order
                                        Processing</option>
                                    <option value="File Review"
                                        <?php //if($order_det->OrderStatus=="File Review") echo "selected"; 
                                        ?>>File Review
                                    </option>
                                    <option value="Waiting for file"
                                        <?php //if($order_det->OrderStatus=="Waiting for file") echo "selected"; 
                                        ?>>
                                        Waiting for file</option>
                                    <option value="Art work completed"
                                        <?php //if($order_det->OrderStatus=="Art work completed") echo "selected"; 
                                        ?>>Art
                                        work completed</option>
                                    <option value="File ready for printing"
                                        <?php //if($order_det->OrderStatus=="File ready for printing") echo "selected"; 
                                        ?>>
                                        File ready for printing</option>
                                    <option value="CS alert"
                                        <?php //if($order_det->OrderStatus=="CS alert") echo "selected"; 
                                        ?>>CS alert
                                    </option>
                                    <option value="On Hold"
                                        <?php //if($order_det->OrderStatus=="On Hold") echo "selected"; 
                                        ?>>On Hold
                                    </option>
                                    <option value="Pre-Press"
                                        <?php //if($order_det->OrderStatus=="Pre-Press") echo "selected"; 
                                        ?>>Pre-Press
                                    </option>
                                    <option value="In production"
                                        <?php //if($order_det->OrderStatus=="In production") echo "selected"; 
                                        ?>>In
                                        production</option>
                                    <option value="Out of Production"
                                        <?php //if($order_det->OrderStatus=="Out of Production") echo "selected"; 
                                        ?>>Out
                                        of Production</option>
                                    <option value="Order Cancelled"
                                        <?php //if($order_det->OrderStatus=="Order Cancelled") echo "selected"; 
                                        ?>>Order
                                        Cancelled</option>
                                    <option value="Printing Done"
                                        <?php //if($order_det->OrderStatus=="Printing Done") echo "selected"; 
                                        ?>>Printing
                                        Done</option>
                                    <option value="Ready for pickup"
                                        <?php //if($order_det->OrderStatus=="Ready for pickup") echo "selected"; 
                                        ?>>Ready
                                        for pickup</option>
                                    <option value="Shipped"
                                        <?php //if($order_det->OrderStatus=="Shipped") echo "selected"; 
                                        ?>>Shipped
                                    </option>
                                    <option value="Picked Up"
                                        <?php //if($order_det->OrderStatus=="Picked Up") echo "selected"; 
                                        ?>>Picked Up
                                    </option>
                                    <option value="Proof Sent - Waiting for approval"
                                        <?php //if($order_det->OrderStatus=="Proof Sent - Waiting for approval") echo "selected"; 
                                        ?>>
                                        Proof Sent - Waiting for approval</option>
                                    <option value="Pending order cancelled"
                                        <?php //if($order_det->OrderStatus=="Pending order cancelled") echo "selected"; 
                                        ?>>
                                        Pending order cancelled</option>
                                    <option value="Completed"
                                        <?php //if($order_det->OrderStatus=="Completed") echo "selected"; 
                                        ?>>Completed
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>


                </div>
            </div> -->


    </form>
    <!-- <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Comment</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="baseurl" id="base_url" value="<?php echo base_url(); ?>" />
                                    <input type="hidden" name="order_id" id="order_id" value="" />
                                    <input type="hidden" name="order_status" id="order_status" value="" />
                                    <input type="hidden" name="user_id" id="user_id" value="" />
                                    <div class="row">
                                      <div class="col mb-3 comments">
                                        <label for="nameBasic" class="form-label">Comments</label>
                                        <textarea id="comments" id="comments" class="form-control"></textarea>
                                      </div>
                                    </div>
                                   <div id="show_msg"></div>
                                </div>
                                
                                <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="button" class="btn btn-primary" id="save_comment">Save changes</button>
                              </div>
                            </div>
                        </div>
                    </div> -->
    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Comment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="baseurl" id="base_url" value="<?php echo base_url(); ?>" />
                    <input type="hidden" name="order_id" id="order_id" value="" />
                    <input type="hidden" name="order_status" id="order_status" value="" />
                    <input type="hidden" name="user_id" id="user_id" value="" />
                    <div class="row">
                        <div class="col mb-3 comments">
                            <label for="comments" class="form-label">Comments</label>
                            <textarea id="comments" class="form-control"></textarea>
                        </div>
                    </div>
                    <div id="show_msg"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_comment">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- / Content -->
<?= $this->include('templates/footer') ?>
<script>
    $(document).ready(function() {

        $(".order_sts").on('change', function() {
            var order_id = $(this).data('orderid');
            var user_id = $(this).data('userid');
            var order_status = $(this).val();
            $("#basicModal").modal('show');
            $("#order_id").val(order_id);
            $("#order_status").val(order_status);
            $("#user_id").val(user_id);
        });

        $("#save_comment").on('click', function() {

            var comments = $("#comments").val();
            var order_id = $("#order_id").val();
            var order_status = $("#order_status").val();
            var user_id = $("#user_id").val();
            var baseurl = $("#base_url").val();
            var flag = 1;
            $(".error").remove();
            if (comments == '') {
                $(".comments").after('<div class="text-danger error">Please enter comments</div>');
                flag = 0;
            }
            if (flag == 0) {
                return false;
            }
            $.ajax({
                type: 'POST',
                url: baseurl + 'savecomments',
                data: {
                    order_id: order_id,
                    user_id: user_id,
                    comments: comments,
                    order_status: order_status
                },
                success: function(response) {
                    console.log(response); // Log the response data
                    $("#basicModal").modal('hide'); // Hide the modal

                    // Check the response and trigger alerts based on the response value
                    if (response == 1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Status Change successfully!',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(function() {
                            location.reload(); // Reload the page
                        });
                    } else if (response == 2) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Comment not added.', // Specific failure message
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong try again later.', // Handle unexpected response
                        });
                    }
                }


            });
        });

        $(document).on('click', '.updorder', function() {
            var order = $(this).data('id');
            var baseurl = $("#base_url").val();
            $.ajax({
                type: 'POST',
                url: baseurl + 'upd_order',
                data: {
                    order: order
                },
                dataType: 'html',
                success: function(data) {
                    $(".change_order").html(data);
                }
            });
        });

        $(document).on('click', ".upd_orddata", function() {
            var productid = $("#productid").val();
            var formdata = new FormData();
            var baseurl = $("#base_url").val();
            var upload_template = $('#upload_template').prop("files");
            for (var i = 0; i <= upload_template.length; i++) {
                formdata.append("upload_template[]", $('#upload_template').prop("files")[i]);
            }
            formdata.append("productid", productid);

            $.ajax({
                type: 'POST',
                url: baseurl + 'upload_template_dt',
                data: formdata,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data == 1) {
                        window.location.reload();
                    } else {
                        alert('something problem in add data');
                    }

                }
            });
        });
    });
</script>