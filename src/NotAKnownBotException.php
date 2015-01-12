<?php
/**
 * This file is part of the beebot package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Bee4 2013
 * @author    Stephane HULARD <s.hulard@chstudio.fr>
 * @package   BeeBot\Exception
 */

namespace BeeBot\Tools\Robot;

/**
 * NotAKnownBotException object
 * Used to detect the specific error thrown when a bot is identified as an existent one but known as a non valid bot... (normally visitor...)
 * @package BeeBot\Exception
 */
class NotAKnownBotException extends \Exception
{}