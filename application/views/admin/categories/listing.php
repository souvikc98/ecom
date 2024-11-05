<?php $this->load->view('admin/includes/header'); ?>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-product-hunt"></i> Category
        <small>Details</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addCategoris"><i class="fa fa-plus"></i> Add Category</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>categories" method="POST" id="searchList">
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
                            <th class="text-center">Create Date</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        <?php if(!empty($categories)) {$i=1; foreach($categories as $category) { ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td class="text-center"><?php echo $category->category_name ?></td>
                            <td class="text-center"><?php echo $category->created_at ?></td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-info" href="<?php echo base_url().'editcategory/'.base64_encode($category->id); ?>" title="Edit"><i class="fa fa-pencil"></i></a> |
                                <a class="btn btn-sm btn-danger" href="<?php echo base_url().'deletecategory/'.base64_encode($category->id); ?>" title="Delete" id="delete_btn"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php $i++; } } ?>
                    </table>
                    <!-- <div class="box-footer clearfix">
                        <?php //echo $this->pagination->create_links(); ?>
                    </div> -->
                </div>
                
              </div>
            </div>
        </div>
    </section>
</div>
<?php $this->load->view('admin/includes/footer'); ?>

