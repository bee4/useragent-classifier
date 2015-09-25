<?php

namespace Test\Bee4\UserAgent\Classifier\Bots;

use Bee4\UserAgent\Classifier\Bots\Visitor;

/**
 * Class VisitorTest
 * @package Test\Bee4\UserAgent\Classifier\Bots
 */
class VisitorTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testInvalidUA()
	{
		new Visitor('Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)');
	}

	public function testVisitor()
	{
		$bot = new Visitor('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36');
		$this->assertEquals('visitor', $bot->getName());
	}
}
