<?php

class ServiceUserTestTi extends PHPUnit_Framework_TestCase
{
	/**
	 * @cover DAO\DAOUserSession::getUser()
	 */
	public function testGetUser()
	{
		$user = new Entity\User('Sans nom', 'Sans prenom', 0);
		$dao = new DAO\DAOUserSession;		

		$this->assertEquals($user, $dao->getUser());
	}
}