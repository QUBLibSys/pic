
	<div class="jumbotron">
		<div class="container">
			<h1 class="display-4 title-blue"><?php echo $items->name ?> Collection</h1>
			<p class="lead"><?php echo $items->coll_info ?></p>
			<blockquote class="blockquote">
  					<div class="blockquote-footer">Collected by <cite title="Source Title"><?php echo $items->collected_by ?></cite></div>
			</blockquote>
		</div>
	</div>
	<div class="text-center">
		<img src="<?php echo base_url().$items->logo ?>" class="rounded mx-auto d-block img-thumbnail mb-3" alt="<?php echo $items->coll_name ?>" title="<?php echo $items->coll_name ?>">
		<a class="btn btn-sm btn-dark" href="<?php echo base_url() ?>search/results/?coll_id=<?php echo $items->collection_id ?>" role="button" title="List of all records">View All Records <span class="badge badge-light"><?php echo $collectionCount->count ?></span></a>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-md">
				<h2>About</h2>
				<p class="lead"><?php echo $items->coll_info_more ?> </p>
				<p class="lead"><?php echo $items->coll_info_notes ?> </p>
				
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md">
				<h2>Collection Samples</h2>
				<div class="list-group">
					<?php foreach ($collectionSample as $sample): ?>
						<a href="<?php echo base_url(). 'search/results/?coll_id='.$items->collection_id.'&q='. mb_strimwidth($sample['marc_245_title_stmt'], 0, 50) ?>" class="list-group-item list-group-item-action"><?php echo mb_strimwidth($sample['marc_245_title_stmt'], 0, 120, "..."). ', ' . $sample['marc_260c_pub_year']  ?></a>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div> <!-- /container -->