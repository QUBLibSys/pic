<div id="loader"></div>
<div id="page">
<?php 
$selected = "selected=selected"; 

if(!empty($collection)){
  $coll_term = $collection->name;
  $query_strings['coll_id'] = $coll_term;
}
else {
  $coll_term = NULL;
}

$coll_id = empty($coll_id) ? 'Collection' : $coll_term;

// get array of search terms from URL
$query_strings = array($term, $coll_id, $start_year, $end_year);
// split array and comma separate
$comma_separated_search_terms = implode(', ', array_filter($query_strings));

?>

<div class="jumbotron">
  <div class="container">
    <h1 class="display-4 title-blue">Search Results</h1>
    <p class="lead"><?php echo $resultCount;?> </p>
    <p class="text-muted"><em>Search Terms: <?php echo $comma_separated_search_terms; ?></em></p>
  </div>
</div>


<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 mb-4">
      <?php 
      $data = array(
        'method'  =>  'get'
      );
      echo form_open('search/results/', $data); 
      ?>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <a href="#" class="btn btn-primary dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Filter by collection">
            <?php echo $coll_id;?></a>
            <div class="dropdown-menu">
              <?php foreach ($collections as $coll): ?>
                <a href="#" class="dropdown-item" value="<?php echo $coll->collection_id ?>"><?php echo $coll->name ?></a>
              <?php endforeach; ?>
			  <a href="#" class="dropdown-item" value="">All Collections</a>
            </div>
          </div>
          <input type="text" name="q" class="form-control" value="<?php echo $this->input->get('q') ?>" placeholder="search term" aria-label="Select collection from left and enter search query">
          <input type="hidden" name="coll_id" class="form-control" value="<?php echo $this->input->get('coll_id') ?>">
        </div> <!-- end input group -->
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" title="Enter start and end year">Year</span>
          </div>
          <input type="number" min="1100" max="3000" name="start_year" class="form-control" value="<?php echo $this->input->get('start_year') ?>" placeholder="start year" maxlength="4" aria-label="Enter start year">
          <input type="number" min="1100" max="3000" name="end_year" class="form-control" value="<?php echo $this->input->get('end_year') ?>" placeholder="end year" maxlength="4" aria-label="Enter end year">
        </div>
        <br>
        <input class="btn btn-primary" type="submit" name="submit" title="Submit search query">
        <input class="btn btn-default" type="reset" value="Reset" id="resetForm" title="Clear all search boxes">
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>

  <?php if($results): ?>

    <div class="container">

      <div class="row">
        <div class="col-md-12">
          <div id="accordion" role="tablist">
            <!-- start foreach -->
            <?php foreach ($results as $result) : 
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
                          <small class="text-muted">ID</small>
                          <p class="my-0"><?php echo $result['record_id'];?></p>
                        </div>
                      </li>
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
                          <small class="text-muted">Multi Language</small>
                          <p class="my-0"><?php echo $result['marc_041_multi_lang'];?></p>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">Main Author</small>
                          <p class="my-0"><?php echo $result['marc_100_main_pers_name'];?></p>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">Publication Year</small>
                          <p class="my-0"><?php echo $result['marc_260c_pub_year'];?></p>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">Additional Persons</small>
                          <p class="my-0"><?php echo $result['marc_700_add_pers_name'];?></p>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">Owner</small>
                          <p class="my-0"><?php echo $result['marc_110_main_corp_name'];?></p>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">Additional Owner</small>
                          <p class="my-0"><?php echo $result['marc_710_add_corp_name'];?></p>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">Uniform Titles</small>
                          <p class="my-0"><?php echo $result['marc_243_coll_uniform_title'];?></p>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">Location of Publishers</small>
                          <p class="my-0"><?php echo $result['marc_260_pub'];?></p>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">Location of Publishers</small>
                          <p class="my-0">TBC</p>
                        </div>
                      </li>
                      <li class="list-group-item justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted" >Encore URL</small>
                          <p title="External Link" class="my-0"><a href="<?php echo $result['encore_url'] ?>" target="_new" class="text-primary"><?php echo $result['encore_url'] ?></a></p>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <small class="text-muted">Share</small>
                          <br>
<!-- Sharingbutton Facebook -->
<a class="resp-sharing-button__link" href="https://facebook.com/sharer/sharer.php?u=<?php echo current_full_url(). '%23' .$result['record_id'] ?>" title="Share on Facebook" target="_blank" aria-label="">
  <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/></svg>
    </div>
  </div>
</a>

<!-- Sharingbutton Twitter -->
<a class="resp-sharing-button__link" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20record%20on%20Personal%20and%20Institutional%20Collections%2C%20Queen%27s%20University%20Belfast&url=<?php echo current_full_url(). '%23' .$result['record_id'] ?>" title="Share on Twitter" target="_blank" aria-label="">
  <div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z"/></svg>
    </div>
  </div>
</a>

<!-- Sharingbutton E-Mail -->
<a class="resp-sharing-button__link" href="mailto:specialcollections@qub.ac.uk?subject=Personal%20and%20Institutional%20Collections&amp;body=Check%20out%20this%20record%20on%20Personal%20and%20Institutional%20Collections%2C%20Queen%27s%20University%20Belfast%20.%20<?php echo current_full_url(). '%23' .$result['record_id'] ?>" title="Share via Email" target="_self" aria-label="">
  <div class="resp-sharing-button resp-sharing-button--email resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22 4H2C.9 4 0 4.9 0 6v12c0 1.1.9 2 2 2h20c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zM7.25 14.43l-3.5 2c-.08.05-.17.07-.25.07-.17 0-.34-.1-.43-.25-.14-.24-.06-.55.18-.68l3.5-2c.24-.14.55-.06.68.18.14.24.06.55-.18.68zm4.75.07c-.1 0-.2-.03-.27-.08l-8.5-5.5c-.23-.15-.3-.46-.15-.7.15-.22.46-.3.7-.14L12 13.4l8.23-5.32c.23-.15.54-.08.7.15.14.23.07.54-.16.7l-8.5 5.5c-.08.04-.17.07-.27.07zm8.93 1.75c-.1.16-.26.25-.43.25-.08 0-.17-.02-.25-.07l-3.5-2c-.24-.13-.32-.44-.18-.68s.44-.32.68-.18l3.5 2c.24.13.32.44.18.68z"/></svg>
    </div>
  </div>
</a>

						</div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                          <a class="btn btn-outline primary btn-sm" href="<?php echo base_url() . 'collection/' . $result['url'] ?>/item/<?php echo $result['record_id'] ?>" title="Open in New Window" role="button">Open in New Window</a>
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

        <div class="links">
          <?php echo $links ?>
        </div>
      </div> <!-- end row -->

      <?php else: ?>

        <div class="container">
          <p>No results. <a href="<?php echo base_url() ?>search">Search again. </a> </p>
        </div>

      <?php endif; ?>

      <!-- highlight search terms -->
      <script> 
        $("#accordion p").mark("<?php echo $term ?>", {
          "element": "span",
          "className": "highlight"
        });
      </script>


      <script>
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

<script> 
  $(".dropdown-menu a").click(function(){
    var selText = $(this).text();
   //Get the value
   var value = $(this).attr("value");
  //Put the retrieved value into the hidden input
  $("input[name='coll_id']").val(value);
  $(this).parents('.input-group-prepend').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
});
</script>

<!-- redirect to main search page on form reset -->
<script> 
  $(document).ready(function() {
    $("#resetForm").click(function(){
      window.location.href = "<?php echo base_url() ?>search/results";
    });
  });
</script>

<!-- expand the accordion item based on URL  -->
<script>
  $(document).ready(function () {
    location.hash && $(location.hash + '.collapse').show();
  });
</script>

 </div>  <script>
function onReady(callback) {
    var intervalID = window.setInterval(checkReady, 2000);

    function checkReady() {
        if (document.getElementsByTagName('body')[0] !== undefined) {
            window.clearInterval(intervalID);
            callback.call(this);
        }
    }
}

function show(id, value) {
    document.getElementById(id).style.display = value ? 'block' : 'none';
}

onReady(function () {
    show('page', true);
    show('loader', false);
});
  </script>
 