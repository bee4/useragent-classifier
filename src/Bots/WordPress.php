<?php
/**
 * This file is part of the beebot package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Bee4 2014
 * @author    Stephane HULARD <s.hulard@chstudio.fr>
 * @package   Bee4\UserAgent\Classifier\Bots
 */

namespace Bee4\UserAgent\Classifier\Bots;

use InvalidArgumentException;

/**
 * Class WordPress
 * Detect if a visit is a wordpress one
 * @package Bee4\UserAgent\Classifier\Bots
 */
class WordPress extends AbstractTaggedBot
{
    /**
     * WordPress bot constructor
     *
     * @param String $useragent The useragent used for detection
     * @throws InvalidArgumentException
     */
    public function __construct($useragent)
    {
        /**
         * WordPress/X.X.X
         */

        if (preg_match('/^WordPress\/.*$/', $useragent, $matches)) {
            $this->setName('wordpress-bot');
            $this->addTags(['agent']);
        } else {
            throw new InvalidArgumentException('UserAgent given is not a valid WordPress one: ' . $useragent);
        }
    }
}
