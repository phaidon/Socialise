<?php

/**
* socialise
*
* @copyright Fabian Wuertz
* @link http://code.zikula.org/socialise
* @version $Id$
* @license See license.txt
*/

class Socialise_Util
{
	public static function registerPluginDir(Zikula_Event $event) {
		$modinfo = ModUtil::getInfoFromName('socialise');
		if (!$modinfo) {
			return;
		}
		$view = $event->getSubject();
		$view->addPluginDir("modules/$modinfo[directory]/templates/plugins");
	}
} 
