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
<div id="footer">
	<p><span>Dzogčhen o.s. &copy;</span><span class="right"><a href="mailto:dzogchen@dzochen.cz">dzogchen@dzochen.cz</a> Opletalova 35, Praha 2</span></p>	
</div>
</div><!-- #main-content -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
