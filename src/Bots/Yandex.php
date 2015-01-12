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
use InvalidArgumentException;

/**
 * Detect if a visit is a yandex one
 * @package Bee4\UserAgentClassify\Bots
 */
class Yandex extends AbstractBot
{
	/**
	 * Yandex bot constructor
	 *
	 * @param string $useragent The useragent used for detection
	 * @throws NotAKnownBotException
	 * @throws InvalidArgumentException
	 */
	public function __construct($useragent)
	{
		//YandexBot (search bot): http://www.botopedia.org/user-agent-list/search-bots/yandex-bot.html
		//List of UA: http://user-agent-string.info/list-of-ua/bot-detail?bot=YandexBot
		//Yandex Bot reference: http://help.yandex.com/search/robots/user-agent.xml

		/**
		Mozilla/5.0 (compatible; YandexImages/3.0; +http://yandex.com/bots)
		Mozilla/5.0 (compatible; YandexAntivirus/2.0; +http://yandex.com/bots)
		Mozilla/5.0 (compatible; YandexDirect/3.0; +http://yandex.com/bots)
		Mozilla/5.0 (compatible; YandexBlogs/0.99; robot; B; +http://yandex.com/bots)
		Mozilla/5.0 (compatible; YandexMetrika/2.0; +http://yandex.com/bots)
		Mozilla/5.0 (compatible; YandexImageResizer/2.0; +http://yandex.com/bots)
		Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)
		Mozilla/5.0 (compatible; YandexBlogs/0.99; robot; B; +http://yandex.com/bots)
		Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0) Yandex.Translate
		 */


		if (preg_match('/^Mozilla\/5\.0 \(compatible; Yandex([A-Za-z]+)\/.*$/', $useragent, $matches)) {
			$this->setName('yandex-'.strtolower($matches[1]));
			switch(strtolower($matches[1])) {
				case 'blogs':
				case 'metrika':
				case 'bot':
					$this->addTags(['search']);
					break;
				case 'antivirus':
					$this->addTags(['search','antivirus']);
					break;
				case 'direct':
					$this->addTags(['search','publicity']);
					break;
				case 'images':
					$this->addTags(['search','image']);
					break;
				case 'imageresizer':
					$this->addTags(['search','image','tool']);
					break;
			}
		} elseif (strpos($useragent, 'Yandex.Translate') !== false) {
			$this->setName('yandex-translate');
			$this->addTags(['translate']);
		} elseif ( strpos($useragent, 'Yandex Browser') !== false || strpos($useragent, 'Edition Yandex') !== false ) {
			throw new NotAKnownBotException($useragent);
		} else {
			throw new InvalidArgumentException('UserAgent given is not a valid Yandex one: ' . $useragent);
		}
	}
}