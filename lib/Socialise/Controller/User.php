<?php

/**
* socialise
*
* @copyright Fabian Wuertz
* @link http://code.zikula.org/socialise
* @version $Id$
* @license See license.txt
*/

class socialise_Controller_User extends Zikula_Controller
{

	public function sharethis($args)
	{
		extract($args);
		unset($args);

		if( empty($url) ) {
			$url = ModUtil::apiFunc('socialise', 'user', 'currentUrl');
		}

		$this->view->assign( 'url',     $url);
		$this->view->assign( 'title', $title);
		return $this->view->fetch('plugin/sharethis.tpl');
	}


	public function twitter($params)
	{
		# More info: http://twitter.com/about/resources/tweetbutton#type-fields
		extract($params);
		unset($params);
		if( empty($url) ) {
			$url = ModUtil::apiFunc('socialise', 'user', 'currentUrl');
		}
		if( empty( $title ) ) {
			$title ==  '';
		}
		if( empty($count) ) {
			$count = 'none';
		}

		$this->view->assign( 'url',     $url);
		$this->view->assign( 'title', $title);
		$this->view->assign( 'count', $count); # none | horizontal
		return $this->view->fetch('plugin/twitter.tpl');
	}


	public function like ($params) {

		# http://developers.facebook.com/docs/reference/plugins/like/

		$like = unserialize( $this->getVar( 'like' ) );
		if( empty( $like['id'] ) ) {
			return '';
		}

		extract($params);
		unset($params);

		# url
		if( empty($url) ) {
			$url = ModUtil::apiFunc('socialise', 'user', 'currentUrl');
		}
		$this->view->assign( 'url', $url);

		# count box
		if( empty( $layout ) ) {
			$layout = 'standard';
		} else if ( $layout == 'horrizontal' ) {
			$layout = 'button_count';
		} else if ( $layout == 'vertical' ) {
			$layout = 'box_count';
		}
		$this->view->assign( 'layout', $layout);

		# faces
		$this->view->assign( 'faces', 'false');

		$metas = array(
			'title' => PageUtil::getVar('title'),
			'type' => 'news',
			'url' => $url,
			//'image' => '',
			'site_name' => ModUtil::getVar( 'ZConfig', 'sitename' ),
		);

		# meta tages
		PageUtil::addVar('rawtext', '<meta property="fb:' . $like['type'] . '" content="' . $like['id'] . '" />');

		foreach( $metas as $key => $value ) {
			PageUtil::addVar('rawtext', '<meta property="og:' . $key . '" content="' . $value . '" />' );
		}



		if( !empty( $implementation ) and $implementation == 'iframe') {
			return $this->view->fetch('plugin/like_frame.tpl');
		} else {
			return $this->view->fetch('plugin/like.tpl');
		}
	}


	public function sexybookmarks($args)
	{
		extract($args);
		unset($args);

		# url
		if( empty($url) ) {
			$url = ModUtil::apiFunc('socialise', 'user', 'currentUrl');
		}

		$services = ModUtil::apiFunc('socialise', 'user', 'getServices');

		foreach($services as $key => $value) {
			$services[$key]['url'] = str_replace( "{url}",$url, $value['url']);
			$services[$key]['url'] = str_replace( "{title}",$title, $services[$key]['url'] );
			//$services[$key]['url'] = str_replace( "&","&amp;", $services[$key]['url'] );

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

}

