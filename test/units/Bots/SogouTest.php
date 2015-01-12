<?php
/**
 * This file is part of the beebot package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Bee4 2013
 * @author    Stephane HULARD <s.hulard@chstudio.fr>
 * @author    Ivo GEORGIEV <ivokgeorgiev@gmail.com>
 * @package   Test\BeeBot\Tools\Robot\Bots
 */
namespace Test\BeeBot\Tools\Robot\Bots;

use BeeBot\Tools\Robot\Bots\Sogou;

/**
 * Class SogouTest
 * @package Test\BeeBot\Tools\Robot\Bots
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
		$bot = new Sogou('Sogou inst spider/4.0(+http://www.sogou.com/docs/help/webmasters.htm#07"');
		$this->assertEquals('sogou-instant', $bot->getName());
		$bot = new Sogou('Sogou web spider/4.0(+http://www.sogou.com/docs/help/webmasters.htm#07)');
		$this->assertEquals('sogou-spider', $bot->getName());
	}
}
