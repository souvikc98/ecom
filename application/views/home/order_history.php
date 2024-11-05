<?php $this->load->view('home/includes/header'); ?>
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Order Details</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
        <li class="breadcrumb-item active text-white">Order Details</li>
    </ol>
</div>
<!-- Single Page Header End -->
<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Order Id</th>
                        <th scope="col">Price</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($orderHistory)) { foreach ($orderHistory as $value) { ?>
                    <tr>
                        <td>
                            <?php echo $value->order_id; ?>
                        </td>
                        <td>
                            <?php echo '₹ <strong>'. $value->total_amount.'</strong>'; ?>
                        </td>
                        <td class="text-center">
                            <a href="<?php echo base_url().'order-details/'.base64_encode($value->order_id); ?>" class="btn btn-primary btn-sm">View</a>
                        </td>

                    </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Cart Page End -->
<?php $this->load->view('home/includes/footer'); ?>