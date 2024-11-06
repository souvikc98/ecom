<?php $this->load->view('home/includes/header'); ?>
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Cart</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
        <li class="breadcrumb-item active text-white">Order Details</li>
    </ol>
</div>
<!-- Single Page Header End -->
<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="order-id">
            <strong>Order ID: <?php echo $buyerDetails->order_id; ?></strong>
        </div>
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
                    <?php if (!empty($orderDetails)) { foreach ($orderDetails as $value) { ?>
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
                        </td>
                        <td>
                            <div class="input-group quantity mt-4" style="width: 100px;">
                                <p class="mb-0 mt-4"><?php echo $value->p_qty; ?></p>
                            </div>
                        </td>
                        <td>
                            <p class="mb-0 mt-4"><?php echo '₹ '.$value->p_total_price; ?></p>
                        </td>
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
        <div class="row g-4 justify-content-between">
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded">
                    <div class="p-4">
                        <h5 class="mb-4">Buyer Details</h5>
                        <p class="mb-1"><strong>Name:</strong> <?php echo $buyerDetails->buyer_name; ?></p>
                        <p class="mb-1"><strong>Email:</strong> <?php echo $buyerDetails->email; ?></p>
                        <p class="mb-1"><strong>Phone:</strong> <?php echo $buyerDetails->phone; ?></p>
                        <p class="mb-1"><strong>Address:</strong> <?php echo $buyerDetails->buyer_address; ?></p>
                        <p class="mb-1"><strong>Landmark:</strong> <?php echo $buyerDetails->landmark; ?></p>
                        <p class="mb-1"><strong>Pincode:</strong> <?php echo $buyerDetails->pin; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded">
                    <div class="p-4">
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0 me-4">Order Total:</h5>
                            <p class="mb-0">
                                <?php 
                                $totalPrice = 0;
                                foreach ($orderDetails as $item) {
                                    $totalPrice += $item->p_total_price;
                                }
                                echo '₹ <strong>'.$totalPrice.'</strong>';
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Page End -->
<?php $this->load->view('home/includes/footer'); ?>