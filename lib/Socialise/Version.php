<?php

/**
* socialise
*
* @copyright Fabian Wuertz
* @link http://code.zikula.org/socialise
* @version $Id$
* @license See license.txt
*/

class Socialise_Version extends Zikula_Version 
{
	public function getMetaData() 
	{
		$meta = array();
		$meta['displayname']    = $this->__('socialise!');
		$meta['description']    = $this->__('Share content with social websites like Facebook and Twitter');
		//! module url in lowercase and different to displayname
		$meta['url']            = $this->__('socialise');
		$meta['version']          = '0.1.0';
		$meta['securityschema']   = array('socialise::' => '::');
		return $meta;
	}
}

