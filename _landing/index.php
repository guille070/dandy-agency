<?php 
	$myHost = strtolower($_SERVER['HTTP_HOST']);
	if(strstr( $myHost,"localhost") > -1 ) $SITE_URL = 'http://localhost/dandy-agency/';
	if(strstr( $myHost,"wearedandy") > -1 ) $SITE_URL = 'http://www.wearedandy.com/';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Dandy Agency" />
	<meta name="keywords" content="dandy agency,digital,interactive,services,web,design,branding,graphics,identity,media,consulting,visual,strategy,marketing,communication,programming,development" />
	<meta property="og:title" content="Dandy Agency" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php echo $SITE_URL; ?>" />
	<meta property="og:image" content="<?php echo $SITE_URL; ?>images/logo-facebook.png" />
	<meta property="og:site_name" content="Dandy Agency" />
	<meta property="og:description" content="Dandy Agency" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dandy Agency</title>
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/main.css" media="screen" />
	<link rel="stylesheet" href="css/supersized.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
		<script type="text/javascript" src="js/html5.js"></script>
	<![endif]-->
	<script src="js/jquery.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.easing.min.js"></script>
	<script type="text/javascript" src="js/supersized.3.2.7.min.js"></script>
		
	<script type="text/javascript">
		jQuery(function($){
			$.supersized({
				// Functionality
				keyboard_nav		: 	0,
				autoplay 			: 	1,
				stop_loop 			: 	0,
				slide_interval      :   5000,		// Length between transitions
				transition          :   1, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
				transition_speed	:	2000,		// Speed of transition
														   
				// Components							
				slides 				:  	[			// Slideshow Images
											{image : 'images/bg01.jpg'},
											{image : 'images/bg02.jpg'},
											{image : 'images/bg03.jpg'}
										]
			});
	    });
	</script>
</head>
<body>
	<div id="preloader">
		<div id="status">
			<img src="images/logo.png" alt="" />
		</div>
	</div>
	
	<h1><a href="/"><img src="images/logo.png" alt="Dandy Agency" /></a></h1>
	
	<div class="dandy">Dan<br />dy<br/>Agen<br />cy</div>
	<div class="coming">Coming<br />Soon</div>
	<a class="mail" href="mailto:contact@wearedandy.com">contact<br />[at]<br />weare<br />dandy.com</a>
	
	<footer id="footer">
		<div class="bLeft">
			&copy; 2014 DANDYAGENCY&reg;. ALL RIGHTS RESERVED.
		</div>
		<div class="bRight">
			PROJECT BY DANDY AGENCY
		</div>
	</footer>
	
	<script>
		$(window).load(function() {
			$('#status').fadeOut('slow');
			$('#preloader').delay(350).fadeOut('slow');
		});
	</script>
</body>
</html>