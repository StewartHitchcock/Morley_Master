<?php  $count = 1;
$query_args = array('post_type' => 'bunch_projects' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
if( $cat ) $query_args['projects_category'] = $cat;
$query = new WP_Query($query_args) ; 
?>

<?php if($query->have_posts()):  ?>  

<section class="latest-project sec-padd">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12">
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
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="latest-project-carousel owl-carousel owl-theme">
                    
					<?php while($query->have_posts()): $query->the_post();
						global $post; 
						$projects_meta = _WSH()->get_meta();?>
						<div class="item">
							<div class="single-latest-project-carousel">
								<div class="img-box">
									<?php the_post_thumbnail('fortun_270x221', array('class' => 'img-responsive'));?>
									<div class="overlay">
										<div class="box">
											<div class="content">
												<div class="top">
													<a href="<?php echo esc_url(fortun_set($projects_meta, 'ext_url')); ?>"><i class="fa fa-link"></i></a>
												</div><!-- /.top -->
												<div class="bottom">
													<div class="title center">
														<h3><?php the_title();?></h3>
														<?php /* for categories without anchor*/
															$term_list = wp_get_post_terms(get_the_id(), 'projects_category', array("fields" => "names")); ?>
														<span><?php echo implode( ', ', (array)$term_list );?></span>
													</div>
												</div>
											</div><!-- /.content -->
										</div><!-- /.box -->
									</div><!-- /.overlay -->
								</div><!-- /.img-box -->
							</div><!-- /.single-latest-project-carousel -->
						</div>
					<?php endwhile; ?>
                    
                </div>
            </div>
        </div>
                
    </div>
</section>

<?php endif; ?>

<?php wp_reset_postdata();