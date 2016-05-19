<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> 
<![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> 
<![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
	<title>Online MCQ Exam/TEST </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="College Education Responsive Template">
	<meta name="author" content="Esmet">
	<meta charset="UTF-8">

	<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800' rel='stylesheet' type='text/css'>

	<!-- CSS Bootstrap & Custom -->
	<link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet" media="screen">
	<link href="<?php echo base_url(); ?>css/animate.css" rel="stylesheet" media="screen">

	<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" media="screen">

	<!-- Favicons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="images/ico/favicon.ico">

	<link href="<?php echo base_url(); ?>owl-carousel/owl.carousel.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/custom.css">
	<!-- JavaScripts -->
	<script src="<?php echo base_url(); ?>js/jquery-1.10.2.min.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery-migrate-1.2.1.min.js"></script>
	<script src="<?php echo base_url(); ?>js/modernizr.js"></script>
	<!--[if lt IE 8]>
	    <div style=' clear: both; text-align:center; position: relative;'>
		<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
	    </div>
	<![endif]-->
    </head>
    <body>

	<!-- This one in here is responsive menu for tablet and mobiles -->
	<div class="responsive-navigation visible-sm visible-xs">
	    <a href="" class="menu-toggle-btn">
		<i class="fa fa-bars"></i>
	    </a>
	    <div class="responsive_menu">
		<ul class="main_menu">
		    <li><a href="">Home</a></li>
		    <li><a href="">Events</a>
			<ul>
			    <li><a href="events-grid.html">Events Grid</a></li>
			    <li><a href="events-list.html">Events List</a></li>
			    <li><a href="event-single.html">Event Details</a></li>
			</ul>
		    </li>
		    <li><a href="index.html#">Courses</a>
			<ul>
			    <li><a href="courses.html">Course List</a></li>
			    <li><a href="course-single.html">Course Single</a></li>
			</ul>
		    </li>
		    <li><a href="index.html#">Blog Entries</a>
			<ul>
			    <li><a href="blog.html">Blog Grid</a></li>
			    <li><a href="blog-single.html">Blog Single</a></li>
			    <li><a href="blog-disqus.html">Blog Disqus</a></li>
			</ul>
		    </li>
		    <li><a href="index.html">Pages</a>
			<ul>
			    <li><a href="archives.html">Archives</a></li>
			    <li><a href="shortcodes.html">Shortcodes</a></li>
			    <li><a href="gallery.html">Our Gallery</a></li>
			</ul>
		    </li>
		    <li><a href="contact.html">Contact</a></li>
		</ul> <!-- /.main_menu -->
		<ul class="social_icons">
		    <li><a href=""><i class="fa fa-facebook"></i></a></li>
		    <li><a href=""><i class="fa fa-twitter"></i></a></li>
		    <li><a href=""><i class="fa fa-pinterest"></i></a></li>
		    <li><a href=""><i class="fa fa-google-plus"></i></a></li>
		    <li><a href=""><i class="fa fa-rss"></i></a></li>
		</ul> <!-- /.social_icons -->
	    </div> <!-- /.responsive_menu -->
	</div> <!-- /responsive_navigation -->


	<header class="site-header">
	    <div class="container">
		<div class="row"> 

		    <div class="col-md-4">
			<div class="logo">
			    <a href="#" title="Universe" rel="home">
				<!-- <img style="width: 100px;" src="<?php echo base_url(); ?>images/logo2.png" alt="Universe"> -->
				<h1 style="color: #fff;">SKILL TEST BD</h1>
			    </a>
			</div> 
		    </div>  

		    <div class="col-md-offset-4 col-md-4">
			<ul class="nav navbar-nav navbar-right">

				<?php $user_id = $this->session->userdata('user_id'); 
				
				if ($user_id!=TRUE) { ?>
					<li><a href="<?php echo base_url(); ?>login" style="margin-top:20px;"><span class="glyphicon glyphicon-lock"></span>Login</a></li>
			    	<li><a href="<?php echo base_url(); ?>register" style="margin-top:20px;"><span class="glyphicon glyphicon-user"></span>Register</a></li>
				<?php }elseif ($user_id==TRUE) { ?>
					<li><a href="<?php echo base_url(); ?>logout" style="margin-top:20px;"><span class="glyphicon glyphicon-user"></span>Log Out</a></li>					
				<?php } ?>

			    
			</ul>

		    </div>
		   
		</div>
	    </div> <!-- /.container -->

	    <div class="nav-bar-main" role="navigation">
		<div class="container">
		    <nav class="main-navigation clearfix visible-md visible-lg" role="navigation">
                        <ul class="main-menu sf-menu">
                            <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li><a href="<?php echo base_url(); ?>category/index">MCQ TEST</a>
                                <ul class="sub-menu">
				    <?php
				    $category_list = $this->common_model->selectAll('tbl_category');

				    foreach ($category_list as $value) {
					$category_id = $value->id;
					$subject_name = $this->common_model->selectAllWhere('tbl_subject', array('category_id' => $category_id));
					?>

    				    <li><a href="<?php echo base_url(); ?>category/sub_category"><?php echo $value->name; ?></a>
					    <?php if (count($subject_name > 0)) { ?>
						<ul class="sub-menu">
						    <?php foreach ($subject_name as $value) { ?>
	    					    <li><a href="<?php echo base_url(); ?>subject/<?php echo $value->id; ?>"><?php echo $value->name; ?></a></li>
						    <?php } ?>


						</ul>
					    <?php } ?>


    				    </li>

				    <?php } ?>

                                </ul>
                            </li>
                           

                            <li><a href="<?php echo base_url(); ?>ask_question">Ask a Question</a></li>
                            <li><a href="<?php echo base_url(); ?>contact">Contact</a></li>
                        </ul> <!-- /.main-menu -->


                        <ul class="social-icons pull-right">
                            <li><a href="<?php echo base_url(); ?>" data-toggle="tooltip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo base_url(); ?>" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="<?php echo base_url(); ?>" data-toggle="tooltip" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="<?php echo base_url(); ?>" data-toggle="tooltip" title="Google+"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="<?php echo base_url(); ?>" data-toggle="tooltip" title="RSS"><i class="fa fa-rss"></i></a></li>
                        </ul> <!-- /.social-icons -->

		    </nav> <!-- /.main-navigation -->
		</div> <!-- /.container -->
	    </div> <!-- /.nav-bar-main --><br>

	</header> 

	<!-- ***************************************************************** -->


<!-- Being Page Title -->
<!-- BreadCamp -->
<div class="container">
    



<?php
       $success = $this->session->flashdata('success') ; 
       $error = $this->session->flashdata('error') ;
       if($success){
       ?>
         
         
<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <?php echo $success ;?>
</div>
       <?php } 
       if($error){
       ?>
          
         <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <?php echo $error ;?>
        </div>
       <?php } 
       
       if(validation_errors()){
       	echo validation_errors();
       }
       ?>
</div>

