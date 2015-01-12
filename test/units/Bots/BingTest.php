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

use Bee4\UserAgentClassify\Bots\Bing;

/**
 * Class BingTest
 * @package Test\Bee4\UserAgentClassify\Bots
 */
class BingTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testInvalidUA()
	{
		new Bing('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36');
	}

	public function testDetection()
	{
		$bot = new Bing('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534+ (KHTML, like Gecko) BingPreview/1.0b');
		$this->assertEquals('bing-bot', $bot->getName());
		$bot = new Bing('Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)');
		$this->assertEquals('bing-bot', $bot->getName());

		$bot = new Bing('msnbot-UDiscovery/2.0b (+http://search.msn.com/msnbot.htm)');
		$this->assertEquals('bing-msn', $bot->getName());
		$bot = new Bing('msnbot/2.0b (+http://search.msn.com/msnbot.htm)');
		$this->assertEquals('bing-msn', $bot->getName());

		$bot = new Bing('msnbot-media/1.1 (+http://search.msn.com/msnbot.htm)');
		$this->assertEquals('bing-msn-media', $bot->getName());

		$bot = new Bing('adidxbot/1.1 (+http://search.msn.com/msnbot.htm)');
		$this->assertEquals('bing-adcenter', $bot->getName());
		$bot = new Bing('adidxbot/2.0 (+http://search.msn.com/msnbot.htm)');
		$this->assertEquals('bing-adcenter', $bot->getName());
	}
}
