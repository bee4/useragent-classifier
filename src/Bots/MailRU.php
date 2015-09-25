<?php

namespace Bee4\UserAgent\Classifier\Bots;

use InvalidArgumentException;

/**
 * Class MailRU
 * Detect if a visit is a Mail.ru one
 * @package Bee4\UserAgent\Classifier\Bots
 */
class MailRU extends AbstractTaggedBot
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
