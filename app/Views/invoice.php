<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details PDF</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            /*font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;*/
            font-family: 'Roboto', sans-serif; 
        }

        body {
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 960px;
            margin: 0 auto;
            background: #fff; /* White background for the invoice */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            padding: 20px;
        }

        header {
            display: flex;
            justify-content: space-between;
            /*align-items: center;*/
            border-bottom: 2px solid #0147e0; /* Bootstrap primary color */
            padding-bottom: 10px;
        }

        header .company-info {
            text-align: right;
        }

        h1, h2 {
            color: #f7941d;
            margin-bottom: 10px; /* Space below headings */
        }
          h3 {
            color: #f7941d;
        }
        

        h4 {
            color: #f7941d; /* Bootstrap primary color for section headings */
            margin-bottom: 5px; /* Space below section headings */
        }

        section {
            /*margin-top: 20px;*/
        }

        table {
            width: 100%;
            border-collapse: collapse;
            /*margin-top: 10px;*/
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #f7941d; 
            color: white;
        }

        .total-label {
            text-align: right;
            font-weight: bold;
        }

        footer {
            text-align: center;
            /*margin-top: 40px;*/
            font-size: 12px;
            color: #777;
        }

        .btn-primary {
            background-color: #f7941d; /* Bootstrap primary color */
            border: none; /* Remove border */
            border-radius: 5px; /* Rounded corners */
        }

        .btn-primary:hover {
            background-color: #f7941dd6; /* Darker shade for hover */
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                align-items: center;
                text-align: center; /* Center align text for smaller screens */
            }

            .logo img {
                width: 100px; /* Adjust logo size */
            }

            table, th, td {
                font-size: 14px; /* Adjust font size for smaller screens */
            }

            .total-label {
                font-size: 16px; /* Slightly larger total label */
            }
        }

        @media (max-width: 576px) {
            h1 {
                font-size: 24px; /* Smaller font size for headings */
            }

            h2 {
                font-size: 20px;
            }

            section {
                margin-top: 15px; /* Less margin on smaller screens */
            }
        }
        
        a:hover {
    color: #f7941dd6;
    text-decoration: none;
}
a {
     color: #f7941d;
    text-decoration: none;
    background-color: transparent;
}

.btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle {
    color: #fff;
    background-color: #f7941d;
    border-color: #f7941d;
    outline:none;
    box-shadow: 0 0 0 .2rem rgb(247 148 29 / 25%);
}

.btn-primary:focus {
    color: #fff;
    background-color: #f7941d;
    outline: 0;
    box-shadow: 0 0 0 .2rem rgb(247 148 29 / 25%);
}

    </style>
</head>

<?php
$AllsettingsModel = new \App\Models\Allsettingsmodel();
$all_setting_data = $AllsettingsModel->first();
?>

<body>
   <div class="container text-right" style="box-shadow: none; background: transparent;">
    <button class="btn mt-3 btn-primary" onclick="downloadPdf()">
        <i class="fa fa-download mx-1" aria-hidden="true"></i> Download PDF
    </button>
</div>
    <div id="content">
        <div class="container">
            <header>
                <div class="logo">
                     <img src="https://ecom-demo.fableadtech.com/admin/public/upload_images/1702970978_5ddd8499c96a9fe06ef1.png" alt="Ecom logo" width="200"/>
                     
                </div>
                <div class="company-info">
                    <h1>Invoice</h1>
                    <p class="mb-1"><?php echo $settings[0]['Address']; ?></p>
                    <p class="mb-1">
                        Email: <a href="mailto:<?php echo $settings[0]['Email']; ?>"><?php echo $settings[0]['Email']; ?></a> | 
                        Phone: <a href="tel:+<?php echo $settings[0]['Phone']; ?>">+<?php echo $settings[0]['Phone']; ?></a>
                    </p>
                    
                </div>
            </header>
            <div class="row de">
                <section class="order-details col-lg-6">
                    <h4>Order Details</h4>
                    <p class="mb-1"><strong>Order ID:</strong> #<?php echo str_pad($order_det['OrderNumber'], 5, '0', STR_PAD_LEFT); ?></p>
                    <p class="mb-1"><strong>Order Date:</strong> <?php echo date('jS F Y', strtotime($order_det['OrderDate'])); ?></p>
                </section>
                <section class="customer-info col-lg-6">
                    <h4>Customer Information</h4>
                    <p class="mb-1"><strong>Name:</strong> <?php echo htmlspecialchars($order_det['fname'] . ' ' . $order_det['lname']); ?></p>
                    <p class="mb-1"><strong>Email:</strong> <?php echo htmlspecialchars($order_det['email']); ?></p>
                    <p class="mb-1"><strong>Shipping Address:</strong> <?php echo htmlspecialchars($order_det['address1'] . ', ' . $order_det['city_name'] . ', ' . $order_det['state_name'] . ', ' . $order_det['country_name']); ?></p>
                    <p class="mb-1"><strong>Phone no.:</strong> <?php echo htmlspecialchars($order_det['phoneno']); ?></p>
                </section>
            </div>

            <section class="order-summary">
    <h3 class="mb-0">Order Summary</h3>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Qty.</th>
                <th>Price</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $subtotal = 0;
            // echo "<pre>";
            // print_r($order_det);
            foreach ($order_items as $item) {
                $totalPrice = $item['Quantity'] * $item['Price'];
                $subtotal += $totalPrice;
            ?>
            <tr>
                <td style="width:250px"><?php echo htmlspecialchars($item['ProductName']); ?></td>
                <td><?php echo htmlspecialchars($item['Quantity']); ?></td>
                <td><?php echo $all_setting_data['currency']; ?><?php echo htmlspecialchars($item['Price']); ?></td>
                <!--<td><?php // echo htmlspecialchars($item['batch']); ?></td>-->
                <!--<td><?php // echo htmlspecialchars($item['exprice_date']); ?></td>-->
                <td><?php echo $all_setting_data['currency'] . number_format($totalPrice, 2); ?></td> <!-- Display total price for each item -->
            </tr>
            <?php } ?>

            <!-- Display the subtotal -->
            <tr>
                <td colspan="3" class="total-label">Subtotal:</td>
                <td><?php echo $all_setting_data['currency'] . number_format($subtotal, 2); ?></td>
            </tr>

            <!-- Display the shipping cost if applicable -->
            <?php if ($shipping_cost > 0): ?>
            <tr>
                <td colspan="3" class="total-label">Shipping Charges (+):</td>
                <td><?php echo $all_setting_data['currency'] . number_format($shipping_cost, 2); ?></td>
            </tr>
            <?php endif; ?>

            <!-- Display the handling charges -->

            <!-- Display the discount if applicable -->
            <?php if ($discount > 0): ?>
            <tr>
                <td colspan="3" class="total-label">Discount (-):</td>
                <td><?php echo $all_setting_data['currency'] . number_format($discount, 2); ?></td>
            </tr>
            <?php endif; ?>

            <?php if ($totalTax > 0): ?>
            <tr>
                <td colspan="3" class="total-label">Tax (+):</td>
                <td><?php echo $all_setting_data['currency'] . number_format($totalTax, 2); ?></td>
            </tr>
            <?php endif; ?>
            
             <!-- Display the referral discount if applicable -->

            <!-- Display the final total -->
            <tr>
                <td colspan="3" class="total-label"><strong>Total Amount:</strong></td>
                <td><strong><?php echo $all_setting_data['currency'] . number_format($TotalAmount, 2); ?></strong></td>
            </tr>
        </tbody>
    </table>
</section>


            <div class="row">
                <section class="payment-info col-lg-6">
                    <h4>Payment Information</h4>
                    <!--<p><strong>Payment Method:</strong> <span class="text-capitalize"><?php // echo htmlspecialchars($order_det['payment']); ?></span></p>-->
                    
                    <p class="mb-1"><strong>Payment Method:</strong> <span class="text-capitalize">
                        <?php 
                        echo htmlspecialchars($order_det['payment']) === 'cod' ? 'Pay After Bill Generation' : htmlspecialchars($order_det['payment']);
                        ?>
                    </span></p>
                    
                    <p class="text-capitalize"><strong>Payment Status:</strong> <?php echo htmlspecialchars($order_det['OrderStatus']); ?></p>
                </section>
            </div>

            <footer>
                <p class="mb-1">For any queries, please contact us at info@gmail.com</p>
                <!--<p>&copy; 2024 Ecom. All rights reserved.</p>-->
                <p>&copy; <?php echo date("Y"); ?> Ecom. All rights reserved.</p>
            </footer>
        </div>
    </div>
</body>

<script>
 function isImagesLoaded(callback) {
    var images = document.querySelectorAll('#content img');
    var totalImages = images.length;
    var imagesLoaded = 0;

    images.forEach(function(img) {
        if (img.complete) {
            imagesLoaded++;
        } else {
            img.onload = function() {
                imagesLoaded++;
                if (imagesLoaded === totalImages) {
                    callback();
                }
            };
        }
    });

    if (imagesLoaded === totalImages) {
        callback();
    }
}

function downloadPdf() {
    isImagesLoaded(function() {
        var element = document.getElementById('content');

        var options = {
            margin: 0.5,
            filename: 'Invoice_<?php echo str_pad($order_det['OrderNumber'], 5, '0', STR_PAD_LEFT); ?>.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2, useCORS: true },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        };

        html2pdf().from(element).set(options).save();
    });
}



</script>

</html>