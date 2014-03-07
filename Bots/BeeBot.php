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
 * BeeBot bot :)
 * Detect if a visit is a BeeBot one
 * @package BeeBot\Tools\Robot\Bots
 */
class BeeBot extends AbstractBot
{
	/**
	 * Bee4 bot constructor
	 *
	 * @param String $useragent The useragent used for detection
	 */
	public function __construct($useragent)
	{
		parent::__construct();

		/**
		Bee4 - BeeBot/1.0
		 */
		if (substr($useragent,0,7) == 'Bee4 - ')
			$this->setName('beebot-crawler');
		else
			throw new InvalidArgumentException('UserAgent given is not a valid BeeBot one: ' . $useragent);
	}
}