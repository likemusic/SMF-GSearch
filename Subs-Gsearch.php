<?php

if (!defined('SMF'))
	die('Hacking attempt...');

function gsearch_replace_default_search(&$actionArray)
{   
        global $modSettings;
        
        if(isset($modSettings['gsearch_sitcher']) && $modSettings['gsearch_sitcher'] == '1')
        {
            $actionArray['search'] = array('Gsearch.php', 'Gsearch');
            $actionArray['search2'] = array('Gsearch.php', 'Gsearch');
        }
        else
        {
            $actionArray['search'] = array('Search.php', 'PlushSearch1');
            $actionArray['search2'] = array('Search.php', 'PlushSearch2');
        }
}

function gsearch_settings(&$config_vars)
{
        global $txt, $modSettings;
        
        $config_vars[] = array('title', 'gsearch_title');
        $config_vars[] = array('check', 'gsearch_sitcher');
        $config_vars[] = array('text', 'gsearch_cx', 'size' => 50);   
        $config_vars[] = array('large_text', 'gsearch_html');
}