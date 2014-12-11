<?php 
defined('ABSPATH') or die("No script kiddies please!");

   	//Vicinity Config File
   	require_once(dirname(__FILE__)."/config.php");

	//global $lf_free_membership_version;
	global $lf_free_membership_email_notify;
	global $dcs_free_membership_background;
	global $dcs_free_membership_button;
	global $dcs_free_membership_sidebanner;
	global $dcs_free_membership_page;

	if($_POST['lf_free_membership_hidden'] == 'Y') 
	{
		//Form data sent
		$lf_free_membership_email_notify = $_POST['lf_free_membership_email_notify'];
		update_option('lf_free_membership_email_notify', $lf_free_membership_email_notify);

		$dcs_free_membership_background = $_POST['dcs_free_membership_background'];
		update_option('dcs_free_membership_background', $dcs_free_membership_background);

		$dcs_free_membership_button = $_POST['dcs_free_membership_button'];
		update_option('lf_free_membership_button', $dcs_free_membership_button);

		$dcs_free_membership_sidebanner = $_POST['dcs_free_membership_sidebanner'];
		update_option('dcs_free_membership_sidebanner', $dcs_free_membership_sidebanner);

		$dcs_free_membership_page = $_POST['dcs_free_membership_page'];
		update_option('dcs_free_membership_page', $dcs_free_membership_page);

        ?>
        <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
        <?php
        ?>
        <?php
	}       
	else 
	{
		//Normal page display
		$lf_free_membership_email_notify = get_option(LF_FREE_MEMBERSHIP_EMAIL_NOTIFY);
		$dcs_free_membership_background = get_option(DCS_FREE_MEMBERSHIP_BACKGROUND);
		$dcs_free_membership_button = get_option(DCS_FREE_MEMBERSHIP_BUTTON);
		$dcs_free_membership_sidebanner = get_option(DCS_FREE_MEMBERSHIP_SIDEBANNER);
		$dcs_free_membership_page = get_option(DCS_FREE_MEMBERSHIP_PAGE);
	}
?>

<div class="wrap">
<?php    echo "<h2>" . __( 'DCS Free Membership Options', 'lf_free_membership_trdom' ) . "</h2>"; ?>

<form name="lf_free_membership_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="lf_free_membership_hidden" value="Y">
	<p><?php _e("Notification Email: " ); ?><input type="text" name="lf_free_membership_email_notify" value="<?php echo $lf_free_membership_email_notify; ?>" size="64"></p>
	<p><?php _e("Login Page: " ); ?><input type="text" name="dcs_free_membership_page" value="<?php echo $dcs_free_membership_page; ?>" size="128"></p>
	<p><?php _e("Login form background image: " ); ?><input type="text" name="dcs_free_membership_background" value="<?php echo $dcs_free_membership_background; ?>" size="128"></p>
	<p><?php _e("Login form button image: " ); ?><input type="text" name="dcs_free_membership_button" value="<?php echo $dcs_free_membership_button; ?>" size="128"></p>
	<p><?php _e("Login form sidebanner image: " ); ?><input type="text" name="dcs_free_membership_sidebanner" value="<?php echo $dcs_free_membership_sidebanner; ?>" size="128"></p>
	<p class="submit">
		<input type="submit" name="Submit" value="<?php _e('Update Options', 'lf_free_membership_trdom' ) ?>" />
	</p>
</form>

</div>