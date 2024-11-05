<?php $this->load->view('home/includes/header'); ?>
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Products</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
        <li class="breadcrumb-item active text-white">Products</li>
    </ol>
</div>
<!-- Single Page Header End -->


<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-4 justify-content-center">
                            <?php if (!empty($products)) { foreach ($products as $product) { ?>                            
                                <div class="col-md-6 col-lg-3 col-xl-3"> <!-- Change col-lg-6 to col-lg-3 for 4 items per row -->
                                    <div class="rounded position-relative fruite-item">
                                        <a href="<?php echo base_url().'product-details/'.base64_encode($product->id); ?>">
                                            <div class="fruite-img">
                                                <img src="<?php echo base_url().'uploads/products/'.$product->product_image; ?>" class="img-fluid w-100 rounded-top" alt="">
                                            </div>
                                        </a>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;"><?php echo $product->category_name; ?></div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <h4><?php echo $product->product_name; ?></h4>
                                            <p><?php echo limit_text($product->description, 50); ?></p>
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-0"><?php echo 'Rs. '.$product->price.' / '. $product->weight; ?></p>
                                                <a href="<?php echo base_url().'addToCart/'.base64_encode($product->id); ?>" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Fruits Shop End-->
<?php $this->load->view('home/includes/footer'); ?>