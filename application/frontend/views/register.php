    <?php $this->load->view('common/header'); ?>
<!-- /.site-header -->   
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
                                    <label class="sr-only" for="form-first-name">First name</label>
                                    <input type="text" name="first_name" placeholder="First name..." class="form-first-name form-control" id="form-first-name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="last_name">Last name</label>
                                    <input type="text" name="last_name" placeholder="Last name..." class="form-last-name form-control" id="form-last-name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-email">Email</label>
                                    <input type="text" name="email" placeholder="Email..." class="form-email form-control" id="form-email">
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="form-email">Password</label>
                                    <input type="text" name="password" placeholder="Password" class="form-email form-control" id="form-email">
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="form-email">Confirm Password</label>
                                    <input type="text" name="confirm_password" placeholder="Confirm Password" class="form-email form-control" id="form-email">
                                </div>


                                <div class="form-group">
                                    <label class="sr-only" for="form-about-yourself">About yourself</label>
                                    <textarea name="about_yourself" placeholder="About yourself..." 
                                                class="form-about-yourself form-control" id="form-about-yourself"></textarea>
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
