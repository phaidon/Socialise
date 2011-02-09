<?php

/**
* socialise
*
* @copyright Fabian Wuertz
* @link http://code.zikula.org/socialise
* @version $Id$
* @license See license.txt
*/

class Socialise_Handler_Sexybookmarks extends Form_Handler
{

	/**
	* Setup form.
	*
	* @param Form_View $view Current Form_View instance.
	*
	* @return boolean
	*/
	public function initialize(Form_View $view)
	{

		$sexybookmarks = unserialize( ModUtil::getVar('socialise', 'sexybookmarks') );

		$this->view->assign($sexybookmarks);

		$services = ModUtil::apiFunc('socialise', 'user', 'getServices');

		$servicesAsList= array();
		foreach($services as $key => $value) {
			$servicesAsList[] = array('text' => $value['name'], 'value' => $key);
		}
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
	public function handleCommand(Form_View $view, &$args)
	{
		// check for valid form
		if (!$view->isValid()) {
			return false;
		}

		// load form values
		$data = $view->getValues();
		ModUtil::setVar('socialise', 'sexybookmarks', serialize($data));


		return $view->redirect(ModUtil::url('socialise', 'admin','sexybookmarks'));
	}
}