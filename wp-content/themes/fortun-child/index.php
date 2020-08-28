<?php fortun_bunch_global_variable(); 
	$options = _WSH()->option();
	get_header(); 
	if( $wp_query->is_posts_page ) {
		$meta = _WSH()->get_meta('_bunch_layout_settings', get_queried_object()->ID);
		$meta1 = _WSH()->get_meta('_bunch_header_settings', get_queried_object()->ID);
		if(fortun_set($_GET, 'layout_style')) $layout = fortun_set($_GET, 'layout_style'); else
		$layout = fortun_set( $meta, 'layout', 'right' );
		$sidebar = fortun_set( $meta, 'sidebar', 'default-sidebar' );
		$bg = (fortun_set($meta1, 'header_img')) ? fortun_set($meta1, 'header_img') : get_template_directory_uri().'/images/background/1.jpg';
		$title = fortun_set($meta1, 'header_title');
	} else {
		$settings  = _WSH()->option(); 
		if(fortun_set($_GET, 'layout_style')) $layout = fortun_set($_GET, 'layout_style'); else
		$layout = fortun_set( $settings, 'archive_page_layout', 'right' );
		$sidebar = fortun_set( $settings, 'archive_page_sidebar', 'default-sidebar' );
		$bg = fortun_set($settings, 'archive_page_header_img');
		$title = fortun_set($settings, 'archive_page_header_title');
	}
	$layout = fortun_set( $_GET, 'layout' ) ? fortun_set( $_GET, 'layout' ) : $layout;
	$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
	_WSH()->page_settings = array('layout'=>'right', 'sidebar'=>$sidebar);
	$classes = ( !$layout || $layout == 'full' || fortun_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-8 col-md-8 col-sm-12 col-xs-12 ';
	?>
	
<div class="inner-banner has-base-color-overlay text-center" <?php if($bg):?>style="background: url(<?php echo esc_url($bg)?>);"<?php endif;?>>
	<div class="container">
		<div class="box">
			<h3><?php esc_html_e('Latest Posts', 'fortun');?></h3>
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
					<?php while( have_posts() ): the_post();?>
						<div id="post-<?php the_ID(); ?>" <?php post_class('large-blog-news wow fadeInUp animated');?> style="visibility: visible; animation-name: fadeInUp;">
							<?php get_template_part( 'blog' ); ?>
						</div>
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