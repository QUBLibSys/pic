<?php 
$selected = "selected=selected"; 
$q_term = $this->input->get('q');

if(!empty($collection)){
  $coll_term = $collection->name;
  $query_strings['coll_id'] = $coll_term;
}
else {
  $coll_term = NULL;
}

$coll_id = is_null($coll_id) ? 'Filter' : $coll_term;
$start_year_term = $this->input->get('start_year');
$end_year_term = $this->input->get('end_year');

if(isset($q_term)) {
  $query_strings['q'] = $q_term;
}
else {
  $query_strings['q'] = NULL; 
}

if(isset($start_year_term)) {
  $query_strings['start_year'] = 'Start Year ' .$start_year_term;
}
else {
  $query_strings['start_year'] = NULL; 
}

if(isset($end_year_term)) {
  $query_strings['end_year'] = 'End Year ' .$end_year_term;
}
else {
  $query_strings['end_year'] = NULL; 
}

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
    <div class="col-md-8 mb-4">
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
          </div>
        </div>
        <input type="text" name="q" class="form-control" value="<?php echo $this->input->get('q') ?>" placeholder="search term" aria-label="Select collection from left and enter search query">
        <input type="hidden" name="coll_id" class="form-control" value="<?php echo $this->input->get('coll_id') ?>">
      </div> <!-- end input group -->
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" title="Enter start and end year">Filter by Year</span>
        </div>
        <input type="text" name="start_year" class="form-control" value="<?php echo $this->input->get('start_year') ?>" placeholder="start year" maxlength="4" aria-label="Enter start year">
        <input type="text" name="end_year" class="form-control" value="<?php echo $this->input->get('end_year') ?>" placeholder="end year" maxlength="4" aria-label="Enter end year">
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
            <a data-toggle="collapse" id="#<?php echo $result['record_id'] ?>" href="#<?php echo $result['record_id'] ?>" aria-expanded="false" aria-controls="<?php echo $result['record_id'] ?>" class="collapsed">
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
                <small class="text-muted" >Encore URL</small>
                <p title="External Link" class="my-0"><a href="<?php echo $result['encore_url'] ?>" class="text-primary"><?php echo $result['encore_url'] ?></a></p>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <small class="text-muted">Share this</small>
                <div class="sharethis-inline-share-buttons"></div>
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
  $("#accordion p").mark("<?php echo $q_term ?>", {
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