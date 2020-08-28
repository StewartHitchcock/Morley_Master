<?php  $count = 1;
$query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['services_category'] = $cat;
$query = new WP_Query($query_args) ; 
?>

<?php if($query->have_posts()):  ?>  

<section class="growth-service style-2 sec-padd">
    <div class="container">
        <div class="section-title center">
            <h2><?php echo wp_kses_post($title);?></h2>
        </div>
        <div class="row">
            
			<?php while($query->have_posts()): $query->the_post();
				global $post; 
				$services_meta = _WSH()->get_meta();?>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="item center <?php if($count%2 == 0) echo 'active' ?>">
						<div class="icon_box">
							<span class="<?php echo str_replace("icon ", "", fortun_set($services_meta, 'fontawesome'));?>"></span>
						</div>
						<h4><?php the_title();?></h4>
						<p><?php echo wp_kses_post(fortun_trim(get_the_content(), $text_limit));?></p>
					</div>
				</div>
			<?php $count++;
				endwhile; ?>
            
        </div>
    </div>
</section>

<?php endif; ?>

<?php wp_reset_postdata();