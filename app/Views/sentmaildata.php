<html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <style>
        .order 
        {
          border-collapse: collapse;
          margin: 0;
          padding: 0;
          width: 100%;
          table-layout: fixed;
          border: 1px solid black;
        }
        .order tr {
         
          border: 1px solid #ddd;
          padding: .35em;
        }

        .order td {
          padding: 0.125em;
        text-align: left;
        border: 1px solid  #ddd;
        }

    .order th 
    {
        background-color: #f8f8f8;
        font-size: .85em;
        letter-spacing: .1em;
    }
    
    .product 
        {
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

    .product th 
    {
        background-color: #f8f8f8;
        font-size: .85em;
        letter-spacing: .1em;
    }
    

    </style>
    </head>
   
    <body>
        
        <?php
$AllsettingsModel = new \App\Models\Allsettingsmodel();
$all_setting_data = $AllsettingsModel->first();
?>
        
         <div style="width:100%;text-align:center">
         <img src="https://ecomweb.fableadtechnolabs.com/admin/public/upload_images/1728803054_e8778ea13ec894e43181.png" alt="Ecom logo" width="200"/>
                </div>
                
                <div style="width:100%">
                    <h3 style="text-align:center;">Thank you  your order has been placed successfully.</h3>
                </div>
                <div style="width:100%">
                    <h3>Your order detail is :</h3>
                </div>
                
                
             <div style="width: 100%; display: flex;border: 1px solid #ccc;">
                    <div style="border-right: 1px solid #ccc; padding: 10px;">
                        <h4 style="margin: 0;">SUMMARY:</h4>
                        <table class="order" width="100%" style="border: none; border-collapse: collapse;">
                            <tr style="border: none;">
                                <td style="border: none;"><strong>Order No.:</strong></td>
                                <td style="border: none;">#<?php echo $ord->OrderNumber; ?></td>
                            </tr>
                            
                            
                            <!--===============-->
                             <?php 
                            // Calculate total price of all products
                            $totalProductPrice = 0; 
                            if (!empty($orditm)) {
                                foreach ($orditm as $orddt) {
                                    $totalProductPrice += $orddt['Price'];
                                }
                            }
                            ?>
                
                            <tr style="border: none; font-weight: bold;">
                                <td style="border: none;"><strong>Total Product Price:</strong></td>
                                <td style="border: none;"><?php echo $all_setting_data['currency']; ?><?php echo $totalProductPrice; ?></td>
                            </tr>
                
                            <!-------------------->
                
                            <?php if ($ord->totalShipingCost > 0): ?>
                            <tr style="border: none;">
                                <td style="border: none;"><strong>Shipping Cost:</strong></td>
                                <td style="border: none;">(+ <?php echo $all_setting_data['currency']; ?><?php echo $ord->totalShipingCost; ?>)</td>
                            </tr>
                            <?php endif; ?>
                
                             <!-- Handling Charge -->
                            <?php if ($ord->totalTax > 0): ?>
                            <tr style="border: none;">
                                <td style="border: none;"><strong>Tax:</strong></td>
                                <td style="border: none;">(+ <?php echo $all_setting_data['currency']; ?><?= $ord->totalTax; ?>)</td>
                            </tr>
                            <?php endif; ?>
                
                            <?php if ($ord->totalDiscount > 0): ?>
                            <tr style="border: none;">
                                <td style="border: none;"><strong>Discount:</strong></td>
                                <td style="border: none;">(- <?php echo $all_setting_data['currency']; ?><?php echo $ord->totalDiscount; ?>)</td>
                            </tr>
                            <?php endif; ?>
                
                            <tr style="border: none; font-weight: bold;">
                                <td style="border: none;"><strong>Total Amount:</strong></td>
                                <td style="border: none;"><?php echo $all_setting_data['currency']; ?><?php echo $ord->TotalAmount; ?></td>
                            </tr>
                            
                            <tr style="border: none;">
                                <td style="border: none;"><strong>Placed On:</strong></td>
                                <td style="border: none;"><?php echo $ord->OrderDate; ?></td>
                            </tr>
                        </table>
                    </div>
                
                    <div style="padding: 10px;">
                        <h4 style="margin: 0;">SHIPPING ADDRESS:</h4>
                        <table class="order" width="100%" style="border: none; border-collapse: collapse;">
                            <tr style="border: none;">
                                <td style="border: none;"><?php echo $ord->fname; ?></td>
                            </tr>
                            <tr style="border: none;">
                                <td style="border: none;"><?php echo $ord->email; ?></td>
                            </tr>
                            <tr style="border: none;">
                                <td style="border: none;"><?php echo $ord->phoneno; ?></td>
                            </tr>
                            <tr style="border: none;">
                                <td style="border: none;"><?php echo $ord->address1; ?> <?php echo $ord->address2; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                
                <div style="width:100%">
                    <h3 class="hdr">Product detail</h3>
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
                            <?php
                            $price=0;
                            if(!empty($orditm))
                                     {
                                         foreach($orditm as $orddt)
                                         {
                                             $prod=new App\Models\Productmodel();
                                             $prddata = $prod->where('ProductID',$orddt['ProductID'])->get()->getRow();
                                            //   print_r($prddata);
                                            //  die;
                                             
                                             $prdimage = json_decode($prddata->ProductImage);
											    $singleimg = $prdimage[0];
											 //   $price += $prddata->ProductPrice;
											 //echo "<pre>";
											 //print_r($orddt);
											 //echo "</pre>";
											 //exit();
											 			    $price += $orddt['Price'];
                            ?>
                            <tr>
                                <td><img class="img-fluid" height="50" width="50"  src="<?php echo base_url('admin/public/assets/img/product_images/'.$singleimg);?>"> </td>
                                <td><?php echo $prddata->ProductName; ?></td>
                                <td><?php echo $orddt['Quantity']; ?></td>
                                <td><?php echo $orddt['Price']; ?></td>
                            </tr>
                                <?php 
                                         }
                                     }
                                ?>
                        </tbody>
                    </table>
                </div>
                
                         
    
    </body>
</html>