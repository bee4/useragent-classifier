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
 * Class Sogou
 * Detect if a visit is a Sogou one
 * @package BeeBot\Tools\Robot\Bots
 */
class Sogou extends AbstractBot
{
	/**
	 * Soso bot constructor
	 *
	 * @param String $useragent The useragent used for detection
	 */
	public function __construct($useragent)
	{
		parent::__construct();

		//Sogou spider (search bot): http://www.botopedia.org/user-agent-list/search-bots/sogou-spider.html
		/**
		Sogou web spider/4.0(+http://www.sogou.com/docs/help/webmasters.htm#07)
		Sogou inst spider/4.0(+http://www.sogou.com/docs/help/webmasters.htm#07)
		Sogou Pic Spider/3.0(+http://www.sogou.com/docs/help/webmasters.htm#07)
		New-Sogou-Spider/1.0 (compatible; MSIE 5.5; Windows 98)
		Sogou inst spider/4.0(+http://www.sogou.com/docs/help/webmasters.htm#07"
		 */
		if (strpos($useragent, 'Sogou Pic') !== false)
			$this->setName('sogou-image');
		elseif (strpos($useragent, 'Sogou inst') !== false)
			$this->setName('sogou-instant');
		elseif (strpos(strtolower($useragent), 'sogou') !== false)
			$this->setName('sogou-spider');
		else
			throw new InvalidArgumentException('UserAgent given is not a valid Sogou one: ' . $useragent);
	}
}