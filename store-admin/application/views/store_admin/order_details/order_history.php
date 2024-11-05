<?php $this->load->view('store_admin/includes/header'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa"></i> Order
        <small>History</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> Order List</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th class="text-center">Order Id</th>
                            <th class="text-center">Order Price</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        <?php
                        if(!empty($orderHistory)) { foreach($orderHistory as $value) { ?>
                            <tr>
                                <td class="text-center"><?php echo $value->order_id; ?></td>
                                <td class="text-center"><?php echo $value->total_amount; ?></td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-info" href="<?php echo base_url().'Billing/orderDetails/'.base64_encode($value->order_id); ?>" title="View"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php } } ?>
                    </table> 
                </div>
                <div class="box-footer">
                    <button type="button" class="btn btn-primary" value="Back" onclick="goBack()">Back</button>
                </div>
              </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('store_admin/includes/footer'); ?>
<script type="text/javascript">
    function goBack() {
        window.history.back();
    }
</script>
