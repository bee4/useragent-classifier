<?php
/**
 * This file is part of the beebot package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Bee4 2013
 * @author    Stephane HULARD <s.hulard@chstudio.fr>
 * @package   Bee4\UserAgentClassify\Bots
 */

namespace Bee4\UserAgentClassify\Bots;

use Bee4\UserAgentClassify\NotAKnownBotException;

/**
 * The basic bot detector which can track unknown bots which came with a useragent specifically defined as a bot/spider/crawler
 * @package Bee4\UserAgentClassify\Bots
 */
class BaseBot extends AbstractBot
{
	/**
	 * BaseBot constructor
	 * @param String $useragent The useragent used for detection
	 * @throws NotAKnownBotException
	 */
	public function __construct($useragent)
	{
		$lower = strtolower($useragent);
		if (strpos($lower, 'bot') !== false) {
			$this->setName('base-bot');
		} elseif (strpos($lower, 'crawler') !== false) {
			$this->setName('base-crawler');
		} elseif (strpos($lower, 'spider') !== false) {
			$this->setName('base-spider');
		} else {
			throw new NotAKnownBotException('UserAgent given is not a valid Bot one: ' . $useragent);
		}
	}
}
