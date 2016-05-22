<?php $this->load->view('common/header'); ?>

<!-- ***********   Start Main Content 	************** -->
<div class="container" id="wrapper">
    <div class="row">
        <div class="col-md-12">
	<div class="widget-main">
        <!-- Sidebar -->
        <?php $this->load->view('exam/sidebar'); ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper" class="min_height">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <?php 
                        
                            $total_answered_question   = 0;
                            $total_correct_answer   = 0;
                            $total_wrong_answer     = 0;
                            $total_missing_answer   = 0;
                            foreach ($question_number_list as $value) {

                                if($value['answered_option_id']!=0) {
                                    $total_answered_question+=1;
                                }

                                if($value['correct_answer']==$value['answered_option_id']) {
                                    $total_correct_answer+=1;
                                }

                                if($value['wrong_answer']!=NULL) {
                                    $total_wrong_answer= $total_wrong_answer + 1;
                                }

                                if($value['answered_option_id']==0) {
                                    $total_missing_answer = $total_missing_answer + 1;
                                }

                                
                            }

                         ?>
                        <p> <span class="label label-default lb-md">Total Number of Question : <?php echo $number_of_question; ?> </span></p>
                        <p> <span class="label label-primary lb-md"> Total Answered Question : <?php echo $total_answered_question; ?> </span></p>
                        <p> <span class="label label-success lb-md"> Total Right Answer : <?php echo $total_correct_answer; ?></span></p>
                        <p> <span class="label label-danger lb-md"> Total Wrong Answer : <?php echo $total_wrong_answer; ?> </span> </p> 
                        <p> <span class="label label-warning lb-md"> Total Missing Answer : <?php echo $total_missing_answer; ?> </span> </p>
                        <p> <span class="label label-success lb-md"> Finish The Exam withing Time : </span><?php //echo $total_missing_answer; ?> </span></p>
                        <hr>
                    </div>

                    <div class="col-md-6 score_board">
                        <span class="label label-primary lb-lg">Your Total Score is 20 out of 30</span>
                    </div>

                    

                    <div class="col-md-6">
                        <h1>Exam List</h1>
                        
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-8">
                        <div class="widget-main-title">
                            <h4 class="widget-title">Generel Knowledge</h4>
                        </div>
                        <div class="widget-inner multiple_choise">
                            <?php 

                            foreach ($question_number_list as $key => $value) { 
                                $serial                 = $key+1; 
                                $question_name          = $value['question'];
                                $question_id            = $value['id'];
                                $answered_option_id     = $value['answered_option_id'];
                                $wrong_answer           = $value['wrong_answer'];

                            ?>
                            <?php if($value['answered_option_id']==0){ ?> <p class="bg-success"> This Question is Not Answered</p><?php } ?>
                            <p><?php echo $serial.". "; echo $question_name; ?></p>

                            <ul>
                            <?php 
                            $option_list = $this->common_model->selectAllWhere('tbl_option', array('question_id' => $question_id));


                            foreach ($option_list as $key => $value) { 
                                $option_id = $value->id;

                            ?>
                            
                        <li>
                                <?php if($value->ans){ ?>
                                    <i class="fa fa-check-square fa-lg right" aria-hidden="true"></i> 
                                    <?php } ?> 
                                    
                                    <?php if($wrong_answer == $option_id){ ?>
                                    <i class="fa fa-times fa-lg wrong" aria-hidden="true"></i>
                                    <?php } ?>

                                    <span><?php echo $value->option_name; ?></span>
                                
                                
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