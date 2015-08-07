<?php
/**
 * This file is part of the beebot package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Bee4 2013
 * @author    Stephane HULARD <s.hulard@chstudio.fr>
 * @author    Ivo GEORGIEV <ivokgeorgiev@gmail.com>
 * @package   Test\Bee4\UserAgent\Classifier
 */

namespace Test\Bee4\UserAgent\Classifier;

use Bee4\UserAgent\Classifier\Detector;

/**
 * Detector unit test
 * @package Test\Bee4\UserAgent\Classifier
 */
class DetectorTest extends \PHPUnit_Framework_TestCase
{

	/**
	 * @var Detector
	 */
	protected $object;
	protected $robotsUA;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		//Alexa's Bots UA
		/**
		 * Alexa bot:
			Le UA doit contenir -> ia_archiver et pas simplement alexa.com selon les donnees officielles ALEXA :
			 http://www.alexa.com/help/webmasters
		 */
		$this->robotsUA['alexa']['useragent'] = "ia_archiver (+http://www.alexa.com/site/help/webmasters; crawler@alexa.com)";
		$this->robotsUA['alexa']['expectedValue'] = "alexa-crawler";
		//Baidu's Bots UA
		$this->robotsUA['baidu-image']['useragent'] = "Baiduspider-image+(+http://www.baidu.com/search/spider.htm)";
		$this->robotsUA['baidu-spider']['useragent'] = "Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)";
		$this->robotsUA['baidu-image']['expectedValue'] = "baidu-image";
		$this->robotsUA['baidu-spider']['expectedValue'] = "baidu-spider";
		//BaseBot's Bots UA
		$this->robotsUA['base-bot']['useragent'] = "EasyDL/3.xx http://keywen.com/Encyclopedia/Bot";
		$this->robotsUA['base-spider']['useragent'] = "Aleksika Spider/1.0 (+http://www.aleksika.com/)";
		$this->robotsUA['base-crawler']['useragent'] = "aardvark-crawler";
		$this->robotsUA['base-bot']['expectedValue'] = "base-bot";
		$this->robotsUA['base-spider']['expectedValue'] = "base-spider";
		$this->robotsUA['base-crawler']['expectedValue'] = "base-crawler";
		//Bing's Bots UA
		$this->robotsUA['msnbot-media']['useragent'] = "msnbot-media/1.0 (+http://search.msn.com/msnbot.htm)";
		//UA for original msnbot is Mozilla/4.0 (compatible; MSIE 6.0; Windows NT; MS Search 4.0 Robot)
		$this->robotsUA['msnbot']['useragent'] = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT; msnbot 4.0 Robot)";
		//The test for adidxbot returns actually an bing-msn bot first
		$this->robotsUA['adixbot']['useragent'] = "adidxbot/1.1 (+http://search.msn.com/msnbot.htm)";
		$this->robotsUA['bing']['useragent'] = "Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)";
		$this->robotsUA['msnbot-media']['expectedValue'] = "bing-msn-media";
		$this->robotsUA['msnbot']['expectedValue'] = "bing-msn";
		$this->robotsUA['adixbot']['expectedValue'] = "bing-adcenter";
		$this->robotsUA['bing']['expectedValue'] = "bing-bot";
		//Google's Bots UA
		$this->robotsUA['google-image']['useragent'] = "Googlebot-Image/1.0";
		$this->robotsUA['google-mobile']['useragent'] = "(compatible; Googlebot-Mobile/2.1; +http://www.google.com/bot.html)";
		$this->robotsUA['google-news']['useragent'] = "Googlebot-News";
		$this->robotsUA['google-video']['useragent'] = "Googlebot-Video/1.0";
		$this->robotsUA['google-adsense-mobile']['useragent'] = "(compatible; Mediapartners-Google/2.1; +http://www.google.com/bot.html)";
		$this->robotsUA['google-adsense']['useragent'] = "Mediapartners-Google";
		$this->robotsUA['google-adsbot']['useragent'] = "AdsBot-Google (+http://www.google.com/adsbot.html)";
		$this->robotsUA['google-producer']['useragent'] = "GoogleProducer; (+http://goo.gl/7y4SX)";
		$this->robotsUA['google-site-verification']['useragent'] = "Google-Site-Verification/1.0";
		//Google test returns first a google-bot normal response...
		$this->robotsUA['google-test']['useragent'] = "Googlebot-Test ( http://www.googlebot.com/bot.html)";
		$this->robotsUA['google-feedfetcher']['useragent'] = "Feedfetcher-Google; (+http://www.google.com/feedfetcher.html; feed-id=)";
		$this->robotsUA['google-desktop']['useragent'] = "Mozilla/5.0 (compatible; Google Desktop/5.9.1005.12335; http://desktop.google.com/)";
		$this->robotsUA['google-translate']['useragent'] = "Mozilla/5.0 (iPad; CPU OS 5_0_1 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A405 Safari/7534.48.3,gzip(gfe) (via translate.google.com)";
		//Original UA : Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; GTB5; User-agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; http://bsalsa.com) ; .NET CLR 2.0.50727)
		// GTB5 = GoogleToolbar v5 for IE
		$this->robotsUA['google-toolbar']['useragent'] = "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; GoogleToolbar; User-agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; http://bsalsa.com) ; .NET CLR 2.0.50727)";
		$this->robotsUA['google-appengine']['useragent'] = "AppEngine-Google; (+http://application-name.appspot.com)";
		$this->robotsUA['google-bot']['useragent'] = "Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)";
		$this->robotsUA['google-unknown']['useragent'] = "Mozilla/5.0 (compatible; Google New-testing-unknown; http://some.url.com/)";
		$this->robotsUA['google-image']['expectedValue'] = "google-image";
		$this->robotsUA['google-mobile']['expectedValue'] = "google-mobile";
		$this->robotsUA['google-news']['expectedValue'] = "google-news";
		$this->robotsUA['google-video']['expectedValue'] = "google-video";
		$this->robotsUA['google-adsense-mobile']['expectedValue'] = "google-adsense-mobile";
		$this->robotsUA['google-adsense']['expectedValue'] = "google-adsense";
		$this->robotsUA['google-adsbot']['expectedValue'] = "google-adsbot";
		$this->robotsUA['google-producer']['expectedValue'] = "google-producer";
		$this->robotsUA['google-site-verification']['expectedValue'] = "google-site-verification";
		$this->robotsUA['google-test']['expectedValue'] = "google-test";
		$this->robotsUA['google-feedfetcher']['expectedValue'] = "google-feedfetcher";
		$this->robotsUA['google-desktop']['expectedValue'] = "google-desktop";
		$this->robotsUA['google-translate']['expectedValue'] = "google-translate";
		$this->robotsUA['google-toolbar']['expectedValue'] = "google-toolbar";
		$this->robotsUA['google-appengine']['expectedValue'] = "google-appengine";
		$this->robotsUA['google-bot']['expectedValue'] = "google-bot";
		$this->robotsUA['google-unknown']['expectedValue'] = "google-unknown";
		//Discobot's Bots UA
		$this->robotsUA['discobot-news']['useragent'] = "Mozilla/5.0 (compatible; discobot-news; +http://discoveryengine.com/discobot.html)";
		$this->robotsUA['discobot-bot']['useragent'] = "Mozilla/5.0 (compatible; discobot/2.0; +http://discoveryengine.com/discobot.html)";
		$this->robotsUA['discobot-news']['expectedValue'] = "discobot-news";
		$this->robotsUA['discobot-bot']['expectedValue'] = "discobot-bot";
		//Exabot's Bots UA
		$this->robotsUA['exabot-thumbnails']['useragent'] = "Mozilla/5.0 (compatible; Konqueror/3.5; Linux) KHTML/3.5.5 (like Gecko) (Exabot-Thumbnails)";
		$this->robotsUA['exabot']['useragent'] = "Mozilla/5.0 (compatible; Exabot/3.0; +http://www.exabot.com/go/robot)";
		$this->robotsUA['exabot-thumbnails']['expectedValue'] = "exabot-image";
		$this->robotsUA['exabot']['expectedValue'] = "exabot-bot";
		//Facebook's Bots UA
		$this->robotsUA['facebookexternalhit']['useragent'] = "facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)";
		$this->robotsUA['facebookexternalhit']['expectedValue'] = "facebook-externalhit";
		//Mail.ru's Bots UA
		$this->robotsUA['mail.ru']['useragent'] = "Mozilla/5.0 (compatible; Mail.RU/2.0)";
		$this->robotsUA['mail.ru']['expectedValue'] = "mailru-bot";
		//Seznam's Bots UA
		$this->robotsUA['SeznamBot']['useragent'] = "SeznamBot/3.0 (+http://fulltext.sblog.cz/)";
		$this->robotsUA['SeznamBot']['expectedValue'] = "seznam-bot";
		//Sogou's Bots UA
		$this->robotsUA['sogou-pic']['useragent'] = "Sogou Pic Spider/3.0(+http://www.sogou.com/docs/help/webmasters.htm#07)";
		$this->robotsUA['sogou-inst']['useragent'] = "Sogou inst spider/4.0(+http://www.sogou.com/docs/help/webmasters.htm#07)";
		$this->robotsUA['sogou']['useragent'] = "Sogou web spider/4.0(+http://www.sogou.com/docs/help/webmasters.htm#07)";
		$this->robotsUA['sogou-pic']['expectedValue'] = "sogou-image";
		$this->robotsUA['sogou-inst']['expectedValue'] = "sogou-instant";
		$this->robotsUA['sogou']['expectedValue'] = "sogou-spider";
		//Soso's Bots UA
		$this->robotsUA['sosoimagespider']['useragent'] = "Mozilla/5.0 (compatible; Sosoimagespider/2.0; +http://help.soso.com/soso-image-spider.htm)";
		$this->robotsUA['sosospider']['useragent'] = "Sosospider+(+http://help.soso.com/webspider.htm)";
		$this->robotsUA['sosoimagespider']['expectedValue'] = "soso-image";
		$this->robotsUA['sosospider']['expectedValue'] = "soso-spider";
		//Yahoo's Bots UA
		$this->robotsUA['yahoo-adcrawler']['useragent'] = "Mozilla/5.0 (compatible; Yahoo!-AdCrawler; http://help.yahoo.com/yahoo_adcrawler)";
		$this->robotsUA['yahooYSMcm']['useragent'] = "Mozilla/5.0 (YahooYSMcm/3.0.0; http://help.yahoo.com)";
		$this->robotsUA['yahoo-slurp']['useragent'] = "Mozilla/5.0 (compatible; Yahoo! Slurp/3.0; http://help.yahoo.com/help/us/ysearch/slurp)";
		$this->robotsUA['yahoo-pipes']['useragent'] = "Mozilla/5.0 (compatible; Yahoo Pipes 2.0; +http://developer.yahoo.com/yql/provider) Gecko/20090729 Firefox/3.5.2";
		///////////////////////////////////////////////////////////////////////////////////////////////////////// @TODO STEPH
		$this->robotsUA['yahoo-adcrawler']['expectedValue'] = "yahoo-ads";
		$this->robotsUA['yahooYSMcm']['expectedValue'] = "yahoo-search-marketing";
		$this->robotsUA['yahoo-slurp']['expectedValue'] = "yahoo-slurp";
		$this->robotsUA['yahoo-pipes']['expectedValue'] = "yahoo-pipes";
		//Yandex's Bots UA
		$this->robotsUA['yandex-antivirus']['useragent'] = "Mozilla/5.0 (compatible; YandexAntivirus/2.0; +http://yandex.com/bots)";
		$this->robotsUA['yandex-direct']['useragent'] = "Mozilla/5.0 (compatible; YandexDirect/3.0; +http://yandex.com/bots)";
		$this->robotsUA['yandex-blogs']['useragent'] = "Mozilla/5.0 (compatible; YandexBlogs/0.99; robot; B; +http://yandex.com/bots)";
		$this->robotsUA['yandex-metrika']['useragent'] = "Mozilla/5.0 (compatible; YandexMetrika/2.0; +http://yandex.com/bots)";
		$this->robotsUA['yandex-image-resizer']['useragent'] = "Mozilla/5.0 (compatible; YandexImageResizer/2.0; +http://yandex.com/bots)";
		$this->robotsUA['yandex-images']['useragent'] = "Mozilla/5.0 (compatible; YandexImages/3.0; +http://yandex.com/bots)";
		$this->robotsUA['yandex-bot']['useragent'] = "Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)";
		$this->robotsUA['yandex-antivirus']['expectedValue'] = "yandex-antivirus";
		$this->robotsUA['yandex-direct']['expectedValue'] = "yandex-direct";
		$this->robotsUA['yandex-blogs']['expectedValue'] = "yandex-blogs";
		$this->robotsUA['yandex-metrika']['expectedValue'] = "yandex-metrika";
		$this->robotsUA['yandex-image-resizer']['expectedValue'] = "yandex-imageresizer";
		$this->robotsUA['yandex-images']['expectedValue'] = "yandex-images";
		$this->robotsUA['yandex-bot']['expectedValue'] = "yandex-bot";

		$this->robotsUA['beebot-crawler']['useragent'] = "Bee4 - BeeBot/1.0";
		$this->robotsUA['beebot-crawler']['expectedValue'] = "beebot-crawler";

		$this->robotsUA['visitor']['useragent'] = "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36";
		$this->robotsUA['visitor']['expectedValue'] = "visitor";

		$this->robotsUA['emptybot']['useragent'] = "-";
		$this->robotsUA['emptybot']['expectedValue'] = "empty";

		$this->robotsUA['wordpress']['useragent'] = "WordPress/4.1.0";
		$this->robotsUA['wordpress']['expectedValue'] = "wordpress-bot";

		//TODO: Utiliser un dataProvider sur sample.log
	}

	public function testWhoIs()
	{
		foreach($this->robotsUA as $key => $robot){
			if($key != 'not-a-bot-UA'){
				$this->assertEquals(
					$robot['expectedValue'],
					Detector::whoIs($robot['useragent'])->getName()
				);
			}
		}
	}

	public function testBotButNotKnown()
	{
		$bot = Detector::whoIs('crawler4j (http://code.google.com/p/crawler4j/)');
		$this->assertInstanceOf('\Bee4\UserAgent\Classifier\Bots\BaseBot',$bot);

		$bot = Detector::whoIs('Opera\/9.80 (Windows NT 6.1; U; Edition Yandex; ru) Presto\/2.8.131 Version\/11.10');
		$this->assertInstanceOf('\Bee4\UserAgent\Classifier\Bots\EmptyBot',$bot);
	}
}
