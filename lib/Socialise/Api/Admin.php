<?php

/**
* socialise
*
* @copyright Fabian Wuertz
* @link http://code.zikula.org/socialise
* @version $Id$
* @license See license.txt
*/

class Socialise_Api_Admin extends Zikula_Api 
{
	//-----------------------------------------------------------//
	//-- Admin panel menu ---------------------------------------//
	//-----------------------------------------------------------//

	/**
	* Get available admin panel links
	*
	* @author Fabian Wuertz
	* @return array array of admin links
	*/
	public function getlinks()
	{
		$links = array();
		if (SecurityUtil::checkPermission('socialise::', '::', ACCESS_ADMIN)) {
			$links[] = array('url' => ModUtil::url('socialise', 'admin', 'like'), 'text' => "Facebook like button");
			$links[] = array('url' => ModUtil::url('socialise', 'admin', 'twitter'), 'text' => "Twitter");
			$links[] = array('url' => ModUtil::url('socialise', 'admin', 'sexybookmarks'), 'text' => "SexyBookmarks");
		}
		return $links;
	}
}