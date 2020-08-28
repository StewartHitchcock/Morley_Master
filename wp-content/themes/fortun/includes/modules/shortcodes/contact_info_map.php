<section class="contact_details sec-padd">
    <div class="container">
        <div class="section-title">
            <h3><?php echo wp_kses_post($title); ?></h3>
        </div>
        <div class="text">
            <p><?php echo wp_kses_post($text); ?></p>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-4 col-sm-8 col-xs-12">
                <div class="default-cinfo">
                    <div class="accordion-box">
                        
						<?php foreach($info_group as $key => $info): ?>
							<!--Start single accordion box-->
							<div class="accordion animated out" data-delay="0" data-animation="fadeInUp">
								<div class="acc-btn <?php if($key == 1) echo 'active'; ?>">
									<?php echo wp_kses_post(fortun_set($info, 'info_title')); ?>
									<div class="toggle-icon">
										<i class="plus fa fa-angle-right"></i><i class="minus fa fa-angle-down"></i>
									</div>
								</div>
								<div class="acc-content <?php if($key == 1) echo 'collapsed'; ?>">
									<ul class="contact-infos">
										<?php if(fortun_set($info, 'address')): ?>
											<li>
												<div class="icon_box">
													<i class="fa fa-home"></i>
												</div><!-- /.icon-box -->
												<div class="text-box">
													<p><b><?php esc_html_e('Address:', 'fortun'); ?></b> <?php echo wp_kses_post(fortun_set($info, 'address')); ?></p>
												</div><!-- /.text-box -->
											</li>
										<?php endif; ?>
										<?php if(fortun_set($info, 'address')): ?>
											<li>
												<div class="icon_box">
													<i class="fa fa-phone"></i>
												</div><!-- /.icon-box -->
												<div class="text-box">
													<p><b><?php esc_html_e('Call Us:', 'fortun'); ?></b> <br><?php echo wp_kses_post(fortun_set($info, 'phone')); ?></p>
												</div><!-- /.text-box -->
											</li>
										<?php endif; ?>
										<?php if(fortun_set($info, 'address')): ?>
											<li>
												<div class="icon_box">
													<i class="fa fa-envelope"></i>
												</div><!-- /.icon-box -->
												<div class="text-box">
													<p><b><?php esc_html_e('Mail Us:', 'fortun'); ?></b> <br><?php echo sanitize_email(fortun_set($info, 'email')); ?></p>
												</div>
											</li>
										<?php endif; ?>
										<?php if(fortun_set($info, 'address')): ?>
											<li>
												<div class="icon_box">
													<i class="fa fa-clock-o"></i>
												</div><!-- /.icon-box -->
												<div class="text-box">
													<p><b><?php esc_html_e('Opening Time:', 'fortun'); ?></b> <br><?php echo wp_kses_post(fortun_set($info, 'time')); ?></p>
												</div>
											</li>
										<?php endif; ?>
	
									</ul>
								</div>
							</div>
						<?php endforeach; ?>

                    </div>
                </div>
                    
            </div>
			<?php $img = ($mark_img) ? $mark_img : get_template_directory_uri().'/images/logo/map-marker.png'; ?>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="home-google-map">
                    <div 
                        class="google-map" 
                        id="contact-google-map" 
                        data-map-lat="<?php echo esc_js($lat);?>" 
                        data-map-lng="<?php echo esc_js($long);?>" 
                        data-icon-path="<?php echo esc_js($img);?>"
                        data-map-title="<?php echo esc_js($map_title);?>"
                        data-map-zoom="11" >

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>