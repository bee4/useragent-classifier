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

use Bee4\UserAgentClassify\Bots\EmptyBot;

/**
 * Class EmptyBotTest
 * @package Test\Bee4\UserAgentClassify\Bots
 */
class EmptyBotTest extends \PHPUnit_Framework_TestCase
{
	public function testBot()
	{
		$bot = new EmptyBot();
		$this->assertEquals('', $bot->getName());
		$this->assertEquals('emptybot', $bot->getBot());
	}
}
