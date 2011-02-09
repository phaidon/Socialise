<?php
/**
 * Smarty function to display the sharethis social bookmarking dialog
 *
 * Available parameters:
 *
 * id - The unique ID to apply to this instance of the ShareThis Link
 * permalink - The URL of the item to submit to the social bookmarking site(s)
 * title - The title of the item to submit to the social bookmarking site(s)
 *
 * Example (for the News module)
  * {twitter $url=permalink=$links.permalink title=$info.title}
 *
 * @author      Fabian Wuertz
 * @since        08/02/2007
 * @link           http://fabian.wuertz.org
 * @param       array       $params      All attributes passed to this function from the template
 * @param       object      &$smarty     Reference to the Smarty object
 * @return       string      the YIQ display
 */
function smarty_function_twitter($params, &$smarty)
{
	return ModUtil::func('socialise', 'user', 'twitter', $params);
}

