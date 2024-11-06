<?php $this->load->view('home/includes/header'); ?>
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Cart</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
        <li class="breadcrumb-item active text-white">Cart</li>
    </ol>
</div>
<!-- Single Page Header End -->
<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <?php if(!empty($cartInfo)) { ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Weight</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <form action="<?php echo base_url(); ?>update-cart" method="POST" id="cart_form">
                        <tbody>
                            <?php if (!empty($cartInfo)) { foreach ($cartInfo as $value) { ?>
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="<?php echo base_url().'uploads/products/'.$value->product_image; ?>" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4"><?php echo $value->product_name; ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4"><?php echo '₹ '.$value->product_price; ?></p>
                                    <input type="hidden" value="<?php echo $value->product_price; ?>" name="per_product_price[]">
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <input type="text" class="form-control" value="<?php echo $value->quantity; ?>" name="product_quantity[]" id="product_quantity">
                                        <input type="hidden" name="cart_id[]" value="<?php echo $value->id; ?>" />
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4"><?php echo $value->weight; ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4"><?php echo '₹ '.$value->price; ?></p>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'delete-cart/'.base64_encode($value->id); ?>" class="btn btn-md rounded-circle bg-light border mt-4">
                                        <i class="fa fa-times text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                        <tr>
                            <td colspan="6" class="text-end">
                                <button type="submit" class="btn btn-primary mt-4">
                                    Update Cart
                                </button>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>
            <div class="row g-4 justify-content-end">
                <div class="col-8"></div>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Cart Total:</h5>
                                <p class="mb-0">
                                    <?php $totalPrice = 0;
                                    foreach ($cartInfo as $item) {
                                        $totalPrice += $item->price;
                                    }
                                    echo '₹ <strong>'.$totalPrice.'</strong>';
                                    ?>
                                </p>
                            </div>
                        </div>
                        <a href="<?php echo base_url() ?>check-out" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4">Proceed Checkout</a>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div><?php echo "No Records Found"; ?></div>
        <?php } ?>
    </div>
</div>
<!-- Cart Page End -->
<?php $this->load->view('home/includes/footer'); ?>