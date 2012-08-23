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
 * Admin controller.
 */
class Socialise_Controller_Ajax extends Zikula_AbstractController
{

    /**
     * postSetup
     *
     * @return void
     */
    public function _postSetup()
    {
        // no need for a Zikula_View so override it.
    }

    /**
     * Update services.
     *
     * @return statement|void
     */
    public function updateServices()
    {
        $this->throwForbiddenUnless(
            SecurityUtil::checkPermission('Socialise::', '::', ACCESS_ADMIN)
        );

        $services = FormUtil::getPassedValue('services', -1, 'GET');
        if ($services == -1) {
            return AjaxUtil::error(LogUtil::registerError($this->__('No services passed.')));
        }

        $this->setVar('sexybookmarks', explode(',', $services));
    }
}
