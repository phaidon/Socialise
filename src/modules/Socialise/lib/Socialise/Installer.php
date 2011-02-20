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


class Socialise_Installer extends Zikula_Installer
{
    /**
    * initialise the template module
    * This function is only ever called once during the lifetime of a particular
    * module instance
    */
    public function install()
    {
        // Set default values for module
        $this->defaultdata();

        EventUtil::registerPersistentModuleHandler('socialise', 'view.init', array('Socialise_Util', 'registerPluginDir'));

        // Initialisation successful
        return true;
    }

    /**
    * Upgrade the errors module from an old version
    *
    * This function must consider all the released versions of the module!
    * If the upgrade fails at some point, it returns the last upgraded version.
    *
    * @param        string   $oldVersion   version number string to upgrade from
    * @return       mixed    true on success, last valid version string or false if fails
    */
    public function upgrade($oldversion)
    {
        // Update successful
        return true;
    }

    /**
    * Create the default data for the users module.
    *
    * This function is only ever called once during the lifetime of a particular
    * module instance.
    *
    * @return void
    */
    public function defaultdata()
    {
        $data = array( 'mail', 'facebook', 'twitter', 'linkedin', 'delicious' , 'myspace', 'digg', 'technorati');
        $data[8] = $data[0];
        unset($data[0]);
        $this->setVar('sexybookmarks', serialize($data));
    }

    /**
    * delete the errors module
    * This function is only ever called once during the lifetime of a particular
    * module instance
    */
    public function uninstall()
    {
        // delete all module vars
        $this->delVars();

        // Deletion successful
        return true;
    }
}