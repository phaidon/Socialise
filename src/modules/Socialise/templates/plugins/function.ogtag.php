<?php
/**
 * Smarty plugin to set a Open Graph metatag.
 *
 * Available parameters
 *
 *   prop: The property to set
 *   content: The content of this property
 *
 * Examples
 *   {ogtag prop='title' content=$title}
 *   {ogtag prop='type' content='blog'}
 *   {ogtag prop='image' content='image/path.ext'}
 *
 * @link  http://code.zikula.org/socialise
 * @param array  $params  All attributes passed to this function from the template.
 * @param object &$smarty Reference to the Smarty object.
 *
 * @return void.
 */
function smarty_function_ogtag($params, &$view)
{
    if (!isset($params['prop']) || !$params['prop']) {
        $view->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('ogtag', 'prop')));
        return;
    }

    if (!isset($params['content'])) {
        $view->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('ogtag', 'content')));
        return;
    }

    PageUtil::addVar('rawtext', '<meta property="og:'.$params['prop'].'" content="'.$params['content'].'" />');
}
