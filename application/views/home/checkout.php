<?php $this->load->view('home/includes/header'); ?>
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Checkout</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
        <li class="breadcrumb-item active text-white">Checkout</li>
    </ol>
</div>
<!-- Single Page Header End -->
<!-- Checkout Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">Billing details</h1>
        <form action="<?php echo base_url(); ?>place-order" method="POST" enctype="multipart/form-data" id="checkout_page">
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Name<sup>*</sup></label>
                                <input type="text" class="form-control" name="buyer_name">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Address<sup>*</sup></label>
                                <input type="text" class="form-control" name="buyer_address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Landmark<sup>*</sup></label>
                                <input type="text" class="form-control" name="landmark">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Postcode/Zip<sup>*</sup></label>
                                <input type="text" class="form-control" name="pin">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Mobile<sup>*</sup></label>
                                <input type="text" class="form-control" name="phone">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Email Address<sup>*</sup></label>
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Products</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php if (!empty($checkoutInfo)) { foreach ($checkoutInfo as $value) { ?>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center mt-2">
                                            <img src="<?php echo base_url().'uploads/products/'.$value->product_image; ?>" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                        </div>
                                    </th>
                                    <td class="py-5">
                                    	<?php echo $value->product_name; ?>
                                    	<input type="hidden" value="<?php echo $value->pid; ?>" name="p_id[]">
                                    </td>
                                    <td class="py-5">
                                    	<?php echo '₹ '.$value->product_price; ?>
                                    </td>
                                    <td class="py-5">
                                    	<?php echo $value->quantity; ?>
                                    	<input type="hidden" value="<?php echo $value->quantity; ?>" name="p_qty[]">
                                    </td>
                                    <td class="py-5">
                                    	<?php echo '₹ '.$value->price; ?>
                                    	<input type="hidden" value="<?php echo $value->price; ?>" name="p_total_price[]">
                                    </td>
                                </tr>
                                <?php } } ?>
                                <tr>
                                    <th scope="row">
                                    </th>
                                    <td class="py-5">
                                        <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                    </td>
                                    <td class="py-5"></td>
                                    <td class="py-5"></td>
                                    <td class="py-5">
                                        <div class="py-3 border-bottom border-top">
                                            <p class="mb-0 text-dark">
                                            	<?php $totalPrice = 0;
				                                foreach ($checkoutInfo as $item) {
				                                    $totalPrice += $item->price;
				                                }
				                                echo '₹ <strong>'.$totalPrice.'</strong>';
				                                ?>
				                            </p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center pt-4">
					    <button type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place Order</button>
					</div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Checkout Page End -->
<?php $this->load->view('home/includes/footer'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#checkout_page").validate({
            rules: {
                buyer_name: "required",
                buyer_address: "required",
                landmark: "required",
                pin: { required: true, digits: true, rangelength: [6, 6] },
                phone: { required: true, digits: true, rangelength: [10, 10] },
                email: { required: true, email: true }
            },
        });
    });
</script>