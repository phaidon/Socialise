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

class Socialise_Handler_Like extends Zikula_Form_AbstractHandler
{

    /**
    * Setup form.
    *
    * @param Form_View $view Current Form_View instance.
    *
    * @return boolean
    */
    public function initialize(Zikula_Form_View $view)
    {
        if (!SecurityUtil::checkPermission('socialise::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden(LogUtil::getErrorMsgPermission());
        }
        
        $like = unserialize( $this->getVar('like') );
        $this->view->assign( $like);
        if( empty( $like['id'] ) ) {
            LogUtil::registerError($this->__('Please enter a facebook id, otherwise like button will not work.'));
        }

       $auths = array(
            array( 'text' => 'Person ID', 'value' => 'admins' ),
            array( 'text' => 'App ID',    'value' => 'app_id' )
        );
        $this->view->assign( 'auths', $auths);

        return true;
    }

    /**
    * Handle form submission.
    *
    * @param Form_View $view  Current Form_View instance.
    * @param array     &$args Args.
    *
    * @return boolean
    */
    public function handleCommand(Zikula_Form_View $view, &$args)
    {
        if ($args['commandName'] == 'cancel') {
            $url = ModUtil::url('Socialise', 'admin', 'like' );
            return $view->redirect($url);
        }
        
        // check for valid form
        if (!$view->isValid()) {
            return false;
        }

        // load form values
        $data = $view->getValues();
        $this->setVar('like', serialize($data));

        return $view->redirect(ModUtil::url('socialise', 'admin','like'));
    }
}