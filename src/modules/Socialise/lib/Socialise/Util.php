<?php
/**
 * Copyright socialise Team 2011
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 * @package socialise
 * @link http://code.zikula.org/socialise
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * Provides module util.
 */
class Socialise_Util
{

    /**
     * Register plugin
     *
     * @param Zikula_Event $event Event.
     *
     * @return boolean|void
     */
    public static function registerPluginDir(Zikula_Event $event)
    {
        $modinfo = ModUtil::getInfoFromName('Socialise');
        if (!$modinfo) {
            return false;
        }
        $view = $event->getSubject();
        $view->addPluginDir("modules/".$modinfo['directory']."/templates/plugins");
    }
}
