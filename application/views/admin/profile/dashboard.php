<?php $this->load->view('admin/includes/header'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
        <small>Control panel</small>
      </h1>
    </section>
    <section class="content">
      <div class="row">
          <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>Category</h3>
              <p>Details</p>
            </div>
            <div class="icon">
              <i class="fa fa-phone"></i>
            </div>
            <a href="<?php echo base_url(); ?>categories" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Product</h3>
              <p>Management</p>
            </div>
            <div class="icon">
              <i class="fa fa-product-hunt"></i>
            </div>
            <a href="<?php echo base_url(); ?>products" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </section>
    
</div>
<?php $this->load->view('admin/includes/footer'); ?>