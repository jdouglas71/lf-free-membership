<?php
defined('ABSPATH') or die("No script kiddies please!");

//User functions
//require_once(ABSPATH . WPINC . '/registration.php');
require_once( ABSPATH . WPINC . '/class-phpmailer.php' );

/**
 * Membership form
 */
function lf_free_membership_form($width="100%")
{
    $retval = "";
	global $dcs_free_membership_background;
	global $dcs_free_membership_button;
	global $dcs_free_membership_sidebanner;

	lflogToFile( "Membership form." );

	$retval .= "<div style=\"position:relative;background-image:url('".$dcs_free_membership_background."');background-repeat:no-repeat;width:619px;height:464px;border-radius:4px;border:2px groove gray;\">";
	$retval .= "	<div style=\"position:absolute;float:right;top:210px;left:340px;display:inline-block;border:2px etched #000000;border-radius:7px;box-shadow:3px 3px 3px #000000;background-color:#b8b8b8;width:250px;margin:10px;\">";
	$retval .= "		<form style='padding-top:5px;padding-left:50px;' onSubmit='lf_free_membership_process_form();return false;'>";
	$retval .= "			<input type='text' style='width:180px;border-radius:5px;padding:2px;' id='lf_first_name' placeholder='First Name'>";
	$retval .= "			<input type='text' style='width:180px;border-radius:5px;padding:2px;' id='lf_last_name' placeholder='Last Name'>";
	$retval .= "			<input type='text' style='width:180px;border-radius:5px;padding:2px;' id='lf_email' placeholder='Email'>";
	$retval .= "			<input type='text' style='width:180px;border-radius:5px;padding:2px;' id='lf_phone' placeholder='Phone'>";
	$retval .= "			<input type='text' style='width:180px;border-radius:5px;padding:2px;' id='lf_zip_code' placeholder='Zip Code'>";
	$retval .= "			<input style='width:180px;' src='".$dcs_free_membership_button."' type='image' class='submit' value='Submit' name='lf_submit'>";
	$retval .= "		</form>";
	$retval .= "	</div>";
	$retval .= "</div>";

    return $retval;
}

/**
 * Send notifier email
 */ 
function lf_membership_sendNotifyEmail($vals)
{
	$mail = new PHPMailer();

	$body = "";
	$body .= "First Name: " . $vals['first_name'] . "\n";
	$body .= "Last Name: " . $vals['last_name'] . "\n";
	$body .= "Email: " . $vals['email'] . "\n";
	$body .= "Phone: " . $vals['phone'] . "\n";
	$body .= "Zip Code: " . $vals['zip_code'] . "\n";

	$mail->SetFrom( "info@theredwoodclubpetaluma.com", "Free Redwood Club Membership" );
	$mail->Subject = "7-day Free Redwood Club Membership signup.";
	$mail->MsgHTML( $body );

	$mail->AddAddress( get_option(LF_FREE_MEMBERSHIP_EMAIL_NOTIFY) );

	if( !$mail->Send() )
	{
		lflogToFile( "Email send failed: " . $mail->ErrorInfo );
	}
	else
	{
		lflogToFile( "Email Sent!!!" );
	}
}

/**
 * Logging to file.                                       
 */
function lflogToFile($msg)
{ 
    // open file
    $fd = fopen(LOGFILE, "a");
    // append date/time to message
    $str = "[" . date("Y/m/d h:i:s", mktime()) . "] " . $msg; 
    // write string
    fwrite($fd, $str . "\n");
    // close file
    fclose($fd);
}

function lfvarDumpStr($var)
{
	ob_start();
	var_dump( $var );
	$out = ob_get_clean();
	return $out;
}

