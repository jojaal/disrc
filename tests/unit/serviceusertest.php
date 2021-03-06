<?php

class ServiceUserTestTu extends PHPUnit_Framework_TestCase
{
	protected $mock;

	public function __construct()
	{
		$this->mock = $this->getMockBuilder('DAO\DAOUserSession')->getMock();
		$this->mock->method('get')->will($this->returnValue('John'));
	}

	/**
	 * cover Service\ServiceUser::fullName()
	 * This is a UT as it uses a mock instead of a class dependency.
	 */
	public function testFullName()
	{
		$service = new Service\ServiceUser($this->mock);

		$this->assertEquals('John John', $service->fullName());
	}
}