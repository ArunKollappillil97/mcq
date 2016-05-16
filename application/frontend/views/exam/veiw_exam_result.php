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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
        <!-- Page Content -->
        <div id="page-content-wrapper" class="min_height">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <?php 
                        // echo "<pre>";
                        // print_r($question_number_list);
                        // exit();
                        
                            $total_correct_answer   = 0;
                            $total_wrong_answer     = 0;
                            $total_missing_answer   = 0;
                            foreach ($question_number_list as $value) {

                                if($value['correct_answer']!=NULL && $value['answered_option_id']!=NULL) {
                                    $total_correct_answer+=1;
                                }

                                if($value['wrong_answer']!=NULL) {
                                    $total_wrong_answer= $total_wrong_answer + 1;
                                    // echo "Wrong Answer : ".$value['wrong_answer']."<br>";

                                }

                                if($value['answered_option_id']!=NULL) {
                                    $total_missing_answer = $total_missing_answer + 1;
                                    // echo "Missing Answer : ".$value['answered_option_id']."<br>";
                                    
                                }

                                
                            }

                         ?>
                        <p> Total Number of Question : <?php echo $number_of_question; ?></p>
                        <p> Total Correct Answer of Out of Question : <?php echo $total_correct_answer; ?> </p>
                        <p> Total Wrong Answer of Out of Question : <?php echo $total_wrong_answer; ?> </p> 
                        <p> Total Missing Answer of Out of Question : <?php echo $total_missing_answer; ?> </p>
                        <p> Finish The Exam withing Time : <?php echo $total_correct_answer; ?> </p>
                    </div>
                    <div class="col-lg-12">
                        <h1>Exam List</h1>
                        
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-8">
                        <div class="widget-main-title">
                            <h4 class="widget-title">Generel Knowledge</h4>
                        </div>
                        <div class="widget-inner multiple_choise">
                            <?php 

                            // echo "<pre>";
                            // print_r($question_number_list);
                            // echo "</pre>";
                            // exit();
                            
  
                            foreach ($question_number_list as $key => $value) { 
                                $serial                 = $key+1; 
                                $question_name          = $value['question'];
                                $question_id            = $value['id'];
                                $answered_option_id     = $value['answered_option_id'];
                                $wrong_answer           = $value['wrong_answer'];

                            ?>
                            <p><?php echo $serial.". "; echo $question_name; ?></p>

                            <ul>
                            <?php 
                            $option_list = $this->common_model->selectAllWhere('tbl_option', array('question_id' => $question_id));


                            foreach ($option_list as $key => $value) { 
                                $option_id = $value->id;

                            ?>
                            
                            <?php //echo $value->id; ?><li class="<?php 
                                if($value->ans) echo "right "; 
                                if($wrong_answer == $option_id) echo "wrong"; 

                                ?>"><input type="radio" name="option" value="<?php echo $value->id; ?>" disabled><?php echo $value->option_name; ?></li>
                                <?php } ?>
                                

                            </ul>
                            <hr>
                            <?php } ?>
                            
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