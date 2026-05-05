<?= $this->include('header') ?>	
<style>
	.main-category{
		display: none;
	}
</style>
	
		<section class="shop checkout section">
			<div class="container">
			    <div class="card" style="border-radius: 10px;">
                     <div class="card-header px-4 py-5">
                        <h5 class="text-muted mb-0">Thanks for your Order has been placed successfully !</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                           
                            <div class="col-md-5 col-lg-5">
                                 
                                <div class="row row-main">
                                    <?php
                                    $price=0;
                                    // $orditems = new App\Models\Orderitemmodel();
                                    // $ordedata = $orditems->where('OrderID', $ord->OrderID)->get()->getResult('array');
                                    
//  print_r($ordedata);
 
                                     if(!empty($ordedata))
                                     {
                                         foreach($ordedata as $orddt)
                                         {
                                            
                                             
                                            //  $prod=new App\Models\Productmodel();
                                            //  $prddata = $prod->where('ProductID',$orddt['ProductID'])->get()->getRow();
                                             $prdimage = json_decode(isset($orddt['ProductImage'])?($orddt['ProductImage']):(''));
                                             $singleimg = '';
                                             if($prdimage){
                                                $singleimg = $prdimage[0]; 
                                             }
											    
											    $price += isset($orddt['ProductPrice'])?($orddt['ProductPrice']):(0);
                                             ?>
                                    <div class="row">         
                                        <div class="col-3"> 
                                            <img class="img-fluid"  src="<?php echo base_url('admin/public/assets/img/product_images/'.$singleimg);?>"> 
                                        </div>
                                        <div class="col-6">
                                            <div class="row d-flex">
                                                <p><b><?php echo isset($orddt['ProductName'])?($orddt['ProductName']):(''); ?></b></p>
                                            </div>
                                            <div class="row d-flex">
                                                <p>Qty: <b><?php echo isset($orddt['Quantity'])?($orddt['Quantity']):(''); ?></b></p>
                                            </div>
                                        </div>
                                        <div class="col-3 d-flex justify-content-end">
                                            <p><b>$<?php echo isset($orddt['ProductPrice'])?($orddt['ProductPrice']):(0); ?></b></p>
                                        </div>
                                   </div>
                                   <br/>
                                    <?php
                                         }
                                     }
                                    ?>
                                    
                                </div>
                                <hr>
                                <div class="total">
                                    <div class="row">
                                        <div class="col-3"> <b> Amount:</b> </div>
                                        <div class="col-6"></div>
                                        <div class="col-3 d-flex justify-content-end"> <b>$<?php echo $price; ?></b> </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-3"> <b>Shipping:</b> </div>
                                        <div class="col-6"></div>
                                        <div class="col-3 d-flex justify-content-end"> <b>
                                        <?php
                                            $shippingCost = 10; // Assuming a fixed shipping cost of $10
        
                                           
                                            echo "$".$shippingCost;
                                        ?></b> </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-3"> <b>Tax:</b> </div>
                                        <div class="col-6"></div>
                                        <div class="col-3 d-flex justify-content-end"> <b>
                                        <?php
                                            $taxRate = 0.1; // Assuming a tax rate of 10%
                                            $tax = $price * $taxRate;
                                            echo "$".$tax;
                                        ?></b> </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-3"> <b>Total Paid:</b> </div>
                                        <div class="col-6"></div>
                                        <div class="col-3 d-flex justify-content-end"> <b>
                                        <?php
                                           $taxRate = 0.1; // Assuming a tax rate of 10%
                                           $shippingCost = 10;
                                            $finalamt = $price + ($price * $taxRate) + $shippingCost;
                                            echo "$".$finalamt;
                                        ?></b> </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-7">
                                <h3 class="title">Order detail</h3>
                                <div class="d-flex justify-content-between align-items-center">
                                        <div class="container">
                                            <p class="text-muted mb-2"><b> Order ID: </b><span class="fw-bold text-body"><?php echo $ord->OrderNumber; ?></span></p>
                                            <p class="text-muted mb-0"><b> Place On: </b><span class="fw-bold text-body"><?php echo $ord->OrderDate; ?></span> </p>
                                            <p class="text-muted mb-0"><b>Customer Name: </b><span class="fw-bold text-body"><?php echo $ord->fname.' '.$ord->lname; ?></span> </p>
                                            <p class="text-muted mb-0"><b>Email Address: </b><span class="fw-bold text-body"><?php echo $ord->email; ?></span> </p>
                                            <p class="text-muted mb-0"><b>Phone no: </b><span class="fw-bold text-body"><?php echo $ord->phoneno; ?></span> </p>
                                            <p class="text-muted mb-0"><b>Address: </b><span class="fw-bold text-body"><?php echo $ord->address1; ?> <?php echo $ord->address2; ?></span> </p>
                                            
                                        </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
            
<?= $this->include('footer') ?>	
