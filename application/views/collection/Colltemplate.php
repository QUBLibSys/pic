	<div class="jumbotron">
		<div class="container">
			<h1 class="display-4 title-blue"><?php echo $items[0]['name'] ?> Collection</h1>
			<p class="lead"><?php echo $items[0]['coll_info'] ?></p>
			<blockquote class="blockquote">
  					<div class="blockquote-footer">Collected by <cite title="Source Title"><?php echo $items[0]['collected_by'] ?></cite></div>
			</blockquote>
		</div>
	</div>
	<div class="text-center">
		<img src="<?php echo base_url().$items[0]['logo'] ?>" class="rounded mx-auto d-block img-thumbnail mb-3" alt="<?php echo $items[0]['coll_name'] ?>" title="<?php echo $items[0]['coll_name'] ?>">
		<a class="btn btn-sm btn-dark" href="<?php echo base_url() ?>search/results/?coll_id=<?php echo $items[0]['collection_id'] ?>" role="button" title="List of all records">View All Records <span class="badge badge-light"><?php echo $collectionCount->count ?></span></a>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-md">
				<h2>About</h2>
				<p class="lead"><?php echo $items[0]['coll_info_more'] ?> </p>
				<p class="lead"><?php echo $items[0]['coll_info_notes'] ?> </p>
				
			</div>
		</div>
		<hr>
		
	<div class="row">
        <div class="col-md-12">
		<h2>Collection results</h2>
		<p class="text-muted"><small>Generated randomly</small></p>
          <div id="accordion" role="tablist">
            <!-- start foreach -->
            <?php foreach ($collectionSample as $result) : 
              $empty_value = 'Not Available';
              $shelfmark = !empty($result['marc_099_coll_ident']) ? $result['marc_099_coll_ident'] : $result['marc_090_coll_ident'] ;
              ?>

              <div class="card list-view-brand">
                <div class="card-header" role="tab">
                  <p title="Click to expand">
                    <a data-toggle="collapse" id="#<?php echo $result['record_id'] ?>" href="#<?php echo $result['record_id'] ?>" aria-expanded="false" aria-controls="<?php echo $result['record_id'] ?>" class="collapsed ga-accordian-tag" value="xxx">
                      <?php echo $shelfmark ?> | <strong  id="accordian-title"><?php echo mb_strimwidth($result['marc_245_title_stmt'], 0, 100, "...")?></strong>
                    </a>
                  </p>
                  <div class="item-tags">
                    <span class="badge tag-outline"><?php echo $result['name'] ?></span>
                  </div>
                </div>

                <div id="<?php echo $result['record_id'] ?>" class="collapse" role="tabpanel" data-parent="#accordion" style="">
                  <div class="card-body">
                    <ul class="list-group mb-3">
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">Title</small>
                          <p class="my-0"><?php echo $result['marc_245_title_stmt'];?></p>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">Language</small>
                          <p class="my-0"><?php echo $result['marc_008_lang'];?></p>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <a class="btn btn-outline primary btn-sm" href="<?php echo base_url() . 'collection/' . $items[0]['url'] ?>/item/<?php echo $result['record_id'] ?>" role="button">View Full Record</a>
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
				<p class="text-center"><a href="<?php echo base_url(). 'search/results?coll_id=' . $result{'coll_id'} ?>" title="View Full <?php echo $result['name'] ?> Collection"> View Full <?php echo $result['name'] ?> Collection</a></p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<?php social_share_links($result);?>
			</div>
		</div>
	</div> <!-- /container -->