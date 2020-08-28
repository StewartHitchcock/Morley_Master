<div class="img-box"><img src="<?php echo esc_url($service_img);?>" alt="<?php esc_attr_e('image', 'fortun');?>"></div>
<br><br>
<div class="section-title">
	<h2><?php echo wp_kses_post($title); ?></h2>
</div>
<?php echo wp_kses_post($content); ?><br><br>