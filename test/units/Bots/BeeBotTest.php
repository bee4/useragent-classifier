<?php

namespace Test\Bee4\UserAgent\Classifier\Bots;

use Bee4\UserAgent\Classifier\Bots\BeeBot;

/**
 * Class BeeBotTest
 * @package Test\Bee4\UserAgent\Classifier\Bots
 */
class BeeBotTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testInvalidBot()
	{
		new BeeBot('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36');
	}

	public function testDetection()
	{
		$bot = new BeeBot('Bee4 - BeeBot/1.0');
		$this->assertEquals('beebot-crawler', $bot->getName());
	}
}
