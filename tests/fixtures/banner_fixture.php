<?php 
/* SVN FILE: $Id$ */
/* Banner Fixture generated on: 2009-09-06 21:58:04 : 1252259884*/

class BannerFixture extends CakeTestFixture {
	var $name = 'Banner';
	var $table = 'banners';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 5, 'key' => 'primary'),
		'type' => array('type'=>'integer', 'null' => false, 'default' => '1', 'length' => 1),
		'comment' => array('type'=>'string', 'null' => false, 'length' => 250),
		'body' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'type'  => 1,
		'comment'  => 'Lorem ipsum dolor sit amet',
		'body'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'created'  => '2009-09-06 21:58:04',
		'modified'  => '2009-09-06 21:58:04'
	));
}
?>