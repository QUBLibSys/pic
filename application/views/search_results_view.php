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

$coll_id = is_null($coll_id) ? 'Filter by Collection' : $coll_term;
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

<main role="main">
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-4 title-blue">Search Results</h1>
    <p class="lead"><?php echo $resultCount;?> </p>
    <p class="text-muted"><em>Search Terms: <?php echo $comma_separated_search_terms; ?></em></p>
    </div>
  </div>
</main>

<div class="container">
  <div class="row">
    <div class="col-md-12 mb-3">
      <?php 
      $data = array(
        'method'  =>  'get'
      );
      echo form_open('search/results/', $data); 
      ?>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <a href="#" class="btn btn-outline-primary dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $coll_id;?></a>
          <div class="dropdown-menu">
            <?php foreach ($collections as $coll): ?>
              <a href="#" class="dropdown-item" value="<?php echo $coll->collection_id ?>"><?php echo $coll->name ?></a>
            <?php endforeach; ?>
          </div>
        </div>
        <input type="text" name="q" class="form-control" value="<?php echo $this->input->get('q') ?>">
        <input type="hidden" name="coll_id" class="form-control" value="<?php echo $this->input->get('coll_id') ?>">
      </div> <!-- end input group -->
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="">Filter by Year</span>
        </div>
        <input type="text" name="start_year" class="form-control" value="<?php echo $this->input->get('start_year') ?>">
        <input type="text" name="end_year" class="form-control" value="<?php echo $this->input->get('end_year') ?>">
      </div>
      <br>
      <input class="btn btn-primary" type="submit" name="submit">
      <input class="btn btn-default" type="reset" value="Reset" id="resetForm">
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<?php if($results): ?>

<div class="container">
<style>
.fa {
  padding: 5px;
  font-size: 20px;
  width: 20px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

</style>
<div class="row">
<div class="col-md-12">
  <div id="accordion" role="tablist">
    <!-- start foreach -->
    <?php foreach ($results as $result) : 
    $empty_value = 'Not Available';
    // $p_class = 'class="text-muted"';
    ?>

      <div class="card list-view-brand">
        <div class="card-header" role="tab">
          <h5>
            <a data-toggle="collapse" id="#<?php echo $result['record_id'] ?>" href="#<?php echo $result['record_id'] ?>" aria-expanded="false" aria-controls="<?php echo $result['record_id'] ?>" class="collapsed">
              <?php echo $result['marc_099_coll_ident']?> | <strong><?php echo mb_strimwidth($result['marc_245_title_stmt'], 0, 100, "...")?></strong>
            </a>
          </h5>
          <div class="item-tags">
            <span class="badge tag-outline"><?php echo $result['name'] ?></span>
          </div>
        </div>

        <div id="<?php echo $result['record_id'] ?>" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" style="">
          <div class="card-body">
            <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <small class="text-muted">ID</small>
                <h6 class="my-0"><?php echo $result['record_id'];?></h6>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <small class="text-muted">Title</small>
                <h6 class="my-0"><?php echo $result['marc_245_title_stmt'];?></h6>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <small class="text-muted">Language</small>
                <h6 class="my-0"><?php echo $result['marc_008_lang'];?></h6>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <small class="text-muted">Multi Language</small>
                <h6 class="my-0"><?php echo $result['marc_041_multi_lang'];?></h6>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <small class="text-muted">Main Author</small>
                <h6 class="my-0"><?php echo $result['marc_100_main_pers_name'];?></h6>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <small class="text-muted">Publication Year</small>
                <h6 class="my-0"><?php echo $result['marc_260c_pub_year'];?></h6>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <small class="text-muted">Additional Persons</small>
                <h6 class="my-0"><?php echo $result['marc_700_add_pers_name'];?></h6>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <small class="text-muted">Owner</small>
                <h6 class="my-0"><?php echo $result['marc_110_main_corp_name'];?></h6>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <small class="text-muted">Additional Owner</small>
                <h6 class="my-0"><?php echo $result['marc_710_add_corp_name'];?></h6>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <small class="text-muted">Uniform Titles</small>
                <h6 class="my-0"><?php echo $result['marc_243_coll_uniform_title'];?></h6>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <small class="text-muted">Location of Publishers</small>
                <h6 class="my-0"><?php echo $result['marc_260_pub'];?></h6>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <small class="text-muted">Encore URL</small>
                <h6 class="my-0"><a href="<?php echo $result['encore_url'] ?>" class="text-primary"><?php echo $result['encore_url'] ?></a></h6>
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
</div> <!-- end container -->

<?php else: ?>

<div class="container">
    <p>No results. <a href="<?php echo base_url() ?>search">Search again. </a> </p> 
</div>

<?php endif; ?>

<script>
    $(document).ready(function(){
        $("h5, h6").highlight("<?php echo $q_term ?>");
        $("h5, h6").highlight("<?php echo $start_year_term ?>");
        $("h5, h6").highlight("<?php echo $end_year_term ?>");
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

<!-- redirect to main search page on form reset -->
<script type="text/javascript">
  $(document).ready(function() {
    $("#resetForm").click(function(){
      window.location.href = "<?php echo base_url() ?>search/results";
    });
  });
</script>