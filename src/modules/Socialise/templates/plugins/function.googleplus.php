<?php
/**
 * Smarty plugin to display a twitter button.
 *
 * Available parameters
 *
 *   url: The URL of the item to submit to the social bookmarking site(s)
 *   title: The title of the item to submit to the social bookmarking site(s)
 *
 * Examples
 *   For the News module: {twitter url=$links.permalink title=$info.title}
 *   For a Clip publication: {twitter url=$returnurl title=$pubdata.core_title}
 *
 * @see   Socialise_Api_Plugin::twitter
 * @link  http://code.zikula.org/socialise
 * @param array  $params  All attributes passed to this function from the template.
 * @param object &$smarty Reference to the Smarty object.
 *
 * @return string HTML output.
 */
function smarty_function_googleplus($params, &$smarty)
{
    return ModUtil::apiFunc('Socialise', 'plugin', 'googleplus', $params);
}
