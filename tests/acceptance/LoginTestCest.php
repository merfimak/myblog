<?php 

class LoginTestCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
    	$I->amOnPage('Admin/login');
		$I->fillField('login', 'admin');
		$I->fillField('password', '1111');
		$I->click('Login');
		$I->seeCurrentUrlEquals('/admin');
    }
}
