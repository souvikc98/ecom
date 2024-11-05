<?php $this->load->view('home/includes/header'); ?>
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Success Page</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active text-white">Success Page</li>
    </ol>
</div>
<div class="container-fluid py-5">
    <div class="container py-5 text-center">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <i class="bi bi-exclamation-triangle display-1 text-secondary"></i>
                <h1 class="display-1">Order Id: <?php echo $orderId; ?></h1>
                <h1 class="mb-4">Hurraayyyyy!!!!!!</h1>
                <p class="mb-4">Your order Has been successfully placed</p>
                <a class="btn border-secondary rounded-pill py-3 px-5" href="<?php echo base_url(); ?>home">Go Back To Home</a>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('home/includes/footer'); ?>