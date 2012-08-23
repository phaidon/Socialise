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
class Socialise_Controller_Admin extends Zikula_AbstractController
{
    /**
     * Main config screen.
     *
     * @return statement
     */
    public function main()
    {
        return $this->modifyconfig();
    }

    /**
     * Modify config
     *
     * @return statement
     */
    public function modifyconfig()
    {
        $form = FormUtil::newForm('Socialise', $this);
        return $form->execute('admin/modifyconfig.tpl', new Socialise_Handler_Keys() );
    }

    /**
     * Twitter.
     *
     * @return string Output of the Twitter admin interface.
     */
    public function twitter()
    {
        $this->throwForbiddenUnless(
            SecurityUtil::checkPermission('Socialise::', '::', ACCESS_ADMIN)
        );

        return $this->view->fetch('admin/twitter.tpl');
    }

    /**
     * Facebook.
     *
     * @return string Output of the Facebook admin interface.
     */
    public function facebook()
    {
        $this->throwForbiddenUnless(
            SecurityUtil::checkPermission('Socialise::', '::', ACCESS_ADMIN)
        );

        $values = $this->getVar('keys');

        // validation checks
        if (!array_filter($values['Facebook'])) {
            LogUtil::registerError($this->__("Please enter a Facebook ID, otherwise you won't be able to use its plugins."));
        }

        return $this->view->fetch('admin/facebook.tpl');
    }
    
    
    /**
     * Googe+.
     *
     * @return string Output of the Google+ admin interface.
     */
    public function googleplus()
    {
        $this->throwForbiddenUnless(
            SecurityUtil::checkPermission('Socialise::', '::', ACCESS_ADMIN)
        );

        return $this->view->fetch('admin/googleplus.tpl');
    }


    /**
     * socialshareprivacy.
     *
     * @return string Output of the socialshareprivacy admin interface.
     */
    public function socialshareprivacy()
    {
        $this->throwForbiddenUnless(
            SecurityUtil::checkPermission('Socialise::', '::', ACCESS_ADMIN)
        );

        return $this->view->fetch('admin/socialshareprivacy.tpl');
    }

    /**
     * SexyBookmarks.
     *
     * @return string Output of the SexyBookmarks admin interface.
     */
    public function sexybookmarks()
    {
        $this->throwForbiddenUnless(
            SecurityUtil::checkPermission('Socialise::', '::', ACCESS_ADMIN)
        );

        $nojs = (bool)FormUtil::getPassedValue('nojs', false);

        if ($nojs) {
            $form = FormUtil::newForm('Socialise', $this);
            return $form->execute('admin/sexybookmarks_nojs.tpl', new Socialise_Handler_Sexybookmarks());

        } else {
            $services = ModUtil::apiFunc('Socialise', 'user', 'getServices');

            $sexybookmarks = $this->getVar('sexybookmarks');

            $activeServices = array();
            foreach ($sexybookmarks as $k) {
                $activeServices[$k] = $services[$k];
            }

            $inactiveServices = array();
            foreach ($services as $k => $value) {
                if (!in_array($k, $sexybookmarks) ) {
                    $inactiveServices[$k] = $value;
                }
            }

            return $this->view->assign($sexybookmarks)
                              ->assign('activeServices', $activeServices)
                              ->assign('inactiveServices', $inactiveServices)
                              ->fetch('admin/sexybookmarks.tpl');
        }
    }

    /**
     * ShareThis.
     *
     * @return string Output of the ShareThis admin interface.
     */
    public function sharethis()
    {
        $this->throwForbiddenUnless(
            SecurityUtil::checkPermission('Socialise::', '::', ACCESS_ADMIN)
        );

        return $this->view->fetch('admin/sharethis.tpl');
    }
}
