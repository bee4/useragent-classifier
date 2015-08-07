<?php
/**
 * This file is part of the beebot package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Bee4 2013
 * @author    Stephane HULARD <s.hulard@chstudio.fr>
 * @package   Bee4\UserAgentClassify\Bots
 */

namespace Bee4\UserAgentClassify\Bots;

use InvalidArgumentException;

/**
 * Class GoogleBot
 * Detect if a visit is a GoogleBot one
 * @package Bee4\UserAgentClassify\Bots
 */
class Google extends AbstractBot
{
    /**
     * Google bot constructor
     * @param string $useragent The useragent used for detection
     * @throws InvalidArgumentException
     */
    public function __construct($useragent)
    {
        //GoogleBot (search bot): http://www.botopedia.org/user-agent-list/search-bots/googlebot.html
        //Google FeedFetcher (search bot): http://www.botopedia.org/user-agent-list/search-bots/google-feedfetcher.html
        //Google Custom Search (search bot): http://www.botopedia.org/user-agent-list/search-bots/google-custom-search.html
        //Google Desktop (Crawler): http://www.botopedia.org/user-agent-list/crawlers/item/338.html
        //Google Plus Share (Service agent): http://www.botopedia.org/user-agent-list/service-agents/item/337.html
        //Google Translate (service agent): http://www.botopedia.org/user-agent-list/service-agents/google-translate.html
        //Google News, Google Video, Mediapartners, Adsbot: https://support.google.com/webmasters/answer/1061943
        /**
         * compatible; Mediapartners-Google/2.1; +http://www.google.com/bot.html
         * Mediapartners-Google
         *
         * Googlebot-News
         * Googlebot-Video
         *
         * AdsBot-Google (+http://www.google.com/adsbot.html)
         *
         * Mozilla/4.0 (compatible; GoogleToolbar 7.5.4209.2358; Windows 6.1; MSIE 9.10.9200.16635)
         *
         * Googlebot-Image/1.0
         * Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)
         * DoCoMo/2.0 N905i(c100;TB;W24H16) (compatible; Googlebot-Mobile/2.1; +htt://www.google.com/bot.html)
         * GoogleProducer
         * SAMSUNG-SGH-E250/1.0 Profile/MIDP-2.0 Configuration/CLDC-1.1 UP.Browser/6.2.3.3.c.1.101 (GUI) MMP/2.0 (compatible; Googlebot-Mobile/2.1; +http://www.google.com/bot.html)
         * Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_1 like Mac OS X; en-us) AppleWebKit/532.9 (KHTML, like Gecko) Version/4.0.5 Mobile/8B117 Safari/6531.22.7 (compatible; Googlebot-Mobile/2.1; +http://www.google.com/bot.html)
         * Google-Site-Verification/1.0
         * Google-Test
         * Googlebot/2.1 (+http://www.google.com/bot.html)
         *
         * Feedfetcher-Google; (+http://www.google.com/feedfetcher.html;
         *
         * FeedFetcher-Google; +http://www.google.com/feedfetcher.html)
         *
         * Mozilla/5.0 (compatible; Google Desktop/5.9.1005.12335; http://desktop.google.com/)"
         *
         * Mozilla/5.0 (Windows NT 6.1; rv:6.0) Gecko/20110814 Firefox/6.0
         *
         * Mozilla/5.0 (iPad; CPU OS 5_0_1 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A405 Safari/7534.48.3,gzip(gfe) (via translate.google.com)
         * Mozilla/5.0 (Windows NT 6.1; WOW64; rv:12.0) Gecko/20100101 Firefox/12.0,gzip(gfe) (via translate.google.com)
         * Mozilla/5.0 (Windows NT 6.0) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5,gzip(gfe) (via translate.google.com)
         * Mozilla/5.0 (Windows NT 5.1; rv:12.0) Gecko/20100101 Firefox/12.0,gzip(gfe) (via translate.google.com)
         * Mozilla/5.0 (Windows NT 6.1; rv:13.0) Gecko/20100101 Firefox/13.0.1,gzip(gfe) (via translate.google.com)
         * Mozilla/5.0 (iPad; CPU OS 5_1_1 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9B206 Safari/7534.48.3,gzip(gfe) (via translate.google.com)
         * Mozilla/5.0 (Windows NT 6.1; WOW64; rv:13.0) Gecko/20100101 Firefox/13.0.1,gzip(gfe) (via translate.google.com)
         * Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5,gzip(gfe) (via translate.google.com)
         * Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5,gzip(gfe) (via translate.google.com)
         * Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0),gzip(gfe) (via translate.google.com)
         * Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5,gzip(gfe) (via translate.google.com)
         * Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0),gzip(gfe) (via translate.google.com)
         * Mozilla/5.0 (Windows NT 5.1; rv:13.0) Gecko/20100101 Firefox/13.0.1,gzip(gfe) (via translate.google.com)
         *
         * AppEngine-Google; (+http://code.google.com/appengine; appid: webetrex)
         * AppEngine-Google; (+http://code.google.com/appengine; appid: unblock4myspace)
         * AppEngine-Google; (+http://code.google.com/appengine; appid: tunisproxy)
         * AppEngine-Google; (+http://code.google.com/appengine; appid: proxy-in-rs)
         * AppEngine-Google; (+http://code.google.com/appengine; appid: proxy-ba-k)
         * AppEngine-Google; (+http://code.google.com/appengine; appid: moelonepyaeshan)
         * AppEngine-Google; (+http://code.google.com/appengine; appid: mirrorrr)
         * AppEngine-Google; (+http://code.google.com/appengine; appid: mapremiereapplication)
         * AppEngine-Google; (+http://code.google.com/appengine; appid: longbows-hideout)
         * AppEngine-Google; (+http://code.google.com/appengine; appid: eduas23)
         * AppEngine-Google; (+http://code.google.com/appengine; appid: craigserver)
         * AppEngine-Google; ( http://code.google.com/appengine; appid: proxy-ba-k)
         */
        if (strpos($useragent, 'Googlebot-Image') !== false) {
            $this->setName('google-image');
            $this->addTags(['search','image']);
        } elseif (strpos($useragent, 'Googlebot-Mobile') !== false) {
            $this->setName('google-mobile');
            $this->addTags(['search','mobile']);
        } elseif (strpos($useragent, 'Googlebot-News') !== false) {
            $this->setName('google-news');
            $this->addTags(['search','news']);
        } elseif (strpos($useragent, 'Googlebot-Video') !== false) {
            $this->setName('google-video');
            $this->addTags(['search','video']);
        } elseif (strpos($useragent, 'compatible; Mediapartners-Google') !== false) {
            $this->setName('google-adsense-mobile');
            $this->addTags(['search','publicity','mobile']);
        } elseif (strpos($useragent, 'Mediapartners-Google') !== false) {
            $this->setName('google-adsense');
            $this->addTags(['search','publicity']);
        } elseif (strpos($useragent, 'AdsBot-Google') !== false) {
            $this->setName('google-adsbot');
            $this->addTags(['tool','publicity','quality']);
        } elseif (strpos($useragent, 'GoogleProducer') !== false) {
            $this->setName('google-producer');
        } elseif (strpos($useragent, 'Google-Site-Verification') !== false) {
            $this->setName('google-site-verification');
            $this->addTags(['tool']);
        } elseif (strpos($useragent, 'Google-Test') !== false || strpos($useragent, 'Googlebot-Test') !== false) {
            $this->setName('google-test');
        } elseif (strpos($useragent, 'Feedfetcher-Google') !== false) {
            $this->setName('google-feedfetcher');
            $this->addTags(['feed']);
        } elseif (strpos($useragent, 'Google Desktop') !== false) {
            $this->setName('google-desktop');
            $this->addTags(['tool']);
        } elseif (strpos($useragent, 'translate.google.com') !== false) {
            $this->setName('google-translate');
            $this->addTags(['translate']);
        } elseif (strpos($useragent, 'GoogleToolbar') !== false) {
            $this->setName('google-toolbar');
            $this->addTags(['tool','collect']);
        } elseif (strpos($useragent, 'AppEngine-Google') !== false) {
            $this->setName('google-appengine');
            $this->addTags(['cloud']);
        } elseif (strpos($useragent, 'Googlebot') !== false) {
            $this->setName('google-bot');
            $this->addTags(['search']);
        } elseif (strpos($useragent, 'Google') !== false) {
            $this->setName('google-unknown');
        } else {
            throw new InvalidArgumentException('UserAgent given is not a valid google one: ' . $useragent);
        }
    }
}
