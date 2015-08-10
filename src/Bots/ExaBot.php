<?php

namespace Bee4\UserAgent\Classifier\Bots;

use InvalidArgumentException;

/**
 * Class ExaBot
 * Detect if a visit is an ExaBot one
 * @package Bee4\UserAgent\Classifier\Bots
 */
class ExaBot extends AbstractBot
{
    /**
     * ExaBot bot constructor
     * @param string $useragent The useragent used for detection
     * @throws InvalidArgumentException
     */
    public function __construct($useragent)
    {
        //ExaBot (crawler): http://www.botopedia.org/user-agent-list/crawlers/item/336.html
        /**
         * Mozilla/5.0 (compatible; Konqueror/3.5; Linux) KHTML/3.5.5 (like Gecko) (Exabot-Thumbnails)
         * Mozilla/5.0 (compatible; Exabot/3.0; +http://www.exabot.com/go/robot)
         */
        if (strpos($useragent, 'Exabot-Thumbnails') !== false) {
            $this->setName('exabot-image');
            $this->addTags(['search','image']);
        } elseif (strpos($useragent, 'Exabot') !== false) {
            $this->setName('exabot-bot');
            $this->addTags(['search']);
        } else {
            throw new InvalidArgumentException('UserAgent given is not a valid Exabot one: ' . $useragent);
        }
    }
}
