<?php $this->load->view('store_admin/includes/header'); ?>
<div class="content-wrapper">
    <section class="content">
        <div class="alert alert-success text-center">
            <h3>Order ID: <?php echo $orderId; ?></h3>
            <p>Your order has been successfully placed.</p>
        </div>
    </section>
</div>
<?php $this->load->view('store_admin/includes/footer'); ?>