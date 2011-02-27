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

class Socialise_Controller_Ajax extends Zikula_Controller
{
    public function _postSetup()
    {
        // no need for a Zikula_View so override it.
    }

    /**
    * updateServices
    */
    public function updateServices()
    {
        if (!SecurityUtil::checkPermission('Socialise::', '::', ACCESS_ADMIN)) {
            return AjaxUtil::error(LogUtil::registerPermissionError(null,true));
        }
        $services = FormUtil::getPassedValue('services', -1, 'GET');
        $services = split(',', $services);

        if ($services == -1) {
            return AjaxUtil::error(LogUtil::registerError($this->__('No services passed.')));
        }
        $this->setVar( 'sexybookmarks', serialize($services));
    }
}