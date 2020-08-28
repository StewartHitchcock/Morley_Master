<section class="two-column sec-padd">
    <div class="container">
        <div class="section-title center">
            <h2><?php echo wp_kses_post($title); ?></h2>
        </div>
        <div class="two-column-carousel">
            
			<?php foreach($press_group as $press): ?>
				<div class="item clearfix">
					<div class="img-box"><img src="<?php echo esc_url(fortun_set($press, 'press_img')); ?>" alt="<?php esc_attr_e('image', 'fortun');?>"></div>
					<div class="content">
						<h4><?php echo wp_kses_post(fortun_set($press, 'press_title')); ?></h4>
						<p class="date"><?php echo wp_kses_post(fortun_set($press, 'press_date')); ?></p>
						<p><?php echo wp_kses_post(fortun_set($press, 'press_text')); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
            
        </div>
    </div>
</section>