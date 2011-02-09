<?php

/**
* socialise
*
* @copyright Fabian Wuertz
* @link http://code.zikula.org/socialise
* @version $Id$
* @license See license.txt
*/

/**
 * Form handler for like
 */
class Socialise_Handler_Like extends Form_Handler
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
		

		$like = unserialize( ModUtil::getVar( 'socialise', 'like' ) );
		$this->view->assign( $like);
		if( empty( $like['id'] ) ) {
			LogUtil::registerError($this->__f('Please enter a facebook id, otherwise like button will not work.'));
		}

		$types = array(
			array( 'text' => 'Person ID', 'value' => 'admins' ),
			array( 'text' => 'App ID',    'value' => 'app_id' )
		);
		$this->view->assign( 'types', $types);

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
		ModUtil::setVar('socialise', 'like', serialize($data));

		return $view->redirect(ModUtil::url('socialise', 'admin','like'));
	}
}

