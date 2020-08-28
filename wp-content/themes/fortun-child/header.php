<?php $options = _WSH()->option();
	fortun_bunch_global_variable();
	$icon_href = (fortun_set( $options, 'site_favicon' )) ? fortun_set( $options, 'site_favicon' ) : get_template_directory_uri().'/images/favicon/favicon.ico';
	$headerimg = "wp-content/themes/fortun-child/img/MVSH-Logo.jpg";
 ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!-- mobile responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php wp_head(); ?>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body <?php body_class(); ?>>

<div class="boxed_wrapper">

<header class="top-bar">
    <div class="container">
		
        <div class="clearfix">
            <ul class="top-bar-text float_left">

			<img class = "logo" src= '\wp-content\themes\fortun-child\img\MVSH-Logo.jpg'  alt="Morley Village Sports Hall Logo" />

				<li class = "head-text">
					<p><a href="www.calendarwiz.com/calendars/mvh">Check availability</a> <br>
					To make a booking or arrange a viewing: <br> 
					<a href="tel:07783153408"><i class="fas fa-phone"></i>07783 153408</a> 
					<a class="email" href="mailto:morleyvillageandsportshall@gmail.com"><i class="far fa-envelope"></i>morleyvillageandsportshall@gmail.com</a></p>
				</li>
				<li class = "icns">
					<a href="www.facebook.com/MorleyVillageHall"><i class="fab fa-facebook-f"></i></a>
					<a href="www.twitter.com/morleysporthall"><i class="fab fa-twitter"></i></a>
					<a href="www.instagram.com/morleyvillageandsportshall "><i class="fab fa-instagram"></i></a>
				</li>

            </ul>
			
			<?php if(fortun_set( $options, 'social_media' ) && is_array( fortun_set( $options, 'social_media' ) )): ?>
				<ul class="social float_right">
					
					<?php $social_icons = fortun_set( $options, 'social_media' );
						foreach( fortun_set( $social_icons, 'social_media' ) as $social_icon ):
						if( isset( $social_icon['tocopy' ] ) ) continue; ?>
						<li><a href="<?php echo esc_url(fortun_set( $social_icon, 'social_link')); ?>"><i class="fa <?php echo esc_attr(fortun_set( $social_icon, 'social_icon')); ?>"></i></a></li>
					<?php endforeach; ?>
					
				</ul>
			<?php endif;?>
			
        </div>
            

    </div>
</header>

<section class="theme_menu stricky">
    <div class="container">
        <div class="row">
         
            <div class="col-md-9 menu-column">
                <nav class="menuzord" id="main_menu">
                   <ul class="menuzord-menu">
                        <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
									'container_class'=>'navbar-collapse collapse navbar-right',
									'menu_class'=>'nav navbar-nav',
									'fallback_cb'=>false, 
									'items_wrap' => '%3$s', 
									'container'=>false,
									'walker'=> new Bunch_Bootstrap_walker()  
						) ); ?>
                    </ul><!-- End of .menuzord-menu -->
                </nav> <!-- End of #main_menu -->
            </div>

        </div>

   </div> <!-- End of .conatiner -->
</section>