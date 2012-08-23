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
 * Admin api class.
 */
class Socialise_Api_Admin extends Zikula_AbstractApi 
{
    /**
     * Get available admin panel links.
     *
     * @return array array of admin links
     */
    public function getlinks()
    {
        $links = array();

        if (SecurityUtil::checkPermission('Socialise::', '::', ACCESS_ADMIN)) {
            $links[] = array(
                'url' => ModUtil::url('socialise', 'admin', 'main'),
                'text' => $this->__('Keys Management')
            );
            $links[] = array(
                'url' => ModUtil::url('socialise', 'admin', 'twitter'), 
                'text' => 'Twitter',
                'class' => 'z-icon-es-twitter'
            );
            $links[] = array(
                'url' => ModUtil::url('socialise', 'admin', 'facebook'),
                'text' => 'Facebook',
                'class' => 'z-icon-es-facebook'
            );
            $links[] = array(
                'url' => ModUtil::url('socialise', 'admin', 'googleplus'),
                'text' => 'Google+',
                'class' => 'z-icon-es-googleplus'
            );
            $links[] = array(
                'url' => ModUtil::url('socialise', 'admin', 'sexybookmarks'),
                'text' => 'SexyBookmarks',
                'class' => 'z-icon-es-sexybookmarks'
            );
            $links[] = array(
                'url' => ModUtil::url('socialise', 'admin', 'sharethis'),
                'text' => 'ShareThis',
                'class' => 'z-icon-es-sharethis'
            );
            $links[] = array(
                'url' => ModUtil::url('socialise', 'admin', 'socialshareprivacy'),
                'text' => 'SocialSharePrivacy',
                'class' => 'z-icon-es-socialshareprivacy'
            );
        }
        return $links;
    }
}