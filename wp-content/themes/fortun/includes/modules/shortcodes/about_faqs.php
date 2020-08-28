<?php  $count = 1;
$query_args = array('post_type' => 'bunch_faqs' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['faqs_category'] = $cat;
$query = new WP_Query($query_args) ; 
?>

<?php if($query->have_posts()):  ?>  

<section class="about-faq sec-padd">
    <div class="container">
        <div class="section-title center">
            <h2><?php echo wp_kses_post($title);?></h2>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="about-info">
                    <h4><?php echo wp_kses_post($subtitle);?></h4>
                    <br>
                    <div class="text">
                        <?php echo wp_kses_post($text);?>
                    </div>

                    <div class="link_btn">
                        <?php $btlink = explode("|", $btn_link); ?>
						<a href="<?php echo esc_url($btlink[0]);?>" target="<?php echo esc_attr($btlink[2]);?>" class="thm-btn"><?php echo wp_kses_post($btn_title);?></a>
                        <div class="sign"><img src="<?php echo esc_url($sign_img);?>" alt="<?php esc_attr_e('image', 'fortun');?>"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="accordion-box">
                    
					<?php while($query->have_posts()): $query->the_post();
						global $post; 
						$faqs_meta = _WSH()->get_meta();?>
						<!--Start single accordion box-->
						<div class="accordion animated out" data-delay="0" data-animation="fadeInUp">
							<div class="acc-btn <?php if($count == 1) echo 'active'; ?>">
								<p class="title"><?php the_title();?></p>
								<div class="toggle-icon">
									<i class="plus fa fa-angle-right"></i><i class="minus fa fa-angle-down"></i>
								</div>
							</div>
							<div class="acc-content <?php if($count == 1) echo 'collapsed';?>">
								<div class="text"><p>
									<?php echo wp_kses_post(fortun_trim(get_the_content(), $text_limit));?> 
								</p></div>
							</div>
						</div>
					<?php $count++;
						endwhile; ?>
                    
                </div>
            </div>
            
        </div>
    </div>
</section>

<?php endif; ?>

<?php wp_reset_postdata();