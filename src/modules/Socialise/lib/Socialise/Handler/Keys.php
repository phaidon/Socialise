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

class Socialise_Handler_Keys extends Zikula_Form_AbstractHandler
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
        $this->view->assign('indexes', $this->getVar('services'))
                   ->assign($this->getVar('keys'));

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
            return $view->redirect(ModUtil::url('Socialise', 'admin', 'modifyconfig'));
        }

        // check for valid form
        if (!$view->isValid()) {
            return false;
        }

        // set the form values
        $this->setVar('keys', $view->getValues());

        return $view->redirect(ModUtil::url('Socialise', 'admin', 'modifyconfig'));
    }
}
