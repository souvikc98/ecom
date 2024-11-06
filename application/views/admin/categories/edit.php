<?php $this->load->view('admin/includes/header'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-product-hunt"></i> Category
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
                    <form role="form" enctype='multipart/form-data' action="<?php echo base_url() ?>editcategoryinfo" method="post" id="Category" role="form">
                        <input type="hidden" value="<?php echo $categoryInfo->id; ?>" name="category_id" id="category_id" />
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-10">                                
                                    <div class="form-group">
                                        <label for="category">Category Name</label><span class="text-red">*</span>
                                        <input type="text" class="form-control required" value="<?php echo $categoryInfo->category_name; ?>" id="category" name="category_name">
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
        $("#Category").validate({
            rules: {
                category: "required"
            },
        });
    });

    function goBack() {
        window.history.back();
    }
</script>

