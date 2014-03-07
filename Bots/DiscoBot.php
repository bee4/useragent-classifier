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
 * Class DiscoBot
 * Detect if a visit is a DiscoBot one
 * @package BeeBot\Tools\Robot\Bots
 */
class DiscoBot extends AbstractBot
{
	/**
	 * DiscoBot bot constructor
	 *
	 * @param String $useragent The useragent used for detection
	 */
	public function __construct($useragent)
	{
		parent::__construct();

		//DiscoBot bot (search bot): http://www.botopedia.org/user-agent-list/search-bots/discobot.html
		/**
		Mozilla/5.0 (compatible; discobot-news; +http://discoveryengine.com/discobot.html)
		Mozilla/5.0 (compatible; discobot/2.0; +http://discoveryengine.com/discobot.html)
		 */
		if (strpos($useragent, 'discobot-news') !== false)
			$this->setName('discobot-news');
		elseif (strpos($useragent, 'discobot') !== false)
			$this->setName('discobot-bot');
		else
			throw new InvalidArgumentException('UserAgent given is not a valid DiscoBot one: ' . $useragent);
	}
}
