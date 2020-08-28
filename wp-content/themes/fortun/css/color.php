<?php


/** Set ABSPATH for execution */
define( 'ABSPATH', dirname(dirname(__FILE__)) . '/' );
define( 'WPINC', 'wp-includes' );


/**
 * @ignore
 */
function add_filter() {}

/**
 * @ignore
 */
function esc_attr($str) {return $str;}

/**
 * @ignore
 */
function apply_filters() {}

/**
 * @ignore
 */
function get_option() {}

/**
 * @ignore
 */
function is_lighttpd_before_150() {}

/**
 * @ignore
 */
function add_action() {}

/**
 * @ignore
 */
function did_action() {}

/**
 * @ignore
 */
function do_action_ref_array() {}

/**
 * @ignore
 */
function get_bloginfo() {}

/**
 * @ignore
 */
function is_admin() {return true;}

/**
 * @ignore
 */
function site_url() {}

/**
 * @ignore
 */
function admin_url() {}

/**
 * @ignore
 */
function home_url() {}

/**
 * @ignore
 */
function includes_url() {}

/**
 * @ignore
 */
function wp_guess_url() {}

if ( ! function_exists( 'json_encode' ) ) :
/**
 * @ignore
 */
function json_encode() {}
endif;



/* Convert hexdec color string to rgb(a) string */
 
function hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}
$yellow = $_GET['main_color'];

ob_start(); ?>







.thm-btn,
.section-title:before,
.scroll-top,
.default-form.register-form .link_2 .fancy_video,
.rev_slider_wrapper .slide-content-box .button a.thm-btn.our-solution:hover,
.main-footer .links-widget .list li:hover a:before,
.why-choose .icon_box,
.large-blog-news .lower-content .thm-btn:hover,
.sidebar-archive  .dropdown-menu>li>a:focus,
.dropdown-menu>li>a:hover,
.share-box .social a:hover,
.single-latest-project-carousel .img-box .overlay .bottom,
.clients-section .tooltip-inner,
.service .item .overlay-box,
.service-catergory li.active,
.brochures-lists li,
.growth-service.style-2 .item.active,
.growth-service.style-2 .item:hover,
.benifit li:after,
.fact-counter .count-outer:before,
.default-form  .dropdown-menu>li>a:focus,
.dropdown-menu>li>a:hover,
.service-contact,
.cart-table tbody .available-info .icon,
.cart-section .thm-btn.update-cart:hover,
.checkout-area .exisitng-customer:before,
.checkout-area .coupon:before,
.checkout-area .table .cart-table tbody tr .qty .btn-default,
.sidebar_search button,
.sidebar_tags ul li a:hover,
.single-sidebar.price-ranger .ui-slider-handle,
.single-sidebar.price-ranger .ranger-min-max-block input[type='submit'],
.page_pagination li a.active,
.page_pagination li a:hover,
.page_pagination li span.current,
.product-content-box .content-box .location-box form button:hover,
.product-tab-box .tab-menu li.active a,
.product-tab-box .tab-menu li:hover a,
.our-services .single-our-service .thm-btn:hover,
.awards,
.two-column .owl-dots .owl-dot.active span,
.two-column .owl-dots .owl-dot:hover span,
.three-column .single-our-service .img-box .count,
.three-column .single-our-service .thm-btn:hover,
.tagcloud a:hover,
.paginate-links a:hover,
.paginate-links > span,
.post-password-form input[type="submit"],
.woocommerce #review_form #respond .form-submit input,
.woocommerce #review_form #respond .form-submit input:hover,
form.cart button.add-to-cart,
.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
.woocommerce #respond input#submit,
.woocommerce a.button,
.woocommerce button.button,
.woocommerce input.button,
.woocommerce #place_order,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
.awards:after,
.section-title:before,
.menuzord .showhide span
{
	background-color: #<?php echo esc_attr($yellow); ?>;
}




.default_link,
.default_link:hover,
.thm-btn:hover,
.top-bar .top-bar-text li i,
.top-bar .social li a:hover,
.menuzord-menu ul.dropdown li:hover > a,
.default-form.register-form .thm-color:hover,
.default-form.register-form .thm-color-2:hover,
.menuzord-menu ul.megamenu-dropdown li a:hover,
.nav_side_content .cart_select>button span,
.nav_side_content .search_option form button,
.main-footer .posts-widget .post .time,
.main-footer .links-widget .list li a:hover,
.footer-bottom .copy-text a,
.footer-bottom .get-text ul li a:hover,
.breadcumb-wrapper ul,
.breadcumb-wrapper li,
.breadcumb-wrapper a.get-qoute,
.why-choose .item:hover .overlay-box h4,
.default-blog-news .lower-content h4 a:hover,
.large-blog-news .lower-content h5,
.large-blog-news .lower-content h4 a:hover,
.large-blog-news .lower-content .thm-btn,
.category-style-one ul li a:hover,
.popular-post .item a:hover,
.single-blog-post .author-comment p.a-title,
.share-box .tag-box a,
.share-box .tag-box a:hover,
.product-review-tab .add_your_review ul.rating:hover li,
.product-review-tab .add_your_review ul.rating.active li,
.single-project-item .img-box .overlay .box .content ul.list-inline li a,
.testimonials-section .author p,
.testimonials-section .owl-theme .owl-prev i:hover,
.testimonials-section .owl-theme .owl-next i:hover,
.clients-section .owl-theme .owl-nav [class*=owl-]:hover,
.service .item .icon_box span,
.service-catergory li a:hover,
.service-single blockquote,
.growth-service .item span,
.accordion .acc-btn.active p,
.accordion-box .accordion .acc-btn .toggle-icon .minus::before,
.default-cinfo li .icon_box i,
.default-form .alert-success,
.author-details .item .content p i,
.author-details .item .content h5,
.single-team-member a p,
.single-testimonial p a,
.single-project:hover .title h5,
.single-project .img-box .overlay .top li a:hover,
.post-filter li:hover span,
.post-filter li.active span,
.inform-list li span,
.client-information .title,
.service-contact .thm-btn,
.service-contact .thm-btn:hover,
.cart-table tbody tr .sub-total,
.cart-table tbody tr .remove-btn:hover,
.cart-section .cart-table .bootstrap-touchspin .input-group-btn-vertical i,
.checkout-area .exisitng-customer h5 a,
.checkout-area .coupon h5 a,
.checkout-area .create-acc .checkbox label,
.checkout-area .table .cart-table tbody tr td.price,
.cart-total-table li span.col b,
.cart-total .payment-options .option-block .checkbox label span b,
.single-shop-item .thm-btn:hover,
.single-shop-item .content-box .rating,
.single-shop-item .content-box .item-price,
.sidebar_categories ul li a:hover,
.best_sellers .best_selling_item .text ul li,
.best_sellers .best_selling_item .text span,
.product-content-box .content-box .review-box ul li i,
.product-content-box .content-box span.price,
.product-content-box .content-box .location-box form span,
.single-review-box .text-holder .top .review-box ul li i,
.review-form .add-rating-box ul li.active a i,
.review-form .add-rating-box ul li a:hover i,
.our-services .single-our-service:hover h4,
.our-services .single-our-service .thm-btn,
.two-column .content .date,
.subscribe-form span,
.three-column .single-our-service:hover h4,
.three-column .single-our-service .thm-btn,
.large-blog-news .thm-unit-test h5 a,
.post-author .social li a:hover,
.sidebar-widget ul li:hover a,
.sidebar-widget ul li:hover,
.error_page h3 span,
a,
.woocommerce.widget ul.product_list_widget li .amount,
.woocommerce .woocommerce-info a,
.woocommerce .woocommerce-error::before,
.woocommerce .star-rating span,
form.cart button.add-to-cart:hover,
.woocommerce p.stars a,
.woocommerce .woocommerce-message::before,
.woocommerce #respond input#submit:hover,
.woocommerce a.button:hover,
.woocommerce button.button:hover,
.woocommerce input.button:hover,
.woocommerce #place_order:hover,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover
{
	color: #<?php echo esc_attr($yellow); ?>;
}



.thm-btn,
.menuzord-menu ul.dropdown,
.menuzord-menu ul.dropdown li ul.dropdown,
.menuzord-menu > li > .megamenu,
.nav_side_content .search_option form,
.rev_slider_wrapper .slide-content-box .button a.thm-btn.our-solution:hover,
.large-blog-news .lower-content .thm-btn:hover,
.sidebar-archive .form-control:focus,
.share-box .social a:hover,
.testimonials-section .owl-theme .owl-prev i:hover,
.testimonials-section .owl-theme .owl-next i:hover,
.clients-section .tooltip.top .tooltip-arrow,
.clients-section .owl-theme .owl-nav [class*=owl-]:hover,
.default-form .form-control:focus,
.checkout-area .form form .field-input input[type="text"]:focus,
.checkout-area .form form .field-input textarea:focus,
.checkout-area .table .cart-table tbody tr .qty .btn-default,
.single-sidebar.price-ranger .ranger-min-max-block input[type='submit'],
.product-content-box .content-box .location-box form input:focus,
.product-tab-box .tab-menu li.active a,
.product-tab-box .tab-menu li:hover a,
.review-form form input[type="text"]:focus,
.review-form form textarea:focus,
.our-services .single-our-service .thm-btn:hover,
.subscribe-form input,
.three-column .single-our-service .thm-btn:hover,
.paginate-links a:hover,
.paginate-links > span,
.post-password-form input[type="password"],
.woocommerce .woocommerce-info,
.woocommerce .woocommerce-error,
.woocommerce #review_form #respond .form-submit input:hover,
form.cart button.add-to-cart,
form.cart button.add-to-cart:hover,
.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
.woocommerce .woocommerce-message,
.woocommerce #respond input#submit,
.woocommerce a.button,
.woocommerce button.button,
.woocommerce input.button,
.woocommerce #place_order,
.woocommerce #respond input#submit:hover,
.woocommerce a.button:hover,
.woocommerce button.button:hover,
.woocommerce input.button:hover,
.woocommerce #place_order:hover,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button
{
	border-color: #<?php echo esc_attr($yellow); ?>;
}



.woocommerce div.product p.price,
.woocommerce div.product span.price,
.woocommerce div.product .price ins span,
.woocommerce #review_form #respond .form-submit input:hover
{
	color: #<?php echo esc_attr($yellow); ?> !important;
}



.woocommerce .shop_table.cart input[name="update_cart"]:hover,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.woocommerce-pagination ul li a:hover,
.woocommerce-pagination ul li span,
.woocommerce nav.woocommerce-pagination ul li a:focus,
.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce nav.woocommerce-pagination ul li span.current
{
	background-color: #<?php echo esc_attr($yellow); ?> !important;
}

.woocommerce #review_form #respond .form-submit input
{
	border-color: #<?php echo esc_attr($yellow); ?> !important;
}

.latest-project-carousel .owl-nav [class*=owl-]:hover
{
    background-color: <?php echo hex2rgba($yellow, 0.6);?> !important;
}


.inner-banner:before,
.popular-post .item .post-thumb a:after,
.single-team-member .img-box .overlay,
.single-project .img-box .overlay,
.our-services .single-our-service .img-box a:after,
.single-shop-item .default-overlay-outer
{
    background-color: <?php echo hex2rgba($yellow, 0.9);?> !important;
}


<?php 

$out = ob_get_clean();
$expires_offset = 31536000; // 1 year
header('Content-Type: text/css; charset=UTF-8');
header('Expires: ' . gmdate( "D, d M Y H:i:s", time() + $expires_offset ) . ' GMT');
header("Cache-Control: public, max-age=$expires_offset");
header('Vary: Accept-Encoding'); // Handle proxies
header('Content-Encoding: gzip');

echo gzencode($out);
exit;