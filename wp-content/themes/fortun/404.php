<?php
$options = _WSH()->option();
    get_header(); 
?>

<div class="inner-banner has-base-color-overlay text-center">
    <div class="container">
        <div class="box">
            <h3><?php esc_html_e('404 Error Page', 'fortun')?></h3>
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

<!--  Your page Content End Here -->
<div class="container">
	<div class="error_page">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  <!-- /.shop aside use for styling input search box -->
                <h3><span>Oops!</span> Something Wrong</h3>
                <p><?php esc_html_e('The page you are looking for no longer exists. Perhaps you can return back to the sites homepage and see if you can find what you are looking for. Or, you can try finding it with the information below.', 'fortun');?></p>
                <div class="sidebar_search"> <!--input-group -->
                    <?php get_template_part('searchform2')?>
                </div><!-- /input-group -->
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="thm-btn transition-ease"><i class="fa fa-angle-double-left"></i>&nbsp;&nbsp;<?php esc_html_e('Back to Home', 'fortun')?> </a>
            </div>
        </div> <!-- /row -->
    </div> 
</div> <!-- /error_page -->
<!--  Your Blog Content End Here -->  		
<?php get_footer(); ?>