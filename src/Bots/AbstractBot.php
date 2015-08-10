<?php

namespace Bee4\UserAgent\Classifier\Bots;

use Bee4\UserAgent\Classifier\BotInterface;
use InvalidArgumentException;

/**
 * Class AbstractBot
 * Define a canvas to implement specific Bot details
 * @package Bee4\UserAgent\Classifier\Bots
 */
abstract class AbstractBot implements \JsonSerializable, BotInterface
{
    /**
     * Specific bot name
     * @var String
     */
    private $name;

    /**
     * Set the name of current bot
     * This name is a precise one (googlebot-image or googlebot)
     *
     * @param String $name
     */
    protected function setName($name)
    {
        if (!is_string($name)) {
            throw new InvalidArgumentException('Name given must be a string!!');
        }

        $this->name = $name;
    }

    /**
     * Name property accessor
     * @return String
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Retrieve global bot name
     * @return String
     */
    public static function getBot()
    {
        $parts = explode('\\', get_called_class());
        return strtolower(array_pop($parts));
    }

    /**
     * Transform the bot to its JSON representation
     * @return Array
     */
    public function jsonSerialize()
    {
        return array(
            'bot' => $this->getBot(),
            'name' => $this->getName()
        );
    }
}
