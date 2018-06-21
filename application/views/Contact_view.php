	<!-- Google Recaptcha -->
	<script src='https://www.google.com/recaptcha/api.js'></script>

	<div class="jumbotron">
		<div class="container">
			<h1 class="display-4 title-blue"><?php echo $title ?></h1>
			<p class="lead"><?php echo $subtitle ?></p>
		</div>
	</div>

<section>
	<div class="container">
		<?php echo $this->session->flashdata('email_sent'); echo $this->session->flashdata('email_not_sent'); ?>
		<form class="needs-validation" id="contactForm" novalidate action="<?php echo base_url()?>email" method="post">
			<div class="form-row">
				<div class="col-md-4 mb-3">
					<label for="name">Name</label>
					<input type="text" class="form-control" name="name" placeholder="Name" value="" required>
					<div class="valid-feedback">
						Good!
					</div>
					<div class="invalid-feedback">
						Error! Please provide a name.
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="email">Email</label>
					<input type="email" class="form-control" name="email" placeholder="Email" value="" required>
					<div class="valid-feedback">
						Good!
					</div>
					<div class="invalid-feedback">
						Error! Please provide a valid email
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-6 mb-3">
					<label for="comment">Comment</label>
					<textarea class="form-control" name="comment" placeholder="Comment" rows="3" required></textarea>
					<div class="valid-feedback">
						Good!
					</div>
					<div class="invalid-feedback">
						Error! Provide a comment
					</div>
				</div>
			</div>
			<!-- Google recaptcha widget -->
			<div class="g-recaptcha mb-2" data-sitekey="6LcbE1cUAAAAAIJRvyrnxty1X-rxcJ7VeY6ZRqeE"></div>
<script>
	window.onload = function() {
    var $recaptcha = document.querySelector('#g-recaptcha-response');
    if($recaptcha) {
        $recaptcha.setAttribute("required", "required");
    }
};
</script>

			<div class="form-group">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
					<label class="form-check-label" for="invalidCheck">
						I understand that the information contained on this form will only be used for the <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg"> following purposes </a>
						and will be processed in line with the University’s obligations under the EU General Data Protection Regulation. 
						I confirm that the information provided in this form is complete and accurate. 
					</label>
					<div class="invalid-feedback">
						You must agree before submitting.
					</div>
				</div>
			</div>
			<button class="btn btn-primary" type="submit">Submit</button>
		</form>

<!-- modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Privacy Notice</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <p>The personal information provided will be managed in accordance with the provisions of the Data Protection Act 1998 and, from 25 May 2018, the EU General Data Protection Regulation (GDPR). The University administers its obligations under
                this legislation in accordance with its Data Protection Policy. </p>
              <p><strong>The Library Office holds information about applicants and members on computer in the following categories:</strong></p>
              <ul>
                <li>Personal Details: name, email;</li>
              </ul>

              <p><strong>This information will be used for the following purposes:</strong></p>
              <ul>
                <li>University Communications;</li>
				<li>Contact on an occasional basis for surveys and research to improve our service.</li>
              </ul>
			  
			  <p><strong>Is my personal data shared with anyone outside of Queen’s University?</strong></p>
			  <ul>
                <li>Your data will not be shared with third parties.</li>
              </ul>
			  
			  <p><strong>How long will we keep your personal data?</strong></p>
			  <ul>
                <li>We will keep your personal data only as long as is necessary for the purposes for which it was collected, and in accordance with the University’s Records Management Policy. Data will be securely destroyed when no longer required.</li>
              </ul>

               <p>You have a number of rights under data protection legislation, including the right to access personal data that the University holds about you insofar as it falls within the scope of the legislation. Please contact the Information Compliance
                    Unit (info.compliance@qub.ac.uk) for further information.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 mb-3">
              <address>
    <strong>Queen’s University Belfast</strong><br>
    Special Collections  <br>
    The McClay Library <br>
    10 College Park Belfast <br>
    BT7 1LP <br>
    <abbr title="Phone">T:</abbr> 028 9097 6333  <br>
    <abbr title="Email">E:</abbr> <a href="mailto:specialcollections@qub.ac.uk">specialcollections@qub.ac.uk</a>
  </address>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
  </div>
</div>
		
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
	'use strict';
	window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
    	form.addEventListener('submit', function(event) {
    		if (form.checkValidity() === false) {
    			event.preventDefault();
    			event.stopPropagation();
    		}
    		form.classList.add('was-validated');
    	}, false);
    });
}, false);
})();
</script>		
</div>
</section>