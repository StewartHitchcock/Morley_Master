<section class="awards center">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <h2><?php echo wp_kses_post($award_title); ?></h2>
                <div class="text"><p><?php echo wp_kses_post($award_text); ?></p></div>
                <div class="award-logo">
                    <div class="row">
                        
						<?php foreach($award_group as $award): ?>
							<div class="col-md-4 col-sm-4 col-xs-6">
								<img src="<?php echo esc_url(fortun_set($award, 'award_img')); ?>" alt="<?php esc_attr_e('image', 'fortun');?>">
							</div>
						<?php endforeach; ?>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <h2><?php echo wp_kses_post($prac_title); ?></h2>
                <div class="text"><p><?php echo wp_kses_post($prac_text); ?></p></div>
                <div class="service-list">
                    <ul>
                        
						<?php foreach($prac_group as $prac): ?>
							<li><i class="fa fa-long-arrow-right"></i><a href="<?php echo esc_url(fortun_set($prac, 'prac_link')); ?>"><?php echo wp_kses_post(fortun_set($prac, 'prac_name')); ?></a></li>
						<?php endforeach; ?>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>