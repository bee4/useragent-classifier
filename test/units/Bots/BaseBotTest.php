<?php

namespace Test\Bee4\UserAgent\Classifier\Bots;

use Bee4\UserAgent\Classifier\Bots\BaseBot;

/**
 * Class BaseBotTest
 * @package Test\Bee4\UserAgent\Classifier\Bots
 */
class BaseBotTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var BaseBot
	 */
	protected $object;

	/**
	 * @expectedException Bee4\UserAgent\Classifier\NotAKnownBotException
	 */
	public function testInvalidBotUA()
	{
		new BaseBot('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36');
	}

	public function testDetection()
	{
		$bot = new BaseBot('Mozilla\/5.0 (X11; U; Linux x86_64; en-US; rv:1.9.0.19; aggregator:Spinn3r (Spinn3r 3.1); http:\/\/spinn3r.com\/robot) Gecko\/2010040121 Firefox\/3.0.19');
		$this->assertEquals('base-bot', $bot->getName());
		$bot = new BaseBot('magpie-crawler\/1.1 (U; Linux amd64; en-GB; +http:\/\/www.brandwatch.net)');
		$this->assertEquals('base-crawler', $bot->getName());
		$bot = new BaseBot('Mozilla\/5.0 (compatible; YYSpider; +http:\/\/www.yunyun.com\/spider.html)');
		$this->assertEquals('base-spider', $bot->getName());
	}
}
