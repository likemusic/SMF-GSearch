<?php

global $smcFunc, $user_info, $boardurl;

if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
	require_once(dirname(__FILE__) . '/SSI.php');
elseif (!defined('SMF'))
	die('<b>Error:</b> Cannot uninstall - please verify you put this in the same place as SMF\'s Settings.php.');

// If you uninstall manually, you have to be logged in!
if(!$user_info['is_admin'])
{
	if($user_info['is_guest'])
	{
		echo $txt['admin_login'] . ':<br />';
		ssi_login($boardurl . '/uninstall.php');
		die();
	}
	else
	{
		loadLanguage('Errors');
		fatal_error($txt['cannot_admin_forum']);
	}
}

remove_integration_function('integrate_pre_include', '$sourcedir/Subs-Gsearch.php');
remove_integration_function('integrate_actions', 'gsearch_replace_default_search');
remove_integration_function('integrate_general_mod_settings', 'gsearch_settings');