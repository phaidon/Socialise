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