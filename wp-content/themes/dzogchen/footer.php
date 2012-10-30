<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
<div style="clear: both;"></div>
<?php /*
<div id="footer">
    <div id="footer-c" class="cufoned">Dzogchen o.s. &copy;2011 - Shangshung Institute Italy</div>
    
    <div id="footer-address" class="cufoned">Opletalova 35, Praha 2</div>
    <div id="footer-email" class="cufoned">dzogchen@dzogchen.cz</div>
</div>
*/ ?>
        </div><!-- #main-content -->
</div><!-- #wrapper -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
