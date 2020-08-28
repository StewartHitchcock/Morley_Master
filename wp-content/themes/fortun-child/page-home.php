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

<div class="inner-banner has-base-color-overlay text-center" <?php if($bg):?>style="background: url(<?php echo esc_url($bg)?>);"<?php endif;?>>
    <div class="container">
        <div class="box">
			<img src="wp-content\themes\fortun-child\img\Morley Hall.jpeg" alt="Morley Village and Sports Hall"/>
        </div>
    </div>
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
			<div class = "homepage-content">
					
				<p>Welcome to Morley Test Village & Sports Hall a modern, multipurpose community venue in South Norfolk. We are situated in the pretty village of Morley just off the A11 in 5 acres of lovely grounds with two beautiful churches nearby.</p> <br>
				<p>Whether you’re seeking space for a wedding, party, event, sports, meeting, training course, or a pop-up office for the day, Morley Village & Sports Hall has rooms with flexible seating layouts, sports facilities including indoor climbing wall, badminton court and table tennis, playing field, football pitch (home to <a href="https://www.morleyyouthfc.com">Morley Youth Football Club</a>) and WiFi to suit all your needs. Accommodating groups of 2-250 people we offer hourly rates, block bookings, Wedding & Celebration Packages and ample free parking to make your booking affordable, enjoyable and stress free. The hall has a modern radiant gas heating system, baby changing facilities and is accessible in all downstairs public areas to wheelchair users and those with mobility difficulties. </p> <br>
				<p>There are a large number of clubs, societies and groups that meet regularly offering a wide and diverse range of activities for members of the community and the surrounding areas details <a href="">here.</a></p> <br>
				<p>Our Bookings Clerk will work closely with you throughout your booking, ensuring that all your requirements are met and can recommend suppliers from marquees, bouncy castles, bars, caterers to entertainers etc. </p> <br>

			</div>
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
		
				

				<i class="fas fa-wifi"></i>
				<i class="fas fa-chalkboard-teacher"></i>
				<p>projector</p>
				<i class="fas fa-parking"></i>
				<i class="fas fa-chart-line"></i>
				<i class="fas fa-utensils"></i>
				<i class="fas fa-train"></i>
				
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