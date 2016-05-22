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
                    <div class="col-lg-12">
                        <!-- start: Tab -->
                        <div>

                          <!-- Nav tabs -->
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
                          </ul>

                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, repudiandae sapiente, optio fugiat necessitatibus error omnis esse qui sint ratione quasi neque et dignissimos voluptates tempora. Minus, deserunt accusamus fugit.</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <p>ipsum dolor sit amet, consectetur adipisicing elit. Odit, repudiandae sapiente, optio fugiat necessitatibus error omnis esse qui sint ratione quasi neque et dignissimos voluptates tempora. Minus, deserunt accusamus fugit.</p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages">...</div>
                            <div role="tabpanel" class="tab-pane" id="settings">...</div>
                          </div>

                        </div>

                        <!-- <div class="tab-content">
                          <div role="tabpanel" class="tab-pane fade in active" id="home">...</div>
                          <div role="tabpanel" class="tab-pane fade" id="profile">...</div>
                          <div role="tabpanel" class="tab-pane fade" id="messages">...</div>
                          <div role="tabpanel" class="tab-pane fade" id="settings">...</div>
                        </div> -->

                        <script type="text/javascript">
                            $('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
                        </script>
                        <!-- end: Tab -->
                        <h1>Simple Sidebar</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                       <!--  <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a> -->
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




<!-- <div class="container" id="main_content">
	<div class="row">
		<div class="col-md-3">
			<div class="widget-main" style="min-height: 600px">
				<div class="widget-title">
					<h3>My Account</h3>
				</div>

				<div class="widget-inner">
					<ul></ul>
				</div>
			</div>
		</div>

		<div class="col-md-9">
			<div class="widget-main" style="min-height: 600px">
				<div class="widget-title">
					<h3>My Account</h3>
				</div>
			</div>
		</div>
	</div>
</div> -->


<!-- ***********   End Main Content 	************** -->
<script>

    var min_height = screen.height - 444;
    // document.getElementsByClassName("min_height").style.minHeight = min_height+"px";
    $('.min_height').css('min-height', min_height);

</script>

<?php $this->load->view('common/footer'); ?>