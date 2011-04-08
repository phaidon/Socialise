<?php
/**
 * Smarty plugin to display a facebook like button.
 *
 * Available parameters
 *
 *   url: The URL of the item to submit to the social bookmarking site(s)
 *   title: The title of the item to submit to the social bookmarking site(s)
 *
 * Examples
 *   For the News module: {fblike url=$links.permalink title=$info.title}
 *   For a Clip publication: {fblike url=$returnurl title=$pubdata.core_title}
 *
 * @link  http://code.zikula.org/socialise
 * @param array  $params  All attributes passed to this function from the template.
 * @param object &$smarty Reference to the Smarty object.
 *
 * @return string HTML output.
 */
function smarty_function_fblike($params, &$smarty)
{
    return ModUtil::apiFunc('Socialise', 'plugin', 'fblike', $params);
}
