<div class="section-title">
	<h3><?php echo wp_kses_post($title); ?></h3>
</div>

<div class="text">
	<p><?php echo wp_kses_post($text); ?></p>
</div><br><br>
<div class="img-box">
	<img src="<?php echo esc_url($analysis_img);?>" alt="<?php esc_attr_e('image', 'fortun');?>">
</div>
<br><br>