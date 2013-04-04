<?php

// Shortcodes
include('shortcodes.php');

//JAVASCRIPTZ 
//Straighten out the Javascript situation

/* load modernizr from foundation */
function modernize_it(){
    wp_register_script( 'modernizr', get_template_directory_uri() . '/js/vendor/custom.modernizr.js' ); 
    wp_enqueue_script( 'modernizr' );
}
add_action( 'wp_enqueue_scripts', 'modernize_it' );

/* pull jquery from google's CDN. If it's not available, grab the local copy. Code from wp.tutsplus.com :-) */
$url = 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'; // the URL to check against  
$test_url = @fopen($url,'r'); // test parameters  
if( $test_url !== false ) { // test if the URL exists  
    function load_external_jQuery() { // load external file  
        wp_deregister_script( 'jquery' ); // deregisters the default WordPress jQuery  
        wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', '', '1.9.1', true); // register the external file  
        wp_enqueue_script('jquery'); // enqueue the external file  
    }  
    add_action('wp_enqueue_scripts', 'load_external_jQuery'); // initiate the function  
} else {  

    function load_local_jQuery() {  
        wp_deregister_script('jquery'); // initiate the function  
        wp_register_script('jquery', bloginfo('template_url').'/js/vendor/jquery.min.js', __FILE__, false, '1.7.2', true); // register the local file  
        wp_enqueue_script('jquery'); // enqueue the local file  
    }  
    add_action('wp_enqueue_scripts', 'load_local_jQuery'); // initiate the function  
}  

/* Unlease the full power of Foundation, bro! */
function foundation_js(){
    wp_register_script( 'foundation', get_template_directory_uri() . '/js/foundation.min.js' ); 
    wp_enqueue_script( 'foundation', 'jQuery', '1.1', true );
    $pluginDeps = array('jQuery', 'foundation'); 
    
    wp_register_script( 'foundation-alerts', get_template_directory_uri() . '/js/foundation/foundation.alerts.js' ); 
    wp_enqueue_script( 'foundation-alerts', $pluginDeps, '1.1', true );

    wp_register_script( 'foundation-clearing', get_template_directory_uri() . '/js/foundation/foundation.clearing.js' ); 
    wp_enqueue_script( 'foundation-clearing', $pluginDeps, '1.1', true );

    wp_register_script( 'foundation-cookie', get_template_directory_uri() . '/js/foundation/foundation.cookie.js' ); 
    wp_enqueue_script( 'foundation-cookie',$pluginDeps, '1.1', true );

    wp_register_script( 'foundation-dropdown', get_template_directory_uri() . '/js/foundation/foundation.dropdown.js' ); 
    wp_enqueue_script( 'foundation-dropdown',$pluginDeps, '1.1', true );

    wp_register_script( 'foundation-forms', get_template_directory_uri() . '/js/foundation/foundation.forms.js' ); 
    wp_enqueue_script( 'foundation-forms', $pluginDeps, '1.1', true );

    wp_register_script( 'foundation-joyride', get_template_directory_uri() . '/js/foundation/foundation.joyride.js' ); 
    wp_enqueue_script( 'foundation-joyride', $pluginDeps, '1.1', true );

    wp_register_script( 'foundation-magellan', get_template_directory_uri() . '/js/foundation/foundation.magellan.js' ); 
    wp_enqueue_script( 'foundation-magellan', $pluginDeps, '1.1', true );

    wp_register_script( 'foundation-orbit', get_template_directory_uri() . '/js/foundation/foundation.orbit.js' ); 
    wp_enqueue_script( 'foundation-orbit', $pluginDeps, '1.1', true );

    wp_register_script( 'foundation-placeholder', get_template_directory_uri() . '/js/foundation/foundation.placeholder.js' ); 
    wp_enqueue_script( 'foundation-placeholder', $pluginDeps, '1.1', true );

    wp_register_script( 'foundation-reveal', get_template_directory_uri() . '/js/foundation/foundation.reveal.js' ); 
    wp_enqueue_script( 'foundation-reveal', $pluginDeps, '1.1', true );

    wp_register_script( 'foundation-section', get_template_directory_uri() . '/js/foundation/foundation.section.js' ); 
    wp_enqueue_script( 'foundation-section', $pluginDeps, '1.1', true );

    wp_register_script( 'foundation-tooltips', get_template_directory_uri() . '/js/foundation/foundation.tooltips.js' ); 
    wp_enqueue_script( 'foundation-tooltips', $pluginDeps, '1.1', true );

    wp_register_script( 'foundation-topbar', get_template_directory_uri() . '/js/foundation/foundation.topbar.js' ); 
    wp_enqueue_script( 'foundation-topbar', $pluginDeps, '1.1', true );

}

add_action('wp_enqueue_scripts', 'foundation_js');


// Thanks to http://320press.com/wpfoundation for some awesome bits! 
// From 320Press: Remove height/width attributes on images so they can be responsive
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

//Add thumbnail support
//TODO: Need some good sizes.
add_theme_support('post-thumbnails');

/////////////// MENUS
if ( ! function_exists('amsf_nav_menus') ) {

// Register Navigation Menus
function amsf_nav_menus() {
	$locations = array(
		'amsf_top_nav' => __( 'Top Bar Nav', 'text_domain' ),
		'amsf_footer_menu' => __( 'Footer Menu', 'text_domain' ),
	);

	register_nav_menus( $locations );
}

// Hook into the 'init' action
add_action( 'init', 'amsf_nav_menus' );

}

//Widget Areas
register_sidebar(array(
	'name'          => __( 'Sidebar widget area', 'theme_text_domain' ),
	'id'            => 'sidebar1',
	'description'   => 'This sidebar will display widgets on the side of pages using a two column layout.',
    'class'         => 'row',
	'before_widget' => '<div id="%1$s" class="widget %2$s large-12 columns">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4 class="widgettitle">',
	'after_title'   => '</h4>' ));

register_sidebar(array(
	'name'          => __( 'Footer Sidebar', 'theme_text_domain' ),
	'id'            => 'sidebar2',
	'description'   => 'This sidebar will display widgets in the footer area.',
    'class'         => 'large-block-grid-4',
	'before_widget' => '<li id="%1$s" class="widget %2$s"><div class="panel">',
	'after_widget'  => '</div></li>',
	'before_title'  => '<h4 class="widgettitle">',
	'after_title'   => '</h4>' ));

//Add custom classes to previous/next 
function posts_link_next_class() {
    return 'class="next-paginav large button expand"';
} 
add_filter('next_posts_link_attributes', 'posts_link_next_class');

function posts_link_prev_class() {
    return 'class="prev-paginav large button expand"';
} 
add_filter('previous_posts_link_attributes', 'posts_link_prev_class');

// From 320Press:	Change the standard class that wordpress puts on the active menu item in the nav bar
//				  	Deletes all CSS classes and id's, except for those listed in the array below
function custom_wp_nav_menu($var) {
        return is_array($var) ? array_intersect($var, array(
                //List of allowed menu classes
                'current_page_item',
                'current_page_parent',
                'current_page_ancestor',
                'first',
                'last',
                'vertical',
                'horizontal'
                )
        ) : '';
}
add_filter('nav_menu_css_class', 'custom_wp_nav_menu');
add_filter('nav_menu_item_id', 'custom_wp_nav_menu');
add_filter('page_css_class', 'custom_wp_nav_menu');

 
//Replaces "current-menu-item" with "active"
function current_to_active($text){
        $replace = array(
                //List of menu item classes that should be changed to "active"
                'current_page_item' => 'active',
                'current_page_parent' => 'active',
                'current_page_ancestor' => 'active',
        );
        $text = str_replace(array_keys($replace), $replace, $text);
                return $text;
        }
add_filter ('wp_nav_menu','current_to_active');

//From 320Press:	Deletes empty classes and removes the sub menu class
function strip_empty_classes($menu) {
    $menu = preg_replace('/ class=""| class="sub-menu"/','',$menu);
    return $menu;
}
add_filter ('wp_nav_menu','strip_empty_classes');

//Top Bar Nav
//This adds a topbar which is used as primary nav
function amsf_topnav() {
	?>
		<nav class="top-bar">
		  <ul class="title-area">
		    <!-- Title Area -->
		    <li class="name">
		      <h1><a class="brand" id="logo" href="<?php echo get_bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
		    </li>
		    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
		    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		  </ul>
		   <section class="top-bar-section">
	<?php
    wp_nav_menu( 
    	array( 
    		'theme_location'  => 'amsf_top_nav',
    		'container' => 'section',
    		'container_class' => 'top-bar-section',
    		'menu_class' => 'right',
    		'walker' => new top_bar_walker
    	)
    );
    ?>

			</section>
    	</nav>
    <?php
}

// add the 'has-dropdown' class to any li's that have children and add the arrows to li's with children
// also adds the 'dropdown' to the elements that are one...
class top_bar_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
            global $wp_query;
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
            
            $class_names = $value = '';
            
            // If the item has children, add the dropdown class for foundation
            if ( $args->has_children ) {
                $class_names = "has-dropdown ";
            }
            
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            
            $class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
            $class_names = ' class="'. esc_attr( $class_names ) . '"';
           
            $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
            
            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
            $item_output .= $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
            
        function start_lvl(&$output, $depth) {
            $indent = str_repeat("\t", $depth);
            $output .= "\n$indent<ul class=\"dropdown\">\n";
        }
            
        function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
            {
                $id_field = $this->db_fields['id'];
                if ( is_object( $args[0] ) ) {
                    $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
                }
                return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
            }       
}

//A little function to make breadcrumbs
//Courtesy of catswhocode.com
function the_breadcrumb() {
	if (!is_home()) {

		echo '<ul class="breadcrumbs">';
		echo '<li><a href="';
		echo get_option('home');
		echo '">';
		bloginfo('name');
		echo "</a></li>";
		if (is_category() || is_single()) {
			echo '<li>';
			the_category('</li><li>');
			echo '</li>';
			if (is_single()) {
				echo '<li class="current"><a href="';
				the_permalink();
				echo '">';
				the_title();
				echo '</a></li>';
			}
		} elseif (is_page()) {
				echo '<li class="current"><a href="';
				the_permalink();
				echo '">';
				the_title();
				echo '</a></li>';
		}
		echo '</ul>';
	}
}

?>