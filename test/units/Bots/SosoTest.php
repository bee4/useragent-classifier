<?php

namespace Test\Bee4\UserAgent\Classifier\Bots;

use Bee4\UserAgent\Classifier\Bots\Soso;

/**
 * Class SosoTest
 * @package Test\Bee4\UserAgent\Classifier\Bots
 */
class SosoTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testInvalidUA()
	{
		new Soso('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36');
	}

	public function testSosoSpider()
	{
		$bot = new Soso('Sosospider+(+http://help.soso.com/webspider.htm)');
		$this->assertEquals('soso-spider', $bot->getName());
		$this->assertEquals(['search'], $bot->getTags());

		$bot = new Soso('Mozilla/5.0 (compatible; Sosoimagespider/2.0; +http://help.soso.com/soso-image-spider.htm)');
		$this->assertEquals('soso-image', $bot->getName());
		$this->assertEquals(['search','image'], $bot->getTags());
	}
}
