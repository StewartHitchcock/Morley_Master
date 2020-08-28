<?php  $count = 1;
$query_args = array('post_type' => 'bunch_team' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['team_category'] = $cat;
$query = new WP_Query($query_args);
?>

<?php if($query->have_posts()):  ?>  

<section class="our-team <?php if($style1) echo 'style-2'; ?>" <?php if($style1): ?>style="background-image: url(<?php echo esc_url($bg_img); ?>);"<?php endif; ?>>
    <div class="container">
        <div class="section-title <?php if($style2) echo 'center'; ?>">
            <h2><?php echo wp_kses_post($title); ?></h2>
        </div>  
        <div class="row">
            
			<?php while($query->have_posts()): $query->the_post();
				global $post; 
				$team_meta = _WSH()->get_meta();?>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="single-team-member">
						<figure class="img-box">
							<a href="<?php echo esc_url(fortun_set($team_meta, 'ext_url')); ?>"><?php the_post_thumbnail('fortun_270x235', array('class' => 'img-responsive'));?></a>
							<div class="overlay">
								<div class="inner-box">
									<?php if($socials = fortun_set($team_meta, 'bunch_team_social')): ?>
										<ul class="social">
											
											<?php foreach($socials as $key => $value):?>
												<li><a href="<?php echo esc_url(fortun_set($value, 'social_link'));?>"><i class="fa <?php echo esc_attr(fortun_set($value, 'social_icon'));?>"></i></a></li>
											<?php endforeach;?>
											
										</ul>
									<?php endif;?>
								</div>
									
							</div>
						</figure>
						<div class="author-info text-center">
							<h4><?php the_title();?></h4>
							<a href="<?php echo esc_url(fortun_set($team_meta, 'ext_url')); ?>"><p class="position"><?php echo wp_kses_post(fortun_set($team_meta, 'designation')); ?></p></a>
						</div>
							
					</div>
				</div>
			<?php endwhile; ?>
                
        </div>
    </div>

</section>

<?php endif; ?>

<?php wp_reset_postdata();