<?php $this->load->view('admin/includes/header'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-product-hunt"></i> Product
        <small>Details</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>add"><i class="fa fa-plus"></i> Add Product</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>products" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>#</th>
                            <th class="text-center">Category Name</th>
                            <th class="text-center">Product Name</th>
                            <th class="text-center">Current Quantity</th>
                            <th class="text-center">Create Date</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        <?php if(!empty($products)) {$i=1; foreach($products as $product) { ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td class="text-center"><?php echo $product->category_name; ?></td>
                            <td class="text-center"><?php echo $product->product_name; ?></td>
                            <td class="text-center"><?php echo $product->quantity.' '.$product->weight; ?></td>
                            <td class="text-center"><?php echo $product->created_at; ?></td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-info" href="<?php echo base_url().'editproduct/'.base64_encode($product->id); ?>" title="Edit"><i class="fa fa-pencil"></i></a> |
                                <a class="btn btn-sm btn-danger" href="<?php echo base_url().'deleteproduct/'.base64_encode($product->id); ?>" title="Delete" id="delete_btn"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $i++; } } ?>
                    </table>
                </div>
                
              </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('admin/includes/footer'); ?>
