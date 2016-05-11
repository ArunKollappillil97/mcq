<?php $this->load->view('common/header'); ?>

<!-- ***********   Start Main Content 	************** -->
<div class="container" id="wrapper">
    <div class="row">
        <div class="col-md-12">
	<div class="widget-main">
        <!-- Sidebar -->
        <div id="sidebar-wrapper" class="min_height">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#" id="menu-toggle">
                        My Account
                    </a>
                </li>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#">Shortcuts</a>
                </li>
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper" class="min_height">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Exam List</h1>
                        
                    </div>

                    <div class="col-md-12">
                    	<table class="table responsive">
                    		<thead>
                    			<th>#</th>
                    			<th>Number of Question</th>
                    			<th>Exam Status</th>
                    			<th>Exam Created Date</th>
                    			<th>Total Time</th>
                    			<th>Result</th>
                    			<th>Action</th>
                    		</thead>

                    		<tbody>
                    			<?php $i = 1; foreach ($exam_list as $key => $value) { ?>
                    				
                    			<tr>
                    				<td><?php echo $i; ?></td>
                    				<td><?php echo $value->number_of_question; ?></td>
                    				<td><?php echo $value->exam_status; ?></td>
                    				<td><?php echo $value->date; ?></td>
                    				<td><?php echo $value->exam_end_time; ?></td>
                    				<td><?php echo $value->result; ?></td>
                    				<td>
                                    <!-- <a href="<?php echo base_url() ?>exam/take_exam/<?php echo $value->id; ?>" class="btn btn-primary">Take Exam</a> -->
									<a href="<?php echo base_url() ?>exam/exam_process/<?php echo $value->id; ?>" class="btn btn-primary">Take Exam</a>
                    				</td>
                    			</tr>

                    			<?php $i++; } ?>

                    		</tbody>
                    	</table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
        </div>

    </div>
    </div>
    </div>
    <!-- /#wrapper -->

    

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>





<!-- ***********   End Main Content 	************** -->
<script>

    var min_height = screen.height - 444;
    // document.getElementsByClassName("min_height").style.minHeight = min_height+"px";
    $('.min_height').css('min-height', min_height);

</script>

<?php $this->load->view('common/footer'); ?>