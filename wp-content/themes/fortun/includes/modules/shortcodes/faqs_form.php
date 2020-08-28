<?php  $count = 1;
$query_args = array('post_type' => 'bunch_faqs' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['faqs_category'] = $cat;
$query = new WP_Query($query_args) ; 
?>

<?php if($query->have_posts()):  ?>  

<section class="about-faq">
    <div class="container">
        <div class="row">
            
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="sec-padd">
                    <div class="accordion-box style-2">
                        
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
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="default-form-area sec-padd-top single-faq-bg">
                    <h3><?php echo wp_kses_post($form_title);?></h3>
                    
					<div id="contact_form" class="default-form">
						<?php echo do_shortcode($contact_form); ?>
					</div>
                    <br><br>
                </div>

            </div>

        </div>
    </div>
</section>

<?php endif; ?>

<?php wp_reset_postdata();