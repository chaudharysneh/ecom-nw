<?= $this->include('header') ?>	
<style>
	.main-category{
		display: none;
	}
</style>
	
		<section class="shop checkout section">
			<div class="container">
                <div class="col-md-12 text-center">
                    <div class="alert alert-success">Thank you  your order has been placed successfully.</div>
                </div>
    
                <div class="row ord-addr-info">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <div class="col-md-12">
                        <div class="hdr">Order Info</div>
                    </div>
                        <div class="col-md-12">
                        <b>Reference ID:</b> #<?php echo $ord->OrderNumber; ?></p>
                    </div>
                        <div class="col-md-12">
                        <p><b>Buyer Name:</b> <?php echo $ord->fname.' '.$ord->lname; ?></p>
                     </div>
                        <div class="col-md-12">
                        <p><b>Email:</b> <?php echo $ord->email; ?></p>
                    </div>
                        <div class="col-md-12">
                        <p><b>Phone:</b> <?php echo $ord->phoneno; ?></p>
                    </div>
                        <div class="col-md-12">
                        <p><b>Address:</b> <?php echo $ord->address1; ?> <?php echo $ord->address2; ?></p>
                    </div>
                        <div class="col-md-12">
                        <p><b>Total:</b> <?php echo $ord->TotalAmount; ?></p>
                    </div>
                        <div class="col-md-12">
                        <p><b>Placed On:</b> <?php echo $ord->OrderDate; ?></p>
                    </div>
                    </div>
                </div>
            </div>
        </section>
            
<?= $this->include('footer') ?>	
	