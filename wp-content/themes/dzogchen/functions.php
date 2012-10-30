<?php
/**
 * dzogchen functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, dzogchen_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'dzogchen_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */

/** make urls relative because of switching between phendeling.dzogchen to kunkhyabling.dzogchen for example */
    $filters = array(
    'post_link', // Normal post link
    'post_type_link', // Custom post type link
    'page_link', // Page link
    'attachment_link', // Attachment link
    'get_shortlink', // Shortlink
    'post_type_archive_link', // Post type archive link
    'get_pagenum_link', // Paginated link
    'get_comments_pagenum_link', // Paginated comment link
    'term_link', // Term link, including category, tag
    'search_link', // Search link
    'day_link', // Date archive link
    'month_link',
    'year_link',
    );
    foreach ( $filters as $filter ) {
    add_filter( $filter, 'wp_make_link_relative' );
    }


/** Tell WordPress to run dzogchen_setup() when the 'after_setup_theme' hook is run. */
add_action('after_setup_theme', 'dzogchen_setup');

if (!function_exists('dzogchen_setup')):

    remove_action( 'wp_head', 'rsd_link' );

    function get_excerpt_outside_loop($post_id) {
        global $wpdb;
        $query = "SELECT * FROM $wpdb->posts WHERE ID=$post_id";
        $result = $wpdb->get_results($query);
        //$post_excerpt = $result[0]->post_content;
        $post_excerpt = my_wp_trim_excerpt($result[0]->post_content);
        return $post_excerpt;
    }

    function my_wp_trim_excerpt($text) {
        $content = $text;
        $output = "";
        if (preg_match('/<!--more(.*?)?-->/', $content, $matches)) {
            $content = explode($matches[0], $content, 2);
            if (!empty($matches[1]) && !empty($more_link_text))
                $more_link_text = strip_tags(wp_kses_no_null(trim($matches[1])));

            $hasTeaser = true;
        } else {
            $content = array($content);
        }
        return str_replace("\r","",str_replace("\n"," ",$content[0]));
    }

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which runs
     * before the init hook. The init hook is too late for some features, such as indicating
     * support post thumbnails.
     *
     * To override dzogchen_setup() in a child theme, add your own dzogchen_setup to your child theme's
     * functions.php file.
     *
     * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
     * @uses register_nav_menus() To add support for navigation menus.
     * @uses add_custom_background() To add support for a custom background.
     * @uses add_editor_style() To style the visual editor.
     * @uses load_theme_textdomain() For translation/localization support.
     * @uses add_custom_image_header() To add support for a custom header.
     * @uses register_default_headers() To register the default custom header images provided with the theme.
     * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
     *
     * @since Twenty Ten 1.0
     */
    function dzogchen_setup() {

        // This theme styles the visual editor with editor-style.css to match the theme style.
        add_editor_style();

        // Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
        //add_theme_support('post-formats', array('aside', 'gallery'));

        // This theme uses post thumbnails
        add_theme_support('post-thumbnails');

        // Add default posts and comments RSS feed links to head
        //add_theme_support( 'automatic-feed-links' );


        // Make theme available for translation
        // Translations can be filed in the /languages/ directory
        load_theme_textdomain('dzogchen', TEMPLATEPATH . '/languages');

        $locale = get_locale();
        $locale_file = TEMPLATEPATH . "/languages/$locale.php";
        if (is_readable($locale_file))
            require_once( $locale_file );

        // This theme uses wp_nav_menu() in one location.
        //register_nav_menus(array(
        //    'primary' => __('Hlavní navigace', 'dzogchen'),
        //));
        
        wp_enqueue_script('swfobject', get_bloginfo('template_directory') . '/js/swfobject.js');
        wp_enqueue_script('mousewheel', get_bloginfo('template_directory') . '/js/jquery.mousewheel.js', array('jquery'), '1.0');
        wp_enqueue_script('jscrollpane', get_bloginfo('template_directory') . '/js/jquery.jscrollpane.min.js', array('jquery'), '1.0');
        wp_enqueue_script('cufon', get_bloginfo('template_directory') . '/js/cufon-yui.js', array('jquery'), '1.0');
        wp_enqueue_script('cufon_font', get_bloginfo('template_directory') . '/js/StoneInformalItc_400-StoneInformalItc_500.font.js', array('jquery'), '1.0');        
        wp_enqueue_script('application', get_bloginfo('template_directory') . '/js/application.js', array('jquery'), '1.0');
        
        add_action( 'wp_print_styles', 'my_deregister_styles', 100 );

        function my_deregister_styles() {
            wp_deregister_style( 'gce_styles' );
        }
     }

endif;

if (!function_exists('dzogchen_admin_header_style')) :

    /**
     * Styles the header image displayed on the Appearance > Header admin panel.
     *
     * Referenced via add_custom_image_header() in dzogchen_setup().
     *
     * @since Twenty Ten 1.0
     */
    function dzogchen_admin_header_style() {
        ?>
        <style type="text/css">
            /* Shows the same border as on front end */
            #headimg {
                border-bottom: 1px solid #000;
                border-top: 4px solid #000;
            }
            /* If NO_HEADER_TEXT is false, you would style the text with these selectors:
                        	#headimg #name { }
                        	#headimg #desc { }
            */
        </style>
        <?php
    }

endif;

/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since Twenty Ten 1.0
 * @return int
 */
function dzogchen_excerpt_length($length) {
    return 40;
}

add_filter('excerpt_length', 'dzogchen_excerpt_length');

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since Twenty Ten 1.0
 * @return string "Continue Reading" link
 */
function dzogchen_continue_reading_link() {
    return ' <a href="' . get_permalink() . '">' . __('více <span class="meta-nav">&rarr;</span>', 'dzogchen') . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and dzogchen_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string An ellipsis
 */
function dzogchen_auto_excerpt_more($more) {
    //return ' &hellip;' . dzogchen_continue_reading_link();
    return "";
}

add_filter('excerpt_more', 'dzogchen_auto_excerpt_more');

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function dzogchen_custom_excerpt_more($output) {
    if (has_excerpt() && !is_attachment()) {
        $output .= dzogchen_continue_reading_link();
    }
    return $output;
}

add_filter('get_the_excerpt', 'dzogchen_custom_excerpt_more');

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in Twenty Ten's style.css. This is just
 * a simple filter call that tells WordPress to not use the default styles.
 *
 * @since Twenty Ten 1.2
 */
add_filter('use_default_gallery_style', '__return_false');

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override dzogchen_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Twenty Ten 1.0
 * @uses register_sidebar
 */
function dzogchen_widgets_init() {
    // Area 1, located at the top of the sidebar.
    register_sidebar(array(
        'name' => __('Postranní lišta modulů', 'dzogchen'),
        'id' => 'primary-widget-area',
        'description' => __('Postranní lišta modulů', 'dzogchen'),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

/** Register sidebars by running dzogchen_widgets_init() on the widgets_init hook. */
//add_action('widgets_init', 'dzogchen_widgets_init');

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * This function uses a filter (show_recent_comments_widget_style) new in WordPress 3.1
 * to remove the default style. Using Twenty Ten 1.2 in WordPress 3.0 will show the styles,
 * but they won't have any effect on the widget in default Twenty Ten styling.
 *
 * @since Twenty Ten 1.0
 */
function dzogchen_remove_recent_comments_style() {
    add_filter('show_recent_comments_widget_style', '__return_false');
}

add_action('widgets_init', 'dzogchen_remove_recent_comments_style');

if (!function_exists('dzogchen_posted_on')) :

    /**
     * Prints HTML with meta information for the current post-date/time and author.
     *
     * @since Twenty Ten 1.0
     */
    function dzogchen_posted_on() {
        printf(__(' %2$s %1$s', 'dzogchen'), get_the_time(__('H:i','dzogchen')), get_the_date(__('j.n.Y','dzogchen')));
    }

endif;
