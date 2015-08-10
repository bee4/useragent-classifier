<?php

namespace Bee4\UserAgent\Classifier\Bots;

use InvalidArgumentException;

/**
 * BeeBot bot :)
 * Detect if a visit is a BeeBot one
 * @package Bee4\UserAgent\Classifier\Bots
 */
class BeeBot extends AbstractBot
{
    /**
     * Bee4 bot constructor
     * @param String $useragent The useragent used for detection
     * @throws InvalidArgumentException
     */
    public function __construct($useragent)
    {
        /**
         * Bee4 - BeeBot/1.0
         */
        if (substr($useragent, 0, 7) == 'Bee4 - ') {
            $this->setName('beebot-crawler');
        } else {
            throw new InvalidArgumentException('UserAgent given is not a valid BeeBot one: ' . $useragent);
        }
    }
}
