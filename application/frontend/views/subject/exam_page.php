<?php $this->load->view('common/header'); ?>



<!-- Being Page Title -->
<!-- BreadCamp -->
<?php if(validation_errors()){ ?>

<div class="container">
    <div class="page-title exam_page clearfix">
        <div class="row">
            <div class="col-md-6">               
                
            </div>
            <div class="col-md-6">
                     
              <?php echo validation_errors(); ?>

            </div>
        </div>
    </div>
</div>

<?php } ?>

<!-- ***********   Start Main Content 	************** -->
<div class="container" id="main_content">
    <div class="row">
        <div class="col-md-12">
            
            <div class="widget-main view_details">
                <div class="row">
                    <div class="col-md-8">
                        <div class="widget-main-title">
                            <h4 class="widget-title">Generel Knowledge</h4>
                        </div>
                        <div class="widget-inner multiple_choise">
                            <?php echo form_open('exam/calculate_current_exam'); $serial = $exam_question_id+1; ?>
                            <p><?php echo $serial.". "; echo $exam_question['question']; ?></p>

                            <ul>
                            <?php 
                            
                            $option_list = $this->session->userdata('option_list');
                            
                            foreach ($option_list as $key => $value) { if($value['question_id']==$exam_question['id']){?>
                                <li><input type="radio" <?php if($answered_option_id==$value['id']) echo "checked"; ?> name="option" value="<?php echo $value['id']; ?>"  /><?php echo $value['option_name']; ?></li>
                                <?php }} ?>
                                

                            </ul>
                            
                            <hr>
                            <?php 

                            echo form_hidden('exam_question_id', $exam_question_id);

                            if($exam_question_id<=0){ echo form_submit('previous_question_submit', 'Previous Question', array('class' => 'btn btn-primary', 'disabled' => 'disabled')); }else{
                              echo form_submit('previous_question_submit', 'Previous Question', array('class' => 'btn btn-primary')); 

                            }

                            if($serial == $number_of_question+1){
                            echo form_submit('next_question_submit', 'Next Question', array('class' => 'btn btn-primary', 'disabled' => 'disabled')); 
                            }else{
                            echo form_submit('next_question_submit', 'Next Question', array('class' => 'btn btn-primary')); 
                          }

                           
                            echo form_submit('end_exam', 'End Exam', array('class' => 'btn btn-primary pull-right')); 

                           form_close(); 

                           ?>
                        </div>
                    </div>

                    <div class="col-md-4">
                         <div class="widget-main-title">
                            <!-- <h4 class="widget-title">Test Content</h4> -->
                            <h3 style="margin: 0; padding: 0;">Number of Question - <?php echo $serial." /";   echo $number_of_question; ?></h3>
                        </div>
                        <div class="widget-inner">
                            <div id="clockdiv" class="pull-right">

                  <div style="display: none;">
                    <span class="days"></span>
                    <div class="smalltext">Days</div>
                  </div>
                  <div>
                    <span class="hours"></span>
                    <div class="smalltext">Hours</div>
                  </div>
                  <div>
                    <span class="minutes"></span>
                    <div class="smalltext">Minutes</div>
                  </div>
                  <div>
                    <span class="seconds"></span>
                    <div class="smalltext">Seconds</div>
                  </div>
                </div>

                <?php $hour= 2; ?>

                <script type="text/javascript">
                    function getTimeRemaining(endtime) {
                      var t = Date.parse(endtime) - Date.parse(new Date());
                      var seconds = Math.floor((t / 1000) % 60);
                      var minutes = Math.floor((t / 1000 / 60) % 60);
                      var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
                      var days = Math.floor(t / (1000 * 60 * 60 * 24));
                      return {
                        'total': t,
                        'days': days,
                        'hours': hours,
                        'minutes': minutes,
                        'seconds': seconds
                      };
                    }

                    function initializeClock(id, endtime) {
                      var clock = document.getElementById(id);
                      var daysSpan = clock.querySelector('.days');
                      var hoursSpan = clock.querySelector('.hours');
                      var minutesSpan = clock.querySelector('.minutes');
                      var secondsSpan = clock.querySelector('.seconds');

                      function updateClock() {
                        var t = getTimeRemaining(endtime);

                        daysSpan.innerHTML = t.days;
                        hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
                        minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                        secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

                        if (t.total <= 0) {
                          clearInterval(timeinterval);
                        }
                      }

                      updateClock();
                      var timeinterval = setInterval(updateClock, 1000);
                    }

                    var deadline = new Date(Date.parse(new Date()) + 1 * <?php echo $hour; ?> * 30 * 60 * 1000);
                    initializeClock('clockdiv', deadline);
                </script>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


<!-- ***********   End Main Content 	************** -->
<script>

    // var x = "Total Height: " + screen.height + "px";
    // var min_height = screen.height - 214+87;
    var min_height = screen.height - 444;
    // document.getElementById("main_content").innerHTML = min_height;

    document.getElementById("main_content").style.minHeight = min_height+"px";

</script>
<?php $this->load->view('common/footer'); ?>