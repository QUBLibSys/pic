	<div class="jumbotron jumbotron-condensed">
		<div class="container">
			<h1 class="display-4 title-blue"><?php echo $title ?> </h1>
		</div>
	</div>

	<div class="container">
	<div class="row">
        <div class="col-md-12">

<?php if(empty($itemInfo)) { echo 'No record.'; } ?>

<?php foreach ($itemInfo as $result) : 
$empty_value = 'Not Available';
$shelfmark = !empty($result['marc_099_coll_ident']) ? $result['marc_099_coll_ident'] : $result['marc_090_coll_ident'] ;
?>	
	
<div class="card text-center">
	<div class="card-header">
		<p class="lead"><?php echo $shelfmark ?> | <?php echo $itemInfo[0]['marc_245_title_stmt'] ?></p>
	</div>
  <div class="card-body">
    
	<small class="text-muted">Language</small>
    <p class="card-text"><?php echo $result['marc_008_lang'];?></p>
	
    <small class="text-muted">Multi Language</small>
    <p class="card-text"><?php echo $result['marc_041_multi_lang'];?></p>

    <small class="text-muted">Main Author</small>
    <p class="card-text"><?php echo $result['marc_100_main_pers_name'];?></p>
	
    <small class="text-muted">Publication Year</small>
    <p class="card-text"><?php echo $result['marc_260c_pub_year'];?></p>
	
    <small class="text-muted">Additional Persons</small>
    <p class="card-text"><?php echo $result['marc_700_add_pers_name'];?></p>
	
    <small class="text-muted">Owner</small>
    <p class="card-text"><?php echo $result['marc_110_main_corp_name'];?></p>
	
    <small class="text-muted">Additional Owner</small>
    <p class="card-text"><?php echo $result['marc_710_add_corp_name'];?></p>
	
    <small class="text-muted">Uniform Titles</small>
    <p class="card-text"><?php echo $result['marc_243_coll_uniform_title'];?></p>
	
    <small class="text-muted">Location of Publishers</small>
    <p class="card-text"><?php echo $result['marc_260_pub'];?></p>
	
    <small class="text-muted">Host Name</small>
    <p class="card-text"><?php echo 'TBC' ;?></p>
	
    <small class="text-muted">Encore URL</small>
    <p class="card-text"><a href="<?php echo $result['encore_url'] ?>" class="text-primary"><?php echo $result['encore_url'] ?></a></p>
	
  <div class="card-footer">
    <button type="button" class="btn btn-sm btn-outline-primary" onclick="printPage()">Print</button>
    <button type="button" class="btn btn-sm btn-outline-primary" onclick="copy()">Copy URL</button>
  </div>
  <div class="card-footer">
    <?php social_share_links($result);?>
  </div>
	
  </div>
</div>
<?php endforeach; ?>

          </div>
        </div> <!-- end row -->
	</div> <!-- /container -->

    <script type="text/javascript">
        function printPage(){
            window.print();
        }
    </script>

    <script type="text/javascript">
    function copy(){
            var box = document.createElement('input'),
                text = window.location.href;

            document.body.appendChild(box);
            box.value = text;
            box.select();
            document.execCommand('copy');
            document.body.removeChild(box);

    }
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>

  <script type="text/javascript">
        function onClick() {
          var pdf = new jsPDF('p', 'pt', 'letter');
          pdf.canvas.height = 72 * 11;
          pdf.canvas.width = 72 * 8.5;

          pdf.fromHTML(document.body);

          pdf.save('test.pdf');
        };

        var element = document.getElementById("clickbind");
        element.addEventListener("click", onClick);

  </script>