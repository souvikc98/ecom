<?php $this->load->view('admin/includes/header'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa"></i> Online Order
            <small>Details</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="order-id">
                <strong>Order ID: <?php echo $buyerDetails->order_id; ?></strong>
            </div>
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th class="text-center">Products</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Weight</th>
                                <th class="text-center">Total</th>
                            </tr>
                            <?php if(!empty($orderDetails)) { foreach($orderDetails as $value) { ?>
                            <tr class="intro-x">
                                <td class="w-70 border">
                                    <div class="flex">
                                        <div class="w-full h-20 my-5 image-fit">
                                            <img alt="Image" data-action="zoom" class="w-full" src="<?php echo base_url().'uploads/products/'.$value->product_image; ?>" style="width: 50px; height: 50px; object-fit: cover;">
                                        </div>
                                    </div>
                                </td>
                                <td class="border font-medium whitespace"><?php echo $value->product_name; ?></td>
                                <td class="border font-medium whitespace-no-wrap"><?php echo '₹ '.$value->product_price; ?></td>
                                <td class="border font-medium whitespace-no-wrap"><?php echo $value->p_qty; ?></td>
                                <td class="border font-medium whitespace-no-wrap"><?php echo $value->weight; ?></td>
                                <td class="border font-medium whitespace-no-wrap"><?php echo '₹ '.$value->p_total_price; ?></td>
                            </tr>
                            <?php } } ?>
                        </table> 
                        <div class="buyer-details mt-4 p-3 bg-light border rounded">
                            <h4 class="mb-3">Buyer Details</h4>
                            <p><strong>Name:</strong> <?php echo $buyerDetails->buyer_name; ?></p>
                            <?php if(!empty($buyerDetails->email)) { ?>
                                <p><strong>Email:</strong>  <?php echo $buyerDetails->email; 
                            } ?></p>
                            <p><strong>Phone:</strong> <?php echo $buyerDetails->phone; ?></p>
                            <?php if(!empty($buyerDetails->email)) { ?>
                                <p><strong>Address:</strong> <?php echo $buyerDetails->buyer_address; 
                            } ?></p>
                            <?php if(!empty($buyerDetails->landmark)) { ?>
                                <p><strong>Landmark:</strong> <?php echo $buyerDetails->landmark; 
                            } ?></p>
                            <?php if(!empty($buyerDetails->landmark)) { ?>
                                <p><strong>Pincode:</strong> <?php echo $buyerDetails->pin; 
                            } ?></p>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="button" class="btn btn-primary" value="Back" onclick="goBack()">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('admin/includes/footer'); ?>
<script type="text/javascript">
    function goBack() {
        window.history.back();
    }
</script>
