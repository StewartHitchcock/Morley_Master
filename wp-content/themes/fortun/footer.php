<?php $options = get_option('fortun'.'_theme_options');?>
<div class="clearfix"></div>
<?php if(!(fortun_set($options, 'hide_whole_footer'))):?>
	<footer class="main-footer">
		
		<?php if(!(fortun_set($options, 'hide_upper_footer'))):?>
			<!--Widgets Section-->
            <?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
			<div class="widgets-section">
				<div class="container">
                    <div class="row">
                        <!--Big Column-->
                        <div class="big-column col-md-12 col-sm-12 col-xs-12">
                            <div class="row clearfix">
                                
                                <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                                
                            </div>
                        </div>
                     </div>
                </div>
			</div>
            <?php } ?>
		<?php endif;?>
		 
		 <?php if(!(fortun_set($options, 'hide_bottom_footer'))):?>
			 <!--Footer Bottom-->
			 <section class="footer-bottom">
				<div class="container">
					<?php if(fortun_set($options, 'copyright')): ?>
						<div class="pull-left copy-text">
							<p><?php echo wp_kses_post(fortun_set($options, 'copyright'));?></p>
							
						</div><!-- /.pull-right -->
					<?php endif;?>
					<?php if(!(fortun_set($options, 'hide_footer_nav'))): ?>
						<div class="pull-right get-text">
							<ul>
								<?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'container_id' => 'navbar-collapse-1',
											'container_class'=>'navbar-collapse collapse navbar-right',
											'menu_class'=>'nav navbar-nav',
											'fallback_cb'=>false, 
											'items_wrap' => '%3$s', 
											'container'=>false,
											'depth' => 1,
											'walker'=> new Bunch_Bootstrap_walker()  
								) ); ?>
							</ul>
						</div><!-- /.pull-left -->
					<?php endif;?>
				</div><!-- /.container -->
			</section>
		<?php endif;?>
		 
	</footer>
<?php endif;?>

<!-- Scroll Top Button -->
	<button class="scroll-top tran3s color2_bg">
		<span class="fa fa-angle-up"></span>
	</button>
	
	<?php if(fortun_set($options, 'preloader')): ?>
		<!-- pre loader  -->
		<div class="preloader"></div>
	<?php endif;?>


</div>
<?php wp_footer(); ?>	
</body>
</html>