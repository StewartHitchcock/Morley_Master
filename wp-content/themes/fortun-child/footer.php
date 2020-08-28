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



						<div class="pull-left copy-text footer-layout">
							<div class="footer-left">
								<img class = "logo" src= "\wp-content/themes/fortun-child/img/MVSH-Logo.jpg" alt="Morley Village Sports Hall Logo" />
							</div>

							<div class="footer-contact">
								
								<p>Contact us to arrange a booking or a visit: <br>
								<a href="mailto:morleyvillageandsportshall@gmail.com">morleyvillageandsportshall@gmail.com</a></p>
								<p><a href="tel:07783153408"><i class="fas fa-phone-square-alt"> 07783 153408</a></p>
								<address>
									Morley Village & Sports Hall<br>
									Golf Links Road<br>
									Morley<br>
									Wymondham<br>
									Norfolk<br>
									NR18 9SU
								</address>
								<p>Registered Charity No: 1001967</p>
							</div>

							<div class = "footer-social">
									<a href="www.facebook.com/MorleyVillageHall"><i class="fab fa-facebook-f"></i></a>
									<a href="www.twitter.com/morleysporthall"><i class="fab fa-twitter"></i></a>
									<a href="www.instagram.com/morleyvillageandsportshall "><i class="fab fa-instagram"></i></a>
							</div>
						</div>
						<p class="sponsor-text">Our Sponsors, Funders & Partners:</p>
						<div class="footer-sponsor">
							<div class=background-sponsor>
								<img src="\wp-content\themes\fortun-child\img\CAN.jpg" alt = "Community Action Norfolk" class="sponsor"> 
							</div>
							<div class=background-sponsor>
								<img src="\wp-content\themes\fortun-child\img\SAFFRON.jpg" alt="Saffron Community Foundation" class="sponsor"> 
							</div>
							<div class=background-sponsor>
								<img src="\wp-content\themes\fortun-child\img\visitEngland.jpg" alt = "Visit England Logo" class="sponsor"/>
							</div>
							<br>	
							<div class=background-sponsor>
								<img src="\wp-content\themes\fortun-child\img\ITS WISP.png" alt = "WISP" class="sponsor-long"> 
							</div>	
							<div class=background-sponsor>
								<img src="\wp-content\themes\fortun-child\img\South Norfolk Council Logo.png" alt = "South Norfolk Council" class="sponsor-long"> 
							<div>	
						</div> 



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