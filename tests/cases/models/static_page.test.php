<?php 
/* SVN FILE: $Id$ */
/* StaticPage Test cases generated on: 2009-10-05 17:10:18 : 1254749358*/
App::import('Model', 'StaticPage');

class StaticPageTestCase extends CakeTestCase {
	var $StaticPage = null;
	var $fixtures = array('app.static_page');

	function startTest() {
		$this->StaticPage =& ClassRegistry::init('StaticPage');
	}

	function testStaticPageInstance() {
		$this->assertTrue(is_a($this->StaticPage, 'StaticPage'));
	}

	function testStaticPageFind() {
		$this->StaticPage->recursive = -1;
		$results = $this->StaticPage->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('StaticPage' => array(
			'id'  => 1,
			'body'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created'  => '2009-10-05 17:29:18',
			'modified'  => '2009-10-05 17:29:18'
		));
		$this->assertEqual($results, $expected);
	}
}
?>