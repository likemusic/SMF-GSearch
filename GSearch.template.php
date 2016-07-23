<?php

function template_main()
{
	global $context, $modSettings, $txt, $settings;
        
        echo '
        <div class="cat_bar">
            <h3 class="catbg">
		<span class="ie6_header floatleft"><img class="icon" src="' . $settings['images_url'] . '/buttons/search.gif" alt="" />'  . $txt['search'] .  '</span>
            </h3>
	</div>';        
        if(isset($modSettings['gsearch_html']) &&  !empty($modSettings['gsearch_html']))
        {
            echo $modSettings['gsearch_html'];
        }
        elseif(isset($modSettings['gsearch_cx']) && !empty($modSettings['gsearch_cx']))
        {
?>
<script>
  (function() {
    var cx = '<?php echo $modSettings['gsearch_cx'] ?>';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>
<?php                
        }
        else
        {
            echo '<p id="search_error" class="error">' . $txt['gsearch_error'] . '</p>';
        }        
}
