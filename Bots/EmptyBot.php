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
 * Define an EmptyBot used when no bot is returned
 * @package BeeBot\Tools\Robot\Bots
 */
class EmptyBot extends AbstractBot
{
	/**
	 * EmptyBot bot constructor
	 *
	 * @param String $useragent The useragent used for detection
	 */
	public function __construct()
	{
		parent::__construct();
		$this->setName('');
	}
}