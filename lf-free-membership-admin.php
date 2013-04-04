<?php 

   	//Vicinity Config File
   	require_once(dirname(__FILE__)."/config.php");

	//global $lf_free_membership_version;
	global $lf_free_membership_email_notify;

	if($_POST['lf_free_membership_hidden'] == 'Y') 
	{
		//Form data sent
		$lf_free_membership_email_notify = $_POST['lf_free_membership_email_notify'];
		update_option('lf_free_membership_email_notify', $lf_free_membership_email_notify);

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
	}
	
	
?>

<div class="wrap">
<?php    echo "<h2>" . __( 'LincolnFIT1 Free Membership Options', 'lf_free_membership_trdom' ) . "</h2>"; ?>

<form name="lf_free_membership_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="lf_free_membership_hidden" value="Y">
	<p><?php _e("LincolnFIT1 Free Membership Notification Email: " ); ?><input type="text" name="lf_free_membership_email_notify" value="<?php echo $lf_free_membership_email_notify; ?>" size="64"></p>
	<p class="submit">
		<input type="submit" name="Submit" value="<?php _e('Update Options', 'lf_free_membership_trdom' ) ?>" />
	</p>
</form>

</div>