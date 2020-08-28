<div class="container">
    <div class="border-bottom"></div>
</div>

<section class="contact_us sec-padd">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h3><?php echo wp_kses_post($form_title); ?></h3>
                </div>
                <div class="default-form-area">
                    
					<div id="contact-form" class="default-form">
						<?php echo do_shortcode($contact_form); ?>
					</div>
                    
                </div>
            </div>
            <div class="col-md-4 col-sm-8 col-xs-12">
                <div class="section-title">
                    <h3><?php echo wp_kses_post($depart_title); ?></h3>
                </div>
                <div class="author-details">
                    
					<?php foreach($depart_group as $depart): ?>
						<div class="item">
							<h5><?php echo wp_kses_post(fortun_set($depart, 'depart_name')); ?></h5>
							<div class="img-box">
								<img src="<?php echo esc_url(fortun_set($depart, 'person_img')); ?>" alt="<?php esc_attr_e('image', 'fortun');?>">
							</div>
							<div class="content">
								<h5><?php echo wp_kses_post(fortun_set($depart, 'person_name')); ?></h5>
								<p><i class="fa fa-phone"></i><?php echo wp_kses_post(fortun_set($depart, 'person_phone')); ?></p>
								<p><i class="fa fa-envelope"></i><?php echo sanitize_email(fortun_set($depart, 'person_email')); ?></p>
							</div>
						</div>
					<?php endforeach; ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>