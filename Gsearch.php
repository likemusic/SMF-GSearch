<?php

if (!defined('SMF'))
	die('Hacking attempt...');


function Gsearch()
{
	global $context, $modSettings, $txt, $scripturl;
        
        if(isset($_POST['search']) && strlen($_POST['search']))
        {
            redirectexit('action=search&q=' . urlencode($_POST['search']));
        }
        
	loadTemplate('Gsearch');
        
	$context['page_title'] = $txt['search'];      
        
	$context['linktree'][] = array(
		'url' => $scripturl . '?action=search',
		'name' => $txt['search']
	);        
}