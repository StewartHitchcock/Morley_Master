<?php  $count = 1;
$query_args = array('post_type' => 'bunch_testimonials' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['testimonials_category'] = $cat;
$query = new WP_Query($query_args) ; 
?>

<?php if($query->have_posts()):  ?>  

<section class="testimonials-section sec-padd">
    <div class="container">
        <div class="section-title center">
            <h2><?php echo wp_kses_post($title);?></h2>
        </div> 
        
        <!--Slider-->      
        <div class="testimonials-slider column-carousel three-column">
            
            <?php while($query->have_posts()): $query->the_post();
				global $post; 
				$testimonials_meta = _WSH()->get_meta();?>
				<!--Slide-->
				<article class="slide-item">
					<div class="quote"><span class="icon-left"></span></div>
					<div class="author">
						<div class="img-box">
							<a href="<?php echo esc_url(fortun_set($testimonials_meta, 'ext_url')); ?>"><?php the_post_thumbnail('fortun_80x80', array('class' => 'img-responsive'));?></a>
						</div>
						<h4><?php the_title();?></h4>
						<a href="<?php echo esc_url(fortun_set($testimonials_meta, 'ext_url')); ?>"><p><?php echo wp_kses_post(fortun_set($testimonials_meta, 'designation')); ?></p></a>
					</div>
					
					<div class="slide-text">
						<p><?php echo wp_kses_post(fortun_trim(get_the_content(), $text_limit));?></p>
					</div>
				</article>
			<?php endwhile; ?>
                 
        </div>
        
    </div>    
</section>

<?php endif; ?>

<?php wp_reset_postdata();