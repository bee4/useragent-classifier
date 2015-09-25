<?php

namespace Bee4\UserAgent\Classifier;

/**
 * NotAKnownBotException object
 * Used to detect the specific error thrown when a bot is identified as an
 * existent one but known as a non valid bot... (normally visitor...)
 * @package Bee4\UserAgent\Classifier
 */
class NotAKnownBotException extends \Exception
{

}
