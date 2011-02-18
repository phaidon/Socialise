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

class Socialise_Handler_Sexybookmarks extends Zikula_Form_Handler
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
        $sexybookmarks = unserialize( $this->getVar('sexybookmarks') );
        $this->view->assign($sexybookmarks);

        $services = ModUtil::apiFunc('socialise', 'user', 'getServices');
        $servicesAsList= array();
        foreach($services as $key => $value) {
            $servicesAsList[] = array('text' => $value['name'], 'value' => $key);
        }
        $activeServices = array();
        foreach($sexybookmarks as $key => $value) {
            $activeServices[$value] = $services[$value];
        }
        $this->view->assign("range", range('1', '8') );
        $this->view->assign("activeServices", $activeServices);
        $this->view->assign("services", $servicesAsList);

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
        // check for valid form
        if (!$view->isValid()) {
            return false;
        }

        // load form values
        $data = $view->getValues();
        $this->setVar( 'sexybookmarks', serialize($data));

        return $view->redirect(ModUtil::url('socialise', 'admin','sexybookmarks'));
    }
}