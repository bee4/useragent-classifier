<?php

namespace Test\Bee4\UserAgent\Classifier\Bots;

use Bee4\UserAgent\Classifier\Bots\AbstractBot;

/**
 * Class AbstractBotTest
 * @package Test\Bee4\UserAgent\Classifier\Bots
 */
class AbstractBotTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var AbstractBot
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$this->object = $this
			->getMockBuilder('\Bee4\UserAgent\Classifier\Bots\AbstractBot')
			->setMethods(null)
	    ->setMockClassName('FakeBot')
	    ->getMock();
	}

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testInvalidName()
	{
		//Set a name as number...
		$method = new \ReflectionMethod('FakeBot', 'setName');
		$method->setAccessible(TRUE);
		$method->invoke($this->object, 0);
	}

	public function testName()
	{
		$method = new \ReflectionMethod('FakeBot', 'setName');
		$method->setAccessible(TRUE);
		$method->invoke($this->object, 'fakebot-spider');
		$this->assertEquals('fakebot-spider', $this->object->getName());
	}

	public function testGetBot() {
		$this->assertEquals(
			'fakebot',
			call_user_func([$this->object, 'getBot'])
		);
	}

	public function testJsonSerialize()
	{
		$method = new \ReflectionMethod('FakeBot', 'setName');
		$method->setAccessible(TRUE);
		$method->invoke($this->object, 'fakebot-spider');

		$this->assertEquals(
			['bot'=>'fakebot', 'name'=>'fakebot-spider'],
			$this->object->jsonSerialize()
		);
	}
}
