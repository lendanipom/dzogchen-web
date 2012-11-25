<?php 
/*
 * This is the page users will see logged out. 
 * You can edit this, but for upgrade safety you should copy and modify this file into your template folder.
 * The location from within your template folder is plugins/login-with-ajax/ (create these directories if they don't exist)
*/
?>
<?php
	if( $is_widget ){
		echo $before_widget . $before_title . '<span id="LoginWithAjax_Title">' . __('Log In') . '</span>' . $after_title;
	}
?>
	<div id="LoginWithAjax" class="default"><?php //ID must be here, and if this is a template, class name should be that of template directory ?>
        <span id="LoginWithAjax_Status"></span>
        <form name="LoginWithAjax_Form" id="LoginWithAjax_Form" action="<?php echo $this->url_login; ?>" method="post">
		<input type="text" name="log" id="lwa_user_login" class="input" value="<?php echo attribute_escape(stripslashes($user_login)); ?>" />
		<input type="password" name="pwd" id="lwa_user_pass" class="input" value="" />
		<input type="submit" name="wp-submit" id="lwa_wp-submit" value="<?php _e('Log In'); ?>" tabindex="100" />
		<input type="hidden" name="redirect_to" value="http://<?php echo $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] ?>" />
		<input type="hidden" name="testcookie" value="1" />
		<input type="hidden" name="lwa_profile_link" value="<?php echo $lwa_data['profile_link'] ?>" />
		<input name="rememberme" type="checkbox" id="lwa_rememberme" value="forever" /> <label><?php _e( 'Remember Me' ) ?></label>
        </form>
	</div>
<?php
	if( $is_widget ){
		echo $after_widget;
	}
?>
