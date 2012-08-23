<?php
/**
 * Copyright Wikula Team 2011
 *
 * @license GNU/GPLv3 (or at your option, any later version).
 * @package Wikula
 * @link https://github.com/phaidon/Wikula
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * Smarty plugin to display a sexybookmarks buttons.
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
 * @param array  $params  All attributes passed to this function from the template.
 * @param object &$smarty Reference to the Smarty object.
 *
 * @return string
 */
function smarty_function_googleplus($params, &$smarty)
{
    return ModUtil::apiFunc('Socialise', 'plugin', 'googleplus', $params);
}
