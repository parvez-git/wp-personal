<?php

function wppersonal_contact_form( $atts, $content = null ) {
	
	//[contact_form]
	
	//get the attributes
	$atts = shortcode_atts(
		array(),
		$atts,
		'contact_form'
	);
	
	//return HTML
	ob_start();
	//include 'templates/contact-form.php';
	?>
	<div class="row">
        <div class="message-section">
        <form id="wppersonalSubmitMessage" action="#" method="POST" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
          <div class="col-md-6">
            <input type="text" name="name" id="name" placeholder="Your Name*" />
            <small class="text-danger form-control-msg">Your Name is Required</small>
          </div>
          <div class="col-md-6">
            <input type="email" name="email" id="email" placeholder="Your Email address*" />
            <small class="text-danger form-control-msg">Your Email is Required</small>
          </div>
          <div class="col-md-12">
            <input type="url" name="website" id="website" placeholder="Your web address" />
          </div>
          <div class="col-md-12">
            <textarea name="message" id="message" cols="30" rows="10" placeholder="Please Write a message here*"></textarea>
            <small class="text-danger form-control-msg">A Message is Required</small>

            <input type="submit" class="wppersonal-btn" value="Send Message" />
            <small class="text-info form-control-msg js-form-submission">Submission in process, please wait..</small>
	           <small class="text-success form-control-msg js-form-success">Message Successfully submitted, thank you!</small>
	           <small class="text-danger form-control-msg js-form-error">There was a problem with the Contact Form, please try again!</small>
          </div>
        </div>
        </form>
    </div> <!-- end .row -->
	<?php
	return ob_get_clean();
	
}
add_shortcode( 'contact_form', 'wppersonal_contact_form' );
