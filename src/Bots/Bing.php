<?php
/**
 * This file is part of the beebot package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Bee4 2013
 * @author    Stephane HULARD <s.hulard@chstudio.fr>
 * @package   Bee4\UserAgent\Classifier\Bots
 */

namespace Bee4\UserAgent\Classifier\Bots;

use InvalidArgumentException;

/**
 * Class Bing
 * Detect if a visit is a Bing one
 * @package Bee4\UserAgent\Classifier\Bots
 */
class Bing extends AbstractBot
{
    /**
     * Bing bot constructor
     * @param string $useragent The useragent used for detection
     * @throws InvalidArgumentException
     */
    public function __construct($useragent)
    {
        //BingBot (search bot):
        //  http://www.botopedia.org/user-agent-list/search-bots/bingbot.html
        //AdidxBot (crawler):
        //  http://www.botopedia.org/user-agent-list/crawlers/item/343.html,
        //  http://user-agent-string.info/list-of-ua/bot-detail?bot=adidxbot
        /**
         * Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534+ (KHTML, like Gecko) BingPreview/1.0b
         * msnbot-UDiscovery/2.0b (+http://search.msn.com/msnbot.htm)
         * msnbot/2.0b (+http://search.msn.com/msnbot.htm)
         * msnbot-media/1.1 (+http://search.msn.com/msnbot.htm)
         * Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)
         *
         * adidxbot/1.1 (+http://search.msn.com/msnbot.htm)
         * adidxbot/2.0 (+http://search.msn.com/msnbot.htm)
         */
        if (strpos($useragent, 'msnbot-media') !== false) {
            $this->setName('bing-msn-media');
            $this->addTags(['search']);
        } elseif (strpos($useragent, 'adidxbot') !== false) {
            $this->setName('bing-adcenter');
            $this->addTags(['search','publicity']);
        } elseif (strpos($useragent, 'msnbot') !== false) {
            $this->setName('bing-msn');
            $this->addTags(['search']);
        } elseif (strpos(strtolower($useragent), 'bing') !== false) {
            $this->setName('bing-bot');
            $this->addTags(['search']);
        } else {
            throw new InvalidArgumentException(
                'UserAgent given is not a valid Bing one: ' . $useragent
            );
        }
    }
}
