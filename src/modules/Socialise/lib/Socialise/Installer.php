<?php
/**
 * Copyright Socialise Team 2011
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
 * Provides module installation and upgrade services for the Socialise module.
 */
class Socialise_Installer extends Zikula_AbstractInstaller
{
    /**
     * initialise the template module
     *
     * This function is only ever called once during the lifetime of a particular
     * module instance
     *
     * @return boolean
     */
    public function install()
    {
        // set default values for module
        $this->defaultdata();

        // register listeners
        EventUtil::registerPersistentModuleHandler('Socialise', 'view.init', array('Socialise_Util', 'registerPluginDir'));

        // initialisation successful
        return true;
    }

    /**
     * Upgrade the errors module from an old version
     *
     * This function must consider all the released versions of the module!
     * If the upgrade fails at some point, it returns the last upgraded version.
     *
     * @param string $oldversion Version number string to upgrade from.
     *
     * @return mixed True on success, last valid version string or false if fails.
     */
    public function upgrade($oldversion)
    {
        switch ($oldversion) {
            case '0.1.0':
                // unserialize the sexybookmarks vars
                $this->setVar('sexybookmarks', unserialize($this->getVar('sexybookmarks')));
                // generalize the services keys
                $fbkeys = unserialize($this->getVar('like'));
                $keys = array(
                    'Facebook' => array(
                        'app_id' => ($fbkeys['auth'] == 'app_id') ? $fbkeys['id'] : '',
                        'admins' => ($fbkeys['auth'] == 'admins') ? $fbkeys['id'] : ''
                    )
                );
                $this->setVar('keys', $keys);
                $this->delVar('like');
                // register the supported services by default
                $services = array(
                    'Facebook' => array(
                        'app_id' => 'App ID',
                        'admins' => 'Person ID(s)'
                    )
                );
                $this->setVar('services', $services);
        }

        // update successful
        return true;
    }

    /**
     * delete the errors module
     *
     * This function is only ever called once during the lifetime of a particular
     * module instance
     *
     * @return boolean
     */
    public function uninstall()
    {
        // delete all module vars
        $this->delVars();

        // Deletion successful
        return true;
    }

    /**
     * Create the default data for the users module.
     *
     * This function is only ever called once during the lifetime of a particular
     * module instance.
     *
     * @return boolean
     */
    public function defaultdata()
    {
        // default enabled services for sexybookmarks
        $data = array(
            1 => 'facebook',
            2 => 'twitter',
            3 => 'linkedin',
            4 => 'delicious' ,
            5 => 'myspace',
            6 => 'digg',
            7 => 'technorati',
            8 => 'mail'
        );
        $this->setVar('sexybookmarks', $data);

        // register the supported services
        $services = array(
            'Facebook' => array(
                'app_id' => 'App ID',
                'admins' => 'Person ID(s)'
            )
        );
        $this->setVar('services', $services);
        // and the default service keys
        $keys = array(
            'Facebook' => array(
                'app_id' => '',
                'admins' => ''
            )
        );
        $this->setVar('keys', $keys);
        return true;
    }
}
