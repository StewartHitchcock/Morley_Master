<div class="section-title">
	<h2><?php echo wp_kses_post($title); ?></h2>
</div>
<div class="row growth-service">
	
	<?php foreach($business_group as $bus): ?>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="item center">
				<div class="icon_box">
					<span class="<?php echo esc_attr(fortun_set($bus, 'service_icon')); ?>"></span>
				</div>
				<h4><?php echo wp_kses_post(fortun_set($bus, 'service_title')); ?></h4>
				<p><?php echo wp_kses_post(fortun_set($bus, 'service_text')); ?></p>
			</div>
		</div>
	<?php endforeach; ?>
	
</div><br><br>