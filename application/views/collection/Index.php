<section class="jumbotron text-center">
	<div class="container">
		<h1><?php echo $title ?></h1>
		<h3><?php echo $subtitle; ?></h3>
	</div>
</section>

<section class="text-center">
	<div class="container">
	<?php foreach ($collections as $collection) : ?>
		<p><a href="<?php echo $collection->url?>"><?php echo $collection->coll_name ?></a>   </p>
    <?php endforeach; ?>
	</div>
</section>
