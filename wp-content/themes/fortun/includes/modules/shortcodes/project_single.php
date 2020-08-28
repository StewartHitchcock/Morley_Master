<div class="img-box">
	<img src="<?php echo esc_url($proj_img);?>" alt="<?php esc_attr_e('image', 'fortun');?>">
</div>
<br><br>
<div class="client-information">
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<ul class="inform-list">
				
				<?php foreach($proj_group as $proj): ?>
					<li><span><?php echo wp_kses_post(fortun_set($proj, 'proj_title')); ?> : </span> <?php echo wp_kses_post(fortun_set($proj, 'proj_text')); ?></li>
				<?php endforeach; ?>
				
			</ul>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<h3><?php echo wp_kses_post($title); ?></h3>
			<p class="title"><?php echo wp_kses_post($subtitle); ?></p>
			<div class="text">
				<p><?php echo wp_kses_post($text); ?></p>
			</div>
			<div class="link">
				<?php $btlink = explode("|", $btn_link); ?>
				<a href="<?php echo esc_url($btlink[0]);?>" target="<?php echo esc_attr($btlink[2]);?>" class="thm-btn"><?php echo wp_kses_post($btn_title); ?></a>
			</div>
		</div>
	</div>
</div>
<br><br>