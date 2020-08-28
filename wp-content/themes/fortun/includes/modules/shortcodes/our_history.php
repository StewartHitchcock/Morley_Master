<section class="three-column sec-padd-top bg">
    <div class="container">
        <div class="section-title center">
            <h2><?php echo wp_kses_post($title); ?></h2>
        </div> 
        <div class="row">
            
			<?php foreach($history_group as $history):
				$btlink = explode("|", fortun_set($history, 'history_link')); ?>
				<div class="col-md-4 col-sm-6">
					<div class="single-our-service">
						<figure class="img-box">
							<a href="<?php echo esc_url($btlink[0]);?>" target="<?php echo esc_attr($btlink[2]);?>"><img src="<?php echo esc_url(fortun_set($history, 'history_img')); ?>" alt="<?php echo esc_attr($btlink[1]);?>"></a>
							<div class="count"><?php echo wp_kses_post(fortun_set($history, 'history_year')); ?></div>
						</figure>
						<div class="text-box">
							<a href="<?php echo esc_url($btlink[0]);?>" target="<?php echo esc_attr($btlink[2]);?>"><h4><?php echo wp_kses_post(fortun_set($history, 'history_title')); ?></h4></a>
							<p><?php echo wp_kses_post(fortun_set($history, 'history_text')); ?></p>
						</div>
							
					</div>
				</div>
			<?php endforeach; ?>
            
        </div>
    </div>
</section>