
<?= $this->include ('templates/header') ?>
<style>
	.table_product_img_th{
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

</style>
    <div class="text-nowrap m-5">
        <div class="card mb-5">
            <div class="card-body p-0">
      		    <span class="addprobtn2">Export orders</span><a href="<?php echo base_url(); ?>all-orders"><span class="addprobtn">Back</span></a>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="flex-grow-1 container-p-y">
                <div class="row">
                    <div class="col-md-12 tag-mar">
                        <div class="card mb-4">
                            <!--<h5 class="card-header">Default</h5>-->
                            <div class="card-body">
                                
                                <form id="orderform" method="post" action="<?php echo base_url('export_data'); ?>"  enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mt-2 mb-3 order_range">
                                            <label for="largeSelect" class="form-label">Order range</label>
                                            <select id="order_range" name="order_range" class="form-select" style="color:#697a8d;">
                                                <option value="">All orders</option>
                                                <option value="1-100">1-100</option>
                                                <option value="101-200">101-200</option>
                                                <option value="201-300">201-300</option>
                                                <option value="301-400">301-400</option>
                                                <option value="401-500">401-500</option>
                                            
                                            </select>
                                            
                                            <span id="product_type_err"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mt-2 mb-3 order_status">
                                            <label for="largeSelect" class="form-label">Order status</label>
                                            <select id="order_status" name="order_status" class="form-select" style="color:#697a8d;">
                                                <option value="">Select Status</option>
                                                <option value="Proof Approved">Proof Approved</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Order Processing">Order Processing</option>
                                                <option value="File Review">File Review</option>
                                                <option value="Waiting for file">Waiting for file</option>
                                                <option value="Art work completed">Art work completed</option>
                                                <option value="File ready for printing">File ready for printing</option>
                                                <option value="CS alert">CS alert</option>
                                                <option value="On Hold">On Hold</option>
                                                <option value="Pre-Press">Pre-Press</option>
                                                <option value="In production">In production</option>
                                                <option value="Out of Production">Out of Production</option>
                                                <option value="Order Cancelled">Order Cancelled</option>
                                                <option value="Printing Done">Printing Done</option>
                                                <option value="Ready for pickup">Ready for pickup</option>
                                                <option value="Shipped">Shipped</option>
                                                <option value="Picked Up">Picked Up</option>
                                                <option value="Proof Sent - Waiting for approval">Proof Sent - Waiting for approval</option>
                                                <option value="Pending order cancelled">Pending order cancelled</option>
                                                <option value="Completed">Completed</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mt-2 mb-3 from_date">
                                            <label for="largeSelect" class="form-label">From date</label>
                                            <input type="date" name="from_date" class="form-control" id="from_date" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mt-2 mb-3 to_date">
                                            <label for="largeSelect" class="form-label">To date</label>
                                            <input type="date" name="to_date" class="form-control" id="to_date" value="" />
                                        </div>
                                    </div>
                                </div>
                              

                               <?php if (isset($_SESSION['error'])): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $_SESSION['error']; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float:right;"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                <?php endif;?>
                                <div class="card-body p-2 mb-3">
                                    <button type="submit" class="addprobtn export_data" id="export_product">Export</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->include ('templates/footer') ?>
<script>
    $(document).ready(function()
    {
        $(".close").on('click',function()
        {
            $(".alert-danger").hide();
        });
       /*$("#export_product").on('click',function()
       {
            var order_range = $("#order_range").val();
            var from_date = $("#from_date").val();
            var to_date = $("#to_date").val();
            var order_status = $("#order_status").val();
            
            $(".error").remove();
            var flag=1;
            
            if(order_range=='')
            {
                $(".order_range").after('<div class="error text-danger">Please select order range</div>');
                flag=0;
            }
            if(order_status=='')
            {
                $(".order_status").after('<div class="error text-danger">Please select order status</div>');
                flag=0;
            }
            if(from_date=='')
            {
                $(".from_date").after('<div class="error text-danger">Please select from date</div>');
                flag=0;   
            }
            if(to_date=='')
            {
                $(".to_date").after('<div class="error text-danger">Please select to date</div>');
                flag=0;
            }
            
            if(flag==0)
            {
                return false;
            }
            
            $.ajax({
                    type:'POST',
                    url:'export_data',
                    data:{order_range:order_range,from_date:from_date,to_date:to_date,order_status:order_status},
                    success:function()
                    {
                        // window.location.href='export_data';
                    }
                });
            
       }); */
    });
</script>