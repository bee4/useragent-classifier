<?php
/**
 * This file is part of the beebot package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Bee4 2013
 * @author    Stephane HULARD <s.hulard@chstudio.fr>
 * @author    Ivo GEORGIEV <ivokgeorgiev@gmail.com>
 * @package   Test\BeeBot\Tools\Robot\Bots
 */
namespace Test\BeeBot\Tools\Robot\Bots;

use BeeBot\Tools\Robot\Bots\Alexa;

/**
 * Class AlexaTest
 * @package Test\BeeBot\Tools\Robot\Bots
 */
class AlexaTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testInvalidBot()
	{
		new Alexa('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36');
	}

	public function testAlexa()
	{
		$bot = new Alexa('ia_archiver (+http://www.alexa.com/site/help/webmasters; crawler@alexa.com)');
		$this->assertEquals('alexa-crawler', $bot->getName());
 		$bot = new Alexa('Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; BTRS102908; GTB7.5; SIMBAR={21DEE6A8-BD2A-11E1-BFEE-F021C79C3CCF}; SLCC1; .NET CLR 2.0.50727; Media Center PC 5.0; .NET CLR 3.0.30618; .NET CLR 3.5.30729; InfoPath.1; Alexa Toolbar)');
		$this->assertEquals('alexa-toolbar', $bot->getName());
		$bot = new Alexa('Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Trident/4.0; AlexaToolbar/amzni-3.0; GTB7.5; AskTbORJ/5.15.23.36191; .NET4.0C; .NET4.0E; AlexaToolbar/amzni-3.0; .NET CLR 2.0.50727; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729; MSIECrawler)');
		$this->assertEquals('alexa-toolbar', $bot->getName());
	}
}
