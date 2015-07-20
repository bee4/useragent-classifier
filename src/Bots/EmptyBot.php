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

/**
 * Define an EmptyBot used when no bot is returned
 * @package Bee4\UserAgentClassify\Bots
 */
class EmptyBot extends AbstractBot
{
	/**
	 * EmptyBot bot constructor
	 */
	public function __construct()
	{
		$this->setName('');
	}
}
