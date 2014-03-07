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
 * Class Soso
 * Detect if a visit is a Soso one
 * @package BeeBot\Tools\Robot\Bots
 */
class Soso extends AbstractBot
{
	/**
	 * Soso bot constructor
	 *
	 * @param String $useragent The useragent used for detection
	 */
	public function __construct($useragent)
	{
		parent::__construct();

		//Soso spider (search bot): http://www.botopedia.org/user-agent-list/search-bots/soso-spider.html
		/**
		Sosospider+(+http://help.soso.com/webspider.htm)
		Mozilla/5.0 (compatible; Sosoimagespider/2.0; +http://help.soso.com/soso-image-spider.htm)
		 */
		if (strpos($useragent, 'Sosoimagespider') !== false)
			$this->setName('soso-image');
		elseif (strpos($useragent, 'Sosospider') !== false)
			$this->setName('soso-spider');
		else
			throw new InvalidArgumentException('UserAgent given is not a valid Soso one: ' . $useragent);
	}
}