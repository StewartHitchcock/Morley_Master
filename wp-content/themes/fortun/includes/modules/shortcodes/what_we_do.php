<?php  $count = 1;
$query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['services_category'] = $cat;
$query = new WP_Query($query_args) ; 
?>

<?php if($query->have_posts()):  ?>  

<section class="service">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="about-info sec-padd">
                    <div class="section-title">
                        <h2><?php echo wp_kses_post($title);?></h2>
                    </div>
                    <div class="text">
                        <p><?php echo wp_kses_post($text);?></p>
                    </div>
                    <div class="link">
                        <?php $btlink = explode("|", $btn_link); ?>
						<a href="<?php echo esc_url($btlink[0]);?>" target="<?php echo esc_attr($btlink[2]);?>" class="default_link"><?php echo wp_kses_post($btn_title);?> <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
			
			<?php while($query->have_posts()): $query->the_post();
				global $post; 
				$services_meta = _WSH()->get_meta();?>
				<div class="no-padd item col-md-3 col-sm-6 col-xs-12">
					<div class="center">
						<div class="icon_box">
							<span class="<?php echo str_replace("icon ", "", fortun_set($services_meta, 'fontawesome'));?>"></span>
							<h4><?php the_title();?></h4>
						</div>
					</div>
					<div class="overlay-box center">
						<div class="icon_box">
							<span class="<?php echo str_replace("icon ", "", fortun_set($services_meta, 'fontawesome'));?>"></span>
							<h4><?php the_title();?></h4>
						</div>
						<div class="text">
							<p><?php echo wp_kses_post(fortun_trim(get_the_content(), $text_limit));?> </p>
						</div>
						<div class="link">
							<a href="<?php echo esc_url(fortun_set($services_meta, 'ext_url')); ?>" class="default_link"><?php esc_html_e('read more', 'fortun'); ?> <i class="fa fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
            
        </div>
    </div>
</section>

<?php endif; ?>

<?php wp_reset_postdata();