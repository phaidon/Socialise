<?php
/**
 * Smarty function to display a facebook like button
 *
 * Available parameters:
 *
 * url - The URL of the item to submit to the social bookmarking site(s)
 *
 * Example (for the News module)
 * {like url=$links.permalink title=$info.title}
 *
 * @link        http://code.zikula.org/socialise
 * @param       array       $params      All attributes passed to this function from the template
 * @param       object      &$smarty     Reference to the Smarty object
 * @return      string      the YIQ display
 */
function smarty_function_like($params, &$smarty)
{
    return ModUtil::func('socialise', 'user', 'like', $params);
}