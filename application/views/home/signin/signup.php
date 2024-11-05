<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Fruitables - Vegetable Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
         <link href="<?php echo base_url(); ?>fassets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>fassets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="<?php echo base_url(); ?>fassets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="<?php echo base_url(); ?>fassets/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>fassets/css/toastr.min.css" rel="stylesheet" />
    </head>

    <body>
        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->

        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="p-5 bg-light rounded">
                    <div class="row g-4 justify-content-center">
                        <div class="col-12">
                            <div class="text-center mx-auto" style="max-width: 700px;">
                                <a href="<?php echo base_url(); ?>home"><h1 class="text-primary">Signup/Register</h1></a>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <form action="<?php echo base_url(); ?>register" class="" method="POST" id="signup">
                                <input type="name" name="name" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Name">
                                <input type="email" name="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Email">
                                <input type="phone" name="phone" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Phone No">
                                <input type="password" name="password" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Password">
                                <div class="row">
                                    <div class="col">
                                        <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary" type="submit">Submit</button>
                                    </div>
                                    <div class="col">
                                        <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary" type="button">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->
        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>fassets/lib/easing/easing.min.js"></script>
        <script src="<?php echo base_url(); ?>fassets/lib/waypoints/waypoints.min.js"></script>
        <script src="<?php echo base_url(); ?>fassets/lib/lightbox/js/lightbox.min.js"></script>
        <script src="<?php echo base_url(); ?>fassets/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="<?php echo assets_url(); ?>fassets/js/toastr.min.js"></script>
        <script src="<?php echo assets_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
        <script src="<?php echo assets_url(); ?>assets/js/validation.js" type="text/javascript"></script>

        <!-- Template Javascript -->
        <script src="<?php echo base_url(); ?>fassets/js/main.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#signup").validate({
                    rules: {
                        name: "required",
                        phone: { required: true, digits: true, rangelength: [10, 10] },
                        email : { required: true, email : true },
                        password: "required"
                    },
                });
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
                toastr.success('<?php echo $this->session->flashdata('success'); ?>')
            <?php } ?>
        
            <?php 
            if($this->session->flashdata('error') || $this->session->flashdata('errors')) { 
                if(is_array($this->session->flashdata('errors'))){
                    $validation_errors = array_unique($this->form_validation->error_array()); 
                    foreach ($validation_errors as $validation_error) { ?>
                            toastr.error('<?php echo $validation_error; ?>')
            <?php 
            } 
            } else { 
            ?>
                        toastr.error('<?php echo $this->session->flashdata('error'); ?>')
            <?php 
            } 
            } 
            ?>
        </script>
    </body>

</html>