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

use BeeBot\Tools\Robot\Bots\DiscoBot;

/**
 * Class DiscobotTest
 * @package Test\BeeBot\Tools\Robot\Bots
 */
class DiscoBotTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testInvalidUA()
	{
		new DiscoBot('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36');
	}

	public function testDetection()
	{
		$bot = new DiscoBot('Mozilla/5.0 (compatible; discobot-news; +http://discoveryengine.com/discobot.html)');
		$this->assertEquals('discobot-news', $bot->getName());
		$bot = new DiscoBot('Mozilla/5.0 (compatible; discobot/2.0; +http://discoveryengine.com/discobot.html)');
		$this->assertEquals('discobot-bot', $bot->getName());
	}
}
