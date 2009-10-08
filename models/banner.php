<?php
class Banner extends AppModel {

	var $name = 'Banner';
	var $actsAs = array('Containable');
	var $validate = array(
		'id' => array('notempty'),
		'logo' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasAndBelongsToMany = array(
		'Category' => array(
			'className' => 'Category',
			'joinTable' => 'banners_categories',
			'foreignKey' => 'banner_id',
			'associationForeignKey' => 'category_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'StaticPage' => array(
			'className' => 'StaticPage',
			'joinTable' => 'banners_static_pages',
			'foreignKey' => 'banner_id',
			'associationForeignKey' => 'static_page_id',
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

//--------------------------------------------------------------------

//--------------------------------------------------------------------	
	function beforeDelete () {
		$bannerToDel = array();
		$bannerToDel = $this->find('first', array( 'conditions' => array('Banner.id' => $this->id),'fields' => array('Banner.logo'), 'contain' => false ) );
		//debug($bannerToDel);
		if( $bannerToDel != array() && $bannerToDel['Banner']['logo'] != null ) {

			@unlink( WWW_ROOT.'img/banner/'.$bannerToDel['Banner']['logo']);
		}
		return true;
	}


}
?>