<?php

namespace Bee4\UserAgent\Classifier\Bots;

use InvalidArgumentException;

/**
 * Class Soso
 * Detect if a visit is a Soso one
 * @package Bee4\UserAgent\Classifier\Bots
 */
class Soso extends AbstractTaggedBot
{
    /**
     * Soso bot constructor
     * @param string $useragent The useragent used for detection
     */
    public function __construct($useragent)
    {
        //Soso spider (search bot): http://www.botopedia.org/user-agent-list/search-bots/soso-spider.html
        /**
         * Sosospider+(+http://help.soso.com/webspider.htm)
         * Mozilla/5.0 (compatible; Sosoimagespider/2.0; +http://help.soso.com/soso-image-spider.htm)
         */
        if (strpos($useragent, 'Sosoimagespider') !== false) {
            $this->setName('soso-image');
            $this->addTags(['search','image']);
        } elseif (strpos($useragent, 'Sosospider') !== false) {
            $this->setName('soso-spider');
            $this->addTags(['search']);
        } else {
            throw new InvalidArgumentException('UserAgent given is not a valid Soso one: ' . $useragent);
        }
    }
}
