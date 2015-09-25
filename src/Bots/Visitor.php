<?php

namespace Bee4\UserAgent\Classifier\Bots;

use InvalidArgumentException;

/**
 * Class Visitor
 * The visitor description (has a bot)
 * @package Bee4\UserAgent\Classifier\Bots
 */
class Visitor extends AbstractBot
{
    /**
     * Visitor constructor
     * @param string $useragent The useragent used for detection
     * @throws InvalidArgumentException
     */
    public function __construct($useragent)
    {
        $lower = strtolower($useragent);
//TODO: Maybe add a double check for the UA
        if (strpos($lower, "bot") !== false ||
            strpos($lower, "crawler") !== false ||
            strpos($lower, "spider") !== false
        ) {
            throw new InvalidArgumentException('UserAgent given is not a valid visitor one: ' . $useragent);
        } else {
            $this->setName('visitor');
        }
    }
}
