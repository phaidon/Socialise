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
 * This class provides a handler to modify the sexybookmarks buttons.
 */
class Socialise_Handler_Sexybookmarks extends Zikula_Form_AbstractHandler
{
    /**
     * Initialise the form handler
     *
     * @param Zikula_Form_View $view Reference to Form render object.
     *
     * @return boolean
     *
     * @throws Zikula_Exception_Forbidden If the current user does not have adequate permissions to perform this function.
     */
    public function initialize(Zikula_Form_View $view)
    {
        if (!SecurityUtil::checkPermission('Socialise::', '::', ACCESS_ADMIN)) {
            throw new Zikula_Exception_Forbidden(LogUtil::getErrorMsgPermission());
        }

        $sexybookmarks = $this->getVar('sexybookmarks');

        $services = ModUtil::apiFunc('socialise', 'user', 'getServices');
        $servicesAsList= array();
        foreach ($services as $k => $value) {
            $servicesAsList[] = array('value' => $k, 'text' => $value['name']);
        }

        $activeServices = array();
        foreach ($sexybookmarks as $k) {
            $activeServices[$k] = $services[$k];
        }

        $view->assign($sexybookmarks)
             ->assign('range', range('1', '8'))
             ->assign('activeServices', $activeServices)
             ->assign('services', $servicesAsList);

        return true;
    }

    /**
     * Handle form submission.
     *
     * @param Zikula_Form_View $view  Reference to Form render object.
     * @param array            &$args Arguments of the command.
     *
     * @return boolean|void
     */
    public function handleCommand(Zikula_Form_View $view, &$args)
    {
        unset($args);

        // check for valid form
        if (!$view->isValid()) {
            return false;
        }

        // load form values
        $data = $view->getValues();
        $this->setVar('sexybookmarks', $data);

        return $view->redirect(ModUtil::url('Socialise', 'admin', 'sexybookmarks', array('nojs' => 1)));
    }
}
