<?php

namespace Test\Bee4\UserAgent\Classifier\Bots;

use Bee4\UserAgent\Classifier\Bots\Yandex;

/**
 * Class YandexTest
 * @package Test\Bee4\UserAgent\Classifier\Bots
 */
class YandexTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testInvalidUA()
	{
		new Yandex('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.71 Safari/537.36');
	}

	/**
	 * @expectedException Bee4\UserAgent\Classifier\NotAKnownBotException
	 */
	public function testValidUAButUnknownBot()
	{
		//These UA are yandex but not known has bots...
		new Yandex('Opera\/9.80 (Windows NT 6.1; Yandex Browser) Presto\/2.12.388 Version\/12.16');
		new Yandex('Opera\/9.80 (Windows NT 5.1; Edition Yandex) Presto\/2.12.388 Version\/12.16');
	}

	public function testYandexBots()
	{
		$bot = new Yandex('Mozilla/5.0 (compatible; YandexAntivirus/2.0; +http://yandex.com/bots)');
		$this->assertEquals('yandex-antivirus', $bot->getName());
		$this->assertEquals(['search','antivirus'], $bot->getTags());

		$bot = new Yandex('Mozilla/5.0 (compatible; YandexImages/3.0; +http://yandex.com/bots)');
		$this->assertEquals('yandex-images', $bot->getName());
		$this->assertEquals(['search','image'], $bot->getTags());

		$bot = new Yandex('Mozilla/5.0 (compatible; YandexDirect/3.0; +http://yandex.com/bots)');
		$this->assertEquals('yandex-direct', $bot->getName());
		$this->assertEquals(['search','publicity'], $bot->getTags());

		$bot = new Yandex('Mozilla/5.0 (compatible; YandexBlogs/0.99; robot; B; +http://yandex.com/bots)');
		$this->assertEquals('yandex-blogs', $bot->getName());
		$this->assertEquals(['search'], $bot->getTags());

		$bot = new Yandex('Mozilla/5.0 (compatible; YandexMetrika/2.0; +http://yandex.com/bots)');
		$this->assertEquals('yandex-metrika', $bot->getName());
		$this->assertEquals(['search'], $bot->getTags());

		$bot = new Yandex('Mozilla/5.0 (compatible; YandexImageResizer/2.0; +http://yandex.com/bots)');
		$this->assertEquals('yandex-imageresizer', $bot->getName());
		$this->assertEquals(['search','image','tool'], $bot->getTags());

		$bot = new Yandex('Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0) Yandex.Translate');
		$this->assertEquals('yandex-translate', $bot->getName());
		$this->assertEquals(['translate'], $bot->getTags());
	}
}
