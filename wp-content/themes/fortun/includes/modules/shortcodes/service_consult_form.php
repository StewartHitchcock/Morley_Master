<div class="default-form-area">
	<div class="section-title">
		<h3><?php echo wp_kses_post($title); ?></h3>
	</div>
	
	<div id="contact_form" class="default-form service-form">
		<?php echo do_shortcode($contact_form); ?>
	</div>
	
</div>