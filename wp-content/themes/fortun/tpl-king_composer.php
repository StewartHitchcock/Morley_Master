<?php /* Template Name: King Composer Page */
	get_header() ;
	$meta = _WSH()->get_meta('_bunch_header_settings');
	$bg = (fortun_set($meta, 'header_img')) ? fortun_set($meta, 'header_img') : get_template_directory_uri().'/images/background/1.jpg';
	$title = fortun_set($meta, 'header_title');
?>
<?php if(fortun_set($meta, 'breadcrumb')):?>

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
	
<?php endif;?>
<?php while( have_posts() ): the_post(); ?>
    <?php the_content(); ?>
<?php endwhile;  ?>
<?php get_footer() ; ?>