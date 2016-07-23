<?php
###################################################################
# To run this install manually please make sure you place this    #
# in the same place and SSI.php and index.php                     #
###################################################################

global $smcFunc, $db_prefix, $context, $boarddir, $modSettings, $scripturl, $boardurl, $sourcedir;


if (!defined('SMF') && file_exists(dirname(__FILE__) . '/SSI.php')) {
    require_once(dirname(__FILE__) . '/SSI.php');

}
elseif (!defined('SMF'))
    die('The installer wasn\'t able to connect to SMF! Make sure that you are either installing this via the Package Manager or the SSI.php file is in the same directory.');


// If you install manually, you have to be logged in!
if(!$user_info['is_admin'])
{
	if($user_info['is_guest'])
	{
		echo $txt['admin_login'] . ':<br />';
		ssi_login($boardurl . '/install.php');
		die();
	}
	else
	{
		loadLanguage('Errors');
		fatal_error($txt['cannot_admin_forum']);
	}
}

if (!isset($modSettings['gsearch_sitcher']))
{
	updateSettings(array(
		'gsearch_sitcher' => 0,
		'gsearch_cx' => '',
		'gsearch_html' => ''
	));
}

add_integration_function('integrate_pre_include', '$sourcedir/Subs-Gsearch.php');
add_integration_function('integrate_actions', 'gsearch_replace_default_search');
add_integration_function('integrate_general_mod_settings', 'gsearch_settings');