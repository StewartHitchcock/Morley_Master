<?php  $count = 1;
$query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['services_category'] = $cat;
$query = new WP_Query($query_args) ; 
?>

<?php if($query->have_posts()):  ?>  

<section class="our-services style-2">
    <div class="container"> 
        <div class="row">
		
			<?php while($query->have_posts()): $query->the_post();
				global $post; 
				$services_meta = _WSH()->get_meta();?>
				<div class="col-md-4 col-sm-6">
					<div class="single-our-service">
						<figure class="img-box">
							<a href="<?php echo esc_url(fortun_set($services_meta, 'ext_url')); ?>"><?php the_post_thumbnail('fortun_370x200', array('class' => 'img-responsive'));?></a>
						</figure>
						<div class="text-box">
							<a href="<?php echo esc_url(fortun_set($services_meta, 'ext_url')); ?>"><h4><?php the_title();?></h4></a>
							<p><?php echo wp_kses_post(fortun_trim(get_the_content(), $text_limit));?></p>
						</div>
							
					</div>
				</div>
			<?php endwhile; ?>
			
        </div>
    </div>
</section>

<?php endif; ?>

<?php wp_reset_postdata();