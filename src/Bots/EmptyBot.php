<?php

namespace Bee4\UserAgent\Classifier\Bots;

/**
 * Define an EmptyBot used when no bot is returned
 * @package Bee4\UserAgent\Classifier\Bots
 */
class EmptyBot extends AbstractBot
{
    /**
     * EmptyBot bot constructor
     */
    public function __construct()
    {
        $this->setName('empty');
    }
}
