<?php
/**
 * This file is part of the beebot package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Bee4 2013
 * @author    Stephane HULARD <s.hulard@chstudio.fr>
 * @package   BeeBot\Tools\Robot\Bots
 */

namespace BeeBot\Tools\Robot\Bots;

use BeeBot\Exception\Native\InvalidArgumentException;

/**
 * Class ExaBot
 * Detect if a visit is an ExaBot one
 * @package BeeBot\Tools\Robot\Bots
 */
class ExaBot extends AbstractBot
{
	/**
	 * ExaBot bot constructor
	 *
	 * @param String $useragent The useragent used for detection
	 */
	public function __construct($useragent)
	{
		parent::__construct();

		//ExaBot (crawler): http://www.botopedia.org/user-agent-list/crawlers/item/336.html
		/**
		Mozilla/5.0 (compatible; Konqueror/3.5; Linux) KHTML/3.5.5 (like Gecko) (Exabot-Thumbnails)
		Mozilla/5.0 (compatible; Exabot/3.0; +http://www.exabot.com/go/robot)
		 */
		if (strpos($useragent, 'Exabot-Thumbnails') !== false)
			$this->setName('exabot-image');
		elseif (strpos($useragent, 'Exabot') !== false)
			$this->setName('exabot-bot');
		else
			throw new InvalidArgumentException('UserAgent given is not a valid Exabot one: ' . $useragent);
	}
}