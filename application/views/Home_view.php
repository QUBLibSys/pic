	<!-- swiper -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css" />
	<!-- swiper -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>
	
	<section class="jumbotron text-center" aria-label="Page description">
		<div class="container">
			<h1 class="display-4 title-blue">Personal and Institutional Collections</h1>
			<p class="lead">Welcome to a catalogue of some of the discrete library collections held in <a href="https://www.qub.ac.uk/directorates/InformationServices/TheLibrary/SpecialCollections"> Special Collections</a> at Queen's University Belfast. Eighteenth century publishing dominates the contents of these libraries, but earlier and later material is also found.</p> 
			<p class="lead"> We have approximately <a href="<?php echo base_url() ?>/search"> <?php echo $recordCount->count ?> records </a> in our collection.</p>
		</div>
	</section>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-9 mb-4">
			<?php 
			$data = array(
				'method'	=>	'get'
			);
			echo form_open('search/results/', $data); 
			?>
			<div class="input-group mb-4">
				<div class="input-group-prepend">
					<a href="#" class="btn btn-primary dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Filter by collection">Filter</a>
					<div class="dropdown-menu">
						<?php foreach ($collections as $coll): ?>
							<a href="#" class="dropdown-item" value="<?php echo $coll->collection_id ?>"><?php echo $coll->name ?></a>
						<?php endforeach; ?>
						<a href="#" class="dropdown-item" value="All">All Collections</a>
					</div>
				</div>
				<input type="text" name="q" class="form-control" placeholder="search term" aria-label="Select collection from left and enter search query">
				<input type="hidden" name="coll_id" class="form-control">
			</div> <!-- end input group -->
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" title="Filter by year">Filter by Year</span>
				</div>
				<input type="text" name="start_year" class="form-control" placeholder="start year" maxlength="4" aria-label="Enter start year">
				<input type="text" name="end_year" class="form-control" placeholder="end year" maxlength="4" aria-label="Enter end year">
			</div>
			<br>
			<input class="btn btn-primary" type="submit" name="submit" title="Submit search query">
			<input class="btn btn-default" type="reset" value="Reset" id="resetForm" title="Clear all search boxes">
			<?php echo form_close(); ?>
		</div>
	</div>
</div>


<div class="container-fluid collection-slider">
  	<div class="swiper-container">
  		<div class="swiper-wrapper">
  		<!-- start for each -->
  		<?php 
		foreach ($collectionInfo as $collection):
		if(!isset($collection->logo)) {
			$collection->logo = 'assets/img/collection/no-image.jpg';
		}
		if(!isset($collection->info)) {
			$collection->info = 'No Information Available. Coming soon.';
		}
		?>
		<div class="swiper-slide">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="card" id="<?php echo $collection->name?>">
										<img src="<?php echo base_url().$collection->logo ?>" class="img-thumbnail" alt="<?php echo $collection->name?> collection image">
									<div class="card-content text-center">
										<p style="font-size:1.5rem"><?php echo $collection->name ?> Collection</p>
									</div>
									<div class="card-footer">
									<a class="btn btn-sm btn-primary" href="<?php echo base_url().'collection/'.$collection->url ?>" title="Browse and explore the <?php echo $collection->name?> collection">Search & Discover</a>
   									</div>
								</div>
							</div>
						</div>
					</div>
		</div>
  		<?php endforeach; ?>
  		<!-- end for each -->
  		</div> <!-- end swiper wrapper -->
  		<!-- Add Arrows -->
  		<div class="swiper-button-next" title="Scroll to next"></div>
  		<div class="swiper-button-prev" title="Scroll back"></div>
  		<div class="swiper-scrollbar"></div>
  	</div> <!-- end swiper container -->
</div>


<!-- Initialize Swiper -->
<script>
var swiper = new Swiper('.swiper-container', {
	slidesPerView: 3,
	spaceBetween: 30,
	centeredSlides: true,
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
	scrollbar: {
		el: '.swiper-scrollbar',
		hide: true,
	},
	breakpoints: {
		1024: {
			slidesPerView: 4,
			spaceBetween: 40,
		},
		768: {
			slidesPerView: 1,
			spaceBetween: 30,
		},
		640: {
			slidesPerView: 1,
			spaceBetween: 20,
		},
		320: {
			slidesPerView: 1,
			spaceBetween: 10,
		}
	}
});
</script>

<script>
$(".dropdown-menu a").click(function () {
	var selText = $(this).text();
	//Get the value
	var value = $(this).attr("value");
	//Put the retrieved value into the hidden input
	$("input[name='coll_id']").val(value);
	$(this).parents('.input-group-prepend').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
});
</script>