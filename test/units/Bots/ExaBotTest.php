<?php

namespace Test\Bee4\UserAgent\Classifier\Bots;

use Bee4\UserAgent\Classifier\Bots\ExaBot;

/**
 * Class ExaBotTest
 * @package Test\Bee4\UserAgent\Classifier\Bots
 */
class ExaBotTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testInvalidUA()
	{
		new ExaBot('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36');
	}

	public function testDetection()
	{
		$bot = new ExaBot('Mozilla/5.0 (compatible; Konqueror/3.5; Linux) KHTML/3.5.5 (like Gecko) (Exabot-Thumbnails)');
		$this->assertEquals('exabot-image', $bot->getName());
		$this->assertEquals(['search','image'], $bot->getTags());

	  $bot = new ExaBot('Mozilla/5.0 (compatible; Exabot/3.0; +http://www.exabot.com/go/robot)');
	  $this->assertEquals('exabot-bot', $bot->getName());
	  $this->assertEquals(['search'], $bot->getTags());
	}
}
