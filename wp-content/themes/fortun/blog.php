<?php if(has_post_thumbnail()):?>
<div class="img-box">
	<a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_post_thumbnail('fortun_770x420', array('class' => 'img-responsive'));?></a>
</div>
<?php endif;?>
<div class="lower-content">
	<h5><?php the_category(', '); ?></h5>
	<h4><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></h4>
	<div class="post-meta"><?php esc_html_e('by', 'fortun'); ?> <?php the_author(); ?>  |  <?php echo get_the_date('F d, Y');?>  |  <?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></div>
	<div class="text">
		<?php the_excerpt();?>                            
	</div>
	<div class="link">
		<a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="thm-btn"><?php esc_html_e('Read More', 'fortun'); ?></a>
	</div>
</div>