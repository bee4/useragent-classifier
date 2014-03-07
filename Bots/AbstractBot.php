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
 * Class AbstractBot
 * Define a canvas to implement specific Bot details
 * @package BeeBot\Tools\Robot\Bots
 */
abstract class AbstractBot implements \JsonSerializable
{
	/**
	 * Specific bot name
	 * @var String
	 */
	private $name;

	/**
	 * AbstractBot constructor
	 */
	public function __construct()
	{}

	/**
	 * Set the name of current bot
	 * This name is a precise one (googlebot-image or googlebot)
	 *
	 * @param String $name
	 */
	protected function setName($name)
	{
		if( !is_string($name) )
			throw new InvalidArgumentException('Name given must be a string!!');

		$this->name = $name;
	}

	/**
	 * Name property accessor
	 * @return String
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Retrieve global bot name
	 * @return String
	 */
	public function getBot()
	{
		$parts = explode('\\', get_class($this));
		return strtolower(array_pop($parts));
	}

	/**
	 * Transform the bot to its JSON representation
	 * @return Array
	 */
	public function jsonSerialize()
	{
		return array(
			'bot' => $this->getBot(),
			'name' => $this->getName()
		);
	}
}