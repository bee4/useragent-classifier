<?php

namespace Bee4\UserAgent\Classifier;

/**
 * BotInterface contract
 * Define the canvas for all kind of Bots
 * @package Bee4\UserAgent\Classifier
 */
interface BotInterface
{
    /**
     * Retrieve bot generic name
     * @return string
     */
    public static function getBot();

    /**
     * Retrieve the bot specific name
     * @return string
     */
    public function getName();
}
