<?php fortun_bunch_global_variable();
	$options = _WSH()->option();
	get_header(); 
	$settings  = _WSH()->option(); 
	if(fortun_set($_GET, 'layout_style')) $layout = fortun_set($_GET, 'layout_style'); else
	$layout = fortun_set( $settings, 'search_page_layout', 'right' );
	$sidebar = fortun_set( $settings, 'search_page_sidebar', 'blog-sidebar' );
	_WSH()->page_settings = array('layout'=>$layout, 'sidebar'=>$sidebar);
	$classes = ( !$layout || $layout == 'full' || fortun_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-8 col-md-8 col-sm-12 col-xs-12 ' ;

	$bg = (fortun_set($settings, 'search_page_header_img')) ? fortun_set($settings, 'search_page_header_img') : get_template_directory_uri().'/images/background/1.jpg';
	$title = fortun_set($settings, 'search_page_header_title');
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
			
			<?php if(have_posts()):?>
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
			<?php else: ?>
                <div class="<?php echo esc_attr($classes);?> blog_post_area eco-search">
                    <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'fortun' ); ?></p>
                    <br>
                    <aside>
                    	<?php get_search_form(); ?>
                    </aside>
                </div>
			<?php endif; ?>
			
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