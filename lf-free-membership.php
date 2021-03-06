<?php
/*
Plugin Name: LincolnFIT1 Free Membership
Plugin URI: http://www.douglasconsulting.net
Description: LincolnFIT1 Free Membership Plugin.
Version: 0.7 Beta
Author: Jason Douglas
Author URI: http://www.douglasconsulting.net
License: GPL
*/

//LincolnFIT1 Free Membership Config File
require_once(dirname(__FILE__)."/config.php");

/** HOOKS **/

/* This calls lf_free_membership_init() function when wordpress initializes. */
add_action('init', 'lf_free_membership_init');
add_action('wp_head', 'lf_free_membership_js_header' );

/* Runs when Plugin is activated. */
register_activation_hook( __FILE__, 'lf_free_membership_install' );

/* Runs on plugin deactivated. */
register_deactivation_hook( __FILE__, 'lf_free_membership_uninstall' );

/** Admin Stuff **/
add_action( 'admin_init', 'lf_free_membership_admin_init' );
add_action( 'admin_menu', 'lf_free_membership_admin_menu' );

/**
 * Add my style sheet to the admin page.
 */
function lf_free_membership_admin_init()
{
	wp_register_style( 'lf_free_membership_css', plugins_url('lf-free-membership.css', __FILE__) );
}

/**
 * Add our admin menu to the dashboard.
 */
function lf_free_membership_admin_menu()
{
	global $lf_icon_url;
	$page = add_menu_page( 'LincolnFIT1 Free Membership', 'LincolnFIT1 Free Membership', 'administrator', 'lf_free_membership', 'lf_free_membership_admin_page', $lf_icon_url);

	add_action( 'admin_print_styles-'.$page, 'lf_free_membership_admin_styles' );
}

/**
 * Enqueue the style sheet for the admin page.
 */
function lf_free_membership_admin_styles()
{
	wp_enqueue_style( 'lf_free_membership_css' );
}

/**
 * Show the admin page.
 */ 
function lf_free_membership_admin_page()
{
	include( 'lf-free-membership-admin.php' );
}

/** SHORTCODES **/
add_shortcode( 'lf_free_membership_form', 'lf_free_membership_form_shortcode' );

/** FUNCTIONS **/
/**
 * Installer function
 */
function lf_free_membership_install()
{
	global $wpdb;
	global $lf_free_membership_version;
	global $lf_free_membership_email_notify;
	
    $result = $wpdb->query( $sql );

	//add/update Options
	if( !add_option(LF_FREE_MEMBERSHIP_VERSION, $lf_free_membership_version) )
	{
		update_option(LF_FREE_MEMBERSHIP_VERSION, $lf_free_membership_version);
	}

	if( !add_option(LF_FREE_MEMBERSHIP_EMAIL_NOTIFY, $lf_free_membership_email_notify) )
	{
		update_option(LF_FREE_MEMBERSHIP_EMAIL_NOTIFY, $lf_free_membership_email_notify);
	}
}

/**
 * Uninstall Function.
 */
function lf_free_membership_uninstall()
{
	global $wpdb;

	//Clear out options
	delete_option( LF_FREE_MEMBERSHIP_VERSION );
	delete_option( LF_FREE_MEMBERSHIP_EMAIL_NOTIFY );
}

/**
 * Called on init of WordPress.
 */
function lf_free_membership_init()
{
	global $lf_free_membership_version;
	global $lf_free_membership_email_notify;

	if( !is_admin() )
	{
		$lf_free_membership_version = get_option( LF_FREE_MEMBERSHIP_VERSION );
		$lf_free_membership_email_notify = get_option( LF_FREE_MEMBERSHIP_EMAIL_NOTIFY );
	}
	wp_register_style( 'lf_free_membership_css', plugins_url('lf-free-membership.css', __FILE__) );
}

/**
 * Membership Form Template
 */
function lf_free_membership_form_shortcode($atts, $content=null)
{
	//Extract atts

	wp_enqueue_style( 'lf_free_membership_css' );

	$retval = lf_free_membership_form(); 

	return $retval;
}

/**
 * Set up header for AJAX calls.
 */
function lf_free_membership_js_header()
{
	wp_print_scripts( array('sack') );
	?>
	<script type='text/javascript'>
		//Process User
		function lf_free_membership_process_form()
		{
			try
			{
                var mysack = new sack("<?php echo LF_FREE_MEMBERSHIP_CALLBACK_DIR; ?>lf-free-membership-ajax.php");
                mysack.execute = 1;
                mysack.method = 'POST';

                //Set the variables
                mysack.setVar("action", "ProcessUser");
                mysack.setVar("first_name", document.getElementById("lf_first_name").value);
                mysack.setVar("last_name", document.getElementById("lf_last_name").value);
                mysack.setVar("email", document.getElementById("lf_email").value);
                mysack.setVar("phone", document.getElementById("lf_phone").value);
                mysack.setVar("zip_code", document.getElementById("lf_zip_code").value);

                mysack.onError = function() { alert('An Error occurred. Please reload the page and try again.'); };
                mysack.runAJAX();
            }
            catch(err)
            {
                var txt = "There was an error on this page.\n\n";
                txt += "Error description: " + err.message + "\n\n";
                txt += "Click OK to continue.\n\n";
                alert(txt);
            }

            return false;
		}

	</script>
	<?php
}

?>
