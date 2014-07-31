<?php

class UserTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @cover Entity\User::getPrenom()
	 */	
	public function testGetPrenom()
	{
		$user = new Entity\User('Chirac', 'Jacques', 81);
		$this->assertEquals('Jacques', $user->getPrenom());
	}

	/**
	 * @cover Entity\User::getNom()
	 */	
	public function testGetNom()
	{
		$user = new Entity\User('Chirac', 'Jacques', 81);
		$this->assertEquals('Chirac', $user->getNom());
	}

	/**
	 * @cover Entity\User::getAge()
	 */	
	public function testGetAge()
	{
		$user = new Entity\User('Chirac', 'Jacques', 81);
		$this->assertEquals(81, $user->getAge());
	}
}