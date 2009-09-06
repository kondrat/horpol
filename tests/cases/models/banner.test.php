<?php 
/* SVN FILE: $Id$ */
/* Banner Test cases generated on: 2009-09-06 21:58:04 : 1252259884*/
App::import('Model', 'Banner');

class BannerTestCase extends CakeTestCase {
	var $Banner = null;
	var $fixtures = array('app.banner');

	function startTest() {
		$this->Banner =& ClassRegistry::init('Banner');
	}

	function testBannerInstance() {
		$this->assertTrue(is_a($this->Banner, 'Banner'));
	}

	function testBannerFind() {
		$this->Banner->recursive = -1;
		$results = $this->Banner->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Banner' => array(
			'id'  => 1,
			'type'  => 1,
			'comment'  => 'Lorem ipsum dolor sit amet',
			'body'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created'  => '2009-09-06 21:58:04',
			'modified'  => '2009-09-06 21:58:04'
		));
		$this->assertEqual($results, $expected);
	}
}
?>