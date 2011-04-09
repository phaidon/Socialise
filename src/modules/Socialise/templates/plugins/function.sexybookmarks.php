<?php
/**
 * Smarty plugin to display a sexybookmarks menu.
 *
 * Available parameters
 *
 *   url: The URL of the item to submit to the social bookmarking site(s)
 *   title: The title of the item to submit to the social bookmarking site(s)
 *
 * Examples
 *   For the News module: {sexybookmarks url=$links.permalink title=$info.title}
 *   For a Clip publication: {sexybookmarks url=$returnurl title=$pubdata.core_title}
 *
 * @see    Socialise_Api_Plugin::sexybookmarks
 * @author Mark West
 * @since  08/02/2007
 * @link   http://www.markwest.me.uk/
 * @param  array  $params  All attributes passed to this function from the template.
 * @param  object &$smarty Reference to the Smarty object.
 *
 * @return string HTML output.
 */
function smarty_function_sexybookmarks($params, &$smarty)
{
    return ModUtil::apiFunc('Socialise', 'plugin', 'sexybookmarks', $params);
}
