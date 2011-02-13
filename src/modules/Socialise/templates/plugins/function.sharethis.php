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
 * {sharethis id=$info.sid url=$links.permalink title=$info.title}
 *
 * @author      Mark West
 * @since       08/02/2007
 * @link        http://www.markwest.me.uk/
 * @param       array       $params      All attributes passed to this function from the template
 * @param       object      &$smarty     Reference to the Smarty object
 * @return       string      the YIQ display
 */
function smarty_function_sharethis($params, &$smarty)
{
    return ModUtil::func('socialise', 'user', 'sharethis', $params);
}

