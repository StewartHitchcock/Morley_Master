<?php 
fortun_bunch_global_variable();
$args = array('post_type' => 'bunch_projects', 'showposts'=>$num, 'orderby'=>$sort, 'order'=>$order);
$terms_array = explode(",",$exclude_cats);
if($exclude_cats) $args['tax_query'] = array(array('taxonomy' => 'projects_category','field' => 'id','terms' => $terms_array,'operator' => 'NOT IN',));
$query = new WP_Query($args);

$t = $GLOBALS['_bunch_base'];

$data_filtration = '';
$data_posts = '';
?>

<?php if( $query->have_posts() ):
	
ob_start();?>

	<?php $count = 0; 
	$fliteration = array();?>
	<?php while( $query->have_posts() ): $query->the_post();
		global  $post;
		//$meta = get_post_meta( get_the_id(), '_bunch_portfolio_meta', true );//printr($meta);
		$projects_meta = _WSH()->get_meta();
		$post_terms = get_the_terms( get_the_id(), 'projects_category');// printr($post_terms); exit();
		foreach( (array)$post_terms as $pos_term ) $fliteration[$pos_term->term_id] = $pos_term;
		$temp_category = get_the_term_list(get_the_id(), 'projects_category', '', ', ');
	?>
		<?php $post_terms = wp_get_post_terms( get_the_id(), 'projects_category'); 
		$term_slug = '';
		if( $post_terms ) foreach( $post_terms as $p_term ) $term_slug .= $p_term->slug.' ';?>		
           
		   <?php 
			$post_thumbnail_id = get_post_thumbnail_id($post->ID);
			$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
		   ?>     
		   
			<div class="col-md-4 col-sm-6 col-xs-12 filter-item <?php echo esc_attr($term_slug); ?>">
                <div class="single-project">
                    <div class="img-box">
                        <?php the_post_thumbnail('fortun_360x220', array('class' => 'img-responsive'));?>
                        <div class="overlay">
                            <div class="box">
                                <div class="content">
                                    <div class="top">
                                        <ul class="list-inline">
                                            <li>
                                                <a href="<?php echo esc_url(fortun_set($projects_meta, 'ext_url')); ?>"><i class="fa fa-link"></i></a>
                                            </li>
                                            <li>
                                                <a data-group="1" href="<?php echo esc_url($post_thumbnail_url);?>" class="img-popup"><i class="fa fa-search-plus"></i></a>
                                            </li>                                            
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="title center">
                        <h5><?php the_title(); ?></h5>
                    </div>
                </div>
            </div>
           
<?php endwhile;?>
  
<?php wp_reset_postdata();
$data_posts = ob_get_contents();
ob_end_clean();

endif; 

ob_start();?>	 

<?php $terms = get_terms(array('projects_category')); ?>

<section class="latest-project sec-padd">
    <div class="container">
        
        
        <ul class="post-filter list-inline">
            <li class="active" data-filter=".filter-item">
                <span><?php esc_html_e('View All', 'fortun'); ?></span>
            </li>
			
			<?php foreach( $fliteration as $t ): ?>
				<li data-filter=".<?php echo esc_attr(fortun_set( $t, 'slug' )); ?>">
					<span><?php echo wp_kses_post(fortun_set( $t, 'name')); ?></span>
				</li>
			<?php endforeach;?>
            
        </ul>

        <div class="row masonary-layout filter-layout">
            
			<?php echo wp_kses_post($data_posts); ?>
			
        </div><!-- /.row -->

        <div class="border-bottom"></div>
        <br><br>
        
		<?php fortun_the_pagination(array('total'=>$query->max_num_pages, 'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>', 'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>')); ?>

    </div><!-- /.container -->
</section><!-- /.latest-project sec-pad -->