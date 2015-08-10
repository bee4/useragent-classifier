<?php

namespace Test\Bee4\UserAgent\Classifier\Bots;

use Bee4\UserAgent\Classifier\Bots\AbstractTaggedBot;

/**
 * Class AbstractBotTest
 * @package Test\Bee4\UserAgent\Classifier\Bots
 */
class AbstractTaggedBotTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var AbstractTaggedBot
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$this->object = $this
			->getMockBuilder('\Bee4\UserAgent\Classifier\Bots\AbstractTaggedBot')
			->setMethods(null)
	    ->setMockClassName('FakeTaggedBot')
	    ->getMock();
	}

	public function testTags()
	{
		$this->assertNull($this->object->getTags());

		$tags = ['tag1'];
		$this->object->addTags($tags);
		$this->assertEquals($tags, $this->object->getTags());

		$tags = ['tag1', 'tag2', 'tag3'];
		$this->object->addTags($tags);
		$this->assertEquals($tags, $this->object->getTags());
	}
}
