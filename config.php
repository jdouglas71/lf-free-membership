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

/**Tables*/

/** Logfile */
define('LOGFILE', LF_FREE_MEMBERSHIP_DIR.'lf-plugin.log');
/** WordPress Script Debug Flag */
define('SCRIPT_DEBUG', true );

/** Globals */
global $lf_free_membership_version;
$lf_free_membership_version = "0.7";

global $hs_icon_url;
$hs_icon_url = "http://lincolnfit1.com/favicon.ico";

global $lf_free_membership_email_notify;
$lf_free_membership_email_notify = "ttomlinson@healthsport.com";

global $lf_free_membership_page;
$lf_free_membership_page = "http://lincolnfit1.com/membership-download";

/** Scripts */
require_once(LF_FREE_MEMBERSHIP_DIR.'functions.php');

?>
