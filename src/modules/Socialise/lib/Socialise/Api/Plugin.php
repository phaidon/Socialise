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

class Socialise_Api_Plugin extends Zikula_AbstractApi
{
    /**
     * Twitter plugin
     *
     * @param  array $args Parameters from the plugin (title, url, count).
     *
     * @return string Output.
     */
    public function twitter($args)
    {
        # http://twitter.com/about/resources/tweetbutton#type-fields
        $args = array(
            'title' => (isset($args['title']) && $args['title']) ? $args['title'] : '',
            'url'   => (isset($args['url']) && $args['url']) ? $args['url'] : ModUtil::apiFunc('socialise', 'user', 'getCurrentUrl'),
            'count' => (isset($args['count']) && in_array($args['count'], array('none', 'horizontal'))) ? $args['count'] : 'none'
        );

        $this->view = Zikula_View::getInstance($this->getName());

        return $this->view->assign('plugin', $args)
                          ->fetch('plugin/twitter.tpl');
    }

    /**
     * Facebook like button plugin
     *
     * @param  array $args Parameters from the plugin (tpl, url, layout, width, height, action, colorscheme, font, faces, addmetatags, metatitle, metatype, metaimage).
     *
     * @return string Output.
     */
    public function fblike($args)
    {
        # http://developers.facebook.com/docs/reference/plugins/like/

        // validation of Facebook ID
        $values  = $this->getVar('keys');
        if (!array_filter($values['Facebook'])) {
            return '';
        }

        $args = array(
            'tpl'    => (isset($args['tpl']) && $args['tpl']) ? DataUtil::formatForOS($args['tpl']) : '',
            'url'    => (isset($args['url']) && $args['url']) ? $args['url'] : ModUtil::apiFunc('socialise', 'user', 'getCurrentUrl'),
            'action' => (isset($args['action']) && $args['action']) ? strtolower($args['action']) : '',
            'layout' => (isset($args['layout'])) ? $args['layout'] : '',
            'faces'  => (isset($args['faces'])) ? (bool)$args['faces'] : false,
            'font'   => (isset($args['font'])) ? $args['font'] : '',
            'width'  => (isset($args['width']) && $args['width']) ? (int)$args['width'] : 55,
            'height' => (isset($args['height']) && $args['height']) ? (int)$args['height'] : 20,
            'colorscheme' => (isset($args['colorscheme'])) ? strtolower($args['colorscheme']) : '',
            'addmetatags' => (isset($args['addmetatags'])) ? (bool)$args['addmetatags'] : false,
            'metatitle'   => (isset($args['metatitle']) && $args['metatitle']) ? $args['metatitle'] : PageUtil::getVar('title'),
            'metatype'    => (isset($args['metatype']) && $args['metatype']) ? $args['metatype'] : 'news',
            'metaimage'   => (isset($args['metaimage']) && $args['metaimage']) ? $args['metaimage'] : ''
        );

        // parameters validations
        if (!in_array($args['action'], array('like', 'recommend'))) {
            $args['action'] = 'like';
        }
        // avoid a browser bug with XFBML and action="recommend"
        if ($args['action'] == 'recommend' && $args['tpl'] == 'xfbml') {
            $args['tpl'] = '';
        }
        switch ($args['layout']) {
            case 'horizontal':
            case 'button_count':
                $args['layout'] = 'button_count';
                // adjust the size
                $args['width']  = $args['width'] >= 100 ? $args['width'] : 100;
                $args['height'] = $args['height'] >= 20 ? $args['height'] : 20;
                break;
            case 'vertical':
            case 'box_count':
                $args['layout'] = 'box_count';
                // adjust the size
                $args['width']  = $args['width'] >= 80 ? $args['width'] : 80;
                $args['height'] = $args['height'] >= 65 ? $args['height'] : 65;
                break;
            default:
                $args['layout'] = 'standard';
                // adjust the size
                if ($args['width'] < 85) {
                    $args['width'] = ($args['action'] == 'like') ? 85 : 105;
                }
                if ($args['faces']) {
                    $args['height'] = $args['height'] >= 80 ? $args['height'] : 80;
                }
                $args['height'] = $args['height'] >= 25 ? $args['height'] : 25;
        }
        $args['faces'] = $args['faces'] ? 'true' : 'false';

        $args['font']  = str_replace(' ', '+', $args['font']);
        $fonts = array('arial', 'lucida+grande', 'segoe+ui', 'tahoma', 'trebuchet+ms', 'verdana');
        if (!in_array($args['font'], $fonts)) {
            $args['font'] = '';
        }

        if (!in_array($args['colorscheme'], array('light', 'dark'))) {
            $args['colorscheme'] = 'light';
        }

        // add the meta tags
        foreach (array_filter($values['Facebook']) as $prop => $content) {
            PageUtil::addVar('rawtext', '<meta property="fb:'.$prop.'" content="'.$content.'" />');
        }

        if ($args['addmetatags']) {
            $metadata = array(
                'title'     => $args['metatitle'],
                'type'      => $args['metatype'],
                'url'       => $args['url'],
                'site_name' => ModUtil::getVar('ZConfig', 'sitename')
            );
            if ($args['metaimage']) {
                $metadata['image'] = $args['metaimage'];
            }

            foreach($metadata as $prop => $content ) {
                PageUtil::addVar('rawtext', '<meta property="og:'.$prop.'" content="'.$content.'" />');
            }
        }

        //build the plugin output
        $this->view = Zikula_View::getInstance($this->getName());

        $this->view->assign('plugin', $args);

        if ($args['tpl'] && $this->view->template_exists("plugin/fblike_{$args['tpl']}.tpl")) {
            return $this->view->fetch("plugin/fblike_{$args['tpl']}.tpl");
        }

        return $this->view->fetch('plugin/fblike.tpl');
    }

    /**
     * Sexybutton plugin.
     *
     * @param  array $args Parameters from the plugin (title, url).
     *
     * @return string Output.
     */
    public function sexybookmarks($args)
    {
        $args = array(
            'title' => (isset($args['title']) && $args['title']) ? $args['title'] : '',
            'url'   => (isset($args['url']) && $args['url']) ? $args['url'] : ModUtil::apiFunc('socialise', 'user', 'getCurrentUrl')
        );

        $services = ModUtil::apiFunc('Socialise', 'user', 'getServices');
        foreach ($services as $key => $value) {
            $services[$key]['url'] = str_replace('{url}', $args['url'], $value['url']);
            $services[$key]['url'] = str_replace('{title}', $args['title'], $services[$key]['url']);
        }

        $sexybookmarks = $this->getVar('sexybookmarks');
        foreach ($sexybookmarks as $key => $value) {
            $sexybookmarks[$key] = array(
                'name'  => $value,
                'url'   => $services[$value]['url'],
                'title' => $services[$value]['title']
            );
        }

        $this->view = Zikula_View::getInstance($this->getName());

        return $this->view->assign('linewidth', count($sexybookmarks)*66)
                          ->assign('sexybookmarks', $sexybookmarks)
                          ->fetch('plugin/sexybookmarks.tpl');
    }

    /**
     * ShareThis plugin.
     *
     * @param  array $args Parameters from the plugin (id, title, url, text).
     *
     * @return string Output.
     */
    public function sharethis($args)
    {
        $args = array(
            'id'    => (isset($args['id']) && $args['id']) ? $args['id'] : '',
            'title' => (isset($args['title']) && $args['title']) ? $args['title'] : '',
            'url'   => (isset($args['url']) && $args['url']) ? $args['url'] : ModUtil::apiFunc('socialise', 'user', 'getCurrentUrl'),
            'text'  => (isset($args['text']) && $args['text']) ? $args['text'] : $this->__('Share!')
        );

        if (!$args['id']) {
            return '';
        }

        $output = '';
        $this->view = Zikula_View::getInstance($this->getName());

        // stuff to do once and once only....
        static $onceonly = false;
        if (!$onceonly) {
            $output = $this->view->fetch('plugin/sharethis_include.tpl');
            $onceonly = true;
        }

        $this->view->assign('plugin', $args);

        // stuff to do for each item
        return $output.$this->view->fetch('plugin/sharethis.tpl');
    }
}
