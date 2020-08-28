<?php  $count = 1; ?>
<div class="section-title">
	<h3><?php echo wp_kses_post($title); ?></h3>
</div>
<div class="text">
	<p><?php echo wp_kses_post($text); ?></p>
</div>
<br><br>
<div class="accordion-box">
	
	<?php foreach($proj_group as $proj): ?>
		<!--Start single accordion box-->
		<div class="accordion animated out" data-delay="0" data-animation="fadeInUp">
			<div class="acc-btn <?php if($count == 1) echo 'active'; ?>">
				<p class="title"><?php echo wp_kses_post(fortun_set($proj, 'proj_title')); ?></p>
				<div class="toggle-icon">
					<i class="plus fa fa-angle-right"></i><i class="minus fa fa-angle-down"></i>
				</div>
			</div>
			<div class="acc-content <?php if($count == 1) echo 'collapsed';?>">
				<div class="text"><p>
					<?php echo wp_kses_post(fortun_set($proj, 'proj_text')); ?> 
				</p></div>
			</div>
		</div>
	<?php $count++;
		endforeach; ?>

</div>
<br><br>
<div class="img-box">
	<img src="<?php echo esc_url($solution_img);?>" alt="<?php esc_attr_e('image', 'fortun');?>">
</div>