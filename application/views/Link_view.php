<div class="container">

<div id="accordion" role="tablist">



<!-- start foreach -->
<?php foreach ($results as $result) : 
$empty_value = 'Not Available';

// if any of results are empty
// p_class = text-muted
//else 
// p_class = ""

$p_class = 'class="text-muted"';

?>

<style>
.card{
  margin-top: 80px;
  margin-bottom: 50px;
}
</style>
<div class="card <?php echo $result['css_brand']; ?>">
<div class="card-header" role="tab">
  <h5 class="mb-0">
    <a data-toggle="collapse" id="#<?php echo $result['record_id'] ?>" href="#<?php echo $result['record_id'] ?>" aria-expanded="false" aria-controls="<?php echo $result['record_id'] ?>" class="collapsed">
    <b><?php echo $result['marc_099_coll_ident']. ' - ' . mb_strimwidth($result['marc_245_title_stmt'], 0, 100, "...") . ' - ' .$result['marc_260c_pub_year']?></b>
    </a>
  </h5>
</div>

<div id="<?php echo $result['record_id'] ?>" class="collapse.show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" style="">
  <div class="card-body">
    <p><b>Language:</b>
  <?php echo $result['marc_008_lang'];?></p>
  
  <p class="<?php $p_class ?>"><b>Multi Language:</b>
  <?php if(empty($result['marc_041_multi_lang'])) { echo $empty_value;} else {echo $result['marc_041_multi_lang'];}?></p>
  <p><b>Main Author:</b>

  <?php echo $result['marc_100_main_pers_name'];?></p>
  <p><b>Publication Year:</b>
  <?php echo $result['marc_260c_pub_year'];?></p>
  <p><b>Additional Persons:</b>
  <?php echo $result['marc_700_add_pers_name'];?></p>
  <p><b>Owner:</b>
  <?php echo $result['marc_110_main_corp_name'];?></p>
  <p><b>Additional Owner:</b>
  <?php echo $result['marc_710_add_corp_name'];?></p>
  <p><b>Uniform Title:</b>
  <?php echo $result['marc_243_coll_uniform_title'];?></p>
  <p><b>Location of Publisher:</b>
  <?php echo $result['marc_260_pub'];?></p>
  </div>
</div>
</div>
<?php endforeach; ?>
<!-- end foreach -->


</div>