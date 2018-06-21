
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
        <div class="col-md-12">
		<h2>Collection Samples</h2>
		<p class="text-muted"><small>Generated randomly</small></p>
          <div id="accordion" role="tablist">
            <!-- start foreach -->
            <?php foreach ($collectionSample as $sample) : 
              $empty_value = 'Not Available';
              $shelfmark = !empty($sample['marc_099_coll_ident']) ? $sample['marc_099_coll_ident'] : $sample['marc_090_coll_ident'] ;
              ?>

              <div class="card list-view-brand">
                <div class="card-header" role="tab">
                  <p title="Click to expand">
                    <a data-toggle="collapse" id="#<?php echo $sample['record_id'] ?>" href="#<?php echo $sample['record_id'] ?>" aria-expanded="false" aria-controls="<?php echo $sample['record_id'] ?>" class="collapsed ga-accordian-tag" value="xxx">
                      <?php echo $shelfmark ?> | <strong  id="accordian-title"><?php echo mb_strimwidth($sample['marc_245_title_stmt'], 0, 100, "...")?></strong>
                    </a>
                  </p>
                  <div class="item-tags">
                    <span class="badge tag-outline"><?php echo $sample['name'] ?></span>
                  </div>
                </div>

                <div id="<?php echo $sample['record_id'] ?>" class="collapse" role="tabpanel" data-parent="#accordion" style="">
                  <div class="card-body">
                    <ul class="list-group mb-3">
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">ID</small>
                          <p class="my-0"><?php echo $sample['record_id'];?></p>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">Title</small>
                          <p class="my-0"><?php echo $sample['marc_245_title_stmt'];?></p>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">Language</small>
                          <p class="my-0"><?php echo $sample['marc_008_lang'];?></p>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">Multi Language</small>
                          <p class="my-0"><?php echo $sample['marc_041_multi_lang'];?></p>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">Main Author</small>
                          <p class="my-0"><?php echo $sample['marc_100_main_pers_name'];?></p>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">Publication Year</small>
                          <p class="my-0"><?php echo $sample['marc_260c_pub_year'];?></p>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">Additional Persons</small>
                          <p class="my-0"><?php echo $sample['marc_700_add_pers_name'];?></p>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">Owner</small>
                          <p class="my-0"><?php echo $sample['marc_110_main_corp_name'];?></p>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">Additional Owner</small>
                          <p class="my-0"><?php echo $sample['marc_710_add_corp_name'];?></p>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">Uniform Titles</small>
                          <p class="my-0"><?php echo $sample['marc_243_coll_uniform_title'];?></p>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">Location of Publishers</small>
                          <p class="my-0"><?php echo $sample['marc_260_pub'];?></p>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">Host Name</small>
                          <p class="my-0">TBC</p>
                        </div>
                      </li>
                      <li class="list-group-item justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted" >Encore URL</small>
                          <p title="External Link" class="my-0"><a href="<?php echo $sample['encore_url'] ?>" class="text-primary"><?php echo $sample['encore_url'] ?></a></p>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div> <!-- end card -->
              <?php endforeach; ?><!-- end foreach -->
            </div><!-- end accordion  -->
          </div>

        </div> <!-- end row -->
		<div class="row">
			<div class="col-md-12">
				<p class="text-center"><a href="<?php echo base_url(). 'search/results?coll_id=' . $sample{'coll_id'} ?>" title="View Full <?php echo $sample['name'] ?> Collection"> View Full <?php echo $sample['name'] ?> Collection</a></p>
			</div>
		</div>
	</div> <!-- /container -->