<?php  $count = 1;
$query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['services_category'] = $cat;
$query = new WP_Query($query_args) ; 
?>

<?php if($query->have_posts()):  ?>  

<section class="why-choose sec-padd">
    <div class="container">
        <div class="section-title center">
            <h2><?php echo wp_kses_post($title);?></h2>
        </div>
        <div class="row">
            
			<?php while($query->have_posts()): $query->the_post();
				global $post; 
				$services_meta = _WSH()->get_meta();?>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="item">
						<figure class="img-box">
							<a href="<?php echo esc_url(fortun_set($services_meta, 'ext_url')); ?>"><?php the_post_thumbnail('fortun_370x250', array('class' => 'img-responsive'));?></a>
							<div class="overlay-box">
								<div class="inner-box">
									<div class="icon_box">
										<span class="<?php echo str_replace("icon ", "", fortun_set($services_meta, 'fontawesome'));?>"></span>
									</div>
									<h4><?php the_title();?></h4>
									<div class="text">
										<p><?php echo wp_kses_post(fortun_trim(get_the_content(), $text_limit));?> </p>
									</div>
								</div>
							</div>
						</figure>  
					</div>
				</div>
			<?php endwhile; ?>
           
        </div>
    </div>
</section>

<?php endif; ?>

<?php wp_reset_postdata();