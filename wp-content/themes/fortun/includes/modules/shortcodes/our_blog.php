<?php  
global $post;
$count = 0;
$query_args = array('post_type' => 'post' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order,);
if( $cat ) $query_args['category'] = $cat;
$query = new WP_Query($query_args) ; 
?>

<?php if($query->have_posts()):  ?>   

<section class="blog-section sec-padd-top">
    <div class="container">
        <div class="section-title center">
            <h2><?php echo wp_kses_post($title); ?></h2>
        </div>
        <div class="row">
		
			<?php while($query->have_posts()): $query->the_post();
				global $post; 
				$post_meta = _WSH()->get_meta();?>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="default-blog-news wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
						<div class="img-box">
							<a href="<?php esc_url(get_permalink(get_the_id()));?>"><?php the_post_thumbnail('fortun_370x200', array('class' => 'img-responsive'));?></a>
						</div>
						<div class="lower-content">
							<div class="post-meta"><?php esc_html_e('by', 'fortun'); ?> <?php the_author(); ?>  |  <?php echo get_the_date('F d, Y');?></div>
							<div class="text">
								<h4><a href="<?php esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?></a></h4>
								<p><?php echo wp_kses_post(fortun_trim(get_the_content(), $text_limit));?></p>                            
							</div>
							
						</div>
					</div>
					
				</div>
			<?php endwhile;?>
            
        </div>
    </div>
</section>

<?php endif; ?>

<?php wp_reset_postdata(); ?>