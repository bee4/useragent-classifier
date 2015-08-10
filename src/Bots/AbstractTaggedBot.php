<?php

namespace Bee4\UserAgent\Classifier\Bots;

/**
 * Class AbstractTaggedBot
 * Give the ability to handle tags to Bot
 * @package Bee4\UserAgent\Classifier\Bots
 */
abstract class AbstractTaggedBot extends AbstractBot
{
    /**
     * Bot tags used to categorize behaviour
     * @var array
     */
    private $tags = [];

    /**
     * Add some tags to the current bot
     * @param array $tags
     */
    public function addTags(array $tags)
    {
        $this->tags = array_values(array_unique(array_merge($this->tags, $tags)));
    }

    /**
     * Retrieve tag list
     * @return array|null
     */
    public function getTags()
    {
        if (count($this->tags) > 0) {
            return $this->tags;
        }

        return null;
    }

    /**
     * Transform the bot to its JSON representation
     * @return Array
     */
    public function jsonSerialize()
    {
        $data = parent::jsonSerialize();
        $data['tags'] = $this->getTags();

        return $data;
    }
}
