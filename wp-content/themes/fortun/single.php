<?php $options = _WSH()->option();
	get_header(); 
	$settings  = fortun_set(fortun_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true) , 'bunch_page_options') , 0);
	$meta = _WSH()->get_meta('_bunch_layout_settings');
	$meta1 = _WSH()->get_meta('_bunch_header_settings');
	$meta2 = _WSH()->get_meta();
	_WSH()->page_settings = $meta;
	if(fortun_set($_GET, 'layout_style')) $layout = fortun_set($_GET, 'layout_style'); else
	$layout = fortun_set( $meta, 'layout', 'full' );
	if( !$layout || $layout == 'full' || fortun_set($_GET, 'layout_style')=='full' ) $sidebar = ''; else
	$sidebar = fortun_set( $meta, 'sidebar', 'blog-sidebar' );
	$classes = ( !$layout || $layout == 'full' || fortun_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-8 col-md-8 col-sm-12 col-xs-12 ' ;
	/** Update the post views counter */
	_WSH()->post_views( true );
	
	$bg = (fortun_set($meta1, 'header_img')) ? fortun_set($meta1, 'header_img') : get_template_directory_uri().'/images/background/1.jpg';
	$title = fortun_set($meta1, 'header_title');
?>

<div class="inner-banner has-base-color-overlay text-center" <?php if($bg):?>style="background: url(<?php echo esc_url($bg)?>);"<?php endif;?>>
    <div class="container">
        <div class="box">
            <h3><?php if($title) echo wp_kses_post($title); else wp_title('');?></h3>
        </div><!-- /.box -->
    </div><!-- /.container -->
</div>

<div class="breadcumb-wrapper">
    <div class="container">
        <div class="pull-left">
            <?php echo wp_kses_post(fortun_get_the_breadcrumb()); ?>
        </div><!-- /.pull-left -->
    </div><!-- /.container -->
</div>

<div class="sidebar-page-container sec-padd">
    <div class="container">
        <div class="row">
            
			<?php if( $layout == 'left' ): ?>
				<?php if ( is_active_sidebar( $sidebar ) ) { ?>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="blog-sidebar">
							 <?php dynamic_sidebar( $sidebar ); ?>
						</div> <!-- End of .wrapper -->   
					</div>
				<?php } ?>
			<?php endif; ?>
			
			<div class="<?php echo esc_attr($classes);?>">
                <section class="blog-section">
					<div class="thm-unit-test">
					<?php while( have_posts() ): the_post(); 
						$post_meta = _WSH()->get_meta();
					?>
                    <div class="large-blog-news single-blog-post single-blog wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="img-box">
                            <a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_post_thumbnail('fortun_770x420', array('class' => 'img-responsive'));?></a>
                        </div>
                        <div class="lower-content">
                            <h5><?php the_category(', '); ?></h5>
                            <div class="post-meta"><?php esc_html_e('by', 'fortun'); ?> <?php the_author(); ?>  |  <?php echo get_the_date('F d, Y');?>  |  <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></div>
                        </div>
                        
                        <div class="text">
                            <?php the_content();?>
                            <div class="clearfix"></div>
                            <?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'fortun'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                        </div>
                    </div>
                    <div class="share-box clearfix">
                        <ul class="tag-box pull-left">
                            <li><?php the_tags( 'Tags : ', ', ', '' ); ?></li>
							
                        </ul>
                        <div class="social-box pull-right">
							<span><?php esc_html_e('Share', 'fortun'); ?> <i class="fa fa-share-alt"></i></span>
							<ul class="list-inline social">
								<li><a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url(get_permalink(get_the_id())); ?>"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/share?url=<?php echo esc_url(get_permalink(get_the_id())); ?>&text=<?php echo esc_attr($post_slug=$post->post_name); ?>"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://plus.google.com/share?url=<?php echo esc_url(get_permalink(get_the_id())); ?>"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="https://pinterest.com/pin/create/bookmarklet/?url=<?php echo esc_url(get_permalink(get_the_id())); ?>&description=<?php echo esc_attr($post_slug=$post->post_name); ?>"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <?php if(get_the_author_meta('description')):?>
                    <div class="post-author">
                        <div class="inner-box">
                            <figure class="author-thumb"><?php echo get_avatar( get_the_author_meta('get_the_id()'), 85); ?></figure>
                            <h4><?php the_author(); ?></h4>
                                <div class=""><p><?php the_author_meta( 'description', get_the_author_meta('ID') ); ?></p> 
                                <ul class="list-inline social">
                                    <?php if($value = get_the_author_meta('facebook') ): ?>
										<li>
											<a href="<?php echo esc_url($value); ?>"><i class="fa fa-facebook"></i></a>                              
										</li>
									<?php endif; ?>
									<?php if($value = get_the_author_meta('twitter') ): ?>
										<li>
											<a href="<?php echo esc_url($value); ?>"><i class="fa fa-twitter"></i></a>                               
										</li>
									<?php endif; ?>
									<?php if($value = get_the_author_meta('google-plus') ): ?>
										<li>
											<a href="<?php echo esc_url($value); ?>"><i class="fa fa-google-plus"></i></a>                               
										</li>
									<?php endif; ?>
									<?php if($value = get_the_author_meta('youtube') ): ?>
										<li>
											<a href="<?php echo esc_url($value); ?>"><i class="fa fa-youtube"></i></a>                               
										</li>
									<?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php endif;?>
					
					<?php comments_template(); ?>
                    
                    <?php endwhile;?>
                    </div>
                </section>

            </div>
			
			<?php if( $layout == 'right' ): ?>
				<?php if ( is_active_sidebar( $sidebar ) ) { ?>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div class="blog-sidebar">
							 <?php dynamic_sidebar( $sidebar ); ?>
						</div> <!-- End of .wrapper -->   
					</div>
				<?php } ?>
			<?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>