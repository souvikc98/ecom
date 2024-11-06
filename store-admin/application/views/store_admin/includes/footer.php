    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b> ECOMMERCE</b> Admin System
        </div>
        <strong>Copyright &copy; 2024 <a href="<?php echo base_url(); ?>dashboard">Admin Portal</a>.</strong> All rights reserved  <body><b id="txt"></b></body> 
    </footer>
    
    <script src="<?php echo assets_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo assets_url(); ?>assets/dist/js/adminlte.min.js" type="text/javascript"></script>
    <!-- <script src="<?php echo assets_url(); ?>assets/dist/js/pages/dashboard.js" type="text/javascript"></script> -->
    <script src="<?php echo assets_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo assets_url(); ?>assets/js/validation.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/summernote/summernote.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/inilabs.js'); ?>"></script>
    <script src="<?php echo assets_url(); ?>assets/js/toastr.min.js"></script>
    <script src="<?php echo assets_url(); ?>assets/js/sweetalert2.min.js"></script>
    <script type="text/javascript"> var baseURL = "<?php echo base_url(); ?>"; </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#description').summernote({
                height: 100,
                width: 660
            });
            toastr.options = {
                "closeButton": true,
                "allowHtml": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "500",
                "hideDuration": "500",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            <?php if($this->session->flashdata('success')){ ?>
                toastr.success(`<?php echo $this->session->flashdata('success'); ?>`)
            <?php } ?>

            <?php 
                if($this->session->flashdata('error') || $this->session->flashdata('errors')) { 
                    if(is_array($this->session->flashdata('errors'))){
                        $validation_errors = array_unique($this->form_validation->error_array()); 
                        foreach ($validation_errors as $validation_error) { ?>
                            toastr.error(`<?php echo $validation_error; ?>`)
            <?php 
                        } 
                    } else { 
            ?>
                        toastr.error(`<?php echo $this->session->flashdata('error'); ?>`)
            <?php 
                    } 
                } 
            ?>

            $('#delete_btn').on('click',function(e){
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = $('#delete_btn').attr('href');
                    }
                })
            });
        });
    </script>
    </body>
</html>