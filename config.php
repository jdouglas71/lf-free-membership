<?php

global $wpdb;

/** Directories */
define('LF_FREE_MEMBERSHIP_DIR', dirname(__FILE__)."/");
define('LF_FREE_MEMBERSHIP_RELATIVE_DIR', "/wp-content/plugins/lf-free-membership/");
define('LF_FREE_MEMBERSHIP_CALLBACK_DIR', get_option("siteurl").LF_FREE_MEMBERSHIP_RELATIVE_DIR);
define('LF_FREE_MEMBERSHIP_CSS', LF_FREE_MEMBERSHIP_CALLBACK_DIR."lf-free-membership.css");

/** Properties */
define('LF_FREE_MEMBERSHIP_VERSION', "lf_free_membership_version");
define('LF_FREE_MEMBERSHIP_EMAIL_NOTIFY', "lf_free_membership_email_notify" );
define('DCS_FREE_MEMBERSHIP_BACKGROUND', "dcs_free_membership_background" );
define('DCS_FREE_MEMBERSHIP_BUTTON', "dcs_free_membership_button" );
define('DCS_FREE_MEMBERSHIP_SIDEBANNER', "dcs_free_membership_sidebanner" );
define('DCS_FREE_MEMBERSHIP_PAGE', "dcs_free_membership_page" );

/**Tables*/

/** Logfile */
define('LOGFILE', LF_FREE_MEMBERSHIP_DIR.'lf-plugin.log');
/** WordPress Script Debug Flag */
define('SCRIPT_DEBUG', true );

/** Globals */
global $lf_free_membership_version;
$lf_free_membership_version = "0.8";

global $lf_icon_url;
$lf_icon_url = LF_FREE_MEMBERSHIP_RELATIVE_DIR . "favicon.ico";

global $lf_free_membership_email_notify;
$lf_free_membership_email_notify = "jdouglas@strategicemarketing.com";

global $dcs_free_membership_page;
$dcs_free_membership_page = "membership-download";

global $dcs_free_membership_background;
$dcs_free_membership_background = "http://lincolnfit1.com/wp-content/uploads/2013/04/7-Day-Pass-backround.jpg";

global $dcs_free_membership_sidebanner;
$dcs_free_membership_sidebanner = "http://lincolnfit1.com/wp-content/uploads/2013/04/sidebanner.png";

global $dcs_free_membership_button;
$dcs_free_membership_button = "http://lincolnfit1.com/wp-content/uploads/2013/04/button.png";

/** Scripts */
require_once(LF_FREE_MEMBERSHIP_DIR.'functions.php');

?>
