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

