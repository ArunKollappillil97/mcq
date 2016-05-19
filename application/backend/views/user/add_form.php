  <?php 
  	$this->load->view('common/header');
  	$this->load->view('common/sidebar');
  ?>
  <!-- Content Header (Page header) -->
<section class="content content-header box box-warning">
    <h1> Advanced Form Elements <small>Preview</small></h1>

          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Advanced Elements</li>
          </ol>

	<div class="row">
		<div class="col-xs-12">
			<div class="box-header">
				<a href="<?php echo base_url(); ?>user/index" class="btn btn-primary pull-right">View User</a>
			</div>
		</div>
	</div>
	 <?php
       $success = $this->session->flashdata('success') ; 
       $error = $this->session->flashdata('error') ;
       if($success){
       ?>
        <div class="alert alert-success" role="alert"><?php echo $success ;?></div>
        <?php } 
       if($error){
       ?>

       <div class="alert alert-danger" role="alert"><?php echo $error ;?></div>

       <?php } ?>

       <?php if(validation_errors()){ ?> <div class="alert alert-warning" role="alert">
<?php echo validation_errors(); ?></div> <?php } ?>

	<div class="row">
		<div class="box box-warning">
			<div class="box-body">

				<?php echo form_open_multipart("");?>
				
					<div class="box-header with-border">
	                  <h3 class="box-title">Add New User Form</h3>
	                </div><!-- /.box-header -->
					<div class="col-md-4 col-sm-6">
						<div class="form-group">
	                      <?php
	                      	echo form_label('First Name', 'first-name'); 		                      
						    $form_input = array(
						        'name' => 'first_name',
						        'type' => 'text',
						        'class' =>'form-control ', 
						        'value' => $first_name, 
						        'required' => 'required',
						        'placeholder'=>'First Name'
						    );
						    echo form_input($form_input); 
						    ?>
	                    </div>
					</div>
					
					<div class="col-md-4 col-sm-6">
						<div class="form-group">
	                      <?php 	
	                      	echo form_label('Last Name', 'last-name');	                      
						    $form_input = array(
						        'name' => 'last_name',
						        'type' => 'text',
						        'class' =>'form-control ', 
						        'value' => $last_name, 
						        'required' => 'required',
						        'placeholder'=>'Last Name'
						    );
						    echo form_input($form_input); 
						    ?>
	                    </div>
					</div>

					<div class="col-md-4 col-sm-6">
						<div class="form-group">
	                      <?php 		 
	                      	echo form_label('User Name', 'user-name');                     
						    $form_input = array(
						        'name' => 'username',
						        'type' => 'text',
						        'class' =>'form-control ', 
						        'value' => $username, 
						        'required' => 'required',
						        'placeholder'=>'User Name'
						    );
						    echo form_input($form_input); 
						    ?>
	                    </div>
					</div>

					<div class="col-md-4 col-sm-6">
						<div class="form-group">
	                      <?php 		
	                      	echo form_label('User Email', 'email');                      
						    $form_input = array(
						        'name' => 'email',
						        'type' => 'text',
						        'class' =>'form-control ', 
						        'value' => $email, 
						        'required' => 'required',
						        'placeholder'=>'User Email'
						    );
						    echo form_input($form_input); 
						    ?>
	                    </div>
					</div>

					<div class="col-md-4 col-sm-6">
						<div class="form-group">
	                      <?php 		
	                      	echo form_label('User Password', 'user-password');                      
						    $form_input = array(
						        'name' => 'password',
						        'id' => 'password',
						        'type' => 'text',
						        'class' =>'form-control ', 
						        'value' => '', 
						        'placeholder'=>'User Password'
						    );
						    echo form_input($form_input); 
						    ?>
	                    </div>
					</div>

					<div class="col-md-4 col-sm-6">
						<div class="form-group">
	                      <?php 		        
	                      	echo form_label('Confirm Password', 'confirm-password');              
						    $form_input = array(
						        'name' => 'confirm_password',
						        'id' => 'confirm_password',
						        'type' => 'text',
						        'class' =>'form-control ', 
						        'value' => '', 
						        'placeholder'=>'Confirm Password'
						    );
						    echo form_input($form_input); 
						    ?>
	                    </div>
					</div>

					
					<div class="col-md-6 col-sm-6">
						<div class="form-group">
							<div class="radio">
								<?php 
								$admin = array(
									'type'		=> 'radio',
							    	'name'      => 'user_role',
							    	'id'        => 'user_role',
							    	'value'     => '1',
							    	'checked'   => ''
							    	);

								echo form_label(form_checkbox($admin).' Admin ', '', array('style' => 'margin-right: 20px'));
								?>
								<!-- </div>
								<div class="radio"> -->
								<?php 
							    $examinee = array(
							    	'type'		=> 'radio',
							    	'name'      => 'user_role',
							    	'id'        => 'user_role2',
							    	'value'     => '5',
							    	'checked'   => TRUE							    	
							    	);

								echo form_label(form_checkbox($examinee).' Examinee');
								?>
							</div>
						</div>
					</div>

			
					<div class="col-md-12">
						<hr>
						<?php
						$form_input = array(
				        'name' => 'submit',
				        'class' =>'btn btn-success pull-right', 
				        'value' => $submit
				    	);
						 echo form_submit($form_input); 
						?>	
					</div>
									
				
			</div>

        </div><!-- /.box-body -->
  	</div><!-- /.box -->
</section>

<script src="http://localhost/serabazarbd/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>

<script type="text/javascript">
$('form').validate({    
    rules: {
        password: {
            minlength: 3,
            maxlength: 15,
            required: true
        },
        confirm_password: {
            minlength: 3,
            maxlength: 15,
            required: true
        }
    },
    highlight: function(element) {
        var id_attr = "#" + $( element ).attr("id") + "1";
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        $(id_attr).removeClass('glyphicon-ok').addClass('glyphicon-remove');         
    },
    unhighlight: function(element) {
        var id_attr = "#" + $( element ).attr("id") + "1";
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        $(id_attr).removeClass('glyphicon-remove').addClass('glyphicon-ok');         
    },
    errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.length) {
                error.insertAfter(element);
            } else {
            error.insertAfter(element);
            }
        } 
 });
</script>

<?php $this->load->view('common/footer'); ?>