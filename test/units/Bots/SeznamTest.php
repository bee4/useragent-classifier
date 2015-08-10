<?php

namespace Test\Bee4\UserAgent\Classifier\Bots;

use Bee4\UserAgent\Classifier\Bots\Seznam;

/**
 * Class SeznamTest
 * @package Test\Bee4\UserAgent\Classifier\Bots
 */
class SeznamTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testInvalidUA()
	{
		new Seznam('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36');
	}

	public function testDetection()
	{
		$bot = new Seznam('SeznamBot/3.0 (+http://fulltext.sblog.cz/)');
		$this->assertEquals('seznam-bot', $bot->getName());
		$this->assertEquals(['search'], $bot->getTags());
	}
}
