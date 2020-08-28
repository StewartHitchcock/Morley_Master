<?php $options = _WSH()->option();
	get_header();
	$settings  = fortun_set(fortun_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true) , 'bunch_page_options') , 0);
	$meta = _WSH()->get_meta('_bunch_layout_settings');
	$meta1 = _WSH()->get_meta('_bunch_header_settings');
	if(fortun_set($_GET, 'layout_style')) $layout = fortun_set($_GET, 'layout_style'); else
	$layout = fortun_set( $meta, 'layout', 'full' );
	$sidebar = fortun_set( $meta, 'sidebar', 'blog-sidebar' );
	$classes = ( !$layout || $layout == 'full' || fortun_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-8 col-md-8 col-sm-12 col-xs-12 ' ;

	$bg = (fortun_set($meta1, 'header_img')) ? fortun_set($meta1, 'header_img') : get_template_directory_uri().'/images/background/1.jpg';
	$title = fortun_set($meta1, 'header_title');
?>



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
					<?php while( have_posts() ): the_post();?>
						<?php the_content(); ?>
                        <div class="clearfix"></div>
                        <?php comments_template(); ?><!-- end comments -->
                        <?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'fortun'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
					<?php endwhile;?>
					</div>
                    <?php fortun_the_pagination(); ?>

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