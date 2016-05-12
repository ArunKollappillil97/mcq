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
                        <div class="col-md-8">
                        <div class="widget-main-title">
                            <h4 class="widget-title">Generel Knowledge</h4>
                        </div>
                        <div class="widget-inner multiple_choise">
                            <?php $serial = $exam_question_id+1; ?>
                            <p><?php echo $serial.". "; echo $exam_question['question']; ?></p>

                            <ul>
                            <?php 
                            $option_list = $this->common_model->selectAllWhere('tbl_option', array('question_id' => $exam_question['id']));

                            foreach ($option_list as $key => $value) { ?>
                                <li><input type="radio" name="option" value="<?php echo $value->id; ?>"><?php echo $value->option_name; ?></li>
                                <?php } ?>
                                

                            </ul>
                            
                            <hr>
                            
                        </div>
                    </div>
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