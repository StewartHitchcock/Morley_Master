<section class="clients-section sec-padd">
    <div class="container">
        <div class="section-title">
            <h2><?php echo wp_kses_post($title); ?></h2>
        </div>
        <div class="client-carousel owl-carousel owl-theme">

            <?php foreach($partner_group as $partner): ?>
				<div class="item tool_tip" title="<?php echo esc_attr(fortun_set($partner, 'tooltip_title')); ?>">
					<img src="<?php echo esc_url(fortun_set($partner, 'partner_img')); ?>" alt="<?php echo esc_attr(fortun_set($partner, 'tooltip_title')); ?>">
				</div>
			<?php endforeach; ?>
            
        </div>
    </div>  
</section>