<section class="consultation sec-padd">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                <div class="img-box">
                    <img src="<?php echo esc_url($form_img);?>" alt="<?php esc_attr_e('image', 'fortun');?>">
                </div>
                <div class="default-form-area">
                    <div class="section-title center">
                        <h3><?php echo wp_kses_post($title); ?></h3>
                    </div>
                    
					<div id="contact-form" class="default-form">
						<?php echo do_shortcode($contact_form); ?>
					</div>
					
                </div>
            </div>
        </div>
            
    </div>
</section>