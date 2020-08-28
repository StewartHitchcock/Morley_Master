<section class="about-faq sec-padd">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="about-info">
                    <h4><?php echo wp_kses_post($title); ?></h4>
                    <br>
                    <div class="text">
                        <?php echo wp_kses_post($text); ?>
                    </div>

                    <div class="link_btn">
                        <?php $btlink = explode("|", $btn_link); ?>
						<a href="<?php echo esc_url($btlink[0]);?>" target="<?php echo esc_attr($btlink[2]);?>" class="thm-btn"><?php echo wp_kses_post($btn_title); ?></a>
                        <div class="sign"><img src="<?php echo esc_url($sign_img);?>" alt="<?php esc_attr_e('image', 'fortun');?>"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="row">
                    
					<?php foreach($mission_group as $mission): ?>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="img-box">
								<img src="<?php echo esc_url(fortun_set($mission, 'mission_img')); ?>" alt="<?php esc_attr_e('image', 'fortun');?>">
							</div>
							<br>
							<h4><?php echo wp_kses_post(fortun_set($mission, 'mission_title')); ?></h4>
							<br>
							<p><?php echo wp_kses_post(fortun_set($mission, 'mission_text')); ?></p>
						</div>
					<?php endforeach; ?>
                    
                </div>
            </div>
            
        </div>
    </div>
</section>