<section class="jumbotron text-center">
	<div class="container">
		<h1><?php echo $title ?></h1>
		<h3><?php echo $subtitle; ?></h3>
	</div>
</section>

<section class="text-center">
	<div class="container">
	<?php foreach ($collections as $collection) : ?>
            <tr>
                <p><a href="collection/<?php echo strtolower($collection->name);  ?>"><?php echo $collection->coll_name ?></a>   </p>
        <?php endforeach; ?>
	</div>
</section>
