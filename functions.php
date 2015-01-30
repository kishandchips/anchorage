<?php
define('THEME_NAME', '');
$template_directory_uri = get_template_directory_uri();

// Enable Features
	add_theme_support( 'post-thumbnails' );
	add_editor_style('/css/editor-style.css');
	register_nav_menus(array(
		'header_main' => 'Header Menu',
		'footer_main' => 'Footer Menu')
	);

// Image sizes
	add_image_size( 'slider', 2000, 9999, false );
	add_image_size( 'home-square', 400, 400, true );

// Add Actions
	add_action( 'wp_enqueue_scripts', 'custom_styles', 30 );
	add_action( 'wp_enqueue_scripts', 'custom_scripts', 30 );
	add_action("gform_field_standard_settings", "custom_gform_standard_settings", 10, 2);
	add_action('gform_enqueue_scripts',"custom_gform_enqueue_scripts", 10, 2);
	// add_action( 'init', 'create_post_type' );
	// add_action( 'init', 'create_custom_categories' );
	// add_action( 'pre_get_posts', 'custom_posts_per_page' );
	// add_action( 'admin_menu', 'my_remove_menu_pages',999 );

// Remove Actions
	remove_action('wp_head', 'feed_links', 2);  
	remove_action('wp_head', 'feed_links_extra', 3);  
	remove_action('wp_head', 'rsd_link');  
	remove_action('wp_head', 'wlwmanifest_link');  
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);  
	remove_action('wp_head', 'wp_generator'); 

// Add Filters
	add_filter('upload_mimes', 'cc_mime_types');
	add_filter("gform_tabindex", "gform_tabindexer");
	add_filter("gform_submit_button", "form_submit_button", 10, 2);

// Functions
function custom_styles(){
	global $template_directory_uri;

	wp_enqueue_style('fonts', 'http://fast.fonts.net/cssapi/3572e405-0209-478c-af7b-f4d6cd97e433.css' );
	wp_enqueue_style('main', $template_directory_uri . '/css/main.css');
}

function custom_scripts(){
	global $template_directory_uri;

	wp_enqueue_script('modernizr', $template_directory_uri . '/js/plugins/modernizr-2.6.1.min.js', array('jquery'), '', true);
	wp_enqueue_script('owl', $template_directory_uri . '/js/plugins/owl.carousel.min.js', array('jquery'), '', true);
	wp_enqueue_script('main', $template_directory_uri . '/js/min/main-min.js', array('jquery'), '', true);

	wp_localize_script( 'main', 'wordpress', array(
		'template' => $template_directory_uri,
		'base' => site_url(),
	));
}

// ACF
if( function_exists('acf_add_options_page') ) acf_add_options_page();

// SVG Support
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}


// GRAVITY FORMS
function custom_gform_standard_settings($position, $form_id){
    if($position == 25){
    	?>
        <li style="display: list-item; ">
            <label for="field_placeholder">Placeholder Text</label>
            <input type="text" id="field_placeholder" size="35" onkeyup="SetFieldProperty('placeholder', this.value);">
        </li>
        <?php
    }
}

function gform_tabindexer() {
    $starting_index = 1000;
    return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
}


function custom_gform_enqueue_scripts($form, $is_ajax=false){
    ?>
<script>
    jQuery(function(){
        <?php
        foreach($form['fields'] as $i=>$field){
            if(isset($field['placeholder']) && !empty($field['placeholder'])){
                ?>
                jQuery('#input_<?php echo $form['id']?>_<?php echo $field['id']?>').attr('placeholder','<?php echo $field['placeholder']?>');
                <?php
            }
        }
        ?>
    });
    </script>
    <?php
}

function form_submit_button($button, $form){
    return "<button class='submit' id='gform_submit_button_{$form["id"]}'><span>Submit</span><i class='icon-arrow-right'></i></button>";
}


// // Register Custom Post Types
// function create_post_type() {

// 	register_post_type( 'POSTS',
// 		array(
// 			'labels' => array(
// 				'name' => __( 'POSTS' ),
// 				'singular_name' => __( 'POST' ),
// 				'add_new' => __('Add POST'),
// 				'search_items' => __('Search POSTS'),
// 				'not_found' => __('No POSTS Found')
// 			),
// 		'public' => true,
// 		'has_archive' => true,
// 		'menu_position' => 5,
// 		'hierarchical' => true,
// 		'supports' => array(
// 			'title',
// 			'editor',
// 			'excerpt',
// 			'thumbnail',
// 			'page-attributes'
// 			)
// 		)
// 	);

// 	flush_rewrite_rules( false );
// }

// // Register Taxonomies
// function create_custom_categories() {

// 	$post_labels = array(
// 		'name'					=> _x( 'post Categories', 'Taxonomy plural name', 'text-domain' ),
// 		'singular_name'			=> _x( 'post Category', 'Taxonomy singular name', 'text-domain' ),
// 		'search_items'			=> __( 'Search post Categories', 'text-domain' ),
// 		'popular_items'			=> __( 'Popular post Categories', 'text-domain' ),
// 		'all_items'				=> __( 'All post Categories', 'text-domain' ),
// 		'parent_item'			=> __( 'Parent post Category', 'text-domain' ),
// 		'parent_item_colon'		=> __( 'Parent post Category', 'text-domain' ),
// 		'edit_item'				=> __( 'Edit post Category', 'text-domain' ),
// 		'update_item'			=> __( 'Update post Category', 'text-domain' ),
// 		'add_new_item'			=> __( 'Add New post Category', 'text-domain' ),
// 		'new_item_name'			=> __( 'New post Category', 'text-domain' ),
// 		'add_or_remove_items'	=> __( 'Add or remove post Category', 'text-domain' ),
// 		'choose_from_most_used'	=> __( 'Choose from most used post Categories', 'text-domain' ),
// 		'menu_name'				=> __( 'post Category', 'text-domain' ),
// 	);

// 	$post_args = array(
// 		'labels'            => $post_labels,
// 		'show_admin_column' => true,
// 		'query_var'         => true,
// 		'query_var'         => true,
// 	);

// 	register_taxonomy( 'post-category', array( 'post' ), $post_args );
// }

// // Register Sidebars
// function my_sidebars() {
// 	/* Register the 'primary' sidebar. */
// 	register_sidebar(
// 		array(
// 			'id' => 'ID',
// 			'name' => __( 'Name' ),
// 			'description' => __( 'Description' ),
// 			'before_widget' => '<div id="%1$s" class="widget %2$s">',
// 			'after_widget' => '</div>',
// 			'before_title' => '<h3 class="widget-title">',
// 			'after_title' => '</h3>'
// 		)
// 	);
// }

// // Posts per page
// function custom_posts_per_page($query){
// 	if( $query->is_search()){
// 		$query->set('posts_per_page', 15);
// 	}
// }