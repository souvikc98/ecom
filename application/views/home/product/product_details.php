<?php $this->load->view('home/includes/header'); ?>       
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Product Details</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
        <li class="breadcrumb-item active text-white">Product Details</li>
    </ol>
</div>
<!-- Single Page Header End -->


<!-- Single Product Start -->
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-8 col-xl-9">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="border rounded">
                            <a href="#">
                                <img src="<?php echo base_url().'uploads/products/'.$product->product_image; ?>" class="img-fluid rounded" alt="Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-3"><?php echo $product->product_name; ?></h4>
                        <p class="mb-3">Category: <?php echo $product->category_name; ?></p>
                        <p class="mb-3">Current Stock: <?php echo $product->quantity.' '.$product->weight; ?></p>
                        <h5 class="fw-bold mb-3"><?php echo 'Rs. '.$product->price.' / '. $product->weight; ?> </h5>
                        <p class="mb-4"><?php echo $product->description; ?></p>
                        
                        <a href="<?php echo base_url().'addToCart/'.base64_encode($product->id); ?>" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Single Product End -->
<?php $this->load->view('home/includes/footer'); ?>