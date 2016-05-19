    <?php $this->load->view('common/header'); ?>
<!-- /.site-header -->   
    <div class="container">
        <div>
        <p>sdfsf</p>
            <?php 
            // if(validation_errors()){
                // echo validation_errors();
            print_r(validation_errors());
            // }
        ?>
        </div>
    </div>
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
                        <div class="form-bottom">
                            <!-- <form role="form" action="" method="post" class="registration-form"> -->
                            <?php echo form_open(); ?>
                                <div class="form-group">
                                    
                                    <?php 
                                    echo form_label('First Name', 'form-first-name');
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
                                        'type'      => 'password`',
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
                                        'type'      => 'password`',
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



    <!-- begin The Footer -->
    <?php $this->load->view('common/footer');
