<main role="main">
	<div class="jumbotron">
		<div class="container">
			<h1 class="display-4 title-blue"><?php echo $title ?></h1>
			<p class="lead"><?php echo $subtitle ?></p>
		</div>
	</div>
</main>


<section>
	<div class="container">
		<form class="needs-validation" id="contactForm" novalidate>
			<div class="form-row">
				<div class="col-md-4 mb-3">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" placeholder="Name" value="" required>
					<div class="valid-feedback">
						Looks good!
					</div>
					<div class="invalid-feedback">
						Please provide a name.
					</div>
				</div>
				<div class="col-md-4 mb-3">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" placeholder="Email" value="" required>
					<div class="valid-feedback">
						Looks good!
					</div>
					<div class="invalid-feedback">
						Please provide an email.
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-6 mb-3">
					<label for="comment">Comment</label>
					<textarea class="form-control" id="comment" placeholder="Comment" rows="3" required></textarea>
					<div class="valid-feedback">
						Looks good!
					</div>
					<div class="invalid-feedback">
						Please provide a comment.
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
					<label class="form-check-label" for="invalidCheck">
						Agree to <a href="#"> terms and conditions </a>
					</label>
					<div class="invalid-feedback">
						You must agree before submitting.
					</div>
				</div>
			</div>
			<button class="btn btn-primary" type="submit">Submit</button>
		</form>

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