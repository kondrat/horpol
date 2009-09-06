<?php 
/* SVN FILE: $Id$ */
/* BannersController Test cases generated on: 2009-09-06 21:59:12 : 1252259952*/
App::import('Controller', 'Banners');

class TestBanners extends BannersController {
	var $autoRender = false;
}

class BannersControllerTest extends CakeTestCase {
	var $Banners = null;

	function startTest() {
		$this->Banners = new TestBanners();
		$this->Banners->constructClasses();
	}

	function testBannersControllerInstance() {
		$this->assertTrue(is_a($this->Banners, 'BannersController'));
	}

	function endTest() {
		unset($this->Banners);
	}
}
?>