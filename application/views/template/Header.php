<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="theme-color" content="#004d7e"/>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="A catalogue of some of the discrete library collections held in Special Collections at Queen's University Belfast.">
	<meta name="author" content="Queen's University Belfast">
	<meta name="copyright" content="Queen's University Belfast">
	<meta name="keywords" content="rare books, early printed books, discrete print collections, significant printed works, pamphlets, collection level descriptions, Special Collections, Queen’s University Belfast, Personal and Institutional Collections">
	<meta name="robots" content="index, follow">
	<meta name="DC.title" content="">
	
	<!-- facebook metadata -->
	<meta property="og:title" content="Personal and Institutional Collections. Queen's University Belfast">
	<meta property="og:description" content="A catalogue of some of the discrete library collections held in Special Collections at Queen's University Belfast.">

	<!-- twitter metadata -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@QUBSC">
	<meta name="twitter:title" content="Personal and Institutional Collections. Queen's University Belfast">
	<meta name="twitter:description" content="A catalogue of some of the discrete library collections held in Special Collections at Queen's University Belfast.">

	<title>Personal and Institutional Collections. Queen's University Belfast</title>

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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

	<!-- custom -->
	<link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">

	<!-- END CSS -->
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">

	<!-- jquery -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

	<!-- popper -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

	<!-- bootstrap  JS-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<!-- highlight -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.11.1/jquery.mark.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.11.1/jquery.mark.es6.min.js"></script>

	<!-- END JS -->

	<!-- google tracking code -->
	
	<!-- google tracking code -->

</head>

<body>
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
						<?php foreach ($collections as $collection): ?>
							<a href="<?php echo base_url(); ?>collection/<?php echo $collection->url ?>" class="dropdown-item collection-menu"><?php echo $collection->name ?></a>
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