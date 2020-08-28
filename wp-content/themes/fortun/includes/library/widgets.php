<?php
///--------------------Blog Widgets--------------------///

//Recent Posts 
class Bunch_Recent_Posts extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Recent_Posts', /* Name */esc_html__('Fortune Recent Posts','fortun'), array( 'description' => esc_html__('Show the recent posts.', 'fortun' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
		<div class="popular_news">
			<?php echo wp_kses_post($before_title.$title.$after_title); ?>

			<div class="popular-post">
				
				<?php $query_string = 'posts_per_page='.$instance['number'];
					if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
					
					$this->posts($query_string);
				?>
				
			</div>
		</div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('latest news', 'fortun');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';
	?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'fortun'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'fortun'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'fortun'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'fortun'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php while( $query->have_posts() ): $query->the_post(); ?>
				
				<div class="item">
					<div class="post-thumb"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_post_thumbnail('fortun_90x90', array('class' => 'img-responsive'));?></a></div>
					<h4><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></h4>
					<div class="post-info"><?php echo get_the_date('F d, Y');?> </div>
				</div>
				
			<?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

// Flicker Gallery
class Bunch_Flickr_Feed extends WP_Widget
{
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Flickr_Feed', /* Name */esc_html__('Fortune Flickr Feed','fortun'), array( 'description' => esc_html__('Fetch the latest feed from Flickr', 'fortun' )) );
	}
	
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		$flickr_id = $instance['flickr_id'];
		$number = $instance['number'];
		
		echo wp_kses_post($before_widget);

		$limit = ( $number ) ? $number : 6;?>
        
        <div class="sidebar-intsgram flickr_photos clearfix">
            <div class="inner-title">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            </div>
            <div class="list-inline clearfix">
                <script type="text/javascript">
					jQuery(document).ready(function($) {
						jQuery('.flickr_photos').jflickrfeed({
							limit: <?php echo wp_kses_post($limit);?> ,
							qstrings: {id: '<?php echo wp_kses_post($flickr_id) ?>'},
							itemTemplate: '<figure class="image"><a href="{{link}}" title="{{title}}"><img src="{{image_s}}" alt="{{title}}" /></a></figure>'
						});
					});
			   </script>
            </div>
        </div>
        
            <?php
			
		echo wp_kses_post($after_widget);
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);

		$instance['flickr_id'] = $new_instance['flickr_id'];
		$instance['number'] = $new_instance['number'];
		
		return $instance;
	}
	
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : esc_html__('Flicker Gallery', 'fortun');
		$flickr_id = ($instance) ? esc_attr($instance['flickr_id']) : '52617155@N08';
		$number = ( $instance ) ? esc_attr($instance['number']) : 6;?>
		  
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title'));?>"><?php esc_html_e('Title:', 'fortun');?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title'));?>" name="<?php echo esc_attr($this->get_field_name('title'));?>" type="text" value="<?php echo wp_kses_post($title);?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('flickr_id'));?>"><?php esc_html_e('Flickr ID:', 'fortun');?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('flickr_id'));?>" name="<?php echo esc_attr($this->get_field_name('flickr_id'));?>" type="text" value="<?php echo wp_kses_post($flickr_id);?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number'));?>"><?php esc_html_e('Number of Images:', 'fortun');?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number'));?>" name="<?php echo esc_attr($this->get_field_name('number'));?>" type="text" value="<?php echo wp_kses_post($number);?>" />
        </p>
        <?php 
	}
}


///--------------------Footer Widgets-------------------///

//About Us
class Bunch_About_Us extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_About_Us', /* Name */esc_html__('Fortune About Us','fortun'), array( 'description' => esc_html__('Show the information about company.', 'fortun' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
			<div class="about-widget">
				<figure class="footer-logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($instance['logo_link']); ?>" alt="<?php esc_attr_e('image', 'fortun');?>"></a></figure>
				
				<div class="widget-content">
					<div class="text"><p><?php echo wp_kses_post($instance['content']); ?></p> </div>
					<div class="link">
						<a href="<?php echo esc_url($instance['more_link']); ?>" class="default_link"><?php esc_html_e('More About us', 'fortun');?> <i class="fa fa-angle-right"></i></a>
					</div>
				</div>
			</div>
            
	<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['logo_link'] = strip_tags($new_instance['logo_link']);
		$instance['content'] = $new_instance['content'];
		$instance['more_link'] = $new_instance['more_link'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$logo_link = ($instance) ? esc_attr($instance['logo_link']) : get_template_directory_uri().'/images/logo/logo2.png';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$more_link = ( $instance ) ? esc_attr($instance['more_link']) : '#';
	?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('logo_link')); ?>"><?php esc_html_e('Logo Link:', 'fortun'); ?></label>
            <input placeholder="<?php esc_html_e('https://', 'fortun');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('logo_link')); ?>" name="<?php echo esc_attr($this->get_field_name('logo_link')); ?>" type="text" value="<?php echo esc_attr($logo_link); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'fortun'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('more_link')); ?>"><?php esc_html_e('More Link:', 'fortun'); ?></label>
            <input placeholder="<?php esc_html_e('https://', 'fortun');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('more_link')); ?>" name="<?php echo esc_attr($this->get_field_name('more_link')); ?>" type="text" value="<?php echo esc_attr($more_link); ?>" />
        </p>        
                
		<?php 
	}
	
}

//Services Posts
class Bunch_Services_pages extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Services_pages', /* Name */esc_html__('Fortune Services Pages','fortun'), array( 'description' => esc_html__('Show the Services Pages.', 'fortun' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
		<div class="links-widget">
			<div class="section-title">
				<?php echo wp_kses_post($before_title.$title.$after_title); ?>
			</div>
			
			<?php 
				$args = array('post_type' => 'bunch_services', 'showposts'=>$instance['number']);
				if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'services_category','field' => 'id','terms' => (array)$instance['cat']));
					
				$this->posts($args);
			?>
			
		</div>
        
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('what we do', 'fortun');
		$number = ( $instance ) ? esc_attr($instance['number']) : 6;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';
	?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'fortun'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'fortun'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'fortun'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'fortun'), 'selected'=>$cat, 'taxonomy' => 'services_category', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
	<?php 
	}
	
	function posts($args)
	{
		$query = new WP_Query($args);
		if( $query->have_posts() ):?>
			
			<div class="widget-content">
				<ul class="list">
					
					<?php while( $query->have_posts() ): $query->the_post();
						$services_meta = _WSH()->get_meta(); ?>
						<li><a href="<?php echo esc_url(fortun_Set($services_meta, 'ext_url')); ?>"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
					
				</ul>
			</div>
			
		<?php endif;
		wp_reset_postdata();
    }
}

//Latest News
class Bunch_Latest_News extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Latest_News', /* Name */esc_html__('Fortune Latest News','fortun'), array( 'description' => esc_html__('Show the Latest News.', 'fortun' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
		<div class="posts-widget">
			<div class="section-title">
				<?php echo wp_kses_post($before_title.$title.$after_title); ?>
			</div>
			<div class="widget-content">
				
				<?php $query_string = 'posts_per_page='.$instance['number'];
					if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
					
					$this->posts($query_string);
				?>
				
			</div>
			
		</div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('latest news', 'fortun');
		$number = ( $instance ) ? esc_attr($instance['number']) : 2;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';
	?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'fortun'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'fortun'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'fortun'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'fortun'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
	<?php 
	}
	
	function posts($query_string)
	{
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
			<?php while( $query->have_posts() ): $query->the_post(); ?>
				
				<!--Post-->
				<div class="post">
					<div class="content">
						<h4><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?></a></h4>
					</div>
					<div class="time"><?php echo get_the_date('F d, Y');?></div>
				</div>
				
			<?php endwhile; ?>
            
		<?php endif;
		wp_reset_postdata();
    }
}

//Contact Us
class Bunch_Contact_Us extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Contact_Us', /* Name */esc_html__('Fortune Contact Us','fortun'), array( 'description' => esc_html__('Show the information about company.', 'fortun' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<div class="contact-widget" style="background: rgba(0, 0, 0, 0) url(<?php echo esc_url($instance['bg_img']);?>) no-repeat scroll left bottom;">
				<div class="section-title">
					<?php echo wp_kses_post($before_title.$title.$after_title); ?>
				</div>
				<div class="widget-content">
					<ul class="contact-info">
						<?php if( $instance['address'] ): ?><li><span class="icon fa fa-phone"></span><?php echo wp_kses_post($instance['address']); ?></li><?php endif; ?>
						<?php if( $instance['phone'] ): ?><li><span class="icon fa fa-envelope"></span> <?php echo wp_kses_post($instance['phone']); ?></li><?php endif; ?>
						<?php if( $instance['email'] ): ?><li><span class="icon fa fa-paper-plane"></span><?php echo sanitize_email($instance['email']); ?></li><?php endif; ?>
					</ul>
				</div>
				<?php if( $instance['show'] ): ?>
					<ul class="social">
						<?php echo wp_kses_post(fortun_get_social_icons()); ?>
					</ul>
				<?php endif; ?>
			</div>
            
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['address'] = $new_instance['address'];
		$instance['phone'] = $new_instance['phone'];
		$instance['email'] = $new_instance['email'];
		$instance['bg_img'] = $new_instance['bg_img'];
		$instance['show'] = $new_instance['show'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'contact us';
		$address = ($instance) ? esc_attr($instance['address']) : '22/121 Apple Street, New York, <br>NY 10012, USA';
		$phone = ($instance) ? esc_attr($instance['phone']) : 'Phone: +123-456-7890';
		$email = ($instance) ? esc_attr($instance['email']) : 'Mail@Fortuneteam.com';
		$bg_img = ($instance) ? esc_attr($instance['bg_img']) : get_template_directory_uri().'/images/background/map.png';
		$show = ( $instance ) ? esc_attr($instance['show']) : '';
	?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'fortun'); ?></label>
            <input placeholder="<?php esc_html_e('Title', 'fortun');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'fortun'); ?></label>
            <input placeholder="<?php esc_html_e('Address', 'fortun');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" type="text" value="<?php echo esc_attr($address); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone:', 'fortun'); ?></label>
            <input placeholder="<?php esc_html_e('Phone', 'fortun');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email:', 'fortun'); ?></label>
            <input placeholder="<?php esc_html_e('Email', 'fortun');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('bg_img')); ?>"><?php esc_html_e('BG Image:', 'fortun'); ?></label>
            <input placeholder="<?php esc_html_e('https://', 'fortun');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('bg_img')); ?>" name="<?php echo esc_attr($this->get_field_name('bg_img')); ?>" type="text" value="<?php echo esc_attr($bg_img); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'fortun'); ?></label>
			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>        
                
		<?php 
	}
	
}


///--------------------Other Sidebar Widgets-------------------///

//Services External Links
class Bunch_Services_Posts extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Services_Posts', /* Name */esc_html__('Fortune Services Posts','fortun'), array( 'description' => esc_html__('Show the Services Posts.', 'fortun' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <ul class="service-catergory">
            <?php 
				$args = array('post_type' => 'bunch_services', 'showposts'=>$instance['number']);
				if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'services_category','field' => 'id','terms' => (array)$instance['cat']));
					
				$this->posts($args);
			?>
        </ul>
        
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$number = ( $instance ) ? esc_attr($instance['number']) : 6;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';
	?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'fortun'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'fortun'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'fortun'), 'selected'=>$cat, 'taxonomy' => 'services_category', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
	<?php 
	}
	
	function posts($args)
	{
		$query = new WP_Query($args);
		if( $query->have_posts() ):?>
			
			<div class="widget-content">
				<ul class="list">
					
					<?php while( $query->have_posts() ): $query->the_post();
						$services_meta = _WSH()->get_meta(); ?>
						<li><a href="<?php echo esc_url(fortun_Set($services_meta, 'ext_url')); ?>"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
					
				</ul>
			</div>
			
		<?php endif;
		wp_reset_postdata();
    }
}

//Brochure
class Bunch_Brochure extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Brochure', /* Name */esc_html__('Fortune Brochure','fortun'), array( 'description' => esc_html__('Show the information about company.', 'fortun' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		//$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<br><br>
			<div class="brochures">

				<div class="img-box center">
					<img src="<?php echo esc_url($instance['img_link']); ?>" alt="<?php esc_html_e('Awesome Image', 'fortun')?>">
				</div>
				<ul class="brochures-lists">
					<li>
						<a href="<?php echo esc_url($instance['bro_link']); ?>">
							<span class="fa fa-file-pdf-o"></span><?php echo wp_kses_post($instance['file_title']); ?><i class="fa fa-download"></i>
						</a>
					</li>
				</ul>
			</div>
            
	<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['img_link'] = strip_tags($new_instance['img_link']);
		$instance['file_title'] = $new_instance['file_title'];
		$instance['bro_link'] = $new_instance['bro_link'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$img_link = ($instance) ? esc_attr($instance['img_link']) : get_template_directory_uri().'/images/service/s2.jpg';
		$file_title = ($instance) ? esc_attr($instance['file_title']) : 'Our Brouchure.txt';
		$bro_link = ( $instance ) ? esc_attr($instance['bro_link']) : '#';
	?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('img_link')); ?>"><?php esc_html_e('Image Link:', 'fortun'); ?></label>
            <input placeholder="<?php esc_html_e('https://', 'fortun');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('img_link')); ?>" name="<?php echo esc_attr($this->get_field_name('img_link')); ?>" type="text" value="<?php echo esc_attr($img_link); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('file_title')); ?>"><?php esc_html_e('File Title:', 'fortun'); ?></label>
            <input placeholder="<?php esc_html_e('Title', 'fortun');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('file_title')); ?>" name="<?php echo esc_attr($this->get_field_name('file_title')); ?>" type="text" value="<?php echo esc_attr($file_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('bro_link')); ?>"><?php esc_html_e('Brochure Link:', 'fortun'); ?></label>
            <input placeholder="<?php esc_html_e('https://', 'fortun');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('bro_link')); ?>" name="<?php echo esc_attr($this->get_field_name('bro_link')); ?>" type="text" value="<?php echo esc_attr($bro_link); ?>" />
        </p>        
                
		<?php 
	}
	
}

//Business Enquiry
class Bunch_Business_Enquiry extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Business_Enquiry', /* Name */esc_html__('Fortune Business Enquiry','fortun'), array( 'description' => esc_html__('Show the information about company.', 'fortun' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<div class="service-contact">
				<h4><?php echo wp_kses_post($instance['title']); ?></h4>
				<p><?php echo wp_kses_post($instance['content']); ?></p>
				<a href="<?php echo esc_url($instance['link']); ?>" class="thm-btn"><?php esc_html_e('send mail', 'fortun');?></a>
			</div>
            
	<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		$instance['link'] = $new_instance['link'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'For Business Enquiry';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$link = ( $instance ) ? esc_attr($instance['link']) : '#';
	?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'fortun'); ?></label>
            <input placeholder="<?php esc_html_e('Title', 'fortun');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'fortun'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('link')); ?>"><?php esc_html_e('Link:', 'fortun'); ?></label>
            <input placeholder="<?php esc_html_e('https://', 'fortun');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('link')); ?>" name="<?php echo esc_attr($this->get_field_name('link')); ?>" type="text" value="<?php echo esc_attr($link); ?>" />
        </p>        
                
		<?php 
	}
	
}

//Support Agents
class Bunch_Support_Agents extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Support_Agents', /* Name */esc_html__('Fortune Support Agents','fortun'), array( 'description' => esc_html__('Show the Support Agents.', 'fortun' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <div class="author-details style-2">
            
            <?php 
				$args = array('post_type' => 'bunch_team', 'showposts'=>$instance['number']);
				if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'team_category','field' => 'id','terms' => (array)$instance['cat']));
					
				$this->posts($args);
			?>
            
        </div>
        
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$number = ( $instance ) ? esc_attr($instance['number']) : 2;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';
	?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'fortun'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'fortun'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'fortun'), 'selected'=>$cat, 'taxonomy' => 'team_category', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
	<?php 
	}
	
	function posts($args)
	{
		$query = new WP_Query($args);
		if( $query->have_posts() ):?>
			
			<?php while( $query->have_posts() ): $query->the_post();
				$services_meta = _WSH()->get_meta(); ?>
				
				<div class="item">
					<h5><?php the_title(); ?></h5>
					<div class="img-box">
						<?php the_post_thumbnail('fortun_67x64');?>
					</div>
					<div class="content">
						<h5><?php echo wp_kses_post(fortun_set($services_meta, 'designation'));?></h5>
						<p><i class="fa fa-phone"></i><?php echo wp_kses_post(fortun_set($services_meta, 'phone'));?></p>
						<p><i class="fa fa-envelope"></i><?php echo sanitize_email(fortun_set($services_meta, 'email'));?></p>
					</div>
				</div>
				
			<?php endwhile; ?>
			
		<?php endif;
		wp_reset_postdata();
    }
}

/********************************************************************************************************************/
//Gallery Posts 
class Bunch_gallery extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_gallery', /* Name */esc_html__('Artica Gallery Widget','fortun'), array( 'description' => esc_html__('Show the Gallery images', 'fortun' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
		<div class="gallery-widget">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            
			<?php 
				$args = array('post_type' => 'bunch_gallery', 'showposts'=>$instance['number']);
				if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'gallery_category','field' => 'id','terms' => (array)$instance['cat']));
					
				$this->posts($args);
				?>
            
        </div>
        
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Gallery Widget', 'fortun');
		$number = ( $instance ) ? esc_attr($instance['number']) : 8;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'fortun'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'fortun'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'fortun'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'fortun'), 'selected'=>$cat, 'taxonomy' => 'gallery_category', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($args)
	{
		$query = new WP_Query($args);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
				<div class="thumbs-outer clearfix">
				<?php while( $query->have_posts() ): $query->the_post(); ?>
                <?php 
					$post_thumbnail_id = get_post_thumbnail_id($post->ID);
					$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
				?>
                    <figure class="image"><?php the_post_thumbnail('fortun_80x65', array('class' => 'img-responsive'));?><a href="<?php echo esc_url($post_thumbnail_url);?>" class="lightbox-image"><span class="fa fa-search"></span></a></figure>
                <?php endwhile; ?>
                </div>
        <?php endif;
		wp_reset_postdata();
    }
}
