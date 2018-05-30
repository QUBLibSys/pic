<!DOCTYPE html>
<html lang="en">

<head role="banner">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Responsive Meta tag -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="copyright" content="">
	<meta name="keywords" content="">
	<meta name="robots" content="index, follow">
	<meta name="DC.title" content="">

	<title>Personal and Institutional Collections</title>

<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5afebee44919d90011178487&product=social-ab' async='async'></script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TCSQ79T');</script>
<!-- End Google Tag Manager -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117120910-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-117120910-1');
</script>
	<!-- START CSS -->

	<!-- bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- custom -->
	<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
	<!-- swiper -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.6/css/swiper.css" />

	<!-- END CSS -->
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">

	<!-- START JS -->

	<!-- jquery -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<!-- popper -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<!-- bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<!-- highlight -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.11.1/jquery.mark.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.11.1/jquery.mark.es6.min.js"></script>

	<!-- fonts -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

	<!-- swiper -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.6/js/swiper.min.js"></script>

	<!-- END JS -->

	<!-- google tracking code -->
	
	<!-- google tracking code -->

	<!-- Google Recaptcha -->
	<script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body role="main">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TCSQ79T"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-blue">
		<a class="navbar-brand" href="<?php echo base_url() ?>" title="PIC Home"><strong>PIC</strong></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Find a collection">Collections</a>
					<div class="dropdown-menu">
						<!-- populate the dropdown from database rather than code inline -->
						<?php foreach ($collections as $collection): ?>
							<a href="<?php echo base_url(); ?>collection/<?php echo $collection->url ?>" class="dropdown-item collection-menu" value="<?php echo $collection->collection_id ?>"><?php echo $collection->name ?></a>
						<?php endforeach; ?>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="https://www.qub.ac.uk/directorates/InformationServices/TheLibrary/SpecialCollections" title="External Special Collections Site">Special Collections</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('contact') ?>" title="Contact form">Contact</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url().'about' ?>" title="About PIC">About</a>
				</li>
			</ul>

		</div>
	</nav>

	<button onclick="topFunction()" id="myBtn" title="Top of Page"><strong>Top</strong></button>

<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		document.getElementById("myBtn").style.display = "block";
	} else {
		document.getElementById("myBtn").style.display = "none";
	}
}
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
}
</script>