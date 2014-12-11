<?php

/** If Necessary, Load WordPress */
$wp_root = explode("wp-content",$_SERVER["SCRIPT_FILENAME"]);
$wp_root = $wp_root[0];
if($wp_root == $_SERVER["SCRIPT_FILENAME"]) 
{
    $wp_root = explode("index.php",$_SERVER["SCRIPT_FILENAME"]);
    $wp_root = $wp_root[0];
}

chdir($wp_root);

if(!function_exists("add_action")) 
{
	require_once(file_exists("wp-load.php")?"wp-load.php":"wp-config.php");
}
/** Load WordPress ends **/

//LF Free Membership Config File										 
require(dirname(__FILE__).'/config.php');
$dataValues = $_POST;
$response = "alert('".@$_POST["action"]."');";
global $dcs_free_membership_page;

switch(@$_POST["action"])
{
	case "ProcessUser":
		$creds = array();
		$creds['first_name'] = $dataValues['first_name'];
		$creds['last_name'] = $dataValues['last_name'];
		$creds['email'] = $dataValues['email'];
		$creds['phone'] = $dataValues['phone'];
		$creds['zip_code'] = $dataValues['zip_code'];
		$response = "alert('Jason');";

		//Validate Form
		if( $creds['first_name'] == "" )
		{
			$response = "alert('First Name field cannot be blank.');";
			break;
		}
		if( $creds['last_name'] == "" )
		{
			$response = "alert('Last Name field cannot be blank.');";
			break;
		}
		if( $creds['email'] == "" )
		{
			$response = "alert('Email field cannot be blank.');";
			break;
		}
		if( $creds['phone'] == "" )
		{
			$response = "alert('Phone Number field cannot be blank.');";
			break;
		}
		if( $creds['zip_code'] == "" )
		{
			$response = "alert('Zip Code field cannot be blank.');";
			break;
		}

		//Send email to notifier
		lf_membership_sendNotifyEmail( $creds );
		//Send user to new window
		$response = "window.open('".site_url($dcs_free_membership_page)."','_self');";
		break;

	default:
}

die($response);

?>
