<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="section-title">
			<h3><?php echo wp_kses_post($adv_title); ?></h3>
		</div>
		<div class="text">
			<p><?php echo wp_kses_post($adv_text); ?></p>
		</div>
		<ul class="benifit">
			
			<?php foreach($advantage_group as $adv): ?>
				<li><?php echo wp_kses_post(fortun_set($adv, 'adv_name')); ?></li>
			<?php endforeach; ?>
			
		</ul>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<div class="section-title">
			<h3><?php echo wp_kses_post($str_title); ?></h3>
		</div>
		<div class="accordion-box">
			
			<?php foreach($strategy_group as $key => $str): ?>
				<!--Start single accordion box-->
				<div class="accordion animated out" data-delay="0" data-animation="fadeInUp">
					<div class="acc-btn <?php if($key == 0) echo 'active'; ?>">
						<p class="title"><?php echo wp_kses_post(fortun_set($str, 'str_name')); ?></p>
						<div class="toggle-icon">
							<i class="plus fa fa-angle-right"></i><i class="minus fa fa-angle-down"></i>
						</div>
					</div>
					<div class="acc-content <?php if($key == 0) echo 'collapsed'; ?>">
						<div class="text"><p>
							<?php echo wp_kses_post(fortun_set($str, 'str_text')); ?> 
						</p></div>
					</div>
				</div>
			<?php endforeach; ?>

		</div>
	</div>
</div>
<br><br>