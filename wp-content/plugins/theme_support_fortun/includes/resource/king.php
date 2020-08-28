<?php
/**
 * Kingcomposer array
 *
 * @package Student WP
 * @author Shahbaz Ahmed <shahbazahmed9@hotmail.com>
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$orderby = array(
				"type"			=>	"select",
				"label"			=>	esc_html__("Order By", BUNCH_NAME),
				"name"			=>	"sort",
				'options'		=>	array('date'=>esc_html__('Date', BUNCH_NAME),'title'=>esc_html__('Title', BUNCH_NAME) ,'name'=>esc_html__('Name', BUNCH_NAME) ,'author'=>esc_html__('Author', BUNCH_NAME),'comment_count' =>esc_html__('Comment Count', BUNCH_NAME),'random' =>esc_html__('Random', BUNCH_NAME) ),
				"description"	=>	esc_html__("Enter the sorting order.", BUNCH_NAME)
			);
$order = array(
				"type"			=>	"select",
				"label"			=>	esc_html__("Order", BUNCH_NAME),
				"name"			=>	"order",
				'options'		=>	(array('ASC'=>esc_html__('Ascending', BUNCH_NAME),'DESC'=>esc_html__('Descending', BUNCH_NAME) ) ),			
				"description"	=>	esc_html__("Enter the sorting order.", BUNCH_NAME)
			);
$number = array(
				"type"			=>	"number_slider",
				"label"			=>	esc_html__('Number of Posts', BUNCH_NAME ),
				"name"			=>	"num",
				"options"		=>	array(
					'min'	=>	0,
					'max'	=>	100,
					'unit'	=>	'',
					'show_input'	=>	true
				),
				"value"			=>	'3',
				"description"	=>	esc_html__('Enter Number of posts to Show.', BUNCH_NAME )
			);
$text_limit = array(
				"type"			=>	"number_slider",
				"label"			=>	esc_html__('Text Limit', BUNCH_NAME ),
				"name"			=>	"text_limit",
				"options"		=>	array(
					'min'	=>	0,
					'max'	=>	100,
					'unit'	=>	'',
					'show_input'	=>	true
				),
				"value"			=>	'25',
				"description"	=>	esc_html__('Enter text limit of posts to Show.', BUNCH_NAME )
			);
$title = array(
				"type"			=>	"text",
				"label"			=>	esc_html__('Title', BUNCH_NAME ),
				"name"			=>	"title",
				"description"	=>	esc_html__('Enter section title.', BUNCH_NAME )
			);
$subtitle = array(
				"type"			=>	"text",
				"label"			=>	esc_html__('Sub-Title', BUNCH_NAME ),
				"name"			=>	"subtitle",
				"description"	=>	esc_html__('Enter section subtitle.', BUNCH_NAME )
			);
$text  = array(
				"type"			=>	"textarea",
				"label"			=>	esc_html__('Text', BUNCH_NAME ),
				"name"			=>	"text",
				"description"	=>	esc_html__('Enter text to show.', BUNCH_NAME )
			);
$btn_title = array(
				"type"			=>	"text",
				"label"			=>	esc_html__('Button Title', BUNCH_NAME ),
				"name"			=>	"btn_title",
				"description"	=>	esc_html__('Enter section Button title.', BUNCH_NAME )
			);
$btn_link = array(
				"type"			=>	"link",
				"label"			=>	esc_html__('Button Link', BUNCH_NAME ),
				"name"			=>	"btn_link",
				"value"			=>	"link|caption|target",
				"description"	=>	esc_html__('Enter section Button Link.', BUNCH_NAME )
			);
$bg_img = array(
				"type"			=>	"attach_image_url",
				"label"			=>	esc_html__('Background Image', BUNCH_NAME ),
				"name"			=>	"bg_img",
				'admin_label' 	=> 	false,
				"description"	=>	esc_html__('Choose Background image.', BUNCH_NAME )
			);

$options = array();


//Revslider
$options['bunch_revslider']	=	array(
					'name' => esc_html__('Revslider', BUNCH_NAME),
					'base' => 'bunch_revslider',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-sliders' ,
					'description' => esc_html__('Show  Revolution slider.', BUNCH_NAME),
					'params' => array(
						array(
							'type' => 'dropdown',
							'label' => esc_html__('Choose Slider', BUNCH_NAME ),
							'name' => 'slider_slug',
							'options' => bunch_get_rev_slider( 0 ),
							'description' => esc_html__('Choose Slider', BUNCH_NAME )
						),

					),
			);
//Why Choose Home
$options['bunch_why_choose']	=	array(
					'name' => esc_html__('Why Choose', BUNCH_NAME),
					'base' => 'bunch_why_choose',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Why Choose Home.', BUNCH_NAME),
					'params' => array(
						
						$title,
						$text_limit,
						$number,
						array(
							"type" => "dropdown",
							"label" => __( 'Category', BUNCH_NAME),
							"name" => "cat",
							"options" =>  bunch_get_categories(array( 'taxonomy' => 'services_category'), true),
							"description" => __( 'Choose Category.', BUNCH_NAME)
						),
						$orderby,
						$order,

					),
			);
//What We Do Home
$options['bunch_what_we_do']	=	array(
					'name' => esc_html__('What We Do', BUNCH_NAME),
					'base' => 'bunch_what_we_do',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show What We Do Home.', BUNCH_NAME),
					'params' => array(
						
						$title,
						$text,
						$text_limit,
						$number,
						array(
							"type" => "dropdown",
							"label" => __( 'Category', BUNCH_NAME),
							"name" => "cat",
							"options" =>  bunch_get_categories(array( 'taxonomy' => 'services_category'), true),
							"description" => __( 'Choose Category.', BUNCH_NAME)
						),
						$orderby,
						$order,
						$btn_title,
						$btn_link,

					),
			);
//About Us & FAQ's Home
$options['bunch_about_faqs']	=	array(
					'name' => esc_html__('About and FAQs', BUNCH_NAME),
					'base' => 'bunch_about_faqs',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-question-circle' ,
					'description' => esc_html__('Show About Us and FAQs Home.', BUNCH_NAME),
					'params' => array(
						
						//Tabs Start
						esc_html__( 'About', BUNCH_NAME ) => array(

							$title,
							$subtitle,
							array(
								"type"			=>	"editor",
								"label"			=>	esc_html__('Text', BUNCH_NAME ),
								"name"			=>	"text",
								"description"	=>	esc_html__('Enter text to show.', BUNCH_NAME )
							),
							$btn_title,
							$btn_link,
							array(
								"type"			=>	"attach_image_url",
								"label"			=>	esc_html__('Signature Image', BUNCH_NAME ),
								"name"			=>	"sign_img",
								'admin_label' 	=> 	false,
								"description"	=>	esc_html__('Choose Signature image.', BUNCH_NAME )
							),
				
					   ),//Tabs End
					   
					   //Tabs Start
						esc_html__( 'FAQs', BUNCH_NAME ) => array(

							$text_limit,
							$number,
							array(
								"type" => "dropdown",
								"label" => __( 'Category', BUNCH_NAME),
								"name" => "cat",
								"options" =>  bunch_get_categories(array( 'taxonomy' => 'faqs_category'), true),
								"description" => __( 'Choose Category.', BUNCH_NAME)
							),
							$orderby,
							$order,
				
					   ),//Tabs End
						
					),
			);
//Funfacts Home
$options['bunch_funfacts']	=	array(
					'name' => esc_html__('Funfacts', BUNCH_NAME),
					'base' => 'bunch_funfacts',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-list-ol' ,
					'description' => esc_html__('Show Funfacts Home.', BUNCH_NAME),
					'params' => array(
						
						//Group Start
						array(
							 'type' => 'group',
							 'label' => esc_html__( 'Funfact', BUNCH_NAME ),
							 'name' => 'funfact_group',
							 'description' => esc_html__( 'Enter the Funfact.', BUNCH_NAME ),
							 'params' => array(
									array(
										 'type' => 'text',
										 'label' => esc_html__( 'Funfact Title', BUNCH_NAME ),
										 'name' => 'funfact_title',
										 'description' => esc_html__( 'Enter Funfact title.', BUNCH_NAME ),
									),
									array(
										 'type' => 'text',
										 'label' => esc_html__( 'Funfact Number', BUNCH_NAME ),
										 'name' => 'funfact_num',
										 'description' => esc_html__( 'Enter Funfact Number.', BUNCH_NAME ),
									),
									array(
										'type' => 'toggle',
										'label' => esc_html__( 'Show Plus Sign', BUNCH_NAME ),
										'name' => 'show_sign',
										'description' => esc_html__( 'Show/Hide Plus Sign.', BUNCH_NAME ),
									),
							 ),
						),//Group End

					),
			);
//Our Testimonials Home
$options['bunch_our_testimonials']	=	array(
					'name' => esc_html__('Our Testimonials', BUNCH_NAME),
					'base' => 'bunch_our_testimonials',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-commenting' ,
					'description' => esc_html__('Show Our Testimonials Home.', BUNCH_NAME),
					'params' => array(
						
						$title,
						$text_limit,
						$number,
						array(
							"type" => "dropdown",
							"label" => __( 'Category', BUNCH_NAME),
							"name" => "cat",
							"options" =>  bunch_get_categories(array( 'taxonomy' => 'testimonials_category'), true),
							"description" => __( 'Choose Category.', BUNCH_NAME)
						),
						$orderby,
						$order,

					),
			);
//Latest Projects Home
$options['bunch_latest_projects']	=	array(
					'name' => esc_html__('Latest Projects', BUNCH_NAME),
					'base' => 'bunch_latest_projects',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-industry' ,
					'description' => esc_html__('Show Latest Projects Home.', BUNCH_NAME),
					'params' => array(
						
						$title,
						$text,
						$number,
						array(
							"type" => "dropdown",
							"label" => __( 'Category', BUNCH_NAME),
							"name" => "cat",
							"options" =>  bunch_get_categories(array( 'taxonomy' => 'projects_category'), true),
							"description" => __( 'Choose Category.', BUNCH_NAME)
						),
						$orderby,
						$order,
						$btn_title,
						$btn_link,

					),
			);
//Our Blog Home
$options['bunch_our_blog']	=	array(
					'name' => esc_html__('Our Blog', BUNCH_NAME),
					'base' => 'bunch_our_blog',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-thumb-tack' ,
					'description' => esc_html__('Show Our Blog Home.', BUNCH_NAME),
					'params' => array(
						
						$title,
						$text_limit,
						$number,
						array(
							"type" => "dropdown",
							"label" => __( 'Category', BUNCH_NAME),
							"name" => "cat",
							"options" =>  bunch_get_categories(array( 'taxonomy' => 'category'), true),
							"description" => __( 'Choose Category.', BUNCH_NAME)
						),
						$orderby,
						$order,

					),
			);
//Our Partners Home
$options['bunch_our_partners']	=	array(
					'name' => esc_html__('Our Partners', BUNCH_NAME),
					'base' => 'bunch_our_partners',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-users' ,
					'description' => esc_html__('Show Our Partners Home.', BUNCH_NAME),
					'params' => array(
						
						$title,
						//Group Start
						array(
							 'type' => 'group',
							 'label' => esc_html__( 'Partners', BUNCH_NAME ),
							 'name' => 'partner_group',
							 'description' => esc_html__( 'Enter the Partners.', BUNCH_NAME ),
							 'params' => array(
									array(
										 'type' => 'text',
										 'label' => esc_html__( 'Tooltip Title', BUNCH_NAME ),
										 'name' => 'tooltip_title',
										 'description' => esc_html__( 'Enter Tooltip title.', BUNCH_NAME ),
									),
									array(
										 'type' => 'attach_image_url',
										 'label' => esc_html__( 'Partner Image', BUNCH_NAME ),
										 'name' => 'partner_img',
										 'description' => esc_html__( 'Enter Partner Image.', BUNCH_NAME ),
									),
							 ),
						),//Group End

					),
			);
//Awards and Practice Home
$options['bunch_awards_practice']	=	array(
					'name' => esc_html__('Awards and Practice', BUNCH_NAME),
					'base' => 'bunch_awards_practice',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-trophy' ,
					'description' => esc_html__('Show Awards and Practice Home.', BUNCH_NAME),
					'params' => array(
						
						//Tabs Start
						esc_html__( 'Awards', BUNCH_NAME ) => array(

							array(
								"type"			=>	"text",
								"label"			=>	esc_html__('Award Title', BUNCH_NAME ),
								"name"			=>	"award_title",
								"description"	=>	esc_html__('Enter Award Title.', BUNCH_NAME )
							),
							array(
								"type"			=>	"textarea",
								"label"			=>	esc_html__('Award Text', BUNCH_NAME ),
								"name"			=>	"award_text",
								"description"	=>	esc_html__('Enter Award Text.', BUNCH_NAME )
							),
							//Group Start
							array(
								 'type' => 'group',
								 'label' => esc_html__( 'Awards', BUNCH_NAME ),
								 'name' => 'award_group',
								 'description' => esc_html__( 'Enter the Awards.', BUNCH_NAME ),
								 'params' => array(
										
										array(
											 'type' => 'attach_image_url',
											 'label' => esc_html__( 'Award Image', BUNCH_NAME ),
											 'name' => 'award_img',
											 'description' => esc_html__( 'Enter Award Image.', BUNCH_NAME ),
										),
								 ),
							),//Group End
				
					   ),//Tabs End
					   
					   //Tabs Start
						esc_html__( 'Practice', BUNCH_NAME ) => array(

							array(
								"type"			=>	"text",
								"label"			=>	esc_html__('Practice Title', BUNCH_NAME ),
								"name"			=>	"prac_title",
								"description"	=>	esc_html__('Enter Practice Title.', BUNCH_NAME )
							),
							array(
								"type"			=>	"textarea",
								"label"			=>	esc_html__('Practice Text', BUNCH_NAME ),
								"name"			=>	"prac_text",
								"description"	=>	esc_html__('Enter Award Text.', BUNCH_NAME )
							),
							//Group Start
							array(
								 'type' => 'group',
								 'label' => esc_html__( 'Practices', BUNCH_NAME ),
								 'name' => 'prac_group',
								 'description' => esc_html__( 'Enter the Practices.', BUNCH_NAME ),
								 'params' => array(
										
										array(
											"type"			=>	"text",
											"label"			=>	esc_html__('Practice Name', BUNCH_NAME ),
											"name"			=>	"prac_name",
											"description"	=>	esc_html__('Enter Practice Name.', BUNCH_NAME )
										),
										array(
											"type"			=>	"text",
											"label"			=>	esc_html__('Practice Link', BUNCH_NAME ),
											"name"			=>	"prac_link",
											"description"	=>	esc_html__('Enter Practice Link.', BUNCH_NAME )
										),
								 ),
							),//Group End
				
					   ),//Tabs End
						
					),
			);
//About Us
$options['bunch_about_us']	=	array(
					'name' => esc_html__('About Us', BUNCH_NAME),
					'base' => 'bunch_about_us',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-file-text' ,
					'description' => esc_html__('Show About Us.', BUNCH_NAME),
					'params' => array(
						
						$title,
						array(
							"type"			=>	"editor",
							"label"			=>	esc_html__('Text', BUNCH_NAME ),
							"name"			=>	"text",
							"description"	=>	esc_html__('Enter text to show.', BUNCH_NAME )
						),
						$btn_title,
						$btn_link,
						array(
							 'type' => 'attach_image_url',
							 'label' => esc_html__( 'Signature Image', BUNCH_NAME ),
							 'name' => 'sign_img',
							 'description' => esc_html__( 'Enter Signature Image.', BUNCH_NAME ),
						),
						//Group Start
						array(
							 'type' => 'group',
							 'label' => esc_html__( 'Mission and Vision', BUNCH_NAME ),
							 'name' => 'mission_group',
							 'description' => esc_html__( 'Enter the Mission and Vision.', BUNCH_NAME ),
							 'params' => array(
									array(
										 'type' => 'text',
										 'label' => esc_html__( 'Mission Title', BUNCH_NAME ),
										 'name' => 'mission_title',
										 'description' => esc_html__( 'Enter Mission title.', BUNCH_NAME ),
									),
									array(
										 'type' => 'textarea',
										 'label' => esc_html__( 'Mission Text', BUNCH_NAME ),
										 'name' => 'mission_text',
										 'description' => esc_html__( 'Enter Mission Text.', BUNCH_NAME ),
									),
									array(
										 'type' => 'attach_image_url',
										 'label' => esc_html__( 'Mission Image', BUNCH_NAME ),
										 'name' => 'mission_img',
										 'description' => esc_html__( 'Enter Mission Image.', BUNCH_NAME ),
									),
							 ),
						),//Group End

					),
			);
//Our History
$options['bunch_our_history']	=	array(
					'name' => esc_html__('Our History', BUNCH_NAME),
					'base' => 'bunch_our_history',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-history' ,
					'description' => esc_html__('Show Our History.', BUNCH_NAME),
					'params' => array(
						
						$title,
						//Group Start
						array(
							 'type' => 'group',
							 'label' => esc_html__( 'Our History', BUNCH_NAME ),
							 'name' => 'history_group',
							 'description' => esc_html__( 'Enter Our History.', BUNCH_NAME ),
							 'params' => array(
									array(
										 'type' => 'text',
										 'label' => esc_html__( 'History Title', BUNCH_NAME ),
										 'name' => 'history_title',
										 'description' => esc_html__( 'Enter History title.', BUNCH_NAME ),
									),
									array(
										 'type' => 'textarea',
										 'label' => esc_html__( 'History Text', BUNCH_NAME ),
										 'name' => 'history_text',
										 'description' => esc_html__( 'Enter History Text.', BUNCH_NAME ),
									),
									array(
										 'type' => 'text',
										 'label' => esc_html__( 'History Year', BUNCH_NAME ),
										 'name' => 'history_year',
										 'description' => esc_html__( 'Enter History Year.', BUNCH_NAME ),
									),
									array(
										 'type' => 'link',
										 'label' => esc_html__( 'History Link', BUNCH_NAME ),
										 'name' => 'history_link',
										 'description' => esc_html__( 'Enter History Link.', BUNCH_NAME ),
									),
									array(
										 'type' => 'attach_image_url',
										 'label' => esc_html__( 'History Image', BUNCH_NAME ),
										 'name' => 'history_img',
										 'description' => esc_html__( 'Enter History Image.', BUNCH_NAME ),
									),
							 ),
						),//Group End

					),
			);
//Our Approach
$options['bunch_our_approach']	=	array(
					'name' => esc_html__('Our Approach', BUNCH_NAME),
					'base' => 'bunch_our_approach',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Our Approach.', BUNCH_NAME),
					'params' => array(
						
						$title,
						$text_limit,
						$number,
						array(
							"type" => "dropdown",
							"label" => __( 'Category', BUNCH_NAME),
							"name" => "cat",
							"options" =>  bunch_get_categories(array( 'taxonomy' => 'services_category'), true),
							"description" => __( 'Choose Category.', BUNCH_NAME)
						),
						$orderby,
						$order,

					),
			);
//Our Team
$options['bunch_our_team']	=	array(
					'name' => esc_html__('Our Team', BUNCH_NAME),
					'base' => 'bunch_our_team',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-users' ,
					'description' => esc_html__('Show Our Team.', BUNCH_NAME),
					'params' => array(
						
						$title,
						$number,
						array(
							"type" => "dropdown",
							"label" => __( 'Category', BUNCH_NAME),
							"name" => "cat",
							"options" =>  bunch_get_categories(array( 'taxonomy' => 'team_category'), true),
							"description" => __( 'Choose Category.', BUNCH_NAME)
						),
						$orderby,
						$order,
						$bg_img,
						array(
							"type"			=>	"toggle",
							"label"			=>	esc_html__("Enable Style 1", BUNCH_NAME),
							"name"			=>	"style1",
							"description"	=>	esc_html__("Enter the Team Style with background.", BUNCH_NAME)
						),
						array(
							"type"			=>	"toggle",
							"label"			=>	esc_html__("Enable Style 2", BUNCH_NAME),
							"name"			=>	"style2",
							"description"	=>	esc_html__("Enter the Team Style for title.", BUNCH_NAME)
						),

					),
			);
//Press Release
$options['bunch_press_release']	=	array(
					'name' => esc_html__('Press Release', BUNCH_NAME),
					'base' => 'bunch_press_release',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-newspaper-o' ,
					'description' => esc_html__('Show Press Release.', BUNCH_NAME),
					'params' => array(
						
						$title,
						//Group Start
						array(
							 'type' => 'group',
							 'label' => esc_html__( 'Press Release', BUNCH_NAME ),
							 'name' => 'press_group',
							 'description' => esc_html__( 'Enter Press Release.', BUNCH_NAME ),
							 'params' => array(
									array(
										 'type' => 'text',
										 'label' => esc_html__( 'Press Title', BUNCH_NAME ),
										 'name' => 'press_title',
										 'description' => esc_html__( 'Enter Press title.', BUNCH_NAME ),
									),
									array(
										 'type' => 'textarea',
										 'label' => esc_html__( 'Press Text', BUNCH_NAME ),
										 'name' => 'press_text',
										 'description' => esc_html__( 'Enter Press Text.', BUNCH_NAME ),
									),
									array(
										 'type' => 'text',
										 'label' => esc_html__( 'Press Date', BUNCH_NAME ),
										 'name' => 'press_date',
										 'description' => esc_html__( 'Enter Press Year.', BUNCH_NAME ),
									),
									array(
										 'type' => 'attach_image_url',
										 'label' => esc_html__( 'Press Image', BUNCH_NAME ),
										 'name' => 'press_img',
										 'description' => esc_html__( 'Enter Press Image.', BUNCH_NAME ),
									),
							 ),
						),//Group End

					),
			);
//Subscribe
$options['bunch_subscribe']	=	array(
					'name' => esc_html__('Subscribe', BUNCH_NAME),
					'base' => 'bunch_subscribe',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-envelope' ,
					'description' => esc_html__('Show Subscribe.', BUNCH_NAME),
					'params' => array(
						
						$title,
						$text,
						array(
							 'type' => 'text',
							 'label' => esc_html__( 'FeedBurner ID', BUNCH_NAME ),
							 'name' => 'id',
							 'value'	=>	'themeforest',
							 'description' => esc_html__( 'Enter FeedBurner ID.', BUNCH_NAME ),
						),
						$bg_img,

					),
			);
//Our Projects
$options['bunch_our_projects']	=	array(
					'name' => esc_html__('Our Projects', BUNCH_NAME),
					'base' => 'bunch_our_projects',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-industry' ,
					'description' => esc_html__('Show Our Projects.', BUNCH_NAME),
					'params' => array(
						
						$number,
						array(
							"type"			=>	"text",
							"label"			=>	__( 'Excluded Categories ID', BUNCH_NAME),
							"name"			=>	"exclude_cats",
							"description"	=>	__( 'Enter Excluded Categories ID seperated by commas.', BUNCH_NAME)
						),
						$orderby,
						$order,

					),
			);
//Project Single
$options['bunch_project_single']	=	array(
					'name' => esc_html__('Project Single', BUNCH_NAME),
					'base' => 'bunch_project_single',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-industry' ,
					'description' => esc_html__('Show Project Single.', BUNCH_NAME),
					'params' => array(
						
						$title,
						$subtitle,
						$text,
						$btn_title,
						$btn_link,
						array(
							 'type' => 'attach_image_url',
							 'label' => esc_html__( 'Project Image', BUNCH_NAME ),
							 'name' => 'proj_img',
							 'description' => esc_html__( 'Enter Project Image.', BUNCH_NAME ),
						),
						//Group Start
						array(
							 'type' => 'group',
							 'label' => esc_html__( 'Project Info', BUNCH_NAME ),
							 'name' => 'proj_group',
							 'description' => esc_html__( 'Enter Project Info.', BUNCH_NAME ),
							 'params' => array(
									array(
										 'type' => 'text',
										 'label' => esc_html__( 'Project Info Title', BUNCH_NAME ),
										 'name' => 'proj_title',
										 'description' => esc_html__( 'Enter Project Info title.', BUNCH_NAME ),
									),
									array(
										 'type' => 'text',
										 'label' => esc_html__( 'Project Info Text', BUNCH_NAME ),
										 'name' => 'proj_text',
										 'description' => esc_html__( 'Enter Project Info Text.', BUNCH_NAME ),
									),
							 ),
						),//Group End

					),
			);
//Project Analysis
$options['bunch_project_analysis']	=	array(
					'name' => esc_html__('Project Analysis', BUNCH_NAME),
					'base' => 'bunch_project_analysis',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-area-chart' ,
					'description' => esc_html__('Show Project Analysis.', BUNCH_NAME),
					'params' => array(
						
						$title,
						$text,
						array(
							 'type' => 'attach_image_url',
							 'label' => esc_html__( 'Project Analysis Image', BUNCH_NAME ),
							 'name' => 'analysis_img',
							 'description' => esc_html__( 'Enter Project Analysis Image.', BUNCH_NAME ),
						),
						

					),
			);
//Project Solution
$options['bunch_project_solution']	=	array(
					'name' => esc_html__('Project Solution', BUNCH_NAME),
					'base' => 'bunch_project_solution',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-bar-chart' ,
					'description' => esc_html__('Show Project Solution.', BUNCH_NAME),
					'params' => array(
						
						$title,
						$text,
						//Group Start
						array(
							 'type' => 'group',
							 'label' => esc_html__( 'Solution FAQs', BUNCH_NAME ),
							 'name' => 'proj_group',
							 'description' => esc_html__( 'Enter Project Solution FAQs.', BUNCH_NAME ),
							 'params' => array(
									array(
										 'type' => 'text',
										 'label' => esc_html__( 'Project FAQ Title', BUNCH_NAME ),
										 'name' => 'proj_title',
										 'description' => esc_html__( 'Enter Project FAQ title.', BUNCH_NAME ),
									),
									array(
										 'type' => 'textarea',
										 'label' => esc_html__( 'Project FAQ Text', BUNCH_NAME ),
										 'name' => 'proj_text',
										 'description' => esc_html__( 'Enter Project FAQ Text.', BUNCH_NAME ),
									),
							 ),
						),//Group End
						array(
							 'type' => 'attach_image_url',
							 'label' => esc_html__( 'Project Solution Image', BUNCH_NAME ),
							 'name' => 'solution_img',
							 'description' => esc_html__( 'Enter Project Solution Image.', BUNCH_NAME ),
						),
						

					),
			);
//Consultation Form
$options['bunch_consultation_form']	=	array(
					'name' => esc_html__('Consultation Form', BUNCH_NAME),
					'base' => 'bunch_consultation_form',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-file-text-o' ,
					'description' => esc_html__('Show Consultation Form.', BUNCH_NAME),
					'params' => array(
						
						$title,
						array(
							 'type' => 'textarea',
							 'label' => esc_html__( 'Contact Form 7 Shortcode', BUNCH_NAME ),
							 'name' => 'contact_form',
							 'description' => esc_html__( 'Enter Contact Form 7 Shortcode.', BUNCH_NAME ),
						),
						array(
							 'type' => 'attach_image_url',
							 'label' => esc_html__( 'Consultation Form Image', BUNCH_NAME ),
							 'name' => 'form_img',
							 'description' => esc_html__( 'Enter Consultation Form Image.', BUNCH_NAME ),
						),

					),
			);
//FAQs and Question Form
$options['bunch_faqs_form']	=	array(
					'name' => esc_html__('FAQs and Question Form', BUNCH_NAME),
					'base' => 'bunch_faqs_form',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-question-circle' ,
					'description' => esc_html__('Show FAQs and Question Form.', BUNCH_NAME),
					'params' => array(
						
						$text_limit,
						$number,
						array(
							"type" => "dropdown",
							"label" => __( 'Category', BUNCH_NAME),
							"name" => "cat",
							"options" =>  bunch_get_categories(array( 'taxonomy' => 'faqs_category'), true),
							"description" => __( 'Choose Category.', BUNCH_NAME)
						),
						$orderby,
						$order,
						array(
							 'type' => 'text',
							 'label' => esc_html__( 'Form Title', BUNCH_NAME ),
							 'name' => 'form_title',
							 'description' => esc_html__( 'Enter Form Title.', BUNCH_NAME ),
						),
						array(
							 'type' => 'textarea',
							 'label' => esc_html__( 'Contact Form 7 Shortcode', BUNCH_NAME ),
							 'name' => 'contact_form',
							 'description' => esc_html__( 'Enter Contact Form 7 Shortcode.', BUNCH_NAME ),
						),

					),
			);
//Our Testimonials Style 2
$options['bunch_our_testimonials_2']	=	array(
					'name' => esc_html__('Our Testimonials 2', BUNCH_NAME),
					'base' => 'bunch_our_testimonials_2',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-commenting' ,
					'description' => esc_html__('Show Our Testimonials Style 2.', BUNCH_NAME),
					'params' => array(
						
						$text_limit,
						$number,
						array(
							"type" => "dropdown",
							"label" => __( 'Category', BUNCH_NAME),
							"name" => "cat",
							"options" =>  bunch_get_categories(array( 'taxonomy' => 'testimonials_category'), true),
							"description" => __( 'Choose Category.', BUNCH_NAME)
						),
						$orderby,
						$order,

					),
			);
//Services Grid
$options['bunch_services_grid']	=	array(
					'name' => esc_html__('Services Grid', BUNCH_NAME),
					'base' => 'bunch_services_grid',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Services Grid.', BUNCH_NAME),
					'params' => array(
						
						$text_limit,
						$number,
						array(
							"type" => "dropdown",
							"label" => __( 'Category', BUNCH_NAME),
							"name" => "cat",
							"options" =>  bunch_get_categories(array( 'taxonomy' => 'services_category'), true),
							"description" => __( 'Choose Category.', BUNCH_NAME)
						),
						$orderby,
						$order,

					),
			);
//Services Single
$options['bunch_services_single']	=	array(
					'name' => esc_html__('Services Single', BUNCH_NAME),
					'base' => 'bunch_services_single',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Services Single.', BUNCH_NAME),
					'is_container'	=>	true,
					'params' => array(
						
						$title,
						array(
							 'type' => 'textarea_html',
							 'label' => esc_html__( 'Service Single Text', BUNCH_NAME ),
							 'name' => 'content',
							 'description' => esc_html__( 'Enter Service Single Text with HTML.', BUNCH_NAME ),
						),
						array(
							 'type' => 'attach_image_url',
							 'label' => esc_html__( 'Service Single Image', BUNCH_NAME ),
							 'name' => 'service_img',
							 'description' => esc_html__( 'Enter Service Single Image.', BUNCH_NAME ),
						),
						

					),
			);
//Business Growth Service
$options['bunch_business_growth']	=	array(
					'name' => esc_html__('Business Growth Service', BUNCH_NAME),
					'base' => 'bunch_business_growth',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-briefcase' ,
					'description' => esc_html__('Show Business Growth Service.', BUNCH_NAME),
					'params' => array(
						
						$title,
						//Group Start
						array(
							 'type' => 'group',
							 'label' => esc_html__( 'Business Growth Service', BUNCH_NAME ),
							 'name' => 'business_group',
							 'description' => esc_html__( 'Enter Business Growth Service.', BUNCH_NAME ),
							 'params' => array(
									array(
										 'type' => 'text',
										 'label' => esc_html__( 'Business Growth Service Title', BUNCH_NAME ),
										 'name' => 'service_title',
										 'description' => esc_html__( 'Enter Business Growth Service title.', BUNCH_NAME ),
									),
									array(
										 'type' => 'textarea',
										 'label' => esc_html__( 'Business Growth Service Text', BUNCH_NAME ),
										 'name' => 'service_text',
										 'description' => esc_html__( 'Enter Business Growth Service Text.', BUNCH_NAME ),
									),
									array(
										 'type' => 'icon_picker',
										 'label' => esc_html__( 'Business Growth Service Icon', BUNCH_NAME ),
										 'name' => 'service_icon',
										 'admin_label' => true,
										 'description' => esc_html__( 'Enter Business Growth Service Icon.', BUNCH_NAME ),
									),
							 ),
						),//Group End
											

					),
			);
//Advantages of Service and Business Growth Strategies
$options['bunch_advantages_strategies']	=	array(
					'name' => esc_html__('Advantages and Strategies', BUNCH_NAME),
					'base' => 'bunch_advantages_strategies',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-line-chart' ,
					'description' => esc_html__('Show Service Advantages and Strategies.', BUNCH_NAME),
					'params' => array(
						
						//Tabs Start
						esc_html__( 'Advantages', BUNCH_NAME ) => array(

							array(
								"type"			=>	"text",
								"label"			=>	esc_html__('Advantage Title', BUNCH_NAME ),
								"name"			=>	"adv_title",
								"description"	=>	esc_html__('Enter Advantage Title.', BUNCH_NAME )
							),
							array(
								"type"			=>	"textarea",
								"label"			=>	esc_html__('Advantage Text', BUNCH_NAME ),
								"name"			=>	"adv_text",
								"description"	=>	esc_html__('Enter Advantage Text.', BUNCH_NAME )
							),
							//Group Start
							array(
								 'type' => 'group',
								 'label' => esc_html__( 'Advantages', BUNCH_NAME ),
								 'name' => 'advantage_group',
								 'description' => esc_html__( 'Enter the Advantages.', BUNCH_NAME ),
								 'params' => array(
										
										array(
											"type"			=>	"text",
											"label"			=>	esc_html__('Advantage Name', BUNCH_NAME ),
											"name"			=>	"adv_name",
											"description"	=>	esc_html__('Enter Advantage Name.', BUNCH_NAME )
										),
								 ),
							),//Group End
				
					   ),//Tabs End
					   
					   //Tabs Start
						esc_html__( 'Strategies', BUNCH_NAME ) => array(

							array(
								"type"			=>	"text",
								"label"			=>	esc_html__('Strategy Title', BUNCH_NAME ),
								"name"			=>	"str_title",
								"description"	=>	esc_html__('Enter Strategy Title.', BUNCH_NAME )
							),
							//Group Start
							array(
								 'type' => 'group',
								 'label' => esc_html__( 'Strategies', BUNCH_NAME ),
								 'name' => 'strategy_group',
								 'description' => esc_html__( 'Enter the Strategies.', BUNCH_NAME ),
								 'params' => array(
										
										array(
											"type"			=>	"text",
											"label"			=>	esc_html__('Strategy Name', BUNCH_NAME ),
											"name"			=>	"str_name",
											"description"	=>	esc_html__('Enter Strategy Name.', BUNCH_NAME )
										),
										array(
											"type"			=>	"textarea",
											"label"			=>	esc_html__('Strategy Text', BUNCH_NAME ),
											"name"			=>	"str_text",
											"description"	=>	esc_html__('Enter Strategy Text.', BUNCH_NAME )
										),
								 ),
							),//Group End
				
					   ),//Tabs End
						
					),
			);
//Service Consultation Form
$options['bunch_service_consult_form']	=	array(
					'name' => esc_html__('Service Consultation Form', BUNCH_NAME),
					'base' => 'bunch_service_consult_form',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-file-text-o' ,
					'description' => esc_html__('Show Service Consultation Form.', BUNCH_NAME),
					'params' => array(
						
						$title,
						array(
							 'type' => 'textarea',
							 'label' => esc_html__( 'Contact Form 7 Shortcode', BUNCH_NAME ),
							 'name' => 'contact_form',
							 'description' => esc_html__( 'Enter Contact Form 7 Shortcode.', BUNCH_NAME ),
						),

					),
			);
//Blog Grid
$options['bunch_blog_grid']	=	array(
					'name' => esc_html__('Blog Grid', BUNCH_NAME),
					'base' => 'bunch_blog_grid',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-thumb-tack' ,
					'description' => esc_html__('Show Blog Grid.', BUNCH_NAME),
					'params' => array(
						
						$text_limit,
						$number,
						array(
							"type" => "dropdown",
							"label" => __( 'Category', BUNCH_NAME),
							"name" => "cat",
							"options" =>  bunch_get_categories(array( 'taxonomy' => 'category'), true),
							"description" => __( 'Choose Category.', BUNCH_NAME)
						),
						$orderby,
						$order,

					),
			);
//Contact Info and Map
$options['bunch_contact_info_map']	=	array(
					'name' => esc_html__('Contact Info and Map', BUNCH_NAME),
					'base' => 'bunch_contact_info_map',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-info' ,
					'description' => esc_html__('Show Contact Info and Map.', BUNCH_NAME),
					'params' => array(
						
						//Tabs Start
						esc_html__( 'Contact Info', BUNCH_NAME ) => array(

							$title,
							$text,
							//Group Start
							array(
								 'type' => 'group',
								 'label' => esc_html__( 'Contact Info', BUNCH_NAME ),
								 'name' => 'info_group',
								 'description' => esc_html__( 'Enter the Contact Info.', BUNCH_NAME ),
								 'params' => array(
										
										array(
											"type"			=>	"text",
											"label"			=>	esc_html__('Info Title', BUNCH_NAME ),
											"name"			=>	"info_title",
											"description"	=>	esc_html__('Enter Info Title.', BUNCH_NAME )
										),
										array(
											"type"			=>	"textarea",
											"label"			=>	esc_html__('Address', BUNCH_NAME ),
											"name"			=>	"address",
											"description"	=>	esc_html__('Enter Address.', BUNCH_NAME )
										),
										array(
											"type"			=>	"text",
											"label"			=>	esc_html__('Phone', BUNCH_NAME ),
											"name"			=>	"phone",
											"description"	=>	esc_html__('Enter Phone.', BUNCH_NAME )
										),
										array(
											"type"			=>	"text",
											"label"			=>	esc_html__('Email', BUNCH_NAME ),
											"name"			=>	"email",
											"description"	=>	esc_html__('Enter Email.', BUNCH_NAME )
										),
										array(
											"type"			=>	"text",
											"label"			=>	esc_html__('Time', BUNCH_NAME ),
											"name"			=>	"time",
											"description"	=>	esc_html__('Enter Time.', BUNCH_NAME )
										),
								 ),
							),//Group End
				
					   ),//Tabs End
					   
					   //Tabs Start
						esc_html__( 'Map', BUNCH_NAME ) => array(

							array(
								"type"			=>	"text",
								"label"			=>	esc_html__('Map Latitude', BUNCH_NAME ),
								"name"			=>	"lat",
								"description"	=>	esc_html__('Enter Map Latitude.', BUNCH_NAME )
							),
							array(
								"type"			=>	"text",
								"label"			=>	esc_html__('Map Longitude', BUNCH_NAME ),
								"name"			=>	"long",
								"description"	=>	esc_html__('Enter Map Longitude.', BUNCH_NAME )
							),
							array(
								"type"			=>	"text",
								"label"			=>	esc_html__('Map Title', BUNCH_NAME ),
								"name"			=>	"map_title",
								"description"	=>	esc_html__('Enter Map Title.', BUNCH_NAME )
							),
							array(
								'type'			=>	'attach_image_url',
								'label'			=>	esc_html__( 'Map Marker Image', BUNCH_NAME ),
								'name'			=>	'mark_img',
								'description'	=>	esc_html__( 'Enter Map Marker Image.', BUNCH_NAME ),
							),
				
					   ),//Tabs End
						
					),
			);
//Contact Form and Departments
$options['bunch_contact_form_depart']	=	array(
					'name' => esc_html__('Contact Form and Departments', BUNCH_NAME),
					'base' => 'bunch_contact_form_depart',
					'class' => '',
					'category' => esc_html__('Fortune', BUNCH_NAME),
					'icon' => 'fa-users' ,
					'description' => esc_html__('Show Contact Form and Departments.', BUNCH_NAME),
					'params' => array(
						
						array(
							"type"			=>	"text",
							"label"			=>	esc_html__('Form Section Title', BUNCH_NAME ),
							"name"			=>	"form_title",
							"description"	=>	esc_html__('Enter Contact Form Section Title.', BUNCH_NAME )
						),
						array(
							'type' 			=>	'textarea',
							'label'			=>	esc_html__( 'Contact Form 7 Shortcode', BUNCH_NAME ),
							'name'			=>	'contact_form',
							'description'	=>	esc_html__( 'Enter Contact Form 7 Shortcode.', BUNCH_NAME ),
						),
						array(
							"type"			=>	"text",
							"label"			=>	esc_html__('Department Section Title', BUNCH_NAME ),
							"name"			=>	"depart_title",
							"description"	=>	esc_html__('Enter Department Section Title.', BUNCH_NAME )
						),
						//Group Start
						array(
							 'type' => 'group',
							 'label' => esc_html__( 'Department Info', BUNCH_NAME ),
							 'name' => 'depart_group',
							 'description' => esc_html__( 'Enter the Department Info.', BUNCH_NAME ),
							 'params' => array(
									
									array(
										"type"			=>	"text",
										"label"			=>	esc_html__('Department Name', BUNCH_NAME ),
										"name"			=>	"depart_name",
										"description"	=>	esc_html__('Enter Department Name.', BUNCH_NAME )
									),
									array(
										"type"			=>	"text",
										"label"			=>	esc_html__('Person Name', BUNCH_NAME ),
										"name"			=>	"person_name",
										"description"	=>	esc_html__('Enter Person Name.', BUNCH_NAME )
									),
									array(
										"type"			=>	"text",
										"label"			=>	esc_html__('Person Phone', BUNCH_NAME ),
										"name"			=>	"person_phone",
										"description"	=>	esc_html__('Enter Person Phone.', BUNCH_NAME )
									),
									array(
										"type"			=>	"text",
										"label"			=>	esc_html__('Person Email', BUNCH_NAME ),
										"name"			=>	"person_email",
										"description"	=>	esc_html__('Enter Person Email.', BUNCH_NAME )
									),
									array(
										"type"			=>	"attach_image_url",
										"label"			=>	esc_html__('Person Image', BUNCH_NAME ),
										"name"			=>	"person_img",
										"description"	=>	esc_html__('Enter Person Image.', BUNCH_NAME )
									),
							 ),
						),//Group End
						
					),
			);

/****************************************************EOF************************************************************/

return $options;