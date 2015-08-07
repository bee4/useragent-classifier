<?php
/**
 * This file is part of the beebot package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Bee4 2013
 * @author    Stephane HULARD <s.hulard@chstudio.fr>
 * @author    Ivo GEORGIEV <ivokgeorgiev@gmail.com>
 * @package   Test\Bee4\UserAgent\Classifier\Bots
 */
namespace Test\Bee4\UserAgent\Classifier\Bots;

use Bee4\UserAgent\Classifier\Bots\Facebook;

/**
 * Class FacebookTest
 * @package Test\Bee4\UserAgent\Classifier\Bots
 */
class FacebookTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testInvalidUA()
	{
		new Facebook('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36');
	}

	public function testDetection()
	{
		$bot = new Facebook('facebookexternalhit/1.0 (+http://www.facebook.com/externalhit_uatext.php)');
		$this->assertEquals('facebook-externalhit', $bot->getName());
		$bot = new Facebook('facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)');
		$this->assertEquals('facebook-externalhit', $bot->getName());
		$this->assertEquals(['social','agent'], $bot->getTags());
	}
}
