<?php

namespace Bee4\UserAgent\Classifier\Bots;

use InvalidArgumentException;

/**
 * Class Alexa
 * Detect if a visit is an Alexa one
 * @package Bee4\UserAgent\Classifier\Bots
 */
class Alexa extends AbstractTaggedBot
{
    /**
     * Alexa bot constructor
     *
     * @param String $useragent The useragent used for detection
     * @throws InvalidArgumentException
     */
    public function __construct($useragent)
    {
        //Alexa Crawler (search bot): http://www.botopedia.org/user-agent-list/search-bots/alexa-crawler.html
        /**
         * ia_archiver (+http://www.alexa.com/site/help/webmasters; crawler@alexa.com)
         * Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; AlexaToolbar/amzni-3.0; GTB7.5; AskTbORJ/5.15.23.36191; .NET4.0C; .NET4.0E; AlexaToolbar/amzni-3.0; .NET CLR 2.0.50727; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729; MSIECrawler)
         */
        if (strpos($useragent, 'ia_archiver') !== false) {
            $this->setName('alexa-crawler');
            $this->addTags(['search']);
        } elseif (strpos($useragent, 'AlexaToolbar') !== false || strpos($useragent, 'Alexa Toolbar') !== false) {
            $this->setName('alexa-toolbar');
            $this->addTags(['tool','collect']);
        } else {
            throw new InvalidArgumentException('UserAgent given is not a valid Alexa one: ' . $useragent);
        }
    }
}
