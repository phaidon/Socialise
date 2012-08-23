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
 * User api class.
 */
class Socialise_Api_User extends Zikula_AbstractApi
{
    /**
     * Get keys.
     *
     * @param array $args Arguments.
     *
     * @return string.
     */
    public function getKeys($args=array())
    {
        $keys = $this->getVar('keys');

        if (isset($args['service'])) {
            if (isset($keys[$args['service']])) {
                return $keys[$args['service']];
            }
            return array();
        }

        return $keys;
    }

    /**
     * Get current url.
     *
     * @return string.
     */
    public function getCurrentUrl()
    {
        return System::getBaseURL() . substr(System::serverGetVar('REQUEST_URI'), 1);
    }

    /**
     * Get available services.
     *
     * @return array Array of services.
     */
    public function getServices()
    {
        $services = array(
            'scriptstyle'=>array(
                'name'  => 'Script &amp; Style',
                'title' => $this->__f('Submit this to %s', 'Script &amp; Style'),
                'url'   => 'http://scriptandstyle.com/submit?url={url}&amp;title={title}',
            ),
            'blinklist'=>array(
                'name'  => 'Blinklist',
                'title' => $this->__f('Share this on %s', 'Blinklist'),
                'url'   => 'http://www.blinklist.com/index.php?Action=Blink/addblink.php&amp;Url={url}&amp;Title={title}',
            ),
            'delicious'=>array(
                'name'  => 'Delicious',
                'title' => $this->__f('Share this on %s', 'del.icio.us'),
                'url'   => 'http://delicious.com/post?url={url}&amp;title={title}',
            ),
            'digg'=>array(
                'name'  => 'Digg',
                'title' => $this->__('Digg this!'),
                'url'   => 'http://digg.com/submit?phase=2&amp;url={url}&amp;title={title}',
            ),
            'diigo'=>array(
                'name'  => 'Diigo',
                'title' => $this->__('Post this on %s', 'Diigo'),
                'url'   => 'http://www.diigo.com/post?url={url}&amp;title={title}&amp;desc=SEXY_TEASER',
            ),
            'reddit'=>array(
                'name'  => 'Reddit',
                'title' => $this->__f('Share this on %s', 'Reddit'),
                'url'   => 'http://reddit.com/submit?url={url}&amp;title={title}',
            ),
            'yahoobuzz'=>array(
                'name'  => 'Yahoo! Buzz',
                'title' => $this->__('Buzz up!'),
                'url'   => 'http://buzz.yahoo.com/submit/?submitUrl={url}&amp;submitHeadline={title}&amp;submitSummary=YAHOOTEASER&amp;submitCategory=YAHOOCATEGORY&amp;submitAssetType=YAHOOMEDIATYPE',
            ),
            'stumbleupon'=>array(
                'name'  => 'Stumbleupon',
                'title' => $this->__('Stumble upon something good? Share it on StumbleUpon'),
                'url'   => 'http://www.stumbleupon.com/submit?url={url}&amp;title={title}',
            ),
            'technorati'=>array(
                'name'  => 'Technorati',
                'title' => $this->__f('Share this on %s', 'Technorati'),
                'url'   => 'http://technorati.com/faves?add={url}',
            ),
            'mixx'=>array(
                'name'  => 'Mixx',
                'title' => $this->__f('Share this on %s', 'Mixx'),
                'url'   => 'http://www.mixx.com/submit?page_url={url}&amp;title={title}',
            ),
            'myspace'=>array(
                'name'  => 'MySpace',
                'title' => $this->__f('Post this to %s', 'MySpace'),
                'url'   => 'http://www.myspace.com/Modules/PostTo/Pages/?u={url}&amp;t={title}',
            ),
            'designfloat'=>array(
                'name'  => 'DesignFloat',
                'title' => $this->__f('Submit this to %s', 'DesignFloat'),
                'url'   => 'http://www.designfloat.com/submit.php?url={url}&amp;title={title}',
            ),
            'facebook'=>array(
                'name'  => 'Facebook',
                'title' => $this->__f('Share this on %s', 'Facebook'),
                'url'   => 'http://www.facebook.com/sharer.php?&amp;u={url}&amp;t={title}',
            ),
            'twitter'=>array(
                'name'  => 'Twitter',
                'title' => $this->__('Tweet This!'),
                'url'   => 'http://twitter.com/home?status=', // FIXME?
            ),
            'mail'=>array(
                'name'  => 'Email',
                'title' => $this->__('Email this to a friend'),
                'url'   => 'mailto:?subject=%22{title}%22&amp;body=Link: {url} ',
            ),
            'comfeed'=>array(
                'name'  => $this->__('Comments'),
                'title' => $this->__('Subscribe to the comments for this post'),
                'url'   => '{url}',
            ),
            'linkedin'=>array(
                'name'  => 'LinkedIn',
                'title' => $this->__f('Share this on %s', 'LinkedIn'),
                'url'   => 'http://www.linkedin.com/titleArticle?mini=true&amp;url={url}&amp;title={title}&amp;summary=POST_SUMMARY&amp;source=SITE_NAME',
            ),
            'newsvine'=>array(
                'name'  => 'Newsvine',
                'title' => $this->__f('Seed this on %s', 'Newsvine'),
                'url'   => 'http://www.newsvine.com/_tools/seed&amp;save?u={url}&amp;h={title}',
            ),
            'googlebookmarks'=>array(
                'name'  => 'Google Bookmarks',
                'title' => $this->__f('Add this to %s', 'Google Bookmarks'),
                'url'   => 'http://www.google.com/bookmarks/mark?op=add&amp;bkmk={url}&amp;title={title}',
            ),
            'googlereader'=>array(
                'name'  => 'Google Reader',
                'title' => $this->__f('Add this to %s', 'Google Reader'),
                'url'   => 'http://www.google.com/reader/link?url={url}&amp;title={title}&amp;srcUrl={url}&amp;srcTitle={title}&amp;snippet=POST_SUMMARY',
            ),
            'googlebuzz'=>array(
                'name'  => 'Google Buzz',
                'title' => $this->__('Post on Google Buzz'),
                'url'   => 'http://www.google.com/buzz/post?url={url}&amp;imageurl=',
            ),
            'misterwong'=>array(
                'name'  => 'Mister Wong',
                'title' => $this->__f('Add this to %s', 'Mister Wong'),
                'url'   => 'http://www.mister-wong.com/addurl/?bm_url={url}&amp;bm_description={title}&amp;plugin=sexybookmarks',
            ),
            'izeby'=>array(
                'name'  => 'Izeby',
                'title' => $this->__f('Add this to %s', 'Izeby'),
                'url'   => 'http://izeby.com/submit.php?url={url}',
            ),
            'tipd'=>array(
                'name'  => 'Tipd',
                'title' => $this->__f('Share this on %s', 'Tipd'),
                'url'   => 'http://tipd.com/submit.php?url={url}',
            ),
            'pfbuzz'=>array(
                'name'  => 'PFBuzz',
                'title' => $this->__f('Share this on %s', 'PFBuzz'),
                'url'   => 'http://pfbuzz.com/submit?url={url}&amp;title={title}',
            ),
            'friendfeed'=>array(
                'name'  => 'FriendFeed',
                'title' => $this->__f('Share this on %s', 'FriendFeed'),
                'url'   => 'http://www.friendfeed.com/title?title={title}&amp;link={url}',
            ),
            'blogmarks'=>array(
                'name'  => 'BlogMarks',
                'title' => $this->__f('Mark this on %s', 'BlogMarks'),
                'url'   => 'http://blogmarks.net/my/new.php?mini=1&amp;simple=1&amp;url={url}&amp;title={title}',
            ),
            'twittley'=>array(
                'name'  => 'Twittley',
                'title' => $this->__f('Submit this to %s', 'Twittley'),
                'url'   => 'http://twittley.com/submit/?title={title}&amp;url={url}&amp;desc=POST_SUMMARY&amp;pcat=TWITT_CAT&amp;tags=DEFAULT_TAGS',
            ),
            'fwisp'=>array(
                'name'  => 'Fwisp',
                'title' => $this->__f('Share this on %s', 'Fwisp'),
                'url'   => 'http://fwisp.com/submit?url={url}',
            ),
            'bobrdobr'=>array(
                'name'  => 'BobrDobr (' . $this->__('Russian') . ')',
                'title' => $this->__f('Share this on %s', 'BobrDobr'),
                'url'   => 'http://bobrdobr.ru/addext.html?url={url}&amp;title={title}',
            ),
            'yandex'=>array(
                'name'  => 'Yandex.Bookmarks (' . $this->__('Russian') . ')',
                'title' => $this->__f('Add this to %s', 'Yandex.Bookmarks'),
                'url'   => 'http://zakladki.yandex.ru/userarea/links/addfromfav.asp?bAddLink_x=1&amp;lurl={url}&amp;lname={title}',
            ),
            'memoryru'=>array(
                'name'  => 'Memory.ru (' . $this->__('Russian') . ')',
                'title' => $this->__f('Add this to %s', 'Memory.ru'),
                'url'   => 'http://memori.ru/link/?sm=1&amp;u_data[url]={url}&amp;u_data[name]={title}',
            ),
            '100zakladok'=>array(
                'name'  => '100 bookmarks (' . $this->__('Russian') . ')',
                'title' => $this->__f('Add this to %s', '100 bookmarks'),
                'url'   => 'http://www.100zakladok.ru/save/?bmurl={url}&amp;bmtitle={title}',
            ),
            'moemesto'=>array(
                'name'  => 'MyPlace (' . $this->__('Russian') . ')',
                'title' => $this->__f('Add this to %s', 'MyPlace'),
                'url'   => 'http://moemesto.ru/post.php?url={url}&amp;title={title}',
            ),
            'hackernews'=>array(
                'name'  => 'Hacker News',
                'title' => $this->__f('Submit this to %s', 'Hacker News'),
                'url'   => 'http://news.ycombinator.com/submitlink?u={url}&amp;t={title}',
            ),
            'printfriendly'=>array(
                'name'  => 'Print Friendly',
                'title' => $this->__f('Send this page to %s', 'Print Friendly'),
                'url'   => 'http://www.printfriendly.com/print?url={url}',
            ),
            'designbump'=>array(
                'name'  => 'Design Bump',
                'title' => $this->__f('Bump this on %s', 'DesignBump'),
                'url'   => 'http://designbump.com/submit?url={url}&amp;title={title}&amp;body=POST_SUMMARY',
            ),
            'ning'=>array(
                'name'  => 'Ning',
                'title' => $this->__f('Add this to %s', 'Ning'),
                'url'   => 'http://bookmarks.ning.com/addItem.php?url={url}&amp;T={title}',
            ),
            'identica'=>array(
                'name'  => 'Identica',
                'title' => $this->__f('Post this to %s', 'Identica'),
                'url'   => 'http://identi.ca//index.php?action=newnotice&amp;status_textarea=Reading:+&quot;SHORT_{title}&quot;+-+from+FETCH_URL',
            ),
            'xerpi'=>array(
                'name'  => 'Xerpi',
                'title' => $this->__f('Save this to %s', 'Xerpi'),
                'url'   => 'http://www.xerpi.com/block/add_link_from_extension?url={url}&amp;title={title}',
            ),
            'techmeme'=>array(
                'name'  => 'TechMeme',
                'title' => $this->__f('Tip this to %s', 'TechMeme'),
                'url'   => 'http://twitter.com/home/?status=Tip+@Techmeme+{url}+&quot;{title}&quot;&amp;source=titleaholic',
            ),
            'sphinn'=>array(
                'name'  => 'Sphinn',
                'title' => $this->__f('Sphinn this on %s', 'Sphinn'),
                'url'   => 'http://sphinn.com/index.php?c=post&amp;m=submit&amp;link={url}',
            ),
            'posterous'=>array(
                'name'  => 'Posterous',
                'title' => $this->__f('Post this to %s', 'Posterous'),
                'url'   => 'http://posterous.com/title?linkto={url}&amp;title={title}&amp;selection=POST_SUMMARY',
            ),
            'globalgrind'=>array(
                'name'  => 'Global Grind',
                'title' => $this->__f('Grind this! on %s', 'Global Grind'),
                'url'   => 'http://globalgrind.com/submission/submit.aspx?url={url}&amp;type=Article&amp;title={title}',
            ),
            'pingfm'=>array(
                'name'  => 'Ping.fm',
                'title' => $this->__f('Ping this on %s', 'Ping.fm'),
                'url'   => 'http://ping.fm/ref/?link={url}&amp;title={title}&amp;body=POST_SUMMARY',
            ),
            'nujij'=>array(
                'name'  => 'NUjij (' . $this->__('Dutch') . ')',
                'title' => $this->__f('Submit this to %s', 'NUjij'),
                'url'   => 'http://nujij.nl/jij.lynkx?t={title}&amp;u={url}&amp;b=POST_SUMMARY',
            ),
            'ekudos'=>array(
                'name'  => 'eKudos (' . $this->__('Dutch') . ')',
                'title' => $this->__f('Submit this to %s', 'eKudos'),
                'url'   => 'http://www.ekudos.nl/artikel/nieuw?url={url}&amp;title={title}&amp;desc=POST_SUMMARY',
            ),
            'netvouz'=>array(
                'name'  => 'Netvouz',
                'title' => $this->__f('Submit this to %s', 'Netvouz'),
                'url'   => 'http://www.netvouz.com/action/submitBookmark?url={url}&amp;title={title}&amp;popup=no',
            ),
            'netvibes'=>array(
                'name'  => 'Netvibes',
                'title' => $this->__f('Submit this to %s', 'Netvibes'),
                'url'   => 'http://www.netvibes.com/title?title={title}&amp;url={url}',
            ),
            'webblend'=>array(
                'name'  => 'Web Blend',
                'title' => $this->__('Blend this!'),
                'url'   => 'http://thewebblend.com/submit?url={url}&amp;title={title}&amp;body=POST_SUMMARY',
            ),
            'wykop'=>array(
                'name'  => 'Wykop (' . $this->__('Polish') . ')',
                'title' => $this->__f('Add this to %s', 'Wykop!'),
                'url'   => 'http://www.wykop.pl/dodaj?url={url}&amp;title={title}',
            ),
            'blogengage'=>array(
                'name'  => 'BlogEngage',
                'title' => $this->__('Engage with this article!'),
                'url'   => 'http://www.blogengage.com/submit.php?url={url}',
            ),
            'hyves'=>array(
                'name'  => 'Hyves',
                'title' => $this->__f('Share this on %s', 'Hyves'),
                'url'   => 'http://www.hyves.nl/profilemanage/add/tips/?name={title}&amp;text=POST_SUMMARY+-+{url}&amp;rating=5',
            ),
            'pusha'=>array(
                'name'  => 'Pusha (' . $this->__('Swedish') . ')',
                'title' => $this->__f('Push this on %s', 'Pusha'),
                'url'   => 'http://www.pusha.se/posta?url={url}&amp;title={title}',
            ),
            'hatena'=>array(
                'name'  => 'Hatena Bookmarks (' . $this->__('Japanese')  . ')',
                'title' => $this->__f('Bookmarks this on %s', 'Hatena Bookmarks'),
                'url'   => 'http://b.hatena.ne.jp/add?mode=confirm&amp;url={url}&amp;title={title}',
            ),
            'mylinkvault'=>array(
                'name'  => 'MyLinkVault',
                'title' => $this->__f('Store this link on %s', 'MyLinkVault'),
                'url'   => 'http://www.mylinkvault.com/link-page.php?u={url}&amp;n={title}',
            ),
            'slashdot'=>array(
                'name'  => 'SlashDot',
                'title' => $this->__f('Submit this to %s', 'SlashDot'),
                'url'   => 'http://slashdot.org/bookmark.pl?url={url}&amp;title={title}',
            ),
            'squidoo'=>array(
                'name'  => 'Squidoo',
                'title' => $this->__f('Add to a lense on %s', 'Squidoo'),
                'url'   => 'http://www.squidoo.com/lensmaster/bookmark?{url}',
            ),
            'propeller'=>array(
                'name'  => 'Propeller',
                'title' => $this->__f('Submit this story to %s', 'Propeller'),
                'url'   => 'http://www.propeller.com/submit/?url={url}',
            ),
            'faqpal'=>array(
                'name'  => 'FAQpal',
                'title' => $this->__f('Submit this to %s', 'FAQpal'),
                'url'   => 'http://www.faqpal.com/submit?url={url}',
            ),
            'evernote'=>array(
                'name'  => 'Evernote',
                'title' => $this->__f('Clip this to %s', 'Evernote'),
                'url'   => 'http://www.evernote.com/clip.action?url={url}&amp;title={title}',
            ),
            'meneame'=>array(
                'name'  => 'Meneame (' . $this->__('Spanish') . ')',
                'title' => $this->__f('Submit this to %s', 'Meneame'),
                'url'   => 'http://meneame.net/submit.php?url={url}',
            ),
            'bitacoras'=>array(
                'name'  => 'Bitacoras (' . $this->__('Spanish') . ')',
                'title' => $this->__f('Submit this to %s', 'Bitacoras'),
                'url'   => 'http://bitacoras.com/anotaciones/{url}',
            ),
            'jumptags'=>array(
                'name'  => 'JumpTags',
                'title' => $this->__f('Submit this link to %s', 'JumpTags'),
                'url'   => 'http://www.jumptags.com/add/?url={url}&amp;title={title}',
            ),
            'bebo'=>array(
                'name'  => 'Bebo',
                'title' => $this->__f('Share this on %s', 'Bebo'),
                'url'   => 'http://www.bebo.com/c/title?Url={url}&amp;Title={title}',
            ),
            'n4g'=>array(
                'name'  => 'N4G',
                'title' => $this->__f('Submit tip to %s', 'N4G'),
                'url'   => 'http://www.n4g.com/tips.aspx?url={url}&amp;title={title}',
            ),
            'strands'=>array(
                'name'  => 'Strands',
                'title' => $this->__f('Submit this to %s', 'Strands'),
                'url'   => 'http://www.strands.com/tools/title/webpage?title={title}&amp;url={url}',
            ),
            'orkut'=>array(
                'name'  => 'Orkut',
                'title' => $this->__f('Promote this on %s', 'Orkut'),
                'url'   => 'http://promote.orkut.com/preview?nt=orkut.com&amp;tt={title}&amp;du={url}&amp;cn=POST_SUMMARY',
            ),
            'tumblr'=>array(
                'name'  => 'Tumblr',
                'title' => $this->__f('Share this on %s', 'Tumblr'),
                'url'   => 'http://www.tumblr.com/title?v=3&amp;u={url}&amp;t={title}',
            ),
            'stumpedia'=>array(
                'name'  => 'Stumpedia',
                'title' => $this->__f('Add this to %s', 'Stumpedia'),
                'url'   => 'http://www.stumpedia.com/submit?url={url}&amp;title={title}',
            ),
            'current'=>array(
                'name'  => 'Current',
                'title' => $this->__f('Post this to %s', 'Current'),
                'url'   => 'http://current.com/clipper.htm?url={url}&amp;title={title}',
            ),
            'blogger'=>array(
                'name'  => 'Blogger',
                'title' => $this->__f('Blog this on %s', 'Blogger'),
                'url'   => 'http://www.blogger.com/blog_this.pyra?t&amp;u={url}&amp;n={title}&amp;pli=1',
            ),
            'plurk'=>array(
                'name'  => 'Plurk',
                'title' => $this->__f('Share this on %s', 'Plurk'),
                'url'   => 'http://www.plurk.com/m?content={title}+-+{url}&amp;qualifier=titles',
            )
        );
        ksort($services); //sort array by keys

        return $services;
    }
}
