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

use Bee4\UserAgentClassify\Bots\WordPress;

/**
 * Class WordPressTest
 * @package Test\Bee4\UserAgentClassify\Bots
 */
class WordPressTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testException()
	{
		new WordPress('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36');
	}

	public function testWordPressBot()
	{
		$bot = new WordPress('WordPress/4.1.0');
		$this->assertEquals('wordpress-bot', $bot->getName());
		$this->assertEquals(['agent'], $bot->getTags());
	}
}
