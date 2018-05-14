<!-- dwiper style -->
<style>
.swiper-container {
	width: 100%;
	height: 100%;
}
.swiper-slide {
	text-align: center;
	font-size: 18px;
	/*background: #fff;*/
	/* Center slide text vertically */
	display: -webkit-box;
	display: -ms-flexbox;
	display: -webkit-flex;
	display: flex;
	-webkit-box-pack: center;
	-ms-flex-pack: center;
	-webkit-justify-content: center;
	justify-content: center;
	-webkit-box-align: center;
	-ms-flex-align: center;
	-webkit-align-items: center;
	align-items: center;
}
</style>

<main role="main">
	<section class="jumbotron text-center">
		<div class="container">
			<h1 class="display-4">Personal and Institutional Collections</h1>
			<p class="lead">Welcome to a catalogue of some of the discrete library collections held in <a href="https://www.qub.ac.uk/directorates/InformationServices/TheLibrary/SpecialCollections"> Special Collections</a> at Queen's University Belfast. Eighteenth century publishing dominates the contents of these libraries, but earlier and later material is also found.</p> 
			<p class="lead"> We have approximatley <a href="<?php echo base_url() ?>/search"> <?php echo $recordCount->count ?> records </a> in our collection.</p>
		</div>
	</section>
</main>

<div class="container">
	<div class="row">
		<div class="col-md-12 mb-3">
			<?php 
			$data = array(
				'method'	=>	'get'
			);
			echo form_open('search/results/', $data); 
			?>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<a href="#" class="btn btn-outline-primary dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter by Collection</a>
					<div class="dropdown-menu">
						<?php foreach ($collections as $coll): ?>
							<a href="#" class="dropdown-item" value="<?php echo $coll->collection_id ?>"><?php echo $coll->name ?></a>
						<?php endforeach; ?>
						<a href="#" class="dropdown-item" value="All">All Collections</a>
					</div>
				</div>
				<input type="text" name="q" class="form-control" placeholder="search term">
				<input type="hidden" name="coll_id" class="form-control">
			</div> <!-- end input group -->
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="">Filter by Year</span>
				</div>
				<input type="text" name="start_year" class="form-control" placeholder="start year">
				<input type="text" name="end_year" class="form-control" placeholder="end year">
			</div>
			<br>
			<input class="btn btn-primary" type="submit" name="submit">
			<input class="btn btn-default" type="reset" value="Reset" id="resetForm">
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<div class="container-fluid collection-slider">
  	<div class="swiper-container" href="<?php echo base_url() ?>collmain">
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
										<img src="<?php echo base_url().$collection->logo ?>" class="img-thumbnail">
									<div class="card-content text-center">
										<h5><?php echo $collection->name ?> Collection</h5>
									</div>
									<div class="card-footer">
									<a class="btn btn-sm btn-outline-primary" href="<?php echo base_url().'collection/'.$collection->url ?>" role="button">Search & Discover</a>
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
  		<div class="swiper-button-next"></div>
  		<div class="swiper-button-prev"></div>
  		<div class="swiper-scrollbar"></div>
  	</div> <!-- end swiper container -->
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<hr>
			<p class="text-muted">Need assistance?</p>
			<p><a href="mailto:specialcollections@qub.ac.uk">specialcollections@qub.ac.uk</a></p>
		</div>
	</div>
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

  <script type="text/javascript">
	
$(document).ready(function($){

// Remove empty fields from GET forms
 $("form").submit(function() {
  	$(this).find(":input").filter(function(){ return !this.value; }).attr("disabled", "disabled");
	return true; // ensure form still submits
});

// Un-disable form fields when page loads, in case they click back after submission
$( "form" ).find( ":input" ).prop( "disabled", false );
	
});
</script>

<script type="text/javascript">
	$(".dropdown-menu a").click(function(){
		var selText = $(this).text();
   //Get the value
   var value = $(this).attr("value");
  //Put the retrieved value into the hidden input
  $("input[name='coll_id']").val(value);
  $(this).parents('.input-group-prepend').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
});
</script>