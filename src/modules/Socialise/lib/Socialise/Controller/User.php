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

class Socialise_Controller_User extends Zikula_Controller
{

    /**
    * Twitter plugin
    *
    * @param        string   $args   parameter from the plugin
    * @return       string|boolean Output.
    */
    public function twitter($args)
    {
        # More info: http://twitter.com/about/resources/tweetbutton#type-fields
        extract($args);
        unset($args);
        if( empty($url) ) {
            $url = ModUtil::apiFunc('socialise', 'user', 'currentUrl');
        }
        if( empty( $title ) ) {
            $title ==  '';
        }
        if( empty($count) ) {
            $count = 'none';
        }

        $this->view->assign('url', $url);
        $this->view->assign('title', $title);
        $this->view->assign('count', $count); # none | horizontal
        return $this->view->fetch('plugin/twitter.tpl');
    }

    /**
    * Facebook like button plugin
    *
    * @param        string   $args   parameter from the plugin
    * @return       string|boolean Output.
    */
    public function like($args) {

        # http://developers.facebook.com/docs/reference/plugins/like/

        $like = unserialize( $this->getVar( 'like' ) );
        if(empty($like['id']) or empty($like['auth']) ) {
            return '';
        }

        extract($args);
        unset($args);

        # url
        if(empty($url)) {
            $url = ModUtil::apiFunc('socialise', 'user', 'currentUrl');
        }
        $this->view->assign('url', $url);

        # count box
        if(empty($layout)) {
            $layout = 'standard';
        } else if ($layout == 'horrizontal') {
            $layout = 'button_count';
        } else if ($layout == 'vertical') {
            $layout = 'box_count';
        }
        $this->view->assign('layout', $layout);

        # faces
        $this->view->assign('faces', 'false');

        $metas = array(
            'title' => PageUtil::getVar('title'),
            'type' => 'news',
            'url' => $url,
            //'image' => '',
            'site_name' => ModUtil::getVar('ZConfig', 'sitename'),
        );

        # meta tages
        PageUtil::addVar('rawtext', '<meta property="fb:'.$like['auth'].'" content="'.$like['id'].'" />');

        foreach( $metas as $key => $value ) {
            PageUtil::addVar('rawtext', '<meta property="og:' . $key . '" content="' . $value . '" />' );
        }



        if(!empty($implementation) and $implementation == 'iframe') {
            return $this->view->fetch('plugin/like_frame.tpl');
        } else {
            return $this->view->fetch('plugin/like.tpl');
        }
    }

    /**
    * Sexybottun plugin
    *
    * @param        string   $args   parameter from the plugin
    * @return       string|boolean Output.
    */
    public function sexybookmarks($args)
    {
        extract($args);
        unset($args);

        # url
        if(empty($url)) {
            $url = ModUtil::apiFunc('socialise', 'user', 'currentUrl');
        }

        $services = ModUtil::apiFunc('socialise', 'user', 'getServices');
        foreach($services as $key => $value) {
            $services[$key]['url'] = str_replace( "{url}",$url, $value['url']);
            $services[$key]['url'] = str_replace( "{title}",$title, $services[$key]['url'] );
        }

        $sexybookmarks0 = unserialize( $this->getVar( 'sexybookmarks') );
        $sexybookmarks = array();
        foreach($sexybookmarks0 as $key => $value) {
            $sexybookmarks[$key] = array();
            $sexybookmarks[$key]['name'] = $value;
            $sexybookmarks[$key]['url'] = $services[$value]['url'];
            $sexybookmarks[$key]['title'] = $services[$value]['title'];
        }

        $this->view->assign('linewidth', count($sexybookmarks)*66);
        $this->view->assign('sexybookmarks', $sexybookmarks);
        return $this->view->fetch('plugin/sexybookmarks.tpl');
    }


    public function sharethis($args)
    {
        extract($args);
        unset($args);

        # url
        if(empty($url)) {
            $url = ModUtil::apiFunc('socialise', 'user', 'currentUrl');
        }

        static $onceonly = false;

        $this->view->assign('url', urlencode($url) );
        $this->view->assign('title', urlencode($title));
        $this->view->assign('id', $id);

       // stuff to do once and once only....
        if (!$onceonly) {
            $onceonly = true;
            PageUtil::addVar('footer', $this->view->fetch('plugin/sharethis_footer.tpl'));
        }

       // stuff to do for each item
        return $this->view->fetch('plugin/sharethis.tpl');
    }

}