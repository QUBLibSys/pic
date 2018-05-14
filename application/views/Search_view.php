<section class="jumbotron text-center">
	<div class="container">
		<h1 class="jumbotron-heading"><?php echo $title ?></h1>
		<p class="lead text-muted">From here you can search the complete database, or filter by collection.</p>
	</div>
</section>

<div class="container">


	<div class="row">

		<div class="col-md-12">
			<?php 
			$data = array(
				'method'	=>	'get'
			);
			echo form_open('search/results', $data); 
			?>
			<div class="input-group mb-3">

				<div class="input-group-prepend">
					<a href="#" class="btn btn-outline-primary dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter by Collection</a>

					<div class="dropdown-menu">
						<?php foreach ($collections as $coll): ?>
							<a href="#" class="dropdown-item" value="<?php echo $coll->collection_id ?>"><?php echo $coll->name ?></a>
						<?php endforeach; ?>
					</div>
				</div>

				<input type="text" name="q" class="form-control">
				<input type="hidden" name="coll_id" class="form-control">
				
			</div> <!-- end input group -->

			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="">Filter by Year</span>
				</div>
				<input type="text" name="start_year" class="form-control">
				<input type="text" name="end_year" class="form-control">
			</div>
			<br>
			<input type="submit" name="submit">
			<?php echo form_close(); ?>

		</div>

	</div>

</div>

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