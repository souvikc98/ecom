<?php $this->load->view('store_admin/includes/header'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-product-hunt"></i> Add Order
      </h1>
    </section>
    
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->            
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                    </div>
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addBill" enctype='multipart/form-data' action="<?php echo base_url() ?>Billing/addBill" method="POST" accept-charset="utf-8">
                        <div class="box-body">
                            <div class="row product-row">
                                <div class="col-md-2">                                
                                    <div class="form-group">
                                        <label for="product_id">Product Name</label><span class="text-red">*</span>
                                        <select class="form-control product_id" style="width: 100%;" id="product_id" name="product_id[]">
                                            <option value="">Please Select</option>
                                            <?php if (!empty($products)) { foreach ($products as $value) { ?>
                                                <option value="<?php echo $value->id; ?>"><?php echo $value->product_name; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">                                
                                    <div class="form-group">
                                        <label for="title">Product Quantity</label><span class="text-red">*</span>
                                        <input type="text" class="form-control quantity" id="quantity" name="quantity[]">
                                    </div>
                                </div>
                                <div class="col-md-2">                                
                                    <div class="form-group">
                                        <label>Product Weight</label>
                                        <input type="text" class="form-control weight" id="weight" name="weight[]" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">                                
                                    <div class="form-group">
                                        <label>Product Price</label>
                                        <input type="text" class="form-control price" id="price" name="price[]" readonly>
                                    </div>
                                </div>
                                <div class="col-md-1">                                
                                    <div class="form-group">
                                        <a href="#" class="btn btn-primary add-product-details"><i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">                                
                                <div class="form-group">
                                    <label for="title">Buyer Name</label><span class="text-red">*</span>
                                    <input type="text" class="form-control buyer_name" id="buyer_name" name="buyer_name">
                                </div>
                            </div>
                            <div class="col-md-3">                                
                                <div class="form-group">
                                    <label>Mobile No</label><span class="text-red">*</span>
                                    <input type="text" class="form-control phone" id="phone" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <button type="button" class="btn btn-primary" value="Back" onclick="goBack()">Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </section> 
</div>
<?php $this->load->view('store_admin/includes/footer'); ?>

<script type="text/javascript">
    $(document).ready(function(){
        $("#addBill").validate({
            rules: {
                "product_id[]": { required: true },
                "quantity[]": { required: true, digits: true },
                "weight[]": { required: true, number: true },
                "price[]": { required: true, digits: true },
                buyer_name: "required",
                phone: { required: true, digits: true, rangelength: [10, 10] }
            },
        });

        $(document).on("change", ".product_id", function() {
            var productId = $(this).val();
            if (parseInt(productId)) {
                var currentRow = $(this).closest('.product-row');
                $.ajax({
                    type: 'POST',
                    url: baseURL + 'Billing/getAllProductInfoByProductId',
                    data: { "product_id": productId },
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        currentRow.find('.weight').val(data.weight);
                        currentRow.find('.price').val(data.price);
                    }
                });
            }
        });


        var productCount = 1;
        $(document).on("click", ".add-product-details", function(event) {
            event.preventDefault();
            var html = `<div class="row product-row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="product_id">Product Name</label><span class="text-red">*</span>
                        <select class="form-control product_id" style="width: 100%;" id="product_id" name="product_id[]">
                            <option value="">Please Select</option>
                            <?php if (!empty($products)) { foreach ($products as $value) { ?>
                                <option value="<?php echo $value->id; ?>"><?php echo $value->product_name; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="title">Product Quantity</label><span class="text-red">*</span>
                        <input type="text" class="form-control quantity" id="" name="quantity[]">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Product Weight</label>
                        <input type="text" class="form-control weight" id="" name="weight[]" readonly>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Product Price</label>
                        <input type="text" class="form-control price" id="" name="price[]" readonly>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <a href="#" class="btn btn-primary remove-product-details"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>`;
            $('.box-body').append(html);
            productCount++;
        });

        // Remove row functionality
        $(document).on("click", ".remove-product-details", function(event) {
            event.preventDefault();
            $(this).closest('.product-row').remove();
            productCount--;
        });
    });

    function goBack() {
        window.history.back();
    }
</script>
