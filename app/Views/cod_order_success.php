<?= $this->include('header') ?>

<style>
    .order {
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        width: 100%;
        table-layout: fixed;
        border: 1px solid black;
    }

    .order tr {

        border: 1px solid #ddd;
        /* padding: .35em; */
        display: flex;
        justify-content: space-between;
    }


    .order td {
        padding: 0.125em;
        text-align: left;
        border: 1px solid #ddd;
    }

    .order th {
        background-color: #f8f8f8;
        font-size: .85em;
        letter-spacing: .1em;
    }

    .product {
        border: 1px solid #ddd;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        width: 100%;
        table-layout: fixed;
    }

    .product tr {

        border: 1px solid #ddd;
        padding: .35em;
    }

    .product th,
    .product td {
        padding: .625em;
        text-align: center;
    }

    .product th {
        background-color: #f8f8f8;
        font-size: .85em;
        letter-spacing: .1em;
    }

    h3 {
        color: #f7941d;
    }

    h4 {
        color: #f7941d;
    }

    @media (max-width: 576px) {
        .ovrflw-scrl {
            overflow: scroll;
        }
    }

    .btn-primary:not(:disabled):not(.disabled):active,
    .show>.btn-primary.dropdown-toggle {
        color: #fff;
        background-color: #f7941d;
        border-color: #f7941d;
        outline: none;
        box-shadow: 0 0 0 .2rem rgb(247 148 29 / 25%);
    }

    .btn-primary:focus {
        color: #fff;
        background-color: #f7941d;
        outline: 0;
        box-shadow: 0 0 0 .2rem rgb(247 148 29 / 25%);
    }
</style>

<?php
$AllsettingsModel = new \App\Models\Allsettingsmodel();
$all_setting_data = $AllsettingsModel->first();
?>

<div class="container mt-4 mb-5">
    <div style="width:100%;text-align:center">
        <img src="https://ecom-demo.fableadtech.com/admin/public/upload_images/1702970978_5ddd8499c96a9fe06ef1.png"
            alt="Ecom Logo" />

    </div>

    <div class="my-3" style="width:100%">
        <h3 style="text-align:center;">Thank you! Your order has been placed successfully.</h3>
    </div>
    <div class="mt-5 mb-2" style="width:100%">
        <h3>Your order detail :</h3>
    </div>


    <div style="width: 100%; display: flex;">
        <div style="width: 50%; border: 1px solid #ccc; padding: 10px;">
            <h4 style="margin: 0;">SUMMARY:</h4>
            <table class="order" width="100%" style="border: none; border-collapse: collapse;">
                <tr style="border: none;">
                    <td style="border: none;"><strong>Order No.:</strong></td>
                    <td style="border: none;">#<?= $ord->OrderNumber; ?></td>
                </tr>

                <!-- Total Product Price -->
                <?php $totalProductPrice = 0; ?>
                <!-- <?php // echo "<pre>"; print_r($orditm); ?> -->
                <?php if (!empty($orditm)): ?>
                    <?php foreach ($orditm as $orddt): ?>
                        <?php $totalProductPrice += $orddt['Price'] * $orddt['Quantity']; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
                <tr style="border: none; font-weight: bold;">
                    <td style="border: none;"><strong>Total Product Price:</strong></td>
                    <td style="border: none;"><?php echo $all_setting_data['currency']; ?><?= $totalProductPrice; ?></td>
                </tr>

                <!-- Shipping Cost -->
                <?php if ($ord->totalShipingCost > 0): ?>
                    <tr style="border: none;">
                        <td style="border: none;"><strong>Shipping Cost:</strong></td>
                        <td style="border: none;">(+ <?php echo $all_setting_data['currency']; ?><?= $ord->totalShipingCost; ?>)</td>
                    </tr>
                <?php endif; ?>

                <!-- Handling Charge -->
                <?php if ($ord->totalTax > 0): ?>
                    <tr style="border: none;">
                        <td style="border: none;"><strong>Tax:</strong></td>
                        <td style="border: none;">(+ <?php echo $all_setting_data['currency']; ?><?= $ord->totalTax; ?>)</td>
                    </tr>
                <?php endif; ?>

                <!-- discount -->
                <?php if ($ord->totalDiscount > 0): ?>
                    <tr style="border: none;">
                        <td style="border: none;"><strong>Discount:</strong></td>
                        <td style="border: none;">(- <?php echo $all_setting_data['currency']; ?><?= $ord->totalDiscount; ?>)</td>
                    </tr>
                <?php endif; ?>

                <!-- Referral Discount -->
                <?php $finalAmount = $ord->TotalAmount; ?>

                <!-- Total Amount -->
                <tr style="border: none; font-weight: bold;">
                    <td style="border: none;"><strong>Total Amount:</strong></td>
                    <td style="border: none;"><?php echo $all_setting_data['currency']; ?><?= $finalAmount; ?></td>
                </tr>

                <!-- Placed On -->
                <tr style="border: none;">
                    <td style="border: none;"><strong>Placed On:</strong></td>
                    <td style="border: none;"><?= $ord->OrderDate; ?></td>
                </tr>
            </table>
        </div>


        <div style="width: 50%; border: 1px solid #ccc; padding: 10px;">
            <h4 style="margin: 0;">SHIPPING ADDRESS:</h4>
            <table class="order" width="100%" style="border: none; border-collapse: collapse;">
                <tr style="border: none;">
                    <td style="border: none;"><?php echo $ord->fname; ?></td>
                </tr>
                <tr style="border: none;">
                    <td class="ovrflw-scrl" style="border: none;"><?php echo $ord->email; ?></td>
                </tr>
                <tr style="border: none;">
                    <td style="border: none;">
                        <a href="tel:+<?php echo $ord->phoneno; ?>">+<?php echo $ord->phoneno; ?></a>
                    </td>
                </tr>
                <tr style="border: none;">
                    <td style="border: none;"><?php echo $ord->address1; ?> <?php echo $ord->address2; ?></td>
                </tr>
            </table>
        </div>
    </div>


    <div style="width:100%">
        <div class="d-flex align-items-center justify-content-between">

            <h3 class="hdr mt-5 mb-2">Your product detail :</h3>
            <div class="align-items-end d-flex justify-content-end">
                <a class="btn btn-primary customer-order-btn rounded m-0 mt-4 link-text" style="font-size:15px;"
                    href="<?php echo base_url('invoice/' . $ord->OrderID); ?>" target="_blank">
                    <i class="fa fa-download mx-1" aria-hidden="true"></i>Invoice
                </a>
            </div>
        </div>
        <table class="product" width="100%">
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Name </th>
                    <th>Qty </th>
                    <th>Price </th>
                </tr>
            </thead>
            <tbody>

                <?php if (!empty($orditm)): ?>
                    <?php foreach ($orditm as $orddt): ?>
                        <?php
                        $prod = new App\Models\Productmodel();
                        $prddata = $prod->where('ProductID', $orddt['ProductID'])->get()->getRow();
                        $prdimage = json_decode($prddata->ProductImage);
                        $singleimg = $prdimage[0];
                        ?>
                        <tr>
                            <td><img class="img-fluid" height="50" width="50"
                                    src="<?= base_url('admin/public/assets/img/product_images/' . $singleimg); ?>"></td>
                            <td><?= $prddata->ProductName; ?></td>
                            <td><?= $orddt['Quantity']; ?></td>
                            <td><?php echo $all_setting_data['currency']; ?><?= $orddt['Price']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php
    $AllsettingsModel = new \App\Models\Allsettingsmodel();
    $all_setting_data = $AllsettingsModel->first();
    ?>
    <div class="text-center my-4">
        <a href="<?php echo base_url(); ?>" class="btn rounded link-text text-capitalize"
            style="font-weight:500;font-size:16px;">
            <i class="fa fa-chevron-left"></i> Continue shopping
        </a>
    </div>

    <!--<div style="width:100%;background-color:#f7941d;padding:1px;margin-top:15px;border-radius:5px;text-align:center">-->
    <div class="mt-4" style="width:100%;padding:1px;border-radius:5px;text-align:center">
        <h6 class="text-capitalize" style="text-align:center;color:#000;">
            If you have any issues with the order kindly contact <a class="btn rounded px-3 py-2"
                href="tel:<?= $all_setting_data['Phone'] ?? ''; ?>"
                style="color:#fff;text-decoration:none;font-size: 15px;font-weight:500;"><i
                    class="fa-solid fa-phone mr-1"></i>Call Us</a>
        </h6>
    </div>



</div>

<?= $this->include('footer') ?>