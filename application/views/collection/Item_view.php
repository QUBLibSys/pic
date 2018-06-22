	<div class="jumbotron jumbotron-condensed">
		<div class="container">
			<h1 class="display-4 title-blue"><?php echo $title ?> </h1>
		</div>
	</div>

	<div class="container">
	<div class="row">
        <div class="col-md-12">

<?php if(empty($itemInfo)) { echo 'No record.'; } ?>

<?php foreach ($itemInfo as $sample) : 
$empty_value = 'Not Available';
$shelfmark = !empty($sample['marc_099_coll_ident']) ? $sample['marc_099_coll_ident'] : $sample['marc_090_coll_ident'] ;
?>	
	
<div class="card text-center">
	<div class="card-header">
		<p class="lead"><?php echo $shelfmark ?> | <?php echo $itemInfo[0]['marc_245_title_stmt'] ?></p>
	</div>
  <div class="card-body">
    
	<small class="text-muted">Language</small>
    <p class="card-text"><?php echo $sample['marc_008_lang'];?></p>
	
    <small class="text-muted">Multi Language</small>
    <p class="card-text"><?php echo $sample['marc_041_multi_lang'];?></p>

    <small class="text-muted">Main Author</small>
    <p class="card-text"><?php echo $sample['marc_100_main_pers_name'];?></p>
	
    <small class="text-muted">Publication Year</small>
    <p class="card-text"><?php echo $sample['marc_260c_pub_year'];?></p>
	
    <small class="text-muted">Additional Persons</small>
    <p class="card-text"><?php echo $sample['marc_700_add_pers_name'];?></p>
	
    <small class="text-muted">Owner</small>
    <p class="card-text"><?php echo $sample['marc_110_main_corp_name'];?></p>
	
    <small class="text-muted">Additional Owner</small>
    <p class="card-text"><?php echo $sample['marc_710_add_corp_name'];?></p>
	
    <small class="text-muted">Uniform Titles</small>
    <p class="card-text"><?php echo $sample['marc_243_coll_uniform_title'];?></p>
	
    <small class="text-muted">Location of Publishers</small>
    <p class="card-text"><?php echo $sample['marc_260_pub'];?></p>
	
    <small class="text-muted">Host Name</small>
    <p class="card-text"><?php echo 'TBC' ;?></p>
	
    <small class="text-muted">Encore URL</small>
    <p class="card-text"><a href="<?php echo $sample['encore_url'] ?>" class="text-primary"><?php echo $sample['encore_url'] ?></a></p>
	
	<hr>
    <a href="#" class="card-link">share | print | export to pdf | copy url</a>
  </div>
</div>
<?php endforeach; ?>

          </div>
        </div> <!-- end row -->
	</div> <!-- /container -->