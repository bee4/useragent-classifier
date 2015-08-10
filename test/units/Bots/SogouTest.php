<?php

namespace Test\Bee4\UserAgent\Classifier\Bots;

use Bee4\UserAgent\Classifier\Bots\Sogou;

/**
 * Class SogouTest
 * @package Test\Bee4\UserAgent\Classifier\Bots
 */
class SogouTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testInvalidUA()
	{
		new Sogou('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36');
	}

	public function testSogouBot()
	{
		$bot = new Sogou('Sogou Pic Spider/3.0(+http://www.sogou.com/docs/help/webmasters.htm#07)');
		$this->assertEquals('sogou-image', $bot->getName());
		$this->assertEquals(['search','image'], $bot->getTags());

		$bot = new Sogou('Sogou inst spider/4.0(+http://www.sogou.com/docs/help/webmasters.htm#07"');
		$this->assertEquals('sogou-instant', $bot->getName());
		$this->assertEquals(['search'], $bot->getTags());

		$bot = new Sogou('Sogou web spider/4.0(+http://www.sogou.com/docs/help/webmasters.htm#07)');
		$this->assertEquals('sogou-spider', $bot->getName());
		$this->assertEquals(['search'], $bot->getTags());
	}
}
