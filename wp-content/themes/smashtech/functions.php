<?php
/*
 *  WP Bootstrap 4 Sass Custom functions, support, custom post types and more.
 *  Author: tone4hook
 *  URL: https://github.com/tone4hook
 *
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('wpbootstrapsass', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// Register Custom Navigation Walker
require_once('inc/class-wp-bootstrap-navwalker.php');

// WP Bootstrap Sass navigation
function wpbootstrapsass_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'collapse navbar-collapse',
		'container_id'    => 'bs-example-navbar-collapse-1',
		'menu_class'      => 'navbar-nav ml-auto',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'depth'           => 2,
		'walker'          => new WP_Bootstrap_Navwalker()
		)
	);
}

// Load WP Bootstrap Sass scripts (header.php)
function wpbootstrapsass_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        // Custom scripts
        wp_register_script('wpbootstrapsassscripts', get_template_directory_uri() . '/dist/main.bundle.js', array('jquery'), '1.0.0');

        // Enqueue it!
        wp_enqueue_script( array('wpbootstrapsassscripts') );

    }
}

// Add attributes to the script tag
// async or defer
// *** for CDN integrity and crossorigin attributes ***
function add_script_tag_attributes($tag, $handle)
{
    switch ($handle) {

    	// adding async to main js bundle
    	// for defer, replace async="async" with defer="defer"
    	case ('wpbootstrapsassscripts'):
    		return str_replace( ' src', ' async="async" src', $tag );
    	break;

    	// example adding CDN integrity and crossorigin attributes
    	// Note: popper.js is loaded into the main.bundle.js from npm
    	// This is just an example
        case ('popper-js'):
            return str_replace( ' min.js', 'min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"', $tag );
        break;

    	// example adding CDN integrity and crossorigin attributes
    	// Note: bootstrap.js is loaded into the main.bundle.js from npm
    	// This is just an example
        case ('bootstrap-js'):
            return str_replace( ' min.js', 'min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"', $tag );
        break;

        default:
            return $tag;

    } // /switch
}

// Load WP Bootstrap Sass conditional scripts
function wpbootstrapsass_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load WP Bootstrap Sass styles
function wpbootstrapsass_styles()
{
    // Normalize is loaded in Bootstrap and both are imported into the style.css via Sass
    wp_register_style('wpbootstrapsass', get_template_directory_uri() . '/dist/style.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('wpbootstrapsass'); // Enqueue it!
}

// Register WP Bootstrap Sass Navigation
function register_wpbootstrapsass_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'wpbootstrapsass'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'wpbootstrapsass'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'wpbootstrapsass') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'wpbootstrapsass'),
        'description' => __('Description for this widget-area...', 'wpbootstrapsass'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s card mb-2"><div class="card-body">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="card-title">',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'wpbootstrapsass'),
        'description' => __('Description for this widget-area...', 'wpbootstrapsass'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s card mb-2"><div class="card-body">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="card-title">',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function wpbootstrapsass_pagination()
{
    global $wp_query;
    $big = 999999999;
    $links = paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => '<span class="border p-1">&lt;</span>',
        'next_text' => '<span class="border p-1">&gt;</span>',
        'before_page_number' => '<span class="border p-1">',
        'after_page_number' => '</span>',
    ));

    if ( $links ) :

        echo $links;

    endif;

}

// Custom Excerpts
function wpbootstrapsass_index($length) // Create 20 Word Callback for Index page Excerpts, call using wpbootstrapsass_excerpt('wpbootstrapsass_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using wpbootstrapsass_excerpt('wpbootstrapsass_custom_post');
function wpbootstrapsass_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function wpbootstrapsass_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function wpbootstrapsass_view_article($more)
{
    global $post;
    return '... <p><a class="view-article btn btn-secondary" href="' . get_permalink($post->ID) . '" role="button">' . __('Read more', 'wpbootstrapsass') . ' </a></p>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function wpbootstrapsass_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function wpbootstrapsassgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function wpbootstrapsasscomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

// add Bootstrap 4 .img-fluid class to images inside post content
function add_class_to_image_in_content($content) 
{

	$content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
	$document = new DOMDocument();
	libxml_use_internal_errors(true);
	$document->loadHTML(utf8_decode($content));

	$imgs = $document->getElementsByTagName('img');
	foreach ($imgs as $img) {           
		$img->setAttribute('class','img-fluid');
	}

	$html = $document->saveHTML();
	return $html;  	

}

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'wpbootstrapsass_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'wpbootstrapsass_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'wpbootstrapsass_styles'); // Add Theme Stylesheet
add_action('init', 'register_wpbootstrapsass_menu'); // Add WP Bootstrap Sass Menu
add_action('init', 'create_post_type_custom_post_type_demo'); // Add our WP Bootstrap Sass Custom Post Type
add_action('init', 'create_post_type_smash_tv'); // Add our WP Bootstrap Sass Custom Post Type

add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'wpbootstrapsass_pagination'); // Add our wpbootstrapsass Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('script_loader_tag', 'add_script_tag_attributes', 10, 2); // Add attributes to CDN script tag
add_filter('avatar_defaults', 'wpbootstrapsassgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'wpbootstrapsass_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'wpbootstrapsass_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
// add .img-fluid class to images in the content
add_filter('the_content', 'add_class_to_image_in_content');

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('wpbootstrapsass_shortcode_demo', 'wpbootstrapsass_shortcode_demo'); // You can place [wpbootstrapsass_shortcode_demo] in Pages, Posts now.
add_shortcode('wpbootstrapsass_shortcode_demo_2', 'wpbootstrapsass_shortcode_demo_2'); // Place [wpbootstrapsass_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [wpbootstrapsass_shortcode_demo] [wpbootstrapsass_shortcode_demo_2] Here's the page title! [/wpbootstrapsass_shortcode_demo_2] [/wpbootstrapsass_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called custom-post-type
function create_post_type_custom_post_type_demo()
{
    register_taxonomy_for_object_type('category', 'careers'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'careers');
    register_post_type('careers', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Careers', 'wpbootstrapsass'), // Rename these to suit
            'singular_name' => __('Career', 'wpbootstrapsass'),
            'add_new' => __('Add New', 'wpbootstrapsass'),
            'add_new_item' => __('Add New Career', 'wpbootstrapsass'),
            'edit' => __('Edit', 'wpbootstrapsass'),
            'edit_item' => __('Edit Career', 'wpbootstrapsass'),
            'new_item' => __('New Career', 'wpbootstrapsass'),
            'view' => __('View Career', 'wpbootstrapsass'),
            'view_item' => __('View Career Post', 'wpbootstrapsass'),
            'search_items' => __('Search Careers', 'wpbootstrapsass'),
            'not_found' => __('No Careers found', 'wpbootstrapsass'),
            'not_found_in_trash' => __('No Careers found in Trash', 'wpbootstrapsass')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom WP Bootstrap Sass post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}

function create_post_type_smash_tv()
{
    register_taxonomy_for_object_type('category', 'smash-tv'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'smash-tv');
    register_post_type('smash-tv', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Smash TV', 'wpbootstrapsass'), // Rename these to suit
            'singular_name' => __('Smash TV', 'wpbootstrapsass'),
            'add_new' => __('Add New', 'wpbootstrapsass'),
            'add_new_item' => __('Add New Video', 'wpbootstrapsass'),
            'edit' => __('Edit', 'wpbootstrapsass'),
            'edit_item' => __('Edit Smash TV', 'wpbootstrapsass'),
            'new_item' => __('New Smash TV', 'wpbootstrapsass'),
            'view' => __('View Smash TV', 'wpbootstrapsass'),
            'view_item' => __('View Smash TV Post', 'wpbootstrapsass'),
            'search_items' => __('Search Smash TV', 'wpbootstrapsass'),
            'not_found' => __('No Smash TV found', 'wpbootstrapsass'),
            'not_found_in_trash' => __('No Smash TV found in Trash', 'wpbootstrapsass')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom WP Bootstrap Sass post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function wpbootstrapsass_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function wpbootstrapsass_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}

/*------------------------------------*\
    Dev Utilities
\*------------------------------------*/
function pr($var) {
  echo "<pre>".print_r($var, 1)."</pre>";
}


function is_mobile() {
  $useragent=$_SERVER['HTTP_USER_AGENT'];
  if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
    return true;
  } else {
    return false;
  }
}







/*------------------------------------*\
    Theme Options
\*------------------------------------*/

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Smashtech Theme Settings',
        'menu_title'    => 'Global Settings',
        'menu_slug'     => 'theme-global-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}


?>
