<?php  $count = 1;
$query_args = array('post_type' => 'bunch_testimonials' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['testimonials_category'] = $cat;
$query = new WP_Query($query_args) ; 
?>

<?php if($query->have_posts()):  ?>  

<section class="testimonials sec-padd-top">
    <div class="container"> 
        <div class="row">
		
			<?php while($query->have_posts()): $query->the_post();
				global $post;
				$testimonials_meta = _WSH()->get_meta();?>
				<div class="col-md-3 col-sm-4 col-xs-6">
					<div class="single-testimonial center">
						<figure class="img-box">
							<a href="<?php echo esc_url(fortun_set($testimonials_meta, 'ext_url')); ?>"><?php the_post_thumbnail('fortun_85x85', array('class' => 'img-responsive'));?></a>
						</figure>
						<div class="content">
							
							<div class="text"><p> <?php echo wp_kses_post(fortun_trim(get_the_content(), $text_limit));?> </p></div>
	
							<h4><?php the_title();?></h4>
							<p class="author-title"><a href="<?php echo esc_url(fortun_set($testimonials_meta, 'ext_url')); ?>"> <?php echo wp_kses_post(fortun_set($testimonials_meta, 'designation')); ?></a></p>
						</div>
						
					</div>
				</div>
			<?php endwhile; ?>
            
        </div>
    </div>
</section>

<?php endif; ?>

<?php wp_reset_postdata();