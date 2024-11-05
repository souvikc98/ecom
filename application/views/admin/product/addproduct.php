<?php $this->load->view('admin/includes/header'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-product-hunt"></i> Product
        <small>Add</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->            
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="product" enctype='multipart/form-data' action="<?php echo base_url() ?>addproduct" method="POST" accept-charset="utf-8">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control select2" style="width: 100%;" id="category_id" name="category_id">
                                            <option value="">Please Select</option>
                                            <?php if (!empty($categories)) { foreach ($categories as $cat) { ?>
                                                <option value="<?php echo $cat->id; ?>"><?php echo $cat->category_name; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">                                
                                    <div class="form-group">
                                        <label for="title">Product Name</label><span class="text-red">*</span>
                                        <input type="text" class="form-control required" id="product_name" name="product_name" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group" id="area">
                                        <label for="description">Description</label><span class="text-red">*</span>
                                        <textarea class="form-control required" id="description" name="description" placeholder="Write your text here"></textarea>
                                    </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-4">                                
                                    <div class="form-group">
                                        <label for="title">Product Quantity</label><span class="text-red">*</span>
                                        <input type="text" class="form-control required" id="quantity" name="quantity" >
                                    </div>
                                </div>
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label>Product Weight</label>
                                        <select class="form-control select2" style="width: 100%;" id="weight" name="weight">
                                            <option value="">Please Select</option>
                                            <option value="kg">KG</option>
                                            <option value="gram">Gram</option>
                                            <option value="liter">Liter</option>
                                            <option value="dozen">Dozen</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">                                
                                    <div class="form-group">
                                        <label>Product Price</label>
                                        <input type="text" class="form-control required" id="price" name="price" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">                                
                                    <div class="form-group">
                                        <label for="product_image">Image</label><span class="text-red">*</span>
                                        <input type="file" class="form-control image-preview-filename" name="product_image" id="image" multiple>
                                    </div>
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
<?php $this->load->view('admin/includes/footer'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#product").validate({
            rules: {
                category_id: "required",
                product_name: "required",
                quantity: "required",
                weight: "required",
                price: "required",
                product_image: "required"
            },
        });
    });

    function goBack() {
        window.history.back();
    }
</script>
