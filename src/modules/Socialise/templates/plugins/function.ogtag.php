<?php
/**
 * Copyright Socialise Team 2011
 *
 * @license GNU/GPLv3 (or at your option, any later version).
 * @package Socialise
 * @link https://github.com/phaidon/Socialise
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * Smarty plugin to set a Open Graph metatag.
 *
 * Available parameters
 *
 *   prop: The open grap tag to set
 *   content: The content of this property
 *
 * Facebook specification
 *
 *   If you use Open Graph tags, the following six are required:
 *   - title: The title of the entity.
 *   - type:  The type of entity. You must select a type from the list of Open Graph types.
 *   - image: The URL to an image that represents the entity. Images must be at least 50 pixels by 50 pixels.
 *            Square images work best, but you are allowed to use images up to three times as wide as they are tall.
 *   - url:   The canonical, permanent URL of the page representing the entity. When you use Open Graph tags,
 *            the Like button posts a link to the og:url instead of the URL in the Like button code.
 *   - site_name: A human-readable name for your site, e.g., "IMDb".
 *   And the added by default by the fb* plugins:
 *   - fb:admins or fb:app_id: A comma-separated list of either the Facebook IDs of page administrators or a Facebook Platform application ID.
 *            At a minimum, include only your own Facebook ID.
 *
 * Examples
 *   {ogtag prop='title' content=$title}
 *   {ogtag prop='type' content='blog'}
 *   {ogtag prop='image' content='image/path.ext'}
 *
 * @param array  $params All attributes passed to this function from the template.
 * @param object &$view  Reference to the Smarty object.
 *
 * @link  http://code.zikula.org/socialise
 * @link  http://developers.facebook.com/docs/opengraph#types
 *
 * @return boolean|string
 */
function smarty_function_ogtag($params, &$view)
{
    if (!isset($params['prop']) || !$params['prop']) {
        $view->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('ogtag', 'prop')));
        return false;
    }

    if (!isset($params['content'])) {
        $view->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('ogtag', 'content')));
        return false;
    }

    PageUtil::addVar('header', "<!--\n".'<meta property="og:'.$params['prop'].'" content="'.$params['content'].'" />'."\n-->");
}
