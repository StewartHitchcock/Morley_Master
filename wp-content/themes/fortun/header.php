<?php $options = _WSH()->option();
	fortun_bunch_global_variable();
	$icon_href = (fortun_set( $options, 'site_favicon' )) ? fortun_set( $options, 'site_favicon' ) : get_template_directory_uri().'/images/favicon/favicon.ico';
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!-- mobile responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ):?>
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url($icon_href);?>">
	<link rel="icon" type="image/png" href="<?php echo esc_url($icon_href);?>" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo esc_url($icon_href);?>" sizes="16x16">
<?php endif;?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="boxed_wrapper">

<header class="top-bar">
    <div class="container">
        <div class="clearfix">
            <ul class="top-bar-text float_left">
                <?php if(fortun_set($options, 'phone')): ?><li><i class="icon-technology-1"></i><?php echo wp_kses_post(fortun_set($options, 'phone')); ?></li><?php endif; ?>
                <?php if(fortun_set($options, 'email')): ?><li><i class="icon-note"></i><?php echo sanitize_email(fortun_set($options, 'email')); ?></li><?php endif; ?>
                <?php if(fortun_set($options, 'address')): ?><li><i class="icon-world"></i><?php echo wp_kses_post(fortun_set($options, 'address')); ?></li><?php endif; ?>
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
            <div class="col-md-3">
                <div class="main-logo">
					
					<?php if(fortun_set($options, 'logo_image')):?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(fortun_set($options, 'logo_image'));?>" alt="<?php esc_html_e('Fortune', 'fortun');?>" title="<?php esc_html_e('Fortune', 'fortun');?>"></a>
					<?php else:?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_template_directory_uri().'/images/logo/logo.png');?>" alt="<?php esc_html_e('Fortune', 'fortun');?>"></a>
					<?php endif;?>
                    
                </div>
            </div>
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
            <div class="right-column">
                <div class="right-area">
                    <div class="nav_side_content">
                        <?php if(fortun_set($options, 'head_search')): ?>
							<div class="search_option">
								<button class="search tran3s dropdown-toggle color1_bg" id="searchDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search" aria-hidden="true"></i></button>
								<?php get_template_part('searchform3')?>
						   </div>
					   <?php endif;?>
                       <?php if(fortun_set($options, 'head_cart')): ?>
							<?php global $woocommerce; ?>
							<div class="cart_select">
								<button><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="color1_bg">(<?php  echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'fortun'), $woocommerce->cart->cart_contents_count); ?>)</span></button>
							</div> <!-- End of .cart_select -->
						<?php endif;?>
                   </div>
				   <?php if(fortun_set($options, 'quote_link')): ?>
					   <div class="link_btn float_right">
						   <a href="<?php echo esc_url(fortun_set($options, 'quote_link'));?>" class="thm-btn"><?php esc_html_e('GET A Quote', 'fortun');?></a>
					   </div>
				   <?php endif;?>
                </div>
                    
            </div>
        </div>

   </div> <!-- End of .conatiner -->
</section>