<?php

namespace Bee4\UserAgent\Classifier\Bots;

use Bee4\UserAgent\Classifier\NotAKnownBotException;

/**
 * The basic bot detector which can track unknown bots which came with a useragent specifically defined as a bot/spider/crawler
 * @package Bee4\UserAgent\Classifier\Bots
 */
class BaseBot extends AbstractBot
{
    /**
     * BaseBot constructor
     * @param String $useragent The useragent used for detection
     * @throws NotAKnownBotException
     */
    public function __construct($useragent)
    {
        $lower = strtolower($useragent);
        if( preg_match('/^crawler4j/', $useragent) === 1 ) {
            $this->setName('crawler4j');
        } elseif( preg_match('/^scrapy/', $useragent) === 1 ) {
            $this->setName('scrapy');
        } elseif (strpos($lower, 'bot') !== false) {
            $this->setName('base-bot');
        } elseif (strpos($lower, 'crawler') !== false) {
            $this->setName('base-crawler');
        } elseif (strpos($lower, 'spider') !== false) {
            $this->setName('base-spider');
        } else {
            throw new NotAKnownBotException('UserAgent given is not a valid Bot one: ' . $useragent);
        }
    }
}
