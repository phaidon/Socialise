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

class Socialise_Handler_Sexybookmarks extends Zikula_Form_AbstractHandler
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
        $sexybookmarks = $this->getVar('sexybookmarks');

        $services = ModUtil::apiFunc('socialise', 'user', 'getServices');
        $servicesAsList= array();
        foreach($services as $k => $value) {
            $servicesAsList[] = array('value' => $k, 'text' => $value['name']);
        }

        $activeServices = array();
        foreach($sexybookmarks as $k) {
            $activeServices[$k] = $services[$k];
        }

        $this->view->assign($sexybookmarks)
                   ->assign('range', range('1', '8'))
                   ->assign('activeServices', $activeServices)
                   ->assign('services', $servicesAsList);

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
        $this->setVar('sexybookmarks', $data);

        return $view->redirect(ModUtil::url('Socialise', 'admin', 'sexybookmarks', array('nojs' => 1)));
    }
}
