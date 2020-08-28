<!--Fact Counter-->
<section class="fact-counter sec-padd">
    <div class="container">
        <div class="row clearfix">
            <div class="counter-outer clearfix">
                                
				<?php foreach($funfact_group as $fact): ?>
					<!--Column-->
					<article class="column counter-column col-md-3 col-sm-6 col-xs-12 wow fadeIn" data-wow-duration="0ms">
						<div class="item">
							<div class="count-outer"><span class="count-text" data-speed="3000" data-stop="<?php echo esc_js(fortun_set($fact, 'funfact_num')); ?>">0</span><?php if(fortun_set($fact, 'show_sign')) echo '+'; ?></div>
							<h4 class="counter-title"><?php echo wp_kses_post(fortun_set($fact, 'funfact_title')); ?></h4>
						</div>
					</article>
				<?php endforeach; ?>
               
            </div>
        </div>
    </div>
</section>