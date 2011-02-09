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

class Socialise_Controller_Admin extends Zikula_Controller
{

    /**
    * Return to index page
    *
    * This is the default function called when EZComments is called
    * as a module. As we do not intend to output anything, we just
    * redirect to the start page.
    *
    */
    public function main()
    {
        return $this->twitter();
    }


    /**
    * SexyBookmarks administration function
    *
    * This function provides the SexyBookmarks administration interface
    * module.
    *
    * @return string output the SexyBookmarks admin interface
    */
    public function sexybookmarks()
    {
        if (!SecurityUtil::checkPermission('socialise::', "::", ACCESS_ADMIN)) {
              return LogUtil::registerPermissionError();
        }

        $form = FormUtil::newForm('socialise');
        return $form->execute('admin/sexybookmarks.tpl', new Socialise_Handler_Sexybookmarks() );
    }


    public function twitter()
    {
        if (!SecurityUtil::checkPermission('socialise::', "::", ACCESS_ADMIN)) {
              return LogUtil::registerPermissionError();
        }

        return $this->view->fetch('admin/twitter.tpl');

    }

    public function like()
    {
        if (!SecurityUtil::checkPermission('socialise::', "::", ACCESS_ADMIN)) {
              return LogUtil::registerPermissionError();
        }

        $form = FormUtil::newForm('socialise');
        return $form->execute('admin/like.tpl', new Socialise_Handler_Like() );

    }
}