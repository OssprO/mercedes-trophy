<?php
/**
 * @package WordPress
 * @subpackage Mercedes Trophy
 * @since Mercedes Trophy 1.0
 */

	// Options Framework (https://github.com/devinsays/options-framework-plugin)
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/_inc/' );
		require_once dirname( __FILE__ ) . '/_inc/options-framework.php';
	}

	// Theme Setup (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function mercedestrophy_setup() {
		load_theme_textdomain( 'mercedestrophy', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status' ) );
		register_nav_menu( 'primary', __( 'Navigation Menu', 'mercedestrophy' ) );
		add_theme_support( 'post-thumbnails' );
	}
	add_action( 'after_setup_theme', 'mercedestrophy_setup' );

	

	    
	function mercedestrophy_enqueue_scripts() {
	    wp_enqueue_style( 'mercedestrophy-styles', get_template_directory_uri() . '/static/css/style.css' ); //our stylesheet
	    wp_enqueue_script( 'jquery' );
	    wp_enqueue_script( 'default-scripts', get_template_directory_uri() . '/static/js/footer.js', array(), '1.0', true );
	    if ( is_singular() ) wp_enqueue_script( 'comment-reply' );


	    // Scripts & Styles (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
		/**
	 	* Enqueue mercedestrophy scripts
	 	* @return void
	 	*/
		// Load jQuery
		if ( !is_admin() ) {
		   //wp_deregister_script('jquery');
		   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"), false);
		   wp_enqueue_script('jquery');
		}

		wp_enqueue_script( 'masonry', get_template_directory_uri() . '/static/js/masonry.pkgd.min.js', array(), '1.0', true );

		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/static/js/bootstrap.min.js', array(), '1.0', true );
	}
	add_action( 'wp_enqueue_scripts', 'mercedestrophy_enqueue_scripts' );



	

	// WP Title (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
	function mercedestrophy_wp_title( $title, $sep ) {
		global $paged, $page;

		if ( is_feed() )
			return $title;

//		 Add the site name.
		$title .= get_bloginfo( 'name' );

//		 Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";

//		 Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'mercedestrophy' ), max( $paged, $page ) );
//FIX
//		if (function_exists('is_tag') && is_tag()) {
//		   single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
//		elseif (is_archive()) {
//		   wp_title(''); echo ' Archive - '; }
//		elseif (is_search()) {
//		   echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
//		elseif (!(is_404()) && (is_single()) || (is_page())) {
//		   wp_title(''); echo ' - '; }
//		elseif (is_404()) {
//		   echo 'Not Found - '; }
//		if (is_home()) {
//		   bloginfo('name'); echo ' - '; bloginfo('description'); }
//		else {
//		    bloginfo('name'); }
//		if ($paged>1) {
//		   echo ' - page '. $paged; }

		return $title;
	}
	add_filter( 'wp_title', 'mercedestrophy_wp_title', 10, 2 );




	// Custom Menu
	register_nav_menu( 'primary', __( 'Navigation Menu', 'mercedestrophy' ) );

	// Widgets
	if ( function_exists('register_sidebar' )) {
		function mercedestrophy_widgets_init() {
			register_sidebar( array(
				'name'          => __( 'Sidebar Widgets', 'mercedestrophy' ),
				'id'            => 'sidebar-primary',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
		}
		add_action( 'widgets_init', 'mercedestrophy_widgets_init' );
	}

	// Navigation - update coming from twentythirteen
	function post_navigation() {
		echo '<div class="navigation">';
		echo '	<div class="next-posts">'.get_next_posts_link('&laquo; Older Entries').'</div>';
		echo '	<div class="prev-posts">'.get_previous_posts_link('Newer Entries &raquo;').'</div>';
		echo '</div>';
	}

	// Posted On
	function posted_on() {
		printf( __( '<span class="sep">Posted </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a> by <span class="byline author vcard">%5$s</span>', '' ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_author() )
		);
	}




	if ( ! isset( $content_width ) ) {
		$content_width = 1060;
	}

/* Uncomment to add custom image sizes


function mercedestrophy_add_image_sizes() {
    add_image_size( 'mercedestrophy-thumb', 300, 100, true );
    add_image_size( 'mercedestrophy-large', 600, 300, true );
}
add_action( 'init', 'mercedestrophy_add_image_sizes' );
 


function mercedestrophy_show_image_sizes($sizes) {
    $sizes['mercedestrophy-thumb'] = __( 'Mercedes Trophy Thumb', 'mercedestrophy' );
    $sizes['mercedestrophy-large'] = __( 'Mercedes Trophy Large', 'mercedestrophy' );
 
    return $sizes;
}
add_filter('image_size_names_choose', 'mercedestrophy_show_image_sizes');

*/





/* Uncomment to add minimum image upload sizes

add_filter('wp_handle_upload_prefilter','mercedestrophy_handle_upload_prefilter');
//Set the minimum file sizes
$minimumWidth = '640';
$minimumHeight = '480';

function mercedestrophy_handle_upload_prefilter($file)
{

    $img=getimagesize($file['tmp_name']);
    $minimum = array('width' => $minimumWidth, 'height' => $minimumHeight);
    $width= $img[0];
    $height =$img[1];

    if ($width < $minimum['width'] )
        return array("error"=>"Image dimensions are too small. Minimum width is {$minimum['width']}px. Uploaded image width is $width px");

    elseif ($height <  $minimum['height'])
        return array("error"=>"Image dimensions are too small. Minimum height is {$minimum['height']}px. Uploaded image height is $height px");
    else
        return $file; 
}
*/


	function hide_admin_bar_from_front_end(){
	  if (is_blog_admin()) {
	    return true;
	  }
	  return false;
	}
	add_filter( 'show_admin_bar', 'hide_admin_bar_from_front_end' );


	/**
	 * CUSTOM POST TYPES
	*/



	
	/* Here's how to create your customized labels */
	function WPMercedesTrophyInit() {
		// Clubes
		$labelsClubes = array(
			'name' => _x( 'Clubes', 'post type general name' ),
	        'singular_name' => _x( 'Club', 'post type singular name' ),
	        'add_new' => _x( 'Añadir nuevo', 'book' ),
	        'add_new_item' => __( 'Añadir nuevo Club' ),
	        'edit_item' => __( 'Editar Club' ),
	        'new_item' => __( 'Nuevo Club' ),
	        'view_item' => __( 'Ver Club' ),
	        'search_items' => __( 'Buscar Clubes' ),
	        'not_found' =>  __( 'No se han encontrado Clubes' ),
	        'not_found_in_trash' => __( 'No se han encontrado Clubes en la papelera' ),
	        'parent_item_colon' => ''
	    );
	 
	    $argsClubes = array( 'labels' => $labelsClubes,
	        'public' => true,
	        'publicly_queryable' => true,
	        'show_ui' => true,
	        'query_var' => true,
	        'rewrite' => true,
	        'capability_type' => 'post',
	        'hierarchical' => false,
	        'menu_position' => 5,
	        'supports' => array( 'title',  'thumbnail' )
	    );
	 
	    register_post_type( 'mt_clubes', $argsClubes );


	    register_taxonomy(
	        'mt_clubes_distribuidores',
	        'mt_clubes',
	        array(
	            'labels' => array(
	                'name' => 'Distribuidores',
	                'add_new_item' => 'Agregar nuevo distribuidor',
	                'new_item_name' => "Nuevo Distribuidor"
	            ),
	            'show_ui' => true,
	            'show_tagcloud' => false,
	            'hierarchical' => true
	        )
	    );

	    // Sponsors

	    $labelsSponsors = array(
			'name' => _x( 'Sponsors', 'post type general name' ),
	        'singular_name' => _x( 'Sponsor', 'post type singular name' ),
	        'add_new' => _x( 'Añadir nuevo', 'book' ),
	        'add_new_item' => __( 'Añadir nuevo Sponsor' ),
	        'edit_item' => __( 'Editar Sponsor' ),
	        'new_item' => __( 'Nuevo Sponsor' ),
	        'view_item' => __( 'Ver Sponsor' ),
	        'search_items' => __( 'Buscar Sponsor' ),
	        'not_found' =>  __( 'No se han encontrado Sponsors' ),
	        'not_found_in_trash' => __( 'No se han encontrado Sponsors en la papelera' ),
	        'parent_item_colon' => ''
	    );
	 
	    $argsSponsors = array( 'labels' => $labelsSponsors,
	        'public' => true,
	        'publicly_queryable' => true,
	        'show_ui' => true,
	        'query_var' => true,
	        'rewrite' => true,
	        'capability_type' => 'post',
	        'hierarchical' => false,
	        'menu_position' => 5,
	        'supports' => array( 'title',  'thumbnail' )
	    );
	 
	    register_post_type( 'mt_sponsors', $argsSponsors );

	    // Galerías

	    $labelsGalerias = array(
			'name' => _x( 'Galerías', 'post type general name' ),
	        'singular_name' => _x( 'Galería', 'post type singular name' ),
	        'add_new' => _x( 'Añadir nueva', 'book' ),
	        'add_new_item' => __( 'Añadir nueva Galería' ),
	        'edit_item' => __( 'Editar Galería' ),
	        'new_item' => __( 'Nuevo Galería' ),
	        'view_item' => __( 'Ver Galería' ),
	        'search_items' => __( 'Buscar Galería' ),
	        'not_found' =>  __( 'No se han encontrado Galerías' ),
	        'not_found_in_trash' => __( 'No se han encontrado Galerías en la papelera' ),
	        'parent_item_colon' => ''
	    );
	 
	    $argsGalerias = array( 'labels' => $labelsGalerias,
	        'public' => true,
	        'publicly_queryable' => true,
	        'show_ui' => true,
	        'query_var' => true,
	        'rewrite' => true,
	        'capability_type' => 'post',
	        'hierarchical' => false,
	        'menu_position' => 5,
	        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'post-formats' )
	    );
	 
	    register_post_type( 'mt_galerias', $argsGalerias );

		    
	}

	// La función no será utilizada antes del 'init'.
	add_action( 'init', 'WPMercedesTrophyInit' );


	/**
     * Creación de Metaboxes
     */

	function WPMercedesTrophyAddMetaboxes(){

        $prefix = 'wp_mercedestrophy_';

        $meta_boxes[] = array(
            'id'         => "{$prefix}galerias_info",
            'title'      => __( 'Información', 'textdomain' ),
            'post_types' => 'mt_galerias',
            'fields'     => array(
				array(
					'name' => __( 'Fecha', "{$prefix}fecha" ),
					'id'   => "{$prefix}fecha",
					'type' => 'date',
					// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
					'js_options' => array(
						'appendText'      => __( '(dd-mm-yyyy)', "{$prefix}fecha" ),
						'autoSize'        => true,
						'buttonText'      => __( 'Selecciona la Fecha', "{$prefix}fecha" ),
						'dateFormat'      => __( 'dd-mm-yy', "{$prefix}fecha" ),
						'numberOfMonths'  => 1,
						'showButtonPanel' => true,
					)
				),

				array(
					'name'        => __( 'Galería', "{$prefix}galeria" ),
					'id'          => "{$prefix}galeria",
					'type'        => 'text',
				),

            ),
        );

        $meta_boxes[] = array(
            'id'         => "{$prefix}clubes_info",
            'title'      => __( 'Información', 'textdomain' ),
            'post_types' => 'mt_clubes',
            'fields'     => array(
            	//Direccion : Editor
            	//Telefono : Phone
            	//Hoyo : Number
            	//Fecha : Date
            	//Encargado : Text
            	//Escopetazo : DateTime
            	//HiO : Taxonomy? (Select)

            	array(
					'name'        => __( 'Dirección', "{$prefix}direccion" ),
					'id'          => "{$prefix}direccion",
					'type'        => 'textarea',
					'rows'        => 5,
					'cols'        => 5
				),
				array(
					'name'        => __( 'Teléfono', "{$prefix}telefono" ),
					'id'          => "{$prefix}telefono",
					'type'        => 'text',
					'clone'       => true
				),
				array(
					'name' => __( 'Fecha', "{$prefix}fecha" ),
					'id'   => "{$prefix}fecha",
					'type' => 'date',
					// jQuery date picker options. See here http://jqueryui.com/demos/datepicker
					'js_options' => array(
						'appendText'      => __( '(dd-mm-yyyy)', "{$prefix}fecha" ),
						'autoSize'        => true,
						'buttonText'      => __( 'Selecciona la Fecha', "{$prefix}fecha" ),
						'dateFormat'      => __( 'dd-mm-yy', "{$prefix}fecha" ),
						'numberOfMonths'  => 1,
						'showButtonPanel' => true,
					)
				),
				array(
					'name'        => __( 'Hoyo', "{$prefix}hoyo" ),
					'id'          => "{$prefix}hoyo",
					'type'        => 'number',
					'step'        => '1',
					'min'         => 1,
				),

				array(
					'name'        => __( 'Encargado', "{$prefix}encargado" ),
					'id'          => "{$prefix}encargado",
					'type'        => 'text',
				),
				array(
					'name' => __( 'Escopetazo', "{$prefix}escopetazo" ),
					'id'   => "{$prefix}escopetazo",
					'type' => 'time',
					'js_options' => array(
						'stepMinute' => 5,
						'showSecond' => false
					),
				),
				array(
					'name'    => __( 'HiO', "{$prefix}hio" ),
					'id'      => "{$prefix}hio",
					'type'    => 'taxonomy',
					'taxonomy' => 'mt_clubes_distribuidores',
					'field_type'     => 'select',
					'query_args'     => array(),
				),

            ),
        );

        /*
        $meta_boxes[] = array(
            'id'         => "{$prefix}clubes_ganadores",
            'title'      => __( 'Información', 'textdomain' ),
            'post_types' => 'mt_clubes',
            'fields'     => array(
            	//O'Yes

            ),
        );
        */


        return $meta_boxes;
    }

	add_filter( 'rwmb_meta_boxes', 'WPMercedesTrophyAddMetaboxes' );


	function WPMercedesTrophyRemoveAdminMenus() {
	    remove_menu_page( 'edit-comments.php' );
	    remove_menu_page( 'edit.php' );
	}

	add_action( 'admin_menu', 'WPMercedesTrophyRemoveAdminMenus' );

?>