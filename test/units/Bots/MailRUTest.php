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

use Bee4\UserAgent\Classifier\Bots\MailRU;

/**
 * Class MailRUTest
 * @package Test\Bee4\UserAgent\Classifier\Bots
 */
class MailRUTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testException()
	{
		new MailRU('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36');
	}

	public function testMailRUBot()
	{
		$bot = new MailRU('Mail.RU bot (search bot): http://www.botopedia.org/user-agent-list/search-bots/mailru-bot.html');
		$this->assertEquals('mailru-bot', $bot->getName());
		$this->assertEquals(['search'], $bot->getTags());
	}
}
