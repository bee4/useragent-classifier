<?php

namespace Test\Bee4\UserAgent\Classifier\Bots;

use Bee4\UserAgent\Classifier\Bots\EmptyBot;

/**
 * Class EmptyBotTest
 * @package Test\Bee4\UserAgent\Classifier\Bots
 */
class EmptyBotTest extends \PHPUnit_Framework_TestCase
{
	public function testBot()
	{
		$bot = new EmptyBot();
		$this->assertEquals('empty', $bot->getName());
		$this->assertEquals('emptybot', $bot->getBot());
	}
}
