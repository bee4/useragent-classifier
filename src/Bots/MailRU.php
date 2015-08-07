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

use InvalidArgumentException;

/**
 * Class MailRU
 * Detect if a visit is a Mail.ru one
 * @package Bee4\UserAgentClassify\Bots
 */
class MailRU extends AbstractBot
{
    /**
     * MailRU bot constructor
     * @param string $useragent The useragent used for detection
     * @throws InvalidArgumentException
     */
    public function __construct($useragent)
    {
        //Mail.RU bot (search bot): http://www.botopedia.org/user-agent-list/search-bots/mailru-bot.html
        /**
         * Mozilla/5.0 (compatible; Mail.RU/2.0)
         */
        if (strpos($useragent, 'Mail.RU') !== false) {
            $this->setName('mailru-bot');
            $this->addTags(['search']);
        } else {
            throw new InvalidArgumentException('UserAgent given is not a valid Mail.RU one: ' . $useragent);
        }
    }
}
