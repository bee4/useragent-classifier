<?php
/**
 * This file is part of the beebot package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Bee4 2013
 * @author  Stephane HULARD <s.hulard@chstudio.fr>
 * @package Bee4\UserAgentClassify
 */

namespace Bee4\UserAgentClassify;

use InvalidArgumentException;

/**
 * Class RobotDetector
 * Define different methods to detect bots from logs
 * @package Bee4\UserAgentClassify
 */
class Detector
{
    /**
     * Detect if the current user agent is a bot or a regular user
     * @param String $useragent User agent to be tested
     * @return Bots\AbstractBot
     */
    public static function whoIs($useragent)
    {
        $lower = strtolower($useragent);
        try {
            try {
                //--------------------------------------------------------------------------
                //BeeBot detection the most important one!
                if (strpos($lower, "beebot") !== false) {
                    return new Bots\BeeBot($useragent);
                //--------------------------------------------------------------------------
                //Google Bot
                } elseif (strpos($lower, "google") !== false && !(strpos($lower, "google") != 0 && $lower[strpos($lower, "google")-1] == '@')) {
                    return new Bots\Google($useragent);
                //--------------------------------------------------------------------------
                //Yahoo but not a yahoo mail...
                } elseif (strpos($lower, "yahoo") !== false && !(strpos($lower, "yahoo") != 0 && $lower[strpos($lower, "yahoo")-1] == '@')) {
                    return new Bots\Yahoo($useragent);
                //--------------------------------------------------------------------------
                //Bing
                } elseif (strpos($lower, "bing") !== false || strpos($lower, "msnbot") !== false) {
                    return new Bots\Bing($useragent);
                //--------------------------------------------------------------------------
                //Baidu
                } elseif (strpos($lower, "baidu") !== false) {
                    return new Bots\Baidu($useragent);
                //--------------------------------------------------------------------------
                //Soso
                } elseif (strpos($lower, "soso") !== false) {
                    return new Bots\Soso($useragent);
                //--------------------------------------------------------------------------
                //Sogou
                } elseif (strpos($lower, "sogou") !== false) {
                    return new Bots\Sogou($useragent);
                //--------------------------------------------------------------------------
                //Yandex
                } elseif (strpos($lower, "yandex") !== false) {
                    return new Bots\Yandex($useragent);
                //--------------------------------------------------------------------------
                //ExaBot
                } elseif (strpos($lower, "exabot") !== false) {
                    return new Bots\ExaBot($useragent);
                //--------------------------------------------------------------------------
                //Facebook
                } elseif (strpos($lower, "facebookexternalhit") !== false) {
                    return new Bots\Facebook($useragent);
                //--------------------------------------------------------------------------
                //SezNam
                } elseif (strpos($lower, "seznambot") !== false) {
                    return new Bots\Seznam($useragent);
                //--------------------------------------------------------------------------
                //Mail.RU
                } elseif (strpos($lower, "mail.ru") !== false) {
                    return new Bots\MailRU($useragent);
                //--------------------------------------------------------------------------
                //DiscoBot
                } elseif (strpos($lower, "discobot") !== false) {
                    return new Bots\DiscoBot($useragent);
                //--------------------------------------------------------------------------
                //AlexaCrawler
                } elseif (strpos($lower, "alexa") !== false) {
                    return new Bots\Alexa($useragent);
                //--------------------------------------------------------------------------
                //WordPress
                } elseif (strpos($lower, "wordpress") !== false) {
                    return new Bots\WordPress($useragent);
                //--------------------------------------------------------------------------
                //Generic Bot
                //Try to make a huge difference between a real visitor and a bot
                } elseif (strpos($lower, "bot") !== false ||
                    strpos($lower, "crawler") !== false ||
                    strpos($lower, "spider") !== false
                ) {
                    return new Bots\BaseBot($useragent);
                //--------------------------------------------------------------------------
                //Regular visitor (none of the above...)
                } elseif ($lower === "-" || $lower === "") {
                    return new Bots\EmptyBot;
                //--------------------------------------------------------------------------
                //Regular visitor (none of the above...)
                } else {
                    return new Bots\Visitor($useragent);
                }
                //--------------------------------------------------------------------------
            } catch (InvalidArgumentException $oError) {
                return new Bots\BaseBot($useragent);
            }
        } catch (NotAKnownBotException $oError) {
            return new Bots\EmptyBot;
        }
    }
}
