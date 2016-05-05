  <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Advanced Form Elements
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Advanced Elements</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

        <?php $this->load->view('common/error_message'); ?>

		<div class="row">
			<div class="col-xs-12">
				<div class="box-header">
					<a href="<?php echo base_url(); ?>question/add" class="btn btn-success pull-right">Add New Question</a>
				</div>
			</div>
		</div>


	     <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Question List</h3>
                  <div class="box-tools">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tr>
                      <th>ID</th>
                      <th>Question Name</th>
                      <th>Category</th>
                      <th>Menu</th>
                      <th class="text-right">Action</th>
                    </tr>
                    <?php
                                        
                    foreach ($question_list as $value) { ?>
                    <tr>                    
                      <td><?php echo $value->id; ?></td>
                      <td><?php echo $value->question; ?></td>
                      <td><?php echo $value->category_id; ?></td>
                      <td><?php echo $value->subject_id; ?></td>
                      
                      <td class="text-right">
                          <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-settings tiny-icon"></i>
                              Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" style="right: 0; left: auto;">

                           <li><a href="<?php echo base_url(); ?>question/edit/<?php echo $value->id; ?>" >Edit</a></li>
                           <li><a href="<?php echo base_url(); ?>question/delete/<?php echo $value->id; ?>"  onclick="return confirm('Do you want to allow him to');">Delete</a></li>
                                                             
                          
                        
                            </ul>
                          </div>
                      </td>
                    </tr>
                    <?php
                     } 
                    ?>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
