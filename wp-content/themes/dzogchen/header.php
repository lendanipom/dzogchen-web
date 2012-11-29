<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
<?php require_once("mappings.php") ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/fonts/l10646-webfont.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/script.js"></script>

</head>

<body <?php body_class(); ?>>
    <div id="main-content">        
        <div id="head-menu">
		<div class="topmost-panel">
			<?php echo do_shortcode("[lwa]"); ?>
		</div>
		<div class="mouse-area">
			<div class="links">
				<a class="masters" href="<?php get_permalink(1324) ?>">Mistři</a>
				<a class="teaching" href="<?php get_permalink(1329) ?>">Nauka</a>
				<a class="community" href="<?php get_permalink(71) ?>">Komunita</a>
			</div>
			<?php wp_page_menu(); /* that div has class menu */ ?> 
		</div>
        </div>
	<div id="main-image-container">
		<?php 
			$thisID = $post->ID;
			$parentID = get_page($hierPageID)->post_parent;
			$pageId = ($parentID == NULL) ? $thisID : $parentID;
			$mappingObj = $pageMappings[$pageId];
			$image = $mappingObj->image;
			if($image != ""){
		?>
		<img id="main-image" width="960" height="386" src="
			<?php
				$baseUrl = bloginfo( 'stylesheet_directory' );
				$srcUrl = $baseUrl . "/images/" . $image;
				echo $srcUrl;
			?>
		"/>
		<?
			}
		?>
		<div class="filter"><h1><br/>Tanečníci tance vadžry v komunitním centru Phendeling na Šumavě</h1></div>
	</div>

