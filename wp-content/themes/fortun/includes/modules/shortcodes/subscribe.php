<section class="subscribe center sec-padd" style="background-image: url(<?php echo esc_url($bg_img); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                <h2><?php echo wp_kses_post($title); ?></h2>
                <p><?php echo wp_kses_post($text); ?></p>
                <form class="subscribe-form" method="post" action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8">
                    <input type="hidden" id="uri2" name="uri" value="<?php echo esc_attr($id); ?>">
					<input type="hidden" value="en_US" name="loc">
					<input type="email" placeholder="<?php esc_html_e('Email Address', 'fortun'); ?>"><span class="fa fa-envelope"></span>
                    <button type="submit" class="thm-btn"><?php esc_html_e('subscribe us', 'fortun'); ?></button>
                </form>
            </div>
        </div>
                
    </div>
</section>