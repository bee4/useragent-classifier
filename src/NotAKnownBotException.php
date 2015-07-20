<?php
/**
 * This file is part of the beebot package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Bee4 2015
 * @author    Stephane HULARD <s.hulard@chstudio.fr>
 * @package   Bee4\UserAgentClassify
 */

namespace Bee4\UserAgentClassify;

/**
 * NotAKnownBotException object
 * Used to detect the specific error thrown when a bot is identified as an existent one but known as a non valid bot... (normally visitor...)
 * @package Bee4\UserAgentClassify
 */
class NotAKnownBotException extends \Exception
{}
