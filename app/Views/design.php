<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
    @font-face {
        font-family: 'WoodfordBourne';
            /*url('path/to/woodfordbourne.woff') format('woff'); */
        /*src: url('path/to/woodfordbourne.woff2') format('woff2'),*/
        font-weight: normal;
        font-style: normal;
    }
    
    body {
        font-family: 'WoodfordBourne', sans-serif;
        background: #F5F5F5 !important;
    }

    .rounded-pill {
        border-radius: 50rem; 
    }

    .form-control:focus,.btn:focus {
        box-shadow: unset;
    }
    select:focus-visible {
        outline: unset;
    }
    
    .btn-disabled {
    background-color: #bababa !important;
    color: white !important;
    cursor: not-allowed;
}
    
</style>
</head>
<body>
    <input type="hidden" name="product_id" id="product_id" value="<?php echo  $all_product_data['ProductID']; ?>">
    <input type="hidden" name="variationId" id="variation_id" value="<?php echo  $all_product_data['VariationID']; ?>">
    <input type="hidden" id="base_url" value="<?php echo  base_url(); ?>">
    <input type="hidden" id="user_id" value="<?php echo  $user_id; ?>">
    <?php
    $cato= array();
    foreach($varrtype as $vares){
        if(isset($variationsval[$vares['VariationTypeID']]) && !empty($variationsval[$vares['VariationTypeID']])){
            foreach($variationsval[$vares['VariationTypeID']] as $varval){
                $cato[$vares['VariationTypeName']][] = array('VariationID'=>$varval['VariationID'],'VariationName'=>$varval['VariationName']);
            }
        }
    }
    // print_r($cato);die;
        // $cato = array('color'=>array('red','green','yellow'),'size'=>array('s','M','L'),'material'=>array('polister','cotton'),'stroge'=>array('128gb','256gb'),'test1'=>array('tmp1','tmp2'),'test2'=>array('tmp1','tmp2'));
    ?>
    <div class="container-fluid mt-3 mb-3">
       
        
        <?php
        $i=0;
        foreach($cato as $key=>$val){ ?>
        <div class="d-flex justify-content-between mb-3">   
            <label for="" class="align-self-center m-0"><strong><?=ucfirst($key);?></strong></label>
            <select class="form-control-lg bg-white rounded-pill border-light <?=ucfirst($key);?>" style="width: 75%;" >
                <option value="" <?=$i==0?"selected disabled":''?>>Select <?=ucfirst($key);?></option>
                <?php foreach($val as $val1){?>
                <option value="<?=$val1['VariationID']?>"><?=$val1['VariationName']?></option>
                <?php } ?>
            </select>
        </div>
        <?php $i++;} ?>
        
        
        <div class="mt-2 justify-content-between price_div d-none">
            <div class="align-self-center card p-2 rounded-pill text-center w-100 mr-3 border-0">
                <div>
                    <strong class="price" id="main_price"style="font-size: larger;">₹13000</strong>
                    <small class="display_price" style="text-decoration: line-through;">₹15000</small>
                </div>
            </div>
            <div class="w-100">
                <button class="w-100 h-100 btn rounded-pill addtocartbtn" id="add-to-cart-btn" <?php echo $is_in_cart_disabled; ?> style="<?php echo $is_in_cart_disabled ? 'background-color: #bababa !important;' : ''; ?>;background:#F7941C;color:white;letter-spacing: 0.10vh;font-size: larger;">
                    <strong><?php echo $is_in_cart ? 'Added to Cart' : 'Add to Cart'; ?></strong>
                    </button>
            </div>
        </div>
        
        <div class="mt-2 justify-content-between outofstock_div d-none">
            <div class="align-self-center card p-2 rounded-pill text-center w-100 border-0">
                <div>
                    <strong class="price" style="font-size: larger;">Out Of Stock</strong>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
       
        var base_url = $('#base_url').val();
        var varrtype = '<?php print_r(json_encode(array_keys($cato)))?>';
        
        var varrtype_json = JSON.parse(varrtype);
        var formattedArray = varrtype_json.map(function(item) {
          return item.charAt(0).toUpperCase() + item.slice(1);
        });
        var formattedString = '.' + formattedArray.join(', .');
        
        $(document).on('change',formattedString,function(){
            var product_id = $("#product_id").val();
            var tmp_arr = [];
            $.each(formattedArray, function(index, value) {
              var tmp = $('.'+value).val();
              if(tmp == ''){
                  tmp=0;
              }
              tmp_arr.push(tmp);
            });
          
            var data = {
                varrtype : varrtype_json,
                product_id : product_id,
                varrval : tmp_arr
            };
            console.log(data);
            var url ='show_variation2';
            if(base_url != '' && typeof(base_url) != 'undefined' && base_url != null){
                url = base_url+'show_variation2';
            }
            $.ajax({
                    type:'POST',
                    url:url,
                    data:data,
                    success:function(response)
                    {
                        var jsonObject  = JSON.parse(response);
                        if(jsonObject.status=='success')
                        {
                            // $("#price").val(jsonObject.price);
                            if(jsonObject.price != 'out of stock'){
                                var text = jsonObject.price;
                                $('.price_div').removeClass('d-none');
                                $('.price_div').addClass('d-flex');
                                $('.outofstock_div').removeClass('d-flex');
                                $('.outofstock_div').addClass('d-none');
                                if(jsonObject.display_price != false){
                                    $('.display_price').text(jsonObject.display_price);
                                    $('.display_price').removeClass('d-none');
                                }else{
                                    $('.display_price').addClass('d-none');
                                }
                            }else{
                                var text = "Out Of Stock";
                                $('.display_price').addClass('d-none');
                                $('.outofstock_div').removeClass('d-none');
                                $('.outofstock_div').addClass('d-flex');
                                $('.price_div').addClass('d-none');
                                $('.price_div').removeClass('d-flex');
                            }
                            $(".price").text(text);
                            $("input[name='variationId']").val(jsonObject.VariationID);
                            
                            $.each(formattedArray, function(index, value) {
                                var valuesToKeep =jsonObject.availble[value];
                                if(index != 0){ 
                                    $('.'+value+' option').each(function(i) {
                                            // console.log('hh');
                                        if (valuesToKeep.indexOf($(this).val()) === -1) {
                                            if(i != 0){
                                                $(this).prop('disabled', true);
                                            }
                                        }else{
                                            $(this).prop('disabled', false);
                                        }
                                    });
                                }
                                
                                if(jsonObject.selected_data[index] == 0){
                                    $('.'+value).val('');
                                }else{
                                    $('.'+value).val(jsonObject.selected_data[index]);
                                }
                                
                                
                            });
                            
                        }
                        else 
                        {
                            
                        }
                    }
                });
        })
        
        
         $(document).on('click','.addtocartbtn',function(){
            // alert('Your item is added in cart');
            //  $('#customAlertModal').modal('show');
            var productID=$('#product_id').val();
            var variation_tbl_id=$('#variation_id').val();
            var product_price=$('#main_price').text();
            var userId=$('#user_id').val();
            var base_url1=$('#base_url').val();
            var url = "/api/addtocart";
            if(base_url1 != '' && typeof(base_url1) != 'undefined'){
                url = base_url1 +"/api/addtocart";
            }
            //
            $.ajax({
        type: 'POST',
        url: url,
        data: {productID:productID,variation_tbl_id:variation_tbl_id,product_price:product_price,userId:userId},
        // dataType:'json',
        success: function (response) {
             console.log(response);
              var res = JSON.parse(response);
              console.log(res);
            if (res.status == "success") {
                
                // alert('Your item is added in cart');
                // $('#add-to-cart-btn').text('Added to Cart');
                 $('#add-to-cart-btn').text('Added to Cart').prop('disabled', true).css('background-color', '#bababa');

                // Uncomment the following lines if you want to reload the page after a successful response
                // setTimeout(function () {
                //     location.reload();
                // }, 2000);
            }
             if (res.status == "fail") {
                
                // alert('Your item is already added in cart');
                // $('#add-to-cart-btn').text('Added to Cart');
                 $('#add-to-cart-btn').text('Added to Cart').prop('disabled', true).css('background-color', '#bababa');

                // Uncomment the following lines if you want to reload the page after a successful response
                // setTimeout(function () {
                //     location.reload();
                // }, 2000);
            }
            
        }
            });
            //
        });
    </script>
    
    
</body>
</html>