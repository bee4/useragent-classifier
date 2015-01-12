<?php
/**
 * This file is part of the beebot package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Bee4 2013
 * @author    Stephane HULARD <s.hulard@chstudio.fr>
 * @author    Ivo GEORGIEV <ivokgeorgiev@gmail.com>
 * @package   Test\Bee4\UserAgentClassify\Bots
 */
namespace Test\Bee4\UserAgentClassify\Bots;

use Bee4\UserAgentClassify\Bots\Yahoo;

/**
 * Class YahooTest
 * @package Test\Bee4\UserAgentClassify\Bots
 */
class YahooTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testInvalidUA()
	{
		new Yahoo('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36');
	}

	/**
	 * Check that Yahoo UA is supported
	 */
	public function testDetection()
	{
		$bot = new Yahoo('Mozilla/5.0 (compatible; Yahoo!-AdCrawler; http://help.yahoo.com/yahoo_adcrawler)');
		$this->assertEquals('yahoo-ads', $bot->getName());
		$this->assertEquals(['search','publicity'], $bot->getTags());

		$bot = new Yahoo('Mozilla/5.0 (compatible; Yahoo! Slurp/3.0; http://help.yahoo.com/help/us/ysearch/slurp)');
		$this->assertEquals('yahoo-slurp', $bot->getName());
		$bot = new Yahoo('Mozilla/5.0 (compatible; Yahoo! Slurp; http://help.yahoo.com/help/us/ysearch/slurp)');
		$this->assertEquals('yahoo-slurp', $bot->getName());
		$this->assertEquals(['search'], $bot->getTags());

		$bot = new Yahoo('Mozilla/5.0 (compatible; Yahoo Pipes 2.0; +http://developer.yahoo.com/yql/provider) Gecko/20090729 Firefox/3.5.2');
		$this->assertEquals('yahoo-pipes', $bot->getName());
		$this->assertEquals(['feed'], $bot->getTags());

		$bot = new Yahoo('Mozilla/5.0 (YahooYSMcm/3.0.0; http://help.yahoo.com)');
		$this->assertEquals('yahoo-search-marketing', $bot->getName());
		$this->assertEquals(['search','publicity'], $bot->getTags());

		$bot = new Yahoo('DoCoMo/2.0 SH902i (compatible; Y!J-SRD/1.0; http://help.yahoo.co.jp/help/jp/search/indexing/indexing-27.html)');
		$this->assertEquals('yahoo-japan', $bot->getName());
		$bot = new Yahoo('DoCoMo/2.0/SO502i (compatible; Y!J-SRD/1.0; http://help.yahoo.co.jp/help/jp/search/indexing/indexing-27.html)');
		$this->assertEquals('yahoo-japan', $bot->getName());
		$bot = new Yahoo('Mozilla/4.0 (compatible; Yahoo Japan; for robot study; kasugiya)');
		$this->assertEquals('yahoo-japan', $bot->getName());
		$bot = new Yahoo('Mozilla/4.0 (compatible; Y!J; for robot study; keyoshid)');
		$this->assertEquals('yahoo-japan', $bot->getName());
		$bot = new Yahoo('Y!J/1.0 (http://help.yahoo.co.jp/help/jp/search/indexing/indexing-15.html)');
		$this->assertEquals('yahoo-japan', $bot->getName());
		$this->assertEquals(['search'], $bot->getTags());

		//Check Yahoo messenger useragent
		$bot = new Yahoo('YahooMobileMessenger/1.0 (xyz-mobile messenger; 1.0.0.0) (1234; Apple; iPhone; iPhone OS/3.0)');
		$this->assertEquals('yahoo-messenger', $bot->getName());
		//Check third party apps useragent that are using YahooMessenger API
		$bot = new Yahoo('YahooMessenger/1.0 ( xyz-mobile messenger; 1.0.0.0 )');
		$this->assertEquals('yahoo-messenger', $bot->getName());
		$this->assertEquals(['browser'], $bot->getTags());


		$bot = new Yahoo('Yahoo:LinkExpander:Slingstone');
		$this->assertEquals('yahoo-tools', $bot->getName());
		$this->assertEquals(['tool'], $bot->getTags());

		$bot = new Yahoo('YahooCacheSystem');
		$this->assertEquals('yahoo-cache', $bot->getName());
		$bot = new Yahoo('YahooExternalCache');
		$this->assertEquals('yahoo-cache', $bot->getName());
		$this->assertEquals(['search'], $bot->getTags());
	}
}
