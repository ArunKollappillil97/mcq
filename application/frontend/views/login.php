    <?php $this->load->view('common/header'); ?>
<!-- /.site-header -->   
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="col-md-12">
                    <div class="row">

                       <section class="widget-main" id="login">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-wrap">
                                        <h1>Log in with your email account</h1>
                                            <?php echo form_open(); ?>
                                                <div class="form-group">
                                                    <label for="email" class="sr-only">Email</label>
                                                    <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                                                </div>
                                                <div class="form-group">
                                                    <label for="key" class="sr-only">Password</label>
                                                    <input type="password" name="key" id="key" class="form-control" placeholder="Password">
                                                </div>
                                                <div class="checkbox">
                                                    <span class="character-checkbox" onclick="showPassword()"></span>
                                                    <span class="label">Show password</span>
                                                </div>
                                                <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
                                            <?php echo form_close(); ?>
                                            
                                            <p class="pull-left">Don't Have an Account <a href="<?php echo base_url(); ?>register">Register</a> Please </p>
                                            <a href="javascript:;" class="forget pull-right" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a>
                                            
                                            <hr>
                                        </div>
                                    </div> <!-- /.col-xs-12 -->
                                </div> <!-- /.row -->
                            </div> <!-- /.container -->
                        </section>


<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Recovery password</h4>
            </div>
            <div class="modal-body">
                <p>Type your email account</p>
                <input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-custom">Recovery</button>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->



                        <script type="text/javascript">
                            function showPassword() {
    
                                var key_attr = $('#key').attr('type');
                                
                                if(key_attr != 'text') {
                                    
                                    $('.checkbox').addClass('show');
                                    $('#key').attr('type', 'text');
                                    
                                } else {
                                    
                                    $('.checkbox').removeClass('show');
                                    $('#key').attr('type', 'password');
                                    
                                }
                                
                            }
                        </script>
                    </div> <!-- end: row -->
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
