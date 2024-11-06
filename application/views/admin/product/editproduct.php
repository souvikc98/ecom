<?php $this->load->view('admin/includes/header'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-product-hunt"></i> Product
        <small>Edit</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" enctype='multipart/form-data' action="<?php echo base_url() ?>editproductInfo" method="POST" id="product" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control select2" style="width: 100%;" id="category_id" name="category_id">
                                            <option value="">Please Select</option>
                                            <?php if (!empty($categories)) { foreach ($categories as $cat) { ?>
                                                <option value="<?php echo $cat->id; ?>" <?php if($cat->id == $productInfo->category_id){echo "selected";} ?>><?php echo $cat->category_name; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">                                
                                    <div class="form-group">
                                        <label for="product_name">Product Name</label><span class="text-red">*</span>
                                        <input type="text" class="form-control required" value="<?php echo $productInfo->product_name; ?>" id="product_name" name="product_name">
                                        <input type="hidden" value="<?php echo $productInfo->id; ?>" name="product_id" id="product_id" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" id="area">
                                        <label for="description">Description</label><span class="text-red">*</span>
                                        <textarea class="form-control required" id="description" value="" name="description" placeholder="Write your text here"><?php echo $productInfo->description; ?></textarea>
                                    </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="title">Product Quantity</label><span class="text-red">*</span>
                                        <input type="text" class="form-control required" value="<?php echo $productInfo->quantity; ?>" id="quantity" name="quantity" >
                                    </div>
                                </div>
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label>Product Weight</label>
                                        <select class="form-control select2" style="width: 100%;" id="weight" name="weight">
                                            <option value="">Please Select</option>
                                            <option value="kg"<?php if($productInfo->weight == "kg"){ echo "selected"; } ?>>KG</option>
                                            <option value="gram"<?php if($productInfo->weight == "gram"){ echo "selected"; } ?>>Gram</option>
                                            <option value="liter"<?php if($productInfo->weight == "liter"){ echo "selected"; } ?>>Liter</option>
                                            <option value="dozen"<?php if($productInfo->weight == "dozen"){ echo "selected"; } ?>>Dozen</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label>Product Price</label>
                                        <input type="text" class="form-control required" value="<?php echo $productInfo->price; ?>" id="price" name="price" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_image">Image</label><span class="text-red">*</span>
                                        <input type="button" class="form-control image-preview-filename" disabled="disabled">
                                        <input type="hidden" name="old_image" value="<?php echo $productInfo->product_image; ?>">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                <span class="fa fa-remove"></span>Clear
                                            </button>
                                            <div class="btn btn-primary image-preview-input">
                                                <span class="fa fa-repeat"></span>
                                                <span class="image-preview-input-title">File Browse</span>
                                                <input type="file" accept="image/png, image/jpeg, image/gif" id="product_image" name="product_image"/>
                                            </div>
                                        </span>
                                        <img src="<?php echo base_url('uploads/products/'.$productInfo->product_image); ?>" width="80" height="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <button type="button" class="btn btn-primary" value="Back" onclick="goBack()">Back</button>
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </section>
</div>
<?php $this->load->view('admin/includes/footer'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#product").validate({
            rules: {
                category_id: "required",
                product_name: "required",
                quantity: "required",
                weight: "required",
                price: "required"
            },
        });
    });

    function goBack() {
        window.history.back();
    }
</script>

