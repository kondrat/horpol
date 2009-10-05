<?php 
/* SVN FILE: $Id$ */
/* StaticPage Fixture generated on: 2009-10-05 17:10:18 : 1254749358*/

class StaticPageFixture extends CakeTestFixture {
	var $name = 'StaticPage';
	var $table = 'static_pages';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'body' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'body'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'created'  => '2009-10-05 17:29:18',
		'modified'  => '2009-10-05 17:29:18'
	));
}
?>