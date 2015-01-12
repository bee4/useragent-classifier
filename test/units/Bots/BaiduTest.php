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

use Bee4\UserAgentClassify\Bots\Baidu;

/**
 * Class BaiduTest
 * @package Test\Bee4\UserAgentClassify\Bots
 */
class BaiduTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testException()
	{
		new Baidu('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36');
	}

	public function testBaiduSpider()
	{
		$bot = new Baidu('Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search');
		$this->assertEquals('baidu-spider', $bot->getName());
		$bot = new Baidu('Mozilla/5.0 (Linux;u;Android 2.3.7;zh-cn;) AppleWebKit/533.1 (KHTML,like Gecko) Version/4.0 Mobile Safari/533.1 (compatible; +http://www.baidu.com/search/spider.html)');
		$this->assertEquals('baidu-spider', $bot->getName());
		$this->assertEquals(['search'], $bot->getTags());

		$bot = new Baidu('Baiduspider-image+(+http://www.baidu.com/search/spider.htm)');
		$this->assertEquals('baidu-image', $bot->getName());
		$this->assertEquals(['search','image'], $bot->getTags());

		$bot = new Baidu('Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; BaiduGame)');
		$this->assertEquals('baidu-game', $bot->getName());
		$this->assertEquals(['search','game'], $bot->getTags());
	}
}
