<?php
class StaticPage extends AppModel {

	var $name = 'StaticPage';
	var $actsAs = array('Containable');
	var $validate = array(
		'body' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasAndBelongsToMany = array(
		'Banner' => array(
			'className' => 'Banner',
			'joinTable' => 'banners_static_pages',
			'foreignKey' => 'static_page_id',
			'associationForeignKey' => 'banner_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);




}
?>