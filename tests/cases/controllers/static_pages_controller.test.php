<?php 
/* SVN FILE: $Id$ */
/* StaticPagesController Test cases generated on: 2009-10-05 17:10:14 : 1254749414*/
App::import('Controller', 'StaticPages');

class TestStaticPages extends StaticPagesController {
	var $autoRender = false;
}

class StaticPagesControllerTest extends CakeTestCase {
	var $StaticPages = null;

	function startTest() {
		$this->StaticPages = new TestStaticPages();
		$this->StaticPages->constructClasses();
	}

	function testStaticPagesControllerInstance() {
		$this->assertTrue(is_a($this->StaticPages, 'StaticPagesController'));
	}

	function endTest() {
		unset($this->StaticPages);
	}
}
?>