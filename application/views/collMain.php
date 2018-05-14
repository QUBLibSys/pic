
	<style>
		/* * {box-sizing: border-box}

body, html {
    height: 100%;
    margin: 0;
} */

		.coll-row {
			margin-left: 5%;
			margin-right: 5%;
			/* padding-top: 2%; */
		}

		/*INCREASES THE SIZE OF MAIN SEARCH BAR AND ADDS PADDING FOR GOOD POSITIONING*/

		.coll-search {
			padding: 12px 20px 12px 20px;
			margin-bottom: 12px;
			margin-top: 5%;
		}

		/*END*/

		/*MEDIA QUERIES BEGIN*/

		@media only screen and (max-device-width: 1080px) {
			.coll-page-jumbo {
				background-attachment: scroll;
				height: 60%;
				padding-bottom: 30px;
				border-radius: 0px;
			}
			.lead {
				text-decoration: none;
			}
		}

		/*END*/

		/* SCROLLER IN INDEX3.HTML */

		.nav-scroller {
			position: relative;
			z-index: 2;
			height: 2.75rem;
			overflow-y: hidden;
		}

		.nav-scroller .nav {
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-ms-flex-wrap: nowrap;
			flex-wrap: nowrap;
			padding-bottom: 1rem;
			margin-top: -1px;
			overflow-x: auto;
			color: rgba(255, 255, 255, .75);
			text-align: center;
			white-space: nowrap;
			-webkit-overflow-scrolling: touch;
		}

		.nav-underline .nav-link {
			padding-top: .75rem;
			padding-bottom: .75rem;
			font-size: .875rem;
			color: var(--secondary);
		}

		.nav-underline .nav-link:hover {
			color: var(--blue);
		}

		.nav-underline .active {
			font-weight: 500;
			color: var(--gray-dark);
		}

		/* .jumbotron {
  background-color: #004b87;
  color: white;
} */

		.box-shadow {
			box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);
		}

	</style>
</head>

<body>

	<!-- START NAVIGATION BAR TO SWITCH BETWEEN EACH COLLECTION -->
	<div class="nav-scroller box-shadow" id="pills-tab" role="tablist">
		<nav class="nav nav-underline">
			<!-- <a class="nav-link active" id="percy-tab-nav" data-toggle="pill" href="<?php //echo base_url()?>collmain#percy-tab" role="tab" aria-controls="percy-tab" aria-selected="true">Percy</a> -->


			<?php foreach ($items as $collection):?>


			<a class="nav-link<?php if ($collection['collection_id'] == 1){ echo " active";} else echo ""?>" id="<?php echo $collection['name'] ?>-tab-nav" data-toggle="pill" href="#<?php echo $collection['name'] ?>-tab"
			role="tab" aria-controls="<?php echo $collection['name'] ?>-tab" aria-selected="<?php if ($collection['collection_id'] == 1){ echo 'true';} else echo 'false'?>">
				<?php echo $collection['coll_name'] ?>
			</a>


			<?php //if ($collection['collection_id'] == 1){ echo 'true';} else echo 'false'?>


			<?php endforeach; ?>
	</div>
	</nav>
	<!-- END NAVIGATION BAR -->


	<!-- START TAB CONTENT, EACH IS PLACED IN A BOOTSTRAP TAB PANE -->
	<div class="tab-content" id="pills-tabContent">
		<?php foreach ($items as $collection): ?>
		<!-- START TABS AS DEFAULT AND SHOW ON PAGE LOAD -->
		<div id="<?php echo $collection['name'] ?>-tab" class="tab-pane<?php if ($collection['collection_id'] == 1){ echo ' fade show active';} else echo ' fade'?>"
		role="tabpanel" aria-labelledby="<?php echo $collection['name'] ?>-tab-nav">

			<!-- TOP JUMBOTRON SECTION WITH LEAD TEXT AND SEARCH BAR -->
			<section class="jumbotron text-center coll-page-jumbo">
				<div class="container">
					<h1 class="jumbotron-heading">Welcome to the
						<?php echo $collection['coll_name'] ?>
					</h1>
					<p class="lead">
						<h5>
							<?php echo $collection['coll_info'] ?>
						</h5>
					</p>
					<input type="text" class="form-control coll-search" onkeyup="myFunction()" placeholder="Search the collection">
				</div>
			</section>
			<!-- END JUMBOTRON -->
			<!-- START MAIN SECTION WITH TEXT, IMAGE TO THE RIGHT AND RANDOM FEED -->
			<div class="row coll-row">
				<div class="col-md">
					<p class="describe">
						<h3>About this collection</h3>
						<hr>
						<?php echo $collection['section_1']?>
						<br>
						<h3>More Information</h3>
						<hr>
						<?php echo $collection['section_2']?>
					</p>
				</div>
				<div class="col-md-4">
					<div class="card">
						<img class="card-img-top" src="<?php echo $collection['logo']?>">
						<div class="card-block">
							<p class="card-text">Front of Lanyon, 2017</p>
						</div>
					</div>

					<!-- START RANDOM FEED WITH LEFT IMAGES OR COLOURS, LINK TO THE RIGHT AND YEAR BELOW THE TITLE -->
					<div class="my-3 p-3 rounded box-shadow">
						<h6 class="border-bottom border-gray pb-2 mb-0">Collection Samples</h6>
						<div class="media text-muted pt-3">
							<img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="32x32" class="mr-2 rounded" src="http://www.theawl.com/wp-content/uploads/2014/06/0xCXUvGbrpndOWTw5.jpg"
							data-holder-rendered="true" style="width: 32px; height: 32px;">
							<div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
								<div class="d-flex justify-content-between align-items-center w-100">
									<strong class="text-gray-dark">Record Name Here</strong>
									<a href="#">View full record</a>
								</div>
								<span class="d-block">Year</span>
							</div>
						</div>
					</div>
					<!--END RANDOM FEED-->
				</div>
			</div>
			<!-- END MAIN SECTION -->
		</div>
		<!-- END COLLECTION SECTION -->
    	<?php endforeach?>
	</div>

</body>

</html>

<?php foreach ($items as $item): ?>
<script>
//window.history.pushState("object or string", "Title", "/new-url");
document.location.hash = '<?php echo $collection['name'] ?>'
</script>
<?php endforeach?>