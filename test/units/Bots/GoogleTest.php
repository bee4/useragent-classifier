<?php
/**
 * This file is part of the beebot package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Bee4 2013
 * @author    Stephane HULARD <s.hulard@chstudio.fr>
 * @author    Ivo GEORGIEV <ivokgeorgiev@gmail.com>
 * @package   Test\Bee4\UserAgentClassify\Bots
 */
namespace Test\Bee4\UserAgentClassify\Bots;

use Bee4\UserAgentClassify\Bots\Google;

/**
 * Class GoogleTest
 * @package Test\Bee4\UserAgentClassify\Bots
 */
class GoogleTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testInvalidUA()
	{
		$bot = new Google('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36');
	}

	public function testGoogleBot()
	{
		$bot = new Google('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)');
		$this->assertEquals('google-bot', $bot->getName());
		$this->assertEquals(['search'], $bot->getTags());

		$bot = new Google('Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; GoogleToolbar; User-agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; http://bsalsa.com) ; .NET CLR 2.0.50727)');
		$this->assertEquals('google-toolbar', $bot->getName());
		$this->assertEquals(['tool','collect'], $bot->getTags());

		$bot = new Google('Googlebot-Image/1.0');
		$this->assertEquals('google-image', $bot->getName());
		$this->assertEquals(['search','image'], $bot->getTags());

		$bot = new Google('(compatible; Googlebot-Mobile/2.1; +http://www.google.com/bot.html)');
		$this->assertEquals('google-mobile', $bot->getName());
		$this->assertEquals(['search','mobile'], $bot->getTags());

		$bot = new Google('Googlebot-News');
		$this->assertEquals('google-news', $bot->getName());
		$this->assertEquals(['search','news'], $bot->getTags());

		$bot = new Google('Googlebot-Video/1.0');
		$this->assertEquals('google-video', $bot->getName());
		$this->assertEquals(['search','video'], $bot->getTags());

		$bot = new Google('AppEngine-Google; (+http://application-name.appspot.com)');
		$this->assertEquals('google-appengine', $bot->getName());
		$this->assertEquals(['cloud'], $bot->getTags());

		$bot = new Google('(compatible; Mediapartners-Google/2.1; +http://www.google.com/bot.html)');
		$this->assertEquals('google-adsense-mobile', $bot->getName());
		$this->assertEquals(['search','publicity','mobile'], $bot->getTags());

		$bot = new Google('Mediapartners-Google');
		$this->assertEquals('google-adsense', $bot->getName());
		$this->assertEquals(['search','publicity'], $bot->getTags());

		$bot = new Google('AdsBot-Google (+http://www.google.com/adsbot.html)');
		$this->assertEquals('google-adsbot', $bot->getName());
		$this->assertEquals(['search','publicity'], $bot->getTags());

		$bot = new Google('GoogleProducer; (+http://goo.gl/7y4SX)');
		$this->assertEquals('google-producer', $bot->getName());
		$this->assertEquals(null, $bot->getTags());

		$bot = new Google('Google-Site-Verification/1.0');
		$this->assertEquals('google-site-verification', $bot->getName());
		$this->assertEquals(['tool'], $bot->getTags());

		$bot = new Google('Feedfetcher-Google; (+http://www.google.com/feedfetcher.html; feed-id=)');
		$this->assertEquals('google-feedfetcher', $bot->getName());
		$this->assertEquals(['feed'], $bot->getTags());

		$bot = new Google('Mozilla/5.0 (compatible; Google Desktop/5.9.1005.12335; http://desktop.google.com/)');
		$this->assertEquals('google-desktop', $bot->getName());
		$this->assertEquals(['search'], $bot->getTags());

		$bot = new Google('Mozilla/5.0 (iPad; CPU OS 5_0_1 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A405 Safari/7534.48.3,gzip(gfe) (via translate.google.com)');
		$this->assertEquals('google-translate', $bot->getName());
		$this->assertEquals(['translate'], $bot->getTags());

		$bot = new Google('Googlebot-Test ( http://www.googlebot.com/bot.html)');
		$this->assertEquals('google-test', $bot->getName());

		$bot = new Google('Mozilla/5.0 (compatible; Google New-Beebot-testing-unknown; http://some.url.com/)');
		$this->assertEquals('google-unknown', $bot->getName());
	}
}
