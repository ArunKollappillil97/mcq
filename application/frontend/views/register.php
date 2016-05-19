    <?php $this->load->view('common/header'); ?>
<!-- /.site-header -->   
<style type="text/css">
.field-error .control-label,
.field-error .help-block,
.field-error .form-control-feedback {
    color: #ff0039;
}

.field-success .control-label,
.field-success .help-block,
.field-success .form-control-feedback {
    color: #2780e3;
}
</style>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="col-md-12 widget-main">
                    <div class="form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Sign up now</h3>
                                <p>Fill in the form below to get instant access:</p>
                            </div>
                           <!--  <div class="form-top-right">
                                <i class="fa fa-pencil"></i>
                            </div> -->
                        </div>
                        <div class="form-bottom" id="registration_form">
                            <!-- <form role="form" action="" method="post" class="registration-form"> -->
                            <?php echo form_open(); ?>
                                <div class="form-group">
                                    
                                    <?php 
                                    echo form_label('First Name', 'form-first-name');
                                    echo form_error('first_name'); 
                                    $form_input = array(
                                        'type'      => 'text',
                                        'name'      => 'first_name', 
                                        'class'     => 'form-first-name form-control',
                                        'id'        => 'form-first-name',
                                        'placeholder'   => 'First Name'
                                        );
                                    echo form_input($form_input);
                                    ?>
                                    
                                </div>
                                <div class="form-group">
                                    
                                    <?php 
                                    echo form_label('Last Name', 'form-last-name');
                                    $form_input = array(
                                        'type'      => 'text',
                                        'name'      => 'last_name', 
                                        'class'     => 'form-last-name form-control',
                                        'id'        => 'form-last-name',
                                        'placeholder'   => 'Last Name'
                                        );
                                    echo form_input($form_input);
                                    ?>
                                </div>

                                <div class="form-group">
                                    
                                    <?php 
                                    echo form_label('User Name', 'form-user-name');
                                    $form_input = array(
                                        'type'      => 'text',
                                        'name'      => 'username', 
                                        'class'     => 'form-last-name form-control',
                                        'id'        => 'form-last-name',
                                        'placeholder'   => 'User Name'
                                        );
                                    echo form_input($form_input);
                                    ?>
                                </div>

                                <div class="form-group">
                                    
                                    <?php 
                                    echo form_label('Email', 'email');
                                    $form_input = array(
                                        'type'      => 'email`',
                                        'name'      => 'email', 
                                        'class'     => 'email form-control',
                                        'id'        => 'email',
                                        'placeholder'   => 'Email'
                                        );
                                    echo form_input($form_input);
                                    ?>
                                </div>

                                <div class="form-group">
                                    <?php 
                                    echo form_label('Password', 'password');
                                    $form_input = array(
                                        'type'      => 'password',
                                        'name'      => 'password', 
                                        'class'     => 'password form-control',
                                        'id'        => 'password',
                                        'placeholder'   => 'Password'
                                        );
                                    echo form_input($form_input);
                                    ?>
                                </div>

                                <div class="form-group">
                                    
                                    <?php 
                                    echo form_label('Confirm Password', 'password');
                                    $form_input = array(
                                        'type'      => 'password',
                                        'name'      => 'confirm_password', 
                                        'class'     => 'confirm_password form-control',
                                        'id'        => 'confirm_password',
                                        'placeholder'   => 'Confirm Password'
                                        );
                                    echo form_input($form_input);
                                    ?>
                                </div>


                                <div class="form-group">
                                    <label class="" for="form-about-yourself"></label>
                                    <?php 
                                    echo form_label('About yourself', 'About-yourself');
                                    $form_text_area = array(
                                        'name'      => 'about_yourself', 
                                        'class'     => 'form-about-yourself form-control',
                                        'id'        => 'form-about-yourself',
                                        'placeholder'   => 'About Yourself', 
                                        'rows'      => '2'
                                        );
                                    echo form_textarea($form_text_area);
                                    ?>

                                </div>
                                <button type="submit" class="btn">Sign me up!</button>
                                <a class="pull-right" href="<?php echo base_url(); ?>login">Already Have an Account</a>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div> <!-- /.col-md-12 -->

            <div class="col-md-4">

                <div class="row">
                    <div class="col-md-12">
                        <div class="widget-item" style="height:400px;">
                            <div class="request-information">

                                <h4 class="widget-title" align="center"> Upcoming Events</h4><br>

                                <div class="list-group">
				    <a href="#" class="list-group-item"><h4  class="list-group-item-heading">35th BCS Application correction of User Id CSPVKDAL</h4></a>
				    <a href="#" class="list-group-item"><h4 class="list-group-item-heading">35th BCS Application correction of User Id CSPVKDAL</h4></a>
				    <a href="#" class="list-group-item"><h4 class="list-group-item-heading">35th BCS Application correction of User Id CSPVKDAL</h4></a>
				    <a href="#" class="list-group-item"><h4 class="list-group-item-heading">35th BCS Application correction of User Id CSPVKDAL</h4></a>
				</div>
                            </div> <!-- /.request-information -->
                        </div> <!-- /.widget-item -->

                    </div>
                </div>
                
            </div>
            
<!--            <div class="col-md-4">
                
            </div>  /.col-md-4 -->
        </div>
    </div>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script>
$(document).ready(function() {
       $('form').validate({
        rules: {
            first_name: {
                minlength: 3,
                maxlength: 15,
                required: true
            },
            last_name: {
                minlength: 3,
                maxlength: 15,
                required: true
            },

            username: {
                minlength: 6,
                maxlength: 35,
                required: true
            },

            email: {
                minlength: 10,
                maxlength: 150,
                required: true
            },

            password: {
                minlength: 6,
                maxlength: 15,
                required: true
            },

            confirm_password: {
                minlength: 6,
                maxlength: 15,
                required: true
            }




        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });

});
</script>



    <!-- begin The Footer -->
    <?php $this->load->view('common/footer');
