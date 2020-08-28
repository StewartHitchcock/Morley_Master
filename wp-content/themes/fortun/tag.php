<?php fortun_bunch_global_variable();
	$options = _WSH()->option();
	get_header(); 
	$meta = _WSH()->get_term_meta( '_bunch_category_settings' );
	if(fortun_set($_GET, 'layout_style')) $layout = fortun_set($_GET, 'layout_style'); else
	$layout = fortun_set( $meta, 'layout', 'right' );
	$sidebar = fortun_set( $meta, 'sidebar', 'blog-sidebar' );
	$view = fortun_set( $meta, 'view', 'list' ) ? fortun_set( $meta, 'view', 'list' ) : 'list';
	_WSH()->page_settings = array('layout'=>$layout, 'sidebar'=>$sidebar);

	$classes = ( !$layout || $layout == 'full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12' : ' col-lg-8 col-md-8 col-sm-12 col-xs-12 ';
	$bg = (fortun_set($meta, 'header_img')) ? fortun_set($meta, 'header_img') : get_template_directory_uri().'/images/background/1.jpg';
	$title = fortun_set($meta, 'header_title');
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